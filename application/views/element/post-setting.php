<div class="menu menu-custom">
    <ul class="list-setting">
        <li class="header">PERMALINK</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="form-line">
                            <?php
                            $CI =& get_instance();
                            if(! isset($edit_post))
                            {
                                echo '<input type="text" id="permalink-input" value="" class="form-control" placeholder="Permalink" />';
                            }
                            else
                            {
                                foreach ($edit_post as $link)
                                {
                                    $link = explode("/", $link->permalink);
                                    if(isset($link[5]))
                                    {
                                        echo '<input type="text" id="permalink-input" value="'.$link[5].'" class="form-control" placeholder="Permalink" />';
                                    }
                                    else
                                    {
                                        echo '<input type="text" id="permalink-input" value="" class="form-control" placeholder="Permalink" />';
                                    }
                                }
                            }

                            ?>
                        </div>
                        <div id="permalink-text"></div>
                    </div>
                </div>
            </div>
        </div>
        <li class="header">TAMPILAN POST</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <p>Terlihat di publik</p>
                    <div class="switch" id="visibility">
                        <label>OFF<input id="post-visible" type="checkbox" checked><span class="lever"></span>ON</label>
                    </div>                    
                    <div id="status-post-wrapper">
                        <p>Status Post</p>
                        <input name="status-post-input" class="status-post-input" type="radio" id="post-publik" value="publik" />
                        <label for="post-publik">Dipublikasikan</label>
                        <input name="status-post-input" class="status-post-input" type="radio" id="post-draft" value="draft" />
                        <label for="post-draft">Draft</label>
                    </div>

                </div>
            </div>
        </div>
        <li class="header">KATEGORI</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <select name="" id="kategori-sender" class="form-control show-tick">
                        <?php

                        foreach ($kategori->result() as $kat) {

                            $cek = $CI->Posts_data->check_attribute('kategori_post', $kat->id_kategori, isset($post_id));
                            if($cek)
                            {
                                echo "<option value='$kat->id_kategori' id='$kat->id_kategori' selected='selected'>$kat->nama_kategori</option>";
                            }
                            else
                            {
                                echo "<option value='$kat->id_kategori' id='$kat->id_kategori'>$kat->nama_kategori</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <li class="header">PENULIS</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <select name="" id="user-sender" class="form-control show-tick">
                        <?php
                        foreach ($user->result() as $user)
                        {
                            $cek = $CI->Posts_data->check_attribute('penulis_post', $user->id_user, isset($post_id));
                            if($cek)
                            {
                                echo "<option value='$user->id_user' id='$user->id_user' selected='selected'>$user->user_name</option>";
                            }
                            else
                            {
                                echo "<option value='$user->id_user' id='$user->id_user'>$user->user_name</option>";
                            }

                        } ?>
                    </select>
                </div>
            </div>
        </div>
        <li class="header">GAMBAR FITUR</li>
        <div class="setting-content">

            <div class="col-xs-12">
                <a href="javascript:void(0);" class="thumbnail">
                    <?php
                    $script = $_SERVER['PHP_SELF'];
                    $arr = explode("/", $script);

                    if(!in_array("edit", $arr))
                    {
                        echo "<img src='" . $asset . "images/no-image.png' class='img-responsive' id='prev-img'>";
                    }
                    else
                    {
                        foreach ($edit_post as $edit)
                        {
                            echo "<img src='$edit->gambar_fitur ?>' class='img-responsive' id='prev-img'>";
                        }
                    }
                    ?>
                </a>
            </div>
            <a href="#" class="btn btn-primary col-xs-12" data-toggle="modal" data-target="#largeModal">Tambahkan Sebuah Gambar Khusus</a>
        </div>
    </ul>
</div>
