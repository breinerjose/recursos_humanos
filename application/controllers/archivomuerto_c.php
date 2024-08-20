<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//we need to call PHP's session object to access it through CI
class Archivomuerto_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	  function observaciones(){
		$this->output->set_header('Content-type: application/json');
		//$labor=$this->input->post('labor');
		$condicion="obsarc != ''";
		$result = $this->bas->consultar('id_pazysalvo, id_persona, c, a, e,w,obsarc','bre_pazysalvo',$condicion);
		$output = array("aaData" => array());
		if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['id_pazysalvo'],$row['id_persona'].' '.$row['c'],$row['e'],$row['a'],$row['obsarc']);
				}
				echo json_encode($output);
	         }
	     }
	
}