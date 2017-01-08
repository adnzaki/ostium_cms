<?php

/**
 * Ostium CMS
 * A content management system for Wolestech's based site
 * Class Home
 * Class ini merupakan class utama yang digunakan untuk
 * mengontrol segala aktivitas pada halaman Dashboard
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.2
 */

class Home extends CI_Controller
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
     * Load main page
     * @return void
     */
    public function index()
    {
        $data['asset']          = base_url()."assets/";
        $data['main_title']     = 'Ostium CMS | Dashboard';
        $data['kategori']       = $this->Posts_data->get_post_attribute('os_kategori');
        $data['user']           = $this->Posts_data->get_post_attribute('os_user');
        // ambil post yang telah dipublish
        $data['recent_post']    = $this->Posts_data->get_recent_post(5, 'publik');
        // ambil post yang masih berstatus draft
        $data['recent_draft']   = $this->Posts_data->get_recent_post(5, 'draft');
        $data['total_post']     = $this->Posts_data->get_total_rows('os_post');
        $data['total_comment']  = $this->Posts_data->get_total_rows('os_komentar');
        $this->load->view('main', $data);
    }

}

?>
