<section class="content post-content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <?php
                foreach ($edit_post as $edit)
                {
                    echo "<input type='hidden' id='post-id' name='post-id' value='$edit->id_post'>";
                }
                ?>
                <form action="<?php echo base_url()."posts/update_post/".$edit->id_post ?>" method="post">
                    <div class="header">
                        <h2>EDIT POST</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group form-group-lg">
                                    <div class="form-line">
                                        <?php
                                        foreach ($edit_post as $edit)
                                        {
                                            echo "<input type='text' id='judul_post' name='judul_post' class='form-control' placeholder='Judul' value='$edit->judul_post' />";
                                        }

                                        ?>

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
                            <?php
                            foreach ($edit_post as $edit)
                            {
                                echo $edit->isi_post;
                            }
                            ?>
                        </textarea>
                    </div>
                    <div class="row clearfix">
                        <div class="body">
                            <div class="button-demo">
                                <button type="submit" class="btn btn-lg btn-primary waves-effect os-btn-custom os-btn-icon">
                                    <span class="icon os-icon-button"><i class="material-icons">publish</i></span>PERBARUI
                                </button>
                                <button type="submit" class="btn btn-lg btn-info waves-effect os-btn-custom os-btn-icon">
                                    <span class="icon os-icon-button"><i class="material-icons">visibility</i></span>PRATINJAU
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
