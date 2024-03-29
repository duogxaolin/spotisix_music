<?php

$mod = $duogxaolin->get_row("SELECT * FROM `admin` WHERE `token` = '" . $_COOKIE['admin_session'] . "'");
if (!$mod) {
    if ($duogxaolin->home_uri() != 'admin/login') {
        // header("Location: /admin/login");
        require_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
        die();
    }
} else {
    if (myip() != $mod['ip']) {
        $duogxaolin->update("admin", [
            'token'  => md5(time()),
        ], " `id` = '" . $mod['id'] . "' ");
        require_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
        die();
    }
}
?>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

    
    <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">

                <span class="brand-text font-weight-light">Spotisix</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Thống kê

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/singer" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                 Nghệ Sĩ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/music" class="nav-link">
                                <i class="nav-icon fas fa-music"></i>
                                <p>
                                Bài Hát
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>