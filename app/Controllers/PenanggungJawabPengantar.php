<?php

namespace App\Controllers;

use App\Models\PenanggungJawabPengantarModel;
use CodeIgniter\HTTP\ResponseInterface;

class PenanggungJawabPengantar extends BaseController
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
        $this->title = 'Penanggung jawab';
        $this->model = new PenanggungJawabPengantarModel();
    }

    public function index()
    {   
         $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan/Lab/Penanggung-jawab/index', $data);
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
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $id_kat_lab = $this->request->getVar('id_kat_lab');
            $q = $this->model->where('kode_pengantar', $kode_pengantar)
            ->where('id_kat_lab', $id_kat_lab)->get()->getResultArray();
            foreach ($q as $r) {
                $tgl_terima_sampel = $r['tgl_terima_sampel'];
            }
            $data = [
                'konversi_tanggal' => $this->model->konversi_tanggal(@$tgl_terima_sampel),
                'items' => $q
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lab/Penanggung-jawab/__data', $data)
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
                'data' => view('Backend/Modul/Pelayanan/Lab/Penanggung-jawab/__add', $data)
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
                'nama_pjb' => [
                    'label' => 'Nama penanggungjawab',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pjb' => $this->validation->getError('nama_pjb')
                    ]
                ];
            } else {
                $simpandata = [
                    'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                    'nama_pjb' => $this->request->getVar('nama_pjb'),
                    'no_telp_pjb' => $this->request->getVar('no_telp_pjb'),
                    'penerima_sampel' => $this->request->getVar('penerima_sampel'),
                    'no_telp_penerima' => $this->request->getVar('no_telp_penerima'),
                    'tgl_terima_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_terima_sampel'))),
                    'jam_terima_sampel' => $this->request->getVar('jam_terima_sampel'),
                    'id_kat_lab' => $this->request->getVar('id_kat_lab'),
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
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
                'sukses' => view('Backend/Modul/Pelayanan/Lab/Penanggung-jawab/__edit', $data)
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
                'nama_pjb' => [
                    'label' => 'Nama penanggungjawab',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pjb' => $this->validation->getError('nama_pjb')
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'nama_pjb' => $this->request->getVar('nama_pjb'),
                    'no_telp_pjb' => $this->request->getVar('no_telp_pjb'),
                    'penerima_sampel' => $this->request->getVar('penerima_sampel'),
                    'no_telp_penerima' => $this->request->getVar('no_telp_penerima'),
                    'tgl_terima_sampel' => date('Y-m-d', strtotime($this->request->getVar('tgl_terima_sampel'))),
                    'jam_terima_sampel' => date('H:i', strtotime($this->request->getVar('jam_terima_sampel')))
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
            }
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
