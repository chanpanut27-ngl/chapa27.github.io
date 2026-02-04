<?php

namespace App\Controllers;

use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\PermintaanSampelModel;
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

    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $id_pelanggan = $this->request->getVar('id_pelanggan');
            $data = [
                'items' => $this->model->get_data_list($id_pelanggan)
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Pemeriksaan/_data', $data)
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
    public function show_lab($id = null)
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Detail Lab',
                'items' => $this->model->detail_lab($id)
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Pemeriksaan/_detail_lab', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }  
    }

    public function show_permintaan_sampel($id = null)
    {
        if ($this->request->isAJAX()) {
            $permintaan_sampel = new PermintaanSampelModel();
            $data = [
                'title' => 'Detail sampel',
                'items' => $permintaan_sampel->get_data($id)
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Pemeriksaan/_detail_sampel', $data)
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
