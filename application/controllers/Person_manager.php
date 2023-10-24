<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_manager extends CI_Controller  
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Person_model'); 
        $this->load->model('Experince_model'); 
        $this->load->model('Education_model'); 
        $this->load->model('Skills_model'); 
        $this->load->model('Service_model'); 

        $this->load->helper('common_helper');

    }

    // CRUD functions for managing Experince
    public function add_experience($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('jobTitle', 'Job Title', 'required');
            $this->form_validation->set_rules('company', 'Company', 'required');
            $this->form_validation->set_rules('startDate', 'Start Date', 'required');

            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                $jobTitle = $this->input->post('jobTitle');
                $company = $this->input->post('company');
                $startDate = $this->input->post('startDate');
                $endDate = $this->input->post('endDate');
                $description = $this->input->post('description');

                // Create an array with experience data
                $experience_data = array(
                    'person_id' => $person_id,
                    'job_title' => $jobTitle,
                    'company' => $company,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'description' => $description
                );

                // Call the model function to add the experience
                $result = $this->Experince_model->add_experience($experience_data);

                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Experience added successfully.');
                } else {
                    $response = array('status' => 'error', 'message' => 'Failed to add experience.');
                }
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }
    
    public function update_experience($person_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'job_title' => $this->input->post('jobTitle'),
                'company' => $this->input->post('company'),
                'start_date' => $this->input->post('startDate'),
                'end_date' => $this->input->post('endDate'),
                'description' => $this->input->post('description')
            );
    
            // Get the experience_id from the POST request (you may need to add this line)
            $experience_id = $this->input->post('experience_id');
    
            // Call the model to update the experience
            $result = $this->Experince_model->update_experience($person_id, $experience_id, $data);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Experience updated successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to update experience.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }
    
    public function delete_experience($experience_id)
    {
        if ($this->input->is_ajax_request()) {
            // Call the model function to delete the experience
            $result = $this->Experince_model->delete_experience($experience_id);
    
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Experience deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete experience.');
            }
    
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    


    // CRUD functions for managing education
    public function add_education($person_id)
    {
        if ($this->input->is_ajax_request()) {
            // Debugging output
            //echo "Controller method called!";
            //die(); // Halt execution for debugging purposes

            $this->form_validation->set_rules('degree', 'Degree', 'required');
            $this->form_validation->set_rules('institution', 'Institution', 'required');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                
                $degree = $this->input->post('degree');
                $institution = $this->input->post('institution');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
                $description = $this->input->post('description');
    
                // Create an array with education data
                $education_data = array(
                    'person_id' => $person_id,
                    'degree' => $degree,
                    'institution' => $institution,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'description' => $description
                );
    
                // Call the model function to add the education
                $result = $this->Education_model->add_education($education_data);
    
                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Education added successfully.');
                } else {
                    // If the insert operation fails, log the database error
                    $db_error = $this->db->error();
                    $response = array('status' => 'error', 'message' => 'Failed to add education. Database error: ' . $db_error['message']);
                }
            }
    
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    
    
    public function update_education($person_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'degree' => $this->input->post('degree'),
                'institution' => $this->input->post('institution'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'description' => $this->input->post('description')
            );
    
            // Get the education_id from the POST request
            $education_id = $this->input->post('education_id');
    
            // Call the model to update the education
            $result = $this->Education_model->update_education($person_id, $education_id, $data);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Education updated successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to update education.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }
    
    
    public function delete_education($education_id)
    {
        if ($this->input->is_ajax_request()) {
            // Call the model function to delete the education
            $result = $this->Education_model->delete_education($education_id);
    
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Education deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete education.');
            }
    
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    


    // CRUD functions for managing skills

    public function add_skill($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('skill_name', 'Skill Name', 'required');
            $this->form_validation->set_rules('proficiency_level', 'Proficiency Level', 'required');

    
            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                $skill_name = $this->input->post('skill_name');
                $skill_description = $this->input->post('skill_description');
                $proficiency_level = $this->input->post('proficiency_level');
    
    
                // Create an array with skill data
                $skill_data = array(
                    'person_id' => $person_id,
                    'skill_name' => $skill_name,
                    'skill_description' => $skill_description,
                    'proficiency_level' => $proficiency_level // Use the determined proficiency level
                );
    
                // Call the model function to add the skill
                $result = $this->Skills_model->add_skill($skill_data);
    
                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Skill added successfully.');
                } else {
                    // If the insert operation fails, log the database error
                    $db_error = $this->db->error();
                    $response = array('status' => 'error', 'message' => 'Failed to add skill. Database error: ' . $db_error['message']);
                }
            }
    
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    
    
    public function update_skill($person_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'skill_name' => $this->input->post('skill_name'),
                'proficiency_level' => $this->input->post('proficiency_level'),
                'skill_description' => $this->input->post('skill_description')
            );
    
            // Get the skill_id from the POST request
            $skill_id = $this->input->post('skill_id');
    
            // Call the model to update the skill
            $result = $this->Skills_model->update_skill($person_id, $skill_id, $data);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Skill updated successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to update skill.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }
    

    public function delete_skill($skill_id)
    {
        if ($this->input->is_ajax_request()) {
            // Call the model function to delete the skill
            $result = $this->Skills_model->delete_skill($skill_id);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Skill deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete skill.');
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }


    // CRUD functions for managing services
    public function add_service($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('serviceName', 'Service Name', 'required');
            $this->form_validation->set_rules('serviceDescription', 'Description', 'required');
            $this->form_validation->set_rules('serviceIconName', 'Service Icon Name', 'required');

            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                $service_name = $this->input->post('serviceName');
                $description = $this->input->post('serviceDescription');
                $service_icon = $this->input->post('serviceIconName');

                // Create an array with service data
                $service_data = array(
                    'person_id' => $person_id,
                    'service_name' => $service_name,
                    'description' => $description,
                    'service_icon' => $service_icon
                );

                // Call the model function to add the service
                $result = $this->Service_model->add_service($service_data);

                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Service added successfully.');
                } else {
                    $db_error = $this->db->error();
                    $response = array('status' => 'error', 'message' => 'Failed to add service. Database error: ' . $db_error['message']);
                }
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function update_service($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $data = array(
                'service_name' => $this->input->post('serviceName'),
                'description' => $this->input->post('serviceDescription'),
                'service_icon' => $this->input->post('serviceIconName')
            );

            $service_id = $this->input->post('service_id');

            $result = $this->Service_model->update_service($person_id, $service_id, $data);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Service updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to update service.');
            }

            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }

    public function delete_service($service_id)
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->Service_model->delete_service($service_id);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Service deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete service.');
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }

    // CRUD functions for managing ServicesPlan
    public function add_services_plan($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('features', 'Features', 'required');

            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                $plan_name = $this->input->post('plan_name');
                $price = $this->input->post('price');
                $description = $this->input->post('description');
                $features = $this->input->post('features');

                // Create an array with ServicesPlan data
                $services_plan_data = array(
                    'person_id' => $person_id,
                    'plan_name' => $plan_name,
                    'price' => $price,
                    'description' => $description,
                    'features' => $features
                );

                // Call the model function to add the ServicesPlan
                $result = $this->Service_model->add_services_plan($services_plan_data);

                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Services Plan added successfully.');
                } else {
                    $db_error = $this->db->error();
                    $response = array('status' => 'error', 'message' => 'Failed to add Services Plan. Database error: ' . $db_error['message']);
                }
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function update_services_plan($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $data = array(
                'plan_name' => $this->input->post('plan_name'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
                'features' => $this->input->post('features')
            );

            $plan_id = $this->input->post('plan_id');

            $result = $this->Service_model->update_services_plan($person_id, $plan_id, $data);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Services Plan updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to update Services Plan.');
            }

            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }

    public function delete_services_plan($plan_id)
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->Service_model->delete_services_plan($plan_id);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Services Plan deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete Services Plan.');
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }

    // CRUD functions for managing Testimonials
    public function add_testimonial($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('testimonial_text', 'Testimonial Text', 'required');
            $this->form_validation->set_rules('client_name', 'Client Name', 'required');
            $this->form_validation->set_rules('client_company', 'Client Company', 'required');
            $this->form_validation->set_rules('client_avatar', 'Client Avatar', 'required');
            $this->form_validation->set_rules('client_role', 'Client Role', 'required');
            $this->form_validation->set_rules('client_rate', 'Client Rate', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $response = array('status' => 'error', 'message' => validation_errors());
            } else {
                // Get the form data
                $testimonial_text = $this->input->post('testimonial_text');
                $client_name = $this->input->post('client_name');
                $client_company = $this->input->post('client_company');
                $client_avatar = $this->input->post('client_avatar');
                $client_role = $this->input->post('client_role');
                $client_rate = $this->input->post('client_rate');

                // Create an array with Testimonials data
                $testimonial_data = array(
                    'person_id' => $person_id,
                    'testimonial_text' => $testimonial_text,
                    'client_name' => $client_name,
                    'client_company' => $client_company,
                    'client_avatar' => $client_avatar,
                    'client_role' => $client_role,
                    'client_rate' => $client_rate
                );

                // Call the model function to add the Testimonial
                $result = $this->Service_model->add_testimonial($testimonial_data);

                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Testimonial added successfully.');
                } else {
                    $db_error = $this->db->error();
                    $response = array('status' => 'error', 'message' => 'Failed to add Testimonial. Database error: ' . $db_error['message']);
                }
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function update_testimonial($person_id)
    {
        if ($this->input->is_ajax_request()) {
            $data = array(
                'testimonial_text' => $this->input->post('testimonial_text'),
                'client_name' => $this->input->post('client_name'),
                'client_company' => $this->input->post('client_company'),
                'client_avatar' => $this->input->post('client_avatar'),
                'client_role' => $this->input->post('client_role'),
                'client_rate' => $this->input->post('client_rate')
            );

            $testimonial_id = $this->input->post('testimonial_id');

            $result = $this->Service_model->update_testimonial($person_id, $testimonial_id, $data);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Testimonial updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to update Testimonial.');
            }

            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }

    public function delete_testimonial($testimonial_id)
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->Service_model->delete_testimonial($testimonial_id);

            if ($result) {
                $response = array('status' => 'success', 'message' => 'Testimonial deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete Testimonial.');
            }

            echo json_encode($response);
        } else {
            show_404();
        }
    }





}
