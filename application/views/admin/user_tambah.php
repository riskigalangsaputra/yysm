  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1 style="margin-top: 10px;">
              <?= $title; ?>
          </h1>
      </section>

      <!-- Main content -->
      <section class="content" style="margin-top: 10px;">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">
              <form role="form" method="post" action="<?= base_url('admin/user/simpan'); ?>" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username" value="<?= set_value('username'); ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" required>
                          </div>

                          <div class="form-group">
                              <label>No Telepon</label>
                              <input type="number" class="form-control" name="telepon" value="<?= set_value('telepon'); ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Alamat Lengkap</label>
                              <textarea class="form-control" name="alamat_lengkap" rows="3" required><?= set_value('alamat_lengkap'); ?></textarea>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <select class="form-control" name="jenis_kelamin" required>
                                  <option>-- Pilih Jenis Kelamin --</option>
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password1" required>
                          </div>

                          <div class="form-group">
                              <label>Konfirmasi Password</label>
                              <input type="password" class="form-control" name="password2" required>
                          </div>

                          <div class="form-group">
                              <label>Upload Foto</label>
                              <input type="file" name="gambar" required>
                          </div>

                          <div class="form-group">
                              <p class="help-block"><small style="color: red"><b>*</b></small> Pastikan upload foto dengan format jpg, jpeg atau png !!!</p>
                          </div>

                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="box-body">
                          <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                          <a href="<?= base_url('admin/user'); ?>" class="btn btn-default">Batal</a>
                      </div>
                  </div>
              </form>
          </div>

      </section>
      <!-- /.content -->
  </div>