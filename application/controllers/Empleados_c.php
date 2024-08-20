<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //we need to call PHP's session object to access it through CI
class Empleados_c extends CI_Controller {
	
		function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function index(){
	echo "Acceso Denegado";
	exit();
	}
	
	function tercerosc(){
	$this->output->set_header('Content-type:application/json');
	$output = array("a" => array());
	$condicion = array('ocuced' => $this->security->xss_clean($this->input->post('ocuced')));
	$row=$this->bas->consultarf('*','view_ocuced',$condicion);
		if($row!=false){
		$output["a"]=$row;	
		$output["err"]='1';	
		}else{$output["err"]='0';}
		echo json_encode($output);
		}	
		
	function terceros_orden(){
	$this->output->set_header('Content-type:application/json');
	$output = array("a" => array());
	$condicion = array('ocuced' => $this->security->xss_clean($this->input->post('ocuced')));
	$row=$this->bas->consultarf('*','view_terceros_orden',$condicion);
		if($row!=false){
		$output["a"]=$row;	
		$output["err"]='1';	
		}else{$output["err"]='0';}
		echo json_encode($output);
		}		
		  
	function contrato(){
	$this->output->set_header('Content-type:application/json');
	$output = array("a" => array());
	$condicion = array('numid' => $this->security->xss_clean($this->input->post('ocuced')));
	$row=$this->bas->consultarf('numid','contrato',$condicion);
		if($row!=false){
		$output["err"]='1';	
		}else{$output["err"]='0';}
		echo json_encode($output);
		}		  
		  
}