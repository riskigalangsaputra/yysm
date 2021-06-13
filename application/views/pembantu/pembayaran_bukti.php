        <?php
        error_reporting(0);
        $b = $bukti->row_array();
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="margin-top: 10px;">
                    <?= $title; ?>
                </h1>

                <section class="content" style="margin-top: 10px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <img src="<?= base_url('assets/uploads/pembayaran/') . $b['bukti_pembayaran']; ?>" alt="bukti_pembayaran" style="width: 50%;">
                                </div>

                                <div class="box-footer">
                                    <div class="box-body">
                                        <a href="<?= base_url('pembantu/pembayaran'); ?>" class="btn btn-default">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </section>
        </div>