<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Goods_mdl extends CI_Model
{

    function check_uri($cat_name_en){
        $query = $this->db->query("
            SELECT cat_name_en
            FROM categories
            WHERE cat_name_en ='$cat_name_en'
        ");
        return $query;

    }

    function get_eyestoppers()  //Запрос на Хиты и новинки (Айстоперы)
    {
        $query = $this->db->query("
            SELECT
                g.good_id,
                g.id,
                g.good_id,
                g.full_name,
                g.visible,
                g.available,
                g.hits,
                g.new,
                g.sale,
                g.price,
                g.date_time,
                g.sales,
                cat.img,
                cat.cat_name_en,
                COUNT(com.comment_id) AS count
            FROM goods g
            LEFT JOIN categories cat ON cat.cat_id = g.cat_id
            LEFT JOIN comments com ON com.good_id = g.good_id
            WHERE available = 'yes' OR hits = 'yes'
            GROUP BY g.good_id
            ORDER BY FIELD (g.available, 'yes','soon','no'), g.date_time DESC

        ");

        return $query;

    }
    function get_count_comments()  //Запрос на Хиты и новинки (Айстоперы)
    {
        $query = $this->db->query("
            SELECT COUNT(DISTINCT comment_id)
            WHERE good_id = WHERE IN()
            ORDER BY FIELD (g.available, 'yes','soon','no'), g.date_time DESC
        ");


    }

    function get_good_detail($good_id)
    {
        $query = $this->db->query("
            SELECT g.id, g.good_id, g.full_name, g.developer, g.model, g.short_name, g.content, g.visible, g
            .available,
            g.hits, g.new, g.sale, g.price, g.date_time,
            g.sales, g.img_slide, c.img, c.cat_name_en
            FROM goods g, categories c
            WHERE g.good_id = '$good_id' AND c.cat_id = (
                SELECT cat_id
                FROM goods
                WHERE good_id = '$good_id'
            )
            ORDER BY FIELD (g.available, 'yes','soon','no'), g.date_time DESC
        ");
        $row = $query->row_array();
        if ($row['img_slide']) { // ���� ���� img_slide ���������� -->
            $row['img_slide'] = explode("|", $row['img_slide']);
        }
        return $row;

    }
    function get_description($good_id)
    {
        $query = $this->db->query("
            SELECT g.content
            FROM goods g, categories c
            WHERE g.good_id = '$good_id' AND c.cat_id = (
                SELECT cat_id
                FROM goods
                WHERE good_id = '$good_id'
            )
        ");
        $arr = $query->row_array();
        return $arr['content'];

    }

    function get_good_chars($cat_name_en, $good_id)
    {
        $query = $this->db->query("
            SELECT a.char_id, a.char_name_ru, v.char_value
            FROM char_atributes a
            JOIN char_values v ON v.char_id = a.char_id
            WHERE a.cat_id = (SELECT cat_id FROM categories c WHERE cat_name_en = '$cat_name_en') AND v.good_id = '$good_id'
        ");

        $row = $query->result_array();
        return $row;

    }
    function get_cat_id($cat_name_en)
    {

        $query = $this->db->query("
            SELECT cat_id, cat_name
            FROM categories
            WHERE cat_name_en = '$cat_name_en'
        ");
        $row = $query->row_array();
        return $row;
    }
    function get_goods($cat_id, $per_page, $segment)
    {
        
        $query = $this->db->query("
            SELECT
                g.*,
                c.img,
                c.cat_name_en,
                c.cat_name,
                COUNT(com.comment_id) AS count
            FROM goods g
            LEFT JOIN categories c ON c.cat_id = $cat_id
            LEFT JOIN comments com ON com.good_id = g.good_id
            WHERE g.cat_id = $cat_id
            GROUP BY g.good_id
            LIMIT $segment, $per_page

        ");
        return $query;
    }

    

    function get_count_goods($cat_id)
    {
        $this->db->count_all_results('goods');
        $this->db->select('good_id');
        $this->db->from('goods');
        $this->db->where('cat_id', $cat_id);
        return $this->db->count_all_results();
    }

    function getCountProduct($cat_id){
        $this->db->count_all_results('goods');
        $this->db->select('good_id');
        $this->db->from('goods');
        $this->db->where('cat_id', $cat_id);
        return $this->db->count_all_results();
    }
    /*
    function check_uri($cat_name_en, $good_id){
        $query = $this->db->query("
            SELECT g.good_id
            FROM goods g
            WHERE g.good_id = '$good_id' AND g.cat_id = (

                SELECT c.cat_id
                FROM categories c
                WHERE c.cat_name_en = '$cat_name_en'
            )
        ");
        return $query;
    }*/

}