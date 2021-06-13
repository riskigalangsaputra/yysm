<section class="container">

    <div class="rekomendasi">
        <div class="row rekomendasi-prt">
            <div class="col-md-6">
                <h3 class="text-left">Pesan</h3>
            </div>
        </div>
    </div>
    <hr>

    <div class="col-md-10" style="margin: 0 auto">
        <form method="POST" action="<?= base_url('pesan/kirim'); ?>">
            <div class="form-group">
                <label>Subjek</label>
                <input type="text" class="form-control" name="subjek" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label>Pesan</label>
                <textarea class="form-control" name="pesan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <a href="<?= base_url(); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>

</section>