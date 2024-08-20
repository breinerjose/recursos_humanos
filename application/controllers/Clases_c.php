<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clases_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function clases(){
		$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		//and usuapr IS NOT NULL
		$res = $this->bas->consultar('codcla,nomcla','invcla','delusr IS NULL');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
		if($res!=false){ 
		foreach($res as $row){ $output['aaData'][] = array($row['codcla'],$row['nomcla'],
		 '<a class="btn btn-warning btn-xs del'.$ale.'" title="Eliminar" codcla="'.$row['codcla'].'"   
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   <a class="btn btn-primary btn-xs edi'.$ale.'" title="Editar"  codlin="'.$row['codcla'].'"  
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>'); }
		 echo json_encode($output);	 } else echo 1;	
	
	}
	
}