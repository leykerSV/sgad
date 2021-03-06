<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_espinapescado extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $this->load->view('main/Header_view');
            $this->load->view('actions/Dash_view_actions');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function showxCurrentUser()
    {
        if (isset($_SESSION['id'])) {
            $data['actions'] = $this->Dash_model_actions->getActionsxCurrentUser($_SESSION['id']);
            $this->load->view('main/Header_view');
            $this->load->view('actions/Dash_view_actions_showx_currentuser', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function create($id)
    {
        if (isset($_SESSION['id'])) {
            $data['id'] = $id;
            $this->load->view('main/Header_view');
            $this->load->view('espinapescado/Dash_view_espinapescado_create', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

	public function VerEspina($id)
    {
        if (isset($_SESSION['id'])) {
            $data['espina'] = $this->Dash_model_espinapescado->getEspina($id);
            $this->load->view('main/Header_view');
            $this->load->view('espinapescado/Dash_view_espinapescado_create', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function store($id)
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_espinapescado->storeEspina($id, $_POST);
			//$datastore1 = $this->Dash_model_espinapescado->storePorque($id, $_POST);
			$datastore2 = $this->Dash_model_nonconformities->CompleteNonconformities($id, $_POST);
            if (isset($datastore)) {
                $data['messagetrue'] = 'Espina creada exitosamente';
            } else {
                $data['messagefalse'] = 'Error al crear Acci??n';
            }
            $this->view_salida($data);
        } else {
            redirect('Dash_controller_users', "location");
        }
    }
        
    
    Public function view_salida($data = null){
        $this->load->view('main/Header_view');
        $this->load->view('nonconformities/View_salida', $data);
        $this->load->view('main/Footer_view');
    }

	public function storeporque($id)
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_espinapescado->storePorque($id, $_POST);
            $datastore1 = $this->Dash_model_porques->CompletaAnalisis($id, $_POST);
            
			//$datastore1 = $this->Dash_model_espinapescado->storePorque($id, $_POST);
			//$datastore2 = $this->Dash_model_nonconformities->CompleteNonconformities($id, $_POST);
            
            if (isset($datastore)) {
                $data['messagetrue'] = 'Analisis de porques creado exitosamente';
            } else {
                $data['messagefalse'] = 'Error al crear Acci??n';
            }
            $this->view_salida($data);
        } else {
            redirect('Dash_controller_users', "location");
        }
    }

    public function edit()
    {
        if (isset($_SESSION['id'])) {
            $this->view_edit_update();
        } else {
            redirect('Dash_controller_users', "location");
        }
    }

    public function update()
    {
        if (isset($_SESSION['id'])) {
            $dataupdate = $this->Dash_model_origins->updateOrigin($_POST, $_GET['id']);
            if(isset($dataupdate)){
                $data['messagetrue']= 'Origen editado exitosamente';
            }else{
                $data['messagefalse']= 'Error al editar Origen';
            }
            $this->view_edit_update($data);
        } else {
            redirect('Dash_controller_users', "location");
        }
    }

    public function view_edit_update($data = null)
    {
        $data['dataform'] = $this->Dash_model_actions->getAction($_GET['id']);
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $script_tz = date_default_timezone_get();
        if (strcmp($script_tz, ini_get('date.timezone'))) {
            //echo 'La zona horaria del script difiere de la zona horaria de la configuracion ini(servidor).';
        }else {
            //echo 'La zona horaria del script y la zona horaria de la configuraci??n ini(servidor) coinciden.';
        }
        $data['currentdate'] = getdate();
        $this->load->view('main/Header_view');
        $this->load->view('actions/Dash_view_actions_edit_update', $data);
        $this->load->view('main/Footer_view');
    }

    public function sendMail($email, $msg)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.1and1.com',
            'smtp_port' => 25,
            'smtp_user' => 'barackobama@misitio.com',
            'smtp_pass' => '12345',
            'charset' => 'utf-8',
            'priority' => 1,
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('pabloguillermoalarcon@gmail.com');
        $this->email->to($email);
        $this->email->subject('Nueva Acci??n - COCYAR');
        $this->email->message($msg);
        $this->email->send();
    }
}
