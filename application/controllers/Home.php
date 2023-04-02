<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Load any necessary models, libraries, or helpers here
        // ...
        
        // Set any data that needs to be passed to the view here
        $data['title'] = 'Home Page';
        $data['message'] = 'Welcome to our website!';
        
        // Load the view
        $this->load->view('home', $data);
    }
}
