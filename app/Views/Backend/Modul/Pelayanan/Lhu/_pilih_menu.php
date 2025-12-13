<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>
<?= $this->section('content_menu'); ?>
<?php

use App\Models\LaboratoriumTujuanModel;

$labTujuan = new LaboratoriumTujuanModel();

$result = $labTujuan->get_data_by_id_kode_pengantar($kode_pengantar, $id_lab);

foreach ($result as $row) {
    $id_kat_lab = $row['id_kat_lab'];
    $id_lab = $row['id_laboratorium'];
    $nama_lab = $row['nama_lab'];
    $kode_pengantar = $row['kode_pengantar'];        
}

$data = [
    'title' => @$nama_lab,
    'id_lab' => $id_lab,
    'kode_pengantar' => $kode_pengantar,
    'id_kat_lab' => @$id_kat_lab,
];

switch (@$id_kat_lab ?? $id_lab) {
    case 1:
        echo view('Backend/Modul/Pelayanan/Lhu/Sampel-lingkungan/index', $data);
        break;
    case 2:
        echo view('Backend/Modul/Pelayanan/Lhu/Spesimen-penyakit/index', $data);
        break;
    case 'keterangan-1':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0]).' Lab.Lingkungan';
        echo view('Backend/Modul/Pelayanan/Lhu/Ket-lhu/index', $data);
        break;
    case 'kondisi-lingkungan-1':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0]).' Lab.Lingkungan';
        echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan/index', $data);
        break;
    case 'keterangan-2':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0]).' Lab.Penyakit';
        echo view('Backend/Modul/Pelayanan/Lhu/Ket-lhu-penyakit/index', $data);
        break;
    case 'kondisi-lingkungan-2':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0]).' Lab.Penyakit';
        echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan-penyakit/index', $data);
        break;
    default:
        # code...
        break;
}
?>

<?= $this->endSection(); ?>
