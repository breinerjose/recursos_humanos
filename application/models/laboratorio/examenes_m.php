<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class examenes_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
		
	function consultarexamenes(){
			$sql1 = "select codigo, descripcion, valor, vencimiento from ocuconc";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
			}
				
	function examenes(){
		$this->db->select('*');
		$this->db->from('examen_lab');
		$this->db->where('delusr IS NULL');
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->result_array():false;
	}
	
	function preciot($codexa,$nricli){
		$this->db->select('valexa');
		$this->db->from('tarifa');
		$this->db->where('codexa', $codexa);
		$this->db->where('codcli', $nricli);
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->row_array():false;
	}
	
	function precioc($codexa){
		$this->db->select('valor as precio');
		$this->db->from('ocuconc');
		$this->db->where('codigo', $codexa);
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->row_array():false;
	}

	function medicosc($campos,$tabla,$condicion,$condicionb){
		$this->db->select($campos);
		$this->db->from($tabla);
		$this->db->where($condicion);
		$this->db->where($condicionb);
		$res = $this->db->get();
		//echo $this->db->last_query(); exit();
		if($res->num_rows()>0){return $res->result_array();}else{return false;}

	}
	
	function examenes_historia($id_consentimiento){
		$this->db->select('examen_lab_hist.id_consentimiento, examen_lab_hist.id_exa_hist, examen_lab.examen_lab, examen_lab_hist.precio, nombre, addfch, examen_lab_hist.idmedi,
		finfch, examen_lab_hist.id_examen_lab');
		$this->db->from('medicos, examen_lab, examen_lab_hist');
		$this->db->where('id_consentimiento', $id_consentimiento);
		$this->db->where('examen_lab_hist.id_examen_lab = examen_lab.id_examen_lab');
		$this->db->where('examen_lab_hist.idmedi = medicos.cedula');
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->result_array():false;
	}
	
	function listadodiagnosticos($codexa,$subgru){
		$this->db->select('coddia, codexa, nomdia, subgru, examen_lab');
		$this->db->from('diagnostico, examen_lab');
		$this->db->where('diagnostico.codexa=examen_lab.id_examen_lab');
		$this->db->where('codexa', $codexa);
		//$this->db->where('subgru', $subgru);
		$this->db->where('tipo', '1');
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->result_array():false;	
	}
	
	function listadorecomendaciones($codexa,$subgru){
		$this->db->select('nomdia');
		$this->db->from('diagnostico');
		//$this->db->where('codexa', $codexa);
		//$this->db->where('subgru', $subgru);
		$this->db->where('tipo', '2');
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->result_array():false;	
	}
	
	function recomendacioneshist($id_consentimiento,$id_examen_lab){
	$this->db->select('recome');
		$this->db->from('rechis');
		$this->db->where('id_consentimiento', $id_consentimiento);
		//$this->db->where('id_examen_lab', $id_examen_lab);
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->result_array():false;
	}
	
	function subgru(){
		$sql = "select id, subgru from subgru";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}
				
	function act_est_rec($codsol,$codexa){
		
	}
	
	function agregar_examen($datos){
		$sql = "INSERT INTO ocuconc (descripcion,valor,vencimiento,addusr,addfch) VALUES (?,?,?,?,?);";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
		function actualizar_examen($datos){
		$sql = "UPDATE ocuconc SET descripcion=?,valor=?,vencimiento=?, updusr=?, updfch=?, tipordb=? WHERE codigo=?;";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;	
		}	
	}
	
	function profesiogramac($nricli){
		$this->db->distinct('codcrg, nomcrg');
		$this->db->from('ocucliknp');
		$this->db->where('nricli', $nricli);
		$this->db->group_by('codcrg, nomcrg');
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return ($res->num_rows()>0)?$res->result_array():false;
	}
	
	function datatable($categoria, $fecha,$resultado){
		$this->db->select('examen_lab_hist.id_exa_hist, examen_lab_hist.id_consentimiento, fecha, id_cliente, nombre, nomempresa, examen_lab_hist.id_examen_lab, 
		examen_lab, id_empresa, historias.token, consecutivos');
		$this->db->from('examen_lab_hist, historias, examen_lab');	
		$condicionb="historias.id_consentimiento = examen_lab_hist.id_consentimiento AND examen_lab_hist.id_examen_lab = examen_lab.id_examen_lab";
		$this->db->where($condicionb);
		$this->db->where('fecha >=',$fecha);
		$this->db->where('examen_lab_hist.resultado',$resultado);
		$this->db->where('examen_lab.id_categoria',$categoria);
		$res=$this->db->get();
		//echo $this->db->last_query();
		//exit();
		return $res->result_array();	
			}
	
}	