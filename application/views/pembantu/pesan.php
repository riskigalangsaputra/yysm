  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1 style="margin-top: 10px;">
              <?= $title; ?>
          </h1>
      </section>

      <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <?= $this->session->flashdata('error'); ?>
          </div>
      <?php endif; ?>

      <!-- Main content -->
      <section class="content" style="margin-top: 10px;">

          <div class="col-md-12">
              <div class="box box-primary">
                  <form class="form-horizontal" method="post" action="<?= base_url('kirim-pesan'); ?>">
                      <div class="box-body">

                          <div class="form-group">
                              <label class="col-sm-1 control-label">Nama</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-1 control-label">Email</label>
                              <div class="col-sm-6">
                                  <input type="email" class="form-control" name="email" value="<?= $email; ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-1 control-label">Subjek</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name='subjek' placeholder="Subjek Pesan">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-1 control-label">Isi Pesan</label>
                              <div class="col-sm-6">
                                  <textarea class="form-control" name="pesan" rows="3" placeholder="Isi Pesan"></textarea>
                              </div>
                          </div>

                      </div>

                      <div class="box-footer">
                          <div class="box-body">
                              <button type="submit" class="btn btn-primary">Kirim</button>&nbsp;&nbsp;&nbsp;
                              <a href="<?= base_url('dashboard-pembantu'); ?>" class="btn btn-default">Batal</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>

      </section>
  </div>