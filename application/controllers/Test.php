<?php

/**
 * Class untuk keperluan testing fitur aplikasi
 */
class Test extends CI_Controller
{

    public function index()
    {
        $data['asset'] = base_url() . "assets/";
        $this->load->view('test', $data);
    }
}






?>
