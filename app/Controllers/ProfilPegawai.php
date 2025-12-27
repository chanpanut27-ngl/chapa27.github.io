<?php

namespace App\Controllers;

use App\Models\ProfilPegawaiModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfilPegawai extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
   protected $title;
    protected $model;
    protected $modelUsers;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Profil';
        $this->model = new ProfilPegawaiModel();
        $this->modelUsers = new UsersModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'profil' => $this->model->get_data(),
            'items' => $this->modelUsers->cek_login_user()

        ];
        return view('Backend/Modul/Profil/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {

            $data = [
                'items' => $this->model->findAll(),
                'profil' => $this->model->get_data()
            ];
            
            $msg = [
                'data' => view('Backend/Modul/Profil/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

     public function list_foto()
    {

        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Foto profil',
                'items' => $this->model->findAll(),
                'profil' => $this->model->get_data()
            ];
            
            $msg = [
                'data' => view('Backend/Modul/Profil/_foto', $data)
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
        //
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
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nik' => [
                    'label' => 'NIK',
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
                'no_telp' => [
                    'label' => 'Nomor telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        'nik' => $this->validation->getError('nik'),
                        'nip' => $this->validation->getError('nip'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp' => $this->validation->getError('no_telp'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama' => $this->request->getVar('nama'),
                    'nik' => $this->request->getVar('nik'),
                    'nip' => $this->request->getVar('nip'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'id_users' => $this->request->getVar('id_users')
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
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nik' => [
                    'label' => 'NIK',
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
                'no_telp' => [
                    'label' => 'Nomor telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        'nik' => $this->validation->getError('nik'),
                        'nip' => $this->validation->getError('nip'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp' => $this->validation->getError('no_telp'),
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'nama' => $this->request->getVar('nama'),
                    'nik' => $this->request->getVar('nik'),
                    'nip' => $this->request->getVar('nip'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp')
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
        //
    }
}
