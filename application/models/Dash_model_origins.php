<?php

class Dash_model_origins extends CI_Model
{
    public function getOrigins()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios
        $this->db->select('id, origin');
        $this->db->from('origins');
        $this->db->where('state', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function getOrigin($id)
    {
        $this->db->select('id, origin');
        $this->db->from('origins');
        $this->db->where('id', $id);
        $this->db->where('state', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function storeOrigin($data)
    {
        $this->db->set('origin', $data['origin']);
        $this->db->set('state', 1);
        $this->db->insert('origins');
        return true;
    }

    public function updateOrigin($data, $id)
    {
        $this->db->set('origin', $data['origin']);        
        $this->db->where('state', 1);
        $this->db->where('id', $id);
        $this->db->update('origins');
        return true;
    }

    public function destroyOrigin($data)
    {
        $this->db->set('state', 0);
        $this->db->where('id', $data);
        $this->db->update('origins');
        return true;
    }
}
