<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BiayaAkomodasiModel;
use App\Models\BiayaPenyelenggaraSamplingModel;
use App\Models\PermintaanPelangganModel;

class BiayaPenyelenggaraSampling extends BaseController
{
    protected $title;
    protected $model;
    protected $m_akomodasi;
    protected $m_permintaan;

    public function __construct()
    {
        $this->title = 'Biaya penyelenggara sampling';
        $this->model = new BiayaPenyelenggaraSamplingModel();
        $this->m_akomodasi = new BiayaAkomodasiModel();
        $this->m_permintaan = new PermintaanPelangganModel();

    }
    
    public function index($id = null)
    {
       if ($this->request->isAJAX()) {

            $data = [
                'title' => $this->title,
                'id_pelanggan' => $id,
                'items' => $this->m_permintaan->find($id),
                'biaya_akomodasi' => $this->m_akomodasi->get_data()
            ];
            $msg = [
                'sukses' => view('Backend/Bps/index', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $id_pelanggan = $this->request->getVar('id_pelanggan');

            $data = [
                'items' => $this->model->where('id_pelanggan', $id_pelanggan)->findAll()
            ];
            $msg = [
                'data' => view('Backend/Bps/__data', $data)
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
                'jumlah_orang' => [
                    'label' => 'Jumlah orang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jumlah_hari' => [
                    'label' => 'Jumlah hari',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'biaya_satuan' => [
                    'label' => 'Biaya satuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'jumlah_orang' => $this->validation->getError('jumlah_orang'),
                        'jumlah_hari' => $this->validation->getError('jumlah_hari'),
                        'biaya_satuan' => $this->validation->getError('biaya_satuan')
                    ]
                ];
            } else {
                $simpandata = [
                    'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                    'no_reg' => $this->request->getVar('no_reg'),
                    'kode_pelanggan' => $this->request->getVar('kode_pelanggan'),
                    'jumlah_orang' => $this->request->getVar('jumlah_orang'),
                    'jumlah_hari' => $this->request->getVar('jumlah_hari'),
                    'biaya_satuan' => $this->request->getVar('biaya_satuan')
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
