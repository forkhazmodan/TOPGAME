

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Goods extends MX_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->module('templates');
        $this->load->model('Goods_mdl');
        $this->load->library('Myfuncs');
        $this->load->library('pagination');
    }
    //---- VIEWS
    function category_goods($category = '', $pagi_num = 0){
        $data['module']   = 'goods';
        $data['function'] = 'category_goods_content';
        $data['data']     = [
            'category' => $category,
            'pagi_num' => $pagi_num,
        ];
        $this->templates->default_tpl($data);
    }
    function single_good($category = '', $id = '',  $pagi_num = 0 ){
        $data['module']   = 'goods';
        $data['function'] = 'single_good_content';
        $data['data']     = [
            'category' => $category,
            'id'       => $id,
        ];
        $this->templates->default_tpl($data);
    }
    function eyestoppers(){
        $data['module']   = 'goods';
        $data['function'] = 'eyestoppers_content';
        $data['data']     = [];
        $this->templates->default_tpl($data);
    }
    //---- INCLUDES
    function category_goods_content($vars){

        $cat  = $vars['category'];
        $pagi = $vars['pagi_num'];
         


        $data['cat'] = $this->Goods_mdl->get_cat_id($cat);

        $cat_id = $data['cat']['cat_id'];
        $count = $this->Goods_mdl->get_count_goods($cat_id);
        $config['base_url']         = base_url() . '/goods/' . $cat . '/page/';
        $config['total_rows']       = $count;
        $config['per_page']         = '12';
        $config['full_tag_open']    = "<div class='pagination_links'>";
        $config['full_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<div>';
        $config['cur_tag_close']    = '</div>';
        $this->pagination->initialize($config);
        $query = $this->Goods_mdl->get_goods($cat_id, $config['per_page'], $pagi);

        $data['goods'] = $this->myfuncs->rebuild_array($query);

        return $this->load->view('all_goods_view', $data, TRUE);
    }
    function single_good_content($vars = []){
        $data['good_detail']     = $this->Goods_mdl->get_good_detail($vars['id']);
        $data['description']     = $this->Goods_mdl->get_description($vars['id']);
        $data['good_chars']      = $this->Goods_mdl->get_good_chars($vars['category'], $vars['id']);
        $data['data']     = [
            'category' => $vars['category'],
            'id'       => $vars['id'],
        ];
        return $this->load->view('detailGood_view', $data, TRUE);
    }
    function eyestoppers_content(){
        $query = $this->Goods_mdl->get_eyestoppers();
        //reload result array
        foreach ($query->result_array() as $k => $item) {
            $count = $item['count'];
            if($count == '1'){
                $item['count'] = $count.' Отзыв';
            }
            elseif($count == '0'){
                $item['count'] = 'Оставить отзыв';
            }
            elseif($count == '2' or $count == '3' or $count == '4' ){
                $item['count'] = $count.' Отзыва';
            }
            else{
                $item['count'] = $count.' Отзывов';
            }
            $cat[$item['good_id']]  = $item; //Переназначение ключей массивов, в ключ с id товара.
        }
        $data['eyestoppers'] = $cat;   
        return $this->load->view('eyestoppers_view', $data, TRUE);
    }

}