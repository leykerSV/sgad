<?php

class Dash_model_snc extends CI_Model
{

    public function getActionsxCurrentUser($id)
    {
        $this->db->select('sgad_snc.*');
        $this->db->select('users.nombre');
        $this->db->select('types_snc.type');
        $this->db->from('sgad_snc');
        $this->db->where('estado', 0);
        $this->db->where('autor', $id);
        $this->db->join('types_snc', 'types_snc.id=sgad_snc.tipo', 'Left');
        $this->db->join('users', 'users.id=sgad_snc.autor', 'Left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
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

    public function storeSnc($data)
    {
        $this->db->set('fecha', $data['fecha']);
        $this->db->set('salida', $data['salida']);
        $this->db->set('cantidad', $data['cantidad']);
        $this->db->set('autor', $data['autor']);
        $this->db->set('tipo', $data['tipo']);
        $this->db->set('descripcion', $data['descripcion']);
		$this->db->set('verifico', $data['verifico']);
		$this->db->set('verificadopor', $data['verificadopor']);
		$this->db->set('disposicion', $data['disposicion']);
		$this->db->set('estado', $data['estado']);
        $this->db->insert('sgad_snc');
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
