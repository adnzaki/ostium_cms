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
     * The Constructor!
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Posts_data');
        $this->load->helper('filter');
        $this->load->library('pagination');
        $this->load->config('pagination');
        $this->load->library('ostiumdate');
    }

    /**
     * Data loader
     *
     * @return array
     */
    protected function common_data()
    {
        $data = [
            'asset'         => base_url()."assets/",
            'main_title'    => 'Ostium CMS | Post',
            'kategori'      => $this->Posts_data->get_post_attribute('os_kategori'),
            'user'          => $this->Posts_data->get_post_attribute('os_user'),
            'tanggal'       => $this->Posts_data->get_post_date()
        ];

        return $data;
    }

    /**
     * Halaman utama untuk posting
     * @return void
     */
    public function index()
    {
        $data = $this->common_data();

        // Set pagination configuration
        $config['base_url']     = base_url() . 'posts/index/';
        $config['total_rows']   = $this->Posts_data->get_total_post();
        $from                   = $this->uri->segment(3);
        $data['from'] = $from;
        $this->pagination->initialize($config);

        $data['baris'] = $config['total_rows'];
        $data['all_post'] = $this->Posts_data->get_all_post('', 0, 0, $this->config->item('per_page'), $from);
        $this->load->view('section/post', $data);
    }

    /**
     * Post filtering
     * @param string $status
     * @param int $date
     *
     * @return void
     */
    public function filter_post($status, $date = 0, $category = 0)
    {
        $data       = $this->common_data();
        //$uri_length = $this->uri->total_segments();

        // Passing value untuk tanggal
        (empty($date) OR $date === 0) ? $date = 0 : $date = $date;

        (empty($category) OR $category === 0) ? $category = 0 : $category = $category;

        // BaseURL untuk pagination
        $config['base_url']         = base_url() . 'posts/filter_post/' . $status . '/' . $date . '/' . $category;

        // Cek URL untuk menghitung jumlah baris data yang diambil
        if($status === 'publik')
        {
            $config['total_rows']   = $this->Posts_data->get_total_post('publik', $date, $category);
        }
        elseif($status === 'draft')
        {
            $config['total_rows']   = $this->Posts_data->get_total_post('draft', $date, $category);
        }
        elseif($status === 'all')
        {
            $config['total_rows']   = $this->Posts_data->get_total_post('', $date, $category);
            $status                 = '';
        }

        $data['baris'] = $config['total_rows'];
        $from = offset_generator();

        $this->pagination->initialize($config);
        $data['all_post'] = $this->Posts_data->get_all_post($status, $date, $category, $this->config->item('per_page'), $from);

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
        $data = $this->common_data();

        // check whether the post is exist or not
        if($this->Posts_data->post_exists($id))
        {
            $data['edit_post']      = $this->Posts_data->post_to_edit($id);
            $data['post_id']        = $id;
            $data['cek_link']       = $this->Posts_data->check_permalink($id);
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
     * Eksekusi update post
     * @param int $id
     * @return void
     */
    public function publish_draft($id)
    {
        $this->Posts_data->publish_draft($id);
    }

    /**
     * Eksekusi hapus post...
     * @param int $id
     * @param string $uri_target
     * @return void
     */
    public function hapus_post($id, $uri_target)
    {
        $this->Posts_data->delete_post($id);
        $uri_target = str_replace("-", "/", $uri_target);
        redirect($uri_target);
    }

}
