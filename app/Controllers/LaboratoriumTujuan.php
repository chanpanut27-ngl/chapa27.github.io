<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;

class LaboratoriumTujuan extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $time;
    protected $validation;
    protected $today;
    protected $modelPengantarLhu;
    protected $modelLabTujuan;

    public function __construct()
    {
        $this->title = 'Laboratorium Tujuan';
        $this->model = new LaboratoriumModel();
        $this->modelPengantarLhu = new PengantarLhuModel();
        $this->modelLabTujuan = new LaboratoriumTujuanModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();
    }

    public function index($id = null)
    {
        $data = [
            'title' => $this->title,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($id),
            'kode_pengantar' => $id
        ];

        return view('Backend/Modul/Pelayanan/Lab-tujuan/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    
    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->modelLabTujuan->where('kode_pengantar', $id)->findAll(),
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lab-tujuan/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new($id = null)
    {
       if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah '.$this->title,
                // 'items' => $this->modelPengantarLhu->get_data_by_id_lhu($id),
                'masterLab' => $this->model->findAll(),
                'lab_tujuan' => $this->modelLabTujuan->where('id_pengantar_lhu', $id)->findAll(),
                'id_pengantar' => $id
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Lab-tujuan/_add', $data)
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
             $idLab = $this->request->getVar('id_laboratorium');
             $countJlhLab = count($idLab ?? []);

                for ($i=0; $i < $countJlhLab; $i++) { 

                    $simpandata = [
                        'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                        'id_pengantar_lhu' => $this->request->getVar('id_pengantar_lhu'),
                        'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                        'id_laboratorium' => $idLab[$i]    
                    ];

                    $this->modelLabTujuan->save($simpandata);
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
