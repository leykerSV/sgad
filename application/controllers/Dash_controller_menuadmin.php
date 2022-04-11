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
                    if ($rows['estado']==0){
                        $rows['estado']="Abierto";
                    }else{
                        $rows['estado']="Cerrado";
                    };
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
                
		$sql = "SELECT sgad_acciones.id,sgad_acciones.fecha,sgad_acciones.origen,sgad_acciones.lider,sgad_acciones.descripcioncausas,sgad_acciones.descripcionacciones,sgad_acciones.tipoaccion,sgad_acciones.responsable,sgad_acciones.plazosejecucion,sgad_acciones.implementada,sgad_acciones.estadoimplementacion,sgad_acciones.eficaz,sgad_acciones.fechaverifeficacia,sgad_acciones.resultadoeficacia,sgad_acciones.observaciones,sgad_acciones.fecharealizacion,sgad_acciones.estadover,
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
                    if ($rows['estadover']==0){
                        $rows['estadover']="Abierto";
                    }else{
                        $rows['estadover']="Cerrado";
                    };
                    if ($rows['plazosejecucion']=="0000-00-00"){
                        $rows['plazosejecucion']="";
                    }
                    if ($rows['fechaverifeficacia']=="0000-00-00"){
                        $rows['fechaverifeficacia']="";
                    }
                    if ($rows['fecharealizacion']=="0000-00-00"){
                        $rows['fecharealizacion']="";
                    }
                    
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
                
		$sql = "SELECT sgad_acciones_nc.id,sgad_acciones_nc.fecha,sgad_acciones_nc.origen,sgad_acciones_nc.lider,sgad_acciones_nc.descripcioncausas,sgad_acciones_nc.descripcionacciones,sgad_acciones_nc.tipoaccion,sgad_acciones_nc.responsable,sgad_acciones_nc.plazosejecucion,sgad_acciones_nc.implementada,sgad_acciones_nc.estadoimplementacion,sgad_acciones_nc.eficaz,sgad_acciones_nc.fechaverifeficacia,sgad_acciones_nc.resultadoeficacia,sgad_acciones_nc.observaciones,sgad_acciones_nc.fecharealizacion,sgad_acciones_nc.estadover,
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
                    if ($rows['estadover']==0){
                        $rows['estadover']="Abierto";
                    }else{
                        $rows['estadover']="Cerrado";
                    };
                    if ($rows['plazosejecucion']=="1970-01-01"){
                        $rows['plazosejecucion']="";
                    }
                    if ($rows['fechaverifeficacia']=="1970-01-01"){
                        $rows['fechaverifeficacia']="";
                    }
                    if ($rows['fecharealizacion']=="1970-01-01"){
                        $rows['fecharealizacion']="";
                    }
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
