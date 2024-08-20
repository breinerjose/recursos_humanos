<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//we need to call PHP's session object to access it through CI
class Incapacidad_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function temporal(){
	foreach($this->bas->consultar('id','incapacidad',array('estado'=>'Registrada')) as $row){
	
	$res = $this->bas->consultar('max(codoid) as codoid','inclog',array('codinc'=>$row['id']));
	if($res != false){
	foreach( $res as $oid){
	if($oid['codoid'] != null){
	foreach($this->bas->consultar('observ','inclog',array('codoid'=>$oid['codoid'])) as $upd){
	
	$this->bas->actualizar('incapacidad',array('estado'=>$upd['observ']),array('id'=>$row['id']));
	
	}
	}
	}
	}
    }
	
	echo 'Fin';
	}
	

	
	
	function listado(){
	$ale=$this->input->post('ale');
	$this->output->set_header('Content-type: application/json');
	$condi=array('addfch >='=>date('Y-m-d'));
	$condib="delusr IS NULL and updusr IS NULL";
	$result=$this->bas->consultarb('*','incapacidad',$condi,$condib);
	$output = array("aaData" => array());
	if($result != false){
	foreach($result as $row){
	$output['aaData'][] = array(
			'<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" id="'.$row['id'].'" role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>  
            <a class="btn btn-default btn-xs borrar'.$ale.'" title="Borrar" id="'.$row['id'].'"  role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>',
			$row['cedula'], $row['nombres'],$row['cargo'],$row['numinc'],$row['evento'],$row['prorroga'],$row['numdias'],$row['fecini'],$row['fecfin'],$row['nomeps']
			,$row['diagnostico'],$row['empleador'],$row['nomcli']);
			}
		}
			echo json_encode($output);
	}
	
	function consultar_empleado(){
	$ale=$this->input->post('ale');
	$this->output->set_header('Content-type: application/json');
	$condi=array('estado' => 'ACTIVO','numid' => $this->input->post('cedula'));
	$res=$this->bas->consultarf('nombre AS nombres, oficio, familia, lugardes, codeps, nomeps, ocupor','contrato',$condi);	
	if($res!=false){$output["i"]=$res; $output["e"] = array("err"=>"1");}else{$output["e"] = array("err"=>"0");}
		//
	    echo json_encode($output);
	}
	
	function consultar_incapacidad(){
	$this->output->set_header('Content-type: application/json');
	$condi=array('id' => $this->security->xss_clean($this->input->post('id')));
	$res=$this->bas->consultarf('*','incapacidad',$condi);	
	if($res!=false){$output["i"]=$res; $output["e"] = array("err"=>"1");}else{$output["e"] = array("err"=>"0");}
		//
	    echo json_encode($output);
	}
	
	function registrar(){
	$this->db->trans_start();
	$datac['id'] = $this->security->xss_clean($this->input->post('codigo'));
	if($datac['id'] != ''){  
	$datau['updusr']=$this->session->userdata('user');
	$datau['updfch']=date('Y-m-d h:i:s');
	$this->bas->actualizar('incapacidad',$datau,$datac);
	}
	
	$data['cedula'] = $this->security->xss_clean($this->input->post('cedula'));
	$data['numinc'] = $this->security->xss_clean($this->input->post('numinc'));
	$data['fecini'] = $this->security->xss_clean($this->input->post('fecini'));
	$data['fecfin'] = $this->security->xss_clean($this->input->post('fecfin'));
	$data['codeps'] = $this->security->xss_clean($this->input->post('codeps'));
	$data['nomeps'] = $this->security->xss_clean($this->input->post('nomeps'));
	$data['diagnostico'] = $this->security->xss_clean($this->input->post('diagnostico'));
	$data['nomcli'] = $this->security->xss_clean($this->input->post('cliente'));
	$data['nombres'] = $this->security->xss_clean($this->input->post('nombres'));
	$data['cargo'] = $this->security->xss_clean($this->input->post('cargo'));
	$data['empleador'] = $this->security->xss_clean($this->input->post('empleador'));
	$data['evento'] = $this->security->xss_clean($this->input->post('evento'));
	$data['prorroga'] = $this->security->xss_clean($this->input->post('prorroga'));
	
	$dias	= (strtotime($data['fecini'])-strtotime($data['fecfin']))/86400;
	$dias = abs($dias); 
	$data['numdias'] = floor($dias)+1;
	
	$res=$this->bas->insertar('incapacidad',$data);
	if($res != false){echo '{"err":"1"}';}else{echo '{"err":"0"}';}
	$this->db->trans_complete();
	}
	
	function borrar(){
		$datac['id'] = $this->security->xss_clean($this->input->post('id'));
		if($datac['id'] != ''){  
		$datau['delusr']=$this->session->userdata('user');
		$datau['delfch']=date('Y-m-d h:i:s');
		$res=$this->bas->actualizar('incapacidad',$datau,$datac);
		if($res != false){echo '{"err":"1"}';}else{echo '{"err":"0"}';}
		}
	}
}