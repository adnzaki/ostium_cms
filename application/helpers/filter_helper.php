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

/**
 * OstiumCMS Filter Link Helpers
 *
 * @package		Application
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Adnan Zaki
 * @link		https://github.com/adnzaki/ostium_cms/
 */

// ------------------------------------------------------------------------

if(! function_exists('filter_link'))
{
    /**
     * Filter Link
     *
     * This function used to style a link that is currently active.
     *
     * @param mixed $target
     * @param string $word
     * @return string
     */
    function filter_link($target, $word)
    {
        // Get CodeIgniter instance object
        $CI =& get_instance();

        // Style to mark active link
        $current_link = ['<b style=color:#000;>', '</b>'];

        // Check whether $target is array or string
        is_array($target) ? $total = $CI->Posts_data->get_total_post() : $total = $CI->Posts_data->get_total_post($target);

        // Link output
        $active_link = $current_link[0] . $word . " (" . $total . ")" . $current_link[1];
        $inactive_link = $word . " (" . $total . ")";

        if(is_array($target))
        {
            if($CI->uri->segment(1) === $target[0] OR $CI->uri->segment(2) === $target[1])
            {
                $output = $active_link;
            }
            else
            {
                $output = $inactive_link;
            }
        }
        else
        {
            if($CI->uri->segment(3) === $target)
            {
                $output = $active_link;
            }
            else
            {
                $output = $inactive_link;
            }
        }

        return $output;
    }
}