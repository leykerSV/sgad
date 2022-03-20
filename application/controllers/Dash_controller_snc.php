<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_snc extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $this->load->view('main/Header_view');
            $this->load->view('actions/Dash_view_snc');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function showxCurrentUser()
    {
        if (isset($_SESSION['id'])) {
            $data['snc'] = $this->Dash_model_snc->getActionsxCurrentUser($_SESSION['id']);
            $this->load->view('main/Header_view');
            $this->load->view('snc/Dash_view_snc_showx_currentuser', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function create()
    {
        if (isset($_SESSION['id'])) {
            $data['leaders'] = $this->Userdb->getUsersxLeaders();
            $data['types'] = $this->Dash_model_useful->getTypesSNC();
			$data['origins'] = $this->Dash_model_origins->getOrigins();
            $this->load->view('main/Header_view');
            $this->load->view('snc/Dash_view_snc_create', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function store()
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_snc->storeSnc(1, $_POST);
            if (isset($datastore)) {
                $data['messagetrue'] = 'Acción creada existosmente';
                //$datauser = $this->Dash_model_users->getUser($_POST['responsible_id']);
                //$this->sendMail($datauser['email'], 'Estimado: le informamos que posee una nueva acción a realizar.-');
            } else {
                $data['messagefalse'] = 'Error al crear Acción';
            }
            //$this->view_create_store($data);
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
            //echo 'La zona horaria del script y la zona horaria de la configuración ini(servidor) coinciden.';
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
        $this->email->subject('Nueva Acción - COCYAR');
        $this->email->message($msg);
        $this->email->send();
    }
}
