<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Medidas_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function medidas(){
		$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		//and usuapr IS NOT NULL
		$res = $this->bas->consultar('codume,nomume','invume','delusr IS NULL');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
		if($res!=false){ 
		foreach($res as $row){ $output['aaData'][] = array($row['codume'],$row['nomume'],
		 '<a class="btn btn-warning btn-xs del'.$ale.'" title="Eliminar" codume="'.$row['codume'].'"   
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   <a class="btn btn-primary btn-xs edi'.$ale.'" title="Editar"  codume="'.$row['codume'].'"  
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>'); }
		 echo json_encode($output);	 } else echo 1;	
	
	}


      function registrar_M(){
	
		$data['nomume'] = $this->security->xss_clean($this->input->post('nomume'));
		$row=$this->bas->insertar('invume',$data);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}

	
}