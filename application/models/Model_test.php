<?php

/**
 * Model_test
 */
class Model_test extends CI_Model
{
    public function get_kategori()
    {
        $get = $this->db->get('os_kategori');
        return $get->result();
    }

    public function check_kategori($cat_id, $post_id)
    {
        $this->db->where('kategori_post', $cat_id);
        $this->db->where('id', $post_id);
        $query = $this->db->get('os_post');
        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function coba($id)
    {
        $data = $this->get_kategori();
        echo "<select>";
        foreach ($data as $arr)
        {
            $cek = $this->check_kategori($arr->id, $id);
            if($cek)
            {
                echo "<option selected='selected'>". $arr->nama_kategori ."</option>";
            }
            else
            {
                echo "<option>". $arr->nama_kategori ."</option>";
            }
        }
        echo "</select>";
    }

}



?>
