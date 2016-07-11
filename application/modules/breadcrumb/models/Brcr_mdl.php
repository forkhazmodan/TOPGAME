<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Brcr_mdl extends CI_Model
{
    function get_cat_name($cat_name_en){
        $query = $this->db->query("
            SELECT cat_name
            FROM categories
            WHERE cat_name_en = '$cat_name_en'
        ");
        return $query;
    }
    function get_good_name($good_id)
    {

        $query = $this->db->query("
            SELECT short_name
            FROM goods
            WHERE good_id = '$good_id'
        ");
        return $query;
    }
}