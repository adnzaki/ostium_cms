<div class="container-fluid">
    <div class="block-header">
        <h2>SEMUA POST</h2>
    </div>
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 os-p-l-0">
                <button type="button" class="btn btn-primary btn-lg waves-effect m-l-0">Tambah Post</button>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" class="form-control os-p-l-10" placeholder="Cari post...">
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
        <!-- Recent Posts -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <!-- <div class="header">
                    <h2>SEMUA POST</h2>
                    <ul class="header-dropdown m-r--5">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control date" placeholder="Message">
                            </div>
                            <span class="input-group-addon">
                                <i class="material-icons">send</i>
                            </span>
                        </div>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons">add</i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li id="buat-post"><a href="javascript:void(0);">Buat Post Baru</a></li>
                            </ul>
                        </li>
                    </ul>
                </div> -->
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Post</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Tanggal</th>
                                    <th colspan="2" class="align-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($all_post->result() as $ap) {
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td>
                                        <?php
                                        if(strlen($ap->judul_post) <= 40 )
                                        {
                                            echo $ap->judul_post;
                                        }
                                        else
                                        {
                                            echo substr($ap->judul_post, 0, 40)."...";
                                        }
                                        ?>
                                    </td>
                                    <td><span class="label bg-green"><?php echo $ap->nama_kategori ?></span></td>
                                    <td><?php echo $ap->user_name ?></td>
                                    <td>
                                        <?php
                                        $sub_tgl = substr($ap->tanggal_post, 0, 10);
                                        $arr_tgl = explode("-", $sub_tgl);
                                        $tanggal = $arr_tgl[2]."-".$arr_tgl[1]."-".$arr_tgl[0];
                                        echo $tanggal;
                                        ?>
                                    </td>
                                    <td class="align-center post-edit"><i class="material-icons">mode_edit</i></td>
                                    <td class="align-center post-delete"><i class="material-icons">delete</i></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Draft -->

        <!-- #END# Browser Usage -->
    </div>
</div>
