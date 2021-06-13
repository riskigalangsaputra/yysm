  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
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
              <form role="form" method="post" action="<?= base_url('admin/pembantu/simpan'); ?>" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>NIK</label>
                              <input type="number" class="form-control" name="nik" placeholder="Masukan NIK dengan 16 digit" value="<?= set_value('nik'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username_pembantu" placeholder="Nama Lengkap Pembantu" value="<?= set_value('username_pembantu'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama_pembantu" placeholder="Nama Lengkap Pembantu" value="<?= set_value('nama_pembantu'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Email Pembantu</label>
                              <input type="email" class="form-control" name="email_pembantu" placeholder="Email Pembantu" value="<?= set_value('email_pembantu'); ?>">
                          </div>

                          <div class="form-group">
                              <label>No Telepon</label>
                              <input type="number" class="form-control" name="telepon" placeholder="No Telepon Makasimal 15 digit" value="<?= set_value('telepon'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Alamat Lengkap</label>
                              <textarea class="form-control" name="alamat_pembantu" rows="3" placeholder="Alamat Lengkap mulai dari nama jalan sampai kode pos"><?= set_value('alamat_pembantu'); ?></textarea>
                          </div>

                          <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <select class="form-control" name="jenis_kelamin">
                                  <option>-- Pilih Jenis Kelamin --</option>
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Agama</label>
                              <select class="form-control" name="agama">
                                  <option>-- Pilih Agama --</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Islam">Kristen</option>
                                  <option value="Prostestan">Protestan</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Budha">Budha</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Umur</label>
                              <input type="text" class="form-control" name="umur" placeholder="Umur Pembantu" value="<?= set_value('umur'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Tinggi Badan <small>(cm)</small></label>
                              <input type="number" class="form-control" name="tinggi" placeholder="Tinggi Badan Pembantu" value="<?= set_value('tinggi'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Berat Badan <small>(kg)</small></label>
                              <input type="number" class="form-control" name="berat" placeholder="Berat Badan Pembantu" value="<?= set_value('berat'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Menginap</label>
                              <select class="form-control" name="menginap">
                                  <option>-- Pilih Menginap ? --</option>
                                  <option value="Ya">Ya</option>
                                  <option value="Tidak">Tidak</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Pendidikan Terakhir</label>
                              <select class="form-control" name="pendidikan">
                                  <option>-- Pendidikan Terakhir --</option>
                                  <option value="SD">SD</option>
                                  <option value="SMP">SMP</option>
                                  <option value="SMA">SMA</option>
                                  <option value="SMK">SMK</option>
                              </select>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Status Pembantu</label>
                              <select class="form-control" name="status_pembantu">
                                  <option>-- Pilih Status Pembantu --</option>
                                  <option value="Belum Menikah">Belum Menikah</option>
                                  <option value="Menikah">Menikah</option>
                                  <option value="Janda/Duda">Janda/Duda</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Pengalaman</label>
                              <input type="text" class="form-control" name="pengalaman" placeholder="Masukan Pengalaman Pembantu" value="<?= set_value('pengalaman'); ?>">
                              <small>Contoh : 24 Tahun</small>
                          </div>

                          <div class="form-group">
                              <label>Keterampilan</label>
                              <textarea class="form-control" name="keterampilan" rows="3" placeholder="Keterampilan Pembantu"><?= set_value('keterampilan'); ?></textarea>
                          </div>

                          <div class="form-group">
                              <label>Gaji</label>
                              <input type="number" class="form-control" name="gaji" placeholder="Masukan Gaji Pembantu" value="<?= set_value('gaji'); ?>">
                          </div>

                          <div class="form-group">
                              <label>Nama Bank</label>
                              <select class="form-control" name="nama_bank">
                                  <option>-- Pilih Nama Bank --</option>
                                  <option value="BNI">BNI</option>
                                  <option value="BRI">BRI</option>
                                  <option value="Mandiri">Mandiri</option>
                                  <option value="BCA">BCA</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>No. Rekening</label>
                              <input type="number" class="form-control" name="no_rekening" placeholder="Masukan No Rekening yang Sesuai">
                          </div>

                          <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi Pembantu"><?= set_value('deskripsi'); ?></textarea>
                          </div>

                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Masukan Password untuk Pembantu">
                          </div>

                          <div class="form-group">
                              <label>Upload Foto Pembantu</label>
                              <input type="file" name="foto_pembantu">
                          </div>

                          <div class="form-group">
                              <label>Upload Scan KTP</label>
                              <input type="file" name="foto_ktp">
                          </div>

                          <div class="form-group">
                              <label>Upload Scan SKCK</label>
                              <input type="file" name="surat_polisi">
                          </div>

                          <div class="form-group">
                              <label>Upload Scan Surat Dokter</label>
                              <input type="file" name="surat_dokter">
                          </div>

                          <div class="form-group">
                              <p class="help-block"><small style="color: red"><b>*</b></small> Pastikan upload foto dengan format jpg, jpeg atau png !!!</p>
                          </div>

                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="box-body">
                          <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                          <a href="<?= base_url('admin/pembantu'); ?>" class="btn btn-default">Batal</a>
                      </div>
                  </div>
              </form>
          </div>

      </section>
      <!-- /.content -->
  </div>