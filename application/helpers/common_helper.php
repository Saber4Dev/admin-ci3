<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_current_user_data'))
{
    // This function fetches the current user's data from the database
    function get_current_user_data($CI) {
        $CI->load->model('Users_model');
        $CI->load->library('session');

        $user_id = $CI->session->userdata('user_id');
        $user_data = $CI->Users_model->get_user_data($user_id);

        // Check if the user data is not empty
        if (!empty($user_data)) {
            // Check if the current user is an admin
            if ($user_data['is_admin'] == 1) {
                $user_data['is_admin'] = true;
            } else {
                $user_data['is_admin'] = false;
            }

            return $user_data;
        } else {
            return array();
        }
    }
}

if (!function_exists('check_login_status')) {
    // This function checks if the user is logged in
    function check_login_status($CI) {
        // Redirect to the login page if the user is not logged in
        if (!$CI->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }
}

if (!function_exists('load_common_views')) {
    function load_common_views($view_name, $data = array()) {

        // Get the current user's data
        $CI =& get_instance();
        $CI->load->helper('common_helper');
        $user_data = get_current_user_data($CI);

        // Add the user data to the $data array
        $data['user_data'] = $user_data;

        // Load the views with the data
        $CI->load->view('admin/templates/header', $data);
        $CI->load->view('admin/templates/sidebar', $data);
        $CI->load->view('admin/' . $view_name, $data);
        $CI->load->view('admin/templates/footer', $data);
    }
}

// Another helper function
function another_helper_function() {
    // Code for helper function
}

// End of file common_helper.php
