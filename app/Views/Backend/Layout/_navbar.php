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
            </ul>
        </div>
    </div>
</nav>