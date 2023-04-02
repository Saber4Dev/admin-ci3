<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('common_helper');
        $this->load->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
    
    public function dashboard() {


        // Load the logged in user's data from the database
        $user_id = $this->session->userdata('user_id');
        $user = $this->users_model->get_user_by_id($user_id);
    
        // Pass the user's data to the view
        $data['user'] = $user;

        
        $data['title'] = 'Dashboard';
        load_common_views('dashboard', $data);
    }

    public function profile() {
        $data['title'] = 'My Profile';
    
        // Load the logged in user's data from the database
        $user_id = $this->session->userdata('user_id');
        $user = $this->users_model->get_user_by_id($user_id);
    
        // Pass the user's data to the view
        $data['user'] = $user;
    
        load_common_views('profile', $data);
    }
    
    
    public function users() {
        $data['title'] = 'Users';
        $data['users'] = $this->users_model->get_users();
        load_common_views('users', $data);
    }
    
    public function edit_user($id) {
        $data['title'] = 'Edit User';
        $data['user'] = $this->users_model->get_user_by_id($id);
        load_common_views('edit_user', $data);
    }
    
    public function update_user($id) {
        $this->users_model->update_user($id);
        redirect('admin/users');
    }
    
    public function delete_user($id) {
        $this->users_model->delete_user($id);
        redirect('admin/users');
    }
    
}
