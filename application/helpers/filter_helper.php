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
            if($CI->uri->segment(1) === $target[0] OR $CI->uri->segment(2) === $target[1] OR $CI->uri->segment(3) === $target[2])
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

if(! function_exists('multidimensional_array_unique'))
{
    /**
     * Multidimensional Array Unique
     * This function was taken from http://php.net/manual/en/function.array-unique.php
     * Thanks to Ghanshyam Katriya for creating this simple-but-cool function
     * It's used to get unique values of a multidimensional array
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    function multidimensional_array_unique($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val)
        {
            if (!in_array($val[$key], $key_array))
            {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }

        return $temp_array;
    }
}

if(! function_exists('offset_generator'))
{
    /**
     * Offset Generator
     * Well, it's a little bit confusing to give the name of this function
     * But because it's related to offset, and return a number, I named it 'Offset Generator'
     *
     * @return int
     */
     function offset_generator()
     {
         $CI =& get_instance();
         $uri_length = $CI->uri->total_segments();

         if($uri_length === 3)
         {
             $offset = $CI->uri->segment(4);
         }
         elseif($uri_length === 4)
         {
             $offset = $CI->uri->segment(5);
         }
         elseif($uri_length > 4)
         {
             $offset = $CI->uri->segment(6);
         }

         return $offset;
     }
}
