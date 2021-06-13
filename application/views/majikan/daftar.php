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
    <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/logo/logo.png'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Customizable CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/majikan/login/main.css'); ?>">

</head>

<body>

    <div class="card" style="width: 50rem;">

        <div class="card-header">
            <div class="text-center">
                <img src="<?= base_url('assets/uploads/logo/logo.png'); ?>" class="rounded" alt="Logo Parete" style="width: 15%;">
            </div>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <h3 class="text-center">Daftar</h3>
            </div>

            <div class="col-md-12">
                <form method="POST" action="<?= base_url('daftar/simpan'); ?>" enctype="multipart/form-data">
                    <?= $this->session->flashdata('message'); ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik" placeholder="16 digit" value="<?= set_value('nik'); ?>" autofocus>
                            <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama lengkap</label>
                            <input type="text" class="form-control" name="nama_majikan" placeholder="Nama Lengkap" value="<?= set_value('nama_majikan'); ?>" required>
                            <?= form_error('nama_majikan', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>" required>
                            <?= form_error('nama_majikan', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_majikan" placeholder="Email Valid" value="<?= set_value('email_majikan'); ?>" required>
                            <?= form_error('email_majikan', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telepon</label>
                            <input type="number" class="form-control" name="telepon" placeholder="Nomer Aktif" value="<?= set_value('telepon'); ?>" required>
                            <?= form_error('telepon', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password1" placeholder="Minimal 6 digit" required>
                            <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password2" placeholder="Minimal 6 digit" required>
                            <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option> -- Pilih Jenis Kelamin -- </option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat_majikan" rows="3" placeholder="Masukan Alamat Lengkap"><?= set_value('alamat_majikan'); ?></textarea>
                            <?= form_error('alamat_majikan', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Upload Foto</label>
                            <input type="file" class="form-control-file" name="foto_majikan">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Upload Foto KTP</label>
                            <input type="file" class="form-control-file" name="foto_ktp">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Upload Foto KK</label>
                            <input type="file" class="form-control-file" name="foto_kk">
                        </div>
                    </div>
                    <small><span class="text-danger">*</span> Form semua harus diisi</small>
                    <hr>
                    <button type="submit" class="btn btn-primary ">Daftar</button>&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url(); ?>" class="btn btn-secondary">Batal</a>
                </form>

                <div class="mt-2">
                    <div>Sudah memiliki Akun ?</div>
                    <a href="<?= base_url('login'); ?>" class="btn btn-info">Login</a>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>