<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    
    public function register($name, $email, $password) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
        );
        
        return $this->db->insert('users', $data);
    }
    
    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        $result = $this->db->get('users')->row_array();
        
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

