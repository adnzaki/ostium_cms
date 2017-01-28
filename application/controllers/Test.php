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
        $this->load->model('Posts_data');
    }

    public function index()
    {
        $data['all_post'] = $this->Posts_data->get_all_post('publik');
        $this->load->view('test', $data);
    }
}






?>
