<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model'); 
        $this->load->model('Users_model'); 
        $this->load->model('Person_model'); 
        $this->load->model('Experince_model'); 
        $this->load->model('Education_model'); 
        $this->load->model('Skills_model'); 
        $this->load->model('Project_model'); 
        $this->load->model('Service_model'); 

        // Load the common_helper
        $this->load->helper('common_helper'); 
        // Check if the user is logged in, redirect to login page if not
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function persons()
    {
        $data['title'] = 'Persons List';
        $data['user'] = $this->Users_model->get_user_by_id($this->session->userdata('user_id')); // Get user data
        $data['persons'] = $this->Person_model->get_all_persons();
        load_common_views('persons/person_list', $data);
    }

    public function profile($person_id)
    {
        $data['title'] = 'Person Profile';
        $data['user'] = $this->Users_model->get_user_by_id($this->session->userdata('user_id'));
        $data['person_id'] = $person_id; // Pass the person_id variable to the view
        $data['person'] = $this->Person_model->get_person_by_id($person_id);

        // Get the person's experinces data 
        $data['experiences'] = $this->Experince_model->get_person_experiences($person_id);

        // Get the person's education data 
        $data['educations'] = $this->Education_model->get_person_educations($person_id);
        
        // Get the person's skills data
        $data['skills'] = $this->Skills_model->get_person_skills($person_id);
        
        // Get the person's project data
        $data['projects'] = $this->Project_model->get_person_projects($person_id);

        // Get the person's Services data
        $data['services'] = $this->Service_model->get_person_services($person_id);

        // Get the person's ServicesPlan data
        $data['services_plans'] = $this->Service_model->get_person_services_plans($person_id);

        // Get the person's Testimonials data
        $data['testimonials'] = $this->Service_model->get_person_testimonials($person_id);
                
        load_common_views('persons/person_profile', $data);
    }

    public function add_person()
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                'address' => $this->input->post('address'),
                'bio' => $this->input->post('bio'),
                'age' => $this->input->post('age'),
                'title' => $this->input->post('title'),
                'website_url' => $this->input->post('website_url'),
                'status' => $this->input->post('status')
            );

        // Check if a profile picture is provided
        if (!empty($_FILES['profile_picture']['name'])) {
            $imagePath = '/home/pixecbiw/saberea.com/assets/img/';
            $imagePath = $this->upload_photo('profile_picture', $imagePath);
            $data['profile_picture'] = $imagePath; // Set the image name in the data array
        } else {
            // If no profile picture is provided, set the default image name
            $data['profile_picture'] = 'avatar.png'; // Adjust the default image name
        }

            // Call the model to add the new person
            $result = $this->Person_model->add_person($data);

            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Person added successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to add person.');
            }

            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }



    public function update_person($person_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                'address' => $this->input->post('address'),
                'bio' => $this->input->post('bio'),
                'age' => $this->input->post('age'),
                'title' => $this->input->post('title'),
                'twitter' => $this->input->post('twitter'),
                'facebook' => $this->input->post('facebook'),
                'linkedin' => $this->input->post('linkedin'),
                'github' => $this->input->post('github'),
                'instagram' => $this->input->post('instagram'),
                'website_url' => $this->input->post('website_url'),
                'status' => $this->input->post('status')
            );
    
            // Use the function like this
            $imagePath = '/home/pixecbiw/saberea.com/assets/img/';
    
            if (!empty($_FILES['profile_picture']['name'])) {
                $imagePath = $this->upload_photo('profile_picture', $imagePath);
                $data['profile_picture'] = $imagePath; // Set the image path in the data array
            }
    
            // Call the model to update the person's information
            $result = $this->Person_model->update_person($person_id, $data);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Person information updated successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to update person information.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }

    // Delete person
    public function delete_person($person_id)
    {
        if ($this->input->is_ajax_request()) {
            // Call the model function to delete the person
            $result = $this->Person_model->delete_person($person_id);
    
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Person deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete person.');
            }
    
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    

    
    

    public function modify_person($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                'status' => $this->input->post('status')
            );
    
            // Call the model function to update the person's information
            $result = $this->Person_model->update_person($person_id, $data);
    
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Person information updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to update person information.');
            }
    
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    
    
}