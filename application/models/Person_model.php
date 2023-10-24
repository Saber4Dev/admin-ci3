<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person_model extends CI_Model
{

    public function get_all_persons()
    {
        $query = $this->db->get('Persons');
        return $query->result_array();
    }

    public function get_person_by_id($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('Persons');
        return $query->row_array();
    }

    public function add_person($data)
    {
        $this->db->insert('Persons', $data);
        return $this->db->insert_id(); // Return the inserted person's ID
    }
    

    public function update_person($person_id, $data)
    {
        // Define the data to be updated
        $update_data = array();
    
        // Check if a profile picture is provided
        if (isset($data['profile_picture'])) {
            $update_data['profile_picture'] = $data['profile_picture'];
        }
    
        // Check if other fields are provided and add them to the update data
        $fields = array('full_name', 'email', 'phone_number', 'address', 'bio', 'age', 'title', 'twitter', 'facebook', 'linkedin', 'github', 'instagram', 'website_url', 'status');
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $update_data[$field] = $data[$field];
            }
        }
    
        // Update the person's data
        $this->db->where('person_id', $person_id);
        $this->db->update('Persons', $update_data);
    
        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true; // Return true on success
        } else {
            return false; // Return false on failure
        }
    }
    

    public function delete_person($person_id)
    {
        return $this->db->delete('Persons', array('person_id' => $person_id));
    }

    

}