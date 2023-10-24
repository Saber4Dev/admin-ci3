<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skills_model extends CI_Model {

    // Function to insert a new skill record
    public function add_skill($skill_data)
    {
        return $this->db->insert('Skills', $skill_data);
    }

    // Function to get skills records by person_id
    public function get_person_skills($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('Skills');
        return $query->result_array();
    }

    // Function to get skill record by skill_id
    public function get_skill_by_id($skill_id)
    {
        $this->db->where('skill_id', $skill_id);
        $query = $this->db->get('Skills');
        return $query->row_array();
    }

    // Function to update a skill record
    public function update_skill($person_id, $skill_id, $data)
    {
        $this->db->where('person_id', $person_id);
        $this->db->where('skill_id', $skill_id);
        $this->db->update('Skills', $data);

        // Return the result of the update operation
        return $this->db->affected_rows() > 0;
    }

    // Function to delete a skill record
    public function delete_skill($skill_id)
    {
        return $this->db->delete('Skills', array('skill_id' => $skill_id));
    }
}
