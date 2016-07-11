<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'goods/eyestoppers/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['main/([a-zA-Z]+)'] = 'main/index/$1';
$route['main/index/([a-zA-Z]+)'] = 'main/index/$1';

$route['goods/eyestoppers']                    = 'goods/eyestoppers';
$route['goods/([a-zA-Z]+)']                    = 'goods/category_goods/$1';
$route['goods/([a-zA-Z]+)/page']               = 'goods/category_goods/$1';
$route['goods/([a-zA-Z]+)/page/(:num)']        = 'goods/category_goods/$1/$2';
/*$route['goods/([a-zA-Z]+)/page/(:num)']        = function($cat, $pagi)
{
    return  "goods/{$cat}/{$pagi}";
};*/

$route['goods/([a-zA-Z]+)/(:num)']             = 'goods/single_good/$1/$2';
$route['goods/([a-zA-Z]+)/(:num)/page']        = 'goods/single_good/$1/$2';
$route['goods/([a-zA-Z]+)/(:num)/page/(:num)'] = 'goods/single_good/$1/$2/$3';

$route['registration'] = 'users/registration_load_tpl';
//$route['goods/index'] = 'goods/index/';
//$route['goods/view_category/(:any)'] = 'goods/category/$1';