<div class="menu">
    <ul class="list">
        <li class="header">KATEGORI</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <select name="kategori" id="kategori" class="form-control show-tick">
                        <?php
                        $CI =& get_instance();
                        foreach ($kategori->result() as $kat)                                            {

                            $cek = $CI->Posts_data->check_attribute('kategori_post', $kat->id_kategori, $post_id);
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
        <li class="header">GAMBAR FITUR</li>
        <div class="setting-content">

        </div>
        <li class="header">PENULIS</li>
        <div class="setting-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <select name="user" id="user" class="form-control show-tick">

                        <?php
                        foreach ($user->result() as $user)
                        {
                            $cek = $CI->Posts_data->check_attribute('penulis_post', $user->id_user, $post_id);
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
    </ul>
</div>
