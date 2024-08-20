<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Induccion_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
	function insertar(){
	$this->output->set_header('Content-type: application/json');
		$datos = array('cedula'=>$this->input->post('Cedula'),
		'nombre'=>ucwords($this->input->post('Nombre')),
		'preg1'=>$this->input->post('preg1'),
		'p2a'=>$this->input->post('2a'),
		'p2b'=>$this->input->post('2b'),
		'p2c'=>$this->input->post('2c'),
		'p2d'=>$this->input->post('2d'),
		'p2e'=>$this->input->post('2e'),
		'p2f'=>$this->input->post('2f'),
		'p2g'=>$this->input->post('2g'),
		'p2h'=>$this->input->post('2h'),
		'p3a'=>$this->input->post('3a'),
		'p3b'=>$this->input->post('3b'),
		'p3c'=>$this->input->post('3c'),
		'p3d'=>$this->input->post('3d'),
		'p3e'=>$this->input->post('3e'),
		'p4a'=>$this->input->post('4a'),
		'p4b'=>$this->input->post('4b'),
		'p4c'=>$this->input->post('4c'),
		'p4d'=>$this->input->post('4d'),
		'p4e'=>$this->input->post('4e'),
		'preg5'=>$this->input->post('preg5'),
		'p6a'=>$this->input->post('6a'),
		'p6b'=>$this->input->post('6b'),
		'p6c'=>$this->input->post('6c'),
		'p7a'=>$this->input->post('7a'),
		'p7b'=>$this->input->post('7b'),
		'p7c'=>$this->input->post('7c'),
		'p7d'=>$this->input->post('7d'),
		'p8a'=>$this->input->post('8a'),
		'p8b'=>$this->input->post('8b'),
		'p8c'=>$this->input->post('8c'),
		'p8d'=>$this->input->post('8d'),
		'p8e'=>$this->input->post('8e'),
		'p9a'=>$this->input->post('9a'),
		'p9b'=>$this->input->post('9b'),
		'preg10'=>$this->input->post('preg10'),
		'p11a'=>$this->input->post('11a'),
		'p11b'=>$this->input->post('11b'),
		'p11c'=>$this->input->post('11c'),
		'p11d'=>$this->input->post('11d'),
		'p11e'=>$this->input->post('11e'),
		'p11f'=>$this->input->post('11f'),
		'p11g'=>$this->input->post('11g'),
		'p11h'=>$this->input->post('11h'),
		'p11i'=>$this->input->post('11i'),
		'p11j'=>$this->input->post('11j'),
		'p11k'=>$this->input->post('11k'),
		'p11l'=>$this->input->post('11l'),
		'p11m'=>$this->input->post('11m'),
		'p11n'=>$this->input->post('11n'),
		'empresa'=>$this->input->post('empresa'),
		'cliente'=>$this->input->post('cliente'),
		'tipo'=>$this->input->post('Induccion')
		);
		$res = $this->bas->insertar('induccion',$datos);
	   if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function listado(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->bas->consultas('codigo,addfch,nombre,empresa,cliente','induccion');
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
			$output['aaData'][] = array($row['addfch'],$row['nombre'],$row['empresa'],$row['cliente'],"<a href='#' title='Ver Examen'  class='ver'  data-cod='".$row['codigo']."'>
				   <img src='/res/icons/print.png' width='14' height='14' /></a >");
				}
				echo json_encode($output);
			}	   
	}
	
	    function imprimir_examen($codigo){
		$data=$this->bas->consultarf('*','induccion',array('codigo'=>$codigo));
		$this->load->view('/hse/imprimir_examen_v', $data);
		}
	
	
}