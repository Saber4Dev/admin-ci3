<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model'); // Load the new Auth_model
        $this->load->helper('common_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('bcrypt');
    }


    public function login() {
        // If user is already logged in, redirect to dashboard
        if ($this->session->userdata('user')) {
            redirect('admin/dashboard');
        }
    
        $this->form_validation->set_rules('identity', 'Email/Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');
    
            // Attempt to retrieve the user by email or username using the Auth_model
            $user = $this->Auth_model->get_user_by_email_or_username($identity);
    
            if ($user) {
                // Verify the entered password against the hashed password
                if ($this->bcrypt->verify($password, $user['password'])) {
                    $user_data = array(
                        'user_id' => $user['id'],
                        'email' => $user['email'],
                        'logged_in' => true
                    );
    
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('message', [
                        'type' => 'success',
                        'text' => 'You have successfully logged in.'
                    ]);
    
                    redirect('admin/dashboard');
                } else {
                    // Password verification failed
                    $this->session->set_flashdata('error', 'Invalid email or password');
                    // Redirect back to the login page
                    redirect('auth/login');
                }
            } else {
                // User not found
                $this->session->set_flashdata('error', 'Invalid email or username');
                // Redirect back to the login page
                redirect('auth/login');
            }
        }
    }

    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }
    
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[Users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
    
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        } else {
            // Generate a unique user ID (you can use your preferred method to generate IDs)
            $user_id = uniqid();
    
            // Hash the password using bcrypt
            $hashed_password = $this->bcrypt->hash($this->input->post('password'));

            // Generate a random number between 1 and 8 for the avatar filename
            $random_number = mt_rand(1, 8);
    
            // Prepare the user data for insertion into the database
            $user_data = array(
                'id' => $user_id,
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $hashed_password,
                'avatar' => 'user' . $random_number . '-avatar.jpg', // Generate the random avatar filename
                'is_admin' => 0 // Set Value to 1 to make the user Admin
            );
    
            // Attempt to insert the user data into the database using the Auth_model
            if ($this->Auth_model->register($user_data)) {
                $this->session->set_flashdata('success', 'You are now registered and can log in.');
                redirect('auth/login');
            } else {
                // Database insertion failed
                $this->session->set_flashdata('error', 'Registration failed. Please try again later.');
                redirect('auth/register');
            }
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
