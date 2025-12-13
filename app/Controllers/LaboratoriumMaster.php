<?php

namespace App\Controllers;

use App\Models\InstalasiModel;
use App\Models\LaboratoriumModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class LaboratoriumMaster extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $masterInstalasi;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Laboratorium';
        $this->model = new LaboratoriumModel();
        $this->masterInstalasi = new InstalasiModel(); 
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title,
        ];
        return view('Backend/Master/Laboratorium/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data_all()
            ];
            $msg = [
                'data' => view('Backend/Master/Laboratorium/_data', $data)
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
                'masterInstalasi' => $this->masterInstalasi->where('is_active', 1)->findAll()
            ];
            $msg = [
                'data' => view('Backend/Master/Laboratorium/_add', $data)
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
                'kode_lab' => [
                    'label' => 'Kode laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_lab' => [
                    'label' => 'Nama laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'lantai' => [
                    'label' => 'Lantai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'kode_lab' => $this->validation->getError('kode_lab'),
                        'nama_lab' => $this->validation->getError('nama_lab'),
                        'lantai' => $this->validation->getError('lantai')
                    ]
                ];
            } else {
                $simpandata = [
                    'kode_lab' => $this->request->getVar('kode_lab'),
                    'nama_lab' => $this->request->getVar('nama_lab'),
                    'lantai' => $this->request->getVar('lantai'),
                    'kode_instalasi' => $this->request->getVar('kode_instalasi'),
                    'is_active' => $this->request->getVar('is_active')
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
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id),
                'masterInstalasi' => $this->masterInstalasi->where('is_active', 1)->findAll()
            ];
            $msg = [
                'sukses' => view('Backend/Master/Laboratorium/_edit', $data)
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
                'kode_lab' => [
                    'label' => 'Kode laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_lab' => [
                    'label' => 'Nama laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'lantai' => [
                    'label' => 'Lantai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'kode_lab' => $this->validation->getError('kode_lab'),
                        'nama_lab' => $this->validation->getError('nama_lab'),
                        'lantai' => $this->validation->getError('lantai')
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'kode_lab' => $this->request->getVar('kode_lab'),
                    'nama_lab' => $this->request->getVar('nama_lab'),
                    'lantai' => $this->request->getVar('lantai'),
                    'kode_instalasi' => $this->request->getVar('kode_instalasi'),
                    'is_active' => $this->request->getVar('is_active')
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
