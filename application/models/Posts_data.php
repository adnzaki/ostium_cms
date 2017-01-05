<?php

/**
 * Class Posts
 * Class ini digunakan untuk memroses segala aktifitas transaksi data
 * pada bagian posting
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.1
 */

 class Posts_data extends CI_Model
 {
     /**
      * Ambil kategori dari database
      * @return void
      */
      public function get_category()
      {
          $get_data = $this->db->get('os_kategori');
          return $get_data;
      }

     /**
      * Simpan data ke database
      * @return void
      */
     public function insert_post()
     {
         $judul     = $this->input->post('judul_post');
         $kategori  = $this->input->post('kategori');
         $author    = 1; // isi variabel ini akan diambil dari session nantinya
         $status    = "publik";
         $isi_post  = $this->input->post('isi_post');
         $data      = array(
             'judul_post'       => $judul,
             'kategori_post'    => $kategori,
             'penulis_post'     => $author,
             'status_post'      => $status,
             'isi_post'         => $isi_post
         );
         $this->db->insert('os_post', $data);
     }
 }
 
?>
