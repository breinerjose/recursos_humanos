<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //we need to call PHP's session object to access it through CI
class Empleos_c extends CI_Controller {
	
		function __Construct(){
	   parent::__construct();
	   $this->load->model('Empleos_m','emp',TRUE);
	}
	
	function consultarestado(){
		$this->output->set_header('Content-type: application/json');
		$numero = trim($this->input->post('numero'));
		$result = $this->emp->consultarestado($numero);	
		if($result != FALSE){
		 	$fila = array('nombres'=>$result['nombres'],'estado'=>$result['estado'],'fechasolicitud'=>$result['fechasolicitud']);
		 	echo json_encode($fila);		
		}else{echo '1';}
	}
	
		  
}