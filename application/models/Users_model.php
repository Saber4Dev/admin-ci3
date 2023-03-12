<?php
class Users_model extends CI_Model {

    // public function login($email, $password) {
    //     // Check if the email and password are correct
    //     $this->db->where('email', $email);
    //     $this->db->where('password', md5($password));
    //     $query = $this->db->get('users');

    //     if ($query->num_rows() == 1) {
    //         // If the email and password match, return the user's data
    //         return $query->row_array();
    //     } else {
    //         // If the email and password do not match, return false
    //         return false;
    //     }
    // }

    public function login($email, $password) {
        // Check if the user with the specified email exists in the database
        $this->db->where('email', $email);
        $query = $this->db->get('users');
    
        if ($query->num_rows() > 0) {
            // If the user exists, check if the specified password matches the one stored in the database
            $user = $query->row_array();
            if ($user['password'] == $password) {
                return $user;
            }
        }
    
        return false;
    }

}






