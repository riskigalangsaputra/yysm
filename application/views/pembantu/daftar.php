<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Favicon Web -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/logo/logo.png'); ?>">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Toast Notifikasi CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition login-page">
    <div class="register-box">
        <div class="login-logo">
            <a href="<?= base_url('login-admin'); ?>"><b><?= $title; ?></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="register-box-body">
            <div style="text-align: center;">
                <img src="<?= base_url('assets/uploads/logo/logo.png'); ?>" style="width: 150px;height:150px;margin-bottom: 20px">
            </div>

            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('pembantu/daftar/simpan'); ?>" method="POST" style="margin-top: 20px;margin-bottom: 30px" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>NIK</label>
                        <input type="number" name="nik" class="form-control" placeholder="16 digit" <?= set_value('nik'); ?> autofocus>
                        <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" name="username_pembantu" class="form-control" placeholder="Tanpa spasi dan tanpa huruf kapital" <?= set_value('username_pembantu'); ?>>
                        <?= form_error('username_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_pembantu" class="form-control" <?= set_value('nama_pembantu'); ?>>
                        <?= form_error('nama_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email_pembantu" class="form-control" <?= set_value('email_pembantu'); ?>>
                        <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telepon</label>
                        <input type="number" name="telepon" class="form-control" <?= set_value('telepon'); ?>>
                        <?= form_error('telepon', '<small class="text-danger pl-1">', '</small>'); ?>
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
                        <label>Agama</label>
                        <select class="form-control" name="agama">
                            <option> -- Pilih Agama -- </option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                        <?= form_error('agama', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Umur</label>
                        <input type="number" name="umur" class="form-control" <?= set_value('umur'); ?>>
                        <?= form_error('umur', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tinggi Badan</label>
                        <input type="number" name="tinggi" class="form-control" <?= set_value('tinggi'); ?> min="1">
                        <?= form_error('tinggi', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Berat Badan</label>
                        <input type="number" name="berat" class="form-control" <?= set_value('berat'); ?>>
                        <?= form_error('berat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Menginap</label>
                        <select class="form-control" name="menginap">
                            <option> -- Pilih Menginap -- </option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <?= form_error('menginap', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pendidikan Terakhir</label>
                        <select class="form-control" name="pendidikan">
                            <option> -- Pilih Pendidikan Terakhir -- </option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                        </select>
                        <?= form_error('pendidikan', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option> -- Pilih Status -- </option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Janda/Duda">Janda/Duda</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pengalaman</label>
                        <input type="text" name="pengalaman" class="form-control" placeholder="Misal : 4 Tahun" <?= set_value('pengalaman'); ?>>
                        <?= form_error('pengalaman', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Gaji</label>
                        <input type="number" name="gaji" class="form-control" placeholder="Masukan tanpa tanda titik" <?= set_value('gaji'); ?>>
                        <?= form_error('gaji', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Bank</label>
                        <select class="form-control" name="nama_bank">
                            <option> -- Pilih Nama Bank -- </option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BCA">BCA</option>
                        </select>
                        <?= form_error('nama_bank', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>No Rekening</label>
                        <input type="number" name="no_rekening" class="form-control" placeholder="Masukan tanpa tanda titik" <?= set_value('no_rekening'); ?>>
                        <?= form_error('no_rekening', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat_pembantu" rows="3"><?= set_value('alamat_pembantu'); ?></textarea>
                        <?= form_error('alamat_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterampilan</label>
                        <textarea class="form-control" name="keterampilan" rows="3"><?= set_value('keterampilan'); ?></textarea>
                        <?= form_error('keterampilan', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Ceritakan tentang diri Anda" rows="3"><?= set_value('deskripsi'); ?></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Upload Foto</label>
                        <input type="file" class="form-control-file" name="foto_pembantu">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Upload Foto KTP</label>
                        <input type="file" class="form-control-file" name="foto_ktp">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Upload Foto SKCK</label>
                        <input type="file" class="form-control-file" name="surat_polisi">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Upload Foto Surat Dokter</label>
                        <input type="file" class="form-control-file" name="surat_dokter">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password1" placeholder="Minimal 6 digit">
                        <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password2" placeholder="Minimal 6 digit">
                        <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>

                    <div class="form-group col-md-12">
                        <span><small class="text-danger">*</small> Pastikan mengupload foto dengan format png, jpg, atau jpeg.</span>
                    </div>

                    <div class="col-xs-12" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-info btn-flat">Daftar</button>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <span>Sudah memiliki Akun ?</span><br></br>
                        <a href="<?= base_url('pembantu/login'); ?>" class="btn btn-primary btn-flat">Login</a>
                    </div>
                </div>
                <div class="row">
                </div>
            </form>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url('assets/admin/') ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url('assets/admin/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Toaster Notifikasi -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/admin/') ?>plugins/iCheck/icheck.min.js"></script>

    <!-- JavaScript Toast Notifikasi -->
    <script type="text/javascript">
        <?php if ($this->session->flashdata('success')) { ?>
            toastr.success("<?= $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('error')) {  ?>
            toastr.error("<?= $this->session->flashdata('error'); ?>");
        <?php } else if ($this->session->flashdata('warning')) {  ?>
            toastr.warning("<?= $this->session->flashdata('warning'); ?>");
        <?php } else if ($this->session->flashdata('info')) {  ?>
            toastr.info("<?= $this->session->flashdata('info'); ?>");
        <?php } ?>
    </script>

</body>

</html>