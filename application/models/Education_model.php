<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education_model extends CI_Model {

    

    // Function to insert a new education record
    public function add_education($education_data)
    {
        return $this->db->insert('Education', $education_data);
    }

    // Function to get education records by person_id
    public function get_person_educations($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('Education');
        return $query->result_array();
    }

    // Function to get education record by education_id
    public function get_education_by_id($education_id)
    {
        $this->db->where('education_id', $education_id);
        $query = $this->db->get('Education');
        return $query->row_array();
    }

    // Function to update an education record
    public function update_education($person_id, $education_id, $data)
    {
        $this->db->where('person_id', $person_id);
        $this->db->where('education_id', $education_id);
        $this->db->update('Education', $data);

        // Return the result of the update operation
        return $this->db->affected_rows() > 0;
    }

    // Function to delete an education record
    public function delete_education($education_id)
    {
        return $this->db->delete('Education', array('education_id' => $education_id));
    }
}