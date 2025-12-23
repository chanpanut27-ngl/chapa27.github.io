<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KeteranganLhuModel;
use App\Models\KondisiLingkunganSekitarSampelModel;
use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLhuModel;
use App\Models\KajiUlangPermintaanKontrakModel;
use App\Models\PenanggungJawabLhuModel;
use App\Models\PenanggungJawabSampelModel;

class ResumeLayananPemeriksaan extends BaseController
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

    public function cetak($id = null)
    {
        $kode_pengantar = $id;
        $labTujuan = new LaboratoriumTujuanModel();
        $pengantar_lhu = new PengantarLhuModel();
        $kondisi_lingkungan = new KondisiLingkunganSampel();
        $keterangan = new KondisiLingkunganSampel();
        $kaji_ulang = new KajiUlangSampel();
        $penanggung_jawab = new PenanggungJawabSampelModel();
        
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
