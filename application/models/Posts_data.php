<?php

/**
 * Ostium CMS
 * A content management system for Wolestech based website
 * Class Posts_data
 * Class ini digunakan untuk memroses segala aktifitas transaksi data
 * pada bagian posting
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.3
 */

class Posts_data extends CI_Model
{
    /**
     * Ambil data total baris dari tabel post
     * @return void
     */
    public function get_total_post()
    {
        $this->db->where('status_post', 'publik');
        return $this->db->count_all_results('os_post');
    }

    /**
     * Ambil data total baris dari tabel komentar
     * @return void
     */
    public function get_total_comment()
    {
        return $this->db->count_all('os_komentar');
    }

    /**
     * Ambil atribut post dari database
     * @return void
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
     * @return void
     */
    public function get_recent_post($limit, $key)
    {
        $this->db->select('*');
        $this->db->from('os_post');
        $this->db->join('os_kategori', 'os_post.kategori_post = os_kategori.id');
        $this->db->join('os_user', 'os_post.penulis_post = os_user.id');
        $this->db->where('status_post', $key); // Input parameter dari controller
        $this->db->order_by('os_post.id', 'DESC');
        $this->db->limit($limit, 0);
        $get_data = $this->db->get();
        return $get_data;
    }

    /**
     * Ambil data seluruh post dan draft
     * @param string $key
     * @return void
     */
    public function get_all_post($key)
    {
        $this->db->select('*');
        $this->db->from('os_post');
        $this->db->join('os_kategori', 'os_post.kategori_post = os_kategori.id');
        $this->db->join('os_user', 'os_post.penulis_post = os_user.id');
        $this->db->where('status_post', $key); // Input parameter dari controller
        $this->db->order_by('os_post.id', 'DESC');
        $get_data = $this->db->get();
        return $get_data;
    }

    /**
     * Simpan data ke database
     * @return void
     */
    public function insert_post()
    {
        $judul    = $this->input->post('judul_post');
        $kategori = $this->input->post('kategori');
        $author   = $this->input->post('user');
        $status   = "publik";
        $isi_post = $this->input->post('isi_post');
        $tanggal  = date('Y-m-d H:i:s');
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
            'tanggal_post'    => $tanggal
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
        $data     = array(
            'judul_post'      => $judul,
            'kategori_post'   => $kategori,
            'penulis_post'    => $author,
            'status_post'     => $status,
            'isi_post'        => $isi_post,
            'tanggal_post'    => $tanggal
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
        $get_data = $this->db->get_where('os_post', array('id' => $id));
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
        $get_data = $this->db->get_where('os_post', array('id' => $id));
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

    public function edit_post($id)
    {
        $judul    = $this->input->post('judul_post');
        $kategori = $this->input->post('kategori');
        $author   = $this->input->post('user');
        $isi_post = $this->input->post('isi_post');
        $data     = array(
            'judul_post'      => $judul,
            'kategori_post'   => $kategori,
            'penulis_post'    => $author,
            'isi_post'        => $isi_post,
        );
        $this->db->where('id', $id);
        $this->db->update('os_post', $data);
    }

}

?>
