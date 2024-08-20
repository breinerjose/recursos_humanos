<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class basico_my extends CI_Model {	
	function __Construct(){
	   parent::__construct();
	}
	
	function consultar($campos,$tabla,$condicion){
		$loc = $this->load->database('mysql', TRUE);
		$loc->select($campos);
		$loc->from($tabla);
		$loc->where($condicion);
		$res = $loc->get();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultar_orden($campos,$tabla,$condicion,$orden){
		$loc = $this->load->database('mysql', TRUE);
		$loc->select($campos);
		$loc->from($tabla);
		$loc->where($condicion);
		$loc->order_by($orden);
		$res = $loc->get();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultarf($campos,$tabla,$condicion){
		$loc = $this->load->database('mysql', TRUE);
		$loc->select($campos);
		$loc->from($tabla);
		$loc->where($condicion);
		$res = $loc->get();
		if($res->num_rows()>0){return $res->row_array();}else{return false;}
	}
	
	public function insertar($tabla,$data){
	$loc = $this->load->database('mysql', TRUE);
	$loc->insert($tabla,$data);
	if($loc->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function actualizar($tabla,$data,$condicion){
	$loc = $this->load->database('mysql', TRUE);
	$loc->set($data);
	$loc->where($condicion);
	$loc->update($tabla);
	//echo $this->loc->last_query();
	if($loc->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	
	
	
	
} 