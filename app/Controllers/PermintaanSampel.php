<?php

namespace App\Controllers;

use App\Models\PermintaanSampelModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class PermintaanSampel extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $model;

    public function __construct()
    {
        $this->model = new PermintaanSampelModel();
    }

    public function index()
    {
        //
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit Jumlah sampel',
                'items' => $this->model->find($id),
            ];
            $msg = [
                'sukses' => view('Data/Permintaan-sampel/__edit', $data)
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
                    'jumlah_sampel' => $this->request->getVar('jumlah_sampel')
                ];
                $this->model->save($simpandata);

                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
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
            $db = \Config\Database::connect();

            $builder = $this->model->find($id);
            $id_pelanggan = $builder['id_pelanggan'];
            $id_jenis_sampel = $builder['id_jenis_sampel'];

            $db->transStart();
            $sql1 = 'DELETE FROM permintaan_pemeriksaan WHERE id_jenis_sampel = "'.$id_jenis_sampel.'" AND id_pelanggan = "'.$id_pelanggan.'"';
            $db->query($sql1);
            $sql2 = 'DELETE FROM permintaan_sampel WHERE id = "'.$id.'"';
            $db->query($sql2);
            $db->transComplete();
            $var = '';
            if ($db->transStatus() === FALSE) {
                ?>
                <script>alert('Data gagal dihapus');</script>
                <?php
            } else {
                $var = 'Data berhasil dihapus';
            }
            $msg = [
                'sukses' => $var
            ];
            echo json_encode($msg);

        
        } else {
            exit('Not Process');
        }
    }
}
