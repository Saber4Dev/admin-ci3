<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model'); // load client model
        $this->load->model('users_model'); // load users model
        $this->load->helper('common_helper');
        $this->load->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
    
    // Check if user is logged in
    private function check_login() {
        if (!$this->session->userdata('user')) { // if user is not logged in
            redirect('auth/login'); // redirect to login page
        }
    }
    // Clients page
    public function clients() {
        // Load the logged in user's data from the database
        $user_id = $this->session->userdata('user_id');
        $user = $this->users_model->get_user_by_id($user_id);

        $clients = $this->client_model->get_clients_by_user_id($user_id); // get all clients from database

        // Pass the user's data and clients to the view
        $data['user'] = $user;
        $data['clients'] = $clients;

        $data['title'] = 'Clients';  // set page title
        $this->load->view('user/clients', $data);
    }





}
