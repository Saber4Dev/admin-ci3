<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Experince_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->model('Person_model');
    }
    
    public function get_person_experiences($person_id)
    {
        $this->db->where('person_id', $person_id);
        return $this->db->get('Experience')->result_array();
    }

    public function add_experience($experience_data)
    {
        return $this->db->insert('Experience', $experience_data);
        
    }

    public function update_experience($person_id, $experience_id, $data) {
        // Update the experience record in the database for a specific person
        $this->db->where('person_id', $person_id);
        $this->db->where('experience_id', $experience_id);
        $this->db->update('Experience', $data);
    
        // Return the result of the update operation
        return $this->db->affected_rows() > 0;
    }
    
    public function delete_experience($experience_id)
    {
        return $this->db->delete('Experience', array('experience_id' => $experience_id));
    }
}