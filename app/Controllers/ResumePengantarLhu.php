<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KajiUlangKontrakPengantarModel;
use App\Models\KeteranganPengantarModel;
use App\Models\KondisiLingkunganPengantarModel;
use App\Models\LaboratoriumTujuanModel;
use App\Models\PenanggungJawabPengantarModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;

class ResumePengantarLhu extends BaseController
{
    protected $title;
    protected $modelPengantarLhu;
    protected $modelLabTujuan;

    public function __construct()
    {
        $this->title = 'Resume';
        $this->modelPengantarLhu = new PengantarLhuModel();
        $this->modelLabTujuan = new LaboratoriumTujuanModel();
    }

    public function index($id = null)
    {
        $kode_pengantar = $id;
        $data = [
            'title' => 'Resume',
            'kode_pengantar' => $kode_pengantar,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar)
        ];
        return view('Backend/Modul/Pelayanan/Lhu/Resume/index', $data);
    }

    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $kode_pengantar = $this->request->getVar('kode_pengantar');

            $data = [
                'title' => 'Resume',
                'kode_pengantar' => $kode_pengantar,
                'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
                'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
                'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
                'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar)
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lhu/Resume/_data')
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    

    }

    public function cetak($id = null)
    {
        $kode_pengantar = $id;
        $labTujuan = new LaboratoriumTujuanModel();
        $pengantar_lhu = new PengantarLhuModel();
        $kondisi_lingkungan = new KondisiLingkunganPengantarModel();
        $keterangan = new KeteranganPengantarModel();
        $kaji_ulang = new KajiUlangKontrakPengantarModel();
        $penanggung_jawab = new PenanggungJawabPengantarModel();
        
         $data = [
                'title' => 'Cetak',
                'kode_pengantar' => $kode_pengantar,
                'data_pelanggan' => $pengantar_lhu->get_data_by_kode_pengantar($kode_pengantar),
                'kondisi_lingkungan' => $kondisi_lingkungan->where('kode_pengantar', $kode_pengantar)->get()->getResultArray(),
                'menu_lab' => $labTujuan->get_data($kode_pengantar),
                'keterangan' => $keterangan->where('kode_pengantar', $kode_pengantar)->get()->getResultArray(),
                'kaji_ulang' => $kaji_ulang->where('kode_pengantar', $kode_pengantar)->get()->getResultArray(),
                'penanggung_jawab' => $penanggung_jawab->where('kode_pengantar', $kode_pengantar)->get()->getResultArray()
            ];
        return view('Backend/Modul/Pelayanan/Lhu/Resume/_cetak', $data);
    }

}
