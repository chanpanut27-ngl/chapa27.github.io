<?php

namespace App\Controllers\Pelanggan;

use App\Models\ProfilPelangganModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class Profil extends ResourceController
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
        $this->model = new ProfilPelangganModel();
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
        return view('Pelanggan/Profil/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {

            $data = [
                'profil' => $this->model->get_data(),
                'items' => $this->modelUsers->cek_login_user()
            ];
            
            $msg = [
                'data' => view('Pelanggan/Profil/_data', $data)
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
                'profil' => $this->model->get_data(),
                'items' => $this->modelUsers->cek_login_user()
            ];
            
            $msg = [
                'data' => view('Pelanggan/Profil/_foto', $data)
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
                $simpandata = [
                    'instansi' => $this->request->getVar('instansi'),
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
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'instansi' => $this->request->getVar('instansi'),
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
    public function do_upload()
    {
        if ($this->request->isAJAX()) {
            $foto = $this->request->getFile('user_image');
            $fileName = user()->username.'_'.str_replace(" ", "_", $foto->getRandomName());
            $uploadPath = FCPATH . 'Uploads/Foto/';
            $fullname = $this->request->getVar('fullname');

            $id = ['id' => user_id()];
            $foto_lama = $this->modelUsers->find(user_id());

            $simpandata = [
                'user_image' => $fileName,
                'fullname' => $fullname
            ];
            
            $upload = $this->modelUsers->update($id, $simpandata);
            
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
