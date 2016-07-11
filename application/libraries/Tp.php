<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tp{

	public $D, $tpl;


	function __construct()
	{

		$this->D=array();
		$this->CI =& get_instance();
        //отладка и оптимизация
        //$this->CI->output->enable_profiler(TRUE);
	}
	
	function load_tpl($tpl_name)
	{
		$TPL     = $this->CI->load->view('templates/'.$tpl_name, FALSE, TRUE);
		$modules = $this->CI->load->get_var('modules'); // Массив разрешенных подмодулей, для текущего контроллера

		$pattern = '/{[A-Z0-9_]+}/';
		$pattern2 = '/{[a-z_]+}/';
		preg_match_all($pattern, $TPL, $MODULES); // nahodit metki na shaplony
		preg_match_all($pattern2, $TPL, $VALUES); // nahodit metki na peremennye
		foreach ($MODULES[0] as $MODULE)
		{
			$TAG = substr($MODULE,1,-1);
			$tag = strtolower($TAG);

			if (!isset($this->D[$TAG]) and in_array($tag, $modules))
			{
				$this->D[$TAG]='';
				$this->CI->common->load_module($tag);
			}else{
				$this->D[$TAG]='';
			}
			/*
			if (!empty($modules) and isset($modules)){
				if (!isset($this->D[$TAG]) and in_array($tag, $modules))
				{
					$this->D[$TAG]='';
					$this->CI->common->load_module($tag);
				}else{
					$this->D[$TAG]='';
				}
			}else{
				if (!isset($this->D[$TAG]))
				{
					$this->D[$TAG]='';
					$this->CI->common->load_module($tag);
				}
				else{
					$this->D[$TAG]='';
				}
			}
			*/
			/*
			elseif(!isset($this->D[$module])) {
				$this->D[$module] = '';
				$this->CI->common->load_module(strtolower($module));
			}
			*/
		}
		
		/*
		foreach ($VALUES[0] as $VALUE)
		{
			$value=substr($VALUE,1,-1);
			if (!isset($this->D[$value]))
			{
				$this->D[$value]='';
			}
		}
		*/
		$this->D['TPL']=$tpl_name;
	}
	function print_page()
	{

		$this->CI->parser->parse('templates/'.$this->D['TPL'], $this->D);
	}

	function add_tpl_data($tpl, $data){

		$this->CI->load->view('templates/'.$tpl, $data, TRUE);
	}

	function parse($label, $tpl)
	{
		$TPL=$this->CI->load->view($tpl, FALSE, TRUE);
		$pattern = '/{[A-Za-z0-9_]+}/';
		preg_match_all($pattern, $TPL, $MODULES); // nahodit metki v shaplone
		foreach ($MODULES[0] as $MODULE)
		{
			$module=substr($MODULE,1,-1);
			if (!isset($this->D[$module])) $this->D[$module]=$this->lang->line($module); // esli oni ne opredeleny, to smotrit v langs
		}
		if (isset($this->D[$label]))
		{
			$this->D[$label].=$this->CI->parser->parse($tpl, $this->D, TRUE);
		}
		else
		{
			$this->D[$label]=$this->CI->parser->parse($tpl, $this->D, TRUE);
		}
	}


	

	function mycall($module, $func = '', $params = array())
	{
		if(empty($func)) $func = 'index';

		$obj = Modules::load($module);

		return call_user_func_array(array($obj, $func), $params);
	}



	function view($label, $view, $data)
	{
		$this->D[$label] = $this->CI->load->view($view, $data, TRUE);
		// написать return $this->D[$label];
	}




	function clear($label)
	{
		$this->D[$label]='';
	}

	function kill($label)
	{
		unset($this->D[$label]);
	}

	function assign($label, $value='')
	{
		if (is_array($label))
		{
			foreach ($label as $l=>$v)
			{
				$this->D[$l]=$v;
			}
		}
		else
			$this->D[$label]=$value;
	}

	function megaassign($label, $value)
	{
		if (isset($this->D[$label])) $this->D[$label].=$value;
		else $this->D[$label]=$value;
	}

	function get_value($table, $col, $id)
	{
		$q='SELECT `'.$col.'` FROM `'.$table.'` WHERE id=\''.$id.'\' LIMIT 1';
		$r=mysql_query($q);
		if (mysql_num_rows($r))
		{
			$row=mysql_fetch_array($r);
			return $row[$col];
		}
		else
		{
			return '';
		}
	}

	function get_count($table, $col, $id)
	{
		$q='SELECT count(id) as c FROM `'.$table.'` WHERE `'.$col.'`=\''.$id.'\'';
		$r=mysql_query($q);
		if (mysql_num_rows($r))
		{
			$row=mysql_fetch_array($r);
			return $row['c'];
		}
		else
		{
			return '0';
		}
	}
	function my_echo($str_or_arr)
	{
		if(is_array($str_or_arr))
		{
			echo "<pre>";
			print_r($str_or_arr);
			echo "</pre>";
		}
		elseif(is_string($str_or_arr))
		{
			echo "<pre>";
			echo $str_or_arr;
			echo "</pre>";
		}

	}

	function print_array($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	function show_msg($msg, $class='msg_error', $label='MSG')
	{
		$this->megaassign($label, '<div class="'.$class.'">'.$msg.'</div>');
	}

	function content($label)
	{
		$r=false;
		if (isset($this->D[$label]))
		{
			if ($this->D[$label]) $r=$this->D[$label];
		}
		return $r;
	}
}

