<?php

/**
 * Class Front_end
 * Data processing of the front end site
 *
 * @copyright	Copyright (c) 2016 Wolestech
 * @author      Adnan Zaki
 * @link        http://wolestech.com/       
 */
class Front_end extends CI_Model
{

    /**
     * Load slider images
     *
     * @return  string[]
     */
    function load_slider()
    {
        $get_slider = $this->db->get('slider');
        return $get_slider->result();
    }

    /**
     * Load team members
     *
     * @param   int $limit
     * @param   int $offset
     * @return  string[]
     */
    function load_teams($limit, $offset)
    {
        $get_member = $this->db->get('team', $limit, $offset);
        return $get_member->result();
    }

    /**
     * Load portfolios
     *
     * @return  string[]
     */
    function portfolio()
    {
        $get_portfolio = $this->db->get('portfolio');
        return $get_portfolio->result();
    }

    /**
     * Load web services
     *
     * @return  string[]
     */
    function load_web_service()
    {
        $get_service = $this->db->get('product');
        return $get_service->result();
    }

    /**
     * Load description
     *
     * @param   int $id
     * @return  string
     */
     function get_description($id)
     {
         $this->db->select('description');
         $this->db->from('product');
         $this->db->where('id_product', $id);
         $get_desc = $this->db->get();
         return $get_desc;
     }
}
















 ?>
