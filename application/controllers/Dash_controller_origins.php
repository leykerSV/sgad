<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_origins extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $data['origins'] = $this->Dash_model_origins->getOrigins();
            $this->load->view('main/Header_view');
            $this->load->view('origins/Dash_view_origins',$data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    public function create()
    {
        if (isset($_SESSION['id'])) {
            $this->load->view('main/Header_view');
            $this->load->view('origins/Dash_view_origins_create');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    public function store()
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_origins->storeOrigin($_POST);
            if (isset($datastore)) {
                $data['messagetrue'] = 'Origen creado existosamente';
                //$datauser = $this->Dash_model_users->getUser($_POST['responsible_id']);
                //$this->sendMail($datauser['email'], 'Estimado: le informamos que posee una nueva acción a realizar.-');
            } else {
                $data['messagefalse'] = 'Error al crear Origen';
            }
            $this->view_salida($data);
        } else {
            redirect('Dash_controller_users', "location");
        }
    }

    Public function view_salida($data){
            $this->load->view('main/Header_view');
            $this->load->view('origins/Dash_view_origins_create',$data);
            $this->load->view('main/Footer_view');
    }
    
}
