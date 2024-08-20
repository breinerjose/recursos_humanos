<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class basico_m extends CI_Model {	
	function __Construct(){
	   parent::__construct();
	}
	
		function consultas($campos,$tabla){//
		$this->db->select($campos);
		$this->db->from($tabla);
		//$this->db->limit(1, 0);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultar($campos,$tabla,$condicion){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$res = $this->db->get();
		if($tabla == 'datos'){echo $this->db->last_query(); exit();}
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultar_group($campos,$tabla,$condicion,$group){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->group_by($group);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultar_group_orden($campos,$tabla,$condicion,$group,$orden){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->group_by($group);
		$this->db->order_by($orden);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultar_limit($campos,$tabla,$condicion,$limite){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->limit($limite);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	
	function consultar_orden($campos,$tabla,$condicion,$orden){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->order_by($orden);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultarb($campos,$tabla,$condicion,$condicionb){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->where($condicionb);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}
	}
	
	function consultarf($campos,$tabla,$condicion){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$res = $this->db->get();
		//if($tabla == 'incapacidad'){ echo $this->db->last_query(); exit(); }
		if($res->num_rows()>0){return $res->row_array();}else{return false;}
	}
	
	function consultarf_limit($campos,$tabla,$condicion){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->limit(1);
		$res = $this->db->get();
		if($res->num_rows()>0){return $res->row_array();}else{return false;}
	}
	
	function consultarf_limit_orden($campos,$tabla,$condicion,$orden){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->order_by($orden);
		$this->db->limit(1);
		$res = $this->db->get();
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){return $res->row_array();}else{return false;}
	}
	
	function consultarx($campos,$tabla,$condicion){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$res = $this->db->get();
		if($res->num_rows()>0){$res = $res->row_array(); return $res['token']; }else{return false;}
	}
	
	function consultarfb($campos,$tabla,$condicion,$condicionb){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->where($condicionb);
		$res = $this->db->get();
		if($res->num_rows()>0){return $res->row_array();}else{return false;}
	}
	
	
	public function insertar($tabla,$data){$this->db->insert($tabla,$data);
	if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function insert_ignorar($tabla,$data){
		$insert_query = $this->db->insert_string($tabla,$data);
		$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
		$this->db->query($insert_query);
		$this->db->insert($tabla,$data);
		
		if($this->db->affected_rows()){
				return true;
			}else {
				return false;	
			}	
	}

	function actualizarr($tabla,$data,$condicion){
	$this->db->set($data);
	$this->db->where($condicion);
	$this->db->update($tabla);
	if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function actualizar($tabla,$data,$condicion){
	$this->db->set($data);
	$this->db->where($condicion);
	$this->db->update($tabla);
	if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function actualizarb($tabla,$data,$condicion,$condicionb){
	$this->db->set($data);
	$this->db->where($condicion);
	$this->db->where($condicionb);
	$this->db->update($tabla);
	if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function actualizar_like($tabla,$data,$condicion,$campo,$valor,$metod){
	$this->db->set($data);
	$this->db->where($condicion);
	$this->db->like($campo,$valor,$metod); 
	$this->db->update($tabla);
	if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}
	
	function consultarf_like($campos,$tabla,$campo,$valor,$metod){//
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->like($campo,$valor,$metod); 
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->row_array();}else{return false;}
	}
	
	function actualizar_cont($tabla,$data,$condicion,$valor){
	$this->db->set($data);
	$this->db->where($condicion);
	$this->db->where($valor); 
	$this->db->update($tabla);
	//echo $this->db->last_query().'</br>';
	if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}	
	}

	function borrar($tabla,$condicion){
		$this->db->where($condicion);
		$this->db->delete($tabla);
		if($this->db->affected_rows()){
			return true;
		}else {
			return false;	
		}
	}			
	
	function borrarf($tabla,$sw){
	    if($sw == 'gp23'){
		$loc = $this->load->database('rem', TRUE);
		$loc->delete($tabla);
		if($loc->affected_rows()){
			return true;
		}else {
			return false;	
		}
		}else{return false;	}
	}	
	
} 