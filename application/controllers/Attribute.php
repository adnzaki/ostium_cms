<?php

/**
 * OstiumCMS
 * A simple, fast and extensible Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

 class Attribute extends CI_Controller
 {
     public function __construct()
     {
         parent:: __construct();
         $this->load->model('Attribute_data');
         if(! check_session())
         {
             redirect('login');
         }
     }

     /**
      * Halaman utama
      *
      * @return void
      */
     public function index()
     {
         $data['asset'] = base_url()."assets/";
         $data['main_title'] = "Ostium - Kategori & Tag";
         $data['kategori'] = $this->Attribute_data->get_category();
         $this->load->view('section/category-tag', $data);
     }

     /**
      * Validasi kategori
      *
      * @param string $event
      * @param string | int $key
      * @return JSON
      */
     public function category_validation($event, $key = '')
     {
         $event === 'insert' ?
            $is_unique = [
                '|is_unique[os_kategori.nama_kategori]',
                '|is_unique[os_kategori.slug_kategori]'
            ] : $is_unique = ['', ''];

         $rules = [
             [
                 'field' => 'namaKategori',
                 'label' => 'Nama kategori',
                 'rules' => 'required'.$is_unique[0].'|min_length[3]'
             ],
             [
                 'field' => 'slugKategori',
                 'label' => 'Slug kategori',
                 'rules' => 'required'.$is_unique[1]
             ],
             [
                 'field' => 'deskripsiKategori',
                 'label' => 'Deskripsi kategori',
                 'rules' => 'required'
             ]
         ];

         $this->form_validation->set_rules($rules);
         $this->form_validation->set_message('required', '{field} tidak boleh kosong');
         $this->form_validation->set_message('is_unique', '%s sudah ada');
         $this->form_validation->set_message('min_length', '%s membutuhkan minimal %s karakter');
         $this->form_validation->set_error_delimiters('', '');
         if($this->form_validation->run() == FALSE)
         {
             $error = [
                 'namaKategori' => form_error('namaKategori'),
                 'slugKategori' => form_error('slugKategori'),
                 'deskripsiKategori' => form_error('deskripsiKategori')
             ];
             echo json_encode($error);
         }
         else
         {
             if($event === 'insert')
             {
                 $this->Attribute_data->insert_category();
             }
             elseif($event === 'update')
             {
                 $this->Attribute_data->update_category($key);
             }
             echo json_encode('success');
         }
     }

     /**
      * Ambil kategori yang akan diedit
      *
      * @param int $id
      * @return JSON
      */
     public function edit_category($id)
     {
        $result = $this->Attribute_data->edit_category($id);
        echo json_encode($result);
     }

     /**
      * Hapus kategori
      *
      * @param int $id
      * @return void
      */
     public function delete_category($id)
     {
         $this->Attribute_data->delete_category($id);
     }

     /**
      * Fetching kategori
      *
      * @return JSON
      */
     public function fetch_category()
     {
        $result = $this->Attribute_data->get_category();
        echo json_encode($result);
     }
 }
