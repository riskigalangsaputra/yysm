      <?php
        error_reporting(0);
        $p = $pembantu->row_array();
        ?>

      <div class="content-wrapper">
          <section class="content-header">
              <h1 style="margin-top: 10px;">
                  <?= $title; ?>
              </h1>
          </section>

          <?php if ($this->session->flashdata('error')) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <?= $this->session->flashdata('error'); ?>
              </div>
          <?php endif; ?>

          <!-- Main content -->
          <section class="content" style="margin-top: 10px;">

              <!-- SELECT2 EXAMPLE -->
              <div class="box box-primary">
                  <form role="form" method="post" action="<?= base_url('admin/pembantu/update'); ?>" enctype="multipart/form-data">
                      <div class="box-body">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>NIK</label>
                                  <input type="number" class="form-control" name="nik" value="<?= $p['nik']; ?>" readonly>
                                  <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" class="form-control" name="username_pembantu" value="<?= $p['username_pembantu'] ?>"">
                                  <?= form_error('username_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class=" form-group">
                                  <label>Nama Lengkap</label>
                                  <input type="text" class="form-control" name="nama_pembantu" value="<?= $p['nama_pembantu'] ?>">
                                  <?= form_error('nama_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Email Pembantu</label>
                                  <input type="email" class="form-control" name="email_pembantu" value="<?= $p['email_pembantu']; ?>" readonly>
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>No Telepon</label>
                                  <input type="number" class="form-control" name="telepon" value="<?= $p['telepon']; ?>">
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Alamat Lengkap</label>
                                  <textarea class="form-control" name="alamat_pembantu" rows="3"><?= $p['alamat_pembantu']; ?></textarea>
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select class="form-control" name="jenis_kelamin">
                                      <option value="Laki-Laki" <?php if ($p['jenis_kelamin'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                      <option value="Perempuan" <?php if ($p['jenis_kelamin'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Agama</label>
                                  <select class="form-control" name="agama">
                                      <option value="Islam" <?php if ($p['agama'] == 'Islam') {
                                                                echo 'selected';
                                                            } ?>>Islam</option>
                                      <option value="Kristen" <?php if ($p['agama'] == 'Kristen') {
                                                                    echo 'selected';
                                                                } ?>>Kristen</option>
                                      <option value="Protestan" <?php if ($p['agama'] == 'Protestan') {
                                                                    echo 'selected';
                                                                } ?>>Protestan</option>
                                      <option value="Hindu" <?php if ($p['agama'] == 'Hindu') {
                                                                echo 'selected';
                                                            } ?>>Hindu</option>
                                      <option value="Budha" <?php if ($p['agama'] == 'Budha') {
                                                                echo 'selected';
                                                            } ?>>Budha</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Umur</label>
                                  <input type="text" class="form-control" name="umur" value="<?= $p['umur']; ?>">
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Tinggi Badan <small>(cm)</small></label>
                                  <input type="number" class="form-control" name="tinggi" value="<?= $p['tinggi']; ?>">
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Berat Badan <small>(kg)</small></label>
                                  <input type="number" class="form-control" name="berat" value="<?= $p['berat']; ?>">
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Menginap</label>
                                  <select class="form-control" name="menginap">
                                      <option value="Ya" <?php if ($p['menginap'] == 'Ya') {
                                                                echo 'selected';
                                                            } ?>>Ya</option>
                                      <option value="Tidak" <?php if ($p['menginap'] == 'Tidak') {
                                                                echo 'selected';
                                                            } ?>>Tidak</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Pendidikan Terakhir</label>
                                  <select class="form-control" name="pendidikan">
                                      <option value="SD" <?php if ($p['pendidikan'] == 'SD') {
                                                                echo 'selected';
                                                            } ?>>SD</option>
                                      <option value="SMP" <?php if ($p['pendidikan'] == 'SMP') {
                                                                echo 'selected';
                                                            } ?>>SMP</option>
                                      <option value="SMA" <?php if ($p['pendidikan'] == 'SMA') {
                                                                echo 'selected';
                                                            } ?>>SMA</option>
                                      <option value="SMK" <?php if ($p['pendidikan'] == 'SMK') {
                                                                echo 'selected';
                                                            } ?>>SMK</option>
                                  </select>
                              </div>

                          </div>

                          <div class="col-md-6">

                              <div class="form-group">
                                  <label>Status Pembantu</label>
                                  <select class="form-control" name="status">
                                      <option value="Belum Menikah" <?php if ($p['status'] == 'Belum Menikah') {
                                                                        echo 'selected';
                                                                    } ?>>Belum Menikah</option>
                                      <option value="Menikah" <?php if ($p['status'] == 'Menikah') {
                                                                    echo 'selected';
                                                                } ?>>Menikah</option>
                                      <option value="Janda/Duda" <?php if ($p['status'] == 'Janda/Duda') {
                                                                        echo 'selected';
                                                                    } ?>>Janda/Duda</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Pengalaman</label>
                                  <input type="text" class="form-control" name="pengalaman" value="<?= $p['pengalaman']; ?>">
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Keterampilan</label>
                                  <textarea class="form-control" name="keterampilan" rows="3"><?= $p['keterampilan']; ?></textarea>
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Gaji</label>
                                  <input type="number" class="form-control" name="gaji" value="<?= $p['gaji']; ?>">
                                  <?= form_error('email_pembantu', '<small class="text-danger pl-1">', '</small>'); ?>
                              </div>

                              <div class="form-group">
                                  <label>Nama Bank</label>
                                  <select class="form-control" name="nama_bank">
                                      <option value="BNI" <?php if ($p['agama'] == 'BNI') {
                                                                echo 'selected';
                                                            } ?>>BNI</option>
                                      <option value="BRI" <?php if ($p['agama'] == 'BRI') {
                                                                echo 'selected';
                                                            } ?>>BRI</option>
                                      <option value="Mandiri" <?php if ($p['agama'] == 'Mandiri') {
                                                                    echo 'selected';
                                                                } ?>>Mandiri</option>
                                      <option value="BCA" <?php if ($p['agama'] == 'BCA') {
                                                                echo 'selected';
                                                            } ?>>BCA</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>No. Rekening</label>
                                  <input type="number" class="form-control" name="no_rekening" value="<?= $p['no_rekening']; ?>">
                              </div>

                              <div class="form-group">
                                  <label>Deskripsi</label>
                                  <textarea class="form-control" name="deskripsi" rows="3"><?= $p['deskripsi']; ?></textarea>
                              </div>

                              <div class="form-group">
                                  <img src="<?= base_url('assets/uploads/pembantu/') . $p['foto_pembantu']; ?>" alt="foto_pembantu" style="width: 30%;">
                              </div>

                              <div class="form-group">
                                  <label>Update Foto Pembantu</label>
                                  <input type="file" name="foto_pembantu">
                              </div>

                              <div class="form-group">
                                  <img src="<?= base_url('assets/uploads/pembantu/') . $p['foto_ktp']; ?>" alt="foto_ktp" style="width: 30%;">
                              </div>

                              <div class="form-group">
                                  <label>Update Scan KTP</label>
                                  <input type="file" name="foto_ktp">
                              </div>

                              <!-- <div class="form-group">
                                  <img src="<?= base_url('assets/uploads/pembantu/') . $p['surat_polisi']; ?>" alt="surat polisi" style="width: 30%;">
                              </div>

                              <div class="form-group">
                                  <label>Update Scan SKCK</label>
                                  <input type="file" name="surat_polisi">
                              </div>

                              <div class="form-group">
                                  <img src="<?= base_url('assets/uploads/pembantu/') . $p['surat_dokter']; ?>" alt="surat dokter" style="width: 30%;">
                              </div>

                              <div class="form-group">
                                  <label>Update Scan Surat Dokter</label>
                                  <input type="file" name="surat_dokter">
                              </div> -->

                              <div class="form-group">
                                  <p class="help-block"><small style="color: red"><b>*</b></small> Pastikan upload foto dengan format jpg, jpeg atau png !!!</p>
                              </div>

                          </div>
                      </div>
                      <div class="box-footer">
                          <div class="box-body">
                              <input type="hidden" name="kode" id="kode" value="<?= $p['kd_pembantu']; ?>" required>
                              <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                              <a href="<?= base_url('admin/pembantu'); ?>" class="btn btn-default">Batal</a>
                          </div>
                      </div>
                  </form>
              </div>

          </section>
          <!-- /.content -->
      </div>