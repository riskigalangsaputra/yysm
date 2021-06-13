<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - <?= $title; ?></title>
    <!-- Favicon Web -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/logo/logo.png'); ?>">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Toast Notifikasi CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('dashboard'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PRT</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>YYSM</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/uploads/user/') . $user['gambar']; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $user['nama_lengkap']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/uploads/user/') . $user['gambar']; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $user['nama_lengkap']; ?> - <?= $user['username']; ?>
                                        <small><?= $user['email']; ?> </small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a data-toggle="modal" data-target="#Modal_ubahpassword" class="btn btn-default btn-flat">Ubah Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('admin/login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/uploads/user/') . $user['gambar']; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $user['nama_lengkap']; ?></p>
                        <a href="#"> <?= $user['username']; ?></a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?= base_url('admin/pembantu'); ?>"><i class="fa fa-group"></i> <span>Pembantu</span></a></li>
                    <li><a href="<?= base_url('admin/majikan'); ?>"><i class="fa fa-user-secret"></i> <span>Majikan</span></a></li>
                    <li><a href="<?= base_url('admin/user'); ?>"><i class="fa fa-user"></i> <span>User</span></a></li>
                    <li><a href="<?= base_url('admin/negosiasi'); ?>"><i class="fa fa-hand-spock-o"></i> <span>Negosiasi</span></a></li>
                    <li><a href="<?= base_url('admin/kontrak'); ?>"><i class="fa fa-sitemap"></i> <span>Kontrak</span></a></li>
                    <li><a href="<?= base_url('admin/pembayaran'); ?>"><i class="fa fa-money"></i> <span>Pembayaran</span></a></li>
                    <li><a href="<?= base_url('admin/pesan'); ?>"><i class="fa fa-envelope"></i> <span>Pesan</span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i> <span>Laporan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('admin/laporan/laporan_pembantu'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Data Pembantu</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_majikan'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Data Majikan</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_user'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Data User</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_negosiasi'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Negosiasi</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_pendapatan'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pendapatan</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_kontrak'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Kontrak</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_pembayaran'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pembayaran</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_pengunjung'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pengunjung</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_pesan'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pesan</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_pembantu_belum_terverifikasi'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pembantu Belum Terverifikasi</a></li>
                            <li><a href="<?= base_url('admin/laporan/laporan_majikan_belum_terverifikasi'); ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Majikan Belum Terverifikasi</a></li>
                        </ul>
                    </li>
                </ul>
            </section>

        </aside>