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
 * @version     OstiumCMS v0.0.2
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
       * Ambil user dari database
       * @return void
       */
       public function get_user()
       {
           $get_data = $this->db->get('os_user');
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
         $author    = $this->input->post('user');
         $status    = "publik";
         $isi_post  = $this->input->post('isi_post');
         if($judul === '')
         {
             $judul     = "Tanpa Judul";
             $status    = "draft";
         }
         $data = array(
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
