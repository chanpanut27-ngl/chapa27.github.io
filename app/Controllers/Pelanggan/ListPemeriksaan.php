<?php

namespace App\Controllers\Pelanggan;

use App\Models\ProfilPelangganModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class ListPemeriksaan extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function __construct()
    {
        $this->title = 'Pemeriksaan';
    }

    public function index($id = null)
    {
        $dataPelanggan = new ProfilPelangganModel();

        $data = [
            'title' => 'Data ' . $this->title,
            'profil' => $dataPelanggan->get_data()
        ];
        return view('Pelanggan/Pemeriksaan/List/index', $data);
    }

     public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->modelPerPel->findAll()
            ];
            $msg = [
                'data' => view('Pelanggan/Pemeriksaan/List/_data', $data)
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
