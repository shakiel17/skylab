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
|	https://codeigniter.com/userguide3/general/routing.html
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
//===================Rider Module===================
$route['save_plateno'] = 'pages/save_plateno';
$route['save_rider_license'] = 'pages/save_rider_license';
$route['change_rider_status/(:any)/(:any)'] = 'pages/change_rider_status/$1/$2';
$route['update_rider_account'] = 'pages/update_rider_account';
$route['save_rider_profile'] = 'pages/save_rider_profile';
$route['complete_booking'] = 'pages/complete_booking';
$route['cancel_rider_booking'] = 'pages/cancel_rider_booking';
$route['confirm_rider_booking'] = 'pages/confirm_rider_booking';
$route['rider_booking'] = 'pages/rider_booking';
$route['rider_logout'] = 'pages/rider_logout';
$route['rider_main'] = 'pages/rider_main';
$route['rider_authentication'] = 'pages/rider_authentication';
$route['save_rider_account'] = 'pages/save_rider_account';
$route['register_rider'] = 'pages/register_rider';
//===================Rider Module===================
//===================User Module====================
$route['delete_reviews/(:any)'] = 'pages/delete_reviews/$1';
$route['save_reviews'] = 'pages/save_reviews';
$route['user_reviews'] = 'pages/user_reviews';
$route['cancel_user_booking'] = 'pages/cancel_user_booking';
$route['save_booking'] = 'pages/save_booking';
$route['add_booking/(:any)'] = 'pages/add_booking/$1';
$route['user_booking'] = 'pages/user_booking';
$route['save_user_profile'] = 'pages/save_user_profile';
$route['save_user_account'] = 'pages/save_user_account';
$route['save_valid_id'] = 'pages/save_valid_id';
$route['user_profile'] = 'pages/user_profile';
$route['user_logout'] = 'pages/user_logout';
$route['user_main'] = 'pages/user_main';
$route['user_authentication'] = 'pages/user_authentication';
$route['save_user'] = 'pages/save_user';
$route['register_user'] = 'pages/register_user';
//===================User Module====================
//===================Admin Module====================
$route['view_commuter_profile/(:any)'] = 'pages/view_commuter_profile/$1';
$route['view_reviews/(:any)'] = 'pages/view_reviews/$1';
$route['manage_booking'] = 'pages/manage_booking';
$route['manage_commuter'] = 'pages/manage_commuter';
$route['view_license_image/(:any)'] = 'pages/view_license_image/$1';
$route['save_license'] = 'pages/save_license';
$route['delete_rider/(:any)'] = 'pages/delete_rider/$1';
$route['save_rider'] = 'pages/save_rider';
$route['manage_rider'] = 'pages/manage_rider';
$route['admin_logout'] = 'pages/admin_logout';
$route['admin_main'] = 'pages/admin_main';
$route['admin_authentication'] = 'pages/admin_authentication';
//===================Admin Module====================
$route['rider'] = 'pages/rider';
$route['admin'] = 'pages/admin';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
