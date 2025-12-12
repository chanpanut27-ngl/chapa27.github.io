<?php

namespace App\Controllers;

use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class ProsesPengantarLhu extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $modelPengantarLhu;
    protected $modelLabTujuan;

    public function __construct()
    {
        $this->title = 'Proses Pengantar LHU';
        $this->modelPengantarLhu = new PengantarLhuModel();
        $this->modelLabTujuan = new LaboratoriumTujuanModel();
    }

    public function index($id = null)
    {
        $kode_pengantar = $id;

        $data = [
            'title' => 'Data pelanggan',
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar)
        ];

       return view('Backend/Modul/Pelayanan/Lhu/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */

    public function list_menu($param1, $param2)
    {
        $kode_pengantar = $param1;
        $id_lab = $param2;
        $data = [
            'title' => 'Entry ' . $this->title,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'id_lab' => $id_lab,
            'kode_pengantar' => $kode_pengantar
        ];
       return view('Backend/Modul/Pelayanan/Lhu/_menu', $data);
    }

    public function pilih_menu($param1 = null, $param2 = null) 
    {

     $kode_pengantar = $param1;
     $id_lab = $param2;  

     $kategori_lab = $this->modelLabTujuan->get_data_kategori_lab($kode_pengantar, $id_lab);
     foreach ($kategori_lab as $row) {
        $nama_lab = $row['nama_lab'];
        $kode_pengantar = $row['kode_pengantar'];
        $id_lab = $row['id_laboratorium'];
     }
    
     $data = [
        'title' => $nama_lab,
        'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
        'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
        'kategori_lab' => $kategori_lab,
        'kode_pengantar' => $kode_pengantar,
        'id_lab' => $id_lab,
    ];

       return view('Backend/Modul/Pelayanan/Lhu/_pilih_menu', $data);
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
