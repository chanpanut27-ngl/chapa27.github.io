<?php

namespace App\Controllers;

use App\Models\KeteranganLhuPenyakitModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class KeteranganLhuPenyakit extends ResourceController
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
        $this->title = 'Keterangan Lab.Penyakit';
        $this->model = new KeteranganLhuPenyakitModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {   
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-penyakit/index', $data);
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
            $data = [
                'items' => $this->model->where('kode_pengantar', $kode_pengantar)->get()->getResultArray()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-penyakit/_data', $data)
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
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $data = [
                'title' => 'Tambah ' . $this->title,
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar,
                'jumlah' => $this->model->where('kode_pengantar', $kode_pengantar)->countAllResults()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-penyakit/_add', $data)
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
                'paramater_tidak_dapat_di_uji' => $this->request->getVar('paramater_tidak_dapat_di_uji'),
                'sub_kontrak' => $this->request->getVar('sub_kontrak'),
                'kontrak_diulang' => $this->request->getVar('kontrak_diulang'),
                'permintaan_khusus' => $this->request->getVar('permintaan_khusus'),
                'keterangan' => $this->request->getVar('keterangan')
                
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
                'items' => $this->model->find($id),
                'title' => 'Edit ' . $this->title
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-penyakit/_edit', $data)
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
                'paramater_tidak_dapat_di_uji' => $this->request->getVar('paramater_tidak_dapat_di_uji'),
                'sub_kontrak' => $this->request->getVar('sub_kontrak'),
                'kontrak_diulang' => $this->request->getVar('kontrak_diulang'),
                'permintaan_khusus' => $this->request->getVar('permintaan_khusus'),
                'keterangan' => $this->request->getVar('keterangan')
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
