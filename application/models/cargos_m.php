<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargos_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
	
	function todos_cargos(){
		$sql = "SELECT carcod, cardes, riesgo FROM funcar";
		$result = $this->db->query($sql);
		if($result->num_rows > 0){
			return $result->result_array();
		}
		else{
			return false;
		}	
	}
	
	function agregar_cargos($datos){
		$sql = "INSERT INTO funcar (carcod,cardes,riesgo,addusr,addfch) VALUES (?,?,?,?,?);";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}

function cargos_web(){
		$sql = "SELECT trim(id) codcar, trim(titulo) nomcar FROM vacantes WHERE estado='activo' ORDER BY id";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}

}
?>