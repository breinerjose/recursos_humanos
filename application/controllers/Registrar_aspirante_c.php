<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//we need to call PHP's session object to access it through Ci
class Registrar_aspirante_c extends Ci_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo
	}
	
		 function agregar_aspirante(){
		 
		$data = array(
		'cedula'=>$this->security->xss_clean($this->input->post('cedula')),
		'decedula'=>$this->security->xss_clean($this->input->post('decedula')),
		'primernombre'=>$this->security->xss_clean($this->input->post('primernombre')),
		'segundonombre'=>$this->security->xss_clean($this->input->post('segundonombre')),
		'primerapellido'=>$this->security->xss_clean($this->input->post('primerapellido')),
		'segundoapellido'=>$this->security->xss_clean($this->input->post('segundoapellido')),
		'telefono'=>$this->security->xss_clean($this->input->post('telefono')),
		'fechanacimiento'=>$this->security->xss_clean($this->input->post('fecnac')),
		'laborppal'=>$this->security->xss_clean($this->input->post('fecnac')),
		'direccion'=>$this->security->xss_clean($this->input->post('direccion')),
		'email'=>$this->security->xss_clean($this->input->post('email')),
		'estado'=>'seleccionado',
		'nombres'=>$this->security->xss_clean($this->input->post('primernombre'))." ".$this->security->xss_clean($this->input->post('segundonombre'))." ".$this->security->xss_clean($this->input->post('primerapellido'))." ".$this->security->xss_clean($this->input->post('segundoapellido')),
		'addusr'=>$this->session->userdata('user'),
		'addfch'=>date('Y-m-d H:i:s'));
		$row=$this->bas->insertar('datos',$data);
		$data=array('codemp' => $this->security->xss_clean($this->input->post('cedula')),
					'estact' => 'nuevo',
					'estnue' => 'disponible',
					'obsest' => $this->security->xss_clean($this->input->post('observ')),
					'addusr' => $this->session->userdata('user'));
	 $this->bas->insertar('camest',$data);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"1","msg":"hubo un error"}';}
		
		
	}
	
}