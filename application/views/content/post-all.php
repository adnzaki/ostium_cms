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
              <a href="<?=base_url('post') ?>" class="os-post-filter"><?= filter_link(['post', 'index', 'all'], 'Semua'); ?></a> &nbsp | &nbsp
              <a href="<?=base_url('posts/filter_post/publik') ?>" class="os-post-filter"><?= filter_link('publik', 'Published') ?></a> &nbsp | &nbsp
              <a href="<?=base_url('posts/filter_post/draft') ?>" class="os-post-filter"><?= filter_link('draft', 'Draft') ?></a>
          </div>
      </div>
      <div class="row clearfix">
          <div class="col-sm-3 col-xs-12">
              <select class="form-control show-tick">
                  <option value="">-- Semua Kategori --</option>
                  <?php
                  foreach ($kategori->result() as $kat) {
                      echo '<option value=' . $kat->id_kategori . '>' . $kat->nama_kategori . '</option>';
                  }
                  ?>
              </select>
          </div>
          <div class="col-sm-3 col-xs-12">
              <select class="form-control show-tick" id="date-selector">
                  <option value="">-- Semua Tanggal --</option>
                  <?php
                  $arr = [];
                  foreach ($tanggal as $tgl) {
                      $date = explode(" ", $tgl->tanggal_post);
                      $date_to_set = $date[0];
                      $set_date = explode("-", $date_to_set);
                      $print_date = $this->ostiumdate->format('d-Mm-y', $set_date[2].'-'.$set_date[1].'-'.$set_date[0]);
                      $escape_day = explode(" ", $print_date);
                      $date_value = array(
                          'month' => $escape_day[1] . ' ' . $escape_day[2],
                          'value' => $set_date[0].$set_date[1]
                      );
                      array_push($arr, $date_value);
                  }

                  $get_month = multidimensional_array_unique($arr, 'month');
                  foreach ($get_month as $bulan => $mon) {
                      echo '<option value="'.$mon['value'].'">'.$mon['month'].'</option>';
                  }
                  ?>
              </select>
          </div>
          <div class="col-sm-3 col-xs-12">
              <a href="" id="go-filter">
                  <button type="button" class="btn btn-primary" name="button">Filter</button>
              </a>
          </div>
      </div>
      <!-- Success message for deleted post -->
      <?php $this->view('content/message/success-delete') ?>
      <!-- #END -->

      <div class="row clearfix">
          <!-- Display All Posts -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                  <div class="body">
                      <div class="table-responsive" id="post-list">
                          <?php $this->view('data/post-list') ?>
                      </div>
                      <?php echo $this->pagination->create_links(); ?>
                  </div>
              </div>
          </div>
          <!-- #END Display post -->
      </div>

      <!-- Confirmation box -->
      <?php $this->view('content/popup/delete-confirm') ?>
      <!-- #END -->
  </div>
</section>
