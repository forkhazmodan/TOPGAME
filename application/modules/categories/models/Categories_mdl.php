<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Categories_mdl extends CI_Model
{

    function get_categories()
    {
        $query = $this->db->query("SELECT * FROM categories ORDER BY under_cat_id, cat_id"); // 0 - по умолчанию, в БД, это родительская категория. А !0 - дочерние.

        $cat = array();
        foreach ($query->result_array() as $row) {
            if (!$row['under_cat_id']) {
                $cat[$row['cat_id']] =
                    array(
                        "cat_id" => $row['cat_id'],
                        "under_cat_id" => $row['under_cat_id'],
                        "cat_name" => $row['cat_name'],
                        "cat_name_en" => $row['cat_name_en']
                    );
            } else {
                $cat[$row['under_cat_id']]['sub'][$row['cat_id']] =
                    array(
                        "cat_id" => $row['cat_id'],
                        "under_cat_id" => $row['under_cat_id'],
                        "cat_name" => $row['cat_name'],
                        "cat_name_en" => $row['cat_name_en']
                    );
            }
        }
        return $cat;
    }
}