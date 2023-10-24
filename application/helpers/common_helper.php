<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('load_common_views')) {
    function load_common_views($view_name, $data = array())
    {
        $CI =& get_instance();

        // Check if the user is logged in
        if ($CI->session->userdata('logged_in')) {
            $CI->load->model('users_model');
            $user_id = $CI->session->userdata('user_id');
            
            // Load the user's data
            $data['user_data'] = $CI->users_model->get_user_by_id($user_id);
            
            // Define the $user variable for use in views
            $data['user'] = $data['user_data'];
            
            // Load the is_admin variable
            $data['is_admin'] = $CI->users_model->is_admin($user_id); // Assuming you have an is_admin method in your Users_model
        } else {
            // Define default values if the user is not logged in
            $data['user_data'] = null;
            $data['user'] = null;
            $data['is_admin'] = false;
        }

        $CI->load->view('templates/header', $data);
        $CI->load->view('templates/sidebar', $data);
        $CI->load->view('admin/' . $view_name, $data);
        $CI->load->view('templates/footer', $data);
    }
}

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

if (!function_exists('get_progress_bar_color')) {
  function get_progress_bar_color($proficiency_level) {
      if ($proficiency_level >= 90) {
          return 'progress-bar-success';
      } elseif ($proficiency_level >= 70) {
          return 'progress-bar-primary';
      } elseif ($proficiency_level >= 50) {
          return 'progress-bar-warning';
      } else {
          return 'progress-bar-danger';
      }
  }
}

// function upload_photo($file_input_name, $upload_directory, $allowed_types = 'gif|jpg|jpeg|png', $max_size = 1024) {
//     $CI =& get_instance();

//     // Define the upload configuration
//     $config['upload_path'] = $upload_directory;
//     $config['allowed_types'] = $allowed_types;
//     $config['max_size'] = $max_size;
//     $config['file_name'] = $_FILES[$file_input_name]['name']; // Use the original file name
//     $config['overwrite'] = TRUE;

//     $CI->load->library('upload', $config);

//     if (!$CI->upload->do_upload($file_input_name)) {
//         $error = $CI->upload->display_errors();
//         log_message('error', 'File upload error: ' . $error);
//         return false;
//     } else {
//         $upload_data = $CI->upload->data();
//         return $upload_data['file_name']; // Return the uploaded file name
//     }
// }
