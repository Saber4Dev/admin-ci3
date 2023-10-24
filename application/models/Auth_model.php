<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    
    public function register($user_data) {
        // Insert data into the users table
        return $this->db->insert('Users', $user_data);
    }
    
    public function login($email, $password) {
        $this->db->where('email', $email);
        // Get the user's data from the users table
        $user_data = $this->db->get('Users')->row_array();
        
        if ($user_data && $this->bcrypt->verify($password, $user_data['password'])) {
            return $user_data;
        } else {
            return false;
        }
    }
    
    public function get_user_by_email_or_username($identity) {
        $this->db->where('email', $identity);
        $this->db->or_where('username', $identity);
        
        // Get the user's data from the users table
        $result = $this->db->get('Users')->row_array();
        
        return $result;
    }

    public function get_user_with_admin_status($user_id) {
        $query = $this->db->select('*')
            ->from('Users')
            ->where('id', $user_id)
            ->get();

        return $query->row_array();
    }


    public function update_user($user_id, $user_data) {
        $this->db->where('id', $user_id);
        return $this->db->update('Users', $user_data);
    }

    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->delete('Users');
    }

    public function change_password($user_id, $new_password) {
        // Hash the new password before updating the database
        $hashed_password = $this->bcrypt->hash($new_password);

        $this->db->where('id', $user_id);
        return $this->db->update('Users', array('password' => $hashed_password));
    }
    
    // Add any other authentication-related functions here
}
