<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_actions extends CI_Controller
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
            $data['acciones'] = $this->Dash_model_actions->getActionsxCurrentUser($_SESSION['id']);
            $this->load->view('main/Header_view');
            $this->load->view('actions/Dash_view_actions_showx_currentuser', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
        public function showxCurrentUserPropias()
    {
        if (isset($_SESSION['id'])) {
            $data['acciones'] = $this->Dash_model_actions->getActionsxCurrentUserPropias($_SESSION['id']);
            $this->load->view('main/Header_view');
            $this->load->view('actions/Dash_view_actions_showx_currentuser_propias', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function create()
    {
        if (isset($_SESSION['id'])) {
            $data['leaders'] = $this->Userdb->getUsersxLeaders();
            $data['types'] = $this->Dash_model_useful->getTypes();
            $data['origins'] = $this->Dash_model_origins->getOrigins();
            $data['lider']=$_SESSION['id'];
            $this->load->view('main/Header_view');
            $this->load->view('actions/Dash_view_actions_create', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_actions/showxCurrentUser', "location");
        }
    }
    
    public function CompletarAccion($id)
    {
		$data['id'] = $id;
		$data['acciones'] = $this->Dash_model_actions->getAction($id);
		$this->load->view('main/Header_view');
		$this->load->view('actions/Dash_view_actions_completar', $data);
		$this->load->view('main/Footer_view');
    }
    
    
    public function GuardarAccionCompleta($id)
    {
	if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_actions->GuardaAccionCompleta($id, $_POST);
            if (isset($datastore)) {
                $data['messagetrue'] = 'Acción Completada con Exito'; 
            }else{
                $data['messagefalse'] = 'Error...';
            }
            $this->view_salida($data);
        }
    }

    Public function view_salida($data = null){
        $this->load->view('main/Header_view');
        $this->load->view('nonconformities/View_salida', $data);
        $this->load->view('main/Footer_view');
    }
    public function store()
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_actions->storeAction($_POST);
            if (isset($datastore)) {
                $mail=$this->Userdb->getemail($_POST['responsable']);
                $destinatario=$mail['email'];
                $nombredestinatario=$mail['nombre'];
                $cuerpomail='Estimado usuario '.$nombredestinatario.' ha sido asignado como responsable de la Acción';
                $this->notificarViaMail($destinatario, $nombredestinatario, $cuerpomail);
                $data['messagetrue'] = 'Acción creada existosamente';
                //$datauser = $this->Dash_model_users->getUser($_POST['responsible_id']);
                //$this->sendMail($datauser['email'], 'Estimado: le informamos que posee una nueva acción a realizar.-');
            } else {
                $data['messagefalse'] = 'Error al crear Acción';
            }
            $this->view_salida($data);
        } else {
            redirect('Dash_controller_users', "location");
        }
    }
    
    function notificarViaMail($destinatario, $nombredestinatario, $cuerpomail) {
        
        
        $asunto = 'Aviso Sistema SGAD';
        $this->load->library('email','','correo');
        
        //Email content
        //$htmlContent = $cuerpomail;

   		$this->correo->from('sgadcocyar@gmail.com', 'SGAd');
  		$this->correo->to($destinatario);
  		$this->correo->subject($asunto);
  		$this->correo->message($cuerpomail);
		if($this->correo->send())
  		{
   			
  		}
  		else
  		{
   			show_error($this->correo->print_debugger());
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
