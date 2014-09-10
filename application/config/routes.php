<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "index";


$route['admin'] = "admin";//a

/////////////////////////////////////

$route['admin/addproduct'] = "admin_product/addproduct";//a
$route['admin/uploadProuctImg'] = "admin_product/uploadProuctImg";//p
$route['admin/addproductsubmit'] = "admin_product/addproductsubmit";//p
$route['admin/fetchproductType'] = "admin_product/fetchproductType";//p
$route['admin/deleteTempImg'] = "admin_product/deleteTempImg";//p

/////////////////////////////////////

$route['admin/typeproduct'] = "admin_type/typeproduct";//a
$route['admin/fetchmaintype'] = "admin_type/fetchmaintype";//p
$route['admin/insertmaintype'] = "admin_type/insertmaintype";//p
$route['admin/deletemaintype'] = "admin_type/deletemaintype";//p
$route['admin/fetchsubtype'] = "admin_type/fetchsubtype";//p
$route['admin/insertsubtype'] = "admin_type/insertsubtype";//p
$route['admin/deletesubtype'] = "admin_type/deletesubtype";//p

/////////////////////////////////////

$route['admin/boughtlist'] = "admin_boughtlist/index";//p
$route['admin/boughtverify'] = "admin_boughtlist/bought_verify";//p
$route['admin/basket_detail'] = "admin_boughtlist/basket_detail";//p

/////////////////////////////////////

$route['admin/member'] = "admin_member/index";//p
$route['admin/memberfetchdetail'] = "admin_member/memeberdetail";//p
$route['admin/editmember'] = "admin_member/editmember";//p
$route['admin/deletemember'] = "admin_member/deletemember";//p

/////////////////////////////////////

$route['admin/productmanage'] = "admin_productmanage/index";//p
$route['admin/fetchproductdata'] = "admin_productmanage/fetchproductdata";//p
$route['admin/deleteImgInStore'] = "admin_productmanage/deleteImgInStore";//p

/////////////////////////////////////

$route['product/menu/main'] = "product/fetchMain";
$route['product/menu/sub/(:any)'] = "product/fetchsub/$1";
$route['product/(:any)'] = "product/index/$1";
$route['product/(:any)/(:any)'] = "product/index/$1/$2";
$route['product/search'] = "product/fetchProductWithWord";


$route['boughtlist/basketdetail'] = "boughtlist/basket_detail";


$route['basket/basket'] = "basket/index";
$route['basket/inbasket'] = "basket/inbasket";
$route['basket/deleteiteminbasket'] = "basket/delete_item_in_basket";


$route['takeitem'] = "takeitem/index";
$route['takeitem/itemlist'] = "takeitem/itemlist";
$route['takeitem/boughtit'] = "takeitem/bought_it";
$route['takeitem/towaitinglist'] = "takeitem/to_waiting_list";


$route['regisform'] = "register";
$route['regis'] = "register/regis";//p
$route['login'] = "register/login";//p
$route['destroy'] = "register/destroysession";//p


$route['welcome'] = "welcome";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */