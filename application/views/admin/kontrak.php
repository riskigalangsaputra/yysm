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
                                      <th>Nama Pembantu</th>
                                      <th>Nama Majikan</th>
                                      <th>Gaji Pembantu</th>
                                      <th>Biaya Admin</th>
                                      <th>Total Bayar</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 0;
                                    foreach ($kontrak as $k) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $k['nama_pembantu']; ?></td>
                                          <td><?= $k['nama_majikan']; ?></td>
                                          <td>Rp <?= number_format($k['gaji'], 0, ".", "."); ?></td>
                                          <td>Rp <?= number_format($k['biaya_admin'], 0, ".", "."); ?></td>
                                          <td><span class="badge bg-green">Rp <?= number_format($k['total'], 0, ".", "."); ?></span></td>
                                          <td>
                                              <?php if ($k['status_kontrak'] == 'Belum Dibayar') { ?>
                                                  <span class="badge bg-red"><?= $k['status_kontrak']; ?></span>
                                              <?php } elseif ($k['status_kontrak'] == 'Diverifikasi') { ?>
                                                  <span class="badge bg-green"><?= $k['status_kontrak']; ?></span>
                                              <?php } elseif ($k['status_kontrak'] == 'Batal') { ?>
                                                  <span class="badge bg-blue"><?= $k['status_kontrak']; ?></span>
                                              <?php } ?>
                                          </td>
                                          <td>
                                              <?php if ($k['status_kontrak'] == 'Batal') : ?>
                                                  <a data-toggle="modal" data-target="#Modal_hapus<?= $k['kd_kontrak']; ?>" class="btn btn-danger btn-xs"> Hapus</a><br></br>
                                              <?php else : ?>
                                                  <a data-toggle="modal" data-target="#Modal_batal<?= $k['kd_kontrak']; ?>" class="btn btn-primary btn-xs"> Batal</a>
                                              <?php endif; ?>
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
  <?php foreach ($kontrak as $k) : ?>
      <div class="modal fade" id="Modal_batal<?= $k['kd_kontrak']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('admin/kontrak/batal'); ?>" method="post">
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
                              <h4 class="heading mt-4">Yakin Ingin Membatalkan Kontrak!</h4>
                              <input type="hidden" name="kode" value="<?= $k['kd_kontrak']; ?>">
                              <input type="hidden" name="kd_pembantu" value="<?= $k['kd_pembantu']; ?>">
                              <input type="hidden" name="nama" value="<?= $k['nama_majikan']; ?>">
                              <input type="hidden" name="status" value="Batal">
                              <p>Majikan <strong><?= $k['nama_majikan']; ?></strong></p>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-info ml-auto" style="text-decoration: none;font-weight: 700">Batal</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>

  <!-- Modal Hapus-->
  <?php foreach ($kontrak as $k) : ?>
      <div class="modal fade" id="Modal_hapus<?= $k['kd_kontrak']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('admin/kontrak/hapus'); ?>" method="post">
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
                              <h4 class="heading mt-4">Yakin Ingin Menghapus Kontrak!</h4>
                              <input type="hidden" name="kode" value="<?= $k['kd_kontrak']; ?>">
                              <input type="hidden" name="nama" value="<?= $k['nama_majikan']; ?>">
                              <p>Majikan <strong><?= $k['nama_majikan']; ?></strong></p>
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