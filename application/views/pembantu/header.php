<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pembantu | <?= $title; ?></title>
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
            <a href="<?= base_url('dashboard-pembantu'); ?>" class="logo">
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
                                <img src="<?= base_url('assets/uploads/pembantu/') . $pembantu['foto_pembantu']; ?>" class="user-image" alt="Pembantu Image">
                                <span class="hidden-xs"><?= $pembantu['nama_pembantu']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Pembantu image -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/uploads/pembantu/') . $pembantu['foto_pembantu']; ?>" class="img-circle" alt="Pembantu Image">

                                    <p>
                                        <?= $pembantu['nama_pembantu']; ?> - <?= $pembantu['username_pembantu']; ?>
                                        <small><?= $pembantu['email_pembantu']; ?> </small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a data-toggle="modal" data-target="#Modal_ubahpassword" class="btn btn-default btn-flat">Ubah Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('pembantu/login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
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
                        <img src="<?= base_url('assets/uploads/pembantu/') . $pembantu['foto_pembantu']; ?>" class="img-circle" alt="Pembantu Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $pembantu['nama_pembantu']; ?></p>
                        <a> <?= $pembantu['username_pembantu']; ?></a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <li><a href="<?= base_url('dashboard-pembantu'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?= base_url('pembantu/negosiasi'); ?>"><i class="fa fa-hand-spock-o"></i> <span>Negosiasi</span></a></li>
                    <li><a href="<?= base_url('pembantu/kontrak'); ?>"><i class="fa fa-sitemap"></i> <span>Kontrak</span></a></li>
                    <li><a href="<?= base_url('pembantu/pembayaran'); ?>"><i class="fa fa-money"></i> <span>Pembayaran</span></a></li>
                    <li><a href="<?= base_url('pembantu/login/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
                </ul>
            </section>

        </aside>