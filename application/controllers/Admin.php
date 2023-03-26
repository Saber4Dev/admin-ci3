<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    // This function loads the common views used by most pages in the admin panel
    private function load_common_views($view_name, $data = array()) {
        $user_data = $this->get_current_user_data(); // Get the current user's data
    
        // Add the user data to the $data array
        $data['user_data'] = $user_data;
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/' . $view_name, $data);
        $this->load->view('admin/templates/footer', $data);
    }

    // This function checks if the user is logged in
    private function check_login_status() {
        // Redirect to the login page if the user is not logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }
    
    // This function fetches the current user's data from the database
    private function get_current_user_data() {
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Users_model->get_user_data($user_id);

        // Check if the current user is an admin
        if ($user_data['is_admin'] == 1) {
            $user_data['is_admin'] = true;
        } else {
            $user_data['is_admin'] = false;
        }

        return $user_data;
    }

    // This function requires the user to be logged in before accessing the page
    private function require_login() {
        $this->check_login_status();
    }
    
    // This function loads the dashboard page
    public function index() {
        $this->require_login();
        
        // Get the current user's data
        $user_data = $this->get_current_user_data();
    
        // Load the dashboard view with the user data
        $this->load_common_views('dashboard', $user_data);
    }
    
    // This function loads the profile page
    public function profile() {
        $this->require_login();

        // Get the current user's data
        $user_data = $this->get_current_user_data();

        // Load the profile view with the user data
        $this->load_common_views('profile', $user_data);
    }

    // This function loads the login page
    public function login() {
        // Redirect to dashboard if user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('admin/index');
        }

        $data['title'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Load the login view
            $this->load->view('admin/login', $data);
        } else {
            $this->attempt_login();
        }
    }

    // This function attempts to log in the user
    private function attempt_login() {
        $user = $this->Users_model->login($this->input->post('email'), md5($this->input->post('password')));

        if ($user) {
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('user_id', $user['id']);
            redirect('admin/index');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials.');
            redirect('admin/login');
        }
    }
    // This function attempts to register in the user
    public function register() {
        $data['title'] = 'Register';
    
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load_common_views('register', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
    
            $this->Users_model->register($name, $email, $password);
    
            $this->session->set_flashdata('success', 'You have successfully registered....');
            redirect('admin/login');
        }
    }
    
}