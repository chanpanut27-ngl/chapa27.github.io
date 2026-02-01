<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); 
use App\Models\PermintaanPemeriksaanModel;?>
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
        $data['id_kat_lab'] = intval($str_exp[1]);
        echo view('Backend/Modul/Pelayanan/Lhu/Keterangan/index', $data);
        break;
    case 'keterangan-2':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0]).' Lab.Penyakit';
        $data['id_kat_lab'] = intval($str_exp[1]);
        echo view('Backend/Modul/Pelayanan/Lhu/Keterangan/index', $data);
        break;
    case 'kondisi-lingkungan-1':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0].' '.$str_exp[1]).' Lab.Lingkungan';
        $data['id_kat_lab'] = intval($str_exp[2]);
        echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan/index', $data);
        break;
    case 'kondisi-lingkungan-2':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0].' '.$str_exp[1]).' Lab.Penyakit';
        $data['id_kat_lab'] = intval($str_exp[2]);
        echo view('Backend/Modul/Pelayanan/Lhu/Kondisi-lingkungan/index', $data);
        break;
    case 'kaji-ulang-permintaan-kontrak-1':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0].' '.$str_exp[1].' '.$str_exp[2].' '.$str_exp[3]).' Lab.Lingkungan';
        $data['id_kat_lab'] = intval($str_exp[4]);
        echo view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kontrak/index', $data);
        break;
    case 'kaji-ulang-permintaan-kontrak-2':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0].' '.$str_exp[1].' '.$str_exp[2].' '.$str_exp[3]).' Lab.Penyakit';
        $data['id_kat_lab'] = intval($str_exp[4]);
        echo view('Backend/Modul/Pelayanan/Lhu/Kaji-ulang-kontrak/index', $data);
        break;
    case 'penanggung-jawab-1':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0].' '.$str_exp[1]).' Lab.Lingkungan';
        $data['id_kat_lab'] = intval($str_exp[2]);
        echo view('Backend/Modul/Pelayanan/Lhu/Penanggung-jawab/index', $data);
        break;
    case 'penanggung-jawab-2':
        $str_exp = explode('-', $id_lab);
        $data['title'] = ucfirst($str_exp[0].' '.$str_exp[1]).' Lab.Penyakit';
        $data['id_kat_lab'] = intval($str_exp[2]);
        echo view('Backend/Modul/Pelayanan/Lhu/Penanggung-jawab/index', $data);
        break;
    default:
       
        break;
}
?>

<?= $this->endSection(); ?>
