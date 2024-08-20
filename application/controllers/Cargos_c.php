<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cargos_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',	TRUE);
	}
	
	function vista($vista=''){
	$this->load->view($vista);
	}
	
	//chossen
	function Cargos(){
		$this->output->set_header('Content-type: application/json');
		//and usuapr IS NOT NULL
		$res = $this->bas->consultar('carcod, cardes','funcar','delusr IS NULL');
		//echo $this->db->last_query();
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('carcod'=>$row['carcod'],'cardes'=>$row['cardes']); }
		echo json_encode($info); } else echo 1;	
	}
	
	//chossen
	function Clientes(){
		$this->output->set_header('Content-type: application/json');
		$condicion = array('codord' => $this->input->post('ocupor'),'subgru' => $this->input->post('tipord'));
		$res = $this->bas->consultar('DISTINCT(nricli) nricli, nombre','view_profesiograma',$condicion);
		//echo $this->db->last_query();
		$info=array();
			$info[]=array('codcli'=>'','nomcli'=>'');
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('codcli'=>$row['nricli'],'nomcli'=>$row['nombre']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	
	//chossen
	function laboratorios(){
		$this->output->set_header('Content-type: application/json');
		$condicion = array('labcli' => '1');
		$res = $this->bas->consultar('empnom, empema, emptel, empcel, ocuemp, empnit','ordemp',$condicion);
		//echo $this->db->last_query();
		$info=array();
		if($res!=false){			
			foreach($res as $row){
				$info[]=array('empnom'=>$row['empnom'],'empema'=>$row['empema'],'emptel'=>$row['emptel'],'empcel'=>$row['empcel'],'ocuemp'=>$row['ocuemp'],'empnit'=>$row['empnit']);
			}
		echo json_encode($info);
		}
		else echo 1;	
	}
	
	//chossen
	function Cargos_empresa(){
		$this->output->set_header('Content-type: application/json');
		$id_empresa = $this->input->post('id_empresa');
		$id_empresa = explode('-',$id_empresa);
		$condicion = array('nricli' => $id_empresa[0], 'codord' => $this->input->post('ocupor'),'subgru' => $this->input->post('tipord'));
		$res = $this->bas->consultar('DISTINCT(codcrg) codcrg, cardes','view_profesiograma',$condicion);
		//echo $this->db->last_query();
		$info=array();
		$info[]=array('codcrg'=>'','cardes'=>'');
		if($res!=false){ foreach($res as $row){ $info[]=array('codcrg'=>$row['codcrg'],'cardes'=>$row['cardes']); }
		echo json_encode($info); } else echo 1;	
	}
	
	//chossen
	function listado(){
	$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
		$resp = $this->bas->consultar('carcod, cardes, riesgo','funcar','delusr IS NULL');
		if($resp!=false){
			foreach($resp as $row){
				$output['aaData'][] = array(
			   $row['cardes'],$row['riesgo'],
			   '		
			<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" data-cod="'.$row['carcod'].'" data-des="'.$row['cardes'].'"  data-rie="'.$row['riesgo'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>
			   
 <a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-cod="'.$row['carcod'].'" role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>',
			   );
			}	
		}		
	    echo json_encode($output);		
	}
	
	function cargo_i(){
		$data['cardes'] = $this->security->xss_clean($this->input->post('cardes'));
		$data['riesgo'] = $this->security->xss_clean($this->input->post('riesgo'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('funcar',$data);
		//echo $this->db->last_query();
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function cargo_d(){
	$this->output->set_header('Content-type:application/json');
		$data=array('delusr' => $this->session->userdata('user'), 'delfch' => date('Y-m-d H:i:s'));
		$condicion=array('carcod'=>$this->input->post('carcod'));
		$res = $this->bas->actualizar('funcar',$data,$condicion);
		//echo $this->db->last_query();
		if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
		 echo json_encode($output);
	}
	
	function cargo_u(){
	$this->output->set_header('Content-type:application/json');
		$data=array('cardes' => $this->input->post('cardes'), 'riesgo'=>$this->input->post('riesgo'),'updusr' => $this->session->userdata('user'), 'updfch' => date('Y-m-d H:i:s'));
		$condicion=array('carcod'=>$this->input->post('carcod'));
		$res = $this->bas->actualizarr('funcar',$data,$condicion);
		if($res != false){$output["err"]='1';}else{$output["err"]='0';	}
		 echo json_encode($output);
	}
	
	
	function profesiogramai(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
 		$ale=$this->input->post('ale');
		$codexa=$this->security->xss_clean($this->input->post('codexa'));
	    $subgru=trim($this->security->xss_clean($this->input->post('subgru')));
		$codcar=$this->security->xss_clean($this->input->post('codcar'));
		$codord=$this->security->xss_clean($this->input->post('codord'));
		$id_empresa=$this->security->xss_clean($this->input->post('id_empresa'));
		$tipcob=$this->security->xss_clean($this->input->post('tipcob'));
		$id_empresa=explode('-',$id_empresa);
		
		if ($codexa != 0){
		$data = array('codknp' => $codexa, 'codtip' => $subgru, 'codcrg' => $codcar, 'nricli' => $id_empresa[0], 'nomcli' => $id_empresa[1], 'codord' => $codord, 'tipcob' => $tipcob);
		$this->db->insert('ocucliknp', $data);}	
		//echo $this->db->last_query();
		if($id_empresa[0] != '' and $id_empresa[0] != '0'){$condicion['nricli'] = $id_empresa[0]; }
		if($subgru != '' and $subgru != '0'){$condicion['codtip'] =  $subgru; }
		if($codcar != '' and $codcar != '0'){$condicion['codcrg'] = $codcar; }
		if($codord != '' and $codord != '0'){$condicion['codord'] = $codord; }

		$resp=$this->bas->consultar('*','view_profesiograma',$condicion);
		//echo $this->db->last_query();
		
		if($resp!=false){
			foreach($resp as $row){
			$codpro= $row['codknp'].'-'.$row['nricli'].'-'.$row['codcrg'].'-'.$row['codtip'];
				$output['aaData'][] = array(
			   $row['nombre'],$row['subgru'],$row['cardes'],$row['nomexa'],$row['tipcob'],$row['usuapr'],
			   '<center><a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-codpro="'.$codpro.'"
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a></center>'
			   	  
			   );
			}	
		}		
	    echo json_encode($output);
		}
			
		function profesiogramau(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
 		$ale=$this->input->post('ale');
	    $subgru=trim($this->security->xss_clean($this->input->post('subgru')));
		$codcar=$this->security->xss_clean($this->input->post('codcar'));
		$codord=$this->security->xss_clean($this->input->post('codord'));
		$id_empresa=$this->security->xss_clean($this->input->post('id_empresa'));
		$id_empresa=explode('-',$id_empresa);
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar);
		$data=array(codord=>'ASAP');
		$this->bas->actualizar('ocucliknp',$data,$condicion);
		}
		
		function confirmar_pro(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
 		$ale=$this->input->post('ale');
	    $subgru=trim($this->security->xss_clean($this->input->post('subgru')));
		$codcar=$this->security->xss_clean($this->input->post('codcar'));
		$codord=$this->security->xss_clean($this->input->post('codord'));
		$id_empresa=$this->security->xss_clean($this->input->post('id_empresa'));
		$id_empresa=explode('-',$id_empresa);
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar, 'codord' => $codord, 'codtip' => $subgru);
		$data=array('usuapr'=>$this->session->userdata('user'));
		$this->bas->actualizar('ocucliknp',$data,$condicion);
		
		$resp=$this->bas->consultar('*','view_profesiograma',$condicion);
		//echo $this->db->last_query();
		
		if($resp!=false){
			foreach($resp as $row){
			$codpro= $row['codknp'].'-'.$row['nricli'].'-'.$row['codcrg'].'-'.$row['codtip'];
				$output['aaData'][] = array(
			   $row['nombre'],$row['subgru'],$row['cardes'],$row['nomexa'],$row['tipcob'],$row['usuapr'],
			   '<a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-codpro="'.$codpro.'"
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a> '
			   	  
			   );
			}	
		}		
	    echo json_encode($output);
		
		}
		
		function profesiogramad(){
		$this->output->set_header('Content-type: application/json');
		$codpro=$this->input->post('codpro');
		$codpro=explode('-',$codpro);
		$this->db->delete('ocucliknp', array('codknp' => $codpro[0], 'nricli' => $codpro[1], 'codcrg' => $codpro[2],'codtip' => $codpro[3])); 
		echo '1';
	}
		
		function clonar_cargo(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
 		$ale=$this->input->post('ale');
		$codcarb=$this->security->xss_clean($this->input->post('codcarb'));
		$codcar=$this->security->xss_clean($this->input->post('codcar'));
		$codord=$this->security->xss_clean($this->input->post('codord'));
		$id_empresa=$this->security->xss_clean($this->input->post('id_empresa'));
		$subgru=$this->security->xss_clean($this->input->post('subgru'));
		$id_empresa=explode('-',$id_empresa);
		if($subgru == '0'){
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcarb, 'codord' => $codord);
		//borro los examenes del cargo a clonar
		$this->bas->borrar('ocucliknp',$condicion);
		//Consulto y registro los del original
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar, 'codord' => $codord);
		$resp=$this->bas->consultar('*','ocucliknp',$condicion);
		//echo $this->db->last_query();
		if($resp!=false){
			foreach($resp as $row){
		$data = array('codknp' => $row['codknp'], 'codtip' => $row['codtip'], 'codcrg' => $codcarb, 'nricli' => $row['nricli'], 'nomcli' => $row['nomcli'], 'codord' => $row['codord'], 'tipcob' => $row['tipcob']);
		    $this->db->insert('ocucliknp', $data);}	
			}
		//
		}else{
	
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar, 'codord' => $codord , 'codtip'=>'2');
		//borro los examenes del cargo a clonar
		$this->bas->borrar('ocucliknp',$condicion);
		//Consulto y registro los del original
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar, 'codord' => $codord, 'codtip'=>'1');
		$resp=$this->bas->consultar('*','ocucliknp',$condicion);
		//echo $this->db->last_query();
		if($resp!=false){
			foreach($resp as $row){
		$data = array('codknp' => $row['codknp'], 'codtip' => '2', 'codcrg' => $codcar, 'nricli' => $row['nricli'], 'nomcli' => $row['nomcli'], 'codord' => $row['codord'], 'tipcob' => $row['tipcob']);
		    $this->db->insert('ocucliknp', $data);}	
			}
		//
		$codcarb=$codcar;
		}
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcarb, 'codord' => $codord);	
		$resp=$this->bas->consultar('*','view_profesiograma',$condicion);
		if($resp!=false){
			foreach($resp as $row){
			$codpro= $row['codknp'].'-'.$row['nricli'].'-'.$row['codcrg'].'-'.$row['codtip'];
				$output['aaData'][] = array(
			   $row['nombre'],$row['subgru'],$row['cardes'],$row['nomexa'],$row['tipcob'],$row['usuapr'],
			   '<a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-codpro="'.$codpro.'"
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a> '
			   	  
			   );
			}	
		}		
	    echo json_encode($output);
		
		}
		
		function clonar_empresa(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
 		$ale=$this->input->post('ale');
		$codcar=$this->security->xss_clean($this->input->post('codcar')); //Cargo
		$codord=$this->security->xss_clean($this->input->post('codord')); //Empresa
		$id_empresa=$this->security->xss_clean($this->input->post('id_empresa'));
		$id_empresa=explode('-',$id_empresa);
		if($codord == 'ASECO'){$codordb = 'ASAP';}else{$codordb = 'ASECO';}
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar, 'codord' => $codord);	
		$resp=$this->bas->consultar('*','ocucliknp',$condicion);
		if($resp!=false){
			foreach($resp as $row){
		$data = array('codknp' => $row['codknp'], 'codtip' => $row['codtip'], 'codcrg' => $codcar, 'nricli' => $row['nricli'], 'nomcli' => $row['nomcli'], 'codord' => $codordb, 'tipcob' => $row['tipcob']);
		    $this->db->insert('ocucliknp', $data);}	
			}
		//
		$condicion=array('nricli' => $id_empresa['0'], 'codcrg' => $codcar, 'codord' => $codordb);	
		$resp=$this->bas->consultar('*','view_profesiograma',$condicion);
		if($resp!=false){
			foreach($resp as $row){
			$codpro= $row['codknp'].'-'.$row['nricli'].'-'.$row['codcrg'].'-'.$row['codtip'];
				$output['aaData'][] = array(
			   $row['nombre'],$row['subgru'],$row['cardes'],$row['nomexa'],$row['tipcob'],$row['usuapr'],
			   '<a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-codpro="'.$codpro.'"
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a> '
			   	  
			   );
			}	
		}		
	    echo json_encode($output);
		
		}
	
}