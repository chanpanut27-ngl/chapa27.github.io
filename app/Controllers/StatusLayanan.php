<?php

namespace App\Controllers;

use App\Models\PermintaanPelangganModel;
use App\Models\StatusLayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class StatusLayanan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $m_permintaan;

    public function __construct()
    {
        $this->title = 'Status Layanan';
        $this->model = new StatusLayananModel();
        $this->m_permintaan = new PermintaanPelangganModel();
    }
    
    public function index($id = null)
    {
       if ($this->request->isAJAX()) {

            $data = [
                'title' => $this->title,
                'id_pelanggan' => $id,
                'items' => $this->m_permintaan->find($id)
            ];
            $msg = [
                'sukses' => view('Backend/Status/index', $data)
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

    public function list($id = null)
    {

        if ($this->request->isAJAX()) {
            $id_pelanggan = $this->request->getVar('id_pelanggan');

            $data = [
                'items' => $this->model->get_data_all($id_pelanggan)
            ];
            $msg = [
                'data' => view('Backend/Status/__data', $data)
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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
              $save = [
                    'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status' => $this->request->getVar('status')
                ];
                $cek_data = $this->model->where('status', $save['status'])->
                where('id_pelanggan', $save['id_pelanggan'])->find();

                // cek status di tolak
                $denied = $this->model->
                where('id_pelanggan', $save['id_pelanggan'])->
                where('status', 'Permintaan di Tolak')->
                orWhere('status', 'Penawaran di Tolak')->first();
   
                if ($cek_data) {
                    $msg = [
                        'error' => 'Status sudah ada'
                    ];
                    
                } else if ($denied) {
                    $msg = [
                        'error' => 'Status Permintaan di Tolak atau Penawaran di Tolak'
                    ];

                } else {
                    
                    $this->model->save($save);
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
