<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header bg-teal-100">
            <a href="<?= base_url('/'); ?>" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?= base_url('assets/images/logo-bblkm-jkt.png'); ?>" class="img-fluid" alt="logo" style="height: 55px;">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="<?= base_url('/'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#home"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-home"></span> Home</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">Modul Pelayanan Pemeriksaan</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                        <use xlink:href="#modul-pelayanan-pemeriksaan"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-sampel/permintaan'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#permintaan"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Permintaan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#pengantar-lhu" for="pengantar-lhu"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Pengantar LHU</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">Files Peraturan</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                        <use xlink:href="#files-peraturan"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                        <svg class="pc-icon">
                            <use xlink:href="#swap"></use>
                        </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Peraturan"><span class="fa-solid fa-arrow-right"></span> Peraturan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/standar-pelayanan'); ?>" data-i18n="Standar Pelayanan">
                                <span class="fa-solid fa-file-alt"></span> Standar Pelayanan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/tarif-pelayanan'); ?>" data-i18n="Tarif Pelayanan">
                                <span class="fa-solid fa-file-alt"></span> Tarif Pelayanan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenkes-no2-2023'); ?>" data-i18n="Permenkes No.02 Tahun 2023">
                                <span class="fa-solid fa-file-alt"></span> Permenkes No.02 Tahun 2023
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/menlhk-no68-2016'); ?>" data-i18n="MenLHK No. 68 Tahun 2016">
                                <span class="fa-solid fa-file-alt"></span> MenLHK No. 68 Tahun 2016
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenlh-no11-2025'); ?>" data-i18n="PermenLH No. 11 Tahun 2025">
                                <span class="fa-solid fa-file-alt"></span> PermenLH No. 11 Tahun 2025
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenlh-no12-2025'); ?>" data-i18n="PermenLH No. 12 Tahun 2025">
                                <span class="fa-solid fa-file-alt"></span> PermenLH No. 12 Tahun 2025
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/pertek-baku-mutu-limbah-domestik'); ?>" data-i18n="Pertek Baku Mutu Limbah Domestik">
                                <span class="fa-solid fa-file-alt"></span> Pertek Baku Mutu Limbah Domestik
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenkes-no1096-2011'); ?>" data-i18n="Permenkes No.1096 Tahun 2011">
                                <span class="fa-solid fa-file-alt"></span> Permenkes No.1096 Tahun 2011
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('file-peraturan/reader/permenkes-no7-aami-2019'); ?>" data-i18n="Permenkes No.7 Tahun 2019 AAMI">
                                <span class="fa-solid fa-file-alt"></span> Permenkes No.7 Tahun 2019 AAMI
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">Pengaturan Coolbox</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                            <use xlink:href="#pengaturan-coolbox"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pengaturan-coolbox/posisi-coolbox'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#posisi-coolbox"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Posisi Coolbox</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">Master Data</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                            <use xlink:href="#master-data"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/pelanggan'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#pelanggan"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-database"></span> Pelanggan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/laboratorium'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#laboratorium"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-database"></span> Laboratorium</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/jenis-sampel'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#jenis-sampel"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-database"></span> Jenis sampel</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>