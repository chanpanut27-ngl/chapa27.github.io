<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** Modul Pelayanan Pemeriksaan **/
/** Pengantar LHU **/
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
/** **/


/** File Peraturan **/
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

/** File Formulir **/
$routes->group('file-formulir/reader', function ($routes) {
    $routes->get('prosedur-permintaan-pemeriksaan-pengujian', 'FormulirReader::prosedur_permintaan_pemeriksaan_pengujian');
    $routes->get('permintaan-pemeriksaan-rujukan-atau-kiriman', 'FormulirReader::permintaan_pemeriksaan_rujukan_atau_kiriman');
    $routes->get('permintaan-pengujian-sampel-lingkungan', 'FormulirReader::permintaan_pengujian_sampel_lingkungan');
    $routes->get('permintaan-pengujian-spesimen-klinis', 'FormulirReader::permintaan_pengujian_spesimen_klinis');
});

/** Modul pengaturan coolbox **/
/** posisi coolbox **/
$routes->group('pengaturan-coolbox/posisi-coolbox', function ($routes) {
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

/** Master data **/
/** Coolbox **/
$routes->group('master-data/coolbox', function ($routes) {
    $routes->get('', 'CoolboxMaster::index');
    $routes->get('list-data', 'CoolboxMaster::list');
    $routes->get('add-data', 'CoolboxMaster::new');
    $routes->post('create-data', 'CoolboxMaster::create');
    $routes->get('edit-data/(:num)', 'CoolboxMaster::edit/$1');
    $routes->post('update-data', 'CoolboxMaster::update');
    $routes->delete('delete-data/(:num)', 'CoolboxMaster::delete/$1');
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

/** Instansi **/
$routes->group('master-data/instansi', function ($routes) {
    $routes->get('', 'InstansiMaster::index');
    $routes->get('list-data', 'InstansiMaster::list');
    $routes->get('add-data', 'InstansiMaster::new');
    $routes->post('create-data', 'InstansiMaster::create');
    $routes->get('edit-data/(:num)', 'InstansiMaster::edit/$1');
    $routes->post('update-data', 'InstansiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstansiMaster::delete/$1');
});

/** Peraturan / baku mutu **/
$routes->group('master-data/peraturan-baku-mutu', function ($routes) {
    $routes->get('', 'PeraturanMaster::index');
    $routes->get('list-data', 'PeraturanMaster::list');
    $routes->get('add-data', 'PeraturanMaster::new');
    $routes->post('create-data', 'PeraturanMaster::create');
    $routes->get('edit-data/(:num)', 'PeraturanMaster::edit/$1');
    $routes->post('update-data', 'PeraturanMaster::update');
    $routes->delete('delete-data/(:num)', 'PeraturanMaster::delete/$1');
});

/** Instalasi **/
$routes->group('master-data/instalasi', function ($routes) {
    $routes->get('', 'InstalasiMaster::index');
    $routes->get('list-data', 'InstalasiMaster::list');
    $routes->get('add-data', 'InstalasiMaster::new');
    $routes->post('create-data', 'InstalasiMaster::create');
    $routes->get('edit-data/(:num)', 'InstalasiMaster::edit/$1');
    $routes->post('update-data', 'InstalasiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstalasiMaster::delete/$1');
});

/** Laboratorium **/
$routes->group('master-data/laboratorium', function ($routes) {
    $routes->get('', 'LaboratoriumMaster::index');
    $routes->get('list-data', 'LaboratoriumMaster::list');
    $routes->get('add-data', 'LaboratoriumMaster::new');
    $routes->post('create-data', 'LaboratoriumMaster::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumMaster::edit/$1');
    $routes->post('update-data', 'LaboratoriumMaster::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumMaster::delete/$1');
});


/** Biaya akomodasi **/
$routes->group('master-data/biaya-akomodasi', function ($routes) {
    $routes->get('', 'BiayaAKomodasi::index');
    $routes->get('list-data', 'BiayaAKomodasi::list');
    $routes->get('add-data', 'BiayaAKomodasi::new');
    $routes->post('create-data', 'BiayaAKomodasi::create');
    $routes->get('edit-data/(:num)', 'BiayaAKomodasi::edit/$1');
    $routes->post('update-data', 'BiayaAKomodasi::update');
    $routes->delete('delete-data/(:num)', 'BiayaAKomodasi::delete/$1');
});

/** Jenis sampel **/
$routes->group('master-data/jenis-sampel', function ($routes) {
    $routes->get('', 'JenisSampelMaster::index');
    $routes->get('list-data', 'JenisSampelMaster::list');
    $routes->get('add-data', 'JenisSampelMaster::new');
    $routes->post('create-data', 'JenisSampelMaster::create');
    $routes->get('edit-data/(:num)', 'JenisSampelMaster::edit/$1');
    $routes->post('update-data', 'JenisSampelMaster::update');
    $routes->delete('delete-data/(:num)', 'JenisSampelMaster::delete/$1');
});

/** Pelanggan **/
$routes->group('master-data/pelanggan', function ($routes) {
    $routes->get('', 'PelangganMaster::index');
    $routes->get('list-data', 'PelangganMaster::list');
    $routes->get('add-data', 'PelangganMaster::new');
    $routes->post('create-data', 'PelangganMaster::create');
    $routes->get('edit-data/(:num)', 'PelangganMaster::edit/$1');
    $routes->post('update-data', 'PelangganMaster::update');
    $routes->delete('delete-data/(:num)', 'PelangganMaster::delete/$1');
});


/** Laboratorium tujuan **/
$routes->group('laboratorium-tujuan', function ($routes) {
    $routes->get('index/(:any)', 'LaboratoriumTujuan::index/$1');
    $routes->get('list-data/(:any)', 'LaboratoriumTujuan::list/$1');
    $routes->get('add-data/(:any)', 'LaboratoriumTujuan::new/$1');
    $routes->post('create-data', 'LaboratoriumTujuan::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumTujuan::edit/$1');
    $routes->post('update-data', 'LaboratoriumTujuan::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumTujuan::delete/$1');
});


/** Setting LHU **/
$routes->group('pelayanan/proses-lhu', function ($routes) {
    $routes->get('index/(:any)', 'ProsesLhu::index/$1');
    $routes->get('list-menu/(:any)', 'ProsesLhu::list_menu/$1');
    $routes->get('keterangan/(:any)', 'KeteranganPemeriksaan::index/$1');
});

/** Pelayanan sampel lingkungan **/
$routes->group('pelayanan/lhu/sampel-lingkungan', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SampelLingkungan::index/$1/$1');
    $routes->get('list-data', 'SampelLingkungan::list');
    $routes->get('add-data', 'SampelLingkungan::new');
    $routes->post('create-data', 'SampelLingkungan::create');
    $routes->get('edit-data/(:any)', 'SampelLingkungan::edit/$1');
    $routes->post('update-data', 'SampelLingkungan::update');
    $routes->delete('delete-data/(:num)', 'SampelLingkungan::delete/$1');
});


/** Pelayanan keterangan LHU **/
$routes->group('pelayanan/keterangan-lhu', function ($routes) {
    $routes->get('', 'KeteranganLhu::index');
    $routes->get('list-data', 'KeteranganLhu::list');
    $routes->get('add-data', 'KeteranganLhu::new');
    $routes->post('create-data', 'KeteranganLhu::create');
    $routes->get('edit-data/(:num)', 'KeteranganLhu::edit/$1');
    $routes->post('update-data', 'KeteranganLhu::update');
    $routes->delete('delete-data/(:num)', 'KeteranganLhu::delete/$1');
});


/** Pelayanan kondisi lingkungan LHU **/
$routes->group('pelayanan/kondisi-lingkungan-sekitar-sampel', function ($routes) {
    $routes->get('', 'KondisiLingkunganSekitarSampel::index');
    $routes->get('list-data', 'KondisiLingkunganSekitarSampel::list');
    $routes->get('add-data', 'KondisiLingkunganSekitarSampel::new');
    $routes->post('create-data', 'KondisiLingkunganSekitarSampel::create');
    $routes->get('edit-data/(:num)', 'KondisiLingkunganSekitarSampel::edit/$1');
    $routes->post('update-data', 'KondisiLingkunganSekitarSampel::update');
    $routes->delete('delete-data/(:num)', 'KondisiLingkunganSekitarSampel::delete/$1');
});


/** Pelayanan kaji ulang LHU **/
$routes->group('pelayanan/kaji-ulang-permintaan-kontrak', function ($routes) {
    $routes->get('', 'KajiUlangPermintaanKontrak::index');
    $routes->get('list-data', 'KajiUlangPermintaanKontrak::list');
    $routes->get('add-data', 'KajiUlangPermintaanKontrak::new');
    $routes->post('create-data', 'KajiUlangPermintaanKontrak::create');
    $routes->get('edit-data/(:num)', 'KajiUlangPermintaanKontrak::edit/$1');
    $routes->post('update-data', 'KajiUlangPermintaanKontrak::update');
    $routes->delete('delete-data/(:num)', 'KajiUlangPermintaanKontrak::delete/$1');
});

/** Pelayanan penanggung jawab LHU **/
$routes->group('pelayanan/penanggung-jawab-lhu', function ($routes) {
    $routes->get('', 'PenanggungJawabLhu::index');
    $routes->get('list-data', 'PenanggungJawabLhu::list');
    $routes->get('add-data', 'PenanggungJawabLhu::new');
    $routes->post('create-data', 'PenanggungJawabLhu::create');
    $routes->get('edit-data/(:num)', 'PenanggungJawabLhu::edit/$1');
    $routes->post('update-data', 'PenanggungJawabLhu::update');
    $routes->delete('delete-data/(:num)', 'PenanggungJawabLhu::delete/$1');
});

/** Resume **/
$routes->group('pelayanan/resume', function ($routes) {
    $routes->get('', 'ResumeLayananPemeriksaan::index');
    $routes->get('cetak-resume/(:any)', 'ResumeLayananPemeriksaan::cetak/$1');
});