<?php

/**
 * Ostium CMS
 * A content management system for Wolestech based website
 * Class Posts
 * Class ini merupakan class yang mengatur aktifitas posting
 * mengontrol segala aktivitas pada halaman Dashboard
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.3
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
     * Index page
     * @return void
     */
    public function index()
    {
        $data['asset']          = base_url()."assets/";
        $data['main_title']     = 'Ostium CMS | Post';
        $data['kategori']       = $this->Posts_data->get_post_attribute('os_kategori');
        $data['user']           = $this->Posts_data->get_post_attribute('os_user');
        $data['all_post']       = $this->Posts_data->get_all_post('publik');
        $data['all_draft']      = $this->Posts_data->get_all_post('draft');
        $this->load->view('post', $data);
    }

    /**
     * Tambahkan post..
     * @return void
     */
    public function add_post()
    {
        $this->Posts_data->insert_post();
        redirect('home');
    }

    /**
     * Tambahkan draft...
     * @return void
     */
    public function add_draft()
    {
        $this->Posts_data->insert_draft();
    }

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
            $this->load->view('content/post-edit', $data);
        }
        else
        {
            $data['param'] = $id;
            $this->load->view('empty', $data);
        }
    }

}

?>
