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
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">
                      <div class="box-header">
                          <a href="<?= base_url('admin/pembantu/tambah'); ?>" class="btn btn-primary">Tambah</a>
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
                                      <th>Kategori</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 0;
                                    foreach ($pembantu as $p) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><img src="<?= base_url('assets/uploads/pembantu/') . $p['foto_pembantu']; ?>" style="width: 50%;"></td>
                                          <td><?= $p['nik']; ?></td>
                                          <td><?= $p['nama_pembantu']; ?></td>
                                          <td><?= $p['email_pembantu']; ?></td>
                                          <td><?= $p['telepon']; ?></td>
                                          <td><?= $p['jenis_kelamin']; ?></td>
                                          <td>
                                              <?php if ($p['kategori'] == 'Tersedia') : ?>
                                                  <span class="badge bg-green">Tersedia</span>
                                              <?php else : ?>
                                                  <span class="badge bg-red">Tidak Tersedia</span>
                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <?php if ($p['status_pembantu'] == 'Terverifikasi') : ?>
                                                  <span class="badge bg-aqua">Terverifikasi</span>
                                              <?php else : ?>
                                                  <a href="<?= base_url('admin/pembantu/verifikasi/' . $p['kd_pembantu']); ?>" class="badge bg-yellow">Belum Terverifikasi</a>
                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <a href="<?= base_url('admin/pembantu/edit/') . $p['kd_pembantu']; ?>" class="btn btn-success btn-xs">Edit</a><br></br>
                                              <a data-toggle="modal" data-target="#Modal_hapus<?= $p['kd_pembantu']; ?>" class="btn btn-danger btn-xs">Hapus</a>
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
  <?php foreach ($pembantu as $p) : ?>
      <div class="modal fade" id="Modal_hapus<?= $p['kd_pembantu']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('admin/pembantu/hapus'); ?>" method="post">
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
                              <input type="hidden" name="kode" value="<?= $p['kd_pembantu']; ?>">
                              <input type="hidden" name="nama" value="<?= $p['nama_pembantu']; ?>">
                              <input type="hidden" name="foto" value="<?= $p['foto_pembantu']; ?>">
                              <input type="hidden" name="foto_ktp" value="<?= $p['foto_ktp']; ?>">
                              <input type="hidden" name="surat_polisi" value="<?= $p['surat_polisi']; ?>">
                              <input type="hidden" name="surat_dokter" value="<?= $p['surat_dokter']; ?>">
                              <p>Pembantu <strong><?= $p['nama_pembantu']; ?></strong></p>
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