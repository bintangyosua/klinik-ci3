<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth
$route['auth/register'] = 'auth/register';
$route['auth/regist'] = 'auth/regist';
$route['auth/login'] = 'auth/login';
$route['auth/signin'] = 'auth/signin';
$route['auth/logout'] = 'auth/logout';

// ========================== Pasien ==========================
$route['pasien/create'] = 'pasien/create';
$route['pasien/add'] = 'pasien/add';
$route['pasien/edit/(:num)'] = 'pasien/edit/$1';
$route['pasien/update'] = 'pasien/update';
$route['pasien/delete'] = 'pasien/delete';

// ========================== Dokter ==========================
$route['dokter/create'] = 'dokter/create';
$route['dokter/add'] = 'dokter/add';
$route['dokter/edit/(:num)'] = 'dokter/edit/$1';
$route['dokter/update'] = 'dokter/update';
$route['dokter/delete'] = 'dokter/delete';

// ========================== Kunjungan ==========================
$route['kunjungan/create'] = 'kunjungan/create';
$route['kunjungan/add'] = 'kunjungan/add';
$route['kunjungan/edit/(:num)'] = 'kunjungan/edit/$1';
$route['kunjungan/update'] = 'kunjungan/update';
$route['kunjungan/delete'] = 'kunjungan/delete';

// ========================== Poli ==========================
$route['poli/create'] = 'poli/create';
$route['poli/add'] = 'poli/add';
$route['poli/edit/(:num)'] = 'poli/edit/$1';
$route['poli/update'] = 'poli/update';
$route['poli/delete'] = 'poli/delete';
