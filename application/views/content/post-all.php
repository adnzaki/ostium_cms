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

      <div class="row clearfix">
          <div class="col-xs-12">
              <?php
              $active = ["<b style=color:#000;>", "</b>"];
              ?>
              <a href="<?=base_url('post') ?>" class="os-post-filter">
                  <?php
                  if($this->uri->segment(1) === 'post' OR $this->uri->segment(2) === 'index')
                  {
                      echo $active[0] . "Semua (" . $total_semua . ")" . $active[1];
                  }
                  else
                  {
                      echo "Semua (" . $total_semua . ")";
                  }

                  ?>
              </a> &nbsp | &nbsp
              <a href="<?=base_url('posts/filter_post/publik') ?>" class="os-post-filter">
                  <?php
                  if($this->uri->segment(3) === 'publik')
                  {
                      echo $active[0] . "Published (" . $total_post . ")" . $active[1];
                  }
                  else
                  {
                      echo "Published (" . $total_post . ")";
                  }

                  ?>
              </a> &nbsp | &nbsp
              <a href="<?=base_url('posts/filter_post/draft') ?>" class="os-post-filter">
                  <?php
                  if($this->uri->segment(3) === 'draft')
                  {
                      echo $active[0] . "Draft (" . $total_draft . ")" . $active[1];
                  }
                  else
                  {
                      echo "Draft (" . $total_draft . ")";
                  }

                  ?>
              </a>
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
