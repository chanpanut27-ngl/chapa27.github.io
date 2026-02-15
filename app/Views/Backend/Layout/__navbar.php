 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header kemkes-color2">
            <a href="<?= base_url('/') ?>" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?= base_url('assets/images/logo.webp') ?>" class="img-fluid logo" alt="logo">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="<?= base_url('/'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home"></i></span>
                        <span class="pc-mtext">Home</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('profil-pegawai'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user"></i></span>
                        <span class="pc-mtext">Profil</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Pelayanan</label>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan/permintaan-pelanggan'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Permintaan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan/pengantar-lab'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Pengantar Laboratorium</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan/perintah-uji-sampel'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Perintah uji sampel</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>File</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-arrow-right"></i>
                        </span>
                        <span class="pc-mtext">Peraturan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/standar-pelayanan') ?>">
                                <i class="ti ti-file"></i> Standar Pelayanan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/tarif-pelayanan') ?>">
                                <i class="ti ti-file"></i> Tarif Pelayanan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenkes-no2-2023') ?>">
                                <i class="ti ti-file"></i> Permenkes No.02 Tahun 2023
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/menlhk-no68-2016') ?>" data-i18n="MenLHK No. 68 Tahun 2016">
                                <i class="ti ti-file"></i> MenLHK No. 68 Tahun 2016
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenlh-no11-2025') ?>" data-i18n="PermenLH No. 11 Tahun 2025">
                                <i class="ti ti-file"></i> PermenLH No. 11 Tahun 2025
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenlh-no12-2025') ?>" data-i18n="PermenLH No. 12 Tahun 2025">
                                <i class="ti ti-file"></i> PermenLH No. 12 Tahun 2025
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/pertek-baku-mutu-limbah-domestik') ?>" data-i18n="Pertek Baku Mutu Limbah Domestik">
                                <i class="ti ti-file"></i> Pertek Baku Mutu Limbah Domestik
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenkes-no1096-2011') ?>" data-i18n="Permenkes No.1096 Tahun 2011">
                                <i class="ti ti-file"></i> Permenkes No.1096 Tahun 2011
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenkes-no7-aami-2019') ?>" data-i18n="Permenkes No.7 Tahun 2019 AAMI">
                                <i class="ti ti-file"></i> Permenkes No.7 Tahun 2019 AAMI
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-arrow-right"></i>
                        </span>
                        <span class="pc-mtext">Formulir</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-formulir/reader/prosedur-permintaan-pemeriksaan-pengujian') ?>" data-i18n="Prosedur permintaan pemeriksaan pengujian">
                               <i class="ti ti-file"></i> Prosedur permintaan pemeriksaan pengujian
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-formulir/reader/permintaan-pemeriksaan-rujukan-atau-kiriman') ?>" data-i18n="Prosedur permintaan pemeriksaan pengujian">
                               <i class="ti ti-file"></i> Permintaan pemeriksaan rujukan atau kiriman
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-formulir/reader/permintaan-pengujian-sampel-lingkungan') ?>" data-i18n="Prosedur permintaan pemeriksaan pengujian">
                               <i class="ti ti-file"></i> Permintaan pengujian sampel lingkungan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-formulir/reader/permintaan-pengujian-spesimen-klinis'); ?>" data-i18n="Permintaan pengujian spesimen klinis">
                                <i class="ti ti-file"></i> Permintaan pengujian spesimen klinis
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-formulir/reader/contoh-surat'); ?>" data-i18n="Permintaan pengujian spesimen klinis">
                                <i class="ti ti-file"></i> Contoh Surat
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-arrow-right"></i>
                        </span>
                        <span class="pc-mtext">Booklet</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-booklet/reader/booklet-2025') ?>" data-i18n="Booklet 3">
                                <i class="ti ti-file"></i> Booklet 2025
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-booklet/reader/booklet-2026') ?>" data-i18n="Booklet 3">
                                <i class="ti ti-file"></i> Booklet 2026
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-booklet/reader/tarif-pnbp') ?>" data-i18n="Harga Pnbp">
                                <i class="ti ti-file"></i> Tarif Pnbp
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-caption">
                    <label>Coolbox</label>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('coolbox/posisi-coolbox') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Posisi Coolbox</span>
                    </a>
                </li>
                <?php if ( in_groups('admin') ) : ?>

                <li class="pc-item pc-caption">
                    <label>Master Data</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-lock"></i>
                        </span>
                        <span class="pc-mtext">Login</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('master-data/users') ?>" data-i18n="Users">
                                <span class="fa-solid fa-users"></span> Users
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('master-data/auth-groups') ?>" data-i18n="Groups">
                                <span class="fa-solid fa-people-group"></span> Groups
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('master-data/auth-groups-users') ?>" data-i18n="Groups users">
                                <span class="fa-solid fa-user-group"></span> Groups users
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('master-data/auth-permissions') ?>" data-i18n="Permissions">
                                <span class="fa-solid fa-user-shield"></span> Permissions
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('master-data/auth-groups-permissions') ?>" data-i18n="Groups Permissions">
                                <span class="fa-solid fa-user-circle"></span> Groups Permissions
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('master-data/auth-logins') ?>" data-i18n="Auth Logins">
                                <span class="fa-solid fa-user"></span> Auth Logins
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/pelanggan') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext">Pelanggan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/instalasi') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext">Instalasi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/kategori-laboratorium') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Kategori lab</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/laboratorium') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Laboratorium</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/jenis-sampel') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Jenis sampel</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/parameter'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Parameter</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/biaya-akomodasi') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Biaya akomodasi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/instansi') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Instansi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/peraturan') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Peraturan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/penyakit') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Penyakit</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/coolbox') ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-database"></i></span>
                        <span class="pc-mtext"> Coolbox</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <div class="card text-center">
                <!-- empty fill  -->
            </div>
        </div>
    </div>
</nav>