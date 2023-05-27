<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    
    public function register($name, $email, $password) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
        );
        
        // Insert data into the users table
        return $this->db->insert('users', $data);
    }
    
    // login fucntion
    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        // Get the user's data from the users table
        $result = $this->db->get('users')->row_array();
        
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Fetch the user data from the users table
     * @param int $user_id User ID
     * @return array User data
     */
    public function get_user_by_id($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row_array();
    }
    
    
    /**
     * Get current user's data
     * @return array User data
     */
    public function get_current_user_data() {
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->get_user_by_id($user_id);
        if ($user_data['is_admin'] == 1) {
            $user_data['is_admin'] = true;
        } else {
            $user_data['is_admin'] = false;
        }
        return $user_data;
    }

    public function get_client_by_id($client_id) {
        $this->db->select('*');
        $query = $this->db->get_where('client', array('id' => $client_id));
        return $query->row_array();
    }
    
}
