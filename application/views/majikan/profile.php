<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6">
                <h3 class="text-left">Profile</h3>
            </div>
        </div>
    </div>
    <hr>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url('assets/uploads/majikan/' . $majikan['foto_majikan']); ?>" class="card-img-top" alt="Foto Majikan">
                        <form class="mt-2" method="POST" action="<?= base_url('profile/update_foto'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label><b>Update Foto</b></label>
                                <input type="hidden" name="email_majikan" value="<?= $majikan['email_majikan']; ?>" required>
                                <input type="hidden" name="nama_majikan" value="<?= $majikan['nama_majikan']; ?>" required>
                                <input type="file" class="form-control-file" name="foto_majikan">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Upload</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <form method="POST" action="<?= base_url('profile/update'); ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik" value="<?= $majikan['nik']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_majikan" value="<?= $majikan['email_majikan']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_majikan" value="<?= $majikan['nama_majikan']; ?>">
                            <?= form_error('nama_majikan', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="<?= $majikan['jenis_kelamin']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $majikan['username']; ?>">
                            <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telepon</label>
                            <input type="number" class="form-control" name="telepon" value="<?= $majikan['telepon']; ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="password1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password2">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat_majikan" rows="3"><?= $majikan['alamat_majikan']; ?></textarea>
                            <?= form_error('alamat_majikan', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary ">Update</button>&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url(); ?>" class="btn btn-secondary ">Batal</a>
                </form>
            </div>
        </div>
    </div>

</section>