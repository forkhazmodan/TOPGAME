<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends MX_Controller
{
    private $data = [];
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comments_mdl');
        $this->load->model('Rules_mdl');
        $this->load->library('pagination');
        $this->load->library('myfuncs');
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->helper('security');
    }
    function include_comments($cat, $id)
    {
        $array  = $this->Comments_mdl->get_comments($id)->result_array();
        $res    = $this->myfuncs->tree_build($array);
        $this->pagination->initialize($config = [

            'base_url'       => base_url() . '/goods/' . $cat . '/' . $id .'/page/' ,
            'total_rows'     => count($res),
            'per_page'       => '5',
            'full_tag_open'  => "<div class='pagination_links'>",
            'full_tag_close' => '</div>',
            'cur_tag_open'   => '<div>',
            'cur_tag_close'  => '</div>',
        ]);
        $data['tree_array'] = $this->myfuncs->arr_slice($res , $config['per_page'] , $this->uri->segment(5));
        $data['links']      = $this->pagination->create_links();
        return $this->load->view('comments_view', $data, TRUE);
    }
    function include_forms($category, $id)
    {
        $this->check_if_submit();
        $this->data = [
            'data'=>[
                'category' => $category,
                'id'       => $id,
            ],
            'privatekey'   => Modules::run('g_captcha/get_publickey'),
        ];
        
        return $this->load->view('forms_view', $this->data, TRUE);
    }
    function check_if_submit()
    {
        if($this->input->post('add_comment'))
        {
            $this->form_validation->set_rules($this->Rules_mdl->comments_rules);
            $this->form_validation->set_error_delimiters('<span class="show_error">', '</span>');
            $check = $this->form_validation->run($this);
            $captchapass = Modules::run('g_captcha/captcha');

            if($check AND $captchapass == TRUE)
            {
                $comment_data['send_to']  = $this->input->post('send_to');
                $comment_data['good_id']  = $this->input->post('good_id');
                $comment_data['mail']     = html_escape($this->input->post('mail'));
                $comment_data['name']     = html_escape($this->input->post('name'));
                $comment_data['comment']  = html_escape($this->input->post('comment'));
                $comment_data['best']     = html_escape($this->input->post('best'));
                $comment_data['worth']    = html_escape($this->input->post('worth'));
                $comment_data['date']     = date('Y-m-d');
                $comment_data['time']     = date('H:i');

                $this->Comments_mdl->insert_comment($comment_data);
                redirect($this->input->server('HTTP_REFERER'));
            }
            return;
        }
        if($this->input->post('add_reply'))
        {
            $this->form_validation->set_rules($this->Rules_mdl->answer_rules);
            $this->form_validation->set_error_delimiters('<span class="show_error">', '</span>');
            $check = $this->form_validation->run($this);
            $captchapass = Modules::run('g_captcha/captcha');

            if($check AND $captchapass == TRUE) {

                $comment_data['send_to'] = $this->input->post('send_to');
                $comment_data['good_id'] = $this->input->post('good_id');
                $comment_data['mail']    = html_escape($this->input->post('ans_mail'));
                $comment_data['name']    = html_escape($this->input->post('ans_name'));
                $comment_data['comment'] = html_escape($this->input->post('ans_comment'));
                $comment_data['date']    = date('Y-m-d');
                $comment_data['time']    = date('H:i');

                $this->Comments_mdl->insert_comment($comment_data);
                
                redirect($this->input->server('HTTP_REFERER')."#comment_".$comment_data['send_to']);
            }
            return;
        }
    }
}