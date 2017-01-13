<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <form action="<?php echo base_url() ?>Posts_handler/add_post" method="post">
                <div class="header">
                    <h2>
                        EDIT POST
                    </h2>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" id="judul_post" name="judul_post" class="form-control" placeholder="Judul" />
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <p>
                                            <b>Kategori</b>
                                        </p>
                                        <select name="kategori" id="kategori" class="form-control show-tick">
                                            <option value="hehe" selected="selected">Satu</option>
                                            <option value="hehe" >Dua</option>
                                            <option value="hehe" >Tiga</option>
                                            <?php /*foreach ($kategori->result() as $kat) {
                                                echo "<option value='$kat->id' id='$kat->id'>$kat->nama_kategori</option>";
                                            }*/ ?>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <p>
                                            <b>Penulis</b>
                                        </p>
                                        <select name="user" id="user" class="form-control show-tick">

                                            <?php foreach ($user->result() as $user) {
                                                echo "<option value='$user->id' id='$user->id'>$user->user_name</option>";
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li id="tutup-post-editor"><a href="javascript:void(0);">Tutup</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <textarea name="isi_post" id="editor"></textarea>
                </div>
                <div class="row clearfix">
                    <div class="body">
                        <div class="button-demo">
                            <button type="submit" class="btn btn-lg btn-primary waves-effect os-btn-custom os-btn-icon">
                                <span class="icon os-icon-button"><i class="material-icons">publish</i></span>PUBLIKASIKAN
                            </button>
                            <button id="simpan-draft" class="btn btn-lg bg-orange waves-effect os-btn-custom os-btn-icon">
                                <span class="icon os-icon-button"><i class="material-icons">save</i></span>SIMPAN DRAFT
                            </button>
                            <button type="submit" class="btn btn-lg btn-info waves-effect os-btn-custom os-btn-icon">
                                <span class="icon os-icon-button"><i class="material-icons">visibility</i></span>PRATINJAU
                            </button>
                            <!-- <input type="submit" class="btn btn-lg btn-primary waves-effect os-btn-custom" name="publish-post" value="Publikasikan">
                            <input type="submit" class="btn btn-lg bg-orange waves-effect os-btn-custom" name="simpan-draft" value="Simpan Draft">
                            <input type="submit" class="btn btn-lg btn-info waves-effect os-btn-custom" name="pratinjau" value="Pratinjau"> -->

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
