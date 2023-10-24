<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_project extends CI_Controller  
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Person_model'); 
        $this->load->model('Project_model'); 

        $this->load->helper('common_helper');

    }

    public function add_project($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('title', 'Title', 'required');
            // Add validation rules for other fields as needed
            
            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $skills_used = $this->input->post('skills_used');
                $category = $this->input->post('category');
                $project_url = $this->input->post('project_url');
                $image = $this->input->post('image');
                $image_modal = $this->input->post('image_modal');
                
                // Create an array with project data
                $project_data = array(
                    'person_id' => $person_id,
                    'title' => $title,
                    'description' => $description,
                    'skills_used' => $skills_used,
                    'category' => $category,
                    'project_url' => $project_url,
                    'image' => $image,
                    'image_modal' => $image_modal
                );
        
                // Call the model function to add the project
                $result = $this->Project_model->add_project($project_data);
        
                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Project added successfully.');
                } else {
                    // If the insert operation fails, log the database error
                    $db_error = $this->db->error();
                    $response = array('status' => 'error', 'message' => 'Failed to add project. Database error: ' . $db_error['message']);
                }
            }
        
            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function update_project($person_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'skills_used' => $this->input->post('skills_used'),
                'category' => $this->input->post('category'),
                'project_url' => $this->input->post('project_url')
            );
    
            // Get the project_id from the POST request
            $project_id = $this->input->post('project_id');
    
            // Use the function like this
            $imagePath = '/home/pixecbiw/saberea.com/assets/img/portfolio/';
            $imageModalPath = '/home/pixecbiw/saberea.com/assets/img/portfolio/modals';
    
            if (!empty($_FILES['image']['name'])) {
                $imagePath = $this->upload_photo('image', $imagePath);
                $data['image'] = $imagePath; // Set the image path in the data array
            }
            
            // Similarly, for image_modal
            if (!empty($_FILES['image_modal']['name'])) {
                $imageModalPath = $this->upload_photo('image_modal', $imageModalPath);
                $data['imageModal'] = $imageModalPath; // Set the image modal path in the data array
            }
    
            // Update the project with the new data
            $result = $this->Project_model->update_project($person_id, $project_id, $data);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Project updated successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to update project.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }
    
    private function upload_photo($file_input_name, $upload_directory, $allowed_types = 'jpg|jpeg|png', $max_size = 1024) {
        // Load the CodeIgniter instance if not already loaded
        $this->load->library('upload');
    
        // Define the upload configuration
        $config['upload_path'] = $upload_directory;
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = $max_size;
        $config['file_name'] = $_FILES[$file_input_name]['name']; // Use the original file name
        $config['overwrite'] = TRUE;
    
        $this->upload->initialize($config);
    
        if (!$this->upload->do_upload($file_input_name)) {
            $error = $this->upload->display_errors();
            log_message('error', 'File upload error: ' . $error);
            return false;
        } else {
            $upload_data = $this->upload->data();
            return $upload_data['file_name']; // Return the uploaded file name
        }
    }
    
    
    

    public function delete_project($project_id)
    {
        if ($this->input->is_ajax_request()) {
            // Call the model function to delete the project
            $result = $this->Project_model->delete_project($project_id);
        
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Project deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete project.');
            }
        
            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function get_project_by_id($project_id)
    {
        $projectData = $this->Project_model->get_project_by_id($project_id);
        header('Content-Type: application/json');
        echo json_encode($projectData);
        exit; // Ensure no additional output is sent
    }
    
}