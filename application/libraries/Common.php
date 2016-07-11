<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common
{ 
    function __construct()
    {
        $this->CI =& get_instance();
    }
    function load_module($module, $vars = [])
    {

        if (is_dir('application/modules/'.$module))
        {
            
            $obj = Modules::load([$module => $vars]);
            $data = call_user_func_array([$obj, "index"], $vars);
        }
        return $data;
    }
    function load_module_data($tpl, $modules = [], $params = [] )
    {
        $data    = array();
        $TPL     = $this->CI->load->view($tpl, FALSE, TRUE);
        $pattern = '/{[A-Z0-9_]+}/';
        preg_match_all($pattern, $TPL, $MODULES); // nahodit metki na shaplony

        foreach ($MODULES[0] as $MODULE)
        {
            $MODULE = substr($MODULE,1,-1);
            $module = strtolower($MODULE);

            if(in_array($module, $modules))
            { //proverka metok, i dopusk k dannim
                $data[$MODULE] = $this->load_module($module, $params );
            }
            else
            {// udaliaem lishnie metki v shablone
                $data[$MODULE] = '';
            }
        }
        return $data;
    }    
    function load_func($module, $func, $data = [])
    {
        if (is_dir('application/modules/'.$module))  // proveryaet, sushestvuet li modul
        {
            $this->CI->load->module($module, $data);
            $this->CI->$module->$func($data);
        }
        else
        {
            show_404('page');
        }
    }

    function load_controller($module, $contr)
    {
        // if (is_file('../modules/'.$module.'/controllers/'.$contr.'.php'))
        
        if (is_file('application/modules/'.$module.'/controllers/'.$contr.'.php'))
        {
            $this->CI->load->module($module.'/'.$contr);
            $this->CI->$contr->index($module);
        }
        else
        {
            show_404('page');
        }
    }
    function load_model($module, $model, $folder='')
    {
        $model.='_model';
        if ($folder) $folder.='/';
        if (is_file('application/modules/'.$module.'/models/'.$folder.$model.'.php'))
        {
            $this->CI->load->model($module.'/'.$folder.$model);
            $this->CI->$model->index($module);
        }
        else
        {
            show_404('page');
        }
    }


    
    
    /*function pub_func_exists($module, $method, $params = [])
    {   
        // Проверка на публичный метод

        $module = Modules::load([$module => $params]);
        $class = new ReflectionClass($module);
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $k => $v)
        {
            if($v->name == $method)
            {
                return $res = TRUE;
            }
            else
            {
                $res = FALSE;
            }
        }
        return $res;
        
    }*/


    function setup_settings($class_name)
    {
        $class = $class_name;
        $obj   = Modules::load($class);
        $settings = [
            'cname'     => $class,
            'mname'     => strtolower($class), // 'cabient' imya modulya
            'tag'       => strtoupper($class), // TAG v shablone
            'methods'   => get_class_methods($obj),
            'mdl'       => $class.'_mdl',
            'tpl'       => 'Tpl_default.tpl', // Используемый шаблон для текущего контроллера
            'tpl_path'  => 'templates/Tpl_default.tpl',
            'view_path' => strtolower($class).'/'.strtolower($class).'_view.php',
            'view'      => strtolower($class).'_view.php'
        ];
        return $settings;
    }

}