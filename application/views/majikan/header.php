<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pencari Pembantu Rumah Tangga">
    <meta name="keywords" content="Web Based">
    <meta name="author" content="parete">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all">

    <!-- Judul Web -->
    <title><?= $title; ?></title>
    <!-- Favicon Web -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/majikan/img/logo/logo.png'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="<?= base_url('assets/majikan/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/majikan/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/r-2.2.5/sc-2.0.2/sp-1.1.1/datatables.min.css" />
    <!-- Toast Notifikasi CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/majikan/css/main.css'); ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/majikan/img/logo/logo.png'); ?>" style="width: 30%;" alt="logo Parete">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>

                <?php
                $session = $this->session->userdata('email_majikan');
                if (!$session) {
                ?>
                    <a href="<?= base_url('login'); ?>" class="btn btn-outline-light mr-2"><i class="fa fa-sign-in"></i> Login</a>
                    <a href="<?= base_url('daftar'); ?>" class="btn btn-light"><i class="fa fa-user-plus"></i> Daftar</a>
                <?php } else { ?>
                    <div class="dropdown">
                        <a class="btn btn-profile dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?= $majikan['nama_majikan']; ?>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('profile'); ?>"><i class="fa fa-user mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="<?= base_url('negosiasi'); ?>"><i class="fa fa-hourglass-half mr-2"></i> Negosiasi</a>
                            <a class="dropdown-item" href="<?= base_url('kontrak'); ?>"><i class="fa fa-ship mr-2"></i> Kontrak</a>
                            <a class="dropdown-item" href="<?= base_url('pembayaran'); ?>"><i class="fa fa-money mr-2"></i> Pembayaran</a>
                            <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out mr-2"></i> Logout</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </nav>