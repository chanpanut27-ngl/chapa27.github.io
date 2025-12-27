<?php

use CodeIgniter\Router\RouteCollection;
use DeepCopy\f013\C;

/**
 * @var RouteCollection $routes
 */

/* Error Page 404 */
$routes->set404Override('App\Controllers\ErrorPage::show404');

$routes->get('not-privilege', 'NotEnoughPrivilege::show401');

/* Cetak PDF */
$routes->get('wa/send-message', 'WhatsAppController::sendWhatsAppMessage');

/* Login */
$routes->group('/', function ($routes) {
    $routes->get('', 'User::index');
    $routes->get('dashboard', 'User::dashboard');
});

/* Admin */
$routes->group('/', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('dashboard', 'User::dashboard');
});

/* Pelanggan */
$routes->group('/', function ($routes) {
    $routes->get('', 'Pelanggan::index');
    $routes->get('dashboard', 'Pelanggan::dashboard');
});

/* Profil Pelanggan */
$routes->group('pelanggan/profil', function ($routes) {
    $routes->get('', 'Pelanggan\Profil::index');
    $routes->get('list-data', 'Pelanggan\Profil::list');
    $routes->get('add-data', 'Pelanggan\Profil::new');
    $routes->post('create-data', 'Pelanggan\Profil::create');
    $routes->get('edit-data/(:num)', 'Pelanggan\Profil::edit/$1');
    $routes->post('update-data', 'Pelanggan\Profil::update');
    $routes->delete('delete-data/(:num)', 'Pelanggan\Profil::delete/$1');
});

/* Booklet */
$routes->group('pelanggan/booklet/reader', function ($routes) {
    $routes->get('booklet-3', 'Pelanggan\BookletReader::booklet_3');
    $routes->get('harga-pnbp', 'Pelanggan\BookletReader::harga_pnbp');
});

/* File Peraturan */
$routes->group('pelanggan/file-peraturan/reader', function ($routes) {
    $routes->get('standar-pelayanan', 'Pelanggan\FileReader::standar_pelayanan');
    $routes->get('tarif-pelayanan', 'Pelanggan\FileReader::tarif_pelayanan');
});

/* Permintaan Pemeriksaan */
$routes->group('pelanggan/permintaan-pemeriksaan', function ($routes) {
    $routes->get('', 'Pelanggan\Permintaan::index');
    $routes->get('list-data', 'Pelanggan\Permintaan::list');
    $routes->get('add-data', 'Pelanggan\Permintaan::new');
    $routes->post('create-data', 'Pelanggan\Permintaan::create');
    $routes->get('edit-data/(:num)', 'Pelanggan\Permintaan::edit/$1');
    $routes->post('update-data', 'Pelanggan\Permintaan::update');
    $routes->delete('delete-data/(:num)', 'Pelanggan\Permintaan::delete/$1');
});

/* [Module Pelayanan Pemeriksaan] */
/* Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu', function ($routes) {
    $routes->get('', 'PengantarLhu::index');
    $routes->get('list-data', 'PengantarLhu::list');
    $routes->get('add-data', 'PengantarLhu::new');
    $routes->post('create-data', 'PengantarLhu::create');
    $routes->get('edit-data/(:num)', 'PengantarLhu::edit/$1');
    $routes->post('update-data', 'PengantarLhu::update');
    $routes->delete('delete-data/(:num)', 'PengantarLhu::delete/$1');
    $routes->get('setting-lab/(:num)', 'PengantarLhu::setting_lab/$1');
    $routes->post('create-setting-lab', 'PengantarLhu::create_setting_lab');
});

/* Laboratorium Tujuan */
$routes->group('laboratorium-tujuan', function ($routes) {
    $routes->get('index/(:any)', 'LaboratoriumTujuan::index/$1');
    $routes->get('list-data/(:any)', 'LaboratoriumTujuan::list/$1');
    $routes->get('add-data/(:any)', 'LaboratoriumTujuan::new/$1');
    $routes->post('create-data', 'LaboratoriumTujuan::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumTujuan::edit/$1');
    $routes->post('update-data', 'LaboratoriumTujuan::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumTujuan::delete/$1');
});

/* Proses Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu/proses', function ($routes) {
    $routes->get('index/(:any)', 'ProsesPengantarLhu::index/$1');
    $routes->get('list-menu/(:any)', 'ProsesPengantarLhu::list_menu/$1');
    $routes->get('pilih-menu/(:any)', 'ProsesPengantarLhu::pilih_menu/$1');
});

/* Pelayanan Sampel Lingkungan */
$routes->group('pelayanan/pengantar-lhu/sampel-lingkungan', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SampelLingkungan::index/$1/$1');
    $routes->get('list-data', 'SampelLingkungan::list');
    $routes->get('add-data', 'SampelLingkungan::new');
    $routes->post('create-data', 'SampelLingkungan::create');
    $routes->get('edit-data/(:any)', 'SampelLingkungan::edit/$1');
    $routes->post('update-data', 'SampelLingkungan::update');
    $routes->delete('delete-data/(:num)', 'SampelLingkungan::delete/$1');
});

/* Pelayanan Spesimen Penyakit */
$routes->group('pelayanan/pengantar-lhu/spesimen-penyakit', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SpesimenPenyakit::index/$1/$1');
    $routes->get('list-data', 'SpesimenPenyakit::list');
    $routes->get('add-data', 'SpesimenPenyakit::new');
    $routes->post('create-data', 'SpesimenPenyakit::create');
    $routes->get('edit-data/(:any)', 'SpesimenPenyakit::edit/$1');
    $routes->post('update-data', 'SpesimenPenyakit::update');
    $routes->delete('delete-data/(:num)', 'SpesimenPenyakit::delete/$1');
});

/* Pelayanan Keterangan Pengantar LHU Penyakit */
$routes->group('pelayanan/keterangan-penyakit', function ($routes) {
    $routes->get('', 'KeteranganPenyakit::index');
    $routes->get('list-data', 'KeteranganPenyakit::list');
    $routes->get('add-data', 'KeteranganPenyakit::new');
    $routes->post('create-data', 'KeteranganPenyakit::create');
    $routes->get('edit-data/(:num)', 'KeteranganPenyakit::edit/$1');
    $routes->post('update-data', 'KeteranganPenyakit::update');
    $routes->delete('delete-data/(:num)', 'KeteranganPenyakit::delete/$1');
});


/* Pelayanan Keterangan Pengantar LHU **/
$routes->group('pelayanan/pengantar-lhu/keterangan', function ($routes) {
    $routes->get('', 'KeteranganPengantar::index');
    $routes->get('list-data', 'KeteranganPengantar::list');
    $routes->get('add-data', 'KeteranganPengantar::new');
    $routes->post('create-data', 'KeteranganPengantar::create');
    $routes->get('edit-data/(:num)', 'KeteranganPengantar::edit/$1');
    $routes->post('update-data', 'KeteranganPengantar::update');
    $routes->delete('delete-data/(:num)', 'KeteranganPengantar::delete/$1');
});

/* Pelayanan Kondisi Lingkungan Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu/kondisi-lingkungan', function ($routes) {
    $routes->get('', 'KondisiLingkunganPengantar::index');
    $routes->get('list-data', 'KondisiLingkunganPengantar::list');
    $routes->get('add-data', 'KondisiLingkunganPengantar::new');
    $routes->post('create-data', 'KondisiLingkunganPengantar::create');
    $routes->get('edit-data/(:num)', 'KondisiLingkunganPengantar::edit/$1');
    $routes->post('update-data', 'KondisiLingkunganPengantar::update');
    $routes->delete('delete-data/(:num)', 'KondisiLingkunganPengantar::delete/$1');
});

/* Pelayanan Kaji Ulang Kontrak Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu/kaji-ulang-kontrak', function ($routes) {
    $routes->get('', 'KajiUlangKontrakPengantar::index');
    $routes->get('list-data', 'KajiUlangKontrakPengantar::list');
    $routes->get('add-data', 'KajiUlangKontrakPengantar::new');
    $routes->post('create-data', 'KajiUlangKontrakPengantar::create');
    $routes->get('edit-data/(:num)', 'KajiUlangKontrakPengantar::edit/$1');
    $routes->post('update-data', 'KajiUlangKontrakPengantar::update');
    $routes->delete('delete-data/(:num)', 'KajiUlangKontrakPengantar::delete/$1');
});

/* Pelayanan Penanggung Jawab Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu/penanggung-jawab', function ($routes) {
    $routes->get('', 'PenanggungJawabPengantar::index');
    $routes->get('list-data', 'PenanggungJawabPengantar::list');
    $routes->get('add-data', 'PenanggungJawabPengantar::new');
    $routes->post('create-data', 'PenanggungJawabPengantar::create');
    $routes->get('edit-data/(:num)', 'PenanggungJawabPengantar::edit/$1');
    $routes->post('update-data', 'PenanggungJawabPengantar::update');
    $routes->delete('delete-data/(:num)', 'PenanggungJawabPengantar::delete/$1');
});

/* Pelayanan Resume Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu/resume', function ($routes) {
    $routes->get('(:any)', 'ResumePengantarLhu::index/$1');
    $routes->get('list-data', 'ResumePengantarLhu::list');
});

/* Cetak Resume Pengantar LHU */
$routes->get('cetak/resume/(:any)', 'ResumePengantarLhu::cetak/$1');

/** Perintah uji sampel **/
$routes->group('pelayanan/perintah-uji-sampel', function ($routes) {
    $routes->get('', 'PerintahUjiSampel::index');
    $routes->get('list-data', 'PerintahUjiSampel::list');
    $routes->get('add-data', 'PerintahUjiSampel::new');
    $routes->post('create-data', 'PerintahUjiSampel::create');
    $routes->get('edit-data', 'PerintahUjiSampel::edit');
    $routes->post('update-data', 'PerintahUjiSampel::update');
    $routes->get('delete-data', 'PerintahUjiSampel::delete');
});

/** Kumpulan file **/
/* File Peraturan */
$routes->group('file-peraturan/reader', function ($routes) {
    $routes->get('standar-pelayanan', 'FileReader::standar_pelayanan');
    $routes->get('tarif-pelayanan', 'FileReader::tarif_pelayanan');
    $routes->get('permenkes-no2-2023', 'FileReader::permenkes_no2_2023');
    $routes->get('menlhk-no68-2016', 'FileReader::menlhk_no68_2016');
    $routes->get('permenlh-no11-2025', 'FileReader::permenlh_no11_2025');
    $routes->get('permenlh-no12-2025', 'FileReader::permenlh_no12_2025');
    $routes->get('pertek-baku-mutu-limbah-domestik', 'FileReader::pertek_bml_domestik');
    $routes->get('permenkes-no1096-2011', 'FileReader::permenkes_no1096_2011');
    $routes->get('permenkes-no7-aami-2019', 'FileReader::permenkes_no7_aami_2019');
});

/* File Formulir */
$routes->group('file-formulir/reader', function ($routes) {
    $routes->get('prosedur-permintaan-pemeriksaan-pengujian', 'FormulirReader::prosedur_permintaan_pemeriksaan_pengujian');
    $routes->get('permintaan-pemeriksaan-rujukan-atau-kiriman', 'FormulirReader::permintaan_pemeriksaan_rujukan_atau_kiriman');
    $routes->get('permintaan-pengujian-sampel-lingkungan', 'FormulirReader::permintaan_pengujian_sampel_lingkungan');
    $routes->get('permintaan-pengujian-spesimen-klinis', 'FormulirReader::permintaan_pengujian_spesimen_klinis');
});

/* Booklet */
$routes->group('file-booklet/reader', function ($routes) {
    $routes->get('booklet-3', 'BookletReader::booklet_3');
    $routes->get('harga-pnbp', 'BookletReader::harga_pnbp');
});

/** Modul Pengaturan Coolbox **/
/* posisi coolbox */
$routes->group('pengaturan-coolbox/posisi-coolbox', ['filter' => 'permission:manage-coolbox', 'role:admin'], function ($routes) {
    $routes->get('', 'PosisiCoolbox::index');
    $routes->get('list-data', 'PosisiCoolbox::list');
    $routes->get('add-data', 'PosisiCoolbox::new');
    $routes->post('create-data', 'PosisiCoolbox::create');
    $routes->get('edit-data/(:num)', 'PosisiCoolbox::edit/$1');
    $routes->post('update-data', 'PosisiCoolbox::update');
    $routes->delete('delete-data/(:num)', 'PosisiCoolbox::delete/$1');
    $routes->get('add-foto/(:num)', 'PosisiCoolbox::add_foto/$1');
    $routes->post('upload-foto', 'PosisiCoolbox::upload_foto');
});

/** Modul Master **/
/* Pelanggan */
$routes->group('master-data/pelanggan', function ($routes) {
    $routes->get('', 'PelangganMaster::index');
    $routes->get('list-data', 'PelangganMaster::list');
    $routes->get('add-data', 'PelangganMaster::new');
    $routes->post('create-data', 'PelangganMaster::create');
    $routes->get('edit-data/(:num)', 'PelangganMaster::edit/$1');
    $routes->post('update-data', 'PelangganMaster::update');
    $routes->delete('delete-data/(:num)', 'PelangganMaster::delete/$1');
});

/* Instalasi */
$routes->group('master-data/instalasi', function ($routes) {
    $routes->get('', 'InstalasiMaster::index');
    $routes->get('list-data', 'InstalasiMaster::list');
    $routes->get('add-data', 'InstalasiMaster::new');
    $routes->post('create-data', 'InstalasiMaster::create');
    $routes->get('edit-data/(:num)', 'InstalasiMaster::edit/$1');
    $routes->post('update-data', 'InstalasiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstalasiMaster::delete/$1');
});

/* Kategori lab */
$routes->group('master-data/kategori-lab', function ($routes) {
    $routes->get('', 'KategoriLabMaster::index');
    $routes->get('list-data', 'KategoriLabMaster::list');
    $routes->get('add-data', 'KategoriLabMaster::new');
    $routes->post('create-data', 'KategoriLabMaster::create');
    $routes->get('edit-data/(:num)', 'KategoriLabMaster::edit/$1');
    $routes->post('update-data', 'KategoriLabMaster::update');
    $routes->delete('delete-data/(:num)', 'KategoriLabMaster::delete/$1');
});

/* Laboratorium */
$routes->group('master-data/laboratorium', function ($routes) {
    $routes->get('', 'LaboratoriumMaster::index');
    $routes->get('list-data', 'LaboratoriumMaster::list');
    $routes->get('add-data', 'LaboratoriumMaster::new');
    $routes->post('create-data', 'LaboratoriumMaster::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumMaster::edit/$1');
    $routes->post('update-data', 'LaboratoriumMaster::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumMaster::delete/$1');
});

/* Jenis sampel */
$routes->group('master-data/jenis-sampel', function ($routes) {
    $routes->get('', 'JenisSampelMaster::index');
    $routes->get('list-data', 'JenisSampelMaster::list');
    $routes->get('add-data', 'JenisSampelMaster::new');
    $routes->post('create-data', 'JenisSampelMaster::create');
    $routes->get('edit-data/(:num)', 'JenisSampelMaster::edit/$1');
    $routes->post('update-data', 'JenisSampelMaster::update');
    $routes->delete('delete-data/(:num)', 'JenisSampelMaster::delete/$1');
});

/* Biaya Akomodasi */
$routes->group('master-data/biaya-akomodasi', function ($routes) {
    $routes->get('', 'BiayaAKomodasi::index');
    $routes->get('list-data', 'BiayaAKomodasi::list');
    $routes->get('add-data', 'BiayaAKomodasi::new');
    $routes->post('create-data', 'BiayaAKomodasi::create');
    $routes->get('edit-data/(:num)', 'BiayaAKomodasi::edit/$1');
    $routes->post('update-data', 'BiayaAKomodasi::update');
    $routes->delete('delete-data/(:num)', 'BiayaAKomodasi::delete/$1');
});

/* Instansi */
$routes->group('master-data/instansi', function ($routes) {
    $routes->get('', 'InstansiMaster::index');
    $routes->get('list-data', 'InstansiMaster::list');
    $routes->get('add-data', 'InstansiMaster::new');
    $routes->post('create-data', 'InstansiMaster::create');
    $routes->get('edit-data/(:num)', 'InstansiMaster::edit/$1');
    $routes->post('update-data', 'InstansiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstansiMaster::delete/$1');
});

/* Peraturan Baku Mutu */
$routes->group('master-data/peraturan-baku-mutu', function ($routes) {
    $routes->get('', 'PeraturanMaster::index');
    $routes->get('list-data', 'PeraturanMaster::list');
    $routes->get('add-data', 'PeraturanMaster::new');
    $routes->post('create-data', 'PeraturanMaster::create');
    $routes->get('edit-data/(:num)', 'PeraturanMaster::edit/$1');
    $routes->post('update-data', 'PeraturanMaster::update');
    $routes->delete('delete-data/(:num)', 'PeraturanMaster::delete/$1');
});

/** Penyakit **/
$routes->group('master-data/penyakit', function ($routes) {
    $routes->get('', 'PenyakitMaster::index');
    $routes->get('list-data', 'PenyakitMaster::list');
    $routes->get('add-data', 'PenyakitMaster::new');
    $routes->post('create-data', 'PenyakitMaster::create');
    $routes->get('edit-data/(:num)', 'PenyakitMaster::edit/$1');
    $routes->post('update-data', 'PenyakitMaster::update');
    $routes->delete('delete-data/(:num)', 'PenyakitMaster::delete/$1');
});

/** Coolbox **/
$routes->group('master-data/coolbox', ['filter' => 'permission:manage-coolbox'], function ($routes) {
    $routes->get('', 'CoolboxMaster::index');
    $routes->get('list-data', 'CoolboxMaster::list');
    $routes->get('add-data', 'CoolboxMaster::new');
    $routes->post('create-data', 'CoolboxMaster::create');
    $routes->get('edit-data/(:num)', 'CoolboxMaster::edit/$1');
    $routes->post('update-data', 'CoolboxMaster::update');
    $routes->delete('delete-data/(:num)', 'CoolboxMaster::delete/$1');
});


/* Users */
$routes->group('master-data/users', function ($routes) {
    $routes->get('', 'UsersMaster::index');
    $routes->get('list-data', 'UsersMaster::list');
    $routes->get('add-data', 'UsersMaster::new');
    $routes->post('create-data', 'UsersMaster::create');
    $routes->get('edit-data/(:num)', 'UsersMaster::edit/$1');
    $routes->post('update-data', 'UsersMaster::update');
    $routes->delete('delete-data/(:num)', 'UsersMaster::delete/$1');
});

/* Auth Groups */
$routes->group('master-data/auth-groups', function ($routes) {
    $routes->get('', 'AuthGroupsMaster::index');
    $routes->get('list-data', 'AuthGroupsMaster::list');
    $routes->get('add-data', 'AuthGroupsMaster::new');
    $routes->post('create-data', 'AuthGroupsMaster::create');
    $routes->get('edit-data/(:num)', 'AuthGroupsMaster::edit/$1');
    $routes->post('update-data', 'AuthGroupsMaster::update');
    $routes->delete('delete-data/(:num)', 'AuthGroupsMaster::delete/$1');
});


/* Auth Groups Users */
$routes->group('master-data/auth-groups-users', function ($routes) {
    $routes->get('', 'AuthGroupsUsersMaster::index');
    $routes->get('list-data', 'AuthGroupsUsersMaster::list');
    $routes->get('add-data', 'AuthGroupsUsersMaster::new');
    $routes->post('create-data', 'AuthGroupsUsersMaster::create');
    $routes->get('edit-data/(:num)', 'AuthGroupsUsersMaster::edit/$1');
    $routes->post('update-data', 'AuthGroupsUsersMaster::update');
    $routes->get('delete-data', 'AuthGroupsUsersMaster::delete');
});


/* Auth Permissions */
$routes->group('master-data/auth-permissions', function ($routes) {
    $routes->get('', 'AuthPermissionsMaster::index');
    $routes->get('list-data', 'AuthPermissionsMaster::list');
    $routes->get('add-data', 'AuthPermissionsMaster::new');
    $routes->post('create-data', 'AuthPermissionsMaster::create');
    $routes->get('edit-data/(:num)', 'AuthPermissionsMaster::edit/$1');
    $routes->post('update-data', 'AuthPermissionsMaster::update');
    $routes->delete('delete-data/(:num)', 'AuthPermissionsMaster::delete/$1');
});

/* Auth Groups Permissions */
$routes->group('master-data/auth-groups-permissions', function ($routes) {
    $routes->get('', 'AuthGroupsPermissionsMaster::index');
    $routes->get('list-data', 'AuthGroupsPermissionsMaster::list');
    $routes->get('add-data', 'AuthGroupsPermissionsMaster::new');
    $routes->post('create-data', 'AuthGroupsPermissionsMaster::create');
    $routes->get('edit-data/(:num)', 'AuthGroupsPermissionsMaster::edit/$1');
    $routes->post('update-data', 'AuthGroupsPermissionsMaster::update');
    $routes->get('delete-data', 'AuthGroupsPermissionsMaster::delete');
});


/* Auth Logins */
$routes->group('master-data/auth-logins', function ($routes) {
    $routes->get('', 'AuthLoginsMaster::index');
    $routes->get('list-data', 'AuthLoginsMaster::list');
});

/* Profil Pegawai */
$routes->group('profil-pegawai', function ($routes) {
    $routes->get('', 'ProfilPegawai::index');
    $routes->get('list-data', 'ProfilPegawai::list');
    $routes->get('list-foto', 'ProfilPegawai::list_foto');
    $routes->get('add-data', 'ProfilPegawai::new');
    $routes->post('create-data', 'ProfilPegawai::create');
    $routes->post('update-data', 'ProfilPegawai::update');
});