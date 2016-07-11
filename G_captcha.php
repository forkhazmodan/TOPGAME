<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_captcha extends MX_Controller{

    private $privatekey  = "6LfHyyQTAAAAAPRarN0o_TUytLiLkia3dxrSYVn6";
    private $publickey   = "6LfHyyQTAAAAACtNZvW9XAH8bqN5Kq-uQ_GChI8A";
     


    function __construct()
    {
        parent::__construct();
    }

    function captcha()
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';


        $response = file_get_contents($url."?secret=".$this->privatekey."&response=".$this->input->post('g-recaptcha-response')."&remoteip=".$this->input->server('REMOTE_ADDR'));

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

