<div class="table-responsive">
    <table class="table table-hover dashboard-task-infos">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul Post</th>
                <th>Kategori</th>
                <th>Penulis</th>
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
                <a href="<?=base_url('post/edit/').$rp->id_post ?>">

                </a>
                <td>
                    <a href="<?=base_url('post/edit/').$rp->id_post ?>">
                        <?php
                        if(strlen($rp->judul_post) <= 30 )
                        {
                            echo $rp->judul_post;
                        }
                        else
                        {
                            echo substr($rp->judul_post, 0, 30)."...";
                        }
                        ?>
                    </a>
                </td>
                <td>
                    <?php
                    $CI =& get_instance();
                    $get_kategori = $CI->Posts_data->get_category($rp->id_post);
                    foreach ($get_kategori->result() as $kategori)
                    {
                        echo '<span class="label bg-green">'. $kategori->nama_kategori.'</span> ';
                    }
                    ?>
                </td>
                <td><?php echo $rp->user_name ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
