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
        if($this->uri->segment(1) === 'post' OR $this->uri->segment(2) === 'index')
        {
            $no = $this->uri->segment(3);
        }
        else
        {
            $no = $this->uri->segment(4);
        }

        foreach($all_post->result() as $ap) {
            $no++;
            //$id = $ap->id;
        ?>
        <tr>

            <td><?php echo $no ?></td>
            <td>
                <?php
                $judul = $ap->judul_post;

                if($this->uri->segment(1) === 'post' && $ap->status_post === 'draft' OR $this->uri->segment(2) === 'index' && $ap->status_post === 'draft')
                {
                    $judul = $ap->judul_post . " - <b>Draft</b>";
                }

                if(strlen($ap->judul_post) <= 40 )
                {
                    echo $judul;
                }
                else
                {
                    echo substr($judul, 0, 40)."...";
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
            <td class="align-center post-edit">
                <a href="<?php echo base_url('post/edit/').$ap->id_post ?>">
                    <i class="material-icons">mode_edit</i>
                </a>
            </td>
            <td class="align-center post-delete" data-post="<?=$ap->id_post ?>" data-color="red">
                <i class="material-icons">delete</i>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
