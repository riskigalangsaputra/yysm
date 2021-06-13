<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a>Yayasan Sarana Mulia</a>.</strong> All rights
    reserved.
</footer>

<div class="control-sidebar-bg"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal_ubahpassword" tabindex="-1" aria-labelledby="Modal_ubahpasswordLabel" aria-hidden="true">
    <form action="<?= base_url('pembantu/login/ubah_password'); ?>" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="Modal_ubahpasswordLabel">Ubah Password</h4>
                </div>

                <div class="pad margin no-print">
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                        Setelah password diubah, Anda diwajibkan login ulang.
                    </div>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="passwordsekarang">Password Sekarang</label>
                        <input type="password" class="form-control" name="passwordsekarang" id="passwordsekarang">
                    </div>
                    <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password" class="form-control" name="password1" id="password1">
                        <small class="form-text text-muted">Password minimal 6 digit.</small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password2" id="password2">
                        <small class="form-text text-muted">Konfirmasi password harus sama dengan password baru.</small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets/admin/'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/admin/'); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/admin/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Toaster Notifikasi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/admin/'); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/admin/'); ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/'); ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/'); ?>dist/js/demo.js"></script>

<!-- DataTable -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

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