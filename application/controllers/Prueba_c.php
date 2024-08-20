<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prueba_c extends CI_Controller {
	   function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function usuario(){
	$this->output->set_header('Content-type: application/json');
	$condicion = array('nomusr !=' => '');
	$resp = $this->bas->consultar('codusr, nomusr','prueba',$condicion);
		if($resp!=false){
			foreach($resp as $row){
				$output['aaData'][] = array(
			   $row['codusr'],$row['nomusr'],
			    '<a class="btn btn-info btn-xs editar" title="Editar" 
			   data-codusr="'.$row['codusr'].'"
			   data-nomusr="'.$row['nomusr'].'"  
			   role="button" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>'		   	  
			  );
			}	
		}		
	    echo json_encode($output);
	}	
	
	function identificacion(){
	$this->output->set_header('Content-type: application/json');
	$condicion = array('nomide !=' => '');
		$res = $this->bas->consultar('codide, nomide','ide',$condicion);
		//echo $this->db->last_query();
		//exit();
		$info=array();
		
		if($res!=false){ foreach($res as $row){ $info[]=array('codide'=>$row['codide'],'nomide'=>$row['nomide']
		); }
		echo json_encode($info); } else echo 1;	
	}
	
	function insertar(){
	$data= array('codusr' => $this->input->post('codusr'), 'nomusr' => $this->input->post('nomusr'), 'tipide' => $this->input->post('tipide'));
	$row=$this->bas->insertar('prueba',$data);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function actualizar(){
		$condicion = array('codusr' => $this->security->xss_clean($this->input->post('codusr')));
		$data['nomusr'] = $this->security->xss_clean($this->input->post('nomusr'));
		$data['tipide'] = $this->security->xss_clean($this->input->post('tipide'));		
		$row=$this->bas->actualizar('prueba',$data,$condicion);
		echo '{"err":"1"}';
	}
	
 }