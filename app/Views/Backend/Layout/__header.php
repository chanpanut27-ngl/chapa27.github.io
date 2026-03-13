<?php

use App\Models\UsersModel;

if ( in_groups('admin') ) {
    $groups = 'Administrator';
} else if ( in_groups('user') ) {
    $groups = 'User';
} else {
    $groups = 'Pelanggan';
}
$users = new UsersModel();
$result_users = $users->get_data();
$foto_user = $result_users['user_image'];
?>
<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper kemkes-color1"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2 text-light"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2 text-light"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item d-inline-flex d-md-none">
                    <!-- empty fill  -->
                </li>
                <li class="pc-h-item d-none d-md-inline-flex">
                    <!-- empty fill  -->
                </li>
            </ul>
        </div>

        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item d-none">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <i class="ti ti-mail text-light"></i>
                    </a>
                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Message</h5>
                            <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
                            <div class="list-group list-group-flush w-100">
                                <a class="list-group-item list-group-item-action">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                            <span class="float-end text-muted">3:00 AM</span>
                                            <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.</p>
                                            <span class="text-muted">2 min ago</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="text-center py-2">
                            <a href="#!" class="link-primary">View all</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0 text-light"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        data-bs-auto-close="outside"
                        aria-expanded="false"
                    >
                        <?php
                        $pathFile = 'Uploads/Foto/'.$foto_user;
                        if (file_exists($pathFile)) {
                            $img = '<img src="'.base_url('Uploads/Foto/'.$foto_user).'" alt="" class="user-avtar">'; 
                        }else{
                            $img = '<img src="'.base_url('assets/images/default.svg').'" alt="user-image" class="user-avtar">';
                        }
                        echo $img;
                        ?>
                        <span><?= $result_users['username'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0">
                                    <?= $img ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><?= $result_users['username'] ?></h6>
                                    <span>BBLabkesmas Jakarta</span>
                                </div>
                            </div>
                        </div>
                        <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                class="nav-link active"
                                id="drp-t1"
                                data-bs-toggle="tab"
                                data-bs-target="#drp-tab-1"
                                type="button"
                                role="tab"
                                aria-controls="drp-tab-1"
                                aria-selected="true"
                                ><i class="ti ti-users"></i> <?= $groups ?></button
                                >
                            </li>
                        </ul>
                        <div class="tab-content" id="mysrpTabContent">
                            <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
                                <a href="<?= base_url('profil-pegawai'); ?>" class="dropdown-item">
                                    <i class="ti ti-user"></i>
                                    <span>Profile</span>
                                </a>
                                <a href="<?= base_url('logout'); ?>" class="bg-danger text-light dropdown-item">
                                    <i class="ti ti-power"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                            <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                                <a href="#!" class="dropdown-item">
                                <i class="ti ti-help"></i>
                                <span>Support</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                <i class="ti ti-user"></i>
                                <span>Account Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                <i class="ti ti-lock"></i>
                                <span>Privacy Center</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                <i class="ti ti-messages"></i>
                                <span>Feedback</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                <i class="ti ti-list"></i>
                                <span>History</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>