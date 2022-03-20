<?php

class Dash_model_useful extends CI_Model
{
    public function getDepartaments()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios

        $this->db->select('iddeptos, departamento');
        $this->db->from('departamentos');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return null;
        }
    }

	public function getUsers()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios

        $this->db->select('id, nombre');
        $this->db->from('users');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return null;
        }
    }

    public function getTypes()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios
        $this->db->select('id, type');
        $this->db->from('types');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return null;
        }
    }

	public function getTypesNC()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios
        $this->db->select('id, type');
        $this->db->from('types_nc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return null;
        }
    }

	public function getTypesSNC()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios
        $this->db->select('id, type');
        $this->db->from('types_snc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return null;
        }
    }

    public function getCategorys()
    {
        //Realizamos una consulta para traer los datos de la tabla usuarios
        $this->db->select('id, category');
        $this->db->from('categorys');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return null;
        }
    }
}
