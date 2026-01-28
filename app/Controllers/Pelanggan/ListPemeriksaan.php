<?php

namespace App\Controllers\Pelanggan;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\PeraturanModel;
use App\Models\PermintaanPelangganModel;
use App\Models\PermintaanPemeriksaanModel;
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
    protected $model;
    protected $modelPermintaan;
    protected $modelLab;

    protected $modelSampel;
    protected $title;
    public function __construct()
    {
        $this->title = 'Pemeriksaan';
        $this->model = new PermintaanPemeriksaanModel();
        $this->modelPermintaan = new PermintaanPelangganModel();
        $this->modelLab = new LaboratoriumModel();
        $this->modelSampel = new JenisSampelModel();
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
        return view('Pelanggan/Pemeriksaan/List/index', $data);
    }

     public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
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
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
                'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                'no_reg' => $this->request->getVar('no_reg'),
                'masterLab' => $this->modelLab->get_data()
            ];
            $msg = [
                'data' => view('Pelanggan/Pemeriksaan/List/_add', $data)
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

    public function list_sampel()
    {
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $result = $this->modelSampel->where('id_lab', $id_lab)->get()->getResultArray();
            
            foreach ($result as $rows) {
                $data[] = '<option value="'.$rows['id'].'">'.$rows['jenis_sampel'].' '.$rows['keterangan'].'</option>';
            }

            $msg = ['data' => $data];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function detail_sampel()
    {
        if ($this->request->isAJAX()) {
            $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            $sampel = $this->modelSampel->find($id_jenis_sampel);
            $id_peraturan = $sampel['id_peraturan'];
            $peraturan = new PeraturanModel();
            $result = $peraturan->find($id_peraturan);
            $data = $result['peraturan'];
            $msg = ['data' => $data];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
