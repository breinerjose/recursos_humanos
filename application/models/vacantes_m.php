<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacantes_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	   $this->web=$this->load->database('web',true);
	}

	function cargos_web(){
		$sql = "SELECT trim(id) codcar, trim(titulo) nomcar, descripcion, estado FROM vacantes";
		$res = $this->web->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}
	
	function vacantesi($datos){
	$sql = "INSERT INTO vacantes (titulo,descripcion,addusr,addfch) VALUES (?,?,?,?);";
			$this->web->query($sql,$datos);
			if($this->web->affected_rows()){ return true; }else{ return false; }	
	}	
	
	function vacantesu($datos){
		$sql = "update vacantes set estado=?, updusr=?, updfch=? where id=?;";
		$this->web->query($sql,$datos);
		if($this->web->affected_rows()){ return true; }else{ return false; }	
	}

function actualizar($tabla,$data,$condicion){
	$this->web->set($data);
	$this->web->where($condicion);
	$this->web->update($tabla);
	if($this->web->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function borrar($tabla,$condicion){
		$this->web->where($condicion);
		$this->web->delete($tabla);
		if($this->web->affected_rows()){
			return true;
		}else {
			return false;	
		}
	}	
}