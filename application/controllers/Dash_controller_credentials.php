<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_credentials extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            redirect('Dash_controller_actions/showxCurrentUser', "location");
        }else{
            $this->load->view('credentials/Dash_view_login');
        }
    }

    public function read()
    {
        if (isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] != '' && $_POST['password'] != '') 
        {
            $datalogin = $this->Dash_model_credentials->login($_POST['email'], $_POST['password']);
            if (isset($datalogin))
            {
                $this->session->set_userdata($datalogin);
                
				print_r($_SESSION);
                //$this->session->sess_destroy();
                redirect('Dash_controller_actions/showxCurrentUser', "location");
            }else{
                $message['message'] = "Correo o Contraseña incorrecta";
                $this->load->view('credentials/Dash_view_login', $message);
            }
        }else{
            $message['message'] = "Correo o Contraseña invalida";
            $this->load->view('credentials/Dash_view_login', $message);
        }
    }

    public function delete()
    {
        $this->session->sess_destroy();
        redirect('Dash_controller_credentials', "location");
    }
}
