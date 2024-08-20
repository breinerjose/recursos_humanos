<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vacantes_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('vacantes_m','vac',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
	function vista($vista=''){
		$this->load->view('/'.$vista);
	}
	
	function vacantesc(){
	    $ale=$this->input->post('ale');
		$this->output->set_header('Content-type: application/json');
		$result = $this->vac->cargos_web();
		$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $row ){
			$output['aaData'][] = array(
			$row['codcar'],
			$row['nomcar'],
			$row['estado'],
"<a href='#' title='activo'  class='activo'  data-est='activo' data-cod='".$row['codcar']."'>Activo</a>
&nbsp;&nbsp;<a href='#' title='inactivo'  class='inactivo' data-est='inactivo' data-cod='".$row['codcar']."'>Inactivo</a >
&nbsp;&nbsp;<a href='#' title='urgente'  class='urgente' data-est='urgente' data-cod='".$row['codcar']."'>Urgente</a >",
'<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" data-cod="'.$row['codcar'].'"  data-des="'.$row['descripcion'].'"  data-nom="'.$row['nomcar'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>
			   
			   &nbsp;&nbsp;<a class="btn btn-default btn-xs borrar'.$ale.'" title="Editar" data-cod="'.$row['codcar'].'"  data-des="'.$row['descripcion'].'"  data-nom="'.$row['nomcar'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   
			   ');
			}
		}
		echo json_encode($output);
	}
	
	function vacantesi(){
	$this->output->set_header('Content-type: application/json');
	$datos = array($this->input->post('titulo'),$this->input->post('descripcion'),$this->session->userdata('user'),date('Y-m-d H:i:s'));
	$res = $this->vac->vacantesi($datos);
	if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function vacantesu(){
	$this->output->set_header('Content-type: application/json');
	$datos = array($this->input->post('estado'),$this->session->userdata('user'),date('Y-m-d H:i:s'),$this->input->post('id'));
	$res = $this->vac->vacantesu($datos);
	if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function vacante_d(){
	$this->output->set_header('Content-type: application/json');
	$condicion = array('id'=>$this->input->post('id'));
	$res = $this->vac->borrar('vacantes',$condicion);
	if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function vacantes_u(){
	$this->output->set_header('Content-type: application/json');
	$condicion = array('id'=>$this->input->post('id'));
	$data = array('addusr'=>$this->session->userdata('user'),'addfch'=>date('Y-m-d H:i:s'),'titulo'=>$this->input->post('titulo'),'descripcion'=>$this->input->post('descripcion'));
	$res = $this->vac->actualizar('vacantes',$data,$condicion);
	if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}

	
}