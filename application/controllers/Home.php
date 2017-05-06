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
        $this->load->helper('ostium');
        if(! check_session())
        {
            redirect('login');
        }
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
        $data['tag']            = $this->Posts_data->get_post_attribute('os_tag');
        $data['recent_post']    = $this->Posts_data->get_recent_post(5, 'publik');
        $data['recent_draft']   = $this->Posts_data->get_recent_post(5, 'draft');
        $data['total_post']     = $this->Posts_data->get_total_post('publik');
        $data['total_comment']  = $this->Posts_data->get_total_comment();
        $this->load->view('main', $data);
    }
}
