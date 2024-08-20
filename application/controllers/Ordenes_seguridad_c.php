<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ordenes_seguridad_c extends CI_Controller {
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	   if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();}
	}
	
	function ordenesseguridadcliente($tipo,$estado){
		$this->output->set_header('Content-type: application/json');
		$condicion = array('codlab'=>$this->session->userdata('user'),'esttem'=>'Aprobada');
		$result = $this->bas->consultar('*','ocuord',$condicion);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){

				$output['aaData'][] = array($row['ocunum'],$row['ocuced'],$row['ocunom']." ".$row['ocuape'],$row['ocucar'],  $row['cliente'],$row['fecsol'],				
				"<a href='#' title='Ver Orden de Seguridad'  class='ver'  data-cod='".$row['ocunum']."'>
				  <img src='/res/iconos/print.png' width='20' height='20' /></a >");
				  
				}
				echo json_encode($output);
			}
	   }
	   
	function impordenseguridad($codigo){$data=array('ocunum'=>$codigo,'mensaje'=>'');$this->load->view('/seguridad/imprimirorden', $data);} 

}		