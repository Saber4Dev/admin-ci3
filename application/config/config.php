<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['base_url'] = 'https://dashboard.saberea.com/'; //'http://localhost/';  // Replace with your base URL

$config['index_page'] = ''; // Remove index.php from URL

$config['uri_protocol'] = 'REQUEST_URI';

$config['url_suffix'] = '';

$config['language'] = 'english';

$config['charset'] = 'UTF-8';

$config['enable_hooks'] = FALSE;

$config['subclass_prefix'] = 'MY_';

$config['composer_autoload'] = FALSE;

$config['permitted_uri_chars'] = 'a-z 0-9~%.:_-';

$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['allow_get_array'] = TRUE;

$config['log_threshold'] = 2;

$config['log_path'] = ''; // Set path for log files

$config['log_file_extension'] = '';

$config['log_file_permissions'] = 0644;

$config['log_date_format'] = 'Y-m-d H:i:s';

$config['error_views_path'] = ''; // Set path for error views

$config['cache_path'] = ''; // Set path for cache files

$config['cache_query_string'] = FALSE;

$config['encryption_key'] = ''; // Set your encryption key

$config['sess_driver'] = 'files'; // Session driver
$config['sess_cookie_name'] = 'ci_session'; // Session cookie name
$config['sess_expiration'] = 7200; // Session expiration time in seconds
$config['sess_save_path'] = APPPATH . 'session';
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300; // Time interval to update session time in seconds
$config['sess_regenerate_destroy'] = FALSE;




$config['cookie_prefix'] = '';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = FALSE;
$config['cookie_httponly'] = FALSE;

$config['standardize_newlines'] = FALSE;

$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200; // CSRF token expiration time in seconds
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

$config['compress_output'] = FALSE;

$config['time_reference'] = 'local';

$config['rewrite_short_tags'] = FALSE;

// $config['upload_path'] = '/home/pixecbiw/dashboard.saberea.com/assets/img/';
