<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = "v1/auth/Home";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cpanel'] = 'v1/cpanel';
$route['auth'] = 'v1/auth/login';
//$route['account'] = 'account/login';
//$route['([a-z]+)'] = 'store/user/$1'; // kios27.com/[username]
//$route['([a-z]+)/(:any)/'] = 'products/preview/$2';  // kios27.com/[username]/[nama_produk]
//$route['([a-z]+)/shoping_cart/(:any)'] = 'shoping_cart'; // kios27.com/[username]/shoping_cart
//$route['([a-z]+)/([a-z]+)/([a-z]+)/(:any)'] = '$2/$3/$4/$1'; // kios27.com/[username]/[controller]/[method]/[param1]

