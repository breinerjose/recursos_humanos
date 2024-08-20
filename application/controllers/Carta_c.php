<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Carta_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',	TRUE);
	}

	function generar_carta(){
		$data['logo'] = trim($this->input->get('empresa'));
		$data['codtrc'] = trim($this->input->get('codtrc'));
		$Nombres = $this->bas->consultarf('nombres','datos',array('cedula'=>$data['codtrc']));
		$data['nomtrc'] = $Nombres['nombres'];
		$ccosto = $this->bas->consultarf('ccosto','contrato',array('numid'=>$data['codtrc']));
		if ($ccosto['ccosto'] != '144-1' and $ccosto['ccosto'] != '144-10' and $ccosto['ccosto'] != '144-11' and $ccosto['ccosto'] != '143' and $ccosto['ccosto'] != '147' and $ccosto['ccosto'] != '147-2' and $ccosto['ccosto'] != '149'){
		$r = $this->bas->consultarf('textoa,textob','cartas',array('empresa'=>$data['logo']));
		}else{ $r = $this->bas->consultarf('textoa,textob','cartas',array('empresa'=>'DISTRI')); }
		$data['textoa'] = $r['textoa'];
		$data['textob'] = $r['textob'];
		$this->load->view('/pazysalvo/carta_permiso_v',$data);
	}
	
		function actualiza(){
		$this->output->set_header('Content-type: application/json');
		$data['addusr'] = $this->session->userdata('user');
		
		$data['textoa'] = $this->input->post('asap');
		$condi=array('empresa'=>'ASAP');
		if($data['textoa'] != '' and $data['textoa'] != '<br>' and $data['textoa'] != NULL ){ $resp = $this->bas->actualizar('cartas',$data,$condi); }
		
		$data['textob'] = $this->input->post('asappie');
		$condi=array('empresa'=>'ASAP');
		if($data['textob'] != '' and $data['textob'] != '<br>' and $data['textob'] != NULL ){ $resp = $this->bas->actualizar('cartas',$data,$condi); }
		
		$data['textoa'] = $this->input->post('aseco');
		$condi=array('empresa'=>'ASECO');
		if($data['textoa'] != '' and $data['textoa'] != '<br>' and $data['textoa'] != NULL){ $resp = $this->bas->actualizar('cartas',$data,$condi); }
		
		$data['textob'] = $this->input->post('asecopie');
		$condi=array('empresa'=>'ASECO');
		if($data['textob'] != '' and $data['textob'] != '<br>' and $data['textob'] != NULL){ $resp = $this->bas->actualizar('cartas',$data,$condi); }
		
		$data['textoa'] = $this->input->post('distri');
		$condi=array('empresa'=>'DISTRI');
		if($data['textoa'] != '' and $data['textoa'] != '<br>' and $data['textoa'] != NULL){ $resp = $this->bas->actualizar('cartas',$data,$condi); }
		
		$data['textob'] = $this->input->post('distripie');
		$condi=array('empresa'=>'DISTRI');
		if($data['textob'] != '' and $data['textob'] != '<br>' and $data['textob'] != NULL){ $resp = $this->bas->actualizar('cartas',$data,$condi); }
			 
		echo '{"err":"1"}';
		
	}	
	
}