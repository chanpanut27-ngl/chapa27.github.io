<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header bg-blue-100">
            <a href="<?= base_url('pelanggan'); ?>" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?= base_url('assets/images/logo.webp'); ?>" class="img-fluid" alt="logo" style="height: 55px;">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="<?= base_url('/'); ?>" class="pc-link">
                        <span class="pc-micon"></span>
                        <span class="pc-mtext"><span class="ti ti-home"></span> Home</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelanggan/profil'); ?>" class="pc-link">
                        <span class="pc-micon"></span>
                        <span class="pc-mtext"><span class="ti ti-user"></span> Profil</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label class="fw-bold">Pelayanan</label>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelanggan/pelayanan/permintaan'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Permintaan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelanggan/permintaan-pemeriksaan'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Pemeriksaan</span>
                    </a>
                </li>
                <li class="pc-item d-none">
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
                    <label class="fw-bold">File</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext">Pelayanan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('pelanggan/file-pelayanan/reader/standar-pelayanan'); ?>" data-i18n="Standar Pelayanan">
                                <span class="fa-solid fa-file-alt"></span> Standar Pelayanan
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('pelanggan/file-pelayanan/reader/tarif-pelayanan'); ?>" data-i18n="Tarif Pelayanan">
                                <span class="fa-solid fa-file-alt"></span> Tarif Pelayanan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-arrow-right"></i></span>
                        <span class="pc-mtext" data-i18n="booklet">Booklet</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('pelanggan/booklet/reader/booklet-2025'); ?>" data-i18n="Booklet 2025">
                                <span class="fa-solid fa-file-alt"></span> Booklet 2025
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('pelanggan/booklet/reader/booklet-2026'); ?>" data-i18n="Booklet 2026">
                                <span class="fa-solid fa-file-alt"></span> Booklet 2026
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="<?= base_url('pelanggan/booklet/reader/tarif-pnbp'); ?>" data-i18n="Harga Pnbp">
                                <span class="fa-solid fa-file-alt"></span> Harga Pnbp
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>