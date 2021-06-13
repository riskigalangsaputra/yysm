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
                                    foreach ($negosiasi as $n) {
                                        $no++;
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $n['nama_pembantu']; ?></td>
                                          <td><?= $n['nama_majikan']; ?></td>
                                          <td>Rp <?= number_format($n['gaji'], 0, ".", "."); ?></td>
                                          <td>Rp <?= number_format($n['biaya_admin'], 0, ".", "."); ?></td>
                                          <td><span class="badge bg-green">Rp <?= number_format($n['total'], 0, ".", "."); ?></span></td>
                                          <td>
                                              <?php if ($n['status_negosiasi'] == 'Diproses') { ?>
                                                  <span class="badge bg-yellow"><i class="fa fa-clock-o"></i> <?= $n['status_negosiasi']; ?></span>
                                              <?php } elseif ($n['status_negosiasi'] == 'Diterima') { ?>
                                                  <span class="badge bg-green"><i class="fa fa-thumbs-o-up"></i> <?= $n['status_negosiasi']; ?></span>
                                              <?php } elseif ($n['status_negosiasi'] == 'Ditolak') { ?>
                                                  <span class="badge bg-red"><i class="fa fa-thumbs-o-down"></i> <?= $n['status_negosiasi']; ?></span>
                                              <?php } ?>
                                          </td>
                                          <td>
                                              <?php if ($n['status_negosiasi'] == 'Ditolak') : ?>
                                              <?php else : ?>
                                                  <a data-toggle="modal" data-target="#Modal_terima<?= $n['kd_negosiasi']; ?>" class="btn btn-primary btn-xs">Terima</a> |
                                                  <a data-toggle="modal" data-target="#Modal_tolak<?= $n['kd_negosiasi']; ?>" class="btn btn-danger btn-xs">Tolak</a>
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
  <?php foreach ($negosiasi as $n) : ?>
      <div class="modal fade" id="Modal_terima<?= $n['kd_negosiasi']; ?>" tabindex="-1" aria-labelledby="Modal_terimaLabel" aria-hidden="true">
          <form action="<?= base_url('pembantu/negosiasi/terima'); ?>" method="post">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="Modal_terimaLabel">Terima Negosiasi ?</h4>
                      </div>

                      <div class="modal-body">

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Nama Pembantu</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" value="<?= $n['nama_pembantu'] ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Nama Majikan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" value="<?= $n['nama_majikan'] ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Alamat Majikan</label>
                              <div class="col-sm-8">
                                  <textarea class="form-control" rows="3" readonly><?= $n['alamat_majikan'] ?></textarea>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Tanggal Negosiasi</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tanggal_negosiasi" value="<?= $n['tanggal'] ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Gaji Pembantu</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" value="Rp <?= number_format($n['gaji'], 0, ".", "."); ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Biaya Admin</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" value="Rp <?= number_format($n['biaya_admin'], 0, ".", "."); ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Total</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" value="Rp <?= number_format($n['total'], 0, ".", "."); ?>" readonly>
                              </div>
                          </div>

                      </div>

                      <div class="modal-footer">
                          <input type="hidden" name="kode" value="<?= $n['kd_negosiasi']; ?>" required>
                          <input type="hidden" name="nama" value="<?= $n['nama_pembantu']; ?>" required>
                          <input type="hidden" name="status" value="Diterima" required>
                          <input type="hidden" name="kd_pembantu" value="<?= $n['kd_pembantu']; ?>" required>
                          <input type="hidden" name="kd_majikan" value="<?= $n['kd_majikan']; ?>" required>
                          <input type="hidden" name="biaya_admin" value="<?= $n['biaya_admin']; ?>" required>
                          <input type="hidden" name="total" value="<?= $n['total']; ?>" required>
                          <input type="hidden" name="status_kontrak" value="Belum Dibayar" required>
                          <input type="hidden" name="kode_pembantu" value="<?= $n['kd_pembantu']; ?>" required>
                          <input type="hidden" name="kategori" value="Tidak Tersedia" required>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Terima</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>


  <!-- Modal -->
  <?php foreach ($negosiasi as $n) : ?>
      <div class="modal fade" id="Modal_tolak<?= $n['kd_negosiasi']; ?>" tabindex="-1" aria-labelledby="Modal_tolakLabel" aria-hidden="true">
          <form action="<?= base_url('pembantu/negosiasi/tolak'); ?>" method="post">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="Modal_tolakLabel">Tolak Negosiasi ?</h4>
                      </div>

                      <div class="modal-body">

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Nama Pembantu</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="kd_pembantu" value="<?= $n['nama_pembantu'] ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Nama Majikan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="kd_majikan" value="<?= $n['nama_majikan'] ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Alamat Majikan</label>
                              <div class="col-sm-8">
                                  <textarea class="form-control" name="alamat_majikan" rows="3" readonly><?= $n['alamat_majikan'] ?></textarea>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Tanggal Negosiasi</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tanggal_negosiasi" value="<?= $n['tanggal'] ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Gaji Pembantu</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="gaji" value="Rp <?= number_format($n['gaji'], 0, ".", "."); ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Biaya Admin</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="biaya_admin" value="Rp <?= number_format($n['biaya_admin'], 0, ".", "."); ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Total</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="total" value="Rp <?= number_format($n['total'], 0, ".", "."); ?>" readonly>
                              </div>
                          </div>

                      </div>

                      <div class="modal-footer">
                          <input type="hidden" name="kode" value="<?= $n['kd_negosiasi']; ?>" required>
                          <input type="hidden" name="nama" value="<?= $n['nama_pembantu']; ?>" required>
                          <input type="hidden" name="status" value="Ditolak" required>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Tolak</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>