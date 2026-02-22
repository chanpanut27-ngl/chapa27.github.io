<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\Pelanggan\ProfilPelangganModel;
use App\Models\PermintaanPelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pemeriksaan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_profil;
    protected $m_permintaan;
    protected $m_lab;

    public function __construct()
    {
        $this->title = 'Pemeriksaan';
        $this->model = new PermintaanPelangganModel();
        $this->m_profil = new ProfilPelangganModel();
        $this->m_lab = new LaboratoriumModel();
    }

    public function index($id)
    {
        
        $data = [
            'title' => 'Data ' . $this->title,
            'profil' => $this->m_profil->get_data(),
            'no_reg' => $id,
            'items' => $this->model->where('no_reg', $id)->first()
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

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->where('no_reg', $this->request->getGet('no_reg'))->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pemeriksaan/__data', $data)
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
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
                'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                'no_reg' => $this->request->getVar('no_reg'),
                'masterLab' => $this->m_lab->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pemeriksaan/__add', $data)
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
