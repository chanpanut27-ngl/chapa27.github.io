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

        case 'keterangan':
            $data = [
                'title' => 'Keterangan',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Ket-lhu/index', $data);
            break;
        case 'kondisi_lingkungan_sekitar_sampel':
           $data = [
                'title' => 'Kondisi lingkungan sekitar sampel',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan/index', $data);
            break;
        case 'kaji_ulang_permintaan_kontrak':
           $data = [
                'title' => 'Kaji ulang permintaan & kontrak',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang/index', $data);
            break;
        case 'penanggung_jawab':
           $data = [
                'title' => 'Penanggung jawab',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            echo view('Backend/Modul/Pelayanan/Lhu/Penanggung-jawab/index', $data);
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
?>
<?= $this->endSection(); ?>
