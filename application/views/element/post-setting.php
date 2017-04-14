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
                    <?php
                    foreach($kategori as $kat)
                    {
                        if(! isset($post_id))
                        {
                            echo '<input type="checkbox" id="basic_checkbox_'.$kat->id_kategori.'" class="filled-in" value="'.$kat->id_kategori.'" />';
                        }
                        else
                        {
                            $cek = $CI->Posts_data->is_post_category($post_id, $kat->id_kategori);
                            if($cek)
                            {
                                echo '<input type="checkbox" id="basic_checkbox_'.$kat->id_kategori.'" class="filled-in" value="'.$kat->id_kategori.'" checked />';
                            }
                            else
                            {
                                echo '<input type="checkbox" id="basic_checkbox_'.$kat->id_kategori.'" class="filled-in" value="'.$kat->id_kategori.'" />';
                            }
                        }
                        echo '<label for="basic_checkbox_'.$kat->id_kategori.'">' . $kat->nama_kategori . '</label><br>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <li class="header">TAG</li>
        <div class="setting-content" id="tag-control">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" @keyup.enter="addTag"
                            id="tag-input" placeholder="Ketik dan enter untuk menambah tag" />
                        </div>
                        <template v-for="(tag, index) in tags">
                            <span class="label label-info tag-list">
                                {{ tag.nama_tag }}
                                <span>
                                    <button type="button" class="btn bg-info btn-xs waves-effect remove-tag-btn" name="button" @click="removeTag(index)">x</button>
                                </span>
                            </span>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <li class="header">PENULIS</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <select name="" id="user-sender" class="form-control show-tick">
                        <?php
                        foreach ($user as $user)
                        {
                            if(! isset($post_id))
                            {
                                echo "<option value='$user->id_user' id='$user->id_user'>$user->user_name</option>";
                            }
                            else
                            {
                                $cek = $CI->Posts_data->is_author($user->id_user, $post_id);
                                if($cek)
                                {
                                    echo "<option value='$user->id_user' id='$user->id_user' selected='selected'>$user->user_name</option>";
                                }
                                else
                                {
                                    echo "<option value='$user->id_user' id='$user->id_user'>$user->user_name</option>";
                                }
                            }
                        }
                        ?>
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
