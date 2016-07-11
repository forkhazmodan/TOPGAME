<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_captcha{

    private $privatekey  = "6LfVDCQTAAAAAL6RS287sAYW1sM2FMgStuLU2cl2";
    private $publickey   = "6LfVDCQTAAAAAKVLys_sSv85b_1tuMniosl6PcU7";
     


    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library("input");
    }

    function captcha()
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';


        $response = file_get_contents($url."?secret=".$this->privatekey."&response=".$this->input->post
            ('g-recaptcha-response')."&remoteip=".$this->input->server('REMOTE_ADDR'));

        $data = json_decode($response);
        if(isset($data->success) AND $data->success == true){
            
            return TRUE;
        }else{
            
            return FALSE;
            //header('Location: ExampleCaptcha.php?CaptchaFail=');
        }
    }
    
    function get_publickey()
    {
        return $this->publickey;
    }
}

