<?php

/**
 * Class Home
 * Class ini merupakan class utama yang digunakan untuk
 * mengontrol segala aktivitas pada halaman Dashboard
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.1
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
        $data['asset']      = base_url()."assets/";
        $data['main_title'] = 'Ostium CMS | Dashboard';
        $data['kategori']   = $this->Posts_data->get_category();
        $this->load->view('main', $data);
    }

    /*public function test()
    {
        $data['asset'] = base_url()."assets/";
        $this->load->view('test', $data);
    }*/
}













?>
