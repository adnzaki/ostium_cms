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
              <form class="form-group" id="form-cari-post" action="<?= base_url() . $this->uri->uri_string() ?>" method="get">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">

                              <div class="form-line">
                                  <input type="text" name="cari-post" class="form-control os-p-l-10" id="cari-post" placeholder="Cari post...">
                              </div>

                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                          <!-- <a href="" class="btn btn-primary btn-lg waves-effect" id="btn-cari-post">Cari</a> -->
                          <button type="submit" class="btn btn-primary btn-lg waves-effect">Cari</button>
                      </div>
                  </div>
              </form>
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
              <select class="form-control show-tick" id="cat-selector">
                  <option value="">-- Semua Kategori --</option>
                  <?php
                  foreach ($kategori as $kat) {
                      $id = $kat->id_kategori;
                      if($this->uri->segment(5) === $id)
                      {
                          echo '<option value="' . $id . '" selected="selected">' . $kat->nama_kategori . '</option>';
                      }
                      else
                      {
                          echo '<option value="' . $id . '">' . $kat->nama_kategori . '</option>';
                      }
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
                      $print_date = $this->ostiumdate->format('d-Mm-y', reverse($date_to_set, '-'));
                      $escape_day = explode(" ", $print_date);
                      $date_value = array(
                          'month' => $escape_day[1] . ' ' . $escape_day[2],
                          'value' => $set_date[0].$set_date[1]
                      );
                      array_push($arr, $date_value);
                  }

                  $get_month = multidimensional_array_unique($arr, 'month');
                  foreach ($get_month as $bulan => $mon) {
                      $val = $mon['value'];
                      if($this->uri->segment(4) === $val)
                      {
                          echo '<option value="'. $val .'" selected="selected">'.$mon['month'].'</option>';
                      }
                      else
                      {
                          echo '<option value="'. $val .'">'.$mon['month'].'</option>';
                      }
                  }
                  ?>
              </select>
          </div>
          <div class="col-sm-3 col-xs-12">
              <a href="" id="go-filter" class="btn btn-primary">Filter</a>
          </div>
          <div class="col-sm-3 col-xs-12">
              <center>Total: <?= $baris ?> item</center>.
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
