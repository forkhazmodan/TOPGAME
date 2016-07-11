<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Comments_mdl extends CI_Model
{
    function get_comments($good_id){
        $query = $this->db->query("
            SELECT comment_id, send_to, user_id, good_id, mail, name, comment, best, worth, date, time
            FROM comments
            WHERE good_id = '$good_id'
            ORDER BY date DESC, time DESC
        ");

        return $query;
        /*
        $comments = array();
        foreach ($comm->result_array() as $row) {
            $comments[$row['send_to']][] = $row;
        }
        return $comments;
        */
    }

    function get_parent_comments($good_id, $per_page, $segment)
    {
        if (empty($segment)) {
            $segment = '0';
        }
        $query = $this->db->query("
            SELECT comment_id, send_to, user_id, good_id, mail, name, comment, best, worth, date, time
            FROM comments
            WHERE good_id = '$good_id' AND send_to = '0'
            ORDER BY date DESC, time DESC
            LIMIT $segment, $per_page
        ");
        return $query;
    }
    function get_child_comments($id, $string){
        $query = $this->db->query("
            SELECT comment_id, send_to, user_id, good_id, mail, name, comment, best, worth, date, time
            FROM comments
            WHERE good_id = '$id'
            AND send_to IN (".$string.")
        ");
        return $query;
    }
    function get_count($id){




        $this->db->count_all_results('comments');
        $this->db->select('comment_id');
        $this->db->from('comments');
        $this->db->where('good_id', $id);
        $this->db->where('send_to', 0);

        return $this->db->count_all_results();

    }
    function insert_comment($data)
    {
        $this->db->insert('comments', $data);
        //$this->db->insert_id();
    }
    function insert_reply($cat_name_en)
    {

        $query = $this->db->query("
            SELECT cat_id, cat_name

            FROM categories
            WHERE cat_name_en = '$cat_name_en'
        ");
        $row = $query->row_array();
        return $row;
    }

}

/*======EXAMPLES=======*/
/*
 * function get_parent_comments($good_id, $per_page, $segment)
    {
        if (empty($segment)) {
            $segment = '0';
        }
        $query = $this->db->query("
            SELECT comment_id, send_to, user_id, good_id, mail, name, comment, best, worth, date, time
            FROM comments
            WHERE good_id = '$good_id'
            ORDER BY date DESC, time DESC
            LIMIT $segment, $per_page
        ");

        return $query;
    }
 */