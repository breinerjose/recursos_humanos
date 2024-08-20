<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Noti_c extends CI_Controller {
	   var $con;
	   function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	    if($this->session->userdata('user') == ''){echo "Inicie Session Nuevamente"; exit(); }
	}

	function Imprimir($codoid){
		$con='mensaj.codoid='.$codoid.' and delusr is null';
		$data['info'] = $this->bas->consultarf('*','mensaj',$con);	
		$this->load->view('/noticastellana/print_v',$data);
		}
	
	function pacientes(){
	    $ale=$this->input->post('ale');
		$con=array('codmed'=>$this->session->userdata('user'));
		$result = $this->bas->consultar('*','view_ges_remisiones',$con);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['id_consentimiento'],$row['fecha'],$row['id_cliente'].' '.$row['nombre'],$row['nomempresa'],
				'<a href="#" title="Modificar Informacion"  class="regi'.$ale.'"  data-cod="'.$row['id_consentimiento'].'">
				  <img src="/res/icons/sirco/editar.png" width="20" height="20" /></a >');
				}
				echo json_encode($output);
			}
	}

	function insertar(){
		$this->output->set_header('Content-type: application/json');
		$data['mensaj'] = $this->security->xss_clean($this->input->post('mensaj'));
		$data['asunto'] = $this->security->xss_clean($this->input->post('asunto'));
		$data['addusr'] = $this->session->userdata('user');
		$resp = $this->bas->insertar('mensaj',$data);		 
		if($resp!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}	
	
	function borrar(){
		$this->output->set_header('Content-type: application/json');
		$condi['codoid'] = $this->security->xss_clean($this->input->post('oid'));
		$data['delfch'] = date('Y-m-d h:i:s');
		$data['delusr'] = $this->session->userdata('user');
		$resp = $this->bas->actualizar('remision',$data,$condi);		 
		if($resp!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}	
	
	function listado(){
	    $ale=$this->input->post('ale');
		$result = $this->bas->consultar('*','mensaj',array('delusr'=>NULL));
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$a='<a href="#" title="Borrar Informacion"  class="borrar'.$ale.'"  
				codoid="'.$row['codoid'].'" >
				  <i class="fa fa-trash-o"></i></a >&nbsp;&nbsp;&nbsp;<a href="#" title="Ver Informacion"  
				  class="imprimir'.$ale.'" codoid="'.$row['codoid'].'" >
				 <i class="fa fa-print"></i></a >'; 
				  
	$output['aaData'][] = array(substr($row['addfch'],0,19),$row['asunto'],$a);
				}
				echo json_encode($output);
			}
	}
			
}
