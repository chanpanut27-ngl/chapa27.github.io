<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>
<?= $this->section('content_menu'); ?>
<?php 
    use App\Models\KeteranganLhuModel;
    use App\Models\KondisiLingkunganSekitarSampelModel;
    use App\Models\LaboratoriumTujuanModel;
    use App\Models\PengantarLhuModel;
    use App\Models\KajiUlangPermintaanKontrakModel;
    use App\Models\PenanggungJawabLhuModel;

    $labTujuan = new LaboratoriumTujuanModel();
    $pengantar_lhu = new PengantarLhuModel();
    $kondisi_lingkungan = new KondisiLingkunganSekitarSampelModel();
    $keterangan = new KeteranganLhuModel();
    $kaji_ulang = new KajiUlangPermintaanKontrakModel();
    $penanggung_jawab = new PenanggungJawabLhuModel();

    $result = $labTujuan->get_data_by_id_kode_pengantar($kode_pengantar, $id_lab);

    foreach ($result as $row) {
        $id_kat_lab = $row['id_kat_lab'];
        $id_lab = $row['id_laboratorium'];
        $nama_lab = $row['nama_lab'];
        $kode_pengantar = $row['kode_pengantar'];        
    }

    switch ($id_kat_lab ?? $id_lab) {
        case 1:
            $data = [
                'title' => $nama_lab,
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar,
                'id_kat_lab' => $id_kat_lab,
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/index', $data);
            break;
        
        case 2:
            $data = [
                'title' => $nama_lab,
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar,
                'id_kat_lab' => $id_kat_lab,
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Spesimen-penyakit/index', $data);
            break;

        case 3:
            $data = [
                'title' => $nama_lab,
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar,
                'id_kat_lab' => $id_kat_lab,
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Kalibrasi-alat/index', $data);
        break;

        case 'resume':
           $data = [
                'title' => 'Resume',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar,
                'data_pelanggan' => $pengantar_lhu->get_data_by_kode_pengantar($kode_pengantar),
                'kondisi_lingkungan' => $kondisi_lingkungan->where('kode_pengantar', $kode_pengantar)->get()->getResultArray(),
                'menu_lab' => $labTujuan->get_data($kode_pengantar),
                'keterangan' => $keterangan->where('kode_pengantar', $kode_pengantar)->get()->getResultArray(),
                'kaji_ulang' => $kaji_ulang->where('kode_pengantar', $kode_pengantar)->get()->getResultArray(),
                'penanggung_jawab' => $penanggung_jawab->where('kode_pengantar', $kode_pengantar)->get()->getResultArray()
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Resume/index', $data);
            break;
        default:
            break;
    }

     $data = [
                'title' => 'Keterangan',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];

            if ($id_lab == 'keterangan-1') {
                echo view('Backend/Modul/Pelayanan/Lhu/Ket-lhu/index', $data);
            } else if ($id_lab == 'keterangan-2') {
                echo view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-penyakit/index', $data);
            } else {
                echo view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-kalibrasi/index', $data);
            }

            if ($id_lab == 'kondisi-lingkungan-1') {
                echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan/index', $data);
            } else if ($id_lab == 'kondisi-lingkungan-2') {
                echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan-penyakit/index', $data);
            } else {
                echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan-kalibrasi/index', $data);
            }

            if ($id_lab == 'kaji-ulang-permintaan-kontrak-1') {
                echo view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang/index', $data);
            } else if ($id_lab == 'kaji-ulang-permintaan-kontrak-2') {
                echo view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-penyakit/index', $data);
            } else {
                echo view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kalibrasi/index', $data);
            }

            if ($id_lab == 'penanggung-jawab-1') {
                echo view('Backend/Modul/Pelayanan/Lhu/Penanggung-jawab/index', $data);
            } else if ($id_lab == 'penanggung-jawab-2') {
                echo view('Backend/Modul/Pelayanan/Lhu/Penanggung-jawab-penyakit/index', $data);
            } else {
                echo view('Backend/Modul/Pelayanan/Lhu/Penanggung-jawab-kalibrasi/index', $data);
            }
?>
<?= $this->endSection(); ?>
