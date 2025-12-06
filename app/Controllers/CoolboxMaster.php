<?php

namespace App\Controllers;

use App\Models\CoolboxModel;
use App\Models\InstansiModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class CoolboxMaster extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $masterInstansi;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Coolbox';
        $this->model = new CoolboxModel();
        $this->masterInstansi = new InstansiModel();
        $this->validation = \Config\Services::validation();
    }

    public function generate_kode_coolbox($param = null) 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->where('id_instansi', $param)->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'CB.'.sprintf('%02d', $param).'/'.sprintf('%02d', $nomorUrut);
        
        return $nomorAntrian;
    }

    public function index()
    {

        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Master/Coolbox/index', $data);
    }

    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/coolbox/_data', $data)
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
                'masterInstansi' => $this->masterInstansi->get_data(),
                'counter' => $this->generate_kode_coolbox()
            ];
            $msg = [
                'data' => view('Backend/Master/Coolbox/_add', $data)
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
                'id_instansi' => [
                    'label' => 'Asal instansi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_instansi' => $this->validation->getError('id_instansi')
                    ]
                ];
            } else {
                $id_instansi = $this->request->getVar('id_instansi');
                $simpandata = [
                    'kode_coolbox' => $this->generate_kode_coolbox($id_instansi),
                    'id_instansi' => $this->request->getVar('id_instansi')
                ];
                $this->model->save($simpandata);
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id),
                'masterInstansi' => $this->masterInstansi->get_data()
            ];
            $msg = [
                'sukses' => view('Backend/Master/Coolbox/_edit', $data)
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
            $valid = $this->validate([
               'id_instansi' => [
                    'label' => 'Asal instansi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_instansi' => $this->validation->getError('id_instansi')
                    ]
                ];
            } else {
                $simpandata = [
                   'id' => $this->request->getVar('id'),
                   'id_instansi' => $this->request->getVar('id_instansi'),
                   'is_active' => $this->request->getVar('is_active')
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
            }
            echo json_encode($msg);
        } else {
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
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
