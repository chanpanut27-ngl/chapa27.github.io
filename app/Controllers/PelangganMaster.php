<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PermintaanPelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganMaster extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $modelLab;
    protected $modelSampel;
    protected $validation;

    public function __construct()
    {
        $this->cachePage(5);
        $this->title = 'Pelanggan';
        $this->model = new PermintaanPelangganModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title,
        ];
        return view('Backend/Master/Pelanggan/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Master/Pelanggan/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
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
    public function new()
    {
         if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title
            ];
            $msg = [
                'data' => view('Backend/Master/Pelanggan/__add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function generate_no_reg() 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = sprintf('%04d', $nomorUrut) . '.' . date('dmY');
        
        return $nomorAntrian;
    }

    public function generate_kode_pelanggan() 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'P' . sprintf('%04d', $nomorUrut);
        
        return $nomorAntrian;
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
                'nama_pengirim' => [
                    'label' => 'Nama pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'instansi' => [
                    'label' => 'Instansi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'no_telp_pengirim' => [
                    'label' => 'No.Telp/Hp pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                // 'tgl_ambil_sampel' => [
                //     'label' => 'Tanggal pengambilan sampel',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong'
                //     ]
                // ],
                // 'jam_ambil_sampel' => [
                //     'label' => 'Jam pengambilan sampel',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong'
                //     ]
                // ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim'),
                        'instansi' => $this->validation->getError('instansi'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp_pengirim' => $this->validation->getError('no_telp_pengirim'),
                        // 'tgl_ambil_sampel' => $this->validation->getError('tgl_ambil_sampel'),
                        // 'jam_ambil_sampel' => $this->validation->getError('jam_ambil_sampel')
                    ]
                ];
            } else {
                $simpandata = [
                    'no_reg' => $this->generate_no_reg(),
                    'kode_pelanggan' => $this->generate_kode_pelanggan(),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp_pengirim' => $this->request->getVar('no_telp_pengirim'),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel'),
                    // 'tgl_ambil_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_ambil_sampel'))),
                    // 'jam_ambil_sampel' => $this->request->getVar('jam_ambil_sampel'),
                    // 'lokasi_ambil_sampel' => $this->request->getVar('lokasi_ambil_sampel'),
                    // 'petugas_ambil_sampel' => $this->request->getVar('petugas_ambil_sampel'),
                    // 'no_telp' => $this->request->getVar('no_telp'),
                    // 'keterangan_tambahan' => $this->request->getVar('keterangan_tambahan'),
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
         if ($this->request->isAJAX()) {

            $data = [
                'items' => $this->model->find($id),
                'title' => 'Edit ' . $this->title
            ];
            $msg = [
                'sukses' => view('Backend/Master/Pelanggan/__edit', $data)
            ];
            echo json_encode($msg);
        } else {
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
                'nama_pengirim' => [
                    'label' => 'Nama pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'instansi' => [
                    'label' => 'Instansi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'no_telp_pengirim' => [
                    'label' => 'No.Telp/Hp pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                // 'tgl_ambil_sampel' => [
                //     'label' => 'Tanggal pengambilan sampel',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong'
                //     ]
                // ],
                // 'jam_ambil_sampel' => [
                //     'label' => 'Jam pengambilan sampel',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong'
                //     ]
                // ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim'),
                        'instansi' => $this->validation->getError('instansi'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp_pengirim' => $this->validation->getError('no_telp_pengirim'),
                        // 'tgl_ambil_sampel' => $this->validation->getError('tgl_ambil_sampel'),
                        // 'jam_ambil_sampel' => $this->validation->getError('jam_ambil_sampel')
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp_pengirim' => $this->request->getVar('no_telp_pengirim'),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel'),
                    'is_active' => $this->request->getVar('is_active'),
                    // 'lokasi_ambil_sampel' => $this->request->getVar('lokasi_ambil_sampel'),
                    // 'petugas_ambil_sampel' => $this->request->getVar('petugas_ambil_sampel'),
                    // 'no_telp' => $this->request->getVar('no_telp'),
                    // 'keterangan_tambahan' => $this->request->getVar('keterangan_tambahan'),
                    // 'tgl_ambil_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_ambil_sampel'))),
                    // 'jam_ambil_sampel' => $this->request->getVar('jam_ambil_sampel'),
                    
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
