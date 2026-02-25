<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\Pelanggan\ProfilPelangganModel;
use App\Models\PermintaanPelangganModel;

class Permintaan extends BaseController
{
    protected $title;
    protected $model;
    protected $m_profil;
    protected $m_jenis_sampel;
    protected $m_lab;

    protected $validation;

    public function __construct()
    {
        $this->title = 'Permintaan';
        $this->model = new PermintaanPelangganModel();
        $this->m_lab = new LaboratoriumModel();
        $this->m_jenis_sampel = new JenisSampelModel();
        $this->m_profil = new ProfilPelangganModel();
    }

    public function index()
    {
      
        $data = [
            'title' => 'Data ' . $this->title,
            'profil' => $this->m_profil->get_data()
        ];
        return view('Pelanggan/Permintaan/index', $data);
    }


    public function list()
    {

        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->where('created_by', user()->username)->findAll()
            ];
            $msg = [
                'data' => view('Pelanggan/Permintaan/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
                'masterLab' => $this->m_lab->get_data(),
                'masterSampel' => $this->m_jenis_sampel->findAll(),
                'profil' => $this->m_profil->get_data()
            ];
            $msg = [
                'data' => view('Pelanggan/Permintaan/__add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function edit($id = null)
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Edit ' . $this->title,
                'items' => $this->model->find($id),
            ];
            $msg = [
                'sukses' => view('Pelanggan/Permintaan/__edit', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function create()
    {

         if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'nama_pengirim' => [
                    'label' => 'Nama pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'no_telp_pengirim' => [
                    'label' => 'No.Telp/Hp pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim'),
                        'no_telp_pengirim' => $this->validation->getError('no_telp_pengirim')
                    ]
                ];
            } else {
                $save = [
                    'no_reg' => $this->model->generate_no_reg(),
                    'kode_pelanggan' => $this->model->generate_kode_pelanggan(),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel'),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'instansi' => $this->request->getVar('instansi'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'no_telp_pengirim' => $this->request->getVar('no_telp_pengirim')
                ];
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

    public function update($id = null)
    {
         if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'nama_pengirim' => [
                    'label' => 'Nama pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'no_telp_pengirim' => [
                    'label' => 'No.Telp/Hp pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pengirim' => $this->validation->getError('nama_pengirim'),
                        'no_telp_pengirim' => $this->validation->getError('no_telp_pengirim')
                    ]
                ];
            } else {
                $save = [
                    'id' => $this->request->getVar('id'),
                    'nama_pengirim' => $this->request->getVar('nama_pengirim'),
                    'no_telp_pengirim' => $this->request->getVar('no_telp_pengirim'),
                    'spesimen_atau_sampel' => $this->request->getVar('spesimen_atau_sampel')
                ];
                $this->model->save($save);
                $msg = [
                    'sukses' => 'Data berhasil diubah'
                ];
            }
            echo json_encode($msg);

        } else {
            exit('Not Process');
        }
    }

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
