<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //we need to call PHP's session object to access it through CI
class Proveedores_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('clientes_m','cli',TRUE);
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function cargarVistaCorreos($vista='',$codigo,$nombre){
		$data['codigo']=$codigo;
		$data['nombre']=$nombre;
		$this->load->view('/'.$vista,$data);
	}
	
function proveedores(){
	$ale=$this->input->post('ale');
	$this->output->set_header('Content-type: application/json');
	$result = $this->bas->consultar('nit, nombrecliente','clientes','delusr IS NULL');
	$output = array("aaData" => array());
	if($result != false){
	foreach($result as $row){
	$output['aaData'][] = array(
	$row['nit'],
	$row['nombrecliente'],'
	<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" data-nit="'.$row['nit'].'"'
        . ' data-nom="'.$row['nombrecliente'].'"role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>
         
        <a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-nit="'.$row['nit'].'"
         role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
	   ');
	}
	}
	   echo json_encode($output);
	}
	
function editar_cliente(){
	$this->output->set_header('Content-type:application/json');
        $Nit=$this->input->post('Nit');
		$NombreCliente=$this->input->post('NombreCliente');
		$data=array('nombrecliente'=>$NombreCliente,'updusr' => $this->session->userdata('user'), 'updfch' => date('Y-m-d H:i:s'));
		$condicion=array('nit'=>$Nit);
		$res = $this->bas->actualizarr('clientes',$data,$condicion);
		if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
		 echo json_encode($output);
	}
	
function borrar_cliente(){
	$this->output->set_header('Content-type:application/json');
	$data=array('delusr' => $this->session->userdata('user'), 'delfch' => date('Y-m-d H:i:s'));
	$condicion=array('nit' => $this->input->post('Nit'));
	$res = $this->bas->actualizar('clientes',$data,$condicion);
	//echo $this->db->last_query();
	if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
	 echo json_encode($output);
	}
	
function registrar_cliente(){
	$this->output->set_header('Content-type:application/json');
	$data=array('nombrecliente'=>$this->input->post('NombreCliente'), 'nit' => $this->input->post('Nit'), 
	'addusr' => $this->session->userdata('user'), 'addfch' => date('Y-m-d H:i:s'));
	$res = $this->bas-> insertar('clientes',$data);
	if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
	echo json_encode($output);
	}
	
		  
}