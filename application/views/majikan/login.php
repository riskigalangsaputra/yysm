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
    <title>Login Majikan</title>
    <!-- Favicon Web -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/majikan/img/logo/parete.png'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Customizable CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/majikan/login/main.css'); ?>">

</head>

<body>

    <div class="card" style="width: 25rem;">

        <div class="card-header">
            <div class="text-center">
                <img src="<?= base_url('assets/majikan/img/logo/logo.png'); ?>" class="rounded" alt="Logo Parete" style="width: 30%;">
            </div>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <h3 class="text-center">Login Majikan</h3>
            </div>

            <form method="POST" action="<?= base_url('login'); ?>">
                <?= $this->session->flashdata('message'); ?>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email_majikan" autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <a href="<?= base_url(); ?>" class="btn btn-secondary btn-block">Batal</a>
            </form>

            <div class="mt-3">
                <div class="text-center">Belum mempunyai Akun ?</div>
                <a href="<?= base_url('daftar'); ?>" class="btn btn-info btn-block mt-2">Daftar</a>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>