<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Pelanggan\ProfilPelangganModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class Profil extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_users;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Profil';
        $this->model = new ProfilPelangganModel();
        $this->m_users = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'profil' => $this->model->get_data(),
            'items' => $this->m_users->get_data()

        ];
        return view('Pelanggan/Profil/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function list($id = null)
    {
        if ($this->request->isAJAX()) {

            $data = [
                'profil' => $this->model->get_data(),
                'items' => $this->m_users->get_data()
            ];
            
            $msg = [
                'data' => view('Pelanggan/Profil/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function list_foto()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'profil' => $this->model->get_data(),
                'items' => $this->m_users->get_data()
            ];
            
            $msg = [
                'data' => view('Pelanggan/Profil/__foto', $data)
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
                'instansi' => [
                    'label' => 'Instansi',
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
                        'instansi' => $this->validation->getError('instansi'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp' => $this->validation->getError('no_telp'),
                    ]
                ];
            } else {
                $save = [
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'id_users' => $this->request->getVar('id_users')
                ];
                $this->model->save($save);
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
                'instansi' => [
                    'label' => 'Instansi',
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
                        'instansi' => $this->validation->getError('instansi'),
                        'alamat' => $this->validation->getError('alamat'),
                        'no_telp' => $this->validation->getError('no_telp'),
                    ]
                ];
            } else {
                $save = [
                    'id' => $this->request->getVar('id'),
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp')
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
    public function do_upload()
    {
        if ($this->request->isAJAX()) {
            $foto = $this->request->getFile('user_image');
            $fileName = user()->username.'_'.str_replace(" ", "_", $foto->getRandomName());
            $uploadPath = FCPATH . 'Uploads/Foto/';
            $fullname = $this->request->getVar('fullname');

            $id = ['id' => user_id()];
            $foto_lama = $this->m_users->find(user_id());

            $simpandata = [
                'user_image' => $fileName,
                'fullname' => $fullname
            ];
            
            $upload = $this->m_users->update($id, $simpandata);
            
            if (!$upload) {
                $msg = [
                    'error' => 'Foto gagal diubah'
                ];
            } else if (str_contains(strtolower($fileName), strtolower(user()->username))) {
                $foto->move($uploadPath, $fileName);
                @unlink($uploadPath . $foto_lama['user_image']);

                $msg = [
                    'sukses' => 'Foto berhasil diubah'
                ];
            } else {
                $foto->move($uploadPath, $fileName);
                $msg = [
                    'sukses' => 'Foto berhasil diubah'
                ];
            }
            echo json_encode($msg);

        } else {
            exit('Not Proccess');
        }
    }
}
