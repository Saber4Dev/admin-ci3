<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    private function load_common_views($view_name, $data = array()) {
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/menu', $data);
        $this->load->view('admin/' . $view_name, $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function index() {
        // Redirect to the login page if the user is not logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }

        // Load the dashboard view
        $this->load_common_views('dashboard');
    }

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
    }

    

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        redirect('admin/login');
    }

    
    public function register() {
        // Redirect to dashboard if user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('admin/index');
        }

        $data['title'] = 'Register';
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/register', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            $this->Users_model->register($name, $email, $password);
            
            $this->session->set_flashdata('success', 'You have successfully registered. Please login.');
            redirect('auth/login');
        }
    }
}