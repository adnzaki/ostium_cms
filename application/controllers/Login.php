<?php

/**
 * OstiumCMS
 * A simple, fast and fully customizable Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Login_data');
        $this->load->library('form_validation');
    }

    /**
     * Halaman utama login
     *
     * @return void
     */
    public function index()
    {
        $data['assets'] = base_url('assets/');
        $data['page_title'] = 'Sign In | OstiumCMS';
        $this->parser->parse('section/login', $data);
    }

    /**
     * Validasi user input
     *
     * @return string
     */
    public function login_validation()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($this->Login_data->validation($username, $password))
        {
            $session = ['username' => $username, 'logged_in' => TRUE];
            $this->session->set_userdata($session);
            echo 'success';
        }
        else
        {
            echo 'failed';
        }
    }

    /**
     * Logout dan hapus session....
     *
     * @return void
     */
    public function logout()
    {
        $this->session->unset_userdata('username', 'logged_in');
        redirect('login');
    }
}
