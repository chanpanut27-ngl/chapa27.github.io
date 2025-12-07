<?php

namespace App\Controllers;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\SampelLingkungan as ModelsSampelLingkungan;
use App\Models\SampelLingkunganModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;

class SampelLingkungan extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $validation;
    protected $masterJenisSampel;
    protected $masterLab;
    protected $time;

    public function __construct()
    {
        $this->title = 'Fisika kimia air';
        $this->model = new SampelLingkunganModel();
        $this->masterJenisSampel = new JenisSampelModel();
        $this->masterLab = new LaboratoriumModel();
        $this->validation = \Config\Services::validation();
        $this->time = Time::now('Asia/Jakarta'); 
    }

    public function index($param1 = null, $param2 = null)
    {
         $data = ['param1' => $param1];
         return view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/index', $data);
    }


    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function generate_kode_sampel($idlab, $param) 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini

        $count = $this->model->where('id_laboratorium', intval($idlab))->countAllResults();
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
         $getLab = $this->masterLab->find($idlab);
        // if ($getLab['id'] == 1) {
        //     $ks = 'K';
        // }else{
        //     $ks = 'B';
        // }
        $js = new JenisSampelModel();
        $r = $js->where('id_lab', $getLab['id'])
            ->where('id', $param)
            ->get()->getResultArray();

        // if ($getLab['id'] == 1) {
        //     $ks = 'K';
        // }else{
        //     $ks = 'B';
        // }
        $ks = null;
        foreach ($r as $g) {
            $ks = $g['kode_sampel'];
        }
       
        $nomorAntrian = $ks.'.' . sprintf('%04d', $nomorUrut);
        return $nomorAntrian;
    }

    public function list() 
    {
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $data = [
                'items' => $this->model->get_data($kode_pengantar, $id_lab)
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $lab = $this->masterLab->find($id_lab);
            $nama_lab = $lab['nama_lab'];
            $data = [
                'title' => 'Tambah ' . $nama_lab,
                'masterLab' => $this->model->findAll(),
                'masterJenisSampel' => $this->masterJenisSampel->where('id_lab', $id_lab)->find(),
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/_add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
            $id_laboratorium = $this->request->getVar('id_laboratorium');

            $valid = $this->validate([
                'id_jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'lokasi_pengambilan_sampel' => [
                    'label' => 'Lokasi pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_pengambilan_sampel' => [
                    'label' => 'Tanggal pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jam_pengambilan_sampel' => [
                    'label' => 'Jam pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_jenis_sampel' => $this->validation->getError('id_jenis_sampel'),
                        'lokasi_pengambilan_sampel' => $this->validation->getError('lokasi_pengambilan_sampel'),
                        'tgl_pengambilan_sampel' => $this->validation->getError('tgl_pengambilan_sampel'),
                        'jam_pengambilan_sampel' => $this->validation->getError('jam_pengambilan_sampel')
                    ]
                ];
            } else {
                $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
                $tgl_ambil_sampel = date('Y-m-d', strtotime($this->request->getVar('tgl_pengambilan_sampel')));
                $jam_ambil_sampel = date('H:i:s', strtotime($this->request->getVar('jam_pengambilan_sampel')));

                $simpandata = [
                    'kode_sampel' => $this->generate_kode_sampel($id_laboratorium, $id_jenis_sampel),
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'lokasi_pengambilan_sampel' => $this->request->getVar('lokasi_pengambilan_sampel'),
                    'tgl_ambil_sampel' => $tgl_ambil_sampel,
                    'jam_ambil_sampel' => $jam_ambil_sampel,
                    'metode_pemeriksaan' => $this->request->getVar('metode_pemeriksaan'),
                    'volume_atau_berat' => $this->request->getVar('volume_berat'),
                    'jenis_wadah' => $this->request->getVar('jenis_wadah'),
                    'jenis_pengawet' => $this->request->getVar('jenis_pengawet'),
                    'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                    'id_laboratorium' => $this->request->getVar('id_laboratorium'),
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }   
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {    
        $query = $this->model->find($id);
        $lab = $this->masterLab->find($query['id_laboratorium']);
        $id_lab = $lab['id'];
        $nama_lab = $lab['nama_lab'];

        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Edit ' . $nama_lab,
                'items' => $this->model->find($id),
                'masterJenisSampel' => $this->masterJenisSampel->where('id_lab', $id_lab)->find()
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/_edit', $data)
            ];
            echo json_encode($msg);
        }else{
             exit('Not Process');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'id_jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'lokasi_pengambilan_sampel' => [
                    'label' => 'Lokasi pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_pengambilan_sampel' => [
                    'label' => 'Tanggal pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jam_pengambilan_sampel' => [
                    'label' => 'Jam pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_jenis_sampel' => $this->validation->getError('id_jenis_sampel'),
                        'lokasi_pengambilan_sampel' => $this->validation->getError('lokasi_pengambilan_sampel'),
                        'tgl_pengambilan_sampel' => $this->validation->getError('tgl_pengambilan_sampel'),
                        'jam_pengambilan_sampel' => $this->validation->getError('jam_pengambilan_sampel')
                    ]
                ];
            } else {
                $tgl_ambil_sampel = date('Y-m-d', strtotime($this->request->getVar('tgl_pengambilan_sampel')));
                $jam_ambil_sampel = date('H:i:s', strtotime($this->request->getVar('jam_pengambilan_sampel')));

                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'lokasi_pengambilan_sampel' => $this->request->getVar('lokasi_pengambilan_sampel'),
                    'tgl_ambil_sampel' => $tgl_ambil_sampel,
                    'jam_ambil_sampel' => $jam_ambil_sampel,
                    'metode_pemeriksaan' => $this->request->getVar('metode_pemeriksaan'),
                    'volume_atau_berat' => $this->request->getVar('volume_berat'),
                    'jenis_wadah' => $this->request->getVar('jenis_wadah'),
                    'jenis_pengawet' => $this->request->getVar('jenis_pengawet'),
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if ($this->request->isAJAX()) {

            $this->model->delete($id);
            $msg = [
                'sukses' => 'Data berhasil di hapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
