<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pazysalvo_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('pazysalvo_m','reti',TRUE);//modelo, alias, verdadero cargue modelo 
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("pazysalvo/".$nombre); //llamo a la vista
		}
	
		
	function Estado_Empleados_PazySalvo(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->reti->Estado_Empleados_PazySalvo();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['id_persona'],$row['c'],$row['estadoemp'],
				"<a href='javascript:void(0);' title='Revertir'  class='rvtir btnst' data-id ='".$row['id_persona']."'>Disponible</a >
					 &nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='archivomuerto'  data-cod='".$row['id_persona']."'>Archivo Muerto</a >");
				}
				echo json_encode($output);
			}
	   }
	  
	  //revertir datos
    function cambiarestado(){
     $this->output->set_header('Content-type: application/json');
       $id_persona = trim($this->input->post('codigo'));
       $datos = array('estadoemp'=>'Archivo Muerto','addemp'=> $this->session->userdata('user')); 
       $condi = array('trim(id_persona)'=>$id_persona);
	   $condib = array('trim(cedula)'=>$id_persona);
	   $datosb = array('estado'=>'Archivo Muerto');
	  $this->reti->cambiarestadodatos($datosb,$condib,'datos');
	   
      echo( $this->reti->cambiarestado($datos,$condi,'bre_pazysalvo'))? '{"msg":"0"}': '{"msg":"0"}';
    } 

} //FIn