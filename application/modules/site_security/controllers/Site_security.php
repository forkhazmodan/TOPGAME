

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_security extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }

    function _make_sure_is_admin()
    {
        $is_admin = TRUE;

        if($is_admin != TRUE )
        {
            redirect('site_security/not_allowed');
        }

    }

    function not_allowed()
    {
        echo "You are not allowed to be here";
    }

    function _make_sure_is_user()
    {
        $is_user = TRUE;

        if($is_user != TRUE )
        {
            redirect('site_security/not_allowed');
        }

    }
}