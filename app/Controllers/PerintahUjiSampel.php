<?php

namespace App\Controllers;

use App\Models\InstalasiModel;
use App\Models\PenanggungJawabLhuModel;
use App\Models\PenanggungJawabSampelModel;
use App\Models\PengantarLhuModel;
use App\Models\PerintahUjiSampelModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class PerintahUjiSampel extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $modelPj;
    protected $modelInstalasi;
    protected $modelPengantarLhu;
    protected $validation;
    protected $time;
    protected $today;

    public function __construct()
    {
        $this->title = 'Surat Perintah Uji Sampel';
        $this->model = new PerintahUjiSampelModel();
        $this->modelPj = new PenanggungJawabSampelModel();
        $this->modelInstalasi = new InstalasiModel();
        $this->modelPengantarLhu = new PengantarLhuModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Perintah-uji/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function new()
    {
         if ($this->request->isAJAX()) {

            $_data = '';
            $id_instalasi = $this->request->getVar('id_instalasi');
            $kode_pengantar = $this->request->getVar('kode_pengantar');

            $tgl_terima = $this->modelPj->select('tgl_terima_sampel')->where('kode_pengantar', $kode_pengantar)->first();
            $id_pengantar_lhu = $this->modelPengantarLhu->select('id')->where('kode_pengantar', $kode_pengantar)->first();
            $instalasi = $this->modelInstalasi->find($id_instalasi);
            if ($id_instalasi == 1) {
                $_data = $this->model->get_data_sampel_lingkungan($kode_pengantar);
            }else{
                $data = null;
            }

            $data = [
                'title' => 'Tambah ' . $this->title . ' ('.$kode_pengantar.')',
                'id_instalasi' => $id_instalasi,
                'instalasi' => $instalasi,
                'kode_pengantar' => $kode_pengantar,
                'id_pengantar_lhu' => $id_pengantar_lhu,
                'tgl_terima' => $tgl_terima,
                'items' => $_data
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/_add', $data)
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
            $valid = $this->validate([
                'tgl_kirim_sampel' => [
                    'label' => 'Tgl kirim sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'kepala_instalasi' => [
                    'label' => 'Kepala instalasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_kirim_sampel' => [
                    'label' => 'Tanggal kirim sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_terima_sampel_lab' => [
                    'label' => 'Tanggal terima sampel lab',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_selesai_sampel' => [
                    'label' => 'Tanggal selesai sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                    

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'tgl_kirim_sampel' => $this->validation->getError('tgl_kirim_sampel'),
                        'kepala_instalasi' => $this->validation->getError('kepala_instalasi'),
                        'tgl_kirim_sampel' => $this->validation->getError('tgl_kirim_sampel'),
                        'tgl_terima_sampel_lab' => $this->validation->getError('tgl_terima_sampel_lab'),
                        'tgl_selesai_sampel' => $this->validation->getError('tgl_selesai_sampel')
                    ]
                ];
            } else {
                $tgl_kirm_sampel = $this->request->getVar('tgl_kirim_sampel');
                $tgl_terima_sampel_lab = $this->request->getVar('tgl_terima_sampel_lab');
                $tgl_selesai_sampel = $this->request->getVar('tgl_selesai_sampel');


                $simpandata = [
                    'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                    'id_pengantar_lhu' => $this->request->getVar('id_pengantar_lhu'),
                    'id_instalasi' => $this->request->getVar('id_instalasi'),
                    'sifat_pemeriksaan' => $this->request->getVar('sifat_pemeriksaan'),
                    'tgl_kirim_sampel' => date('Y-m-d', strtotime($tgl_kirm_sampel)),
                    'kepala_instalasi' => $this->request->getVar('kepala_instalasi'),
                    'tgl_terima_sampel_lab' => date('Y-m-d', strtotime($tgl_terima_sampel_lab)),
                    'tgl_selesai_sampel' => date('Y-m-d', strtotime($tgl_selesai_sampel)),
                    'analisis_lab' => $this->request->getVar('analisis_lab'),
                ];
                $this->model->insert($simpandata);
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
        //
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
        //
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
        //
    }
}
