<?php

class Dash_model_nonconformities extends CI_Model
{
    public function getNonconfomities($id)
    {
	$this->db->select('*');
        /*$this->db->select('origins.origin');
        $this->db->select('types.type');
        $this->db->select('departaments.departament');
        $this->db->select('roles.rol');
        $this->db->select('nonconformities_stratum.stratum');*/
        $this->db->from('sgad_noconformidad');
        $this->db->where('lider', $id);
        /*$this->db->join('origins', 'origins.id=nonconformities.origin_id', 'inner');
        $this->db->join('types', 'types.id=nonconformities.type_id', 'inner');
        $this->db->join('departaments', 'departaments.id=nonconformities.departament_id', 'inner');
        $this->db->join('roles', 'roles.id=nonconformities.leader_id', 'inner');
        $this->db->join('nonconformities_stratum', 'nonconformities.stratum_id=nonconformities_stratum.id', 'Left');*/
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getNonconformitie($id)
    {
		$this->db->select('*');
        /*$this->db->select('origins.origin');
        $this->db->select('types.type');
        $this->db->select('departaments.departament');
        $this->db->select('roles.rol');
        $this->db->select('nonconformities_stratum.stratum');*/
        $this->db->from('sgad_noconformidad');
        $this->db->where('id', $id);
        /*$this->db->join('origins', 'origins.id=nonconformities.origin_id', 'inner');
        $this->db->join('types', 'types.id=nonconformities.type_id', 'inner');
        $this->db->join('departaments', 'departaments.id=nonconformities.departament_id', 'inner');
        $this->db->join('roles', 'roles.id=nonconformities.leader_id', 'inner');
        $this->db->join('nonconformities_stratum', 'nonconformities.stratum_id=nonconformities_stratum.id', 'Left');*/
        $query = $this->db->get();
        return $query->row_array();

    }
    
    public function CuentaNC($id)
    {
        $this->db->select('*');
        $this->db->from('sgad_noconformidad');
        $this->db->where('lider', $id);
        $query = $this->db->get();
        return $query->num_rows();;
    }
    
    public function CuentaAccionesNC($id)
    {
        $this->db->select('*');
        $this->db->from('sgad_acciones_nc');
        $this->db->where('responsable', $id);
        $query = $this->db->get();
        return $query->num_rows();;
    }

	public function verNC($id)
    {
		$this->db->select('*');
        $this->db->select('origins.origin');
        $this->db->select('types_nc.type');
        $this->db->select('departamentos.departamento');
		$this->db->select('users.nombre');
        /*$this->db->select('roles.rol');
        $this->db->select('nonconformities_stratum.stratum');*/
        $this->db->from('sgad_noconformidad');
        $this->db->where('sgad_noconformidad.id', $id);
        $this->db->join('origins', 'origins.id=sgad_noconformidad.origen', 'inner');
        $this->db->join('types_nc', 'types_nc.id=sgad_noconformidad.tipo', 'inner');
        $this->db->join('departamentos', 'departamentos.iddeptos=sgad_noconformidad.depto', 'inner');
		$this->db->join('users', 'users.id=sgad_noconformidad.lider', 'inner');
        /*$this->db->join('roles', 'roles.id=nonconformities.leader_id', 'inner');
        $this->db->join('nonconformities_stratum', 'nonconformities.stratum_id=nonconformities_stratum.id', 'Left');*/
        $query = $this->db->get();
        return $query->row_array();

    }

    public function getActionsxCurrentUser($id)
    {
        $this->db->select('sgad_acciones_nc.*');
        $this->db->select('users.nombre');
        $this->db->select('types.type');
        $this->db->from('sgad_acciones_nc');
        //$this->db->where('implemented', 0);
        $this->db->where('responsable', $id);
        $this->db->join('types', 'types.id=sgad_acciones_nc.id', 'Left');
        $this->db->join('users', 'users.id=sgad_acciones_nc.responsable', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    
    public function getActionNC($id)
    {
        $this->db->select('sgad_acciones_nc.*');
        $this->db->select('users.nombre');
        $this->db->select('types.type');
        $this->db->from('sgad_acciones_nc');
        //$this->db->where('implemented', 0);
        $this->db->where('sgad_acciones_nc.id', $id);
        $this->db->join('types', 'types.id=sgad_acciones_nc.id', 'Left');
        $this->db->join('users', 'users.id=sgad_acciones_nc.responsable', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    public function getActionsxCurrentUserNC($id_nc)
    {
        $this->db->select('sgad_acciones_nc.*');
        $this->db->select('users.nombre');
		$this->db->select('origins.origin');
        $this->db->select('types.type');
        $this->db->from('sgad_acciones_nc');
		$a='id_noconformidad='.$id_nc;
        $this->db->where($a);
        //$this->db->where('responsable', $id_nc);
        $this->db->join('types', 'types.id=sgad_acciones_nc.tipoaccion', 'inner');
        $this->db->join('users', 'users.id=sgad_acciones_nc.responsable', 'inner');
		//$this->db->join('users', 'users.id=sgad_acciones_nc.lider', 'inner');
		$this->db->join('origins', 'origins.id=sgad_acciones_nc.origen', 'inner');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

	public function CerrarNC($id)
    {
        $this->db->set('estado', '1', FALSE);
		$this->db->where('id', $id);
		$this->db->update('sgad_noconformidad');
    }
    
    	public function CerrarNC_1($data)
    {
        $this->db->set('retroanalisis', $data['retroanalisis'], FALSE);
        $this->db->set('procesocambio', $data['procesocambio'], FALSE);
        $this->db->where('id', $data['id']);
        $cad="Update sgad_noconformidad set retroanalisis='".$data['retroanalisis']."', procesocambio='".$data['procesocambio']."' where id=".$data['id'];
        $this->db->query($cad);
    }

	
	public function getActionsxCurrentUserNC1($idusuario)
    {
        $this->db->select('sgad_acciones_nc.*');
        $this->db->select('users.nombre');
		$this->db->select('origins.origin');
        $this->db->select('types.type');
        $this->db->from('sgad_acciones_nc');
		$a='responsable='.$idusuario;
        $this->db->where($a);
        $this->db->join('types', 'types.id=sgad_acciones_nc.tipoaccion', 'inner');
        $this->db->join('users', 'users.id=sgad_acciones_nc.responsable', 'inner');
		//$this->db->join('users', 'users.id=sgad_acciones_nc.lider', 'inner');
		$this->db->join('origins', 'origins.id=sgad_acciones_nc.origen', 'inner');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function getNonconfomitiesxCurrentUser($id)
    {
        $this->db->select('sgad_noconformidad.*');
		$this->db->select('origins.origin');
		$this->db->select('users.nombre');
		$this->db->select('types_nc.type');
		$this->db->select('departamentos.departamento');
        $this->db->from('sgad_noconformidad');
        $this->db->where('lider', $id);
        $this->db->join('origins', 'origins.id=sgad_noconformidad.origen', 'inner');
		$this->db->join('users', 'users.id=sgad_noconformidad.autor', 'inner');
		$this->db->join('types_nc', 'types_nc.id=sgad_noconformidad.tipo', 'inner');
		$this->db->join('departamentos', 'departamentos.iddeptos=sgad_noconformidad.depto', 'inner');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    public function getNonconfomitiesxCurrentUserPropias($id)
    {
        $this->db->select('sgad_noconformidad.*');
		$this->db->select('origins.origin');
		$this->db->select('users.nombre');
		$this->db->select('types_nc.type');
		$this->db->select('departamentos.departamento');
        $this->db->from('sgad_noconformidad');
        $this->db->where('autor', $id);
        $this->db->join('origins', 'origins.id=sgad_noconformidad.origen', 'inner');
		$this->db->join('users', 'users.id=sgad_noconformidad.autor', 'inner');
		$this->db->join('types_nc', 'types_nc.id=sgad_noconformidad.tipo', 'inner');
		$this->db->join('departamentos', 'departamentos.iddeptos=sgad_noconformidad.depto', 'inner');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function storeNonconformities($data)
    {
            $newDate = date("Y-m-d", strtotime($data["fecha"]));
            $this->db->set('fecha', $newDate);
            $this->db->set('origen', $data['origen']);
            $this->db->set('autor', $_SESSION['id']);
            $this->db->set('tipo', $data['tipo']);
            $this->db->set('descnoconf', $data['descnoconf']);
            $this->db->set('lider', $data['lider']);
            $this->db->set('depto', $data['depto']);
            $this->db->set('docasociada', $data['docasociada']);
            $this->db->set('observaciones', $data['observaciones']);
            $this->db->insert('sgad_noconformidad');
            $devid=$this->db->query('SELECT MAX(id) AS id FROM sgad_noconformidad');
        foreach ($devid->result() as $row)
        {
            return $row->id;
        }

    }

    public function GuardaAccion($id, $data)
    {
        $this->db->set('id_noconformidad', $id);
        if ($data["fecha"]== '0000-00-00') {
            $FchEntrada=NULL;
            $this->db->set('fecha', $FchEntrada);
        }else{
            $newDate = date("Y-m-d", strtotime($data["fecha"]));
            $this->db->set('fecha', $newDate);
        }
        
        if ($data["plazosejecucion"]== '0000-00-00') {
            $FchEntrada=NULL;
            $this->db->set('plazosejecucion', $FchEntrada);
        }else{
            $newDate = date("Y-m-d", strtotime($data["plazosejecucion"]));
            $this->db->set('plazosejecucion', $newDate);
        }
        
        $this->db->set('origen', $data['origen']);
	$this->db->set('lider', $data['lider']);
        $this->db->set('descripcioncausas', $data['descripcioncausas']);
	$this->db->set('descripcionacciones', $data['descripcionacciones']);
        $this->db->set('tipoaccion', $data['tipoaccion']);
	$this->db->set('responsable', $data['responsable']);
        $this->db->set('id_noconformidad', $id);
        
        if ($data["plazosejecucion"]== '0000-00-00') {
            $FchEntrada=NULL;
            $this->db->set('plazosejecucion', $FchEntrada);
        }else{
            $newDate = date("Y-m-d", strtotime($data["plazosejecucion"]));
            $this->db->set('plazosejecucion', $newDate);
        }

        $this->db->set('implementada', $data['implementada']);
	$this->db->set('estadoimplementacion', $data['estadoimplementacion']);
	$this->db->set('eficaz', $data['eficaz']);
        
        if ($data["fechaverifeficacia"]== '0000-00-00') {
            $FchEntrada=NULL;
            $this->db->set('fechaverifeficacia', $FchEntrada);
        }else{
            $newDate = date("Y-m-d", strtotime($data["fechaverifeficacia"]));
            $this->db->set('fechaverifeficacia', $newDate);
        }

	$this->db->set('resultadoeficacia', $data['resultadoeficacia']);
	$this->db->set('retroanalisis', $data['retroanalisis']);
	$this->db->set('procesocambio', $data['procesocambio']);
	$this->db->set('observaciones', $data['observaciones']);
	$this->db->set('estadoimp', $data['estadoimp']);
	$this->db->set('estadover', $data['estadover']);
        if ($data["fecharealizacion"]== '0000-00-00') {
            $FchEntrada=NULL;
            $this->db->set('fecharealizacion', $FchEntrada);
        }else{
            $newDate = date("Y-m-d", strtotime($data["fecharealizacion"]));
            $this->db->set('fecharealizacion', $newDate);
        }
        $this->db->insert('sgad_acciones_nc');
        $devid=$this->db->query('SELECT MAX(id) AS id FROM sgad_acciones_nc');
        foreach ($devid->result() as $row)
        {
            return $row->id;
        }
        return true;
    }

	function GuardaAccionCompleta($id,$data){
                var_dump($data);
		$a='id='.$id;
                if ($data["fecharealizacion"]== '0000-00-00') {
                    $data["fecharealizacion"]=NULL;
                }else{
                    $data["fecharealizacion"] = date("Y-m-d", strtotime($data["fecharealizacion"]));
                }
                
                if ($data["fechaverifeficacia"]== '0000-00-00') {
                    $data["fechaverifeficacia"]=NULL;
                }else{
                    $data["fechaverifeficacia"] = date("Y-m-d", strtotime($data["fechaverifeficacia"]));
                }
                
                
                $data1 =array(
                    'implementada' => $data['implementada'],
                    'estadoimplementacion' => $data['estadoimplementacion'],
                    'eficaz' => $data['eficaz'],
                    'fechaverifeficacia' => $data['fechaverifeficacia'],
                    'resultadoeficacia' => $data['resultadoeficacia'],
                    'fecharealizacion' => $data['fecharealizacion'],
                    'observaciones' => $data['observaciones']               
                );
                
		$this->db->where($a);
		$this->db->update('sgad_acciones_nc', $data1);
		return true;
	}

	public function CompleteNonconformities($id, $data)
    {
		$data1 = array(
			'analisissignificancia' => $data['analisissignificancia'],
			'desccausas' => $data['desccausas'],
			'espinayporque' => 1
		);
	
		$this->db->where('id', $id);
		$this->db->update('sgad_noconformidad', $data1);
		return true;
    }

	public function EspinaCargada($id)
    {
		$data1 = array(
			'espinayporque' =>'1'
		);
	
		$this->db->where('id', $id);
		$this->db->update('sgad_noconformidad', $data1);
		return true;
    }

}
