<?php

class Dash_model_espinapescado extends CI_Model
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

    public function getEspina($id)
    {
        $this->db->select('*');
        $this->db->from('sgad_espina');
		$a='id_noconformidad='.$id;
        $this->db->where($a);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

	
	public function storeEspina($id, $data)
    {
        $this->db->set('id_noconformidad', $id);
        $this->db->set('medidas', $data['medidas']);
        $this->db->set('maquinaria', $data['maquinaria']);
        $this->db->set('manoobra', $data['manoobra']);
        $this->db->set('medioambiente', $data['medioambiente']);
		$this->db->set('metodo', $data['metodo']);
		$this->db->set('material', $data['material']);
        $this->db->insert('sgad_espina');
        return true;
    }

	public function storePorque($id, $data)
    {
        $this->db->set('id_nc', $id);
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

    
}
