<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'kasir';
$route['kasirLogin'] = 'kasir/login';
$route['login'] = 'kasir/login';
$route['kasirHome'] = 'kasir/kasirHome';
$route['kasirRecord'] = 'kasir/kasirRecord';
$route['akunEdit'] = 'kasir/akunEdit';
$route['kasirBeli'] = 'kasir/kasirBeli';
$route['kasirDetail/(:any)'] = 'kasir/kasirDetail/$1';
$route['rekapStok'] = 'kasir/rekapStok';
$route['detailStok/(:any)'] = 'kasir/detailStok/$1';
$route['createStok'] = 'kasir/createStok';
$route['kasirLogout'] = 'kasir/kasirLogout';

$route['adminLogin'] = 'kasir/login';
$route['adminHome'] = 'admin/adminHome';
$route['adminRecord'] = 'admin/adminRecord';
$route['adminstok'] = 'admin/adminstok';
$route['adminEdit'] = 'admin/adminEdit';
$route['adminLogout'] = 'admin/adminLogout';
$route['rekapUser'] = 'admin/rekapUser';
$route['createUser'] = 'admin/createUser';
$route['editUser/(:any)'] = 'admin/editUser/$1';
$route['deleteUser/(:any)'] = 'admin/deleteUser/$1';
$route['cetak'] = 'admin/cetak';
$route['cetak2'] = 'admin/cetak2';

$route['404_override'] = 'welcome';
$route['translate_uri_dashes'] = FALSE;
