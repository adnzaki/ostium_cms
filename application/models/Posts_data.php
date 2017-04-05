<?php

/**
 * OstiumCMS
 * A simple, fast and fully customizable Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

class Posts_data extends CI_Model
{
    /**
     * Ambil data total baris dari tabel post
     * @param string $status
     * @param int $date
     * @param int $category
     * @return mixed
     */
    public function get_total_post($status = '', $date = 0, $category = 0)
    {
        if(! empty($status))
        {
            $this->db->where('status_post', $status);
        }

        if($date !== 0)
        {
            $year = substr($date, 0, 4);
            $month = substr($date, 4, 2);
            $this->db->like('tanggal_post', $year . '-' . $month, 'after');
        }

        if($category !== 0)
        {
            $this->db->where('kategori_post', $category);
        }

        $keyword = $this->input->get('cari-post');
        $this->db->like('judul_post', $keyword);

        return $this->db->count_all_results('os_post');
    }

    /**
     * Ambil data total baris dari tabel komentar
     * @return mixed
     */
    public function get_total_comment()
    {
        return $this->db->count_all('os_komentar');
    }

    /**
     * Ambil atribut post dari database
     * @return mixed
     */
    public function get_post_attribute($table)
    {
        $get_data = $this->db->get($table);
        return $get_data;
    }

    /**
     * Ambil data post dan draft terbaru
     * @param int $limit
     * @param string $key
     * @return mixed
     */
    public function get_recent_post($limit, $key)
    {
        $this->db->select('*');
        $this->db->from('os_post');
        $this->db->join('os_kategori', 'os_post.kategori_post = os_kategori.id_kategori');
        $this->db->join('os_user', 'os_post.penulis_post = os_user.id_user');
        $this->db->where('status_post', $key); // Input parameter dari controller
        $this->db->order_by('os_post.id_post', 'DESC');
        $this->db->limit($limit, 0);
        $get_data = $this->db->get();
        return $get_data;
    }

    /**
     * Ambil data seluruh post dan draft
     * @param string $status
     * @param int $date
     * @param int $category
     * @param int $total
     * @param int $offset
     * @return mixed
     */
    public function get_all_post($status = '', $date = 0, $category = 0, $total, $offset)
    {
        $this->db->select('*');
        $this->db->from('os_post');
        $this->db->join('os_kategori', 'os_post.kategori_post = os_kategori.id_kategori');
        $this->db->join('os_user', 'os_post.penulis_post = os_user.id_user');

        if(! empty($status))
        {
            $this->db->where('status_post', $status);
        }

        if($date !== 0)
        {
            $year = substr($date, 0, 4);
            $month = substr($date, 4, 2);
            $this->db->like('tanggal_post', $year . '-' . $month, 'after');
        }

        if($category !== 0)
        {
            $category = $this->input->get('cari-post');
            $this->db->where('kategori_post', $category);
        }

        $keyword = $this->input->get('cari-post');
        $this->db->like('judul_post', $keyword);
        $this->db->order_by('os_post.tanggal_post', 'DESC');
        $this->db->limit($total, $offset);
        $get_data = $this->db->get();

        return $get_data;
    }

    /**
     * Mengambil tanggal yang ada pada tabel post
     *
     * @return array
     */
    public function get_post_date()
    {
        $this->db->distinct();
        $this->db->order_by('tanggal_post', 'DESC');
        $get = $this->db->get('os_post');
        return $get->result();
    }

    /**
     * Simpan data ke database
     * @return void
     */
    public function insert_post()
    {
        $judul      = $this->input->post('judul_post');
        $kategori   = $this->input->post('kategori');
        $author     = $this->input->post('user');
        $status     = "publik";
        $isi_post   = $this->input->post('isi_post');
        $tanggal    = date('Y-m-d H:i:s');
        $gambar     = $this->input->post('gambar-fitur');
        $permalink  = $this->input->post('permalink');
        if($judul === '')
        {
            $judul     = "Tanpa Judul";
            $status    = "draft";
        }
        $data = array(
            'judul_post'      => $judul,
            'kategori_post'   => $kategori,
            'penulis_post'    => $author,
            'status_post'     => $status,
            'isi_post'        => $isi_post,
            'tanggal_post'    => $tanggal,
            'gambar_fitur'    => $gambar,
            'permalink'       => $permalink
        );
        $this->db->insert('os_post', $data);
    }

    /**
     * Simpan draft....
     * @return void
     */
    public function insert_draft()
    {
        $judul    = $this->input->post('judul_post');
        $kategori = $this->input->post('kategori');
        $author   = $this->input->post('user');
        $status   = "draft";
        $isi_post = $this->input->post('isi_post');
        $tanggal  = date('Y-m-d H:i:s');
        $gambar   = $this->input->post('gambar-fitur');
        $permalink  = $this->input->post('permalink');
        $data     = array(
            'judul_post'      => $judul,
            'kategori_post'   => $kategori,
            'penulis_post'    => $author,
            'status_post'     => $status,
            'isi_post'        => $isi_post,
            'tanggal_post'    => $tanggal,
            'gambar_fitur'    => $gambar,
            'permalink'       => $permalink
        );
        $this->db->insert('os_post', $data);
    }

    /**
     * Mengecek apakah post ada atau tidak
     * @param int $id
     * @return bool
     */
    public function post_exists($id)
    {
        $get_data = $this->db->get_where('os_post', array('id_post' => $id));
        if($get_data->num_rows() === 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    /**
     * Mengambil post yang akan diedit
     * @param int $id
     * @return array()
     */
    public function post_to_edit($id)
    {
        $get_data = $this->db->get_where('os_post', array('id_post' => $id));
        return $get_data->result();
    }

    /**
     * Mengecek kategori yang ada di post yang akan diedit
     * @param string $col
     * @param string $col_id
     * @param int $post_id
     * @return bool
     */
    public function check_attribute($col, $col_id, $post_id)
    {
        $this->db->where($col, $col_id);
        $this->db->where('id_post', $post_id);
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

    /**
     * Mengecek apakah permalink ada atau tidak
     * @param int $id_post
     * @return bool
     */
    public function check_permalink($id_post)
    {
        $this->db->select('permalink')->from('os_post');
        $this->db->where('id_post', $id_post);
        $get = $this->db->get();
        if($get->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Update data posting
     * @param int $id
     * @return void
     */
    public function edit_post($id)
    {
        $judul    = $this->input->post('judul_post');
        $kategori = $this->input->post('kategori');
        $author   = $this->input->post('user');
        $isi_post = $this->input->post('isi_post');
        $gambar   = $this->input->post('gambar-fitur');
        $permalink  = $this->input->post('permalink');
        $data     = array(
            'judul_post'      => $judul,
            'kategori_post'   => $kategori,
            'penulis_post'    => $author,
            'isi_post'        => $isi_post,
            'gambar_fitur'    => $gambar,
            'permalink'       => $permalink
        );
        $this->db->where('id_post', $id);
        $this->db->update('os_post', $data);
    }

    /**
     * Publish draft
     * @param int $id
     * @return void
     */
    public function publish_draft($id)
    {
        $judul    = $this->input->post('judul_post');
        $kategori = $this->input->post('kategori');
        $author   = $this->input->post('user');
        $status   = "publik";
        $isi_post = $this->input->post('isi_post');
        $tanggal  = date('Y-m-d H:i:s');
        $gambar   = $this->input->post('gambar-fitur');
        $permalink  = $this->input->post('permalink');
        if($judul === '')
        {
            $judul     = "Tanpa Judul";
            $status    = "draft";
        }
        $data     = array(
            'judul_post'      => $judul,
            'kategori_post'   => $kategori,
            'penulis_post'    => $author,
            'status_post'     => $status,
            'isi_post'        => $isi_post,
            'tanggal_post'    => $tanggal,
            'gambar_fitur'    => $gambar,
            'permalink'       => $permalink
        );
        $this->db->where('id_post', $id);
        $this->db->update('os_post', $data);
    }

    /**
     * Hapus post...
     * @param int $id
     * @return void
     */
    public function delete_post($id)
    {
        $this->db->delete('os_post', ['id_post' => $id]);
    }

}

?>
