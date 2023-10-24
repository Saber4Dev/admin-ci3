<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model'); 
        $this->load->model('Users_model'); 
        $this->load->helper('common_helper');
        $this->load->library('session');
        
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
    
    public function dashboard() {
        $user_id = $this->session->userdata('user_id');
        $user = $this->Users_model->get_user_by_id($user_id);
        $is_admin = $user['is_admin']; // Get the is_admin value

        $data['user'] = $user;
        $data['is_admin'] = $is_admin; // Pass is_admin to the view
        
        $data['title'] = 'Dashboard';

        // // Check the directory's accessibility
        // $imageDirectory = '/home/pixecbiw/saberea.com/assets/img/';
        // if (is_dir($imageDirectory)) {
        //     $directory_status = "The directory exists and is accessible.";
        //     // Log the success message
        //     log_message('debug', $directory_status);
        // } else {
        //     $directory_status = "The directory does not exist or is not accessible.";
        //     log_message('error', 'Directory does not exist or is not accessible: ' . $imageDirectory);
        // }

        // // Pass the directory status to the view
        // $data['directory_status'] = $directory_status;


        load_common_views('dashboard', $data);
    }

    public function profile() {
        $user_id = $this->session->userdata('user_id');
        $user = $this->Users_model->get_user_by_id($user_id);
        $is_admin = $user['is_admin']; // Get the is_admin value

        $data['user'] = $user;
        $data['is_admin'] = $is_admin; // Pass is_admin to the view
    
        $data['title'] = 'My Profile';
        load_common_views('profile', $data);
    }
    
    // public function users() {
    //     $data['title'] = 'Users';
    //     $data['users'] = $this->Auth_model->get_users();
    //     load_common_views('users', $data);
    // }
    
    // public function edit_user($id) {
    //     $data['title'] = 'Edit User';
    //     $data['user'] = $this->Auth_model->get_user_by_id($id);
    //     load_common_views('edit_user', $data);
    // }
    
    // public function update_user($id) {
    //     $this->Auth_model->update_user($id);
    //     redirect('admin/users');
    // }
    
    // public function delete_user($id) {
    //     $this->Auth_model->delete_user($id);
    //     redirect('admin/users');
    // }
}
