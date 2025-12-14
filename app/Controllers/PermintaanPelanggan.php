<?php

namespace App\Controllers;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\PermintaanPelangganModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class PermintaanPelanggan extends ResourceController
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
    protected $validation;

    public function __construct()
    {
        $this->title = 'Permintaan pemeriksaan';
        $this->model = new PermintaanPelangganModel();
        $this->modelLab = new LaboratoriumModel();
        $this->modelSampel = new JenisSampelModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Frontend/Permintaan/index', $data);
    }

    public function generate_kode_permintaan() 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'Reg.' . sprintf('%04d', $nomorUrut) . '.' . date('dmY');
        
        return $nomorAntrian;
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Frontend/Permintaan/_data', $data)
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
                'masterLab' => $this->modelLab->findAll(),
                'masterSampel' => $this->modelSampel->findAll()
            ];
            $msg = [
                'data' => view('Frontend/Permintaan/_add', $data)
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
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama_pengirim' => [
                    'label' => 'Instansi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim')
                    ]
                ];
            } else {
                $simpandata = [
                    'no_reg' => $this->generate_kode_permintaan(),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel')
                ];
                $this->model->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
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
