<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
?>
<section class="user-hero pt-120 pb-lg-15 pb-md-10 pb-6 texture-bg">
    <div class="bg-shape position-absolute top-0 start-0 z-n1 w-100">
        <img class="w-100" src="/assets/img/hero-shape.png" alt="shape">
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-center text-lg-start"></h2>
            </div>
        </div>
    </div>
</section>
<main class="user-main-content-area overview pb-120 texture-bg-2">
    <div class="container overflow-visible">
        <div class="row gx-6">
            <!-- sidebar  -->
            <div class="col-xl-3">
                <div class="sidebar-area p-6 rounded-4 border-full bgc-2 position-sticky sticky-lg-top sticky-top-position d-none d-xl-block">
                    <div class="sidebar">
                        <a href="javascript:void(0)">
                            <div class="user-profile d-flex align-items-center gap-lg-6 gap-sm-4 gap-2">
                                <div class="user-profile-thumb position-relative">
                                    <img class="w-100 rounded-circle" src="/assets/img/user.png" alt="user">
                                    <span class="online-active"></span>
                                </div>
                                <div class="user-profile-info">
                                    <h4 class="fw-semibold mb-2"><?= $auth['ListenerName'] ?></h4>
                                    <small class="tcp-1"><?= $auth['Email'] ?></small>
                                </div>
                            </div>

                        </a>
                        <span class="d-block my-lg-6 my-4 border-dashed"></span>
                        <span class="d-block fs-lg fw-medium mb-lg-3 mb-2">Dashboard</span>
                        <ul class="sidebar-menu d-grid gap-lg-3 gap-2">
                            <li>
                                <a href="/profile" class="side-menu-link rounded-4 <?php echo ($duogxaolin->home_uri() == '/profile') ? 'active' : ''; ?>">
                                    <div class="d-flex align-items-center gap-2 py-lg-3 py-2 px-xxl-6 px-4">
                                        <span class="icon fs-xl"><i class="ti ti-home"></i></span>
                                        <span>Tổng Quan</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/password" class="side-menu-link rounded-4 <?php echo ($duogxaolin->home_uri() == '/password') ? 'active' : ''; ?>">
                                    <div class="d-flex align-items-center gap-2 py-lg-3 py-2 px-xxl-6 px-4">
                                        <span class="icon fs-xl">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <span>Đổi mật Khẩu</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/profile/history" class="side-menu-link rounded-4 <?php echo ($duogxaolin->home_uri() == '/profile/history') ? 'active' : ''; ?>">
                                    <div class="d-flex align-items-center gap-2 py-lg-3 py-2 px-xxl-6 px-4">
                                        <span class="icon fs-xl"><i class="ti ti-broadcast"></i></span>
                                        <span>Nhạc đã nghe</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <span class="d-block fs-lg fw-medium my-lg-3 my-2">Ca Sĩ</span>
                        <ul class="sidebar-menu d-grid gap-lg-3 gap-2">
                            <?php if ($auth['ArtistID'] == NULL) { ?>
                                <li>
                                    <a href="/create/singer" class="side-menu-link rounded-4 <?php echo ($duogxaolin->home_uri() == '/create/singer') ? 'active' : ''; ?>">
                                        <div class="d-flex align-items-center gap-2 py-lg-3 py-2 px-xxl-6 px-4">
                                            <span class="icon fs-xl"><i class="fas fa-file-signature"></i></span>
                                            <span>Đăng Ký Phát Hành</span>
                                        </div>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="/create/singer" class="side-menu-link rounded-4 <?php echo ($duogxaolin->home_uri() == '/create/singer') ? 'active' : ''; ?>">
                                        <div class="d-flex align-items-center gap-2 py-lg-3 py-2 px-xxl-6 px-4">
                                            <span class="icon fs-xl"><i class="fas fa-user"></i></span>
                                            <span>Thông Tin</span>
                                        </div>
                                    </a>
                                </li>
                            <?php  } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- main content  -->