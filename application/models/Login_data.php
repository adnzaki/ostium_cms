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

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_data extends CI_Model
{
    /**
     * Cocokkan input user dengan data di database
     *
     * @param string $user
     * @param string $password
     * @return bool
     */
    public function validation($user, $password)
    {
        $rules = [
            'user_login'    => $user,
            'user_pass'     => $password
        ];
        $get = $this->db->get_where('os_user', $rules);
        if($get->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
