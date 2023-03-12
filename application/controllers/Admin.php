<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {
        $this->load_common_views('dashboard');
    }

	public function login() {
		// Check if the form was submitted
		if ($this->input->post('submit')) {
			// Attempt to authenticate the user
			$user = $this->Users_model->login($this->input->post('email'), $this->input->post('password'));
	
			// Print the value of $user
			print_r($user);
	
			if ($user) {
				// If the user was successfully authenticated, store their data in the session
				$this->session->set_userdata(array(
					'user_id' => $user['id'],
					'email' => $user['email'],
					'is_admin' => $user['is_admin'],
					'logged_in' => true
				));
	
				// Redirect the user to the dashboard
				redirect('admin');
			} else {
				// If authentication failed, show an error message
				$this->session->set_flashdata('error', 'Invalid email or password.');
			}
		}
	
		// Load the login view
		$this->load->view('admin/login');
	}
	

    private function load_common_views($view_name, $data = array()) {
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/menu', $data);
        $this->load->view('admin/' . $view_name, $data);
        $this->load->view('admin/templates/footer', $data);
    }

}
