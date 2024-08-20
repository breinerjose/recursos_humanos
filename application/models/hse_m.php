<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hse_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
	
	//function consultar infomacio
	function selectexamenes(){
	  $sql= "SELECT codigo, descripcion FROM ocuconc";
	  $res = $this->db->query($sql);
	 //echo $this->db->last_query();
	 //sexit();
	  return ($res->num_rows() >0)? $res->result_array():false;
	}

	function generar_reporte($fecha1,$fecha2,$nricli,$tipo_informe){
		//$this->db->select('codconc, count(codconc) cantidad');
//		$this->db->from('ocudetord', 'ocuord');
//		$this->db->where('ocufem'>=, $fecha1);
//		$this->db->where('ocufem'<=, $fecha2);
//		$this->db->group_by('codconc');
//		$res = $this->db->get();
	  if($tipo_informe=='consolidado'){	
 	  if($nricli == '1'){	
	  $sql= "SELECT codconc, sum(cantid) cantidad FROM ocudetord, ocuord WHERE ocudetord.ordnum = ocuord.ocunum and ocufem>=? AND ocufem<=? AND estord !='No se Realizo Examen' GROUP BY codconc";
	  $res = $this->db->query($sql,array($fecha1,$fecha2));
	  }else{
	  $sql= "SELECT codconc, sum(cantid) cantidad FROM ocudetord, ocuord WHERE ocudetord.ordnum = ocuord.ocunum and ocufem>=? AND ocufem<=? AND nricli = ? AND estord !='No se Realizo Examen' GROUP BY codconc";
	  $res = $this->db->query($sql,array($fecha1,$fecha2,$nricli));
	  }
	  }else{
	  //detallado
	  if($nricli == '1'){	
	  $sql= "SELECT codconc, sum(cantid) cantidad FROM ocudetord, ocuord WHERE ocudetord.ordnum = ocuord.ocunum and ocufem>=? AND ocufem<=? AND estord !='No se Realizo Examen' GROUP BY codconc";
	  $res = $this->db->query($sql,array($fecha1,$fecha2));
	  }else{
	  $sql= "SELECT codconc, sum(cantid) cantidad FROM ocudetord, ocuord WHERE ocudetord.ordnum = ocuord.ocunum and ocufem>=? AND ocufem<=? AND nricli = ? AND estord !='No se Realizo Examen' GROUP BY codconc";
	  $res = $this->db->query($sql,array($fecha1,$fecha2,$nricli));
	  }
	  }
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->result_array();	
		}else{ return false; }
	}
	
	 function generar_reporte_detallado($fecha1,$fecha2,$nricli,$codconc){
	 if($nricli == '1'){
	 $sql= "SELECT ocunum, ocufem, ocuced, CONCAT(ocunom, ' ', ocuape) As nombres, nricli, cliente, ocupor FROM ocudetord, ocuord WHERE ocudetord.ordnum = ocuord.ocunum and ocufem>=? AND ocufem<=? AND codconc= ? AND estord !='No se Realizo Examen'";
	 $res = $this->db->query($sql,array($fecha1,$fecha2,$codconc));
	 }else{
	 $sql= "SELECT ocunum, ocufem, ocuced, CONCAT(ocunom, ' ', ocuape) As nombres, nricli, cliente, ocupor FROM ocudetord, ocuord WHERE ocudetord.ordnum = ocuord.ocunum and ocufem>=? AND ocufem<=? AND nricli = ? AND codconc= ? AND estord !='No se Realizo  
	 Examen'";
	 $res = $this->db->query($sql,array($fecha1,$fecha2,$nricli,$codconc));
	 }
	 if($res->num_rows()>0){
			return $res->result_array();	
		}else{ return false; }
	 }

	function examen($codigo){
	$sql= "SELECT descripcion, valor FROM ocuconc WHERE codigo=?";
	  $res = $this->db->query($sql,array($codigo));
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
	
	
}	