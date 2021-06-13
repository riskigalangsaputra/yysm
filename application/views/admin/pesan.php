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
                                      <th>Nama Majikan</th>
                                      <th>Subjek</th>
                                      <th>Pesan</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 0;
                                    foreach ($pesan as $p) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $p['nama_majikan']; ?></td>
                                          <td><?= $p['subjek']; ?></td>
                                          <td><?= $p['pesan']; ?></td>
                                          <td>
                                              <a data-toggle="modal" data-target="#Modal_hapus<?= $p['kd_pesan']; ?>" class="btn btn-danger btn-xs">Hapus</a>
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

  <!-- Modal Hapus-->
  <?php foreach ($pesan as $p) : ?>
      <div class="modal fade" id="Modal_hapus<?= $p['kd_pesan']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('admin/pesan/hapus'); ?>" method="post">
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
                              <h4 class="heading mt-4">Yakin Ingin Menghapus Pembayaran!</h4>
                              <input type="hidden" name="kode" value="<?= $p['kd_pesan']; ?>">
                              <input type="hidden" name="nama" value="<?= $p['nama_majikan']; ?>">
                              <p>Pesan dari <strong><?= $p['nama_majikan']; ?></strong></p>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-danger ml-auto" style="text-decoration: none;font-weight: 700">Hapus</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>