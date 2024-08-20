<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulos_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
	
	function agregar_articulo($datos){
		$sql = "INSERT INTO artclo (codart,nomart,carart,addusr,addfch,soft) VALUES (?,?,?,?,?,?);";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
	function datos_editar($codart){
		$sql = "select a.codart, a.nomart, a.carart, a.soft from artclo a where a.stdart='generado' and codart=?";
		$result = $this->db->query($sql,array($codart));
		if($result->num_rows > 0){
			return $result->result_array();
		}
		else{
			return false;
		}		
	}
	
	function editar_articulo($datos){
		$sql = "update artclo set nomart=?, carart=?, soft=? where codart=?;";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
	function eliminar_articulo($datos){
		$sql = "update artclo set delusr=?, delfch=?, stdart='eliminado' where codart=?;";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
	//METODOS PARA VISTA ASIGNAR ARTICULO
	function usuarios_registrados(){
		$sql = "select trim(identificacion) identificacion,trim(nombres) nombres from usuario where estado='generado' order by nombres";
		$result = $this->db->query($sql);
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }		
	}
	
	function datos_articulos(){
		//$sql = "select artclo.codart,artclo.nomart,artclo.carart from artclo where not exists (select 1 from asignc where artclo.codart = asignc.codart and asignc.stdasg='generado') and artclo.stdart='generado'";
		$sql = "select artclo.codart,artclo.nomart,artclo.carart from artclo where not exists (select 1 from asignc where artclo.codart = asignc.codart and asignc.stdasg='generado') and artclo.stdart='generado' or artclo.soft='si'";
		$result = $this->db->query($sql);
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }	
	}
	
	function asignar_articulo($identificacion,$codart,$addusr,$addfch){
		$sql = "INSERT INTO asignc (identificacion,codart,addusr,addfch) VALUES (?,?,?,?);";
		$this->db->query($sql,array($identificacion,$codart,$addusr,$addfch));
		if($this->db->affected_rows()){ return true; }else{ return false; }		
	}
	
	function articulos_asignados($usuario){
		$sql = "select ar.codart, usu.nomtrc, ar.nomart, ar.carart, asi.stdasg,ar.addfch
from asignc asi,artclo ar, view_user usu where asi.identificacion=? and asi.codart=ar.codart and asi.identificacion=usu.nriper and asi.stdasg='generado' and ar.stdart='generado' and usu.estusr='Activo' group by ar.codart";
		$result = $this->db->query($sql,array($usuario));
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }
	}
	
	function quitar_articulo($datos){
		$sql = "update asignc set delusr=?, delfch=?, stdasg='eliminado' where identificacion=? and codart=?";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }	
	}
	
	function restablecer_articulo($datos){
		$sql = "update asignc set addusr=?, addfch=?, delusr='0', delfch='0000-00-00 00:00:00', stdasg='generado' where identificacion=? and codart=?";
		$this->db->query($sql,$datos);
		if($this->db->affected_rows()){ return true; }else{ return false; }			
	}
	
	function verificar_articulos_usuario($idusu){
		$sql = "select * from asignc where identificacion=?;";	
		$res = $this->db->query($sql,array($idusu));
		if($res->num_rows()>0){ return true; }else{ return false;}
	}
	
	//METODO PARA LOS REPORTES
	function reporte_todos_articulo(){
		$sql = "select a.identificacion, u.nombres, a.codart, ar.nomart, ar.carart ,a.addfch, a.delusr, a.delfch, a.stdasg, u.codsed, sede.nomsed from asignc a, artclo ar, usuario u, sede, usuario u1 where a.codart=ar.codart and u.identificacion=a.identificacion and u.codsed=sede.codse group by identificacion,nombres,codart,nomart order by nombres";
		$result = $this->db->query($sql);
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }			
	}
	
	function reporte_por_articulo($nomart){
		$sql = "select a.identificacion, u.nombres, a.codart, ar.nomart, ar.carart ,a.addfch, a.delusr, a.delfch, a.stdasg, u.codsed, sede.nomsed from asignc a, artclo ar, usuario u, sede, usuario u1 where a.codart=ar.codart and u.identificacion=a.identificacion and u.codsed=sede.codse and nomart=? group by identificacion,nombres,codart,nomart order by nombres";
		$result = $this->db->query($sql,array($nomart));
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }			
	}
	
	function reporte_por_fecha($fecha1,$fecha2){
		$sql = "select * from artclo where date(addfch)>=? and date(addfch)<=?";	
		$res = $this->db->query($sql,array($fecha1,$fecha2));
		if($res->num_rows()>0){
			return $res->result_array(); 
		}else{
			return false;	
		}
	}
	
	function reporteArticulosAsignados($codart){
		$sql = "select a.identificacion, u.nombres, a.addfch, u.codsed, s.nomsed from asignc a, usuario u, sede s where a.stdasg='generado' and u.estado='generado' and a.codart=? and a.identificacion=u.identificacion and s.codse=u.codsed";
		$result = $this->db->query($sql,array($codart));
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }	
	}
	
	function reporteArticulosPorUsuario($usu){
		$sql = "select ar.codart, usu.nombres, ar.nomart, ar.carart, asi.stdasg,ar.addfch, asi.delusr,asi.delfch
from asignc asi,artclo ar, usuario usu where asi.identificacion=? and asi.codart=ar.codart and asi.identificacion=usu.identificacion and ar.stdart='generado' group by ar.codart";
		$result = $this->db->query($sql,array($usu));
		if($result->num_rows > 0){ return $result->result_array(); }else{ return false; }
	}
	
	function verificar_serial($idart){
		$sql = "select codart from artclo where codart=? limit 1";	
		$res = $this->db->query($sql,array($idart));
		if($res->num_rows()>0){ return true; }else{ return false;}
	}
}