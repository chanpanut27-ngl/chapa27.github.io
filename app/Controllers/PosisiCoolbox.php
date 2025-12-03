<?php

namespace App\Controllers;

use App\Models\CoolboxModel;
use App\Models\InstansiModel;
use App\Models\PosisiCoolboxModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class PosisiCoolbox extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $masterInstansi;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Posisi Coolbox';
        $this->model = new PosisiCoolboxModel();
        $this->masterInstansi = new InstansiModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title,
        ];
        return view('Backend/Modul/Pengaturan-coolbox/Posisi/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data_all()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pengaturan-coolbox/Posisi/_data', $data)
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
                'title' => 'Tambah ' . $this->title,
                'coolbox' => $this->model->get_data()
            ];

            $msg = [
                'data' => view('Backend/Modul/Pengaturan-coolbox/Posisi/_add', $data)
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

            $idCoolbox = $this->request->getVar('id_coolbox');
            $status = $this->request->getVar('status');
            $tanggal = $this->request->getVar('tanggal');
            
            $cek_data = $this->model->cek_data($idCoolbox, $status, $tanggal);
           
            $valid = $this->validate([
                'id_coolbox' => [
                    'label' => 'Kode coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'status' => [
                    'label' => 'Status',
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
                        'id_coolbox' => $this->validation->getError('id_coolbox'),
                        'status' => $this->validation->getError('status'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else if ($cek_data) {
                $msg = [
                    'error' => 'Data gagal disimpan'
                ];
            } else {
                $simpandata = [
                    'id_coolbox' => $idCoolbox,
                    'status' => $status,
                    'tanggal' => $tanggal,
                    'jam' => $this->request->getVar('jam'),
                    'keterangan' => $this->request->getVar('keterangan')
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
                'coolbox' => $this->model->get_data(),
                'title' => 'Edit ' . $this->title
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pengaturan-coolbox/Posisi/_edit', $data)
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
            $idCoolbox = $this->request->getVar('id_coolbox');
            $status = $this->request->getVar('status');
            $tanggal = $this->request->getVar('tanggal');
            
            $cek_data = $this->model->cek_data($idCoolbox, $status, $tanggal);
           
            $valid = $this->validate([
                'id_coolbox' => [
                    'label' => 'Kode coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'status' => [
                    'label' => 'Status',
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
                        'id_coolbox' => $this->validation->getError('id_coolbox'),
                        'status' => $this->validation->getError('status'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else if ($cek_data) {
                $msg = [
                    'error' => 'Data gagal disimpan'
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'id_coolbox' => $idCoolbox,
                    'status' => $status,
                    'tanggal' => $tanggal,
                    'jam' => $this->request->getVar('jam'),
                    'keterangan' => $this->request->getVar('keterangan')
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


    public function add_foto($id = null)
    {
           if ($this->request->isAJAX()) {
            $q = $this->model->find($id);
            $idCoolbox = $q['id_coolbox'];
            $masterCoolbox = new CoolboxModel();
            $coolbox = $masterCoolbox->find($idCoolbox); 
            $data = [
                'items' => $this->model->find($id),
                'coolbox' => $coolbox,
                'title' => 'Tambah Foto'
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pengaturan-coolbox/Posisi/_add_foto', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        } 

    }

    Public function upload_foto()
    {
        if ($this->request->isAJAX()) {

            $kodeCoolbox = $this->request->getVar('kode_coolbox');
            $status = $this->request->getVar('status');
            $fileOld = $this->request->getVar('file_old');
            $fileDocument = $this->request->getFile('upload_foto');
            $id = $this->request->getVar('id');

            $uploadPath = FCPATH . 'uploads/coolbox/'.$kodeCoolbox.'/';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

                $fileName = $status.'_'.str_replace(" ", "_", $fileDocument->getName());

                if ($fileOld == '') {
                    $fileDocument->move($uploadPath, $fileName);
                    $simpandata = [
                        'foto' => $fileName,
                    ];
                    $this->model->update($id, $simpandata);
                    $msg = [
                        'sukses' => 'Foto berhasil di simpan'
                    ];
                } else {
                    $expd = explode("_", $fileOld);
                   if ($expd[0] == 1) {
                        unlink($uploadPath . $fileOld);
                        $fileDocument->move($uploadPath, $fileName);
                        $simpandata = [
                            'foto' => $fileName,
                        ];
                        $this->model->update($id, $simpandata);
                        $msg = [
                            'sukses' => 'File berhasil di ubah'
                        ];
                   }
                }
                    echo json_encode($msg);              

        } else {
            exit('Not Process');
        }
    }

}
