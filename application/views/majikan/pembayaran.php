<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6">
                <h3 class="text-left"><i class="fa fa-money"></i> Pembayaran</h3>
            </div>
        </div>
    </div>

    <a href="<?= base_url('pembayaran/tambah'); ?>" class="btn btn-primary">Tambah Pembayaran</a>
    <hr>

    <div class="table">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kontrak</th>
                    <th>Nama Pembantu</th>
                    <th>Gaji Pembantu</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status</th>
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
                        <td>Rp <?= number_format($p['gaji'], 0, ".", "."); ?></td>
                        <td><?= $p['nama_bank']; ?></td>
                        <td><?= $p['no_rekening']; ?></td>
                        <td><span class="badge badge-success">Rp <?= number_format($p['total'], 0, ".", "."); ?></span></td>
                        <td>
                            <?php if ($p['status_pembayaran'] == 'Menunggu Verifikasi') { ?>
                                <span class="badge badge-warning"><?= $p['status_pembayaran']; ?></span>
                            <?php } elseif ($p['status_pembayaran'] == 'Diverifikasi') { ?>
                                <span class="badge badge-success"><?= $p['status_pembayaran']; ?></span>
                            <?php } elseif ($p['status_pembayaran'] == 'Ditolak') { ?>
                                <span class="badge badge-danger"><?= $p['status_pembayaran']; ?></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</section>