<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6" style="margin: 0 auto">
                <h3 class="text-left"><i class="fa fa-plus"></i> Tambah Pembayaran</h3>
            </div>
        </div>
    </div>

    <div class="col-md-7" style="margin: 0 auto">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?= base_url('pembayaran/simpan'); ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Pembantu</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="kd_pembantu">
                                <option>-- Pilih Pembantu --</option>
                                <?php
                                foreach ($kontrak as $k) :
                                    $kd_pembantu = $k['kd_pembantu'];
                                ?>
                                    <option value="<?= $k['kd_pembantu']; ?>"><?= $k['nama_pembantu']; ?> | Rp <?= number_format($k['gaji'], 0, ".", "."); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="jumlah_pembayaran">
                            <small><span class="text-danger">*</span> Jumlah harus sesuai dengan gaji pembantu dan tanpa titik.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Upload Bukti</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" name="bukti">
                            <small><span class="text-danger">*</span> Pastikan upload bukti dengan format png, jpg, dan jpeg</small>
                        </div>
                    </div>

                    <hr>

                    <?php foreach ($kontrak as $k) : ?>
                        <input type="hidden" name="kd_kontrak" value="<?= $k['kd_kontrak']; ?>" required>
                        <input type="hidden" name="kd_majikan" value="<?= $k['kd_majikan']; ?>" required>
                        <input type="hidden" name="diverifikasi" value="0" required>
                        <input type="hidden" name="status_pembayaran" value="Menunggu Verifikasi" required>
                    <?php endforeach; ?>

                    <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;
                    <a href="<?= base_url('pembayaran'); ?>" class="btn btn-secondary">Batal</a>

                </form>

            </div>
        </div>
    </div>

</section>