<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Carnet_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
//chossen
	function empleados(){
		$this->output->set_header('Content-type: application/json');
		$condi = "estado = 'Contratado' OR estado = 'Preseleccionado' OR estado = 'Seleccionado' OR estado = 'Disponible' OR estado = 'Disponibles' OR estado = 'Trasladado'";
		$res = $this->bas->consultar('cedula, Nombres','datos',$condi);
		$info=array();
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('ocuced'=>$row['cedula'],'ocunom'=>$row['Nombres']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	
}