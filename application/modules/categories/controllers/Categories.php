<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MX_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_mdl');
    }
    function include_left_menu()
    {
        $data['categories'] = $this->Categories_mdl->get_categories();
        return $this->load->view('categories_view', $data, TRUE);
    }
    

}