<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ordenes_c extends CI_Controller {
	function __Construct(){
	   parent::__construct();
	   $this->load->model('ordenes_m','orde',TRUE);//modelo, alias, verdadero cargue modelo 
	    $this->load->model('basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('consecutivo_m','con',TRUE);//modelo, alias, verdadero cargue modelo 
	   if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();}
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("ordenes/".$nombre); //llamo a la vista
		}
						
	 function consultarordeneshseqclientes(){
		$this->output->set_header('Content-type: application/json');
		
		if($this->session->userdata('user') == '1050959690' or $this->session->userdata('user') == '73214641'){ $cliente='900268528';}else{$cliente=$this->session->userdata('user');}
		
		$result = $this->orde->consultarordeneshseqclientes($cliente);
		//echo $this->db->last_query();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				//if($row['tipcon']=='NUEVO ASPIRANTE'){$cla="class='empresa'";}else{$cla="class='arl'";}
				
	$output['aaData'][] = array($row['ocunum'],$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],$row['cliente'],$row['tipord'],$row['fecsol'],
				"<a href='#' title='Ver Orden de Laboratorio'  class='empresa' data-tip='EMPRESA' data-cod='".$row['ocunum']."'>Empresa  </a >
				<a href='#' title='Ver Orden de Laboratorio'  class='arl'  data-tip='ARL' data-cod='".$row['ocunum']."'>Arl</a >");
				}
				echo json_encode($output);
			}
	   }
	   
	   function consultarordeneshseq(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->orde->consultarordeneshseq();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				if($row['estord']=='Generada' or $row['estord']=='En Proceso de Examen'){$clase='blanco';}
				elseif($row['estord']=='No se Realizo Examen' ){$clase='rojo';}
				elseif($row['estord']=='Con Aptitud Medica' or $row['estord']=='APTO'){$clase='verde';}
				elseif($row['estord']=='Aplazado'){$clase='azul';}
				else{$clase='amarillo';}
				$output['aaData'][] = array('<span class="'.$clase.'">'.$row['ocunum'].'</span>',$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],$row['cliente'],$row['oculab'],$row['tipord'],$row['estord'],$row['ocuobs']." ".$row['obssol']." ".$row['obsing'],$row['fecsol'],
				"<a href='#' title='Ver Orden de Laboratorio'  class='ver'  data-cod='".$row['ocunum']."'>
				  <img src='/res/icons/print.png' width='14' height='14' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
	    function consultarordeneshseqaprobadas($a){
		$this->output->set_header('Content-type: application/json');
		$result = $this->bas->consultar('ocuced, ocunum, ocunom, ocuape, oculab, fecsol, estord, tipord, ocucar, cliente, ocuobs, obssol, obsing','ocuord',array('trim(esttem)'=>'Aprobada','tipordb' => '1','fecsol >='=>$a));
		
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				if($row['estord']=='Generada' or $row['estord']=='En Proceso de Examen'){$clase='blanco';}
				elseif($row['estord']=='No se Realizo Examen' ){$clase='rojo';}
				elseif($row['estord']=='Con Aptitud Medica' or $row['estord']=='APTO'){$clase='verde';}
				elseif($row['estord']=='Aplazado'){$clase='azul';}
				else{$clase='amarillo';}
				$output['aaData'][] = array('<span class="'.$clase.'">'.$row['ocunum'].'</span>',$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],$row['cliente'],$row['oculab'],$row['tipord'],$row['estord'],$row['ocuobs']." ".$row['obssol']." ".$row['obsing'],$row['fecsol'],
				"<a href='#' title='Ver Orden de Laboratorio'  class='ver'  data-cod='".$row['ocunum']."'>
				   <img src='/res/icons/print.png' width='14' height='14' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   //,$row['ocuobs']." ".$row['obssol']." ".$row['obsing']
	    function editarordeneshseq($a){
		$this->output->set_header('Content-type: application/json');
		$result = $this->bas->consultar('*','ocuord',array('tipord !=' =>'','tipordb'=>'1','estord' => 'Generada','fecsol >'=>$a) );
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				if($row['estord']=='Generada' or $row['estord']=='En Proceso de Examen'){$clase='blanco';}
				elseif($row['estord']=='No se Realizo Examen' ){$clase='rojo';}
				elseif($row['estord']=='Con Aptitud Medica' or $row['estord']=='APTO'){$clase='verde';}
				elseif($row['estord']=='Aplazado'){$clase='azul';}
				else{$clase='amarillo';}
				$output['aaData'][] = array('<span class="'.$clase.'">'.$row['ocunum'].'</span>',$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],$row['cliente'],$row['oculab'],$row['tipord'],$row['estord'],$row['fecsol'],
				"<a href='#' title='Ver Orden de Laboratorio'  class='ver'  data-cod='".$row['ocunum']."'>
				   <img src='/res/icons/print.png' width='14' height='14' /></a >
				   
				   
				   <a class='btn btn-info btn-xs editar' title='Editar' 
			   data-ocunum='".$row['ocunum']."'
			   data-ocuced='".$row['ocuced']."'
			   data-ocunom='".$row['ocunom']."'
			   data-ocuape='".$row['ocuape']."' 
			   data-ocudir='".$row['ocudir']."'
			   data-ocutel='".$row['ocutel']."'
			   data-ocucel='".$row['ocucel']."'
			   data-edad='".$row['edad']."'
			   data-codlab='".$row['codlab']."'
			   data-tipord='".$row['tipord']."'
			   data-ocupor='".$row['ocupor']."'
			   data-nricli='".$row['nricli']."' 
			   data-codcrg='".$row['codcrg']."'
			   data-ocueps='".$row['ocueps']."'
			   data-codlab='".$row['codlab']."' 
			   data-tipsan='".$row['tipsan']."'
			   data-fecsol='".$row['fecsol']."'
			   data-fecing='".$row['fecing']."'     
			   data-obssol='".$row['obssol']."'
			   data-obsing='".$row['obsing']."'
			   data-tipcon='".$row['tipcon']."'
			   data-estord='".$row['estord']."'
			   role='button' href='javascript:void(0);'><i class='fa fa-pencil'></i></a>
				   
				   ");
				}
				echo json_encode($output);
			}
	   }
	   
	    function aprobarordeneshseq(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->orde->aprobarordenes('1');
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				if($row['estord']=='Generada' or $row['estord']=='En Proceso de Examen'){$clase='blanco';}
				elseif($row['estord']=='No se Realizo Examen' ){$clase='rojo';}
				elseif($row['estord']=='Con Aptitud Medica' or $row['estord']=='APTO'){$clase='verde';}
				elseif($row['estord']=='Aplazado'){$clase='azul';}
				else{$clase='amarillo';}
				$output['aaData'][] = array('<span class="'.$clase.'">'.$row['ocunum'].'</span>',$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],$row['cliente'],$row['oculab'],$row['tipord'],$row['estord'],$row['ocuobs']." ".$row['obssol']." ".$row['obsing'],$row['fecsol'],
				"<a href='#' title='Ver Orden de Laboratorio'  class='ver'  data-cod='".$row['ocunum']."'>
				  <img src='/res/icons/print.png' width='14' height='14' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
	    function aprobarordenesseguridad(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->orde->aprobarordenes('2');
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				if($row['estord']=='Generada' or $row['estord']=='En Proceso de Examen'){$clase='blanco';}
				elseif($row['estord']=='No se Realizo Examen' ){$clase='rojo';}
				elseif($row['estord']=='Con Aptitud Medica' or $row['estord']=='APTO'){$clase='verde';}
				elseif($row['estord']=='Aplazado'){$clase='azul';}
				else{$clase='amarillo';}
				$output['aaData'][] = array('<span class="'.$clase.'">'.$row['ocunum'].'</span>',$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],$row['cliente'],$row['oculab'],$row['tipord'],$row['estord'],$row['fecsol'],
				"<a href='#' title='Ver Orden de Seguridad'  class='ver'  data-cod='".$row['ocunum']."'>
				   <img src='/res/icons/print.png' width='14' height='14' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
	   
	    function ordenes($tipo,$estado,$fecha){
		$this->output->set_header('Content-type: application/json');
		$result = $this->orde->ordenes($tipo,$estado,$fecha);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				if($row['estord']=='Generada' or $row['estord']=='En Proceso de Examen'){$clase='blanco';}
				elseif($row['estord']=='No se Realizo Examen' ){$clase='rojo';}
				elseif($row['estord']=='Con Aptitud Medica' or $row['estord']=='APTO'){$clase='verde';}
				elseif($row['estord']=='Aplazado'){$clase='azul';}
				else{$clase='amarillo';}
				$output['aaData'][] = array('<span class="'.$clase.'">'.$row['ocunum'].'</span>',$row['ocuced']." ".$row['ocunom']." ".$row['ocuape'],$row['ocucar'],
$row['cliente'],$row['oculab'],$row['tipord'],$row['estord'],$row['ocuobs']." ".$row['obssol']." ".$row['obsing'],$row['fecsol'],				
				"<a href='#' title='Ver Orden de Seguridad'  class='ver'  data-cod='".$row['ocunum']."'>
				   <img src='/res/icons/print.png' width='14' height='14' /></a >");
				  
				}
				echo json_encode($output);
			}
	   }
	   
	      function impordenlaboratorio($codigo){$data=array('ocunum'=>$codigo);$this->load->view('/ordenes/impordenlaboratorio', $data);} 
		  function impeditarordenhseq($codigo){$data=array('ocunum'=>$codigo);$this->load->view('ordenes/impeditarordenhseq', $data);} 	
		  function impaprobarordenhseq($codigo,$a=''){$data=array('ocunum'=>$codigo,'a'=>$a);$this->load->view('/ordenes/impaprobarordenhseq', $data);} 		
		  function impaprobarordenseguridad($codigo){$data=array('ocunum'=>$codigo);$this->load->view('ordenes/impaprobarordenseguridad', $data);} 
		  function imprimir_orden_cli($codigo,$tipo){
		  $data=array('ocunum'=>$codigo, 'codlab'=>$this->session->userdata('user'), 'cargar' => $tipo);
		  $this->load->view('/ordenes/impordenlaboratoriocliente_v', $data);
		  } 
		  

	function gen_ord_seguridad(){
	$this->output->set_header('Content-type: application/json');		   
	$tipcon = $this->input->post('tipcon');
	$ocupor = $this->input->post('ocupor');
	$consec = $this->con->consecutivo($ocupor);
	   
	$nricli = (explode("-",$this->input->post('nricli')));
	$proveedor = (explode("-",$this->input->post('proveedor')));
	$ocuced = (explode("-",$this->input->post('ocuced')));
	$codconc1 = (explode("-",$this->input->post('codconc1')));
	
	
	$fecha = date('Y-m-d H:i:s');
	$result = $this->orde->insertar_ord_cabecera($consec['0'], $consec['1'], $ocuced['0'], $ocuced['1'], 
	$proveedor['0'], $proveedor['1'], $proveedor['4'], $proveedor['3'], $proveedor['2'], $nricli['0'], $nricli['1'], $tipcon, '2', $fecha,$this->session->userdata('user'));
	
	$result = $this->orde->insertar_ord_detalle($consec['0'], $codconc1['0'], $codconc1['1'], $codconc1['2'], $codconc1['3']);
	$a=$this->input->post('codconc2');
	if ($a != ''){
	$codconc2 = (explode("-",$a));
	$result = $this->orde->insertar_ord_detalle($consec['0'], $codconc2['0'], $codconc2['1'], $codconc2['2'], $codconc2['3']);
	}
	$a=$this->input->post('codconc3');
	if ($a != ''){
	$codconc3 = (explode("-",$a));
	$result = $this->orde->insertar_ord_detalle($consec['0'], $codconc3['0'], $codconc3['1'], $codconc3['2'], $codconc3['3']);
	}
	$a=$this->input->post('codconc4');
	if ($a != ''){
	$codconc4 = (explode("-",$a));
	$result = $this->orde->insertar_ord_detalle($consec['0'], $codconc4['0'], $codconc4['1'], $codconc4['2'], $codconc4['3']);
	}
	echo "1";

		   }


}		