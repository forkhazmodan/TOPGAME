<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breadcrumb extends MX_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('Brcr_mdl');
    }
    public function index($params)
    {
        
         
        
        if(isset($params['category']) AND !isset($params['id']))
        {
            $cat    = $params['category'];
            $data['cat_name_en'] = $cat;
            $data['info']        =
            [
                'cat_name_ru' => $this->Brcr_mdl->get_cat_name($cat)->row_array(),
            ];
        }  
        
        if(isset($params['category']) AND isset($params['id']))
        {
            $id  = $params['id'];
            $cat = $params['category'];

            $data['cat_name_en'] = $cat;
            $data['good_id']     = $id;
            $data['info'] =
            [
                'cat_name_ru'  => $this->Brcr_mdl->get_cat_name($cat)->row_array(),
                'good_name'    => $this->Brcr_mdl->get_good_name($id)->row_array(),
            ];
        }  
        
        return $this->load->view('breadcrumb_view', $data, TRUE);

         
    }
     

}
