<div class="banner">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Butuh PRT ?</h1>
            <p class="lead">Temukan Pembantu Rumah Tangga yang terampil dan berkualitas disini</p>
        </div>
    </div>
</div>

<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6">
                <h3 class="text-left">Rekomendasi PRT</h3>
            </div>
        </div>

        <div class="row row-cols-md-4">
            <?php foreach ($pembantu as $p) : ?>
                <?php if ($p['kategori'] == 'Tersedia') : ?>
                    <div class="col mb-4">
                        <a href="<?= base_url('prt/detail/' . $p['kd_pembantu']); ?>" style="text-decoration: none;color: #000">
                            <div class="card card-pembantu">
                                <img src="<?= base_url('assets/uploads/pembantu/' . $p['foto_pembantu']); ?>" class="card-img-top" style="height: 10rem;" alt="Foto Pembantu">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $p['nama_pembantu'] ?></h5>
                                    <p class="card-text"><?= word_limiter($p['deskripsi'], 7); ?></p>
                                    <p class="card-harga">Rp <?= number_format($p['gaji'], 0, ".", "."); ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $p['pengalaman'] ?> Pengalaman | <?= $p['umur'] ?> Tahun</small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="banyak-dilihat">
        <div class="row banyak-dilihat-prt">
            <div class="col-md-6">
                <h3 class="text-left">PRT Paling Banyak Dilihat</h3>
            </div>
        </div>

        <div class="owl-carousel owl-theme loop">
            <div class="row row-cols-1 row-cols-md-4">
                <?php foreach ($populer as $populer) : ?>
                    <?php if ($p['kategori'] == 'Tersedia') : ?>
                        <div class="col mb-4">
                            <a href="<?= base_url('prt/detail/' . $p['kd_pembantu']); ?>" style="text-decoration: none;color: #000">
                                <div class="card card-banyak-dilihat">
                                    <img src="<?= base_url('assets/uploads/pembantu/' . $populer['foto_pembantu']); ?>" class="card-img-top" style="height: 10rem;" alt="Foto Pembantu">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $populer['nama_pembantu'] ?></h5>
                                        <p class="card-text"><?= word_limiter($p['deskripsi'], 7); ?></p>
                                        <p class="card-harga">Rp <?= number_format($p['gaji'], 0, ".", "."); ?></p>
                                        <p class="card-text"><small class="text-muted"><?= $populer['pengalaman'] ?> Pengalaman | <?= $p['umur'] ?> Tahun</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>