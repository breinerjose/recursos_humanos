<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//we need to call PHP's session object to access it through CI
class Contratos_c extends CI_Controller { 
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Contratos_m','cont',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("contratos/".$nombre); //llamo a la vista
		}

function generar_reporte_excel($anio,$mesn){

		//$nombre = 'Informe-contratos'.date('d-m-Y');
		//header("Content-type: application/x-msdownload");
		//header("Content-Disposition: attachment; filename=$nombre.xls");

		$emp='ASECO';
		$tabla='<table width="800" border="1" cellspacing="0" cellpadding="0">';
		$tabla .='<tr>
    	   <td colspan="4" align="center" bgcolor="#FA5858">INFORME DE CONTRATOS MENSUAL ASAP - ASECO</td>
   	      </tr>
		 </table>';
		for($x=1; $x<=$mesn; $x++){
		switch ($x) { case "1":	$x='01'; $mes='ENERO';  break;
    	case "2": $x='02'; $mes='FEBRERO'; break;
        case "3": $x='03'; $mes='MARZO'; break;
		case "4": $x='04'; $mes='ABRIL'; break;
    	case "5": $x='05'; $mes='MAYO'; break;
        case "6": $x='06'; $mes='JUNIO'; break;
		case "7": $x='07'; $mes='JULIO'; break;
    	case "8": $x='08'; $mes='AGOSTO'; break;
        case "9": $x='09'; $mes='SEPTIEMBRE'; break;
		case "10": $x='10'; $mes='OCTUBRE'; break;	
    	case "11": $mes='NOVIEMBRE'; break;	
    	case "12": $mes='DICIEMBRE'; break;	}
		
		$tabla .= '<table width="800" border="1" cellspacing="0" cellpadding="0">';
  		for($i=1; $i<=2; $i++){
		$tabla .= '<tr>
    	   <td colspan="5" align="center" bgcolor="#CECEF6">'.$emp.' INFORME DE CONTRATOS MES DE '.$mes.'-'.$anio.'</td>
   	      </tr>
	  <tr>
		<td width="55%" bgcolor="#CECEF6">EMPRESA</td>
		<td width="15%" bgcolor="#CECEF6">REALIZADOS</td>
		<td width="15%" bgcolor="#CECEF6">TERMINADOS</td>
		<td width="15%" bgcolor="#CECEF6">ACTIVOS</td>
		<td width="15%" bgcolor="#CECEF6">DIFERENCIA</td>
	  </tr>';
  $eneroaseco = $this->bas->consultar_orden('*','conest',array('mes'=>$x,'anio'=>$anio,'ocupor'=>$emp),'ocupor');
	$at=0;
	$bt=0;
	$ct=0;	
	$dt=0;
	if($eneroaseco != false){
	//print_r($eneroaseco).'---'.'<br>';
	foreach($eneroaseco as $info){
	$at += $info['realiz'];
	$bt += $info['termin'];
	$ct += $info['activo']; 
	$dt += $info['diferencia']; 
  $tabla .='<tr>
    		  <td>'.$info['cliente'].'</td>
              <td>'.$info['realiz'].'</td>
              <td>'.$info['termin'].'</td>
              <td>'.$info['activo'].'</td>
			  <td>'.$info['diferencia'].'</td>
           </tr>';
		   }}
$tabla .='<tr>
    <td>TOTAL</td>
    <td>'.$at.'</td>
    <td>'.$bt.'</td>
    <td>'.$ct.'</td>
	<td>'.$dt.'</td>
  </tr>';
  if($emp == 'ASECO'){$emp='ASAP';}else{$emp = 'ASECO';}
  }
  
  
$tabla .='</table>';
$tabla .='<br>';	

}
//INFORME POR EMPRESAS

$emp='ASECO';
$tabla .= '<br><table width="800" border="1" cellspacing="0" cellpadding="0">
		<tr>
    	   <td colspan="5" align="center" bgcolor="#FA5858">INFORME DE CONTRATOS MENSUAL X EMPRESAS</td>
   	      </tr>
		';
	
for($i=1; $i<=2; $i++){
		
   $clientes = $this->bas->consultar_group_orden('cliente','conest',array('anio'=>$anio,'ocupor'=>$emp),'cliente','cliente');
	if($clientes != false){
			$tabla .= '<table width="800" border="1" cellspacing="0" cellpadding="0">';
		$tabla .= '<tr>
    	   <td colspan="5" align="center" bgcolor="#CECEF6">'.$emp.' - INFORME DE CONTRATOS 	AÑO '.$anio.'</td>
   	      </tr>';
	foreach($clientes as $row){
		$tabla .='<tr>
		<td width="50%" bgcolor="#CECEF6">EMPRESA '.$row['cliente'].'</td>
		<td width="10%" bgcolor="#CECEF6">REALIZADOS</td>
		<td width="10%" bgcolor="#CECEF6">TERMINADOS</td>
		<td width="20%" bgcolor="#CECEF6">ACTIVOS</td>
		<td width="10%" bgcolor="#CECEF6">DIFERENCIA</td>
	  </tr>';
	  	$at=0;
		$bt=0;
		$ct=0;
		$dt=0;
		$p=0;
	foreach($this->bas->consultar_orden('*','conest',array('cliente'=>$row['cliente'],'anio'=>$anio,'ocupor'=>$emp),'mes') as $info){
	$p=$p+1;
	$at += $info['realiz'];
	$bt += $info['termin'];
	$ct += $info['activo']; 
	$dt += $info['diferencia']; 
	
  $tabla .='<tr>
    		  <td>'.$info['mes'].'</td>
              <td>'.$info['realiz'].'</td>
              <td>'.$info['termin'].'</td>
              <td>'.$info['activo'].'</td>
			  <td>'.$info['diferencia'].'</td>
           </tr>';
		  
}
$tabla .='<tr>
    <td>TOTAL</td>
    <td>'.$at.'</td>
    <td>'.$bt.'</td>
	<td>PROMEDIO '.round($ct/$p,1).'</td>
	<td>'.$dt.'</td>
  </tr>';
   }
   $tabla .='</table><br>';
  }
    if($emp == 'ASECO'){$emp='ASAP';}else{$emp = 'ASECO';}
 }
			
//FIN INFORME POR EMPRESAS	

//INICIO INFORME CONSOLIDADO
		$emp = 'ASECO';
		$tabla .= '<br><table width="800" border="1" cellspacing="0" cellpadding="0">
		<tr>
    	   <td colspan="4" align="center" bgcolor="#FA5858">INFORME DE CONTRATOS CONSOLIDADOS '.$anio.'</td>
   	      </tr>
		  </table>';
		for($i=1; $i<=2; $i++){
			$at=0;
			$bt=0;
			$ct=0;	
			$dt=0;
		$tabla .= '<br>
		<table width="800" border="1" cellspacing="0" cellpadding="0">
		<tr>
    	   <td colspan="5" align="center" bgcolor="#CECEF6">'.$emp.' INFORME DE CONTRATOS</td>
   	      </tr>
	  <tr>
		<td width="55%" bgcolor="#CECEF6">MES</td>
		<td width="15%" bgcolor="#CECEF6">REALIZADOS</td>
		<td width="15%" bgcolor="#CECEF6">TERMINADOS</td>
		<td width="15%" bgcolor="#CECEF6">ACTIVOS</td>
		<td width="15%" bgcolor="#CECEF6">DIFERENCIA</td>
	  </tr>';		
				
	for($x=1; $x<=$mesn; $x++){
		switch ($x) { case "1":	$x='01'; $mes='ENERO';  break;
    	case "2": $x='02'; $mes='FEBRERO'; break;
        case "3": $x='03'; $mes='MARZO'; break;
		case "4": $x='04'; $mes='ABRIL'; break;
    	case "5": $x='05'; $mes='MAYO'; break;
        case "6": $x='06'; $mes='JUNIO'; break;
		case "7": $x='07'; $mes='JULIO'; break;
    	case "8": $x='08'; $mes='AGOSTO'; break;
        case "9": $x='09'; $mes='SEPTIEMBRE'; break;
		case "10": $x='10'; $mes='OCTUBRE'; break;	
    	case "11": $mes='NOVIEMBRE'; break;	
    	case "12": $mes='DICIEMBRE'; break;	}
  
  $info = $this->bas->consultarf('sum(realiz) realiz, sum(termin) termin, sum(activo) activo, sum(diferencia) diferencia, ','conest',array('mes'=>$x,'anio'=>$anio,'ocupor'=>$emp));

	if($info != false){
	//print_r($eneroaseco).'---'.'<br>';

	$at += $info['realiz'];
	$bt += $info['termin'];
	$ct += $info['activo']; 
	$dt += $info['diferencia']; 

	$tabla .='<tr>
     		  <td>'.$mes.'</td>
              <td>'.$info['realiz'].'</td>
              <td>'.$info['termin'].'</td>
              <td>'.$info['activo'].'</td>
			  <td>'.$info['diferencia'].'</td>
 			</tr>';
  }
}	
$tabla .='<tr bgcolor="77dd77">
    <td>TOTAL</td>
    <td>'.$at.'</td>
    <td>'.$bt.'</td>
    <td>'.round($ct/($x-1),1).'</td>
	<td>'.$dt.'</td>
  </tr>';
$tabla .='</table>';
$tabla .='<br>';	
$emp='ASAP';
//FIN INFORME CONSOLIDADO	
	}
	
echo $tabla;
	//$data['tabla'] = $tabla;
	//$this->load->view("/contratos/exe_estadistica_contrato_v",$data);					  



//	echo $anio.' '.$mes." Fin";

}		

function calcular($anio,$mes){
	$this->db->trans_start();
	//if($mes == '01'){ $aniox=$anio-1; $mesx='12'; }else{ $aniox=$anio; $mesx=$mes; }
	if($mes < 10){ $mes = '0'.$mes; }
	$this->bas->borrar('conest',array('Mes'=>$mes,'Anio'=>$anio));	
	$fecini=$anio."-".$mes."-01";
    $fecfin=$anio."-".$mes."-31";
    $eneroaseco = $this->cont->empresas_movimientos($fecini,$fecfin,'ASECO');
	
	if($eneroaseco != false){
	foreach($eneroaseco as $info){
	$a = $this->cont->contratos_inician_t_e($fecini,$fecfin,'ASECO',$info['lugardes']);
	$b = $this->cont->contratos_terminacion_t_e($fecini,$fecfin,'ASECO',$info['lugardes']);
	$c = $this->cont->contratos_activos_t_e($fecfin,$fecfin,'ASECO',$info['lugardes']);
	//$d = $this->bas->consultarf('activo','conest',array('ocupor'=>'ASECO','cliente'=>$info['lugardes'],'anio'=>$aniox,'mes'=>$mesx));
	//if($d == false){ $d['activo']=0; }
	$d['activo']=$a['Cant']-$b['Cant'];
	$data=array('ocupor'=>'ASECO', 'Cliente'=>$info['lugardes'], 'Mes'=>$mes, 'Anio'=>$anio, 'realiz'=>$a['Cant'], 'termin'=>$b['Cant'], 'activo'=>$c['Cant'],'diferencia'=>$d['activo']);
	$this->bas->insertar('conest',$data);
	}
	}
	
	$eneroaseco = $this->cont->empresas_movimientos($fecini,$fecfin,'ASAP');
	if($eneroaseco != false){
	foreach($eneroaseco as $info){
	$a = $this->cont->contratos_inician_t_e($fecini,$fecfin,'ASAP',$info['lugardes']);
	$b = $this->cont->contratos_terminacion_t_e($fecini,$fecfin,'ASAP',$info['lugardes']);
	$c = $this->cont->contratos_activos_t_e($fecfin,$fecfin,'ASAP',$info['lugardes']);
	//$d = $this->bas->consultarf('activo','conest',array('ocupor'=>'ASAP','cliente'=>$info['lugardes'],'anio'=>$aniox,'mes'=>$mesx));
	//if($d == false){ $d['activo']=0; }
	$d['activo']=$a['Cant']-$b['Cant'];
	$this->bas->insertar('conest',array('ocupor'=>'ASAP','cliente'=>$info['lugardes'],'mes'=>$mes,'anio'=>$anio,'realiz'=>$a['Cant'],'termin'=>$b['Cant'],'activo'=>$c['Cant'],'diferencia'=>$d['activo']));
	}
	}
	echo "Fin";
	$this->db->trans_complete();
}

	
	function Contratos(){
	$this->output->set_header('Content-type: application/json');
	$condicion="trim(estado) = 'ACTIVO' and fecdat > '2010-06-10' and (familia='NominaASA' or familia='NominaAsa') and (ccosto like '147%' or ccosto like '144%' or ccosto like '149%')";
	$res = $this->bas->consultar('codigo, numid, nombre, oficio, familia, fecdat, ccosto, lugardes','contrato',$condicion);

	$subido = "<button type='button' class='btn btn-success'>Ver</button>";   
	$pendiente = "<button type='button' class='btn btn-danger'>Subir</button>";
	$z = "<button type='button' class='btn btn-danger'>x</button>";

	$output = array("aaData" => array());
		if($res != FALSE){
			foreach($res as $row ){
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'4','stdarc'=>'activo');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$d = $subido; $dc='da'; $dx = $sub; }else{$d = $pendiente; $dc='d'; $dx='';}
			
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'3','stdarc'=>'activo');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$c = $subido; $cc='ca'; $cx = $sub; }else{$c = $pendiente; $cc='c'; $cx=''; }
			
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'2','stdarc'=>'activo');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$b = $subido; $bc='ba'; $bx = $sub; }else{$b = $pendiente; $bc='b'; $bx='';}
			
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'1','stdarc'=>'activo');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$a = $subido; $ac='aa'; $ax = $sub;}else{$a = $pendiente; $ac='a'; $ax=''; }
			
			$output['aaData'][] = array(
			$row['codigo'],
			$row['numid']." ".$row['nombre'],
			$row['oficio'],
			$row['fecdat'],
"<a href='#' title='Enviar Archivos'  class='envema' data-cod='".$row['codigo']."'>
<center>Email</center></a>","<a href='#' title='Editar Articulo'  class='".$dc."' data-doc='4' data-tok='".$dx."'  data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>".$d."</a>",
"<a href='#' title='Eliminar'  class='".$cc."'  data-doc='3' data-tok='".$cx."' data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$c."</center></a >",
"<a href='#' title='Eliminar'  class='".$bc."'  data-doc='2' data-tok='".$bx."' data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$b."</center></a >",
"<a href='#' title='Eliminar'  class='".$ac."'  data-tok='".$ax."' data-doc='1' data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$a."</center></a >");
			}
		}
		echo json_encode($output);
	}
	
	function ver_archivos_Contratos(){
	$this->output->set_header('Content-type: application/json');
	if($this->session->userdata('user') == '20170101'){$condicion="estado = 'ACTIVO' and fecdat > '2010-01-10' and familia='NominaAsa' and (ccosto like '147%' or ccosto like '144%')";}
	if($this->session->userdata('user') == '20230725'){$condicion="estado = 'ACTIVO' and fecdat > '2010-01-10' and ((familia='NominaAsa' and (ccosto like '92' or ccosto like '92%')) or (familia='NominaAve' and (ccosto like '92%' or ccosto like '92%')) or (familia='NominaAss' and (ccosto like '73%' or ccosto like '73%')) or (familia='NominaAdi' and (ccosto like '73%' or ccosto like '73%')))";}
	$res = $this->bas->consultar('codigo, numid, nombre, oficio, familia, fecdat, ccosto, lugardes','contrato',$condicion);
	$subido = "<button type='button' class='btn btn-success'>Ver Pdf</button>";   
	$pendiente = "<button type='button' class='btn btn-danger'>Pendiente</button>";

	$output = array("aaData" => array());
		if($res != FALSE){
			foreach($res as $row ){
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'4');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$d = $subido; $dc='da'; $dx = $sub; }else{$d = $pendiente; $dc='d'; $dx='';}
			
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'3');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$c = $subido; $cc='ca'; $cx = $sub; }else{$c = $pendiente; $cc='c'; $cx=''; }
			
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'2');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$b = $subido; $bc='ba'; $bx = $sub; }else{$b = $pendiente; $bc='b'; $bx='';}
			
			$condi = array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'coddoc'=>'1');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$a = $subido; $ac='aa'; $ax = $sub;}else{$a = $pendiente; $ac='a'; $ax=''; }
			
			$output['aaData'][] = array(
			$row['codigo'],
			$row['numid']." ".$row['nombre'],
			$row['oficio'],
			$row['fecdat'],
			$row['ccosto']." ".$row['lugardes'],
"<a href='#' title='Editar Articulo'  class='".$dc."' data-doc='4' data-tok='".$dx."'  data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$d."</center></a>",
"<a href='#' title='Eliminar'  class='".$cc."'  data-doc='3' data-tok='".$cx."' data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$c."</center></a >",
"<a href='#' title='Eliminar'  class='".$bc."'  data-doc='2' data-tok='".$bx."' data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$b."</center></a >",
"<a href='#' title='Eliminar'  class='".$ac."'  data-tok='".$ax."' data-doc='1' data-cod='".$row['codigo']."' data-fam='".$row['familia']."'>
<center>".$a."</center></a >");
			}
		}
		echo json_encode($output);
	}
	
	function contratos_clientes(){
	$this->output->set_header('Content-type: application/json');
	$condicion="estado = 'ACTIVO' and fecdat > '2018-06-10' and familia='NominaASA' and (ccosto like '147%' or ccosto like '144%')";
	$res = $this->bas->consultar('Codigo, numid, nombre, oficio, familia, fecdat, ccosto, lugardes','contrato',$condicion);
	$subido = "<button type='button' class='btn btn-success'>Ver Pdf</button>";   
	$pendiente = "<button type='button' class='btn btn-danger'>Pendiente</button>";

	$output = array("aaData" => array());
		if($res != FALSE){
			foreach($res as $row ){
			$condi = array('codigo'=>$row['Codigo'],'familia'=>$row['familia'],'coddoc'=>'4');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$d = $subido; $dc='da'; $dx = $sub; }else{$d = $pendiente; $dc='d'; $dx='';}
			
			$condi = array('codigo'=>$row['Codigo'],'familia'=>$row['familia'],'coddoc'=>'3');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$c = $subido; $cc='ca'; $cx = $sub; }else{$c = $pendiente; $cc='c'; $cx=''; }
			
			$condi = array('codigo'=>$row['Codigo'],'familia'=>$row['familia'],'coddoc'=>'2');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$b = $subido; $bc='ba'; $bx = $sub; }else{$b = $pendiente; $bc='b'; $bx='';}
			
			$condi = array('codigo'=>$row['Codigo'],'familia'=>$row['familia'],'coddoc'=>'1');
			$sub = $this->bas->consultarx('token','archivos',$condi);
			//echo $this->db->last_query();
			if($sub != false){$a = $subido; $ac='aa'; $ax = $sub;}else{$a = $pendiente; $ac='a'; $ax=''; }
			
			$output['aaData'][] = array(
			$row['Codigo'],
			$row['numid']." ".$row['nombre'],
			$row['oficio'],
			$row['fecdat'],
"<a href='#' title='Editar Articulo'  class='".$dc."' data-doc='4' data-tok='".$dx."'  data-cod='".$row['Codigo']."' data-fam='".$row['familia']."'>
<center>".$d."</center></a>",
"<a href='#' title='Eliminar'  class='".$cc."'  data-doc='3' data-tok='".$cx."' data-cod='".$row['Codigo']."' data-fam='".$row['familia']."'>
<center>".$c."</center></a >",
"<a href='#' title='Eliminar'  class='".$bc."'  data-doc='2' data-tok='".$bx."' data-cod='".$row['Codigo']."' data-fam='".$row['familia']."'>
<center>".$b."</center></a >",
"<a href='#' title='Eliminar'  class='".$ac."'  data-tok='".$ax."' data-doc='1' data-cod='".$row['Codigo']."' data-fam='".$row['familia']."'>
<center>".$a."</center></a >");
			}
		}
		echo json_encode($output);
	}
}