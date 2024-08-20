<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratos_m extends CI_Model {
	
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

	function empresas_movimientos($fecha1,$fecha2,$emp){
	if($emp=='ASECO'){
	  $sql= "SELECT Count(Codigo) Cant, lugardes FROM contrato 
	  WHERE ((STR_TO_DATE(fecini, '%d/%m/%Y') BETWEEN ? AND ?) OR (STR_TO_DATE(fecfin, '%d/%m/%Y') BETWEEN ? AND ?)  OR STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin IS NULL ))
	  AND (Familia='NominaAss' OR Familia='NominaAdi')
	  GROUP BY lugardes";}
	  else{
	  $sql= "SELECT Count(Codigo) Cant, lugardes FROM contrato 
	  WHERE ((STR_TO_DATE(fecini, '%d/%m/%Y') BETWEEN ? AND ?) OR (STR_TO_DATE(fecfin, '%d/%m/%Y') BETWEEN ? AND ?)  OR STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin IS NULL )) 
	  AND (Familia!='NominaAss' AND Familia!='NominaAdi')
	  GROUP BY lugardes";}
	  $res = $this->db->query($sql,array($fecha1,$fecha2,$fecha1,$fecha2,$fecha2,$fecha2));
	  //if($emp == 'ASAP'){
	  //echo $this->db->last_query();
	  //exit();
		//}
		if($res->num_rows()>0){
			return $res->result_array();	
		}else{ return false; }
	}
	
	function contratos_inician_t($fecha1,$fecha2,$emp){
	if($emp=='ASECO'){
	  $sql= "SELECT Count(Codigo) Cant, lugardes FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') BETWEEN ? AND ? AND (Familia='NominaAss' OR Familia='NominaAdi')
	  GROUP BY lugardes";}
	  else{
	  $sql= "SELECT COUNT(Codigo) Cant, lugardes FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') BETWEEN ? AND ? AND Familia!='NominaAss' AND Familia!='NominaAdi'
	  GROUP BY lugardes"; }
	  $res = $this->db->query($sql,array($fecha1,$fecha2));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
			
	function contratos_terminacion_t($fecha1,$fecha2,$emp){
	  if($emp=='ASECO'){
	  $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecfin, '%d/%m/%Y') BETWEEN ? AND ? AND (Familia='NominaAss' OR Familia='NominaAdi')";
	  $res = $this->db->query($sql,array($fecha1,$fecha2));}
	  else{ $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecfin, '%d/%m/%Y') BETWEEN ? AND ? AND Familia!='NominaAss' AND Familia!='NominaAdi'";
	  $res = $this->db->query($sql,array($fecha1,$fecha2));}
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
	
	function contratos_activos_t($fecha1,$fecha2,$emp){
	 if($emp == 'ASECO'){
	  $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin IS NULL ) AND (Familia='NominaAss' OR Familia='NominaAdi')";
	  }else{
	   $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin IS NULL) AND Familia!='NominaAss' AND Familia!='NominaAdi'";
	  }
	  $res = $this->db->query($sql,array($fecha1,$fecha2));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
	
	//por empresa inicio
	function contratos_inician_t_e($fecha1,$fecha2,$emp,$cli){
	if($emp=='ASECO'){
	  $sql= "SELECT Count(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') BETWEEN ? AND ? AND (Familia='NominaAss' OR Familia='NominaAdi') AND lugardes='$cli'";}
	  else{
	  $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') BETWEEN ? AND ? AND Familia!='NominaAss' AND Familia!='NominaAdi' AND lugardes='$cli'"; }
	  $res = $this->db->query($sql,array($fecha1,$fecha2));
		//echo $this->db->last_query();
//		exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
			
	function contratos_terminacion_t_e($fecha1,$fecha2,$emp,$cli){
	  if($emp=='ASECO'){
	  $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecfin, '%d/%m/%Y') BETWEEN ? AND ? AND (Familia='NominaAss' OR Familia='NominaAdi') AND lugardes='$cli'";
	  $res = $this->db->query($sql,array($fecha1,$fecha2));}
	  else{ $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecfin, '%d/%m/%Y') BETWEEN ? AND ? AND Familia!='NominaAss' AND Familia!='NominaAdi' AND lugardes='$cli'";
	  $res = $this->db->query($sql,array($fecha1,$fecha2));}
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
	
	function contratos_activos_t_e($fecha1,$fecha2,$emp,$cli){
	 if($emp == 'ASECO'){
	  //$sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  //WHERE STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin = '') AND (Familia='NominaAss' OR Familia='NominaAdi') AND lugardes='$cli'";
	  
	  $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin IS NULL ) AND (Familia='NominaAss' OR Familia='NominaAdi') AND lugardes='$cli'";
	  
	  }else{
	   $sql= "SELECT COUNT(Codigo) Cant FROM contrato 
	  WHERE STR_TO_DATE(fecini, '%d/%m/%Y') <= ? AND (STR_TO_DATE(fecfin, '%d/%m/%Y') > ? OR fecfin IS NULL ) AND Familia!='NominaAss' AND Familia!='NominaAdi' AND lugardes='$cli'";
	  }
	  $res = $this->db->query($sql,array($fecha1,$fecha2));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
	//por empresa fin
	
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
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false; }
	}
	
	function contratosordenes($fecha){
	$sql = "SELECT Codigo, numid, nombre, oficio, fecini, familia, lugardes  FROM contrato WHERE estado='Activo' AND fecdat < ? ORDER BY fecdat DESC";
	 $res = $this->db->query($sql,array($fecha));
	if($res->num_rows()>0){
			return $res->result_array();	
		}else{ return false; }
	}
	
	function consultaord($numid){
	$sql = "SELECT ocuced  FROM ocuord WHERE ocuced=?";
	 $res = $this->db->query($sql,array($numid));
	if($res->num_rows()>0){
			return $res->row_array();	
		}else{ return false;}
	}
	
}	