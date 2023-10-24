<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function get_user_by_id($user_id) {
        $query = $this->db->get_where('Users', array('id' => $user_id));
        return $query->row_array();
    }

    public function get_current_user_data() {
        $user_id = $this->session->userdata('user_id');

        if ($user_id) {
            $user_data = $this->get_user_by_id($user_id);
            if ($user_data['is_admin'] == 1) {
                $user_data['is_admin'] = true;
            } else {
                $user_data['is_admin'] = false;
            }
            return $user_data;
        }

        return false;
    }

    public function is_admin($user_id) {
        $query = $this->db->get_where('Users', array('id' => $user_id));
        $user_data = $query->row_array();
        return ($user_data['is_admin'] == 1);
    }

    public function update_user_profile($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('Users', $data);
    }

    public function change_password($user_id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $data = array('password' => $hashed_password);
        $this->db->where('id', $user_id);
        return $this->db->update('Users', $data);
    }

    public function get_all_users() {
        $query = $this->db->get('Users');
        $users = $query->result_array();
    
        return $users;
    }

    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->delete('Users');
    }

    // Add more user-related functions as needed

}
