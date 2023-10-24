<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model {

    // Function to insert a new service record
    public function add_service($service_data)
    {
        return $this->db->insert('Services', $service_data);
    }

    // Function to get service records by person_id
    public function get_person_services($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('Services');
        return $query->result_array();
    }

    // Function to get service record by service_id
    public function get_service_by_id($service_id)
    {
        $this->db->where('service_id', $service_id);
        $query = $this->db->get('Services');
        return $query->row_array();
    }

    // Function to update a service record
    public function update_service($person_id, $service_id, $data)
    {
        $this->db->where('person_id', $person_id);
        $this->db->where('service_id', $service_id);
        $this->db->update('Services', $data);

        // Return the result of the update operation
        return $this->db->affected_rows() > 0;
    }

    // Function to delete a service record
    public function delete_service($service_id)
    {
        return $this->db->delete('Services', array('service_id' => $service_id));
    }
    
    
    
    // ******************** SERVICES PLAN CRUD ********************

    // Function to insert a new service plan record
    public function add_service_plan($service_plan_data)
    {
        return $this->db->insert('ServicesPlan', $service_plan_data);
    }

    // Function to get service plan records by person_id
    public function get_person_services_plans($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('ServicesPlan');
        return $query->result_array();
    }

    // Function to get service plan record by plan_id
    public function get_service_plan_by_id($plan_id)
    {
        $this->db->where('plan_id', $plan_id);
        $query = $this->db->get('ServicesPlan');
        return $query->row_array();
    }

    // Function to update a service plan record
    public function update_service_plan($person_id, $plan_id, $data)
    {
        $this->db->where('person_id', $person_id);
        $this->db->where('plan_id', $plan_id);
        $this->db->update('ServicesPlan', $data);

        // Return the result of the update operation
        return $this->db->affected_rows() > 0;
    }

    // Function to delete a service plan record
    public function delete_service_plan($plan_id)
    {
        return $this->db->delete('ServicesPlan', array('plan_id' => $plan_id));
    }
    

    // ******************** Testimonials CRUD ********************


    // Function to insert a new testimonial record
    public function add_testimonial($testimonial_data)
    {
        return $this->db->insert('Testimonials', $testimonial_data);
    }

    // Function to get testimonial records by person_id
    public function get_person_testimonials($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('Testimonials');
        return $query->result_array();
    }

    // Function to get testimonial record by testimonial_id
    public function get_testimonial_by_id($testimonial_id)
    {
        $this->db->where('testimonial_id', $testimonial_id);
        $query = $this->db->get('Testimonials');
        return $query->row_array();
    }

    // Function to update a testimonial record
    public function update_testimonial($person_id, $testimonial_id, $data)
    {
        $this->db->where('person_id', $person_id);
        $this->db->where('testimonial_id', $testimonial_id);
        $this->db->update('Testimonials', $data);

        // Return the result of the update operation
        return $this->db->affected_rows() > 0;
    }

    // Function to delete a testimonial record
    public function delete_testimonial($testimonial_id)
    {
        return $this->db->delete('Testimonials', array('testimonial_id' => $testimonial_id));
    }
}
