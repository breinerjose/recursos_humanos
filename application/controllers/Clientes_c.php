<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //we need to call PHP's session object to access it through CI
class Clientes_c extends CI_Controller {
	
		function __Construct(){
	   parent::__construct();
	   $this->load->model('clientes_m','cli',TRUE);
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
	function vista($vista=''){
		$this->load->view('/'.$vista);
	}
	function cargarVistaCorreos($vista='',$codigo,$nombre){
		$data['codigo']=$codigo;
		$data['nombre']=$nombre;
		$this->load->view('/'.$vista,$data);
	}
	
	function todos_clientes(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->cli->todos_clientes();
		$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $row ){
			$output['aaData'][] = array(
			$row['Nit'],
			$row['NombreCliente'],
"<a href='#' title='Editar Articulo'  class='edit_articulo'  data-cod='".$row['IdCliente']."'>
<img src='/recursos/iconos/editar.png' width='16' height='16' /></a>&nbsp;&nbsp;<a href='#' title='Eliminar'  class='Eliminar'  data-cod='".$row['IdCliente']."'>
<img src='/recursos/iconos/delete.png' width='16' height='16' /></a >&nbsp;&nbsp;<a href='#' title='editar Correos'  class='correo'  data-cod='".$row['IdCliente']."' data-nom='".$row['NombreCliente']."'>
<img src='/recursos/iconos/email_add.png' width='16' height='16' /></a >&nbsp;&nbsp;<a href='#' title='editar Correos'  class='correob'  data-cod='".$row['IdCliente']."' data-nom='".$row['NombreCliente']."'>
<img src='/recursos/iconos/email_14410.png' width='16' height='16' /></a >");
			}
		}
		echo json_encode($output);
	}
	
	function correos_clientes($nit,$tipcor){
		$this->output->set_header('Content-type: application/json');
		$datos = array($nit,$tipcor);
		$result = $this->cli->correos_clientes($datos);
		$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result  as  $row ){
			$output['aaData'][] = array($nit,
			$row['emlcli'],
"<a href='#' title='Eliminar'  class='Eliminar' data-cod='".$row['id']."' data-eml='".$row['emlcli']."'><img src='/recursos/iconos/delete.png' width='16' height='16' /></a >");
			}
		}
		echo json_encode($output);
	}
	
	function eliminar_correo(){
		$datos = array($this->session->userdata('user'),date('Y-m-d H:i:s'),$this->input->post('id'));	
		$res = $this->cli->eliminar_correo($datos);
		if($res!=false){ echo 0; } else{ echo 1; }			
	}
	
	function agregar_cliente(){
		$datos = array($this->input->post('Nit'),ucwords($this->input->post('NombreCliente')),$_SESSION['usuario'],date('Y-m-d H:i:s'));
		$res = $this->cli->agregar_cliente($datos);
		if($res!=false){ echo 0; }else{ echo 1; }
	}
	
	function agregar_correo_arc(){
		$datos = array($this->input->post('codigo'),$this->input->post('email'),$this->session->userdata('user'),date('Y-m-d H:i:s'),'arc');
		$res = $this->cli->agregar_correo($datos);
		if($res!=false){ echo 0; }else{ echo 1; }
	}

	//chossen
	function clientes_laboratorios(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->cli->clientes_laboratorios();
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
	function clientes_seguridad(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->cli->clientes_seguridad();
		$info=array();
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('empnit'=>$row['empnit'],'empnom'=>$row['empnom'],'emptel'=>$row['emptel'],'empema'=>$row['empema'],'ocuemp'=>$row['ocuemp']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	function clientesexamenes(){
	 $this->output->set_header('Content-type: application/json');
		$res = $this->cli->clientesexamenes();
			 if($res!=false){
			   $data = array();
					foreach ($res as $row){
						   $fila = array( 'nricli'=>$row['nricli'],'cliente'=>$row['cliente']);
						   $data[] = $fila;
				   }
				   echo json_encode($data);
			}else{
				   echo '{"msg":"0"}';
		   }	
	}
	
	//chossen
	function empleados(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->cli->empleados();
		$info=array();
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('ocuced'=>$row['cedula'],'ocunom'=>$row['Nombres']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	
	//chossen
	function servicios(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->cli->servicios();
		$info=array();
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('codconc'=>$row['codigo'],'desconc'=>$row['descripcion'],'valconc'=>$row['valor'],'ordlab'=>$row['nrilab']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	
	function clientes(){
	$ale=$this->input->post('ale');
	$this->output->set_header('Content-type: application/json');
	$result = $this->bas->consultar('idcliente, nit, nombrecliente, nomres','clientes','delusr IS NULL');
	$output = array("aaData" => array());
	if($result != false){
	foreach($result as $row){
	$output['aaData'][] = array(
			$row['nit'], $row['nombrecliente'], $row['nomres'],'		
			<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" data-nit="'.$row['nit'].'" data-nom="'.$row['nombrecliente'].'"  data-res="'.$row['nomres'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>
			   
	<a class="btn btn-success btn-xs email'.$ale.'" data-ale="'.$ale.'" title="Email" data-id="'.$row['idcliente'].'" data-nom="'.$row['nombrecliente'].'" role="button" href="javascript:void(0);"><i class="fa fa-envelope-o"></i> </a>
			   
 <a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-nit="'.$row['nit'].'" role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   ');
	}
	}
			echo json_encode($output);
	}
	
	function emailclientes(){
	$ale=$this->input->post('ale');
	$IdCliente=$this->input->post('IdCliente');
	$this->output->set_header('Content-type: application/json');
	$condicion = array('id_cliente' => $IdCliente);
	$condicionb = "delusr IS NULL";
	$result = $this->bas->consultarb('emlcli','clicon',$condicion,$condicionb);
	$output = array("aaData" => array());
	if($result != false){
	foreach($result as $row){
	$output['aaData'][] = array(
			$row['emlcli'],
'<a class="btn btn-default btn-xs borraremail'.$ale.'" title="BORRAR" data-id="'.$IdCliente.'" data-eml="'.$row['emlcli'].'"  role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   ');
	}
	}
			echo json_encode($output);
	}
	
	function editar_cliente(){
	$this->output->set_header('Content-type:application/json');
        $Nit=$this->input->post('Nit');
		$NombreCliente=$this->input->post('NombreCliente');
		$data=array('nomres' => $this->input->post('nomres'), 'nombrecliente'=>$NombreCliente,'updusr' => $this->session->userdata('user'), 'updfch' => date('Y-m-d H:i:s'));
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
	
	function borrar_email(){
	$this->output->set_header('Content-type:application/json');
		$data=array('delusr' => $this->session->userdata('user'), 'delfch' => date('Y-m-d H:i:s'));
		$condicion=array('id_cliente' => $this->input->post('id_cliente'), 'emlcli' => $this->input->post('emlcli'));
		$res = $this->bas->actualizar('clicon',$data,$condicion);
		//echo $this->db->last_query();
		if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
		 echo json_encode($output);
	}
	
	function registrar_cliente(){
	$this->output->set_header('Content-type:application/json');
		$data=array('nombrecliente'=>$this->input->post('NombreCliente'), 'nit' => $this->input->post('Nit'),'nomres' => $this->input->post('nomres'), 
		'addusr' => $this->session->userdata('user'), 'addfch' => date('Y-m-d H:i:s'));
		$res = $this->bas-> insertar('clientes',$data);
		if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
		 echo json_encode($output);
	}
	
	function registrar_email(){
	$this->output->set_header('Content-type:application/json');
	$data=array('id_cliente'=>$this->input->post('codcli'), 'emlcli' => $this->input->post('emlcli'),'addusr' => $this->session->userdata('user'), 'addfch' => date('Y-m-d H:i:s'));
		$res = $this->bas-> insertar('clicon',$data);
		if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
		 echo json_encode($output);
	}
	
		  
}