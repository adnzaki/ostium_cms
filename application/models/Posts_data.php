<?php

/**
 * Ostium CMS
 * A content management system for Wolestech's based site
 * Class Posts
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
     * Ambil data total baris dari beberapa tabel
     * Input berasal dari controller
     * @param string $table
     * @return void
     */
    public function get_total_rows($table)
    {
        return $this->db->count_all($table);
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
        //$this->db->select('os_post.judul_post', 'os_kategori.nama_kategori', 'os_user.user_name');
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
}

?>
