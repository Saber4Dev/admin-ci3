<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'admin/dashboard';
$route['404_override'] = 'errors/page404';
$route['translate_uri_dashes'] = FALSE;

// Authentication routes
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/logout'] = 'auth/logout';

// Admin routes
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';

$route['admin/users'] = 'user/users'; 
$route['admin/users/user_list'] = 'user/user_list';
$route['admin/users/user_activity'] = 'user/user_activity';
$route['user/update_user/(:num)'] = 'user/update_user/$1';
$route['user/change_password/(:num)'] = 'user/change_password/$1';
$route['user/update_avatar/(:num)'] = 'user/update_avatar/$1';
$route['user/update_admin_role_status/(:num)'] = 'user/update_admin_role_status/$1';

$route['admin/profile'] = 'admin/profile';

// Routes for the user actions
$route['admin/persons/person_list'] = 'person/persons';


// Route for the person profile
$route['persons/person_profile/(:num)'] = 'person/profile/$1';

$route['persons/add_person'] = 'person/add_person';
$route['person/update_person/(:any)'] = 'person/update_person/$1';
$route['person/modify_person/(:any)'] = 'person/modify_person/$1';
$route['person/delete_person/(:any)'] = 'person/delete_person/$1';

// Route for experience data
$route['person_manager/add_experience/(:num)'] = 'person/add_experience/$1';
$route['person_manager/update_experience/(:num)/(:num)'] = 'person/update_experience/$1/$2';

// Route for education data
$route['person_manager/add_education/(:num)'] = 'person_manager/add_education/$1';
$route['person_manager/update_education/(:num)/(:num)'] = 'person_manager/update_education/$1/$2';


// Route for skills data
$route['person_manager/add_skill/(:num)'] = 'person_manager/add_skill/$1';
$route['person_manager/update_skill/(:num)/(:num)'] = 'person_manager/update_skill/$1/$2';


// Route for project data
$route['person_project/add_project/(:num)'] = 'person_project/add_project/$1';
$route['person_project/update_project/(:num)/(:num)'] = 'person_project/update_project/$1/$2';
$route['person_project/delete_project/(:num)'] = 'person_project/delete_project/$1';
$route['person_project/get_project_by_id/(:any)'] = 'person_project/get_project_by_id/$1';


// Routes for managing Services data
$route['person_manager/add_service/(:num)'] = 'person_manager/add_service/$1';
$route['person_manager/update_service/(:num)/(:num)'] = 'person_manager/update_service/$1/$2';
$route['person_manager/delete_service/(:num)'] = 'person_manager/delete_service/$1';

// Routes for managing ServicesPlan data
$route['person_manager/add_service_plan/(:num)'] = 'person_manager/add_service_plan/$1';
$route['person_manager/update_service_plan/(:num)/(:num)'] = 'person_manager/update_service_plan/$1/$2';
$route['person_manager/delete_service_plan/(:num)'] = 'person_manager/delete_service_plan/$1';

// Routes for managing Testimonials data
$route['person_manager/add_testimonial/(:num)'] = 'person_manager/add_testimonial/$1';
$route['person_manager/update_testimonial/(:num)/(:num)'] = 'person_manager/update_testimonial/$1/$2';
$route['person_manager/delete_testimonial/(:num)'] = 'person_manager/delete_testimonial/$1';





