<section class="content" id="all-post">
  <div class="container-fluid">
      <div class="block-header">
          <h2>SEMUA POST</h2>
      </div>
      <div class="row clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 os-p-l-0">
                  <button type="button" class="btn btn-primary btn-lg waves-effect m-l-0 buat-post">Tambah Post</button>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" class="form-control os-p-l-10" placeholder="Cari post...">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                      <button type="button" class="btn btn-primary btn-lg waves-effect">Cari</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- Success message for deleted post -->
      <?php $this->view('content/message/success-delete') ?>
      <!-- #END -->

      <div class="row clearfix" id="post-list">
          <!-- Display All Posts -->
          <?php $this->view('data/post-list') ?>
          <!-- #END Display post -->
      </div>

      <!-- Confirmation box -->
      <?php $this->view('content/popup/delete-confirm') ?>
      <!-- #END -->
  </div>
</section>
