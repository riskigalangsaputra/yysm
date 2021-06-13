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
                                                  <span class="badge bg-red"><i class="fa fa-times"></i> <?= $k['status_kontrak']; ?></span>
                                              <?php } elseif ($k['status_kontrak'] == 'Menunggu') { ?>
                                                  <span class="badge bg-yellow"><i class="fa fa-clock-o"></i> <?= $k['status_kontrak']; ?></span>
                                              <?php } elseif ($k['status_kontrak'] == 'Diverifikasi') { ?>
                                                  <span class="badge bg-green"><i class="fa fa-check"></i> <?= $k['status_kontrak']; ?></span>
                                              <?php } elseif ($k['status_kontrak'] == 'Batal') { ?>
                                                  <span class="badge bg-orange"><i class="fa fa-exclamation-circle"></i> <?= $k['status_kontrak']; ?></span>
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