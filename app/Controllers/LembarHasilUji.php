<?php

namespace App\Controllers;

use App\Models\JenisSampelModel;
use App\Models\LembarHasilUjiModel;
use App\Models\PermintaanPemeriksaanModel;
use CodeIgniter\HTTP\ResponseInterface;

class LembarHasilUji extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $lhu;

    public function __construct()
    {
        $this->title = 'Lembar Hasil Uji';
        $this->model = new PermintaanPemeriksaanModel();
        $this->lhu = new LembarHasilUjiModel();

    }

    public function index()
    {
        $data = [
            'title' => $this->title
        ];
        return view('Backend/Modul/Lhu/index', $data);
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
        if ($this->request->isAJAX()) {
            $no_reg = $this->request->getVar('no_reg');
            $valid = $this->validate([
                'no_reg' => [
                    'label' => 'Nomor registrasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_reg' => $this->validation->getError('no_reg')
                    ]
                ];
            } else {
                $mjs = new JenisSampelModel();
                    $data = [
                        'nama_lab' => $mjs->findAll(),
                        'items' => $this->model->get_parameter_lhu($no_reg)
                    ];
                    $msg = [
                        'data' => view('Backend/Modul/Lhu/__data', $data)
                    ];
            }

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
            $id_pp = $this->request->getVar('id_pp');
            $count = count($id_pp ?? []); 
            $id_pelanggan = $this->request->getVar('id_pelanggan');
            $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            $id_parameter = $this->request->getVar('id_parameter');

            for ($i=0; $i < $count; $i++) { 

                $save = [
                    'id_pelanggan' => $id_pelanggan,
                    'no_reg' => $this->request->getVar('no_reg'),
                    'id_lab' => $this->request->getVar('id_lab'),
                    'id_jenis_sampel' => $id_jenis_sampel,
                    'id_pemeriksaan' => $id_pp[$i],
                    'id_parameter' => $id_parameter,
                    'satuan' => $this->request->getVar('satuan'),
                    'kadar_maksimum' => $this->request->getVar('kadar_maksimums'),
                    'hasil_pengujian' => $this->request->getVar('hasil_pengujian'),
                    'keterangan' => $this->request->getVar('keterangan'),
                ];
                
                $_data_lhu = $this->lhu->
                where('id_pelanggan', $id_pelanggan)->
                where('id_jenis_sampel', $id_jenis_sampel)->
                where('id_pemeriksaan', $id_pp[$i])->countAllResults();

                if ($_data_lhu > 0) {
                    $this->lhu->where('id_pelanggan', $id_pelanggan)->
                    where('id_jenis_sampel', $id_jenis_sampel)->
                    where('id_pemeriksaan', $id_pp[$i])->update($save);
                } else {
                    $this->lhu->insert($save);
                }
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('not process');
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
