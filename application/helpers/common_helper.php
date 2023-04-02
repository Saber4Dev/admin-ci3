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


// function generate_breadcrumb($view_name = '') {
//     $CI =& get_instance();
//     $uri = $CI->uri->segment_array();
//     $url = '';
  
//     $breadcrumb = '<li><a href="'.base_url().'"><i class="fa fa-home"></i> Home</a></li>';
  
//     foreach ($uri as $key => $value) {
//       $url .= $value.'/';
//       $breadcrumb .= '<li><a href="'.base_url().$url.'">'.$value.'</a></li>';
//     }
  
//     $h1 = $view_name ? $view_name : end($uri);
  
//     return '<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Home</a></li>
//             '.$breadcrumb.'
//             <li class="active">'.$h1.'</li>';
// }

function generate_breadcrumb() {
    $CI =& get_instance();
    $uri = $CI->uri->segment_array();
    $url = '';
  
    $breadcrumb = '<li><a href="'.base_url().'"><i class="fa fa-home"></i> Home</a></li>';
  
    // Exclude the first and last elements of the $uri array
    $segments_to_exclude = [0, count($uri) - 1];
    $filtered_uri = array_filter($uri, function($k) use ($segments_to_exclude) {
      return !in_array($k, $segments_to_exclude);
    }, ARRAY_FILTER_USE_KEY);
  
    foreach ($filtered_uri as $key => $value) {
      $url .= $value.'/';
      $breadcrumb .= '<li><a href="'.base_url().$url.'">'.$value.'</a></li>';
    }
  
    return $breadcrumb;
  }