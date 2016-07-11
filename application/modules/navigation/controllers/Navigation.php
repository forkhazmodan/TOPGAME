<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends MX_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Navigation_mdl');
    }
    
    function navigation_pannel()
    {                
        $data['pages']     = $this->Navigation_mdl->get_pages();
        return $this->load->view('navigation_view' , $data , TRUE);
       
    }

}
