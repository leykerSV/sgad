<?php

class Dash_model_porques extends CI_Model
{

    public function getActionsxCurrentUser($id)
    {
        $this->db->select('actions.id, actions.action, actions.type_id, actions.responsible_id, actions.deadline, actions.observation, actions.nonconformitie_id');
        $this->db->select('users.name, users.lastname');
        $this->db->select('types.type');
        $this->db->from('actions');
        $this->db->where('implemented', 0);
        $this->db->where('responsible_id', $id);
        $this->db->join('types', 'types.id=actions.type_id', 'Left');
        $this->db->join('users', 'users.id=actions.responsible_id', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

	public function storePorques($id, $data)
    {
        $this->db->set('id_espinapescado', $id);
		$this->db->set('causa', $data['causa']);
        $this->db->set('porque1', $data['porque1']);
        $this->db->set('porque2', $data['porque2']);
        $this->db->set('porque3', $data['porque3']);
        $this->db->set('porque4', $data['porque4']);
        $this->db->set('porque5', $data['porque5']);
	$this->db->set('conclusion', $data['conclusion']);
        $this->db->insert('sgad_porques');
        return true;
    }

	public function CompletaAnalisis($id, $data)
    {
            $this->db->select('desccausas');
            $this->db->from('sgad_noconformidad');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $a=$query->result_array();
            
            if (isset($a[0]['desccausas'])){
                $ingresa = $a[0]['desccausas'].'; '.$data['conclusion'];
            } else {
                $ingresa = $data['conclusion'];
            }
            
            
		$data1 = array(
			'desccausas' => $ingresa
		);
	
		$this->db->where('id', $id);
		$this->db->update('sgad_noconformidad', $data1);
		return true;
    }

	public function getPorque($id)
    {
        $this->db->select('*');
        $this->db->from('sgad_porques');
		$a='id_nc='.$id;
        $this->db->where($a);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

	public function CuentaAnalisis($id)
    {
		$this->db->select('COUNT(*) as contador');
		$this->db->where('id_nc', $id);
		$this->db->from('sgad_porques');
		$query = $this->db->get();
		return $query->result_array();
    }


    public function getAction($id)
    {
        $this->db->select('actions.id, actions.action, actions.type_id, actions.responsible_id, actions.deadline, actions.observation');
        $this->db->select('users.name, users.lastname');
        $this->db->select('types.type');
        $this->db->from('actions');
        $this->db->where('implemented', 0);
        $this->db->where('actions.id', $id);
        $this->db->join('types', 'types.id=actions.type_id', 'Left');
        $this->db->join('users', 'users.id=actions.responsible_id', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function storeAction($id, $data)
    {
        $this->db->set('action', $data['action']);
        $this->db->set('type_id', $data['type_id']);
        $this->db->set('responsible_id', $data['responsible_id']);
        $this->db->set('deadline', $data['deadline']);
        $this->db->set('observation', $data['observation']);
        $this->db->set('nonconformitie_id', $id);
        $this->db->insert('actions');
        return true;
    }

    public function updateOrigin($data, $id)
    {
        /*
        $this->db->set('origin', $data['origin']);        
        $this->db->where('state', 1);
        $this->db->where('id', $id);
        $this->db->update('origins');
        return true;
        */
    }

    public function destroyOrigin($data)
    {
        /*
        $this->db->set('state', 0);
        $this->db->where('id', $data);
        $this->db->update('origins');
        return true;
        */
    }
}
