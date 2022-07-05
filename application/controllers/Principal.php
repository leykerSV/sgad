<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
    {

    }

	public function menu()
    {
        if (isset($_SESSION['id'])) {
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view',$data);
            $this->load->view('main/Principal_view');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
	
}
