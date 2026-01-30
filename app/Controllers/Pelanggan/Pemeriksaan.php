<?php

namespace App\Controllers\Pelanggan;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\ProfilPelangganModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class Pemeriksaan extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    protected $title;
    protected $model;
    protected $modelLab;
    protected $modelSampel;
    protected $modelProfil;
    protected $modelPerPel;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Permintaan pemeriksaan';
        $this->model = new PermintaanPemeriksaanModel();
        $this->modelPerPel = new PermintaanPelangganModel();
        $this->modelLab = new LaboratoriumModel();
        $this->modelSampel = new JenisSampelModel();
        $this->modelProfil = new ProfilPelangganModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $dataPelanggan = new ProfilPelangganModel();

        $data = [
            'title' => 'Data ' . $this->title,
            'profil' => $dataPelanggan->get_data()
        ];
        return view('Pelanggan/Pemeriksaan/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->modelPerPel->where('created_by', user()->username)->findAll()
            ];
            $msg = [
                'data' => view('Pelanggan/Pemeriksaan/_data', $data)
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
   
}
