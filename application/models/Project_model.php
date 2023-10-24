<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Person_model');
    }

    // Function to insert a new project record
    public function add_project($project_data)
    {
        return $this->db->insert('Projects', $project_data);
    }

    // Function to get project records by person_id
    public function get_person_projects($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('Projects');
        return $query->result_array();
    }

    // Function to get project record by project_id
    public function get_project_by_id($project_id)
    {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('Projects');
        return $query->row_array();
    }

    public function update_project($person_id, $project_id, $data)
    {
        // Define the data to be updated
        $update_data = array(
            'title' => $data['title'],
            'description' => $data['description'],
            'skills_used' => $data['skills_used'],
            'category' => $data['category'],
            'project_url' => $data['project_url']
        );
    
        if (isset($data['image'])) {
            $update_data['image'] = $data['image'];
        }
    
        if (isset($data['imageModal'])) {
            $update_data['imageModal'] = $data['imageModal'];
        }
    
        // Update the project data
        $this->db->where('person_id', $person_id);
        $this->db->where('project_id', $project_id);
        $this->db->update('Projects', $update_data);
    
        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true; // Return true on success
        } else {
            return false; // Return false on failure
        }
    }
    
    
    
    

    // Function to delete a project record
    public function delete_project($project_id)
    {
        return $this->db->delete('Projects', array('project_id' => $project_id));
    }
}
