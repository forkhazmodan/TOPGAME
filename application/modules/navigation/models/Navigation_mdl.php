<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Navigation_mdl extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function get_pages(){
        $query = $this->db->query("
            SELECT page_id, page_url, title, link_type
            FROM pages
            WHERE display = 'yes'
            ORDER BY
            link_position");
        return $query->result_array();
    }

}