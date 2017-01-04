<?php

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
