<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Bogota');

class Solcon_c extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Solcon_m','sol',TRUE);
	$this->load->model('Basico_m','bas',	TRUE);
    }

	
	function vista($vista=''){
	$this->load->view('solicitudes/'.$vista);
	}
	
	public function insertar()
	{
		$data['codemp'] = $this->security->xss_clean($this->input->post('codemp'));
		$condcli = explode("-",$this->security->xss_clean($this->input->post('codcli')));
		$data['codcli']=$condcli[0];
		$data['nomcli']=$condcli[1];
		$data['nomcar'] = $this->security->xss_clean($this->input->post('nomcar'));
		$data['fchcon'] = $this->security->xss_clean($this->input->post('fchcon'));
		$data['observ'] = $this->security->xss_clean($this->input->post('observ'));
		$cantidad = $this->security->xss_clean($this->input->post('cantidad'));
		$codsol=$this->security->xss_clean($this->input->post('codsol'));
		$data['labrel'] = '-';
		if($codsol == ''){
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		for ($i=1; $i <= $cantidad; $i++){
		$row=$this->bas->insertar('solcon',$data);
		}
		//echo $this->db->last_query();
		}else{
		$data['labrel'] = $this->security->xss_clean($this->input->post('labrel'));
		$data['nomfun'] = $this->security->xss_clean($this->input->post('nomfun'));
		$data['nomare'] = $this->security->xss_clean($this->input->post('nomare'));
		//$data['codcar'] = $this->security->xss_clean($this->input->post('codcar'));
		$data['fchter'] = $this->security->xss_clean($this->input->post('fchter'));
		$data['salari'] = $this->security->xss_clean($this->input->post('salari'));
		$data['bonifi'] = $this->security->xss_clean($this->input->post('bonifi'));
		$data['frebon'] = $this->security->xss_clean($this->input->post('frebon'));
		$data['subali'] = $this->security->xss_clean($this->input->post('subali'));
		$data['valbon'] = $this->security->xss_clean($this->input->post('valbon'));
		$data['salbon'] = $this->security->xss_clean($this->input->post('salbon'));
		$data['subtra'] = $this->security->xss_clean($this->input->post('subtra'));
		$data['trarut'] = $this->security->xss_clean($this->input->post('trarut'));
		$data['hortra'] = $this->security->xss_clean($this->input->post('hortra'));
		$data['dotaci'] = $this->security->xss_clean($this->input->post('dotaci'));
		$data['reqaud'] = $this->security->xss_clean($this->input->post('reqaud'));
		$data['reqres'] = $this->security->xss_clean($this->input->post('reqres'));
		$data['reqalt'] = $this->security->xss_clean($this->input->post('reqalt'));
		$data['reqcon'] = $this->security->xss_clean($this->input->post('reqcon'));
		$data['updusr'] = $this->session->userdata('user');
		$condicion=array('codsol'=>$codsol);
		$row=$this->bas->actualizar('solcon',$data,$condicion); 
		}
		
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	public function borrar()
	{
		$condi['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['delfch'] = date("Y-m-d H:i:s");
		$data['delusr'] = $this->session->userdata('user');
		$row=$this->bas->actualizar('solcon',$data,$condi);
		//echo $this->db->last_query();
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function selectclientes(){
	 $this->output->set_header('Content-type: application/json');
		$res = $this->sol->selectclientes($this->session->userdata('codigo'));
			 if($res!=false){
			   $data = array();
			   //$fila = array( 'codsed'=>'00000','nomsed'=>'Todas las Sedes');
						  // $data[] = $fila;
					foreach ($res as $row){
						   $fila = array( 'codcli'=>$row['nit'],'nomcli'=>utf8_encode($row['nombrecliente']));
						   $data[] = $fila;
				   }
				   echo json_encode($data);
			}else{
				   echo '{"msg":"0"}';
		   }	
	}
	
	function selectareas(){
	 $this->output->set_header('Content-type: application/json');
	 $codcli =  $this->input->post('codcli');
		$res = $this->sol->selectareas($codcli);
			 if($res!=false){
			   $data = array();
			   //$fila = array( 'codsed'=>'00000','nomsed'=>'Todas las Sedes');
						  // $data[] = $fila;
					foreach ($res as $row){
						   $fila = array( 'codare'=>$row['codare'],'nomare'=>utf8_encode($row['nomare']));
						   $data[] = $fila;
				   }
				   echo json_encode($data);
			}else{
				   echo '{"msg":"0"}';
		   }	
	}
	
	function imprimir($codsol){
	$condicion=array('codsol'=>$codsol);
	$data=$this->bas->consultarf('*','solcon',$condicion);
	$condicion=array('cedula'=>$data['addusr']);
	$row=$this->bas->consultarf('nombres','datos',$condicion);
	$data['nombres']=$row['nombres'];
	$this->load->view('/solicitudes_contratacion/print_solicitud_v',$data);
	}
	
	function seleccion(){
	$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
		$hoy=date('Y-m-d');
		$fecha = date("Y-m-d",strtotime($hoy."-8 month")); 
		$resp = $this->bas->consultarb('codsol, labrel, addfch, nomcar, nomcli,fchcon','solcon','delusr IS NULL',
		array('addfch >='=>$fecha));
		if($resp!=false){foreach($resp as $row){
			$seleccion='En Reclutamiento';
			$estado='Pendiente';			
			//Enviado al cliente
	$condi=array('tipo'=>'1','codsol'=>$row['codsol'],'observ'=>'Enviado Al Cliente');$orden=('addfch');$resx=$this->bas->consultar_orden('observ, addfch','soldet',$condi,$orden);
	if($resx != false){foreach($resx as $rowx){$enviado=$rowx['addfch'];} }else{
	$enviado='<center><a class="btn btn-primary btn-xs enviado'.$ale.'" title="Enviado a Cliente" data-cod="'.$row['codsol'].'" role="button" href="javascript:void(0);">
	<i class="fa fa-edit"></i> </a></center>';}
	
	//Seleccionado
	$condi=array('codsol'=>$row['codsol']);
	$orden=('addfch');
	$resx=$this->bas->consultar_orden('codsol,addfch,actelm,nombres','solcon_seleccionado',$condi,$orden);
	if($resx != false){foreach($resx as $rowx){
	$seleccionado=$rowx['addfch'].' '.$rowx['actelm'].' '.$rowx['nombres'].'  <a class="btn btn-xs borrar'.$ale.'" title="Borrar" 
	data-cod="'.$row['codsol'].'" role="button" href="javascript:void(0);">	<i class="fa fa-trash"></i> </a>';} }else{
	$seleccionado='<center><a class="btn btn-warning btn-xs seleccion'.$ale.'" title="Seleccionado" data-cod="'.$row['codsol'].'" role="button" href="javascript:void(0);">
	<i class="fa fa-edit"></i> </a></center>';}

			$condi=array('tipo'=>'1','codsol'=>$row['codsol']);
			$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$seleccion=$rowx['observ'];}}
			
			$condi=array('tipo'=>'2','codsol'=>$row['codsol']);$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$emo=$rowx['observ'];}}
			$feccon='';
			$condi=array('tipo'=>'5','codsol'=>$row['codsol']);$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$feccon=$rowx['observ'];  
		    if($row['fchcon'] < $rowx['observ']){$estado='EXTEMPORANEO';}else{$estado='CUMPLIDO';} }}
				
			
				$output['aaData'][] = array(
			   $row['nomcar'],$row['nomcli'],$row['addfch'],$enviado,$seleccionado,$row['fchcon'],$feccon,$estado
			   );
			}	
		}		
	    echo json_encode($output);		
		
	}
	
function enviado_cliente(){
		$data['tipo']='1';
		$data['observ']='Enviado Al Cliente';
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('soldet',$data);
		//echo $this->db->last_query();
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
}

function seleccionado(){
		$data['tipo']='1';
		$data['observ']='Seleccionado';
		$data['actelm'] = trim($this->security->xss_clean($this->input->post('codtrc')));
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('soldet',$data);
		//seleccciono orden hseq
		//
		$condicion=array('codsol'=>$this->security->xss_clean($this->input->post('codsol')));
		$sol=$this->bas->consultarf('codemp, fchcon','solcon',$condicion);
		if($sol['codemp']=='800900600-1'){$ocupor='ASAP';}else{$ocupor='ASECO';}
		//
		$fecini = strtotime ( '-12 day' , strtotime ( $sol['fchcon'] ) ) ;
		$fecini = date ( 'Y-m-d' , $fecini );
		$fecfin = strtotime ( '+15 day' , strtotime ( $sol['fchcon'] ) ) ;
		$fecfin = date ( 'Y-m-d' , $fecfin );
		$condicion=array('tipord'=>'INGRESO','tipordb'=>'1','ocupor'=>$ocupor,'ocufem >='=>$fecini,'ocufem <='=>$fecfin,'ocuced'=>trim($this->security->xss_clean($this->input->post('codtrc'))));
		$res=$this->bas->consultarf('ocunum, ocufem','view_sol_emo',$condicion);
		if($res != false){
		$data['tipo']='2';
		$data['observ'] = $res['ocufem'];
		$data['actelm'] = $res['ocunum'];
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('soldet',$data);
		}
		//Fin Orden Hseq
		//Inicio Contrato
		$condicion=array('ocupor'=>$ocupor,'fecdat >='=>$fecini,'fecdat <='=>$fecfin,'numid'=>trim($this->security->xss_clean($this->input->post('codtrc'))));
		$res=$this->bas->consultarf('fecdat, Codigo','view_sol_contrato',$condicion);
		//echo $this->db->last_query();
		if($res != false){
		$data['tipo']='5';
		$data['observ'] = $res['fecdat'];
		$data['actelm'] = $res['Codigo'];
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('soldet',$data);
		}
		//Fin Contrato
		
		//Poligrafia
		$condicion=array('tipordb'=>'2','ocupor'=>$ocupor,'ocufem >='=>$fecini,'ocufem <='=>$fecfin,'ocuced'=>trim($this->security->xss_clean($this->input->post('codtrc'))));
		$res=$this->bas->consultarf('ocunum, ocufem','view_sol_emo',$condicion);
		//echo $this->db->last_query();
		if($res != false){
		$conpoli=array('ordnum'=>$res['ocunum']);
		$poli=$this->bas->consultarf('ordnum','view_sol_poligrafia',$conpoli);
		//echo $this->db->last_query();
		if($poli != false){
		$data['tipo']='3';
		$data['observ'] = $res['ocufem'];
		$data['actelm'] = $res['ocunum'];
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('soldet',$data);
		}
		
		//Seguridad
		$poli=$this->bas->consultarf('ordnum','view_sol_seguridad',$conpoli);
		if($poli != false){
		$data['tipo']='4';
		$data['observ'] = $res['ocufem'];
		$data['actelm'] = $res['ocunum'];
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('soldet',$data);
		}
		}

		//Fin Poligrafia
		
		//echo $this->db->last_query();
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
}	
	
function nombre(){
		$this->output->set_header('Content-type:application/json');
		$condi['cedula'] = $this->security->xss_clean($this->input->post('codtrc'));
		$res=$this->bas->consultarf('nombres as nomtrc','datos',$condi);
		//echo $this->db->last_query();
		if($res!=false){$output["i"]=$res; $output["e"] = array("err"=>"1");}else{$output["e"] = array("err"=>"0");}
		//
	    echo json_encode($output);
		}	
	
function listado(){
	    $ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
		$hoy=date('Y-m-d');
		$fecha = date("Y-m-d",strtotime($hoy."-4 month")); 
		$resp = $this->bas->consultarb('codsol, labrel, addfch, nomcar, nomcli,fchcon','solcon','delusr IS NULL',array('addfch >='=>$fecha));
		//echo $this->db->last_query();
		if($resp!=false){foreach($resp as $row){
			$seleccion='En Reclutamiento';
			$estado='Pendiente';
			$emo=$poligrafia=$seguridad=$feccon='';
			$condi=array('tipo'=>'1','codsol'=>$row['codsol']);$orden=('addfch');
			$resx=$this->bas->consultar_orden('actelm','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){
			$y=array('trim(cedula)'=>$rowx['actelm']);
			$r=$this->bas->consultarf('nombres','datos',$y);
			$seleccion=$rowx['actelm'];
			if($r != false){$seleccion .=' '.$r['nombres'];}
			}}
			
			$condi=array('tipo'=>'2','codsol'=>$row['codsol']);
			$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$emo=$rowx['observ'];}}
			
			$condi=array('tipo'=>'3','codsol'=>$row['codsol']);
			$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$poligrafia=$rowx['observ'];}}
			
			$condi=array('tipo'=>'4','codsol'=>$row['codsol']);$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$seguridad=$rowx['observ'];}}
			
			$condi=array('tipo'=>'5','codsol'=>$row['codsol']);
			$orden=('addfch');
			$resx=$this->bas->consultar_orden('observ','soldet',$condi,$orden);
			if($resx != false){foreach($resx as $rowx){$feccon=$rowx['observ'];  
			if($row['fchcon'] < $rowx['observ']){$estado='EXTEMPORANEO';}else{$estado='CUMPLIDO';} }}
			
							
				$output['aaData'][] = array(
			   $row['addfch'],$row['nomcar'],$row['nomcli'],$seleccion 
			   ,$emo,$poligrafia,$seguridad,$row['fchcon'],$feccon,$estado,
			   '		
			<a class="btn btn-warning btn-xs editar'.$ale.'" title="Editar" data-cod="'.$row['codsol'].'" role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>
			<a class="btn btn-primary btn-xs print'.$ale.'" title="Editar" data-cod="'.$row['codsol'].'" role="button" href="javascript:void(0);"><i class="fa fa-print"></i> </a>
 			<a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-cod="'.$row['codsol'].'" role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>',
			   );
			}	
		}		
	    echo json_encode($output);		
	}
	
	function actualizar_solicitud(){
	
		$con='delusr IS NULL';
		$resp=$this->bas->consultar('codsol','solcon',$con);
		foreach($resp as $row){
		//selecciono si esta seleccionado
		$c=array('codsol'=>$row['codsol'],'tipo'=>'1');
		$emp=$this->bas->consultarf('actelm','soldet',$c);
		//
		
		$condicion=array('codsol'=>$row['codsol']);
		$sol=$this->bas->consultarf('codemp, fchcon','solcon',$condicion);
		if($sol['codemp']=='800900600-1'){$ocupor='ASAP';}else{$ocupor='ASECO';}
		//
		$fecini = strtotime ( '-30 day' , strtotime ( $sol['fchcon'] ) ) ;
		$fecini = date ( 'Y-m-d' , $fecini );
		$fecfin = strtotime ( '+15 day' , strtotime ( $sol['fchcon'] ) ) ;
		$fecfin = date ( 'Y-m-d' , $fecfin );
		$condicion=array('tipord'=>'INGRESO','tipordb'=>'1','ocupor'=>$ocupor,'ocufem >='=>$fecini,'ocufem <='=>$fecfin,'ocuced'=>trim($emp['actelm']));
		$res=$this->bas->consultarf('ocunum, ocufem','view_sol_emo',$condicion);
		//if($emp['actelm'] == '1143346403'){ echo $this->db->last_query();}
		$c=array('codsol'=>$row['codsol'],'tipo'=>'2');
		$sw=$this->bas->consultarf('tipo','soldet',$c);
		if($res != false and $sw != true){
		$data['tipo']='2';
		$data['observ'] = $res['ocufem'];
		$data['actelm'] = $res['ocunum'];
		$data['codsol'] = $row['codsol'];
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = '73214641';
		$row=$this->bas->insertar('soldet',$data);
		}
		//Fin Orden Hseq
		//Inicio Contrato
		$condicion=array('ocupor'=>$ocupor,'fecdat >='=>$fecini,'fecdat <='=>$fecfin,'numid'=>trim($emp['actelm']));
		$res=$this->bas->consultarf('fecdat, Codigo','view_sol_contrato',$condicion);
		//if($emp['actelm']=='1047442258'){echo $this->db->last_query(); }
		$c=array('codsol'=>$row['codsol'],'tipo'=>'5');
		$sw=$this->bas->consultarf('tipo','soldet',$c);
		if($res != false and $sw != true){
		$data['tipo']='5';
		$data['observ'] = $res['fecdat'];
		$data['actelm'] = $res['Codigo'];
		$data['codsol'] = $row['codsol'];
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = '73214641';
		$row=$this->bas->insertar('soldet',$data);
		}
		//Fin Contrato
		
		//Poligrafia
		$condicion=array('tipordb'=>'2','ocupor'=>$ocupor,'ocufem >='=>$fecini,'ocufem <='=>$fecfin,'ocuced'=>trim($emp['actelm']));
		$res=$this->bas->consultarf('ocunum, ocufem','view_sol_emo',$condicion);
		//echo $this->db->last_query();
		if($res != false){
		$conpoli=array('ordnum'=>$res['ocunum']);
		$poli=$this->bas->consultarf('ordnum','view_sol_poligrafia',$conpoli);
		$c=array('codsol'=>$row['codsol'],'tipo'=>'3');
		$sw=$this->bas->consultarf('tipo','soldet',$c);
		if($poli != false and $sw != true){
		$data['tipo']='3';
		$data['observ'] = $res['ocufem'];
		$data['actelm'] = $res['ocunum'];
		$data['codsol'] = $row['codsol'];
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = '73214641';
		$row=$this->bas->insertar('soldet',$data);
		}
		
		//Seguridad
		$poli=$this->bas->consultarf('ordnum','view_sol_seguridad',$conpoli);
		$c=array('codsol'=>$row['codsol'],'tipo'=>'4');
		$sw=$this->bas->consultarf('tipo','soldet',$c);
		if($poli != false and $sw != true){
		$data['tipo']='4';
		$data['observ'] = $res['ocufem'];
		$data['actelm'] = $res['ocunum'];
		$data['codsol'] = $row['codsol'];
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = '73214641';
		$row=$this->bas->insertar('soldet',$data);
		}
		}

		//Fin Poligrafia
		
		//echo $this->db->last_query();
		//if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	  }
	  		$this->bas->insertar('log',array('tipo'=>'Solicitudes','ejefec'=>date('Y-m-d H:i:s')));	
	}
	
	function eliminar_seleccionado(){
		$data['codsol'] = $this->security->xss_clean($this->input->post('codsol'));
		$data['observ'] = 'seleccionado';
		$data['tipo'] = '1';
		$this->bas->borrar('soldet',$data);		
		echo '{"err":"1"}';
	}
	
	function consultac(){
	
			$this->output->set_header('Content-type:application/json');
		    $output = array("aaData" => array());
			$condicion = array('codsol' => $this->security->xss_clean($this->input->post('codsol')));
			$row = $this->bas->consultarf('*','solcon',$condicion);
			if($row!=false){$output["err"]='1';	 $output["a"] = $row; }else{echo '{"err":"0","msg":"hubo un error"}';}
		    echo json_encode($output);	
			
			
	}
}