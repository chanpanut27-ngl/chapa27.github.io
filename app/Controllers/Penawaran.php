<?php

namespace App\Controllers;

use App\Models\PermintaanPelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Penawaran extends BaseController
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
        return view('Backend/Modul/Pelayanan/Penawaran/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->m_permintaan->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Penawaran/__data', $data)
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
         $data = [
            'title' => 'Data ' . $this->title,
            'no_reg' => $id,
            'items' => $this->m_permintaan->where('no_reg', $id)->first()
        ];
        return view('Backend/Modul/Pelayanan/Penawaran/__detail', $data);
    }

    public function show_surat($id = null)
    {
        if ($this->request->isAJAX()) {
            $no_reg = $this->request->getVar('no_reg');
            $data = [
                'items' => $this->m_permintaan->where('no_reg', $no_reg)->first()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Penawaran/__detail_surat', $data)
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
