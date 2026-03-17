<?php

namespace App\Controllers;

use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Permintaan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;

    public function __construct()
    {
        $this->title = 'Permintaan';
        $this->model = new PermintaanPelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title
        ];
        return view('Backend/Modul/Pelayanan/Permintaan/index', $data);
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
                'items' => $this->model->where('is_active', 1)->orderBy('created_at', 'DESC')->findAll()
            ];
            
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Permintaan/__data', $data)
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
                'title' => 'Tambah ' . $this->title
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Permintaan/__add', $data)
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
                'created_at' => [
                    'label' => 'Tanggal permintaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim'),
                        'instansi' => $this->validation->getError('instansi'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp_pengirim' => $this->validation->getError('no_telp_pengirim'),
                        'created_at' => $this->validation->getError('created_at'),
                    ]
                ];
            } else {
                $simpandata = [
                    'no_reg' => $this->model->generate_no_reg(),
                    'kode_pelanggan' => $this->model->generate_kode_pelanggan(),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp_pengirim' => $this->request->getVar('no_telp_pengirim'),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel'),
                    'created_at' => $this->request->getVar('created_at')
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
                'sukses' => view('Backend/Modul/Pelayanan/Permintaan/__edit', $data)
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
                    'label' => 'Nama pelanggan',
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
                    'label' => 'No.Telp/Hp pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'created_at' => [
                    'label' => 'Tanggal permintaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim'),
                        'instansi' => $this->validation->getError('instansi'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp_pengirim' => $this->validation->getError('no_telp_pengirim'),
                        'created_at' => $this->validation->getError('created_at'),
                    ]
                ];
            } else {
                $save = [
                    'id' => $this->request->getVar('id'),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp_pengirim' => $this->request->getVar('no_telp_pengirim'),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel'),
                    'created_at' => $this->request->getVar('created_at'),
                ];
                $this->model->save($save);
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
            $pemeriksaan = new PermintaanPemeriksaanModel();
            $cek_data = $pemeriksaan->where('id_pelanggan', $id)->first();
            if ($cek_data) {
                $msg = [
                    'error' => 'Data tidak bisa di hapus'
                ];
            } else {
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
}
