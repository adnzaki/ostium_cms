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
      <div class="row clearfix" id="delete-msg">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="alert bg-green alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Post berhasil dihapus...
              </div>
          </div>
      </div>
      <!-- #END -->
      <div class="row clearfix" id="post-list">
          <!-- Display All Posts -->
          <?php $this->view('data/post-list') ?>
          <!-- #END Display post -->
      </div>
      <!-- Confirmation box -->
      <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="defaultModalLabel">Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                      Apakah anda yakin ingin menghapus post ini?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-link waves-effect btn-delete">OK</button>
                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- #END -->
  </div>
</section>
