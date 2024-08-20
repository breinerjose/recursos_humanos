<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivos_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
		
	function consultararchivos(){
			$sql1 = "select codtrc, nomtrc, codcaj, codest from arcdis";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
			}
			
	function consultarubicacion($codtrc){
	$sql1 = "select codcaj, codest from arcdis WHERE codtrc=?";
			$result1 = $this->db->query($sql1,array($codtrc));
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
			}		
				
	function consultarterceros(){
			//$sql1 = "select cedula as codtrc, nombres as nomtrc, codcaj, codest from datos LEFT JOIN arcdis ON datos.cedula = arcdis.codtrc where estado != 'No Preseleccionado'";
			$sql1="select cedula as codtrc, nombres as nomtrc FROM datos";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}else{return FALSE;}
			}			
				
	function actualizar_archivo($datos){
		$sql = "INSERT INTO arcdis (codcaj,codest,addusr,addfch,codtrc,nomtrc) VALUES (?,?,?,?,?,?);";
		$this->db->query($sql,$datos);
		//echo $this->db->last_query();
		//exit();
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
		//function actualizar_archivo($datos){
//		$sql = "UPDATE arcdis SET codcaj=?,codest=?, addsur=?, updfch=? WHERE codigo=?;";
//		$this->db->query($sql,$datos);
//		if($this->db->affected_rows()){
//			return true;
//		}else{
//			return false;	
//		}	
//	}
//	
	
}	