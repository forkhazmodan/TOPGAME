<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myfuncs{

    
    function __construct()
    {
        $this->D=array();
        $this->CI =& get_instance();
        
    }

    public function tree_build($array)
    {
        if(!empty($array))
        {
            function createTree(&$list, $parent)
            {
                $tree = [];
                foreach ($parent as $l)
                {
                    if(isset($list[$l['comment_id']]))
                    {
                        $l['children'] = createTree($list, $list[$l['comment_id']]);
                    }
                    $tree[] = $l;
                }
                return $tree;
            }

            $arr = [];
            foreach ($array as $row)
            {
                $arr[$row['send_to']][] = $row;
            }
            $tree = createTree($arr, $arr[0]);
            return $tree;
            //print_r($arr);
            //print_r($arr[1]);
            //echo(count($arr[0]));
        }else return null;
    }

    function arr_slice($tree_arr, $pr_page, $segm)
    {

        if (empty($segm)) {
            $segm = '0';
        }
        if($tree_arr == NULL){
            return NULL;
        }else{
            $arr = array_slice($tree_arr, $segm, $pr_page );
            return $arr;
        }

    }

    function check_text($str)
    {
        
        if (preg_match_all("/[^а-яА-ЯёЁa-zA-Z0-9,.:!?]/u", $str, $matches))
        {
            $symbols = $this->show_error_symbols($matches[0]); //Формируем строку с недопустимыми символами

            $this->form_validation->set_message('check_text', $symbols);
            return FALSE;
        }
        else
        {
            return TRUE;
        }

    }
    private function show_error_symbols($arr)
    { // разбираем массив в строку
        $count = count($arr);

        $i = 0;
        $str = '';
        $begin = '';
        foreach ($arr as $key => $val)
        {
            if ($i == $count)
            {
                $str .= $val.".";
            }
            elseif($count == 1)
            {
                $begin = "Недопустимый символ:  ";
                $str .= ' '.$val.' ';
            }
            else
            {
                $begin = "Недопустимые символы:  ";
                $str .= ' '.$val.' ';
            }
            $i++;
        }
        $result = $begin.' '.$str;
        return $result;
    }
    public function rebuild_array($query)
    {

        $cat = array();

        foreach ( $query->result_array() as $k => $item) {

            $count = $item['count'];
            if($count == '1')
            {
                $item['count'] = $count.' Отзыв';
            }
            elseif($count == '0')
            {
                $item['count'] = 'Оставить отзыв';
            }
            elseif($count == '2' or $count == '3' or $count == '4' )
            {
                $item['count'] = $count.' Отзыва';
            }
            else
            {
                $item['count'] = $count.' Отзывов';
            }
            $cat[$item['good_id']]  = $item; //Переназначение ключей массивов, в ключ с id товара.
        }
        //$this->tp->print_array($cat);
        return $cat;

    }
    
}

