<?php

namespace App\Controllers\Pelanggan;

use App\Models\PermintaanPelangganModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Penawaran extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $m_permintaan;

    public function __construct()
    {
        $this->title = 'Penawaran';
        $this->m_permintaan = new PermintaanPelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
        ];
        return view('Pelanggan/Penawaran/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->m_permintaan->where('created_by', user()->username)->findAll()
            ];
            $msg = [
                'data' => view('Pelanggan/Penawaran/__data', $data)
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
