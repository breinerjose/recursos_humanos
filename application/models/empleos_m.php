<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleos_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
		   
 function consultarestado($codigo){
		$sql = "SELECT Nombres, Estado, FechaSolicitud FROM datos WHERE Cedula = ?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
	   }
	   
}