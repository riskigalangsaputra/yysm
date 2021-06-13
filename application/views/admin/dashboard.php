        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?= $title; ?>
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $total_pembantu; ?></h3>

                                <p>Pembantu Terdaftar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-woman"></i>
                            </div>
                            <a href="<?= base_url('admin/pembantu'); ?>" class="small-box-footer">Lihat Daftar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?= $total_majikan; ?></h3>

                                <p>Majikan Terdaftar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-man"></i>
                            </div>
                            <a href="<?= base_url('admin/majikan'); ?>" class="small-box-footer">Lihat Daftar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $total_user; ?></h3>

                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="<?= base_url('admin/user'); ?>" class="small-box-footer">Lihat Daftar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $total_negosiasi; ?></h3>

                                <p>Negosiasi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?= base_url('admin/negosiasi'); ?>" class="small-box-footer">Lihat Daftar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </section>
            <!-- /.content -->
        </div>