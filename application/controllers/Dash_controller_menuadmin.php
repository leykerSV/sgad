<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_controller_menuadmin extends CI_Controller
{
    public function index()
    {

    }

    public function todaslasnc()
    {
        if (isset($_SESSION['id'])) {
            $this->load->model('Dash_model_menuadmin');
            $data['todaslasnc'] = $this->Dash_model_menuadmin->todaslasnc();
            $this->load->view('main/Header_view');
            $this->load->view('menuadmin/Dash_view_todaslasnc', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    public function todaslasaccionesnc()
    {
        if (isset($_SESSION['id'])) {
            $this->load->model('Dash_model_menuadmin');
            $data['todaslasaccionesnc'] = $this->Dash_model_menuadmin->todaslasaccionesnc();
            $this->load->view('main/Header_view');
            $this->load->view('menuadmin/Dash_view_todaslasaccionesnc', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
    public function todaslasacciones()
    {
        if (isset($_SESSION['id'])) {
            $this->load->model('Dash_model_menuadmin');
            $data['todaslasacciones'] = $this->Dash_model_menuadmin->todaslasacciones();
            $this->load->view('main/Header_view');
            $this->load->view('menuadmin/Dash_view_todaslasacciones', $data);
            $this->load->view('main/Footer_view');
        } else {
            redirect('Dash_controller_credentials', "location");
        }
    }
    
	public function exportaNC(){
		$conexion = mysqli_connect ("localhost", "sgad", "Cacc#1708");
		mysqli_select_db ($conexion, "cocyar_sgad");
                
                $sql = "SELECT
                    sgad_noconformidad.*,
                    A.nombre as autor,
                    B.nombre as lider,
                    departamentos.departamento as depto,
                    types_nc.type as tipo,
                    origins.origin as origen
                    FROM sgad_noconformidad 
                    INNER JOIN users as A on (sgad_noconformidad.autor=A.id)
                    INNER JOIN users as B on (sgad_noconformidad.lider=B.id)
                    INNER JOIN types_nc on (types_nc.id=sgad_noconformidad.tipo)
                    INNER join departamentos on (departamentos.iddeptos=sgad_noconformidad.depto)
                    INNER join origins on (origins.id=sgad_noconformidad.origen)";
                
		$resultado = mysqli_query ($conexion, $sql) or die ();
		$NCExcel = array();
		while($rows = mysqli_fetch_assoc($resultado) ) {
			$NCExcel[] = $rows;
		};

                mysqli_close($conexion);

		if(!empty($NCExcel)){
			$filename="NoConformidad.xls";
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=".$filename);
			$mostrar_columnas=false;
			foreach($NCExcel as $libro){
				if(!$mostrar_columnas){
					echo implode("\t",array_keys($libro))."\n";$mostrar_columnas=true;
				}
				echo implode("\t",array_values($libro))."\n";
			}
		}else{
			echo'No hay datos a exportar';
		}
		exit;
	}
        
        public function exportaAcciones(){
		$conexion = mysqli_connect ("localhost", "sgad", "Cacc#1708");
		mysqli_select_db ($conexion, "cocyar_sgad");
                
		$sql = "SELECT sgad_acciones.*,
                    A.nombre as lider,
                    B.nombre as responsable,
                    types.type as tipoaccion,
                    origins.origin as origen
                    FROM sgad_acciones 
                    INNER JOIN users as A on (sgad_acciones.lider=A.id)
                    INNER JOIN users as B on (sgad_acciones.responsable=B.id)
                    INNER JOIN types on (types.id=sgad_acciones.tipoaccion)
                    INNER join origins on (origins.id=sgad_acciones.origen)";
                
		$resultado = mysqli_query ($conexion, $sql) or die ();
		$AccionesExcel = array();
		while($rows = mysqli_fetch_assoc($resultado) ) {
			$AccionesExcel[] = $rows;
		};

                mysqli_close($conexion);

		if(!empty($AccionesExcel)){
			$filename="Acciones.xls";
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=".$filename);
			$mostrar_columnas=false;
			foreach($AccionesExcel as $libro){
				if(!$mostrar_columnas){
					echo implode("\t",array_keys($libro))."\n";$mostrar_columnas=true;
				}
				echo implode("\t",array_values($libro))."\n";
			}
		}else{
			echo'No hay datos a exportar';
		}
		exit;
	}
        
        public function exportaAccionesNC(){
		$conexion = mysqli_connect ("localhost", "sgad", "Cacc#1708");
		mysqli_select_db ($conexion, "cocyar_sgad");
                
		$sql = "SELECT sgad_acciones_nc.*,
                    A.nombre as lider,
                    B.nombre as responsable,
                    types.type as tipoaccion,
                    origins.origin as origen
                    FROM sgad_acciones_nc 
                    INNER JOIN users as A on (sgad_acciones_nc.lider=A.id)
                    INNER JOIN users as B on (sgad_acciones_nc.responsable=B.id)
                    INNER JOIN types on (types.id=sgad_acciones_nc.tipoaccion)
                    INNER join origins on (origins.id=sgad_acciones_nc.origen)";
                
		$resultado = mysqli_query ($conexion, $sql) or die ();
		$AccionesNCExcel = array();
		while($rows = mysqli_fetch_assoc($resultado) ) {
			$AccionesNCExcel[] = $rows;
		};

                mysqli_close($conexion);

		if(!empty($AccionesNCExcel)){
			$filename="AccionesNC.xls";
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=".$filename);
			$mostrar_columnas=false;
			foreach($AccionesNCExcel as $libro){
				if(!$mostrar_columnas){
					echo implode("\t",array_keys($libro))."\n";$mostrar_columnas=true;
				}
				echo implode("\t",array_values($libro))."\n";
			}
		}else{
			echo'No hay datos a exportar';
		}
		exit;
	}
        
        public function exportaEspina(){
		$conexion = mysqli_connect ("localhost", "sgad", "Cacc#1708");
		mysqli_select_db ($conexion, "cocyar_sgad");
                
		$sql = "SELECT * FROM sgad_espina";
		$resultado = mysqli_query ($conexion, $sql) or die ();
		$EspinasExcel = array();
		while($rows = mysqli_fetch_assoc($resultado) ) {
			$EspinasExcel[] = $rows;
		};

                mysqli_close($conexion);

		if(!empty($EspinasExcel)){
			$filename="Espinas.xls";
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=".$filename);
			$mostrar_columnas=false;
			foreach($EspinasExcel as $libro){
				if(!$mostrar_columnas){
					echo implode("\t",array_keys($libro))."\n";$mostrar_columnas=true;
				}
				echo implode("\t",array_values($libro))."\n";
			}
		}else{
			echo'No hay datos a exportar';
		}
		exit;
	}
        
        public function exportaPorques(){
		$conexion = mysqli_connect ("localhost", "sgad", "Cacc#1708");
		mysqli_select_db ($conexion, "cocyar_sgad");
                
		$sql = "SELECT * FROM sgad_porques";
		$resultado = mysqli_query ($conexion, $sql) or die ();
		$PorquesExcel = array();
		while($rows = mysqli_fetch_assoc($resultado) ) {
			$PorquesExcel[] = $rows;
		};

                mysqli_close($conexion);

		if(!empty($PorquesExcel)){
			$filename="Porques.xls";
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=".$filename);
			$mostrar_columnas=false;
			foreach($PorquesExcel as $libro){
				if(!$mostrar_columnas){
					echo implode("\t",array_keys($libro))."\n";$mostrar_columnas=true;
				}
				echo implode("\t",array_values($libro))."\n";
			}
		}else{
			echo'No hay datos a exportar';
		}
		exit;
	}
}
