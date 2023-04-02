<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('common_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function login() {
        // If user is already logged in, redirect to dashboard
        if ($this->session->userdata('user')) {
            redirect('admin/dashboard');
        }
        
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $validation_errors = validation_errors();
            if(!empty($validation_errors)){
                $data['validation_errors'] = $validation_errors;
            }
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->users_model->login($email, $password);

            if ($user) {
                $user_data = array(
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                redirect('admin/dashboard');
            } else {
                // If login fails, show error message and redirect to login page
                $this->session->set_flashdata('error_message', 'Invalid email or password');
                redirect('auth/login');
            }
        }
    }

    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        } else {
            $this->users_model->register();

            $this->session->set_flashdata('success', 'You are now registered and can log in.');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('success', 'You are now logged out.');
        redirect('auth/login');
    }

    public function check_login() {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        } else {
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }
    }
}
