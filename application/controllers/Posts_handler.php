<?php

/**
 * Class Posts_handler
 * Class ini merupakan class yang mengatur aktifitas posting
 * mengontrol segala aktivitas pada halaman Dashboard
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.1
 */

class Posts_handler extends CI_Controller
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
     * Tambahkan post ke database melalui model Posts_data
     * @return void
     */
    public function add_post()
    {
        $this->Posts_data->insert_post();
        redirect('Home');
    }

}

?>