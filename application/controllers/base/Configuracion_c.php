<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Configuracion_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('base/configuracion_m','conf',TRUE);
	   $this->load->model('base/usuario_m','usu',TRUE);
	   $this->load->model('Basico_m','bas',TRUE);
	}
	

	function cambiarPassword(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->usu->cambiarPassword(md5(trim($this->input->post('rnueva'))),$this->session->userdata('user'));
		//echo $this->db->last_query();
		if($res != false){
			 echo '1';
		}else{
			echo '0';
		}
	}
	
		function cambiarPasswordUsuario(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->usu->cambiarPassword(md5(trim($this->input->post('rnueva'))),$this->input->post('numid'));
		//echo $this->db->last_query();
		if($res != false){
			 echo '1';
		}else{
			echo '0';
		}
	}
	
	function verificarPassword(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->bas->consultarf('pssusr','actusr',array('pssusr'=>md5(trim($this->input->post('contr'))),'nriper'=>$this->session->userdata('user')));
		//echo $this->db->last_query();
		if($res != false){
			 echo '1';
		}else{
			echo '0';
		}
	}
	
	function consultarusuario(){
	$this->output->set_header('Content-type: application/json');
	$numid = $this->input->post('numid');
	$result = $this->conf->consultarusuario($numid);	
	if($result != FALSE){
	 $fila = array('nomtrc'=>$result['nomtrc'],'emltrc'=>$result['emltrc']);
	 echo json_encode($fila);		
	}else{echo '1';}
		
		}	
	
	function consultartercero(){
	$this->output->set_header('Content-type: application/json');
	$identificacion = $this->input->post('identificacion');
	$result = $this->conf->consultartercero($identificacion);	
	if($result != FALSE){
	 $fila = array('nomtrc'=>$result['nomtrc'],'emltrc'=>$result['emltrc']);
	 echo json_encode($fila);		
	}else{echo '1';}
		
		}
	
	function actualizarCorreo(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->conf->actualizarCorreo($this->input->post('correo'),$this->input->post('numid'));
		if($res != false){
			 echo '1';
		}else{
			echo '0';
		}
	}
}
?>