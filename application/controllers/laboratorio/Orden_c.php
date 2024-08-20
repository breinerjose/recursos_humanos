<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orden_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	
	function generar(){
	$this->output->set_header('Content-type:application/json');
	$ocupor = $this->input->post('ocupor');
	
	if($ocupor == 'ASECO'){
	$condicion = array('id_fuente'=>'3');
	$contemsql = $this->bas->consultarf('contador','bre_fuente',$condicion);
	if($contemsql != false){
 	$contador = "OSEASE".$contemsql['contador']; //guarda el valor del contador
    $rcontem2 = $contemsql['contador'] + 1;
	$data['contador'] = $rcontem2;
	$sqlup = $this->bas->actualizar('bre_fuente',$data,$condicion);
	}else{ "No Se Pudo Obtener Número de la Orden"; exit(); }
	}else if ($ocupor == 'ASAP'){
	$condicion = array('id_fuente'=>'4');
	$contemsql = $this->bas->consultarf('contador','bre_fuente',$condicion);
	if($contemsql != false){
 	$contador = "OSEASA".$contemsql['contador']; //guarda el valor del contador
    $rcontem2 = $contemsql['contador'] + 1;
	$data['contador'] = $rcontem2;
	$sqlup = $this->bas->actualizar('bre_fuente',$data,$condicion);
	}else{ "No Se Pudo Obtener Número de la Orden"; exit(); }
	}else{ echo "No Se Determino La Empresa"; exit(); }
	$cargo = explode("-",$this->security->xss_clean($this->input->post('codcar')));
	$condi = array('carcod' => $cargo['0']);
	$con =  $this->bas->consultarf('riesgo','funcar',$condi);
	//Valido que el cargo exista
	if ($con == false) { echo "El Cargo No Está En La Base de Datos"; exit(); }
	
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
	if($res == false){ echo "La Orden No Se Puedo Generar"; echo $this->db->last_query();
	if($ocupor == 'ASECO'){
	$condicion = array('id_fuente'=>'3');
	$data['contador'] -= 1;
	$sqlup = $this->bas->actualizar('bre_fuente',$data,$condicion);
	if ($sqlup == false) {"No Se Pudo Obtener Número de la Orden"; exit(); }
	}else if ($ocupor == 'ASAP'){
	$condicion = array('id_fuente'=>'4');
	$data['contador'] -= 1;
	$sqlup = $this->bas->actualizar('bre_fuente',$data,$condicion);
	if ($sqlup == false) { "No Se Pudo Obtener Número de la Orden"; exit(); }
	}
	exit();
	 }

 if($cargo['0'] != '' and $id_empresa['0'] != ''){
 	$subgru = $this->security->xss_clean($this->input->post('tipord'));
	
	if($subgru == 'RETIRO'){
	$data=array('ordnum' => $contador, 'codconc' => '82', 'desconc' => 'EXAMEN FISICO DE EGRESO', 'valconc' => '24698', 'facint' => 'EMPRESA', 'diaven' => '0');	
	$ins = $this->bas->insertar('ocudetord',$data);
	if	($ins == false ){ echo "No se pudo Cargar Examen de Egreso"; echo $this->db->last_query().'</br>'; exit(); }
	}
 	if($subgru == 'PERIODICO'){$subgru='INGRESO';}
	 $condicion = array('nricli' => $id_empresa['0'], 'codcrg' => $cargo['0'], 'codord' => $ocupor, 'subgru'=> $subgru);
	 $res =  $this->bas->consultar('*','view_profesiograma',$condicion);
	 if	($ins == false ){ echo "No se pudo Cargar Profesiograma"; echo $this->db->last_query().'</br>'; exit(); }
	 if($res != false){
	 foreach($res as $rows){
		 extract($rows);
		 if($this->security->xss_clean($this->input->post('tipcon')) == 'NUEVO ASPIRANTE' and $tipcob=='ARL'){$tipcob='EMPRESA';}
		
		 //Verificar Vencimiento
	$condia = array('ocuced' => $this->security->xss_clean($this->input->post('ocuced')), 'codconc' => $codknp, 'ocunum !=' => $contador, 'estord !=' => 'No se Realizo Examen');
	$condib = "ocudetord.ordnum = ocuord.ocunum";
	$resp = $this->bas->consultarb('max(fecsol) as fecini','ocuord, ocudetord',$condia,$condib);
		//echo $this->db->last_query().'</br>';
		if($resp != false){
		foreach($resp as $rowsexa){		
		extract($rowsexa);
		if($fecini != ''){
		$dias	= (strtotime($this->security->xss_clean($this->input->post('fecsol')))-strtotime($fecini))/86400;
		$dias = round($dias,0);
		$codknp=trim($codknp);
		$respa =  $this->bas->consultarf('vencimiento','ocuconc',array('codigo' => $codknp));
		//echo $this->db->last_query().'</br>';
		if($respa != false){
		extract($respa);
		$diaven = $vencimiento-$dias;
		if($diaven < 0){$diaven=0;}
		   }else{$diaven=0;}
		 }else{$diaven=0;}
       } 
 	 }else{$diaven=0;}
	 
	 $respa =  $this->bas->consultarf('valexa as valor','tarifa',array('codexa'=>trim('$codknp'),'codcli'=> $laboratorio['5']));
	 if($respa != false){ extract($respa); }else{$valor=0;}
		
		// Fin Verificar Vencimiento	
	$data=array('ordnum' => $contador, 'codconc' => $codknp, 'desconc' => $nomexa, 'valconc' => $valor, 'facint' => $tipcob, 'diaven' => $diaven);	
	$ins = $this->bas->insertar('ocudetord',$data);
	if	($ins == false ){ echo "No se pudo Guardar Examen"; echo $this->db->last_query().'</br>'; }
	}
	}
	}
		$output["err"]='1';
		echo json_encode($output);
	}
	
	
	function actualizar(){
	$this->output->set_header('Content-type:application/json');
	$contador = $this->input->post('ocunum');
	$ocupor = $this->input->post('ocupor');
	
	$cargo = explode("-",$this->security->xss_clean($this->input->post('codcar')));
	$condi = array('carcod' => $cargo['0']);
	$con =  $this->bas->consultarf('riesgo','funcar',$condi);
	//echo $this->db->last_query();
	//exit();
	
	$laboratorio = explode("-",$this->security->xss_clean($this->input->post('codlab')));
	$id_empresa = explode("-",$this->security->xss_clean($this->input->post('id_empresa')));
	if($this->security->xss_clean($this->input->post('edad')) != ''){ $edad=$this->security->xss_clean($this->input->post('edad')); }else{ $edad = 0;}
	$data = array(
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
	'ocuobs' => '',
	'estord' => $this->security->xss_clean($this->input->post('estord'))
	);
	$condicion=array('ocunum' => $this->security->xss_clean($this->input->post('ocunum')));
	$res = $this->bas->actualizar('ocuord',$data,$condicion);
	
	if($cargo['0'] != '' and $id_empresa['0'] != '' and $this->input->post('rencal') == 'SI'){
	
	$condicion=array('ordnum' => $this->security->xss_clean($this->input->post('ocunum')));
	$this->bas->borrar('ocudetord',$condicion);
	
 	$subgru = $this->security->xss_clean($this->input->post('tipord'));
	if($subgru == 'RETIRO'){
	$data=array('ordnum' => $contador, 'codconc' => '82', 'desconc' => 'EXAMEN FISICO DE EGRESO', 'valconc' => '24698', 'facint' => 'EMPRESA', 'diaven' => '0');	
	$ins = $this->bas->insertar('ocudetord',$data);
	}
 	if($subgru == 'PERIODICO'){$subgru='INGRESO';}
	 $condicion = array('nricli' => $id_empresa['0'], 'codcrg' => $cargo['0'], 'codord' => $ocupor, 'subgru'=> $subgru);
	 $res =  $this->bas->consultar('*','view_profesiograma',$condicion);
	 if($res != false){
	 foreach($res as $rows){
		 extract($rows);
		 if($this->security->xss_clean($this->input->post('tipcon')) == 'NUEVO ASPIRANTE' and $tipcob=='ARL'){$tipcob='EMPRESA';}
		
		 //Verificar Vencimiento
	$condia = array('ocuced' => $this->security->xss_clean($this->input->post('ocuced')), 'codconc' => $codknp, 'ocunum !=' => $contador, 'estord !=' => 'No se Realizo Examen');
		$condib = "ocudetord.ordnum = ocuord.ocunum";
		$resp = $this->bas->consultarb('max(fecsol) as fecini','ocuord, ocudetord',$condia,$condib);
		//echo $this->db->last_query();
		if($resp != false){
		foreach($resp as $rowsexa){		
		extract($rowsexa);
		if($fecini != ''){
		$dias	= (strtotime($this->security->xss_clean($this->input->post('fecsol')))-strtotime($fecini))/86400;
		$dias = round($dias,0);
		$condi = "trim(codigo) = trim('$codknp')";
		$respa =  $this->bas->consultarf('vencimiento','ocuconc',$condi);
		if($respa != false){
		extract($respa);
		//echo $this->db->last_query();
		//exit();
		$diaven = $vencimiento-$dias;
		if($diaven < 0){$diaven=0;}
		   }else{$diaven=0;}
		 }else{$diaven=0;}
       } 
 	 }else{$diaven=0;}
	 
	 $respa =  $this->bas->consultarf('valexa as valor','tarifa',array('codexa'=>trim('$codknp'),'codcli'=> $laboratorio['5']));
	 if($respa != false){ extract($respa); }else{$valor=0;}
		
		// Fin Verificar Vencimiento	
	$data=array('ordnum' => $contador, 'codconc' => $codknp, 'desconc' => $nomexa, 'valconc' => $valor, 'facint' => $tipcob, 'diaven' => $diaven);	
	$ins = $this->bas->insertar('ocudetord',$data);
	}
	}
	}
	//echo $this->db->last_query();
	//exit();

//echo $insert;
		$output["err"]='1';
		echo json_encode($output);
	}
	
	function ordenc(){
	$this->output->set_header('Content-type:application/json');
	    $condicion = array('ocunum' => $this->security->xss_clean($this->input->post('ocunum')));
		$res=$this->bas->consultarf('ocunom, ocuced, ocucar','view_ordenes',$condicion);    
		if($res!=false){$output["i"]=$res; $output["e"] = array("err"=>"1");}else{$output["e"] = array("err"=>"0");}
		//
	    echo json_encode($output);
	}
	
	function examenes_ordenc(){
        $this->output->set_header('Content-type:application/json');
        $ale=$this->input->post('ale');
        $ocunum=$this->security->xss_clean($this->input->post('ocunum'));
		//echo $ocunum;
        if($ocunum!='0'){
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
            }else{
            	  $output['aaData'][] = array('','NO TIENE EXAMENESs','','','','');
            }
        echo json_encode($output);
        }
		
	function examen_ordern_borrar(){
	$condicion=array('id'=>$this->security->xss_clean($this->input->post('id')));
	$data=array('delusr' => $this->session->userdata('user'),'delfch'=>date('Y-m-d H:s:i'));
	$this->bas->actualizar('ocudetord',$data,$condicion);
	//echo $this->db->last_query();
	$output["err"]='1';	
	echo json_encode($output);
	}
		
	function estados(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->bas-> consultar('nomest','estord','nomest IS NOT NULL');
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('nomest'=>$row['nomest']); }
		echo json_encode($info); } else echo 1;	
	}	
	
	function exameni(){
	$codconc = explode("-",$this->security->xss_clean($this->input->post('codconc')));
	 $datos = array(
					  'facint'=>$this->security->xss_clean($this->input->post('tipcob')),
					  'codconc'=> $codconc['0'],'desconc'=> $codconc['1'],
					  'valconc'=>$this->security->xss_clean($this->input->post('precio')), 'tipagr' => '2', 'diaven' => '0',
					  'ordnum'=>$this->security->xss_clean($this->input->post('ocunumb')),
					  'addusr' => $this->session->userdata('user'),'addfch'=>date('Y-m-d H:s:i')
					 );			
		  $row=$this->bas->insertar('ocudetord',$datos);
		  //echo $this->db->last_query();
		  $output["err"]='1';	
	echo json_encode($output);
	}
}