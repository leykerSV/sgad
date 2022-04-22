<?php
  /**
  * Modulo de Usarios.
  *
  * 
  * @package     LeykerSoft/sgad
  * @copyright   Copyright (c) Leyker Soft - 2021
  * @license     https://www.leyker.com.ar/eb/licencia.txt
  * @version     1.0.0
  * @author      Leyker <dleyendeker@gmail.com>
  *
  * @Date 25-16-2016
  *
  */
Class Userdb extends CI_Model
{

    function login($username, $password)
    {
        date_default_timezone_set('America/Argentina/Cordoba');
        $DB2 = $this->load->database('login', TRUE);
        $DB2->select('id, nombre, email, username, password, nivel, habilitado');
        $DB2->from('users');
        $DB2->where('email = ' . "'" . $username . "'");
        $DB2->where('password = ' . "'" . MD5($password) . "'");
        $DB2->where('habilitado = ' . "'" . 1 . "'");
        $DB2->limit(1);

        $query = $DB2->get();
        $a=$query->result();

        if($query->num_rows() == 1)
        {


            return $query->result();
        }
        else
        {
                return false;
        }
    }

	public function getUsersxLeaders()
    {
        $DB2 = $this->load->database('login', TRUE);
        $DB2->select('id, nombre');
        $DB2->from('users');
        $DB2->where('habilitado', 1);
        $DB2->order_by("nombre", "asc");
        $query = $DB2->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

}   
