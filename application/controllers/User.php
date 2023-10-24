<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Auth_model');
        $this->load->model('User_activity_model'); 
        $this->load->library('bcrypt');

        // Load the common_helper
        $this->load->helper('common_helper');

        // Check if the user is logged in, redirect to login page if not
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function user_list()
    {
        $data['title'] = 'User List';
        $data['users'] = $this->Users_model->get_all_users();

        // Load the user list view
        load_common_views('users/user_list', $data);
    }

    public function user_activity()
    {
        $data['title'] = 'User Activity';
        $data['user'] = $this->Users_model->get_user_by_id($this->session->userdata('user_id'));
        $data['user_activity'] = $this->User_activity_model->get_all_user_activity();
        
        // Load the user activity view
        load_common_views('users/user_activity', $data);
    }

    public function profile($user_id)
    {
        $data['title'] = 'User Profile';
        $data['user'] = $this->Users_model->get_user_by_id($user_id);
        $data['user_id'] = $user_id;
       
        // Load the user's profile view
        load_common_views('users/user_profile', $data);
    }


    

    public function update_user($user_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the form data from the POST request
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                // Add other fields as needed
            );
    
            // Call the model to update the user's information
            $result = $this->Users_model->update_user_profile($user_id, $data);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'User information updated successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to update user information.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }
    

    
    public function update_avatar($user_id)
    {
        // Check if the request is a POST request
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $config['upload_path'] = 'assets/admin_lte_assets/dist/img/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = uniqid(); // Generate a unique file name
            $config['overwrite'] = TRUE;
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('avatar')) {
                // Avatar upload failed, handle the error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('user/profile/' . $user_id);
            } else {
                // Avatar uploaded successfully
                $avatar_file_name = $this->upload->data('file_name');
    
                // Update the user's avatar in the database
                $data = array('avatar' => $avatar_file_name);
                $result = $this->Users_model->update_user_profile($user_id, $data);
    
                if ($result) {
                    // Avatar updated successfully
                    redirect('user/profile/' . $user_id);
                } else {
                    // Failed to update avatar, handle the error
                    $this->session->set_flashdata('error', 'Failed to update avatar.');
                    redirect('user/profile/' . $user_id);
                }
            }
        } else {
            // Handle non-POST requests (if needed)
        }
    }
    
    public function update_admin_role_status($user_id)
    {
        // Check if the request is a POST request
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $is_admin = $this->input->post('is_admin');
            $active = $this->input->post('active');

            if ($is_admin !== null && $active !== null) {
                // Check if the logged-in user is an admin
                $logged_in_user_id = $this->session->userdata('user_id');
                $is_logged_in_user_admin = $this->Users_model->is_admin($logged_in_user_id);

                if ($is_logged_in_user_admin) {
                    // Only administrators can change admin roles and user status
                    $data = array(
                        'is_admin' => $is_admin,
                        'active' => $active
                    );

                    $result = $this->Users_model->update_user_profile($user_id, $data);

                    if ($result) {
                        // Admin role and status updated successfully
                        redirect('user/profile/' . $user_id);
                    } else {
                        // Failed to update admin role and status, handle the error
                        // You can set an error message and reload the user profile page
                        $this->session->set_flashdata('error', 'Failed to update admin role and status.');
                        redirect('user/profile/' . $user_id);
                    }
                } else {
                    // Non-admin users are not allowed to change admin roles and user status
                    // Handle the error or set a message indicating permission denied
                    // You can set an error message and reload the user profile page
                    $this->session->set_flashdata('error', 'Permission denied. Only administrators can change admin roles and user status.');
                    redirect('user/profile/' . $user_id);
                }
            } else {
                // Invalid POST data, handle the error
                // You can set an error message and reload the user profile page
                $this->session->set_flashdata('error', 'Invalid POST data.');
                redirect('user/profile/' . $user_id);
            }
        } else {
            // Handle non-POST requests (if needed)
        }
    }
    public function change_password($user_id)
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the new password from the POST request
            $new_password = $this->input->post('new_password');
            
            // Hash the new password using password_hash
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    
            // Call the model to change the user's password
            $result = $this->Users_model->change_password($user_id, $hashed_password);
    
            if ($result) {
                // Return a success response
                $response = array('status' => 'success', 'message' => 'Password changed successfully.');
            } else {
                // Return an error response
                $response = array('status' => 'error', 'message' => 'Failed to change password.');
            }
    
            // Convert the response to JSON and send it back
            echo json_encode($response);
        } else {
            // Handle non-AJAX requests here (if needed)
        }
    }
    

}
