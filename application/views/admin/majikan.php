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
                          <!-- <a href="tambah-majikan" class="btn btn-primary">Tambah</a> -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Foto</th>
                                      <th>NIK</th>
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
                                    foreach ($majikan as $m) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><img src="<?= base_url('assets/uploads/majikan/') . $m['foto_majikan']; ?>" style="width: 50%;"></td>
                                          <td><?= $m['nik']; ?></td>
                                          <td><?= $m['nama_majikan']; ?></td>
                                          <td><?= $m['email_majikan']; ?></td>
                                          <td><?= $m['telepon']; ?></td>
                                          <td><?= $m['jenis_kelamin']; ?></td>
                                          <td>
                                              <?php if ($m['status'] == 'Terverifikasi') : ?>
                                                  <span class="badge bg-green">Terverifikasi</span>
                                              <?php else : ?>
                                                  <a href="<?= base_url('admin/majikan/verifikasi/' . $m['kd_majikan']); ?>" class="badge bg-red">Belum Terverifikasi</a>
                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Modal_delete<?= $m['kd_majikan']; ?>">Hapus</a>
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

  <!-- Modal -->
  <?php foreach ($majikan as $m) : ?>
      <div class="modal fade" id="Modal_delete<?= $m['kd_majikan']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('admin/majikan/hapus'); ?>" method="post">
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
                              <input type="hidden" name="kode" value="<?= $m['kd_majikan']; ?>">
                              <input type="hidden" name="nama" value="<?= $m['nama_majikan']; ?>">
                              <input type="hidden" name="foto" value="<?= $m['foto_majikan']; ?>">
                              <p>Majikan <strong><?= $m['nama_majikan']; ?></strong></p>
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