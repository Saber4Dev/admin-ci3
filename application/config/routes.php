<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'admin';
$route['404_override'] = 'admin/Error404';
$route['translate_uri_dashes'] = FALSE;

// Admin routes
$route['admin'] = 'admin/index';
$route['admin/register'] = 'admin/register';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/profile'] = 'admin/profile'; 


// User routes
$route['user'] = 'User';
$route['admin/user/clients'] = 'user/clients'; 

