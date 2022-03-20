<?php

class Dash_model_menuadmin extends CI_Model
{

    public function todaslasnc()
    {
        $this->db->select('sgad_noconformidad.*');
        $this->db->select('A.nombre as autor');
        $this->db->select('B.nombre as lider');
        $this->db->select('departamentos.departamento');
        $this->db->select('types_nc.type as tipo');
        $this->db->select('origins.origin');
        $this->db->from('sgad_noconformidad');
        $this->db->join('types_nc', 'types_nc.id=sgad_noconformidad.tipo');
        $this->db->join('users as A', 'sgad_noconformidad.autor=A.id');
        $this->db->join('users as B', 'sgad_noconformidad.lider=B.id');
        $this->db->join('origins', 'origins.id=sgad_noconformidad.origen');
        $this->db->join('departamentos', 'departamentos.iddeptos=sgad_noconformidad.depto');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    public function todaslasaccionesnc()
    {
        $this->db->select('sgad_acciones_nc.*');
        $this->db->select('A.nombre as lider');
        $this->db->select('B.nombre as responsable');
        $this->db->select('types.type as tipoaccion');
        $this->db->select('origins.origin');
        $this->db->from('sgad_acciones_nc');
        $this->db->join('types', 'types.id=sgad_acciones_nc.tipoaccion');
        $this->db->join('users as A', 'sgad_acciones_nc.lider=A.id');
        $this->db->join('users as B', 'sgad_acciones_nc.responsable=B.id');
        $this->db->join('origins', 'origins.id=sgad_acciones_nc.origen');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    public function todaslasacciones()
    {
        $this->db->select('sgad_acciones.*');
        $this->db->select('A.nombre as lider');
        $this->db->select('B.nombre as responsable');
        $this->db->select('types.type as tipoaccion');
        $this->db->select('origins.origin');
        $this->db->from('sgad_acciones');
        $this->db->join('types', 'types.id=sgad_acciones.tipoaccion');
        $this->db->join('users as A', 'sgad_acciones.lider=A.id');
        $this->db->join('users as B', 'sgad_acciones.responsable=B.id');
        $this->db->join('origins', 'origins.id=sgad_acciones.origen');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    public function exporta($consulta){
        date_default_timezone_set('America/Argentina/Cordoba');
        $this->load->database(); 
        $fecha = date_create();
        $extra=date_timestamp_get($fecha);
        $fila="'/home/leyker/Descargass/".$extra."exportacion.csv'";
        $fila1="'/var/lib/mysql-files/".$extra."exportacion.csv'";
        $cadena=$consulta.$fila1;
        $this->db->query($cadena);
        return $extra."exportacion.csv";
    }
    
}
