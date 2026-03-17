<?php

namespace App\Controllers;

use App\Models\LembarHasilUjiModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\PermintaanSampelModel;
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
                    $pemeriksaan = $this->model->where('no_reg', $no_reg)->first();
                    $id_pelanggan = $pemeriksaan['id_pelanggan'] ?? null;
                    $permintaan_sampel = new PermintaanSampelModel();
                    $data = [
                        'items' => $permintaan_sampel->get_data($id_pelanggan),
                    ];
                    if ($pemeriksaan) {
                        $msg = [
                            'data' => view('Backend/Modul/Lhu/__data', $data)
                        ];
                    } else {
                        $msg = [
                            'error' => 'Data tidak di temukan'
                        ];
                    }
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
        if ($this->request->isAJAX()) {
            $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            $id_pelanggan = $this->request->getVar('id_pelanggan');

            $this->model->select('permintaan_pemeriksaan.id as id_pp, id_parameter, parameter, id_lab, nama_lab');
            $this->model->join('master_parameter mp', 'mp.id=permintaan_pemeriksaan.id_parameter');
            $this->model->join('master_laboratorium ml', 'ml.id=permintaan_pemeriksaan.id_lab');
            $this->model->where('permintaan_pemeriksaan.id_pelanggan', $id_pelanggan);
            $this->model->where('permintaan_pemeriksaan.id_jenis_sampel', $id_jenis_sampel);
            $query = $this->model->findAll();

            $data = [
                'title' => 'Isi hasil uji',
                'items' => $query,
                'id_pelanggan' => $id_pelanggan,
                'id_jenis_sampel' => $id_jenis_sampel,
            ];

            $msg = [
                'data' => view('Backend/Modul/Lhu/__add', $data)
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
            $msg = '';
            $id_pp = $this->request->getVar('id_pemeriksaan');
            $count = count($id_pp ?? []); 

           
            for ($i=0; $i < $count; $i++) { 
                $save = [
                    'id_pemeriksaan' => $id_pp[$i],
                    'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                    'id_lab' => $this->request->getVar('id_lab'),
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'id_parameter' => $this->request->getVar('id_parameter')[$i],
                    'satuan' => $this->request->getVar('satuan')[$i],
                    'kadar_maksimum' => $this->request->getVar('kadar_maksimum')[$i],
                    'hasil_pengujian' => $this->request->getVar('hasil_pengujian')[$i],
                    // 'keterangan' => $this->request->getVar('keterangan')[$i],
                ];

                $insert = $this->lhu->insert($save);
                if ($insert) {
                    $msg = [
                        'sukses' => 'Data berhasil disimpan'
                    ];
                } else {
                    $msg = [
                        'error' => 'Data gagal disimpan'
                    ];
                }
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
