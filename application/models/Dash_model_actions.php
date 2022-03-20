<?php

class Dash_model_actions extends CI_Model
{

    public function getActionsxCurrentUser($id)
    {
        $this->db->select('sgad_acciones.*');
        $this->db->select('users.nombre');
        $this->db->select('types.type');
        $this->db->select('origins.origin');
        $this->db->from('sgad_acciones');
	$a='responsable='.$id;
        $this->db->where($a);
        $this->db->join('types', 'types.id=sgad_acciones.tipoaccion', 'Left');
        $this->db->join('users', 'users.id=sgad_acciones.responsable', 'Left');
        $this->db->join('origins', 'origins.id=sgad_acciones.origen', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
        public function getActionsxCurrentUserPropias($id)
    {
        $this->db->select('sgad_acciones.*');
        $this->db->select('users.nombre');
        $this->db->select('types.type');
        $this->db->select('origins.origin');
        $this->db->from('sgad_acciones');
	$a='lider='.$id;
        $this->db->where($a);
        $this->db->join('types', 'types.id=sgad_acciones.tipoaccion', 'Left');
        $this->db->join('users', 'users.id=sgad_acciones.lider', 'Left');
        $this->db->join('origins', 'origins.id=sgad_acciones.origen', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function getAction($id)
    {
        $this->db->select('sgad_acciones.*');
        $this->db->select('users.nombre');
        $this->db->select('types.type');
        $this->db->from('sgad_acciones');
        //$this->db->where('implemented', 0);
        $this->db->where('sgad_acciones.id', $id);
        $this->db->join('types', 'types.id=sgad_acciones.id', 'Left');
        $this->db->join('users', 'users.id=sgad_acciones.responsable', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

   
    function GuardaAccionCompleta($id,$data){
                var_dump($data);
		$a='id='.$id;
                if ($data["fecharealizacion"]== '') {
                    $data["fecharealizacion"]='0000-00-00';
                }else{
                    $data["fecharealizacion"] = date("Y-m-d", strtotime($data["fecharealizacion"]));
                }
                
                if ($data["fechaverifeficacia"]== '') {
                    $data["fechaverifeficacia"]='0000-00-00';
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
		$this->db->update('sgad_acciones', $data1);
		return true;
	}
    
    public function storeAction($data)
    {
	$data['lider']=$_SESSION['id'];
        $originalDate = $data['fecha'];
        $data['fecha'] = date("Y-m-d", strtotime($originalDate));
        
        $originalDate = $data['plazosejecucion'];
        $data['plazosejecucion'] = date("Y-m-d", strtotime($originalDate));
        
        $this->db->insert('sgad_acciones', $data);
        return true;
    }

	public function updateAction($data)
    {
        $this->db->update('sgad_acciones', $data);
		return true;
    }


}
