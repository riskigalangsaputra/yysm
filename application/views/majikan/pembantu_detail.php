<?php
error_reporting(0);
$prt = $detail_prt->row_array();
?>


<section class="container">

    <div class="detail-pembantu">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Semua Pembantu</h5>
                        <hr>
                        <a class="title-dropdown" data-toggle="collapse" href="#collapsePembantu" role="button" aria-expanded="false" aria-controls="collapsePembantu" aria-haspopup="true" style="text-decoration: none;color:#000">Nama Pembantu <i class="fa fa-angle-down ml-5"></i></a>
                        <div class="collapse" id="collapsePembantu">
                            <?php
                            foreach ($show_prt as $sp) :
                            ?>
                                <?php if ($sp['kategori'] == 'Tersedia') : ?>
                                    <a href="<?= base_url('prt/detail/' . $sp['kd_pembantu']); ?>" style="text-decoration: none;color:#000" class="nav-link"><?= $sp['nama_pembantu']; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Mendaftar sejak <?= $prt['tanggal']; ?>
                    </div>
                    <img src="<?= base_url('assets/uploads/pembantu/' . $prt['foto_pembantu']); ?>" class="card-img-top" alt="Foto Pembantu">
                </div>

                <div class="mt-3">
                    <a class="btn btn-info btn-block">Gaji : Rp <?= number_format($prt['gaji'], 0, ".", "."); ?></a>
                </div>
            </div>

            <div class="col-md-5">

                <h5 class="mb-3"><?= $prt['nama_pembantu'] ?></h5>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tentang</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Keterampilan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Kontak</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= $prt['deskripsi']; ?>
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Umur
                                <span><?= $prt['umur'] ?> tahun</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tinggi
                                <span><?= $prt['tinggi'] ?> cm</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Berat
                                <span><?= $prt['berat'] ?> kg</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                KTP
                                <?php if ($prt['foto_ktp'] == NULL) { ?>
                                    <span class="badge badge-danger badge-pill"> <i class="fa fa-times"></i></span>
                                <?php } else { ?>
                                    <span class="badge badge-success badge-pill"> <i class="fa fa-check"></i></span>
                                <?php } ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Surat Polisi
                                <?php if ($prt['surat_polisi'] == NULL) { ?>
                                    <span class="badge badge-danger badge-pill"> <i class="fa fa-times"></i></span>
                                <?php } else { ?>
                                    <span class="badge badge-success badge-pill"> <i class="fa fa-check"></i></span>
                                <?php } ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Surat Dokter
                                <?php if ($prt['surat_dokter'] == NULL) { ?>
                                    <span class="badge badge-danger badge-pill"> <i class="fa fa-times"></i></span>
                                <?php } else { ?>
                                    <span class="badge badge-success badge-pill"> <i class="fa fa-check"></i></span>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <?= $prt['keterampilan']; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Email
                                <span class="badge badge-success badge-pill"><i class="fa fa-check"></i> <?= $prt['email_pembantu']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Telepon
                                <span><?= $prt['telepon']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Alamat :<br></br>
                                <?= $prt['alamat_pembantu']; ?>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 btn-negosiasi mt-3">
                        <form method="POST" action="<?= base_url('negosiasi/pesan_negosiasi'); ?>">
                            <input type="hidden" name="kd_pembantu" value="<?= $prt['kd_pembantu']; ?>" required>
                            <input type="hidden" name="nama_pembantu" value="<?= $prt['nama_pembantu']; ?>" required>
                            <input type="hidden" name="kd_majikan" value="<?= $majikan['kd_majikan']; ?>" required>
                            <input type="hidden" name="biaya_admin" value="500000" required>
                            <input type="hidden" name="gaji" value="<?= $prt['gaji']; ?>" required>
                            <input type="hidden" name="status_negosiasi" value="Diproses" required>
                            <?php
                            $session = $this->session->userdata('email_majikan');
                            if ($session) {
                            ?>
                                <button type="submit" class="btn btn-success btn-block">Pesan / Negosiasi</button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-success btn-block" disabled>Pesan / Negosiasi</button>
                            <?php } ?>
                        </form>
                    </div>
                    <div class="col-md-6 btn-negosiasi mt-3">
                        <a href="<?= base_url('pesan'); ?>" class="btn btn-info btn-block"><i class="fa fa-envelope"></i> Hubungi Admin</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>