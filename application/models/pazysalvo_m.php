<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PazySalvo_m extends CI_Model {

	function __Construct(){
	   parent::__construct();
	}
	
		function Estado_Empleados_PazySalvo(){
			$sql1 = "SELECT id_persona , c, estadoemp from bre_pazysalvo 
			WHERE c != ''
			GROUP BY id_persona, c, estadoemp";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
		}
		
	//actualizar informacion
    function cambiarestado($datos,$condi,$tbl){
        $this->db->where($condi);
        $this->db->update($tbl, $datos);
       //echo $this->db->last_query();
       //exit();
        return ($this->db->affected_rows()>0) ? true : false;   
    }
	
	function cambiarestadodatos($datos,$condi,$tbl){
        $this->db->where($condi);
        $this->db->update($tbl, $datos);
       //echo $this->db->last_query();
       //exit();
        return ($this->db->affected_rows()>0) ? true : false;   
    }
       
}