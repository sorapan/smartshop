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
//$route['admin'] = "admin_boughtchecker/index";//a

///////////////////////////////////// admin_product

$route['admin/addproduct'] = "admin_product/addproduct";//a
$route['admin/uploadProuctImg'] = "admin_product/uploadProuctImg";//p
$route['admin/addproductsubmit'] = "admin_product/addproductsubmit";//p
$route['admin/fetchproductType'] = "admin_product/fetchproductType";//p
$route['admin/deleteTempImg'] = "admin_product/deleteTempImg";//p

///////////////////////////////////// admin_type

$route['admin/typeproduct'] = "admin_type/typeproduct";//a
$route['admin/fetchmaintype'] = "admin_type/fetchmaintype";//p
$route['admin/insertmaintype'] = "admin_type/insertmaintype";//p
$route['admin/deletemaintype'] = "admin_type/deletemaintype";//p
$route['admin/fetchsubtype'] = "admin_type/fetchsubtype";//p
$route['admin/insertsubtype'] = "admin_type/insertsubtype";//p
$route['admin/deletesubtype'] = "admin_type/deletesubtype";//p

///////////////////////////////////// admin_boughtlist

$route['admin/boughtlist'] = "admin_boughtlist/index";//p
$route['admin/boughtverify'] = "admin_boughtlist/bought_verify";//p
$route['admin/basket_detail'] = "admin_boughtlist/basket_detail";//p

///////////////////////////////////// admin_member

$route['admin/member'] = "admin_member/index";//p
$route['admin/memberfetchdetail'] = "admin_member/memeberdetail";//p
$route['admin/editmember'] = "admin_member/editmember";//p
$route['admin/deletemember'] = "admin_member/deletemember";//p

///////////////////////////////////// admin_productmanage

$route['admin/productmanage'] = "admin_productmanage/index";//p
$route['admin/fetchproductdata'] = "admin_productmanage/fetchproductdata";//p
$route['admin/deleteImgInStore'] = "admin_productmanage/deleteImgInStore";//p
$route['admin/updateproduct'] = "admin_productmanage/updateproduct";//p
$route['admin/buyingtoggle'] = "admin_productmanage/buyingtoggle";//p
$route['admin/deleteproduct'] = "admin_productmanage/deleteproduct";//p

///////////////////////////////////// admin_promotion

$route['admin/promotion'] = "admin_promotion/index";//p
$route['admin/fetchproductdataforpromotion'] = "admin_promotion/fetchproductdataforpromotion";//p
$route['admin/search'] = "admin_promotion/fetchproductbyword";//p
$route['admin/addpromotion'] = "admin_promotion/addpromotion";//p
$route['admin/promotion/(:any)'] = "admin_promotion/index/$1";
$route['admin/promotion/(:any)/(:any)'] = "admin_promotion/index/$1/$2";

/////////////////////////////////////

$route['admin/blog'] = "admin_blog/index";
$route['admin/submitContent'] = "admin_blog/submitContent";

/////////////////////////////////////

$route['admin/howtobuy'] = "admin_howtobuy/index";
$route['admin/howtobuysubmitContent'] = "admin_howtobuy/submitContent";

/////////////////////////////////////

$route['admin/aboutme'] = "admin_aboutme/index";
$route['admin/aboutmesubmitContent'] = "admin_aboutme/submitContent";
$route['admin/bloguploadimg'] = "admin_aboutme/bloguploadimg";
$route['admin/fetchblogimg'] = "admin_aboutme/fetchBlogImg";
$route['admin/deleteBlogImg'] = "admin_aboutme/deleteBlogImg";

/////////////////////////////////////

$route['admin/boughtchecker'] = "admin_boughtchecker/index";
$route['admin/deleteboughtlist'] = "admin_boughtchecker/deleteboughtlist";

/////////////////////////////////////

$route['admin/warranty'] = "admin_warranty/index";
$route['admin/addwarrantylist'] = "admin_warranty/addwarrantylist";
$route['admin/updateStatus'] = "admin_warranty/updateStatus";
$route['admin/deleteList'] = "admin_warranty/deleteList";
$route['admin/searchData'] = "admin_warranty/searchData";

/////////////////////////////////////

$route['admin/download'] = "admin_download/index";
$route['admin/uploadfile'] = "admin_download/uploadfile";
$route['admin/deletefile'] = "admin_download/deletefile";

/////////////////////////////////////

$route['admin/message'] = "admin_message/index";
$route['admin/fetchmessage'] = "admin_message/fetchmessage";
$route['admin/adminreply'] = "admin_message/adminreply";

/////////////////////////////////////

$route['admin/profit'] = "admin_profit/index";
$route['admin/selectdata'] = "admin_profit/selectdata";
$route['admin/selectpromotiondata'] = "admin_profit/select_promotion_data";

/////////////////////////////////////

$route['admin/managepromotion'] = "admin_managepromotion/index";
$route['admin/deletepromotion'] = "admin_managepromotion/deletepromotion";

/////////////////////////////////////

$route['product/menu/main'] = "product/fetchMain";
$route['product/menu/sub/(:any)'] = "product/fetchsub/$1";
$route['product/(:any)'] = "product/index/$1";
$route['product/(:any)/(:any)'] = "product/index/$1/$2";
$route['product/search'] = "product/fetchProductWithWord";

//===========================================

$route['promotion'] = "promotion/index";
$route['promotion/buypromotion'] = "promotion/buy_promotion";
$route['promotion/buypromotionnonmember'] = "promotion/buy_promotion_nonmember";

//===========================================

$route['boughtlist/basketdetail'] = "boughtlist/basket_detail";

$route['basket/basket'] = "basket/index";
$route['basket/basketnonmember'] = "basket/basket_nonmember";
$route['basket/inbasket'] = "basket/inbasket";
$route['basket/inbasketnonmember'] = "basket/inbasket_nonmember";
$route['basket/deleteiteminbasket'] = "basket/delete_item_in_basket";
$route['basket/deleteiteminbasketpromotion'] = "basket/delete_item_in_basket_promotion";
$route['basket/deleteiteminbasketnonmember'] = "basket/delete_item_in_basket_nonmember";
$route['basket/deleteiteminbasketpromotionnonmember'] = "basket/delete_item_in_basket_promotion_nonmember";
$route['basket/checknonmemberbought'] = "basket/check_non_member_bought";
$route['basket/productdetail'] = "basket/product_detail";


$route['takeitem'] = "takeitem/index";
$route['takeitem/itemlist'] = "takeitem/itemlist";
$route['takeitem/boughtit'] = "takeitem/bought_it";
$route['takeitem/towaitinglist'] = "takeitem/to_waiting_list";
$route['takeitem/takeitem_nonmember'] = "takeitem/takeitem_nonmember";
$route['takeitem/boughtcancel'] = "takeitem/bought_cancel";


$route['regisform'] = "register";
$route['regis'] = "register/regis";//p
$route['login'] = "register/login";//p
$route['destroy'] = "register/destroysession";//p
$route['signin'] = "register/signin";//p

$route['howtobuy'] = "howtobuy/index";

$route['aboutme'] = "aboutme/index";

$route['warranty'] = "warranty/index";
$route['warranty/addwarrantylist'] = "warranty/addwarrantylist";
$route['warranty/updateStatus'] = "warranty/updateStatus";
$route['warranty/deleteList'] = "warranty/deleteList";
$route['warranty/searchData'] = "warranty/searchData";

$route['download'] = "download/index";
$route['download/downloadfile/(:any)'] = "download/downloadfile/$1";

$route['message'] = "message/index";
$route['message/send'] = "message/sendmessage";

$route['welcome'] = "welcome";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */