<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ordenes_new_c extends CI_Controller {
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',TRUE);
	   $this->load->model('consecutivo_m','con',TRUE);//modelo, alias, verdadero cargue modelo 
	   if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();}
	}
	
	function examenes_ordenc(){
        $this->output->set_header('Content-type:application/json');
        $ale=$this->input->post('ale');
        $ocunum=$this->security->xss_clean($this->input->post('ocunum'));
		//echo $ocunum;
		$condicion = array('ordnum'=>$ocunum);
		$condicionb = 'delusr IS NULL';
        $resp=$this->bas->consultarb('id, codconc, desconc, valconc, diaven, facint','ocudetord',$condicion,$condicionb);
		//echo $this->db->last_query();
        if($resp!=false){
            foreach($resp as $row){
            $output['aaData'][] = array($row['codconc'],$row['desconc'],$row['diaven'],$row['facint'],$row['valconc'],
              
               '<a class="btn btn-danger btn-xs eliminar'.$ale.'" title="Eliminar" data-con="'.$row['id'].'"
  					role="button" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
               
              ',
               );
            }
            }else{
                $output['aaData'][] = array('','NO TIENE EXAMENES','','','','');
                }
        echo json_encode($output);
        }
		
	function exameni(){
	$codconc = explode("-",$this->security->xss_clean($this->input->post('codconc')));
	 $datos = array(
					  'facint'=>$this->security->xss_clean($this->input->post('tipcob')),
					  'codconc'=> $codconc['0'],'desconc'=> $codconc['1'],
					  'valconc'=>$this->security->xss_clean($this->input->post('precio')), 'tipagr' => '2', 'diaven' => '0',
					  'ordnum'=>'0',
					  'addusr' => $this->session->userdata('user'),'addfch'=>date('Y-m-d H:s:i')
					 );			
		  $row=$this->bas->insertar('ocudetord',$datos);
		  //$this->db->last_query();
		  $output["err"]='1';	
	echo json_encode($output);
	}
	
	function carga_examen(){
	 $this->output->set_header('Content-type:application/json');
	 $contador=0;
	 $this->bas->borrar('ocudetord',array('ordnum'=>'0'));
	 $cargo = explode("-",$this->security->xss_clean($this->input->post('codcar')));
	 $cargo = $cargo['0'];
	 $id_empresa = explode("-",$this->security->xss_clean($this->input->post('id_empresa')));
	 $id_empresa=$id_empresa['0'];
	 $ocupor=$this->security->xss_clean($this->input->post('ocupor'));
	  
 if($cargo != '' and $id_empresa != ''){
 	$subgru = $this->security->xss_clean($this->input->post('tipord'));
	
	if($subgru == 'RETIRO'){
	$data=array('ordnum' => $contador, 'codconc' => '82', 'desconc' => 'EXAMEN FISICO DE EGRESO', 'valconc' => '24698', 'facint' => 'EMPRESA', 'diaven' => '0');	
	$ins = $this->bas->insertar('ocudetord',$data);
		//echo $this->db->last_query().'</br>';
	}
 	if($subgru == 'PERIODICO'){$subgru='INGRESO';}
	 $condicion = array('nricli' => $id_empresa, 'codcrg' => $cargo, 'codord' => $ocupor, 'subgru'=> $subgru);
	 $res =  $this->bas->consultar('*','view_profesiograma',$condicion);
	 //echo $this->db->last_query().'</br>';
	 if($res != false){
	 foreach($res as $rows){
		 extract($rows);
		//Cuando el empleado es nuevo los examenes de arl los asume la empresa
		if($this->security->xss_clean($this->input->post('tipcon')) == 'NUEVO ASPIRANTE' and $tipcob=='ARL'){$tipcob='EMPRESA';}
		//Examenes medicos siempre los asume la empresa
		if($codknp == '95'){$tipcob='EMPRESA';}
		
	//	 //Verificar Vencimiento
	$contador='0';
	$condia = array('ocuced' => $this->security->xss_clean($this->input->post('ocuced')), 'codconc' => $codknp, 'ocunum !=' => $contador, 'estord !=' => 'No se Realizo Examen');
	$condib = "ocudetord.ordnum = ocuord.ocunum";
	$resp = $this->bas->consultarb('max(fecsol) as fecini','ocuord, ocudetord',$condia,$condib);
		//echo $this->db->last_query().'</br>';
		if($resp != false){
		foreach($resp as $rowsexa){		
		extract($rowsexa);
		if($fecini != ''){
		//echo 'fecsol'.$this->security->xss_clean($this->input->post('fecsol')).'-';
		//echo 'fecini'.$fecini;
		
		$dias	= (strtotime($this->security->xss_clean($this->input->post('fecing')))-strtotime($fecini))/86400;
		
		$dias = round($dias,0);
		$codknp=trim($codknp);
		$respa =  $this->bas->consultarf('vencimiento','ocuconc',array('codigo' => $codknp));
		//echo $this->db->last_query().'</br>';
		if($respa != false){
		extract($respa);
		$diaven = $vencimiento-$dias;
//		echo $diaven.'</br>';
//		echo $vencimiento.'</br>';
//		echo $dias.'</br>';
		if($diaven < 0){$diaven=0;}
		   }else{$diaven=0;}
		 }else{$diaven=0;}
       } 
 	 }else{$diaven=0;}
	 
	 //$respa =  $this->bas->consultarf('valexa as valor','tarifa',array('codexa'=>trim('$codknp'),'codcli'=> $laboratorio['5']));
	 //if($respa != false){ extract($respa); }else{$valor=0;}
	$valor=0;
	//$diaven=0;
		// Fin Verificar Vencimiento	
	$data=array('ordnum' => $contador, 'codconc' => $codknp, 'desconc' => $nomexa, 'valconc' => $valor, 'facint' => $tipcob, 'diaven' => $diaven);	
	$ins = $this->bas->insertar('ocudetord',$data);
	//echo $this->db->last_query().'<br>';
	}
	}
	$output["err"]='0';
	$output["msg"]='Consulta Exitosa';
	}else{
	$output["err"]='1';
	$output["msg"]='Error con el cargo o empresa';}
	echo json_encode($output);
	} 
	
	function generar_new(){
	$this->output->set_header('Content-type:application/json');
	$ocupor = $this->input->post('ocupor');
	
	if($ocupor == 'ASECO'){
	$condicion = array('numero !='=>'0');
	$contemsql = $this->bas->consultarf('numero','numero_orden_hseq_aseco',$condicion);
	if($contemsql != false){
 	$contador = "OSEASE".$contemsql['numero']; //guarda el valor del contador
	}else{ 
	$x=$this->db->last_query()."No Se Pudo Obtener Número de la Orden";
	$this->bas->insertar('logsql',array('logsql'=>$x));
	$output["msg"]='No Se Pudo Obtener Número de la Orden';
	echo json_encode($output);
	exit(); }
	}else if ($ocupor == 'ASAP'){
	$condicion = array('id_fuente'=>'4');
	$contemsql = $this->bas->consultarf('contador','bre_fuente',$condicion);
	$x=$this->db->last_query();
	$this->bas->insertar('logsql',array('logsql'=>$x));
	if($contemsql != false){
 	$contador = "OSEASA".$contemsql['contador']; //guarda el valor del contador
    $rcontem2 = $contemsql['contador'] + 1;
	$data['contador'] = $rcontem2;
	$sqlup = $this->bas->actualizar('bre_fuente',$data,$condicion);
	$x=$this->db->last_query();
	$this->bas->insertar('logsql',array('logsql'=>$x));
	}else{  
	$x=$this->db->last_query()."No Se Pudo Obtener Número de la Orden";
	$this->bas->insertar('logsql',array('logsql'=>$x));
	$output["msg"]='No Se Pudo Obtener Número de la Orden';
	echo json_encode($output);
	exit(); }
	}else{ 
	$x=$this->db->last_query()."No Se Determino La Empresa";
	$this->bas->insertar('logsql',array('logsql'=>$x));
	$output["msg"]='No Se Determino La Empresa"';
	echo json_encode($output);
	exit(); }
	
	$cargo = explode("-",$this->security->xss_clean($this->input->post('codcar')));
	$condi = array('carcod' => $cargo['0']);
	$con =  $this->bas->consultarf('riesgo','funcar',$condi);
	if ($con == false) {
	$x=$this->db->last_query()."El Cargo No Está En La Base de Datos";
	$this->bas->insertar('logsql',array('logsql'=>$x));
	$output["msg"]='El Cargo No Está En La Base de Datos"a"';
	echo json_encode($output);
	exit(); }
	
	$laboratorio = explode("-",$this->security->xss_clean($this->input->post('codlab')));
	$id_empresa = explode("-",$this->security->xss_clean($this->input->post('id_empresa')));
	if($this->security->xss_clean($this->input->post('edad')) != ''){ $edad=$this->security->xss_clean($this->input->post('edad')); }else{ $edad = 0; }
	$data = array(
	'ocunum' => $contador, 
	'ocupor' => $ocupor, 
	'ocuced' => $this->security->xss_clean($this->input->post('ocuced')), 
	'ocunom' => $this->security->xss_clean($this->input->post('ocunom')), 
	'ocuape' => $this->security->xss_clean($this->input->post('ocuape')), 
	'ocudir' => $this->security->xss_clean($this->input->post('ocudir')), 
	'ocutel' => $this->security->xss_clean($this->input->post('ocutel')), 
	'edad' => $edad,
	'ocueps' => $this->security->xss_clean($this->input->post('eps')),
	'ocucel' => $this->security->xss_clean($this->input->post('ocucel')), 
	'codcrg' => $cargo['0'],
	'ocucar' => $cargo['1'], 
	'codlab' => $laboratorio['5'], 
	'oculab' =>  $laboratorio['0'], 
	'ocuemaem' => $laboratorio['1'],
	'ocutelem' => $laboratorio['2'],
	'ocuemp' => $laboratorio['4'],
	'ocufem' => $this->security->xss_clean($this->input->post('fecing')), 
	'ocufre' =>$this->security->xss_clean($this->input->post('fecing')), 
	'nricli' => $id_empresa['0'],
	'cliente' => $id_empresa['1'],
	'riesgo' => $con['riesgo'], 
	'tipcon' => $this->security->xss_clean($this->input->post('tipcon')), 
	'obssol' => $this->security->xss_clean($this->input->post('obssol')), 
	'obsing' => $this->security->xss_clean($this->input->post('obsing')), 
	'fecsol' => $this->security->xss_clean($this->input->post('fecsol')), 
	'fecing' => $this->security->xss_clean($this->input->post('fecing')), 
	'tipord' => $this->security->xss_clean($this->input->post('tipord')), 
	'tipsan' => $this->security->xss_clean($this->input->post('tipsan')),
	'addord' => $this->session->userdata('user'),
	'ocuobs' => ''
	);
	$res = $this->bas->insertar('ocuord',$data);
	if($res == false){ $x=$this->db->last_query().'Error al insertar Orden';
	$this->bas->insertar('logsql',array('logsql'=>$x));
	if($ocupor == 'ASAP'){
	$condicion = array('id_fuente'=>'4');
	unset($data);
	$data['contador'] = $contemsql['contador']-1;
	$sqlup = $this->bas->actualizar('bre_fuente',$data,$condicion);
	if ($sqlup == false) { 
	$x=$this->db->last_query()."No Se Pudo Obtener Número de la Orden";
	$this->bas->insertar('logsql',array('logsql'=>$x));
	exit(); }
	}
	exit();
	 }
	 
	$this->bas->actualizar('ocudetord',array('ordnum' => $contador),array('ordnum'=>'0'));
    //echo $this->db->last_query();

		$output["err"]='1';
		$output["num"]=$contador;
		echo json_encode($output);
	}
}		