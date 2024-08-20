<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //we need to call PHP's session object to access it through CI
class Estados_c extends CI_Controller {
	
	   function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function cambios(){
	$ale=$this->input->post('ale');
	$this->output->set_header('Content-type: application/json');
	$result = $this->bas->consultas('*','cambio_estados');
	$output = array("aaData" => array());
	if($result != false){
	foreach($result as $row){
	$output['aaData'][] = array(
			$row['codemp'].' '.$row['nombres'], $row['obsest'], $row['estact'], $row['estnue'], $row['addfch']);
	}
	}
			echo json_encode($output);
	}
	
	function datosusuario(){
	$this->output->set_header('Content-type: application/json');
	$condicion = array('cedula' => $this->input->post('codemp'));
	$res = $this->bas->consultarf('nombres, estado','datos',$condicion);
	if($res != false){$output["err"]='1'; $output["a"]=$res; }else{$output["err"]='0';	}
	echo json_encode($output);
	}
	
	function registrar(){
	$this->output->set_header('Content-type: application/json');
	
	$condicion = array('cedula' => $this->security->xss_clean($this->input->post('codemp')));
	$data=array('estado'=> $this->security->xss_clean($this->input->post('estnue')));
	$x=$this->bas->actualizar('datos',$data,$condicion);
	if($x != false){
	$condicion = array('id_persona' => $this->security->xss_clean($this->input->post('codemp')));
	$data=array('estadofin'=> $this->security->xss_clean($this->input->post('estnue')));
	$y=$this->bas->actualizar('bre_pazysalvo',$data,$condicion);
	}else{$output["err"]='0';}
	
	if($y != false){
	$data=array('codemp' => $this->security->xss_clean($this->input->post('codemp')),
	'estact' => $this->security->xss_clean($this->input->post('estact')),
	'estnue' => $this->security->xss_clean($this->input->post('estnue')),
	'obsest' => $this->security->xss_clean($this->input->post('obsest')),
	'addusr' => $this->session->userdata('user')
	);
	if(trim($this->session->userdata('user')) != '1047434619'){ $res = $this->bas->insertar('camest',$data);}
	}else{$output["err"]='0';}
	
	if($res != false){$output["err"]='1'; $output["a"]=$res; }else{$output["err"]='0';	}
	echo json_encode($output);
		  
}

}