<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
    {

    }

	public function menu()
    {
        if (isset($_SESSION['id'])) {
            $this->load->view('main/Header_view');
            $this->load->view('main/Principal_view');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
	
}
