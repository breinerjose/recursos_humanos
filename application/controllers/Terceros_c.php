<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Terceros_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',	TRUE);
	}
	function terceros(){
	$this->output->set_header('Content-type:application/json');
	$res=$this->bas->consultar('id_tercero,nombre,imp1,imp2','terceros',array('id_tercero !='=>'NULL'));
	if($res!=false){
	$output["a"]=$res;
	$output["e"] = array("err"=>"1");
	}else{
	$output["e"] = array("err"=>"0");
	}
	 echo json_encode($output);
	}
	
	function cargarDatosProvedor(){
		$this->output->set_header('Content-type: application/json');
		$condi=array('Cedula'=>$this->input->post('codtrc'));
		$resp=$this->bas->consultarf('trim(cedula) as codtrc, trim(nombres) as nomtrc','datos',$condi);	
		if($resp!=false){
			$out=array('codtrc'=>$resp['codtrc'],'nomtrc'=>utf8_encode($resp['nomtrc']),'err'=>'1');
			echo json_encode($out);
		}else echo '{"err":"0","msg":"no hay una tercero asociado a la busqueda"}';
	}
	
	function tip_ide(){
	$this->output->set_header('Content-type:application/json');
	$res=$this->bas->consultar('*','tipdoc',array('tipper'=>$this->security->xss_clean($this->input->post('tipper'))));
	
	if($res!=false){
	$output["a"]=$res;
	$output["e"] = array("err"=>"1");
	}else{
	$output["e"] = array("err"=>"0");
	}
	 echo json_encode($output);
	}
	
	public function terceros_i()
	{
		$datac['id_tercero'] = $this->security->xss_clean($this->input->post('id_tercero'));
		$data['telefono'] = $this->security->xss_clean($this->input->post('telefono'));
	  	$data['direccion'] = $this->security->xss_clean($this->input->post('direccion'));
		$data['prinombre'] = $this->security->xss_clean($this->input->post('prinombre'));
		$data['segnombre'] = $this->security->xss_clean($this->input->post('segnombre'));
		$data['priapellido'] = $this->security->xss_clean($this->input->post('priapellido'));
		$data['segapellido'] = $this->security->xss_clean($this->input->post('segapellido'));
		$data['nombre'] = $data['prinombre'].' '.$data['segnombre'].' '.$data['priapellido'].' '.$data['segapellido'];
		$data['imp1'] = $this->security->xss_clean($this->input->post('imp1'));
		$data['imp2'] = $this->security->xss_clean($this->input->post('imp2'));
		$data['dig_verificacion'] = $this->security->xss_clean($this->input->post('dig_verificacion'));
		$data['nom_tipidentificacion'] = $this->security->xss_clean($this->input->post('nom_tipidentificacion'));
		$x = $this->bas->consultarf('id_tercero','terceros',array('id_tercero'=>$datac['id_tercero']));
		if($x == false){
		$data['id_tercero'] = $datac['id_tercero'];
		$row=$this->bas->insertar('terceros',$data); }else{
		$row=$this->bas->actualizar('terceros',$data,$datac);
		}
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
		function DatosTercero(){
	$this->output->set_header('Content-type: application/json');
	$id_tercero = $this->input->post('id_tercero');
	$condi=array('id_tercero'=>$id_tercero);
	$result = $this->bas->consultarf('*','terceros',$condi); 
	if($result != false){
	 $fila = array('nom_tipidentificacion'=>$result['nom_tipidentificacion'],'telefono'=>$result['telefono'],'direccion'=>$result['direccion'],'prinombre'=>$result['prinombre'],'segnombre'=>$result['segnombre'],'priapellido'=>$result['priapellido'],'segapellido'=>$result['segapellido'],'imp1'=>$result['imp1'],'imp2'=>$result['imp2'],'dig_verificacion'=>$result['dig_verificacion']);
	 echo json_encode($fila);		
	}else{echo '1';}
	}//fin de metodo
	
	function cargarListadoTerceros(){
        $this->output->set_header('Content-type: application/json');
		$res = $this->bas->consultar('cedula,nombres','datos',array('estado !='=>'No Preseleccionado'));
		//echo  $this->db->last_query(); exit();
		$output = array("aaData" => array());
		if ($res != false){
			 foreach ($res as $row){
			   $output['aaData'][] = array(
			   		"<a href='javascript:void(0);' class='cod' nom='".trim($row['nombres'])."' id='".trim($row['cedula'])."'>".$row['cedula']."</a>",$row['nombres']);
			}	
		}
		echo json_encode($output);
	       }
	
	 }
	