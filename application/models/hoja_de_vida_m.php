<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoja_de_vida_m extends CI_Model {

public function insert_hoja_vida($data){$this->db->insert('datos',$data);}

public function dias_registro($nriper){
	$sql="SELECT DATE_PART('day', now() - fechasolicitud) AS dias, fechasolicitud, estado
	FROM datos WHERE Cedula=?";
	$res=$this->db->query($sql,$nriper);
	return($res->num_rows()>0)?$res->row_array():false;
}


function cargarDatos($nriper){
	$sql="SELECT * FROM datos WHERE cedula=?";
	$res=$this->db->query($sql,$nriper);
	return($res->num_rows()>0)?$res->row_array():false;
}
function actualizarDatosHojaVida($data,$where){
	$this->db->update('datos',$data,$where);
	return($this->db->affected_rows()>0)?true:false;

}
	

}