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

class ResumeLayananPemeriksaan extends BaseController
{
    protected $title;
    protected $modelPengantarLhu;

    public function __construct()
    {
        $this->title = 'Resume';
        $this->modelPengantarLhu = new PengantarLhuModel();
    }

    public function cetak($id = null)
    {
        $kode_pengantar = $id;
        $labTujuan = new LaboratoriumTujuanModel();
        $pengantar_lhu = new PengantarLhuModel();
        $kondisi_lingkungan = new KondisiLingkunganSekitarSampelModel();
        $keterangan = new KeteranganLhuModel();
        $kaji_ulang = new KajiUlangPermintaanKontrakModel();
        $penanggung_jawab = new PenanggungJawabLhuModel();
        
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
