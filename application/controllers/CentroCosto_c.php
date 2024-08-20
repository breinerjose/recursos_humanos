<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CentroCosto_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   $this->load->model('basico_my','my',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function colores(){
		$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		//and usuapr IS NOT NULL
		$res = $this->bas->consultar('codcol,nomcol','invcol','delusr IS NULL');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
		if($res!=false){ 
		foreach($res as $row){ $output['aaData'][] = array($row['codcol'],$row['nomcol'],
		 '<a class="btn btn-warning btn-xs del'.$ale.'" title="Eliminar" codcol="'.$row['codcol'].'"   
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   <a class="btn btn-primary btn-xs edi'.$ale.'" title="Editar"  codcol="'.$row['codcol'].'"  
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>'); }
		 echo json_encode($output);	 } else echo 1;	
	
	}

	function registrar(){
		$res = $this->my->consultar('*','centrocco','familia IS NOT NULL and codcco != ""');
		if($res != false){ 
		  foreach($res as $row){
		    $x=$this->bas->consultarf('codcco','centrocco',array('codcco'=>$row['codcco'],'familia'=>$row['familia']));
			 //echo $this->db->last_query().'</br>';
			if($x == false){
			$row['cliente']=$row['nomcco'];
			unset($row['nivelestudio']);
			 $this->bas->insertar('centrocco',$row);
			 //echo $this->db->last_query().'</br>';
			}
		  }
		}
	}

	
}