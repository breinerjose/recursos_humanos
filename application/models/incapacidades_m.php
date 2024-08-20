<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Incapacidades_m extends CI_Model {
	function __Construct(){
	   parent::__construct();
	}
	
	//actualizar informacion
    function registrarevento($codinc,$observ,$addusr,$addfch){
		$data = array('estado' => $observ);
		$this->db->where('id', $codinc);
		$this->db->update('incapacidad', $data);
		//echo $this->db->last_query(); 
		$sql = "INSERT INTO inclog (codinc, observ, addusr,addfch) VALUES (?,?,?,?);";
		$this->db->query($sql,array($codinc,$observ,$addusr,$addfch));
		 return ($this->db->affected_rows()>0) ? true : false;   
		}
		
	 function actualizar_pagado($codinc,$observ,$addusr,$addfch,$varl,$veps,$obs,$vasumido,$recibo){
		$data = array('estado' => $observ, 'varl'=>$varl,'veps' => $veps,'obs' => $obs,'vasumido' => $vasumido, 'recibo' => $recibo);
		$this->db->where('id', $codinc);
		$this->db->update('incapacidad', $data);
		
		$sql = "INSERT INTO inclog (codinc, observ, addusr,addfch) VALUES (?,?,?,?);";
		$this->db->query($sql,array($codinc,$observ,$addusr,$addfch));
		 return ($this->db->affected_rows()>0) ? true : false;   
		}	
		
	function historicoincapacidades($codinc){
			$sql1 = "select addfch, addusr, observ from inclog WHERE codinc=?";
			$result1 = $this->db->query($sql1,array($codinc));
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
	}	
	
	function estado_incapacidad($codinc){
			$sql1 = "SELECT observ FROM inclog WHERE codinc=? ORDER BY IDEN desc LIMIT 0,1";
			$result1 = $this->db->query($sql1,array($codinc));
			if($result1->num_rows() > 0){
				$r = $result1->row_array();
				return $r['observ'];
				}
				else{return 'Sin Gestionar';}
	}	
		

	function consultaincapacidades($sw){
	$y=date('Y')-1;
	$fecha = $y.'-01-01';
	if ($sw == 'no'){ $sql1 = "SELECT id, numinc, cedula, nombres, nomeps, nomcli, fecini, fecfin, estado FROM incapacidad WHERE tipo='1' AND estado != 'Archivada' AND fecini > '$fecha'"; }
	else { $sql1 = "SELECT id, numinc, cedula, nombres, nomeps, nomcli, fecini, fecfin, estado FROM incapacidad WHERE tipo='1' AND estado != 'Archivada'"; }
			$result1 = $this->db->query($sql1);
			//echo $this->db->last_query();
			//exit();
			if($result1->num_rows() > 0){ return $result1->result_array(); } else { return FALSE; }
	}						

}
	