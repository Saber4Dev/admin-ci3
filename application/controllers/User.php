<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load the necessary models and libraries here

        $this->load->helper('common_helper');
        $this->load->model('Client_model');
    }
    
    // Add your user-related functions here

    // This function loads the client user client...
    public function clients() {
        // Check login status
        check_login_status($this);

        // Get the current user's data
        $user_data = get_current_user_data($this);

        // Fetch the data from the clients table, filtering by the user ID
        $data['clients'] = $this->Client_model->get_clients_by_user_id($user_data['id']);
        
        // Handle form submission to add a new client
        if ($this->input->post('add_client')) {
            $this->add_client($user_data);
        }

        // Pass the client data to the dashboard view along with the user data and form validation errors (if any)
        $this->show_clients_view($user_data, $data['clients']);
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
    
    // This function adds a new client to the database
    private function add_client($user_data) {
        // Set validation rules for the form fields
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('photo', 'Photo', 'callback_upload_photo');

        // Run the form validation and insert the new client into the database if valid
        if ($this->form_validation->run() === TRUE) {
            $client_data = array(
                'user_id' => $user_data['id'],
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'photo' => $this->upload->data('file_name')
            );

            $this->Client_model->insert_client($client_data);
            redirect('user/clients');
        }
    }
    
    // This function shows the clients view
    private function show_clients_view($user_data, $clients) {
        // Pass the client data to the dashboard view along with the user data and form validation errors (if any)
        load_common_views('user/clients', array('user_data' => $user_data, 'validation_errors' => validation_errors(), 'clients' => $clients));
    }


    // public function clients() {
    //     // Check login status
    //     check_login_status($this);
    
    //     // Get the current user's data
    //     $user_data = get_current_user_data($this);
    
    //     // Fetch the data from the clients table, filtering by the user ID
    //     $clients = $this->Client_model->get_clients_by_user_id($user_data['id']);
        
    //     // Handle form submission to add a new client
    //     if ($this->input->post('add_client')) {
    //         // Set validation rules for the form fields
    //         $this->form_validation->set_rules('name', 'Name', 'trim|required');
    //         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    //         $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
    //         $this->form_validation->set_rules('address', 'Address', 'trim|required');
    //         $this->form_validation->set_rules('photo', 'Photo', 'callback_upload_photo');
    
    //         // Run the form validation and insert the new client into the database if valid
    //         if ($this->form_validation->run() === TRUE) {
    //             $client_data = array(
    //                 'user_id' => $user_data['id'],
    //                 'name' => $this->input->post('name'),
    //                 'email' => $this->input->post('email'),
    //                 'phone' => $this->input->post('phone'),
    //                 'address' => $this->input->post('address'),
    //                 'photo' => $this->upload->data('file_name')
    //             );
    
    //             $this->Client_model->insert_client($client_data);
    //             redirect('user/clients');
    //         }
    //     }
    
    //     // Call the show_clients_view function to load the view with the clients data
    //     $this->show_clients_view($user_data, $clients);
    // }
    
}