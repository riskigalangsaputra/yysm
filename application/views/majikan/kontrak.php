<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6">
                <h3 class="text-left">Kontrak</h3>
            </div>
        </div>
    </div>
    <hr>

    <div class="table">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Majikan</th>
                    <th>Nama Pembantu</th>
                    <th>Gaji</th>
                    <th>Biaya Admin</th>
                    <th>Total</th>
                    <th>Tanggal Kontrak</th>
                    <th>Tanggal Pembayaran</th>
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
                        <td><?= $no; ?>.</td>
                        <td><?= $k['kd_kontrak'] ?></td>
                        <td><?= $k['nama_pembantu'] ?></td>
                        <td>Rp <?= number_format($k['gaji'], 0, ".", "."); ?></td>
                        <td>Rp <?= number_format($k['biaya_admin'], 0, ".", "."); ?></td>
                        <td>Rp <?= number_format($k['total'], 0, ".", "."); ?></td>
                        <td><?= $k['tanggal'] ?></td>
                        <td><?= $k['tanggal_pembayaran'] ?></td>
                        <td>
                            <?php if ($k['status_kontrak'] == 'Belum Dibayar') { ?>
                                <span class="badge badge-danger"><i class="fa fa-times"></i> <?= $k['status_kontrak']; ?></span>
                            <?php } elseif ($k['status_kontrak'] == 'Menunggu') { ?>
                                <span class="badge badge-warning"><i class="fa fa-clock-o"></i> <?= $k['status_kontrak']; ?></span>
                            <?php } elseif ($k['status_kontrak'] == 'Diverifikasi') { ?>
                                <span class="badge badge-success"><i class="fa fa-check"></i> <?= $k['status_kontrak']; ?></span>
                            <?php } elseif ($k['status_kontrak'] == 'Batal') { ?>
                                <span class="badge badge-info"><i class="fa fa-exclamation-circle"></i> <?= $k['status_kontrak']; ?></span>
                            <?php } ?>
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#Modal_batal<?= $k['kd_kontrak']; ?>" class="btn btn-primary btn-sm">Batal</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</section>

<!-- Modal -->
<?php foreach ($kontrak as $k) : ?>
    <div class="modal fade" id="Modal_batal<?= $k['kd_kontrak']; ?>" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
        <form action="<?= base_url('kontrak/batal'); ?>" method="post">
            <div class="modal-dialog modal-primary modal-dialog-centered modal-sm" role="document">
                <div class="modal-content bg-outline-primary">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Perhatian !!!</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-4 text-center">
                            <i class="fa fa-bell" style="font-size: 90px"></i>
                            <h4 class="heading mt-4">Yakin Ingin Membatalkan kontrak!</h4>
                            <input type="hidden" name="kode" value="<?= $k['kd_kontrak']; ?>">
                            <input type="hidden" name="nama" value="<?= $k['nama_pembantu']; ?>">
                            <input type="hidden" name="status" value="Batal">
                            <p>Pembantu <strong><?= $k['nama_pembantu']; ?></strong></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary ml-auto" style="text-decoration: none;font-weight: 700">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>