<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaboratoriumModel;
use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLabModel;
use App\Models\PermintaanPelangganModel;
use App\Models\SampelLingkunganModel;
use CodeIgniter\HTTP\ResponseInterface;

class PengantarLab extends BaseController
{
    protected $title;
    protected $model;
    protected $m_lab;
    protected $m_lab_tujuan;
    protected $m_permintaan;

    public function __construct()
    {
        $this->title = 'Pengantar Laboratorium';
        $this->model = new PengantarLabModel();
        $this->m_lab = new LaboratoriumModel();
        $this->m_lab_tujuan = new LaboratoriumTujuanModel();
        $this->m_permintaan = new PermintaanPelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'items' => $this->m_lab_tujuan->findAll()
        ];
        return view('Backend/Modul/Pelayanan/Pengantar-lab/index', $data);
    }

    public function generate_kode_pengantar() 
    {
        $tahun = '';
        $kodePengantar = '';
        $char = 'PL';
        $current_year = date('Y', strtotime($this->time));

        /* cari tahun data terakhir */
        $query = $this->model->orderBy('id', 'DESC')->get();
        foreach ($query->getResultArray() as $row) {
            $tahun = date('Y', strtotime($row['created_at']));
        }
        $total = $this->model->where('YEAR(created_at)', $tahun)->countAllResults();

        if ($tahun != $current_year) {
            $kodePengantar = $total + 1;
        } else {
            $kodePengantar = $total + 1;
        }
        $kode = $char . sprintf('%04d', $kodePengantar);
        return $kode;
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data(),
                'cek_setting_lab' => $this->m_lab_tujuan->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pengantar-lab/__data', $data)
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

            $data = [
                'title' => 'Tambah ' . $this->title,
                'permintaan' => $this->m_permintaan->where('is_active', 1)->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pengantar-lab/__add', $data)
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
                'id_pelanggan' => [
                    'label' => 'Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_pelanggan' => $this->validation->getError('id_pelanggan'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else {
                $id_pelanggan = $this->request->getVar('id_pelanggan');
                $simpandata = [
                    'kode_pengantar' => $this->generate_kode_pengantar(),
                    'id_pelanggan' => $id_pelanggan,
                    'tanggal' => date('Y-m-d', strtotime($this->request->getVar('tanggal')))
                ];

                $cek_data = $this->model->where('id_pelanggan', $id_pelanggan)->first();
                if ($cek_data != null) {
                    $msg = [
                        'error' => 'Data sudah ada'
                    ];
                } else {
                    $this->model->save($simpandata);
                    $msg = [
                        'sukses' => 'Data berhasil disimpan'
                    ];
                }
                
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

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null) 
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id),
                'permintaan' => $this->m_permintaan->where('is_active', 1)->findAll()
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Pengantar-lab/__edit', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }
    public function update($id = null)
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'id_pelanggan' => [
                    'label' => 'Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_pelanggan' => $this->validation->getError('id_pelanggan'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                    'tanggal' => date('Y-m-d', strtotime($this->request->getVar('tanggal')))
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diubah'
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
            $q = $this->model->find($id);
            $kode_pengantar = $q['kode_pengantar'];
            $sampel = new SampelLingkunganModel();
            $cek_data = $sampel->where('kode_pengantar', $kode_pengantar)->get()->getResultArray();
            if ($cek_data) {
                $msg = [
                    'error' => 'Data gagal di hapus'
                ];
            }else{
                $this->model->delete($id);
                $msg = [
                    'sukses' => 'Data berhasil di hapus'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function create_setting_lab()
    {
        if ($this->request->isAJAX()) {
             $idLab = $this->request->getVar('id_laboratorium');
             $countJlhLab = count($idLab ?? []);

                for ($i=0; $i < $countJlhLab; $i++) { 

                    $save = [
                        'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                        'id_pengantar_lhu' => $this->request->getVar('id_pengantar_lhu'),
                        'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                        'id_laboratorium' => $idLab[$i]    
                    ];

                    $this->m_lab_tujuan->save($save);
                    $msg = [
                        'sukses' => 'Data berhasil disimpan'
                    ];
                }
                echo json_encode($msg);
        } else {
            exit('Not Process');
        }
           
    }
}
