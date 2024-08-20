<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI 
class Hse_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('hse_m','hsem',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('Basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	   set_time_limit(0);
	   ini_set("memory_limit", "999M");
	   ini_set("max_execution_time", "999");
 	   error_reporting(-1);
           ini_set('display_errors', 1);//En modo de desarrollo. 
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("hse/".$nombre); //llamo a la vista
		}
		
function selectexamenes(){
	 $this->output->set_header('Content-type: application/json');
		$res = $this->hsem->selectexamenes();
			 if($res!=false){
			   $data = array();
					foreach ($res as $row){
						   $fila = array( 'codexa'=>$row['codigo'],'nomexa'=>$row['descripcion']);
						   $data[] = $fila;
				   }
				   echo json_encode($data);
			}else{
				   echo '{"msg":"0"}';
		   }	
	}
	
	function generar_reporte_web($fecha1,$fecha2,$nricli,$tipo_informe){	
	$tabla = '<table id="tabla_reporte">';
	$info = $this->hsem->generar_reporte($fecha1,$fecha2,$nricli,$tipo_informe);
	if($tipo_informe == 'consolidado'){
	if($nricli != '1'){
	$tabla .= '<tr>
			  <td align="lefth"><b>Empresa</b></td>
			  <td align="lefth"><b>'.$nricli.'</b></td>
			  <td align="lefth"></td>	
			  <td align="lefth"></td>	
			  <td align="lefth"></td>	
			  <td></td>
			  <td></td>			
		    </tr>';
	}
	$tabla .= '<tr>
			  <td align="lefth"><b>Codigo</b></td>
			  <td align="lefth"><b>Examen</b></td>
			  <td align="lefth"><b>Cantidad</b></td>	
			  <td align="lefth"><b>Valor Unitario</b></td>	
			  <td align="lefth"><b>Valor Total</b></td>	
			  <td></td>
			  <td></td>			
		    </tr>';
	foreach($info as $cta){
	$datexa = $this->hsem->examen($cta['codconc']);
	$tabla .= '<tr>
			  <td>'.$cta['codconc'].'</td>
			  <td>'.urldecode($datexa['descripcion']).'</td>
			   <td>'.$cta['cantidad'].'</td>
			   <td>'.$datexa['valor'].'</td>	
			   <td>'.$cta['cantidad']*$datexa['valor'].'</td>
			   <td></td>
			   <td></td>					
		    </tr>';
		}
		}else{
		//detallado
		if($nricli != '1'){
	$tabla .= '<tr>
			  <td align="lefth"><b>Empresa</b></td>
			  <td align="lefth"><b>'.$nricli.'</b></td>
			  <td align="lefth"></td>	
			  <td align="lefth"></td>	
			  <td align="lefth"></td>
			  <td></td>
			  <td></td>				
		    </tr>';
	}
	$tabla .= '<tr>
			  <td align="lefth"><b>Codigo</b></td>
			  <td align="lefth"><b>Examen</b></td>
			  <td align="lefth"><b>Cantidad</b></td>	
			  <td align="lefth"><b>Valor Unitario</b></td>	
			  <td align="lefth"><b>Valor Total</b></td>
			  <td></td>
			  <td></td>				
		    </tr>';
			
	foreach($info as $cta){
	$datexa = $this->hsem->examen($cta['codconc']);
	$tabla .= '<tr>
			  <td>'.$cta['codconc'].'</td>
			  <td>'.urldecode($datexa['descripcion']).'</td>
			   <td>'.$cta['cantidad'].'</td>
			   <td>'.$datexa['valor'].'</td>	
			   <td>'.$cta['cantidad']*$datexa['valor'].'</td>
			   <td></td>
			  <td></td>					
		    </tr>';
	$infodet = $this->hsem->generar_reporte_detallado($fecha1,$fecha2,$nricli,$cta['codconc']);		
	foreach($infodet as $ctadet){
	$tabla .= '<tr>
			  <td width="132" style="height:20px;"><a href="#" class="reimprimir" id="'.$ctadet['ocunum'].'">'.$ctadet['ocunum'].'</a></td>
			  <td>'.$ctadet['ocufem'].'</td>
			  <td>'.$ctadet['ocupor'].'</td>
			  <td>'.$ctadet['ocuced'].'</td>
			   <td>'.utf8_decode($ctadet['nombres']).'</td>
			   <td>'.$ctadet['nricli'].'</td>	
			   <td>'.$ctadet['cliente'].'</td>				
		    </tr>';
	}		
			
		
		}
		}
			
	
				
	$data['tabla'] = $tabla;
	$this->load->view("/hse/est_estadistica_examenes_v",$data);					  

	}
	
	function informe_ordenes($anio){
	$nombre = 'Informe-examenes'.date('d-m-Y');
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=$nombre.xls");
		
	$tabla='<table>
	<tr>
	<td>Empresa</td>
	<td>Periodo</td>
	<td>Tipo</td>
	<td>Cantidad</td>
	</tr>';
	for ($i=1; $i<13; $i++){
	$d=30;
	if($i < 10){ $m='0'.$i; }else{ $m=$i; }
	if( $i == 2){$d=28;}elseif($m==1 or $m==3 or $m==5 or $m==7 or $m==8 or $m==10 or $m==12){ $d=31; };
	
	$fecini=$anio.'-'.$m.'-01';
	$fecfin=$anio.'-'.$m.'-'.$d;
	foreach( $this->bas->consultar_group('tipordb, ocupor, count(*) as cant','ocuord',array('ocufem >='=>$fecini,'ocufem <='=>$fecfin),'tipordb,ocupor') as $row){
	extract($row);
	if ($tipordb == '1'){$tip='Orden Examenes';}else{$tip='Estudios de Seguridad';}
	$tabla .='
	<tr>
	<td>'.$ocupor.'</td>
	<td>'.$fecini.' - '.$fecfin.'</td>
	<td>'.$tip.'</td>
	<td>'.$cant.'</td>
	</tr>
	';
	}
	}
	$tabla .='</table>';
	echo $tabla;
	}
	
	
	
	function generar_reporte_activos(){
	$nombre = 'Informe-examenes'.date('d-m-Y');
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=$nombre.xls");
		
	$tabla = '<table>
	<tr>
			  <td align="lefth">Contratista</td>	
			  <td align="lefth">Familia</td>
			  <td align="lefth">C. Costo</td>
			  <td align="lefth">Nombre</td>
			  <td>Nit</td>
			  <td>Cliente</td>
			  <td>Id</td>
			  <td>Empleado</td>
			  <td>Orden</td>
			  <td>Fecha</td>
	</tr>
	';
	$activos=$this->bas->consultar('numid,nombre,familia,ccosto,lugardes,ocupor','contrato',array('estado'=>'ACTIVO'));
	foreach($activos as $rows){
	$orden = $this->bas->consultarf_limit_orden('ocunum,ocufem,nricli,cliente','ocuord',array('ocuced'=>$rows['numid']),'ocufem','desc');
    if($orden != false)
	$tabla .= '<tr>
			  <td>'.$rows['ocupor'].'</td>
			  <td>'.$rows['familia'].'</td>
			  <td>'.$rows['ccosto'].'</td>
			  <td>'.$rows['lugardes'].'</td>
			  <td>'.$orden['nricli'].'</td>
			  <td>'.$orden['cliente'].'</td>
			  <td>'.$rows['numid'].'</td>
			  <td>'.$rows['nombre'].'</td>
			  <td>'.$orden['ocunum'].'</td>
			  <td>'.$orden['ocufem'].'</td>
		    </tr>';
	  }
	
	$tabla .= '</table>';			
	$data['tabla'] = $tabla;
	//echo $tabla;
	$this->load->view("/hse/est_estadistica_examenes_v",$data);					  
}

	function generar_reporte($fecha1,$fecha2,$nricli,$tipo_informe){
	$nombre = 'Informe-examenes'.date('d-m-Y');
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		
	$tabla = '<table>';
	$info = $this->hsem->generar_reporte($fecha1,$fecha2,$nricli,$tipo_informe);
	if($tipo_informe == 'consolidado'){
	if($nricli != '1'){
	$tabla .= '<tr>
			  <td align="lefth"><b>Empresa</b></td>
			  <td align="lefth"><b>'.$nricli.'</b></td>
			  <td align="lefth"></td>	
			  <td align="lefth"></td>	
			  <td align="lefth"></td>	
			  <td></td>
			  <td></td>			
		    </tr>';
	}
	$tabla .= '<tr>
			  <td align="lefth"><b>Codigo</b></td>
			  <td align="lefth"><b>Examen</b></td>
			  <td align="lefth"><b>Cantidad</b></td>	
			  <td align="lefth"><b>Valor Unitario</b></td>	
			  <td align="lefth"><b>Valor Total</b></td>	
			  <td></td>
			  <td></td>			
		    </tr>';
	foreach($info as $cta){
	$datexa = $this->hsem->examen($cta['codconc']);
	$tabla .= '<tr>
			  <td>'.$cta['codconc'].'</td>
			  <td>'.urldecode($datexa['descripcion']).'</td>
			   <td>'.$cta['cantidad'].'</td>
			   <td>'.$datexa['valor'].'</td>	
			   <td>'.$cta['cantidad']*$datexa['valor'].'</td>
			   <td></td>
			   <td></td>					
		    </tr>';
		}
		}else{
		//detallado
		if($nricli != '1'){
	$tabla .= '<tr>
			  <td align="lefth"><b>Empresa</b></td>
			  <td align="lefth"><b>'.$nricli.'</b></td>
			  <td align="lefth"></td>	
			  <td align="lefth"></td>	
			  <td align="lefth"></td>
			  <td></td>
			  <td></td>				
		    </tr>';
	}
	$tabla .= '<tr>
			  <td align="lefth"><b>Codigo</b></td>
			  <td align="lefth"><b>Examen</b></td>
			  <td align="lefth"><b>Cantidad</b></td>	
			  <td align="lefth"><b>Valor Unitario</b></td>	
			  <td align="lefth"><b>Valor Total</b></td>
			  <td></td>
			  <td></td>				
		    </tr>';
	foreach($info as $cta){
	$datexa = $this->hsem->examen($cta['codconc']);
	$tabla .= '<tr>
			  <td>'.$cta['codconc'].'</td>
			  <td>'.urldecode($datexa['descripcion']).'</td>
			   <td>'.$cta['cantidad'].'</td>
			   <td>'.$datexa['valor'].'</td>	
			   <td>'.$cta['cantidad']*$datexa['valor'].'</td>
			   <td></td>
			  <td></td>	
			  <td>Facturar</td>				
		    </tr>';
	$infodet = $this->hsem->generar_reporte_detallado($fecha1,$fecha2,$nricli,$cta['codconc']);		
	foreach($infodet as $ctadet){
	$tabla .= '<tr>
			  <td>'.$ctadet['ocunum'].'</td>
			  <td>'.$ctadet['ocufem'].'</td>
			  <td>'.$ctadet['ocupor'].'</td>
			  <td>'.$ctadet['ocuced'].'</td>
			   <td>'.utf8_decode($ctadet['nombres']).'</td>
			   <td>'.$ctadet['nricli'].'</td>	
			   <td>'.$ctadet['cliente'].'</td>	
			   <td>--</td>				
		    </tr>';
	}		
			
		
		}
		}
			
	
				
	$data['tabla'] = $tabla;
	$this->load->view("/hse/est_estadistica_examenes_v",$data);					  
}

function general($fecha1,$fecha2,$nricli){ 
	$nombre = 'Informe-examenes'.date('d-m-Y');
	//	header("Content-type: application/x-msdownload");
	//	header("Content-Disposition: attachment; filename=$nombre.xls");
		
	$tabla = '<table>
	<tr>
	<td>ocunum</td>
	<td>ocupor</td>
	<td>ocuced</td>
	<td>ocunom</td>
	<td>ocuape</td>
	<td>codcrg</td>
	<td>ocucar</td>
	<td>codlab</td>
	<td>oculab</td>
	<td>ocuest</td>
	<td>fecsol</td>
	<td>addusr</td>
	<td>nricli</td>
	<td>cliente</td>
	<td>codconc</td>
	<td>desconc</td>
	<td>valconc</td>
	<td>diaven</td>
	<td>facint</td>
	</tr>';
	

	$campos = 'ocunum, ocupor, ocuced, ocunom, ocuape, codcrg, ocucar, codlab, oculab, ocuest, fecsol, addusr, nricli, cliente, codconc, desconc, valconc, diaven, facint';
	$condicion = array('fecsol >=' => $fecha1 , 'fecsol <=' => $fecha2);
	$info = $this->bas->consultar($campos,'view_detallado_examenes',$condicion);
	//echo $this->db->last_query();
	//exit();
	foreach ($info as $row){
	$tabla .='<tr>
	<td>'.$row['ocunum'].'</td>
	<td>'.$row['ocupor'].'</td>
	<td>'.$row['ocuced'].'</td>
	<td>'.$row['ocunom'].'</td>
	<td>'.$row['ocuape'].'</td>
	<td>'.$row['codcrg'].'</td>
	<td>'.$row['ocucar'].'</td>
	<td>'.$row['codlab'].'</td>
	<td>'.$row['oculab'].'</td>
	<td>'.$row['ocuest'].'</td>
	<td>'.$row['fecsol'].'</td>
	<td>'.$row['addusr'].'</td>
	<td>'.$row['nricli'].'</td>
	<td>'.$row['cliente'].'</td>
	<td>'.$row['codconc'].'</td>
	<td>'.$row['desconc'].'</td>
	<td>'.$row['valconc'].'</td>
	<td>'.$row['diaven'].'</td>
	<td>'.$row['facint'].'</td>
	</tr>';
	}
		
	$data['tabla'] = $tabla;
	$this->load->view("/hse/exa_general_v",$data);					  
}

}