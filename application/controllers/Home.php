<?php

/**
 * Class Home
 * Class ini merupakan class utama yang digunakan untuk
 * mengontrol segala aktivitas pada halaman Dashboard
 * @copyright   https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

class Home extends CI_Controller
{
    /**
     * Load main page
     * @return void
     */
    public function index()
    {
        $data['asset']      = base_url()."assets/";
        $data['main_title'] = 'Ostium CMS | Dashboard';
        $this->load->view('main', $data);
    }

    public function test()
    {
        $data['asset'] = base_url()."assets/";
        $this->load->view('test', $data);
    }
}

?>
