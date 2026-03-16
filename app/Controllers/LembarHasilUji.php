<?php

namespace App\Controllers;

use App\Models\PermintaanPemeriksaanModel;
use CodeIgniter\HTTP\ResponseInterface;

class LembarHasilUji extends BaseController
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
        $this->title = 'Lembar Hasil Uji';
        $this->model = new PermintaanPemeriksaanModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title
        ];
        return view('Backend/Modul/Lhu/index', $data);
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
        if ($this->request->isAJAX()) {
            $no_reg = $this->request->getVar('no_reg');
            $valid = $this->validate([
                'no_reg' => [
                    'label' => 'Nomor registrasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_reg' => $this->validation->getError('no_reg')
                    ]
                ];
            } else {
                    $data = [
                        'nama_lab' => $this->model->get_lab_lhu($no_reg),
                        'items' => $this->model->get_parameter_lhu($no_reg)
                    ];
                    $msg = [
                        'data' => view('Backend/Modul/Lhu/__data', $data)
                    ];
            }

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
        //
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
