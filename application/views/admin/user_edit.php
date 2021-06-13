      <?php
        error_reporting(0);
        $p = $pengguna->row_array();
        ?>

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
                  <form role="form" method="post" action="<?= base_url('admin/user/update'); ?>" enctype="multipart/form-data">
                      <div class="box-body">
                          <div class="col-md-6">

                              <div class="form-group">
                                  <img src="<?= base_url('assets/uploads/user/') . $p['gambar']; ?>" alt="foto_user" style="width: 50%;">
                              </div>

                              <div class="form-group">
                                  <label>Upload Foto</label>
                                  <input type="file" name="gambar">
                              </div>

                              <div class="form-group">
                                  <p class="help-block"><small style="color: red"><b>*</b></small> Pastikan upload foto dengan format jpg, jpeg atau png !!!</p>
                              </div>

                              <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" class="form-control" name="username" value="<?= $p['username']; ?>" required>
                              </div>

                              <div class="form-group">
                                  <label>Nama Lengkap</label>
                                  <input type="text" class="form-control" name="nama_lengkap" value="<?= $p['nama_lengkap']; ?>" required>
                              </div>
                          </div>

                          <div class="col-md-6">

                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" value="<?= $p['email']; ?>" required>
                              </div>

                              <div class="form-group">
                                  <label>No Telepon</label>
                                  <input type="number" class="form-control" name="telepon" value="<?= $p['telepon']; ?>" required>
                              </div>

                              <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select class="form-control" name="jenis_kelamin" required>
                                      <option value="Laki-Laki" <?php if ($p['jenis_kelamin'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                      <option value="Perempuan" <?php if ($p['jenis_kelamin'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Alamat Lengkap</label>
                                  <textarea class="form-control" name="alamat_lengkap" rows="3" required><?= $p['alamat_lengkap']; ?></textarea>
                              </div>

                              <div class="form-group">
                                  <label>Status</label>
                                  <select class="form-control" name="status" required>
                                      <option value="Aktif" <?php if ($p['status'] == 'Aktif') {
                                                                echo 'selected';
                                                            } ?>>Aktif</option>
                                      <option value="Tidak Aktif" <?php if ($p['status'] == 'Tidak Aktif') {
                                                                        echo 'selected';
                                                                    } ?>>Tidak Aktif</option>
                                  </select>
                              </div>

                          </div>
                      </div>
                      <div class="box-footer">
                          <div class="box-body">
                              <input type="hidden" name="kode" id="kode" value="<?= $p['kd_user']; ?>" required>
                              <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                              <a href="<?= base_url('admin/user'); ?>" class="btn btn-default">Batal</a>
                          </div>
                      </div>
                  </form>
              </div>

          </section>
          <!-- /.content -->
      </div>