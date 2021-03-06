<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_nonconformities extends CI_Controller
{

    public function index()
    {
	if (isset($_SESSION['id'])) {
            $data['nonconformities'] = $this->Dash_model_nonconformities->getNonconfomitiesxCurrentUser($_SESSION['id']);
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view');
            $this->load->view('nonconformities/Dash_view_nonconformities_showx_currentuser', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function showxCurrentUser()
    {
        if (isset($_SESSION['id'])) {
            $data['nonconformities'] = $this->Dash_model_nonconformities->getNonconfomitiesxCurrentUser($_SESSION['id']);
            $data['titulo']="Listado de N/C Asignadas";
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view', $data);
            $this->load->view('nonconformities/Dash_view_nonconformities_showx_currentuser');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    public function showxCurrentUserPropias()
    {
        if (isset($_SESSION['id'])) {
            $data['nonconformities'] = $this->Dash_model_nonconformities->getNonconfomitiesxCurrentUserPropias($_SESSION['id']);
            $data['titulo']="Listado de N/C Propias";
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view', $data);
            $this->load->view('nonconformities/Dash_view_nonconformities_showx_currentuser');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    

    public function showxCurrentUserActionsDetails($id_nc)
    {
        if (isset($_SESSION['id'])) {
            $data['acciones'] = $this->Dash_model_nonconformities->getActionsxCurrentUserNC($id_nc);
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view', $data);
            $this->load->view('nonconformities/Dash_view_actions_showx_currentuser');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

	public function VerEspina($id)
    {
        if (isset($_SESSION['id'])) {
			$data['espinas'] = $this->Dash_model_espinapescado->getEspina($id);
                        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
                        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
                        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
			$this->load->view('main/Header_view', $data);
			$this->load->view('espinapescado/Dash_view_espinapescado_showx_currentuser');
			$this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

	public function VerPorques($id)
    {
        if (isset($_SESSION['id'])) {
			$data['porques'] = $this->Dash_model_porques->getPorque($id);
                        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
                        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
                        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
			$this->load->view('main/Header_view', $data);
			$this->load->view('porques/Dash_view_porques_showx_currentuser');
			$this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

	public function CerrarNC($id)
    {
        if (isset($_SESSION['id'])) {
            $datastore=$this->Dash_model_nonconformities->CerrarNC($id);
            $datastore=$this->Dash_model_nonconformities->CerrarNC_1($_POST);
            //$data['nonconformities'] = $this->Dash_model_nonconformities->getNonconfomitiesxCurrentUser($_SESSION['id']);
            $data['messagetrue'] = 'NC Cerrada';
            $this->view_salida($data);
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    public function CerrarNC_view($id)
    {
        $data['id']=$id;
        $data['departaments'] = $this->Dash_model_useful->getDepartaments();
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('nonconformities/Dash_view_nonconformities_cerrar');
        $this->load->view('main/Footer_view');
        
    }

    public function create()
    {
        if (isset($_SESSION['id'])) {
            $data['departaments'] = $this->Dash_model_useful->getDepartaments();
            $data['types'] = $this->Dash_model_useful->getTypesNC();
            $data['origins'] = $this->Dash_model_origins->getOrigins();
            $data['leaders'] = $this->Userdb->getUsersxLeaders();
            $this->view_alta_nc($data);
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

	public function completar($idNC)
    {
        if (isset($_SESSION['id'])) {
            $data['id']=$idNC;
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view', $data);
            $this->load->view('nonconformities/Dash_view_nonconformities_complete');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function view_alta_nc($data = null){
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('nonconformities/Dash_view_nonconformities_create');
        $this->load->view('main/Footer_view');
    }

    public function store()
    {
        if (isset($_SESSION['id'])) {
            $datastore=$this->Dash_model_nonconformities->storeNonconformities($_POST);
            if (isset($datastore)) {
                $mail=$this->Userdb->getemail($_POST['lider']);
                $destinatario=$mail['email'];
                $nombredestinatario=$mail['nombre'];
                $nc=$datastore;
                $cuerpomail='Estimado usuario '.$nombredestinatario.' ha sido asignado como lider de No Conformidad nro. '.$datastore;
                $this->notificarViaMail($destinatario, $nombredestinatario, $nc, $cuerpomail);        
                $data['messagetrue'] = 'NC creado existosamente';
            } else {
                $data['messagefalse'] = 'Error al crear NC';
            }            
            $this->view_alta_nc($data);
        } else {
            redirect('menu', 'refresh');
        }
    }
    
    function notificarViaMail($destinatario, $nombredestinatario, $nc, $cuerpomail) {
        
        
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

    public function complete()
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_nonconformities->CompleteNonconformities($_POST);
            if (isset($datastore)) {
                $data['messagetrue'] = 'No conformidad creada existosamente';
		$data['nonconformities'] = $this->Dash_model_nonconformities->getNonconfomitiesxCurrentUser($_SESSION['id']);
                $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
                $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
                $this->load->view('main/Header_view', $data);
            	$this->load->view('nonconformities/Dash_view_nonconformities_showx_currentuser');
            	$this->load->view('main/Footer_view');
            } else {
                $data['messagefalse'] = 'Error al crear No conformidad';
            }
            //$this->view_create_store($data);

		$data['nonconformities'] = $this->Dash_model_nonconformities->getNonconfomitiesxCurrentUser($_SESSION['id']);
		$data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);	
                $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
                $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
                $this->load->view('main/Header_view', $data);
            $this->load->view('nonconformities/Dash_view_nonconformities_showx_currentuser');
            $this->load->view('main/Footer_view');
        } else {
            redirect('menu', 'refresh');
        }
    }

	public function crearAccion($id)
    {
        if (isset($_SESSION['id'])) {
            $data['leaders'] = $this->Userdb->getUsersxLeaders();
            $data['types'] = $this->Dash_model_useful->getTypes();
            $data['origins'] = $this->Dash_model_origins->getOrigins();
            $data['noconformidad'] = $this->Dash_model_nonconformities->getNonconformitie($id);
            $data['id'] = $id;
            $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
            $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
            $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
            $this->load->view('main/Header_view', $data);
            $this->load->view('nonconformities/Dash_view_actions_create');
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

	public function GuardaAccion($id)
    {
        if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_nonconformities->GuardaAccion($id, $_POST);
            if (isset($datastore)) {
                $mail=$this->Userdb->getemail($_POST['responsable']);
                $destinatario=$mail['email'];
                $nombredestinatario=$mail['nombre'];
                $nc=$datastore;
                $cuerpomail='Estimado usuario '.$nombredestinatario.' ha sido asignado como responsable de la Acci??n nro.'.$datastore.' de No Conformidad nro. '.$id;
                $this->notificarViaMail($destinatario, $nombredestinatario, $nc, $cuerpomail);
                $data['messagetrue'] = 'Acci??n Creada con Exito';
                
            }else{
                $data['messagefalse'] = 'Error en la creaci??n de la Acci??n';
            }
	$this->view_salida($data);
        } else {
            redirect('menu', 'refresh');
        }
    }

    public function edit()
    {
        if (isset($_SESSION['id'])) {
            $data['dataform'] = $this->Dash_model_nonconformities->getNonconformitie($_GET['id']);
            $this->view_edit_update($data);
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }

    public function view_create_store($data = null)
    {
        $data['departaments'] = $this->Dash_model_useful->getDepartaments();
        $data['types'] = $this->Dash_model_useful->getTypesNC();
        $data['origins'] = $this->Dash_model_origins->getOrigins();
        $data['leaders'] = $this->Userdb->getUsersxLeaders();
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('nonconformities/Dash_view_nonconformities_create_store');
        $this->load->view('main/Footer_view');
    }

	public function Ver_NC($idnc)
    {
		$data['noconformidad'] = $this->Dash_model_nonconformities->VerNC($idnc);
                $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
                $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
                $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
		$this->load->view('main/Header_view', $data);
		$this->load->view('nonconformities/Dash_view_nonconformities_View');
		$this->load->view('main/Footer_view');
    }

	public function CompletarAccion($id)
    {
		$data['id'] = $id;
		$data['acciones'] = $this->Dash_model_nonconformities->getActionNC($id);
                $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
                $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
                $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
		$this->load->view('main/Header_view', $data);
		$this->load->view('nonconformities/Dash_view_actions_completar');
		$this->load->view('main/Footer_view');
    }

    public function GuardarAccionCompleta($id)
    {
	if (isset($_SESSION['id'])) {
            $datastore = $this->Dash_model_nonconformities->GuardaAccionCompleta($id, $_POST);
            if (isset($datastore)) {
                $data['messagetrue'] = 'Acci??n Completada con Exito'; 
            }else{
                $data['messagefalse'] = 'Error en la creaci??n de la Acci??n';
            }
            $this->view_salida($data);
        }
    }

	public function view_create_complete($data = null)
    {
        $data['departaments'] = $this->Dash_model_useful->getDepartaments();
        $data['types'] = $this->Dash_model_useful->getTypesNC();
        $data['origins'] = $this->Dash_model_origins->getOrigins();
        $data['leaders'] = $this->Userdb->getUsersxLeaders();
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('nonconformities/Dash_view_nonconformities_complete');
        $this->load->view('main/Footer_view');
    }
    
    public function view_salida($data = null){
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('nonconformities/View_salida');
        $this->load->view('main/Footer_view');
    }

    public function view_create_edit($data = null){
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('pedidos/View_Pedidos_create_edit');
        $this->load->view('main/Footer_view');
    }

    public function view_edit_update($data = null)
    {
        $data['departaments'] = $this->Dash_model_useful->getDepartaments();
        $data['types'] = $this->Dash_model_useful->getTypes();
        $data['origins'] = $this->Dash_model_origins->getOrigins();
        $data['leaders'] = $this->Dash_model_users->getUsersxLeaders();
        $data['AccionesNCCOntador'] = $this->Dash_model_nonconformities->CuentaAccionesNC($_SESSION['id']);
        $data['NCContador'] = $this->Dash_model_nonconformities->CuentaNC($_SESSION['id']);
        $data['AccionContador'] = $this->Dash_model_actions->CuentaAccion($_SESSION['id']);
        $this->load->view('main/Header_view', $data);
        $this->load->view('nonconformities/Dash_view_nonconformities_edit_update');
        $this->load->view('main/Footer_view');
    }
}
