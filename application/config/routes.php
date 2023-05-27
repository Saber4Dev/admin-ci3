<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'errors/page404';
$route['translate_uri_dashes'] = FALSE;

// Authentication routes
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/logout'] = 'auth/logout';

// Admin routes
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/users'] = 'admin/users';
$route['admin/profile'] = 'admin/profile';

// Routes for the user actions
$route['admin/user/clients'] = 'client/clients';

// Route for the client profile
$route['user/client_profile/(:num)'] = 'client/profile/$1';

