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

//Front End Route
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin login
$route['admin']             = 'admin/login';
$route['admin_login_check'] = 'admin/admin_login_check';
$route['logout']            = 'admin/logout';

//Admin Panel Route
$route['dashboard']            = 'admin/index';
$route['manage/order']         = 'manageorder/manage_order';
$route['order/details/(:num)'] = 'manageorder/order_details/$1';

//Web Route
$route['product']             = 'web/product';
$route['single/(:num)']       = 'web/single/$1';
$route['contact']             = 'web/contact';
$route['cart']                = 'web/cart';
$route['save/cart']           = 'web/save_cart';
$route['update/cart']         = 'web/update_cart';
$route['remove/cart']         = 'web/remove_cart';
$route['user_form']           = 'web/user_form';
$route['get/category/(:num)'] = 'web/category_post/$1';

$route['search']              = 'web/search';
$route['customer/register']   = 'web/customer_register';
$route['customer/login']      = 'web/customer_login';
$route['customer/logout']     = 'web/logout';
$route['customer/logincheck'] = 'web/customer_logincheck';
$route['customer/save']       = 'web/customer_save';
$route['register/success']    = 'web/register_success';

$route['checkout']                       = 'web/checkout';
$route['payment']                        = 'web/payment';
$route['save/order']                     = 'web/save_order';
$route['check_email']                    = 'web/check_email';

//Category  Route List
$route['add/category']                = 'category/add_category';
$route['manage/category']             = 'category/manage_category';
$route['save/category']               = 'category/save_category';
$route['delete/category/(:num)']      = 'category/delete_category/$1';
$route['edit/category/(:num)']        = 'category/edit_category/$1';
$route['update/category/(:num)']      = 'category/update_category/$1';
$route['published/category/(:num)']   = 'category/published_category/$1';
$route['unpublished/category/(:num)'] = 'category/unpublished_category/$1';

//Brand  Route List
$route['add/brand']                = 'brand/add_brand';
$route['manage/brand']             = 'brand/manage_brand';
$route['save/brand']               = 'brand/save_brand';
$route['delete/brand/(:num)']      = 'brand/delete_brand/$1';
$route['edit/brand/(:num)']        = 'brand/edit_brand/$1';
$route['update/brand/(:num)']      = 'brand/update_brand/$1';
$route['published/brand/(:num)']   = 'brand/published_brand/$1';
$route['unpublished/brand/(:num)'] = 'brand/unpublished_brand/$1';

//Post Route List
$route['add/product']                = 'product/add_product';
$route['manage/product']             = 'product/manage_product';
$route['save/product']               = 'product/save_product';
$route['delete/product/(:num)']      = 'product/delete_product/$1';
$route['edit/product/(:num)']        = 'product/edit_product/$1';
$route['update/product/(:num)']      = 'product/update_product/$1';
$route['published/product/(:num)']   = 'product/published_product/$1';
$route['unpublished/product/(:num)'] = 'product/unpublished_product/$1';