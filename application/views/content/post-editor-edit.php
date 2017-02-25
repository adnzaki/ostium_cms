<section class="content post-content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- start -->
            <?php foreach($edit_post as $edit): ?>
            <div class="card">
                <?="<input type='hidden' id='post-id' name='post-id' value='$edit->id_post'>"; ?>
                <form action="<?php echo base_url()."posts/update_post/".$edit->id_post ?>" method="post">
                    <input type="hidden" name="kategori" id="kategori" value="">
                    <input type="hidden" name="user" id="user" value="">
                    <input type="hidden" name="gambar-fitur" id="link-img" value="">
                    <div class="header">
                        <h2>EDIT POST</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group form-group-lg">
                                    <div class="form-line">
                                        <?="<input type='text' id='judul_post' name='judul_post' class='form-control' placeholder='Judul' value='$edit->judul_post' />";?>
                                    </div>
                                    <!-- Post attribute moved! -->
                                </div>
                            </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?= base_url('post') ?>">Tutup</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <textarea name="isi_post" id="editor">
                            <?= $edit->isi_post ?>
                        </textarea>
                    </div>
                    <div class="row clearfix">
                        <div class="body">
                            <div class="button-demo">
                                <?php if($edit->status_post === 'draft'): ?>
                                    <button id="publish-draft" class="btn btn-lg btn-primary waves-effect os-btn-custom os-btn-icon">
                                        <span class="icon os-icon-button"><i class="material-icons">publish</i></span>PUBLIKASIKAN
                                    </button>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-lg btn-primary waves-effect os-btn-custom os-btn-icon">
                                    <span class="icon os-icon-button"><i class="material-icons">save</i></span>SIMPAN
                                </button>
                                <button type="submit" class="btn btn-lg btn-info waves-effect os-btn-custom os-btn-icon">
                                    <span class="icon os-icon-button"><i class="material-icons">visibility</i></span>PRATINJAU
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php endforeach; ?>
            <!-- #end -->
        </div>
    </div>
</section>
