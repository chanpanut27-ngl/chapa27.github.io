<?php

namespace App\Controllers;

use App\Models\BiayaAkomodasiModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class BiayaAkomodasi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Biaya akomodasi';
        $this->model = new BiayaAkomodasiModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Biaya-akomodasi/index', $data);
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
                'items' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Master/Biaya-akomodasi/_data', $data)
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
                'masterLab' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Master/Biaya-akomodasi/_add', $data)
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
                'uraian' => [
                    'label' => 'Uraian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'uang_harian' => [
                    'label' => 'Uang harian',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus angka'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'uraian' => $this->validation->getError('uraian'),
                        'uang_harian' => $this->validation->getError('uang_harian')
                    ]
                ];
            } else {
                $simpandata = [
                    'uraian' => $this->request->getVar('uraian'),
                    'transport' => $this->request->getVar('transport'),
                    'uang_harian' => $this->request->getVar('uang_harian')
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id)
            ];
            $msg = [
                'sukses' => view('Backend/Master/Biaya-akomodasi/_edit', $data)
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
                'uraian' => [
                    'label' => 'Uraian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'uang_harian' => [
                    'label' => 'Uang harian',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus angka'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'uraian' => $this->validation->getError('uraian'),
                        'uang_harian' => $this->validation->getError('uang_harian')
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'uraian' => $this->request->getVar('uraian'),
                    'transport' => $this->request->getVar('transport'),
                    'uang_harian' => $this->request->getVar('uang_harian'),
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
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
