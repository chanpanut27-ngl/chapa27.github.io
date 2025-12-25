<?php

namespace App\Controllers;

use App\Models\KajiUlangKontrakPengantarModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class KajiUlangKontrakPengantar extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Kaji ulang permintaan & kontrak';
        $this->model = new KajiUlangKontrakPengantarModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {   
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kontrak/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function list()
    {
        if ($this->request->isAJAX()) {
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $id_kat_lab = $this->request->getVar('id_kat_lab');
            $data = [
                'items' => $this->model->where('kode_pengantar', $kode_pengantar)
                ->where('id_kat_lab', $id_kat_lab)->get()->getResultArray()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kontrak/_data', $data)
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
    public function new()
    {
        if ($this->request->isAJAX()) {
            $id_kat_lab = $this->request->getVar('id_kat_lab');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $id_kat_lab = $this->request->getVar('id_kat_lab');
            $data = [
                'title' => 'Tambah ' . $this->title,
                'id_kat_lab' => $id_kat_lab,
                'kode_pengantar' => $kode_pengantar,
                'jumlah' => $this->model->where('kode_pengantar', $kode_pengantar)
                ->where('id_kat_lab', $id_kat_lab)->countAllResults()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kontrak/_add', $data)
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
            $simpandata = [
                'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                'alat_utama' => $this->request->getVar('alat_utama'),
                'alat_pendukung' => $this->request->getVar('alat_pendukung'),
                'personil_lab' => $this->request->getVar('personil_lab'),
                'metode_pemeriksaan' => $this->request->getVar('metode_pemeriksaan'),
                'uji_mutu' => $this->request->getVar('uji_mutu'),
                'reagensa_dan_media' => $this->request->getVar('reagensa_dan_media'),
                'id_kat_lab' => $this->request->getVar('id_kat_lab')
            ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            echo json_encode($msg);
        }else{
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id)
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kontrak/_edit', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
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
        if ($this->request->isAJAX()) {
            $simpandata = [
                'id' => $this->request->getVar('id'),
                'alat_utama' => $this->request->getVar('alat_utama'),
                'alat_pendukung' => $this->request->getVar('alat_pendukung'),
                'personil_lab' => $this->request->getVar('personil_lab'),
                'metode_pemeriksaan' => $this->request->getVar('metode_pemeriksaan'),
                'uji_mutu' => $this->request->getVar('uji_mutu'),  
                'reagensa_dan_media' => $this->request->getVar('reagensa_dan_media'),  
            ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
            echo json_encode($msg);
        }else{
            exit('Not Process');
        }
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
        if ($this->request->isAJAX()) {

            $this->model->delete($id);
            $msg = [
                'sukses' => 'Data berhasil di hapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
