<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Slider extends MX_Controller
{

    function __construct()
    {
        parent::__construct();

    }
    public function index(){
        
        return $this->load->view('slider_view', TRUE);
    }
    public function show(){
        return $this->load->view('slider_demo', TRUE);
    }

}