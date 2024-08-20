<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Tarifa_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('tarifa_m','tar',	TRUE);
	   $this->load->model('Basico_m','bas',	TRUE);
	}
	
	function vista($vista=''){
	$this->load->view($vista);
	}
	
	//chossen
	function clientes(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->tar->clientes();
		$info=array();
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('codcli'=>$row['codcli'],'nomcli'=>$row['nomcli']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	
	//chossen
	function examenes(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->tar->examenes();
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('codexa'=>$row['codexa'],'nomexa'=>$row['nomexa']); }
		echo json_encode($info); } else echo 1;	
	}
	
	function agregartarifa(){
	$this->output->set_header('Content-type: application/json');
	$codcli = $this->input->post('codcli');
	$codexa = $this->input->post('codexa');
	$precio = $this->input->post('precio');
	$result = $this->tar->agregartarifa($codcli,$codexa,$precio);	
	if($result!=false){ echo '1'; }else{ echo '0'; } }
	
	function porcentaje(){
	$this->output->set_header('Content-type: application/json');
	$codcli = $this->input->post('codcli');
	$porcentaje = $this->input->post('porcentaje');
	$result = $this->tar->porcentaje($codcli);	
	if($result!=false){
		 foreach($result as $row ){
			 $precio = $row['precio']+($row['precio']/100*$porcentaje);
			 $data = array('precio'=>$precio,'updusr'=>$this->session->userdata('user'));
			 $condicion = array('id_examen_lab'=>$row['id_examen_lab'],'id_cliente'=>$codcli);
			 $this->bas->actualizar('tarifa',$data,$condicion);
			 //echo $this->db->last_query();
			 }
		 echo '1'; 
		 }else{ echo '0'; } }
	
	function tarifas(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->tar->tarifas();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['nomcli'],$row['nomexa'],$row['precio'],
				"<a href='#' title='Modificar Informacion'  class='editar'  
				data-codcli='".$row['codcli']."' 
				data-nomcli='".$row['nomcli']."' 
				data-codexa='".$row['codexa']."'
				data-nomexa='".$row['nomexa']."'
				data-precio='".$row['precio']."'>
				  <img src='/recursos/iconos/editar.png' width='20' height='20' /></a >
				  &nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='Modificar Informacion'  class='eliminar'  
				data-codcli='".$row['codcli']."' 
				data-nomcli='".$row['nomcli']."' 
				data-codexa='".$row['codexa']."'
				data-nomexa='".$row['nomexa']."'
				data-precio='".$row['precio']."'>
				 <img src='/recursos/iconos/delete.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
	    function editar_tarifa($codcli,$nomcli,$codexa,$nomexa,$precio){
	   			$data['codcli'] = $codcli;
				$data['nomcli'] = urldecode($nomcli);
				$data['codexa'] = $codexa;
				$data['nomexa'] = urldecode($nomexa);
				$data['precio'] = $precio;
				$this->load->view('editar_tarifa_v.php',$data);
	   } 
	   
	   
	   function actualizar_tarifa(){
		$codcli = $this->input->post('codcli');
		$codexa = $this->input->post('codexa');	
		$precio = $this->input->post('precio');		
		$datos = array($precio,$codcli,$codexa);	
		$res = $this->tar->actualizar_tarifa($datos);
		if($res!=false){
			echo 0;
		}else{
			echo 1;
		}
	}	
	
	function eliminar_tarifa($codcli,$nomcli,$codexa,$nomexa,$precio){
	   			$data['codcli'] = $codcli;
				$data['nomcli'] = urldecode($nomcli);
				$data['codexa'] = $codexa;
				$data['nomexa'] = urldecode($nomexa);
				$data['precio'] = $precio;
				$this->load->view('eliminar_tarifa_v.php',$data);
	   } 
	
	 function elimina_tarifa(){
		$codcli = $this->input->post('codcli');
		$codexa = $this->input->post('codexa');		
		$datos = array($codcli,$codexa);	
		$res = $this->tar->elimina_tarifa($datos);
		if($res!=false){
			echo 0;
		}else{
			echo 1;
		}
	}	
	
}