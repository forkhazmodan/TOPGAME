<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rules_mdl extends CI_Model
{
    public $login_rules = array(

        array(
            'field' => 'auth_login',
            'label' => 'Логин',
            'rules' => 'trim|required|valid_email|min_length[6]|max_length[50]|xss_clean'
        ),
        array(
            'field' => 'auth_pass',
            'label' => 'Пароль',
            'rules' => 'trim|required|min_length[2]|max_length[16]|alpha_dash|xss_clean'
        ),

    );
    public $registration_rules = array(
        array(
            'field' => 'name',
            'label' => 'Ваше имя',
            'rules' => 'trim|required|min_length[2]|max_length[16]|alpha_dash|xss_clean'
        ),
        array(
            'field' => 'mail',
            'label' => 'Ваша почтовый адрес',
            'rules' => 'trim|required|valid_email|min_length[6]|max_length[50]|xss_clean'
        ),
        array(
            'field' => 'password',
            'label' => 'Пароль',
            'rules' => 'trim|required|min_length[2]|max_length[16]|alpha_dash|xss_clean'
        ),
        array(
            'field' => 'password2',
            'label' => 'Пароль',
            'rules' => 'trim|required|min_length[2]|max_length[16]|alpha_dash|xss_clean'
        )

    );

    public $comments_rules = array(
        array(
            'field' => 'name',
            'label' => 'Ваше имя',
            'rules' => 'trim|required|min_length[3]|max_length[32]|xss_clean'
        ),
        array(
            'field' => 'comment',
            'label' => 'Ваш комментарий',
            'rules' => 'trim|required|min_length[10]|max_length[6000]|xss_clean'
        ),
        array(
            'field' => 'best',
            'label' => 'Достоинства',
            'rules' => 'trim|max_length[255]|xss_clean'
        ),
        array(
            'field' => 'worth',
            'label' => 'Недостатки',
            'rules' => 'trim|max_length[255]|xss_clean'
        ),
        array(
            'field' => 'mail',
            'label' => 'Ваш почтовый адрес',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),

        /* array(
             'field' => 'captcha',
             'label' => 'Символы с картинки',
             'rules' => 'exact_length[5]|alpha'


        |required
        |required|valid_email
         )*/
    );

    public $answer_rules = array(
        array(
            'field' => 'ans_name',
            'label' => 'Ваше имя',
            'rules' => 'trim|required|min_length[3]|max_length[32]|xss_clean'
        ),
        array(
            'field' => 'ans_comment',
            'label' => 'Ваш комментарий',
            'rules' => 'trim|required|min_length[10]|max_length[6000]|xss_clean'
        ),
         
        array(
            'field' => 'ans_mail',
            'label' => 'Ваш почтовый адрес',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
    );
}