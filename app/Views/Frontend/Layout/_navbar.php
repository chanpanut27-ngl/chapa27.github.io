<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header bg-blue-100">
            <a href="<?= base_url('user-pelanggan'); ?>" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?= base_url('assets/images/logo.webp'); ?>" class="img-fluid" alt="logo" style="height: 55px;">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="<?= base_url('user-pelanggan'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#home"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-home"></span> Home</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">Pelayanan Pemeriksaan</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                        <use xlink:href="#modul-pelayanan-pemeriksaan"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('user-pelanggan/profil'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#profil"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Profil</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('user-pelanggan/permintaan-pemeriksaan'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#permintaan"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Permintaan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('cetak-pdf/contoh-1'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#cetakpdf"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Cetak pdf</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">Kumpulan file</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                        <use xlink:href="#kumpulan-file"></use>
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
                            <a class="pc-link" href="<?= base_url('user-pelanggan/file-peraturan/reader/standar-pelayanan'); ?>" data-i18n="Standar Pelayanan">
                                <span class="fa-solid fa-file-alt"></span> Standar Pelayanan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('user-pelanggan/file-peraturan/reader/tarif-pelayanan'); ?>" data-i18n="Tarif Pelayanan">
                                <span class="fa-solid fa-file-alt"></span> Tarif Pelayanan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                        <svg class="pc-icon">
                            <use xlink:href="#swap"></use>
                        </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="booklet"><span class="fa-solid fa-arrow-right"></span> Booklet</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('user-pelanggan/booklet/reader/booklet-3'); ?>" data-i18n="Booklet 3">
                                <span class="fa-solid fa-file-alt"></span> Booklet 3
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('user-pelanggan/booklet/reader/harga-pnbp'); ?>" data-i18n="Harga Pnbp">
                                <span class="fa-solid fa-file-alt"></span> Harga Pnbp
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>