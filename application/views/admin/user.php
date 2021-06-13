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

      <section class="content" style="margin-top: 10px;">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">
                      <div class="box-header">
                          <a href="<?= base_url('admin/user/tambah'); ?>" class="btn btn-primary">Tambah</a>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Foto</th>
                                      <th>Username</th>
                                      <th>Nama Lengkap</th>
                                      <th>Email</th>
                                      <th>Telepon</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 0;
                                    foreach ($pengguna as $p) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><img src="<?= base_url('assets/uploads/user/') . $p['gambar']; ?>" style="width: 50%;"></td>
                                          <td><?= $p['username']; ?></td>
                                          <td><?= $p['nama_lengkap']; ?></td>
                                          <td><?= $p['email']; ?></td>
                                          <td><?= $p['telepon']; ?></td>
                                          <td><?= $p['jenis_kelamin']; ?></td>
                                          <td>
                                              <?php if ($p['status'] == 'Aktif') : ?>
                                                  <span class="badge bg-green">Aktif</span>
                                              <?php else : ?>
                                                  <span class="badge bg-red">Tidak Aktif</span>
                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <a href="<?= base_url('admin/user/edit/') . $p['kd_user']; ?>" class="btn btn-success btn-xs">Edit</a><br></br>
                                              <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Modal_delete<?= $p['kd_user']; ?>">Hapus</a>
                                          </td>
                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>

  <?php foreach ($pengguna as $p) : ?>
      <div class="modal fade" id="Modal_delete<?= $p['kd_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('admin/user/hapus'); ?>" method="post">
              <div class="modal-dialog modal-primary modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content bg-outline-primary">
                      <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-notification">Perhatian !!!</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="py-3 text-center">
                              <i class="fa fa-bell" style="font-size: 90px"></i>
                              <h4 class="heading mt-4">Yakin Ingin Menghapus!</h4>
                              <input type="hidden" name="kode" value="<?= $p['kd_user']; ?>">
                              <input type="hidden" name="nama" value="<?= $p['nama_lengkap']; ?>">
                              <input type="hidden" name="gambar" value="<?= $p['gambar']; ?>">
                              <p>Tipe Pengguna <strong><?= $p['nama_lengkap']; ?></strong></p>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger ml-auto" style="text-decoration: none;font-weight: 700">Hapus</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>