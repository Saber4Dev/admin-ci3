<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model'); // load client model
        $this->load->model('users_model'); //  load user model
        $this->load->helper('common_helper');
        $this->load->library('session');
        // Check if the user is logged in, redirect to login page if not
        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }   
    }
    
    // Clients page
    public function clients() {
        // Load the logged in user's data from the database
        $user_id = $this->session->userdata('user_id');
        $user = $this->users_model->get_user_by_id($user_id);

        $client = $this->client_model->get_clients_by_user_id($user_id); // get all clients from database

        // Pass the user's data to the view
        $data['user'] = $user;
        $data['clients'] = $client;

        $data['title'] = 'Clients';  // set page title
        load_common_views('user/clients', $data);
    }

    // Handle the client profile page
    public function profile($client_id) {
        $data['title'] = 'Client Profile';
    
        // Fetch the client data using the client_id parameter
        $data['client'] = $this->client_model->get_client_by_id($client_id);
        $data['user'] = $this->users_model->get_user_by_id($this->session->userdata('user_id'));
    
        // Load the common views to display the client profile
        load_common_views('user/client_profile', $data);
    }
    
    

    // Add a new client
    public function add_client() {
        // Set validation rules for the form fields
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('photo', 'Photo', 'callback_upload_photo');

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, show the add client form with validation errors
            $this->load->view('user/add_client');
        } else {
            // Form validation successful, insert the new client into the database
            $client_data = array(
                'user_id' => $this->session->userdata('user_id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'photo' => $this->upload->data('file_name')
            );

            $this->client_model->insert_client($client_data);
            redirect('user/clients');
        }
    }


    // Custom validation callback function to upload the client photo
    public function upload_photo() {
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = './assets/admin_lte_assets/dist/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['file_name'] = $_FILES['photo']['name'];
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->form_validation->set_message('upload_photo', $this->upload->display_errors());
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

}
