<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MX_Controller {

    private $data = '';
    private $view = 'cart_view';
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_mdl');
        $this->load->helper('security');
        $this->load->library('session');
    }
    function load_cart()
    {
        
        if(empty($this->session->userdata('cart'))){ 
            $this->view = 'cart_empty_view.php';
        }
        else{ 
            $cart = $this->session->userdata('cart');
            foreach ($cart as $k => $v){
                $ids[] = $k;
            }
            $query = $this->Cart_mdl->get_basket_goods($ids);
            foreach ($query->result_array() as $k => $v){
                $arr[$k] = $v;
                $arr[$k]['count'] = $cart[$arr[$k]['good_id']];
                $arr[$k]['total_price'] = $arr[$k]['count'] * $arr[$k]['price'];
            }
            $amount_price = 0;
            foreach ($arr as $k => $v){
                $amount_price = $amount_price + (int) $v['total_price'];
            }
            $this->data['amount_price']   = $amount_price;
            $this->data['basket_options'] = $arr;
        }
        
        if($this->input->is_ajax_request()){
            echo $this->load->view($this->view , $this->data, TRUE);
        }
        else{
            return $this->load->view($this->view , $this->data, TRUE);
        }
    }
    function add_one($id){        
        $arr = $this->session->userdata('cart');
        if(!empty($arr) and array_key_exists($id, $arr) === TRUE){
            $arr[$id] =  $arr[$id] + 1;
        }
        else{
            $arr[$id] = 1;
        }
        $this->session->set_userdata('cart' , $arr);       
        $this->load_cart();
    }
    function refresh_one($id){        
        $arr = $this->session->userdata('cart');
        if(!empty($arr) and array_key_exists($id, $arr) === TRUE){
            $arr[$id] = $this->vars['count'];
        }
        $this->session->set_userdata('cart' , $arr);
        $this->load_cart();
    }

    function minus_one($id){
        $arr = $this->session->userdata('cart');
        if(array_key_exists($id, $arr) === TRUE and $arr[$id] > 1){
            $arr[$id] = $arr[$id] - 1;
        }
        else{
            unset($arr[$id]);
        }
        $this->session->set_userdata('cart' , $arr);
        $this->load_cart();

    }
    function del_one($id){
        $arr = $this->session->userdata('cart');
        unset($arr[$id]);
        $this->session->set_userdata('cart' , $arr);
        $this->load_cart();
    }
    private function check_url(){
        if(is_numeric($this->vars[2])){
            $arr = [
                'module' => $this->vars[0],
                'func'   => $this->vars[1],
                'id'     => $this->vars[2],
            ];
        }
        if(isset($this->vars[3])){
            $arr['count'] = (int) $this->vars[3];
        }else{
            $arr['count'] = 0;
        }
        $this->vars = $arr;
    }

}