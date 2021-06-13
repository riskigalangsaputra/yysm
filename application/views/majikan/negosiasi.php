<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6">
                <h3 class="text-left">Negosiasi</h3>
            </div>
        </div>
    </div>
    <hr>

    <div class="table">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Negosiasi</th>
                    <th>Nama Pembantu</th>
                    <th>Tanggal Negosiasi</th>
                    <th>Gaji</th>
                    <th>Biaya Admin</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($negosiasi as $n) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no; ?>.</td>
                        <td><?= $n['kd_negosiasi'] ?></td>
                        <td><?= $n['nama_pembantu'] ?></td>
                        <td><?= $n['tanggal'] ?></td>
                        <td>Rp <?= number_format($n['gaji'], 0, ".", "."); ?></td>
                        <td>Rp <?= number_format($n['biaya_admin'], 0, ".", "."); ?></td>
                        <td>Rp <?= number_format($n['total'], 0, ".", "."); ?></td>
                        <td>
                            <?php if ($n['status_negosiasi'] == 'Diproses') { ?>
                                <span class="badge badge-warning"><i class="fa fa-clock-o"></i> <?= $n['status_negosiasi']; ?></span>
                            <?php } elseif ($n['status_negosiasi'] == 'Diterima') { ?>
                                <span class="badge badge-success"><i class="fa fa-thumbs-o-up"></i> <?= $n['status_negosiasi']; ?></span>
                            <?php } elseif ($n['status_negosiasi'] == 'Ditolak') { ?>
                                <span class="badge badge-danger"><i class="fa fa-times"></i> <?= $n['status_negosiasi']; ?></span>
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