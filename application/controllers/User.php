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
    

    // Clients page
    public function clients()
    {
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

    // Check if user is logged in
    private function check_login()
    {
        if (!$this->session->userdata('user')) { // if user is not logged in
            redirect('auth/login'); // redirect to login page
        }
    }

    // This function loads the client user client...
    public function Show_clients() {
 

        // Get the current user's data
        $user_data = get_current_user_data($this);

        // Fetch the data from the clients table, filtering by the user ID
        $data['clients'] = $this->Client_model->get_clients_by_user_id($user_data['id']);
        
        // Handle form submission to add a new client
        if ($this->input->post('add_client')) {
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

        // Pass the client data to the dashboard view along with the user data and form validation errors (if any)
        load_common_views('user/clients', array('user_data' => $user_data, 'validation_errors' => validation_errors(), 'data' => $data));
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
