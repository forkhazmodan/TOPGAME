<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function check($login)
    {
        $query = $this->db->query("
            SELECT password, username
            FROM users
            WHERE mail = '$login'

        ");
        return $query;
    }

    function add_user($data)
    {
        $name = $data['name'];
        $mail = $data['mail'];
        $pass = $data['password'];
        $this->db->query("
            INSERT
            INTO users (username, mail, password)
            VALUES ('$name','$mail','$pass')
        ");
    }
    function check_user($mail)
    {
        $this->db->where('mail', $mail);
        $this->db->select('mail');
        return $query = $this->db->get('users');
    }
}