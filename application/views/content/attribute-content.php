<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs tab-nav-right tab-col-teal" role="tablist">
                            <li role="presentation" class="active"><a href="#kategori-content" data-toggle="tab">KATEGORI</a></li>
                            <li role="presentation"><a href="#tag-content" data-toggle="tab">TAG</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tab-content">
                <!-- TABS UNTUK KATEGORI -->
                <div role="tabpanel" class="tab-pane fade in active" id="kategori-content">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="body">
                                <div class="block-header">
                                    <h2 class="form-title" v-if="showCategoryEdit">Edit Kategori</h2>
                                    <h2 class="form-title" v-else>Tambah Kategori Baru</h2>
                                </div>
                                <!-- Form kategori -->
                                <div id="form-add-kategori">
                                    <?php $this->view('content/form-kategori') ?>
                                </div>
                                <!-- #End -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="card" id="list-kategori">
                            <?php $this->view('data/kategori-list') ?>
                        </div>
                    </div>
                </div>
                <!-- #END -->

                <!-- TABS UNTUK TAGS -->
                <div role="tabpanel" class="tab-pane fade in active" id="tag-content">
                </div>
                <!-- #END -->
            </div>

        </div>
    </div>
</section>
