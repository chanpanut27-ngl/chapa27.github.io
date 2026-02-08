<?php

namespace App\Controllers;

use App\Models\PermintaanPelangganModel;
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
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Permintaan/index', $data);
    }

    public function list() 
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Permintaan/__data', $data)
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
