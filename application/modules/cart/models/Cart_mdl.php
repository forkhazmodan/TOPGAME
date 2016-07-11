<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cart_mdl extends CI_Model
{
    function get_basket_goods($cart)
    {

        $query = $this->db->query("
            SELECT good_id, full_name, price
            FROM goods
            WHERE good_id IN (".implode(",",$cart).")
        ");
        return $query;
    }
}