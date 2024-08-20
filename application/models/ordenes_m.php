<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ordenes_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}

	function consultarexamenes(){
			$sql1 = "select codigo, descripcion, valor, vencimiento from ocuconc";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
			}
		
	function consultarexamenesorden(){
			$sql1 = "select codigo, descripcion, valor, vencimiento from ocuconc";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
			}		
		
		function consultarordenes(){
		$sql1 = "select ocuced, ocunum, ocunom, ocuape, oculab, fecsol, estord, tipord from ocuord where ocunum=orddep and tipord != '' order by ocunum desc";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
		//function consultarordeneshseq(){
		function ordenes($tipo,$estado,$fecha){
		$this->db->select('ocuced, ocunum, ocunom, ocuape, oculab, fecsol, esttem as estord, tipord, ocucar, cliente, ocuobs, obssol, obsing');
		$this->db->where('tipordb',$tipo);
		$this->db->where('fecsol >=',$fecha);
		$this->db->where('trim(esttem)',$estado);
		$query = $this->db->get('ocuord');
		if($query->num_rows() > 0){
			return $query->result_array();
			}
			else{return FALSE;}
		}
		
		function consultarordeneshseqaprobadas(){
		$sql1 = "select ocuced, ocunum, ocunom, ocuape, oculab, fecsol, estord, tipord, ocucar, cliente, ocuobs, obssol, obsing from ocuord where trim(esttem)='Aprobada' and tipordb = '1' and fecsol >= '2021-09-30'";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
		function editarordeneshseq(){
		$anio=date('Y');
		$sql1 = "select * from ocuord where tipord != '' AND tipordb='1' AND estord = 'Generada' AND fecsol > '".$anio.'-01-01'."'";
		$result1 = $this->db->query($sql1);
		//echo $this->db->last_query();
		//exit();
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
		function consultarordeneshseqclientes($codigo){
		$sql1 = "select * from ocuord where fecsol >'2017-12-31' and tipord != '' and (trim(esttem)='Aprobada' or usuapr != '')and codlab=? 
		order by ocufem desc";
		$result1 = $this->db->query($sql1,$codigo);
		//echo $this->db->last_query();
		//exit();
		
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
	function actualizar_examenes($datos){
		$sql = "UPDATE ocuconc SET descripcion=?,valor=?,vencimiento=? WHERE codigo=?;";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;	
		}	
	}
	
		//function consultar infomacio
	function selectexamenes(){
	  $sql= "SELECT codigo, descripcion FROM ocuconc";
	  $res = $this->db->query($sql);
	 //echo $this->db->last_query();
	 //sexit();
	  return ($res->num_rows() >0)? $res->result_array():false;
	}
	   
function insertar_ord_cabecera($ocunum, $ocupor, $ocuced, $ocunom, $codlab, $oculab, $ocuemp, $ocuemaem, $ocutelem, $nricli, $cliente, $asume, $tipordb,$fecha,$addord){
		   $sql = "INSERT INTO ocuord (ocunum, ocupor, ocuced, ocunom, codlab, oculab, ocuemp, ocuemaem, ocutelem, ocufem, nricli, cliente, asume, tipordb, fecsol,addord,tipord) 
		   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		   $res = $this->db->query($sql,array($ocunum, $ocupor, $ocuced, $ocunom, $codlab, $oculab, $ocuemp, $ocuemaem, $ocutelem, $fecha, $nricli, $cliente, $asume, $tipordb, $fecha,$addord,'2'));
		   //echo $this->db->last_query();
		   //exit();
		  if($this->db->affected_rows()){ return true;} else { return false; }
		}
		
		function insertar_ord_detalle($ordnum, $codconc, $desconc, $valconc, $ordlab){
		   $sql = "INSERT INTO ocudetord (ordnum, codconc, desconc, valconc, ordlab ) 
		   VALUES (?,?,?,?,?)";
		   $res = $this->db->query($sql,array($ordnum, $codconc, $desconc, $valconc, $ordlab));
		   //echo $this->db->last_query();
		   //exit();
		  if($this->db->affected_rows()){ return true;} else { return false; }
		}
		   
		   
		  
}