<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lineas_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function lineas(){
		$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		//and usuapr IS NOT NULL
		$res = $this->bas->consultar('codlin,nomlin','invlin','delusr IS NULL');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
		if($res!=false){ 
		foreach($res as $row){ $output['aaData'][] = array($row['codlin'],$row['nomlin'],
		 '<a class="btn btn-danger btn-xs del'.$ale.'" title="Eliminar" codlin="'.$row['codlin'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   <a class="btn btn-warning btn-xs edi'.$ale.'" title="Editar"  codlin="'.$row['codlin'].'" nomlin="'.$row['nomlin'].'"
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>'); }
		 echo json_encode($output);	 } else echo 1;	
	
	}
	
	function registrar_l(){	
		$data['nomlin'] = $this->security->xss_clean($this->input->post('nomlin'));
		$row=$this->bas->insertar('invlin',$data);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function actualiza_l(){
		$data['nomlin'] = $this->security->xss_clean($this->input->post('nomlin'));
		$condi['codlin'] = $this->security->xss_clean($this->input->post('codlin'));
		$row=$this->bas->actualizar('invlin',$data,$condi);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function borrar_l(){
	    $data['delusr'] = $this->session->userdata('user');
		$data['delfch'] = date('Y-m-d H:i:s');
		$condi['codlin'] = $this->security->xss_clean($this->input->post('codlin'));
		$row=$this->bas->actualizar('invlin',$data,$condi);
		if($row!=false){echo '1';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}

	
}