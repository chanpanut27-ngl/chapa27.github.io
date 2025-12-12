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

    $data = [
        'title' => $nama_lab,
        'id_lab' => $id_lab,
        'kode_pengantar' => $kode_pengantar,
        // 'id_kat_lab' => $id_kat_lab,
    ];

    var_dump($id_lab);

    if ($id_kat_lab == 1) {
        echo view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/index', $data);
    } else if ($id_kat_lab == 2) {
        echo view('Backend/Modul/Pelayanan/Lhu/Spesimen-penyakit/index', $data);
    } else {
        echo view('Backend/Modul/Pelayanan/Lhu/Kalibrasi-alat/index', $data);
    }

   
   
?>

<?= $this->endSection(); ?>


