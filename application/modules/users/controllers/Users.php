<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

    private $data = [];
    private $settings = ['errors' => ''];
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model  ('Rules_mdl');
        $this->load->model  ('Users_mdl');
        $this->load->module('templates');
    }
    function registration_load_tpl()
    {
        $data['module']   = 'users';
        $data['function'] = 'registration_view';
        $data['template'] = 'info';

        $this->templates->default_tpl($data);
    }
    function registration_view()
    {
        if($this->input->post('registration_submit'))
        {
            $data['name']      = $this->input->post('name');
            $data['mail']      = $this->input->post('mail');
            $data['password']  = $this->input->post('password');
            $password2         = $this->input->post('password2');

            $this->form_validation->set_rules($this->Rules_mdl->registration_rules);
            $this->form_validation->set_error_delimiters('<span class="show_error">', '</span>');
            if($this->form_validation->run($this))
            {
                if($data['password'] != $password2 )
                {
                    $this->settings['errors'] = '<span class="show_error"> Пароли не совпадают </span>';
                }
                elseif($this->Users_mdl->check($data['mail'])->num_rows() > 0)
                {
                    $this->settings['error_mail'] = '<span class="show_error"> Такой пользователь уже
                    зарегестрирован</span>';
                }
                else
                {
                    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                    $this->Users_mdl->add_user($data);
                    return $this->load->view('success_view.php', FALSE, TRUE);
                }
            }
        }
        return $this->load->view('registration_view', $this->settings, TRUE);
    }
    function login_form()
    {
        if($this->input->post('enter'))
        {
            $this->form_validation->set_rules($this->Rules_mdl->login_rules);
            $this->form_validation->set_error_delimiters('<span class="show_error">', '</span>');
            if($this->form_validation->run($this))
            {
                $login = $this->input->post('auth_login');
                $pass  = $this->input->post('auth_pass');
                $query = $this->Users_mdl->check($login);
                if($query != NULL)
                {
                    $hashed_pass = $query->row_array()['password'];
                    $name        = $query->row_array()['username'];
                    /*echo password_hash($pass, PASSWORD_BCRYPT); echo "<br>";
                    echo $hashed_pass;
                    die();*/
                    if(password_verify($pass, $hashed_pass))
                    {
                        $ses_data = array
                        (
                            'username'  => $name,
                            'email'     => $login,
                            'logged_in' => 'yes',
                        );
                        $this->session->set_userdata($ses_data);
                        $this->data['username'] = $this->session->userdata('username');
                        $this->data['mail']     = $this->session->userdata('email');
                        //$this->output->set_header("Location:".$_SERVER['HTTP_REFERER']);
                    }
                    else
                    {
                        $this->data['errors']['auth'] = "<span class='show_error'> Логин и пароль не совпадают</span>";
                    }
                }
                else
                {
                    $this->data['errors']['auth'] = "<span class='show_error'>Пользователя с таким логином не
                    существует</span>"; // нужно попробовать использовать FlashData
                }
            }
        }

        return $this->load->view('auth_view', $this->data , TRUE);
    }
    function login()
    {

    }

    function logout()
    {
        $this->session->sess_destroy();
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    function users_pannel()
    {
        $sess_arr = $this->session->userdata();
        
        $data['logged_in'] = $sess_arr['logged_in'];
        $data['username']  = $sess_arr['username'];
        return $this->load->view('users_pannel', $data , TRUE);
    }

    public function forgot_pass()
    {
        echo "Forgot pass page";
    }
}