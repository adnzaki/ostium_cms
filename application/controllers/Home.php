<?php

/**
 * Class Home
 * Class ini merupakan class utama yang digunakan untuk
 * mengontrol segala aktivitas pada halaman Dashboard
 * @copyright   Dilisensikan dibawah MIT License
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

class Home extends CI_Controller
{
    public function index()
    {
        $data['asset']      = base_url()."assets/";
        $data['main_title'] = 'Ostium CMS | Dashboard';
        $this->load->view('main', $data);
    }
}

?>
