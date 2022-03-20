<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			if (isset($_SESSION['id'])) {
					redirect('Dash_controller_nonconformities/showxCurrentUser', "location");
			}else{
					$this->load->view('credentials/Dash_view_login');
			}
	}

	public function destroy()
    {
        if (isset($_SESSION['id'])) {
            //$iduser = $this->input->get('id');//Otra manera de obtener el id
          //$data = $this->Dash_model_users->destroyUser($_GET['id']);
          $this->load->view('credentials/Dash_view_login');
        } else {
					redirect('menu', "location");

        }
    }  

	private function check_log(){
        if($this->session->userdata('logueado') == FALSE){
            redirect(base_url(), 'refresh');    
        }
	}

	public function verifylogin()
    {
        if($this->check_database() == TRUE)
        {
          redirect('menu', 'refresh');
        }else{
          $this->session->set_flashdata('message', 'Error al loguearse. Verifique los datos.');
          redirect(base_url(), 'refresh');
        }
    }

	function check_database()
    {
      //$this->load->model('Userdb','',TRUE); 
      //Field validation succeeded.  Validate against database
      $username = $this->input->post('email');
      $password=$this->input->post('password');
      //query the database
      $result = $this->Userdb->login($username, $password);

      if($result)
      {
        $sess_array = array();
        //$this->load->model('Proveedordb',true);
        foreach($result as $row)
        {
          
        $sess_array = array(
            'id' => $row->id,
						'username' => $row->username,
            'nombre' => $row->nombre,
            'email' => $row->email,
            'nivel' => $row->nivel,
          );
          
          $this->session->set_userdata($sess_array);
        }
        return TRUE;
      }
      else
      {
        $this->session->unset_userdata('userdata');
        return FALSE;
      }
    }



}
