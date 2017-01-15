<?php

/**
 * Class untuk keperluan testing fitur aplikasi
 */
class Test extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Model_test');
    }

    public function index()
    {
        $data['asset'] = base_url() . "assets/";
        $data['kategori'] = $this->Model_test->get_kategori();
        $data['badak'] = $this->Model_test->coba(19);
        $this->load->view('test', $data);
    }
}






?>
