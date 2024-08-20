<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consecutivo_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}

	function consecutivo($id_fuente){
		$sql = "select contador, prefij, conpor from bre_fuente where id_fuente=?"; //selecciona el contador
  		$result = $this->db->query($sql,array($id_fuente));
    	if($result->num_rows() > 0){
			$row = $result->row_array();
			$numord = $row['prefij'].$row['contador'];
			$rcontem2 = $row['contador'] + 1;
			$sql = "UPDATE bre_fuente set contador=? WHERE id_fuente=?";
		    $res = $this->db->query($sql,array($rcontem2,$id_fuente));
			$info = array($numord, $row['conpor']);
			return $info;
		}
		else{
			return false;
		}	
	}
	
}