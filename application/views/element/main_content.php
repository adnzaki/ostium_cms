<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Flash Info -->
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect info-box-custom">
                <div class="icon icon-custom">
                    <i class="material-icons">filter_none</i>
                </div>
                <div class="content">
                    <div class="text text-large">TOTAL POST</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect info-box-custom">
                <div class="icon icon-custom">
                    <i class="material-icons">forum</i>
                </div>
                <div class="content">
                    <div class="text text-large">KOMENTAR</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect info-box-custom">
                <div class="icon icon-custom">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text text-large">SUKA</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage | move to /trash -->

    <!-- #END# CPU Usage -->

    <!-- Visitors, Social Trends and Answered tieckets | move to /trash -->

    <!-- #END# Visitors -->

    <div class="row clearfix">
        <!-- Recent Posts -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>POSTINGAN TERBARU</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li id="buat-post"><a href="javascript:void(0);">Buat Post Baru</a></li>
                                <li><a href="javascript:void(0);">Lihat Semua Post</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Post</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th colspan="2" class="align-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($recent_post->result() as $rp) {
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td>
                                        <?php
                                        if(strlen($rp->judul_post) <= 25 )
                                        {
                                            echo $rp->judul_post;
                                        } else {
                                            echo substr($rp->judul_post, 0, 25)."...";
                                        }
                                        ?>
                                    </td>
                                    <td><span class="label bg-green"><?php echo $rp->nama_kategori ?></span></td>
                                    <td><?php echo $rp->user_name ?></td>
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
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
                    <h2>DRAFT</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Lihat semua draft</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <!-- <div id="donut_chart" class="dashboard-donut-chart"></div> -->
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Post</th>
                                    <th colspan="2" class="align-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($recent_draft->result() as $draft) {
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td>
                                        <?php
                                        if(strlen($draft->judul_post) <= 12 )
                                        {
                                            echo $draft->judul_post;
                                        } else {
                                            echo substr($draft->judul_post, 0, 12)."...";
                                        }
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
        <!-- #END# Browser Usage -->
    </div>
</div>
