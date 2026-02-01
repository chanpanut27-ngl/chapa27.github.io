<?php

namespace App\Controllers;

use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\ProfilPelangganModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class DataPemeriksaan extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $validation;
    protected $modelPermintaan;

    public function __construct()
    {
        $this->title = 'Pemeriksaan';
        $this->model = new PermintaanPemeriksaanModel();
        $this->modelPermintaan = new PermintaanPelangganModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($id = null)
    {
        $dataPelanggan = new ProfilPelangganModel();
        $permintaan = $this->modelPermintaan->find($id);
        $id_pelanggan = $permintaan['id'];
        $no_reg = $permintaan['no_reg'];
        $data = [
            'title' => 'Data ' . $this->title,
            'profil' => $dataPelanggan->get_data(),
            'items' => $permintaan,
            'id_pelanggan' => $id_pelanggan,
            'no_reg' => $no_reg
        ];
        return view('Backend/Modul/Pelayanan/Pemeriksaan/index', $data);

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
