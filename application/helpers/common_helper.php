<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('load_common_views')) {
    function load_common_views($view_name, $data = array()) {
        $CI =& get_instance();
        $CI->load->model('users_model');
        $user_id = $CI->session->userdata('user_id');
        $user_data = $CI->users_model->get_user_by_id($user_id);
        $data['user_data'] = $user_data;
        $CI->load->view('templates/header', $data);
        $CI->load->view('templates/sidebar', $data);
        $CI->load->view('admin/' . $view_name, $data);
        $CI->load->view('templates/footer', $data);
    }
}

