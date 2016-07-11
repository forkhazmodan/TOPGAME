

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Templates extends MX_Controller
{
    private $default_tpl = 'public_default';
    private $info_tpl    = 'public_info';
    private $admin_tpl   = 'admin';

    function __construct()
    {
        parent::__construct();
    }
    function default_tpl($data)
    {
        $this->load->view($this->default_tpl, $data);
    }
    

}