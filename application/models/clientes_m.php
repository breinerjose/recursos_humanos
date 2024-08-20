<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
	
	function todos_clientes(){
		$sql = "SELECT IdCliente, Nit, NombreCliente FROM clientes";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0){
			return $result->result_array();
		}
		else{
			return false;
		}	
	}
	function correos_clientes($datos){
	
		$sql = "SELECT * FROM clicon WHERE id_cliente=? and tipcor=? and delusr is null";
		$result = $this->db->query($sql,$datos);
		//echo $this->db->last_query();
		if($result->num_rows() > 0){
			return $result->result_array();
		}
		else{
			return false;
		}

	}
	
	function agregar_cliente($datos){
		$sql = "INSERT INTO clientes (nit,nombreCliente,addusr,addfch) VALUES (?,?,?,?);";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
	function agregar_correo($datos){
		$sql = "INSERT INTO clicon (id_cliente,emlcli,addusr,addfch,tipcor) VALUES (?,?,?,?,?);";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}

//function consultar infomacio
	function clientesexamenes(){
	  $sql= "SELECT Nit nricli, NombreCliente cliente FROM clientes ORDER BY nricli";
	  $res = $this->db->query($sql);
	 //echo $this->db->last_query();
	  return ($res->num_rows() >0)? $res->result_array():false;
	}
	
	
	function clientes_laboratorios(){
		$sql = "SELECT empnom nomcli, empema, emptel, empcel, ocuemp, empnit codcli FROM ordemp WHERE labcli = '1'";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}
	
	
	function clientes_seguridad(){
		$sql = "SELECT empnom , empema, emptel, empcel, ocuemp, empnit FROM ordemp WHERE labcli = '2'";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}
	
	function empleados(){
		$sql = "SELECT cedula, Nombres FROM datos 
		WHERE estado = 'Contratado' OR estado = 'Preseleccionado' OR estado = 'Seleccionado' OR estado = 'Disponible' OR estado = 'Disponibles' OR estado = 'Trasladado'";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}
	
	function servicios(){
		$sql = "SELECT codigo, descripcion, valor, nrilab FROM ocuconc WHERE tipordb='2'";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false;	
		}	
	}
	
	function eliminar_correo($datos){
		$sql = "update clicon set delusr=?, delfch=? where id=?;";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}

}	