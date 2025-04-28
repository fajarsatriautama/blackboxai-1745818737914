<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route for single post (artikel)
$route['artikel/(:num)'] = 'pages/single_post/$1';

// Admin routes
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/add_slider'] = 'admin/add_slider';
$route['admin/delete_slider/(:num)'] = 'admin/delete_slider/$1';
$route['admin/add_youtube'] = 'admin/add_youtube';
$route['admin/delete_youtube/(:num)'] = 'admin/delete_youtube/$1';
$route['admin/add_artikel'] = 'admin/add_artikel';
$route['admin/delete_artikel/(:num)'] = 'admin/delete_artikel/$1';

// Anggota (member) routes
$route['anggota'] = 'anggota/dashboard';
$route['anggota/dashboard'] = 'anggota/dashboard';
$route['anggota/add_artikel'] = 'anggota/add_artikel';
$route['anggota/delete_artikel/(:num)'] = 'anggota/delete_artikel/$1';
$route['anggota/edit_profile'] = 'anggota/edit_profile';

// Auth routes
$route['auth/admin_login'] = 'auth/admin_login';
$route['auth/anggota_login'] = 'auth/anggota_login';
$route['auth/register'] = 'auth/register';
$route['auth/logout'] = 'auth/logout';

// Login pages
$route['admin_login'] = 'auth/admin_login';
$route['anggota_login'] = 'auth/anggota_login';
$route['register'] = 'auth/register';
?>
