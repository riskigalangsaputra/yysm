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
                                      <th>Kode Kontrak</th>
                                      <th>Nama Pembantu</th>
                                      <th>Nama Majikan</th>
                                      <th>Gaji Pembantu</th>
                                      <th>No Rekening</th>
                                      <th>Jumlah Pembayaran</th>
                                      <th>Diverifikasi</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 0;
                                    foreach ($pembayaran as $p) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $p['kd_pembayaran']; ?></td>
                                          <td><?= $p['nama_pembantu']; ?></td>
                                          <td><?= $p['nama_majikan']; ?></td>
                                          <td>Rp <?= number_format($p['gaji'], 0, ".", "."); ?></td>
                                          <td><?= $p['no_rekening']; ?></td>
                                          <td><span class="badge bg-green">Rp <?= number_format($p['total'], 0, ".", "."); ?></span></td>
                                          <td><?= $p['nama_pembantu']; ?></td>
                                          <td>
                                              <?php if ($p['status_pembayaran'] == 'Menunggu Verifikasi') { ?>
                                                  <span class="badge bg-yellow"><?= $p['status_pembayaran']; ?></span>
                                              <?php } elseif ($p['status_pembayaran'] == 'Diverifikasi') { ?>
                                                  <span class="badge bg-green"><?= $p['status_pembayaran']; ?></span>
                                              <?php } elseif ($p['status_pembayaran'] == 'Ditolak') { ?>
                                                  <span class="badge bg-orange"><?= $p['status_pembayaran']; ?></span>
                                              <?php } ?>
                                          </td>
                                          <td>
                                              <?php if ($p['status_pembayaran'] == 'Ditolak') { ?>
                                                  <a data-toggle="modal" data-target="#Modal_hapus<?= $p['kd_pembayaran']; ?>" class="btn btn-danger btn-xs">Hapus</a><br></br>
                                              <?php } elseif ($p['status_pembayaran'] == 'Diverifikasi') { ?>
                                                  <a href="<?= base_url('admin/pembayaran/bukti/' . $p['kd_pembayaran']); ?>" class="btn btn-info btn-xs">Bukti</a><br></br>
                                                  <a data-toggle="modal" data-target="#Modal_hapus<?= $p['kd_pembayaran']; ?>" class="btn btn-danger btn-xs">Hapus</a><br></br>
                                              <?php } elseif ($p['status_pembayaran'] == 'Menunggu Verifikasi') { ?>
                                              <?php } ?>
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
  <?php foreach ($pembayaran as $p) : ?>
      <div class="modal fade" id="Modal_verifikasi<?= $p['kd_pembayaran']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('verifikasi-pembayaran'); ?>" method="post">
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
                              <h4 class="heading mt-4">Yakin Ingin Verifikasi Pembayaran!</h4>
                              <input type="hidden" name="kode" value="<?= $p['kd_pembayaran']; ?>">
                              <input type="hidden" name="kd_kontrak" value="<?= $p['kd_kontrak']; ?>">
                              <input type="hidden" name="nama" value="<?= $p['nama_majikan']; ?>">
                              <input type="hidden" name="status" value="Diverifikasi">
                              <p>Majikan <strong><?= $p['nama_majikan']; ?></strong></p>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-success ml-auto" style="text-decoration: none;font-weight: 700">Verifikasi</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>

  <!-- Modal Tolak-->
  <?php foreach ($pembayaran as $p) : ?>
      <div class="modal fade" id="Modal_tolak<?= $p['kd_pembayaran']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('tolak-pembayaran'); ?>" method="post">
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
                              <h4 class="heading mt-4">Yakin Ingin Menolak Pembayaran!</h4>
                              <input type="hidden" name="kode" value="<?= $p['kd_pembayaran']; ?>">
                              <input type="hidden" name="kd_kontrak" value="<?= $p['kd_kontrak']; ?>">
                              <input type="hidden" name="nama" value="<?= $p['nama_majikan']; ?>">
                              <input type="hidden" name="status" value="Ditolak">
                              <p>Majikan <strong><?= $p['nama_majikan']; ?></strong></p>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-danger ml-auto" style="text-decoration: none;font-weight: 700">Tolak</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>


  <!-- Modal Hapus-->
  <?php foreach ($pembayaran as $p) : ?>
      <div class="modal fade" id="Modal_hapus<?= $p['kd_pembayaran']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?= base_url('hapus-pembayaran'); ?>" method="post">
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
                              <input type="hidden" name="kode" value="<?= $p['kd_pembayaran']; ?>">
                              <input type="hidden" name="nama" value="<?= $p['nama_majikan']; ?>">
                              <p>Majikan <strong><?= $p['nama_majikan']; ?></strong></p>
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