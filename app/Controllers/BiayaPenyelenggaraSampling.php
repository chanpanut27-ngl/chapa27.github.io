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
}
