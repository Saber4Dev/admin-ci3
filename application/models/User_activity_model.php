<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_activity_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Insert user activity data into the user_activity table.
     *
     * @param array $data User activity data
     * @return bool True if the insertion is successful, false otherwise
     */
    public function insert_user_activity($data) {
        return $this->db->insert('user_activity', $data);
    }

    /**
     * Get user activity data by user ID.
     *
     * @param int $user_id User ID
     * @return array User activity data
     */
    public function get_user_activity_by_user_id($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('activity_date', 'desc');
        return $this->db->get('User_activity')->result_array();
    }

    /**
     * Get user activity data by IP address.
     *
     * @param string $ip_address IP address
     * @return array User activity data
     */
    public function get_user_activity_by_ip_address($ip_address) {
        $this->db->where('ip_address', $ip_address);
        $this->db->order_by('activity_date', 'desc');
        return $this->db->get('User_activity')->result_array();
    }

    /**
     * Get user activity data for all users.
     *
     * @return array User activity data
     */
    public function get_all_user_activity() {
        $this->db->order_by('date_time', 'desc');
        return $this->db->get('User_activity')->result_array();
    }

    // You can add more methods as needed for specific queries or reporting.

}
