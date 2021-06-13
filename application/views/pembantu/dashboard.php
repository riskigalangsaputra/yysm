<div class="content-wrapper">
    <section class="content-header" style="margin-top: 10px;">
        <h1>
            <?= $title; ?>
        </h1>
    </section>

    <section class="content">
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-hand-spock-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Negosiasi</span>
                        <span class="info-box-number"><?= $total_negosiasi; ?> Negosiasi Menunggu</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-sitemap"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kontrak</span>
                        <span class="info-box-number"><?= $total_kontrak; ?> Kontrak Tersedia</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pembayaran</span>
                        <span class="info-box-number"><?= $total_pembayaran; ?> Pembayaran Tersedia</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>