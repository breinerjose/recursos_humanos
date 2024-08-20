<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eps_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',TRUE);
	}
	
	
	public function todas_eps(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->bas->consultar('codeps, nomeps','eps','delusr IS NULL');
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('codeps'=>$row['codeps'], 'nomeps'=>$row['nomeps']); }
		echo json_encode($info); } else echo 1;	
	}
	
	public function factrh(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->bas-> consultar('tipsan','factrh','tipsan IS NOT NULL');
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('tipsan'=>$row['tipsan']); }
		echo json_encode($info); } else echo 1;	
	}
	
}