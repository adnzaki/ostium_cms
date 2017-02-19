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

class Posts extends CI_Controller
{

    /**
     * Models loader
     * @return void
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Posts_data');
    }

    /**
     * Halaman utama untuk posting
     * @return void
     */
    public function index()
    {
        $data['asset']          = base_url()."assets/";
        $data['main_title']     = 'Ostium CMS | Post';
        $data['kategori']       = $this->Posts_data->get_post_attribute('os_kategori');
        $data['user']           = $this->Posts_data->get_post_attribute('os_user');

        // Data posting keseluruhan
        $data['total_semua']    = $this->Posts_data->get_total_post();
        $data['total_post']     = $this->Posts_data->get_total_post('publik');
        $data['total_draft']    = $this->Posts_data->get_total_post('draft');

        // Set pagination configuration
        $this->load->library('pagination');
        $config['base_url']     = base_url() . 'posts/index/';
        $config['total_rows']   = $this->Posts_data->get_total_post();
        $config['per_page']     = 5;
        $from                   = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['all_post'] = $this->Posts_data->get_all_post('', $config['per_page'], $from);
        $this->load->view('section/post', $data);
    }

    /**
     * Post filtering
     * @param string $status
     *
     * @return void
     */
    public function filter_post($status)
    {
        $data['asset']          = base_url()."assets/";
        $data['main_title']     = 'Ostium CMS | Post';
        $data['kategori']       = $this->Posts_data->get_post_attribute('os_kategori');
        $data['user']           = $this->Posts_data->get_post_attribute('os_user');

        // Data posting keseluruhan
        $data['total_semua']    = $this->Posts_data->get_total_post();
        $data['total_post']     = $this->Posts_data->get_total_post('publik');
        $data['total_draft']    = $this->Posts_data->get_total_post('draft');

        // Set pagination configuration
        $this->load->library('pagination');
        $config['base_url']     = base_url() . 'posts/filter_post/' . $status;

        // Cek URL untuk menghitung jumlah baris data yang diambil
        if($status === 'publik')
        {
            $config['total_rows']   = $this->Posts_data->get_total_post('publik');
        }
        elseif($status === 'draft')
        {
            $config['total_rows']   = $this->Posts_data->get_total_post('draft');
        }
        else
        {
            $config['total_rows']   = $this->Posts_data->get_total_post();
        }

        $config['per_page']     = 5;
        $from                   = $this->uri->segment(4);

        $this->pagination->initialize($config);

        $data['all_post'] = $this->Posts_data->get_all_post($status, $config['per_page'], $from);
        $this->load->view('section/post', $data);
    }

    /**
     * Tambahkan post..
     * @return void
     */
    public function add_post()
    {
        $this->Posts_data->insert_post();
        redirect('post');
    }

    /**
     * Tambahkan draft...
     * @return void
     */
    public function add_draft()
    {
        $this->Posts_data->insert_draft();
    }

    /**
     * Menampilkan halaman edit post
     * @param int $id
     * @return void
     */
    public function post_edit($id)
    {
        $data['asset']          = base_url()."assets/";
        $data['main_title']     = 'Ostium CMS | Post';

        // check whether the post is exist or not
        if($this->Posts_data->post_exists($id))
        {
            $data['user']           = $this->Posts_data->get_post_attribute('os_user');
            $data['kategori']       = $this->Posts_data->get_post_attribute('os_kategori');
            $data['edit_post']      = $this->Posts_data->post_to_edit($id);
            $data['post_id']        = $id;
            $this->load->view('section/post-edit', $data);
        }
        else
        {
            $data['param'] = $id;
            $this->load->view('errors/empty', $data);
        }
    }

    /**
     * Eksekusi update post
     * @param int $id
     * @return void
     */
    public function update_post($id)
    {
        $this->Posts_data->edit_post($id);
        redirect('post');
    }

    /**
     * Eksekusi hapus post...
     * @param int $id
     * @return void
     */
    public function hapus_post($id)
    {
        $this->Posts_data->delete_post($id);
        $data['all_post'] = $this->Posts_data->get_all_post('publik');
        $this->load->view('data/post-list', $data);
    }

}

?>
