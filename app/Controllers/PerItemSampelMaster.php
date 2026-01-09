<?php

namespace App\Controllers;

use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\PeraturanModel;
use App\Models\PerItemSampelModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class PerItemSampelMaster extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $validation;
    protected $modelLab;
    protected $modelPeraturan;
    protected $modelSampel;


    public function __construct()
    {
        $this->cachePage(5);
        $this->title = 'Per Parameter Sampel';
        $this->model = new PerItemSampelModel();
        $this->modelLab = new LaboratoriumModel();
        $this->modelPeraturan = new PeraturanModel();
        $this->modelSampel = new JenisSampelModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Item-sampel/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Master/Item-sampel/_data', $data)
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
                'masterLab' => $this->modelLab->get_data(),
                'masterPeraturan' => $this->modelPeraturan->findAll()
            ];
            $msg = [
                'data' => view('Backend/Master/Item-sampel/_add', $data)
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
                'id_jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'id_lab' => [
                    'label' => 'Laboratorium',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_lab' => $this->validation->getError('id_lab'),
                        'id_jenis_sampel' => $this->validation->getError('id_jenis_sampel'),
                    ]
                ];
            } else {
                $simpandata = [
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'parameter' => $this->request->getVar('parameter'),
                    'metode' => $this->request->getVar('metode'),
                    'harga_per_titik' => $this->request->getVar('harga_per_titik')
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

    public function list_sampel()
    {
        $id_lab = $this->request->getVar('id_lab');

        $result = $this->modelSampel->where('id_lab', $id_lab)->get()->getResultArray();
    
        foreach ($result as $rows) {
            echo '<option value="'.$rows['id'].'">'.$rows['jenis_sampel'].'</option>';
        }
    }



}
