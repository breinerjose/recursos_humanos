<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//we need to call PHP's session object to access it through CI
class Archivos_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	  $this->load->helper('archivos');
	   $this->load->model('archivos_m','arc',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	    ini_set('memory_limit','4000M');
	   set_time_limit(0);
	}
	
	function index(){
	exit();
	}
	
	function enviarCorreosAseco(){
	listar_archivos_aseco('./res/enviaraseco'); 
	}
	
	function actualizarCampo(){
	$this->db->set($this->input->post('campo'), $this->input->post('valor'));
	$this->db->where('oid', $this->input->post('oid'));
	$this->db->update('arcdis');
	if($this->db->affected_rows() > 0){echo 1;}else{ echo 0;}
	//echo $this->db->last_query();
	}
	
	function enviarCorreosAsap(){
	 $mes = date("m")-1;
	 $mes = mes($mes);
	  $b = date("Y");
	  $fecha = $mes.' DE '.$b;
	  $nombre_fichero = './res/enviarasap/ASAP PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.'.pdf';
	if (file_exists($nombre_fichero)) {
	listar_archivos_asap('./res/enviarasap'); 
	}else{ echo "El fichero $nombre_fichero no existe, Correos No Enviados";}

	}
	function enviarCorreosAsapNew(){
	  $mes = date("m")-1;
	  $mes = mes($mes);
	  $b = date("Y");
	  $fecha = $mes.' DE '.$b;
	  $nombre_fichero = './res/enviarasap/ASAP PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.'.pdf';
	if (file_exists($nombre_fichero)) {
	listar_archivos_asapnew('./res/enviarasap'); 
	}else{ echo "El fichero $nombre_fichero no existe, Correos No Enviados";}
	}
	
	
	function enviarCorreosAsecoNew(){
	  $mes = date("m")-1;
	  $mes = mes($mes);
	  $b = date("Y");
	  $fecha = $mes.' DE '.$b;
	  $nombre_fichero = './res/enviaraseco/ASECO PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.' A.pdf';
	if (file_exists($nombre_fichero)) {
		listar_archivos_aseconew('./res/enviaraseco'); 
	 //$nombre_ficherob = './res/enviaraseco/ASECO PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.' B.pdf';
	 //	if (file_exists($nombre_ficherob)) {
//	
//	}else{ echo "El fichero $nombre_ficherob no existe, Correos No Enviados";}
	} else { echo "El fichero $nombre_fichero no existe, Correos No Enviados"; }
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("archivos/".$nombre); //llamo a la vista
		}
	
	function eliminar(){
		$condicion['token'] = $this->security->xss_clean($this->input->post('token'));
		$data=array('stdarc'=>'inactivo');
		$row=$this->bas->actualizar('archivos',$data,$condicion);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function consultarterceros(){
		$ale=$this->input->post('ale');
		$this->output->set_header('Content-type: application/json');
		$result = $this->arc->consultarterceros();
		$codtrc = $this->input->post('codtrc');
		$condicion= array('estado' => 'activo');
		$res=$this->bas->consultarf('codcaj, codest','cajas',$condicion);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['codtrc'],$row['nomtrc'],
				'<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" data-cod="'.$row['codtrc'].'" 
				data-nom="'.$row['nomtrc'].'" data-caj="'.$res['codcaj'].'" data-est="'.$res['codest'].'"
			   role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>'
				  
				  );
				}
				echo json_encode($output);
			}
	   } 
	   
	   
	   function consultartercerosb(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->arc->consultarterceros();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$resultb = $this->arc->consultarubicacion($row['codtrc']);
				if($resultb != FALSE){
				foreach($resultb as $rowb){$row['codcaj']=$rowb['codcaj']; $row['codest']=$rowb['codest'];}
				}else{$row['codcaj']=0; $row['codest']=0;}

				//$row['codcaj']=0; $row['codest']=0;
				$output['aaData'][] = array($row['codtrc'],urldecode($row['nomtrc']),$row['codcaj'],$row['codest'],
				"<a href='#' title='Modificar Informacion'  class='editar'  data-cod='".$row['codtrc']."' 
				data-nom='".$row['nomtrc']."' data-caj='".$row['codcaj']."' data-est='".$row['codest']."'>
				  <img src='/recursos/iconos/editar.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   } 
	   
	   function consultararchivos(){
		$this->output->set_header('Content-type: application/json');
		$condi="codtrc != 'a' and delusr is null";
		$result = $this->bas->consultar('codtrc, nomtrc, codcaj, codest, oid,codoid','arcdis',$condi);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['codtrc'],urldecode($row['nomtrc']),"<a href='javascript:void(0);' title='Borrar Archivo'  class='borrar btnst' codoid='".$row['codoid']."'  oid ='".$row['oid']."'>Borrar</a >&nbsp;&nbsp;&nbsp;",
				'<p class="detdcm" campo="codcaj" oid="'.$row['oid'].'" valor="'.$row['codcaj'].'">'.$row['codcaj'].'</p>',
				'<p class="detdcm" campo="codest" oid="'.$row['oid'].'" valor="'.$row['codest'].'">'.$row['codest'].'</p>',
				"<a href='javascript:void(0);' title='Prestar Archivo'  class='rvtir btnst' nomemp='".$row['nomtrc']."'  data-id ='".$row['codtrc']."'>Prestar</a >&nbsp;&nbsp;&nbsp;");
				}
				echo json_encode($output);
			}
	   } 
	   
	    function misfolder(){
		$this->output->set_header('Content-type: application/json');
		$condicion=array('codusr' => $this->session->userdata('user'));
		$result = $this->bas->consultarb('*','view_prestamos',$condicion,'updfch IS NULL');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['codemp'],urldecode($row['nomemp']),$row['codusr'],$row['addfch'],$row['fecent'],$row['usupre'],$row['updfch']);
				}
				
			}else{
			$output['aaData'][] = array('','No Tiene Folders en Prestamos','','','','','');}
			echo json_encode($output);
	   } 
	   
	    function historicofolder(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->bas->consultas('*','view_prestamos');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['codemp'],urldecode($row['nomemp']),$row['codusr'],$row['addfch'],$row['fecent'],$row['usupre'],$row['updfch']);
				}
				echo json_encode($output);
			}
	   } 
	   
	    function folder_entregar(){
		$this->output->set_header('Content-type: application/json');
		$condicion="fecent IS NULL";
		$result = $this->bas->consultar('*','view_prestamos',$condicion);
		//echo $this->db->last_query();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
	$output['aaData'][] = array($row['codemp'],urldecode($row['nomemp']),$row['codusr'],$row['addfch'],"<a href='javascript:void(0);' title='Prestar Archivo'  class='rvtir btnst' data-id ='".$row['codemp']."'>Entregado</a >");
				}
				echo json_encode($output);
			}
	   } 
	   
	    function folder_prestamos(){
		$this->output->set_header('Content-type: application/json');
		$condicion="updfch IS NULL";
		$result = $this->bas->consultar('*','view_prestamos',$condicion);
		//echo $this->db->last_query();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
	$output['aaData'][] = array($row['codemp'],urldecode($row['nomemp']),$row['codusr'],$row['addfch'],"<a href='javascript:void(0);' title='Prestar Archivo'  class='rvtir btnst' data-id ='".$row['codemp']."'>Recibido</a >");
				}
				echo json_encode($output);
			}
	   }
	   
	  function editar_archivos($codtrc,$nomtrc,$codcaj,$codest){
	   			$data['codtrc'] = $codtrc;
				$data['nomtrc'] = urldecode($nomtrc);
				$data['codcaj'] = $codcaj;
				$data['codest'] = $codest;
				$this->load->view('archivos/editar_archivos_v.php',$data);
	   } 
	   
	  
	   function prestamo(){
     $this->output->set_header('Content-type: application/json');
       $data = array('codemp' => trim($this->input->post('codigo')), 'codusr' => $this->session->userdata('user'),'nomemp' => trim($this->input->post('nomemp')) );
      echo( $this->bas->insertar('arcpre',$data))? '{"msg":"0"}': '{"msg":"0"}';
    }  
	    
	function borrar(){
     $this->output->set_header('Content-type: application/json');
       $data = array('delusr' => $this->session->userdata('user'),'delfch' => date('Y-m-d H:i:s') );
	   $condicion = array('oid' => trim($this->input->post('oid')), 'codoid' => trim($this->input->post('codoid')));
      echo( $this->bas->actualizar('arcdis',$data,$condicion))? '{"msg":"0"}': '{"msg":"0"}';
    }  
	
	 function entregar(){
     $this->output->set_header('Content-type: application/json');
	 $condicion=array('codemp' => trim($this->input->post('codigo')));
       $data = array('usupre' => $this->session->userdata('user'), 'fecent' => date('Y-m-d H:i:s') );
      echo( $this->bas->actualizar('arcpre',$data,$condicion))? '{"msg":"0"}': '{"msg":"0"}';
    }  
	
	function recibir(){
     $this->output->set_header('Content-type: application/json');
	 $condicion=array('codemp' => trim($this->input->post('codigo')));
       $data = array('usrrcb' => $this->session->userdata('user'), 'updfch' => date('Y-m-d H:i:s') );
      echo( $this->bas->actualizar('arcpre',$data,$condicion))? '{"msg":"0"}': '{"msg":"0"}';
    }  
	    
	function archivos_i(){
		$data=array(
		'codtrc'=> $this->security->xss_clean($this->input->post('codtrc')),
		'nomtrc'=> $this->security->xss_clean($this->input->post('nomtrc')),
		'codest'=> $this->security->xss_clean($this->input->post('codest')),
		'codcaj'=> $this->security->xss_clean($this->input->post('codcaj')),
		'addusr'=> $this->session->userdata('user'),
		'addfch'=> date('Y-m-d H:i:s'));
		$res=$this->bas->insertar('arcdis',$data);
		if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
			
	function agregar_archivo(){
	$datos = array($this->input->post('codcaj'),$this->input->post('codest'),$this->session->userdata('user'),date('Y-m-d H:i:s'),$this->input->post('codtrc'),$this->input->post('nomtrc'));	
		$res = $this->arc->actualizar_archivo($datos);
		//echo $this->db->last_query();
		if($res!=false){
			echo 0;
		}else{
			echo 1;
		}
	}	
		  
}