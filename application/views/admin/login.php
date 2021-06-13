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
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('login-admin'); ?>"><b>Login</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <div style="text-align: center;">
                <img src="<?= base_url('assets/uploads/logo/logo.png'); ?>" style="width: 150px;height:150px;margin-bottom: 20px">
            </div>

            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('admin'); ?>" method="post" style="margin-top: 20px;margin-bottom: 30px">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username atau Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
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