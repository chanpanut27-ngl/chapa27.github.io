<?php

namespace App\Controllers;

use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProsesLhu extends ResourceController
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
        $this->title = 'Pengantar LHU';
        $this->modelPengantarLhu = new PengantarLhuModel();
        $this->modelLabTujuan = new LaboratoriumTujuanModel();
    }

    public function index($id = null)
    {
        $kode_pengantar = $id;
        $first_menu = $this->modelLabTujuan->where('kode_pengantar', $kode_pengantar)
            ->orderBy('id', 'ASC')->limit(1)->get()->getResultArray();

        foreach ($first_menu as $row) {
           $fm =  $row['id_laboratorium'];
        }

        $data = [
            'title' => 'Data pelanggan',
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar)
            // 'first_menu' => $fm
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

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function keterangan($id = null)
    {
        $kode_pengantar = $id;
        $data = [
            'title' => 'Keterangan',
            'kode_pengantar' => $kode_pengantar
        ];
        return view('Backend/Modul/Pelayanan/Lhu/Keterangan/index', $data);
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
        
    }
}
