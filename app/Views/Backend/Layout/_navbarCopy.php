<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header bg-teal-100">
      <a href="../dashboard/index.html" class="b-brand text-primary">
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
          <a href="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#pengantar-lhu"></use>
              </svg>
            </span>
            <span class="pc-mtext"><span class="fa-solid fa-arrow-right"></span> Pengantar LHU</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label data-i18n="Widget">Files</label>
          <i class="pc-micon">
            <svg class="pc-icon">
              <use xlink:href="#files"></use>
            </svg>
          </i>
        </li>
        <li class="pc-item">
          <a href="../pages/login.html" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#lock"></use>
              </svg>
            </span>
            <span class="pc-mtext">Login</span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item">
                <a href="<?= base_url('file/reader/standar-pelayanan'); ?>" class="pc-link">
                    <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                    <span class="pc-mtext">Standar Pelayanan</span>
                </a>
            </li>
            <li class="pc-item">
                <a href="<?= base_url('file/reader/tarif-pelayanan'); ?>" class="pc-link">
                    <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                    <span class="pc-mtext">Tarif Pelayanan</span>
                </a>
            </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenkes-no2-2023'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Permenkes No.02 Tahun 2023</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/menlhk-no68-2016'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">MenLHK No. 68 Tahun 2016</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenlh-no11-2025'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">PermenLH No. 11 Tahun 2025</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenlh-no12-2025'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">PermenLH No. 12 Tahun 2025</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/pertek-baku-mutu-limbah-domestik'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Pertek Baku Mutu Limbah Domestik</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenkes-no1096-2011'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Permenkes No.1096 Tahun 2011</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenkes-no7-aami-2019'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Permenkes No.7 Tahun 2019 AAMI</span>
                            </a>
                        </li>
                    </ul>
        </li>
        <li class="pc-item">
          <a href="../pages/register.html" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#user-add"></use>
              </svg>
            </span>
            <span class="pc-mtext">Register</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label data-i18n="Widget">Other</label>
          <i class="pc-micon">
            <svg class="pc-icon">
              <use xlink:href="#line-chart"></use>
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
            <span class="pc-mtext" data-i18n="Menu levels">Menu levels</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 2.1">Level 2.1</a></li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span data-i18n="Level 2.2">Level 2.2</span>
                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
              </a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 3.1">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 3.2">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">
                    <span data-i18n="Level 3.3">Level 3.3</span>
                    <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                  </a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 4.1">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 4.2">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span data-i18n="Level 2.2">Level 2.3</span>
                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
              </a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 3.1">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!" data-i18n="Level 3.2">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">
                    <span data-i18n="Level 3.3">Level 3.3</span>
                    <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                  </a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#chrome"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Sample Page">Sample page</span>
          </a>
        </li>
      </ul>
      <div class="card text-center">
        <div class="card-body">
          <img src="../assets/images/img-navbar-card.png" alt="images" class="img-fluid mb-2">
          <h5>Upgrade To Pro</h5>
          <p>To get more features and components</p>
          <a href="https://codedthemes.com/item/mantis-bootstrap-admin-dashboard/" target="_blank"
          class="btn btn-success">Buy Now</a>
        </div>
      </div>
    </div>
  </div>
</nav>