<?php
class Client_model extends CI_Model {

    // This function gets the clients for the specified user ID
    public function get_clients_by_user_id($user_id) {
        $query = $this->db->get_where('client', array('user_id' => $user_id));
        return $query->result();
    }

    // This function inserts a new client
    public function insert_client($data) {
        return $this->db->insert('client', $data);
    }

}
