<?php

namespace App\Controllers;

use App\Models\InstalasiModel;
use App\Models\PenanggungJawabLhuModel;
use App\Models\PerintahUjiSampelModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class PerintahUjiSampel extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $modelPj;
    protected $modelInstalasi;
    protected $validation;
    protected $time;
    protected $today;

    public function __construct()
    {
        $this->title = 'Surat Perintah Uji Sampel';
        $this->model = new PerintahUjiSampelModel();
        $this->modelPj = new PenanggungJawabLhuModel();
        $this->modelInstalasi = new InstalasiModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Perintah-uji/index', $data);
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
    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function new()
    {
         if ($this->request->isAJAX()) {

            $_data = '';
            $id_instalasi = $this->request->getVar('id_instalasi');
            $kode_pengantar = $this->request->getVar('kode_pengantar');

            $tgl_terima = $this->modelPj->where('kode_pengantar', $kode_pengantar)->first();
            $instalasi = $this->modelInstalasi->find($id_instalasi);
            if ($id_instalasi == 1) {
                $_data = $this->model->get_data_sampel_lingkungan($kode_pengantar);
            }else{
                $data = null;
            }

            $data = [
                'title' => 'Tambah ' . $this->title . ' ('.$kode_pengantar.')',
                'id_instalasi' => $id_instalasi,
                'instalasi' => $instalasi,
                'kode_pengantar' => $kode_pengantar,
                'tgl_terima' => $tgl_terima,
                'items' => $_data
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/_add', $data)
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
