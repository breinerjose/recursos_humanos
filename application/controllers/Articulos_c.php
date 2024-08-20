<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articulos_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('articulos_m','art',TRUE);
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
	function vista($vista=''){
		$this->load->view('/articulos/'.$vista);
	}
	
	function todos_articulos(){
		$this->output->set_header('Content-type: application/json');
		$ale=$this->input->post('ale');
		$condicion = 'codart IS NOT NULL';
		$result = $this->bas->consultar('codart, nomart, usocom, serial, codusr, nombres,carart','view_artclo',$condicion);
		$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $row ){
			$output['aaData'][] = array(
			$row['codart'],
			$row['nomart'],
			$row['serial'],
			$row['usocom'],
			$row['codusr'].' '.$row['nombres'],
			'<a class="btn btn-primary btn-xs editar'.$ale.'" title="Editar" codart="'.$row['codart'].'" nomart="'.$row['nomart'].'" serial="'.$row['serial'].'" codart="'.$row['codart'].'" 
			usocom="'.$row['usocom'].'" carart="'.$row['carart'].'" codusr="'.$row['codusr'].'"role="button" href="javascript:void(0);"><i class="fa fa-edit"></i> </a>');
			}
		}
		echo json_encode($output);
	}
	
	function agregar_articulo(){
	$this->output->set_header('Content-type: application/json');
		$datos = array('codart'=>$this->input->post('codart'),
		'nomart'=>ucwords($this->input->post('nomart')),
		'carart'=>$this->input->post('carart'),
		'addusr'=>$this->session->userdata('user'),
		'addfch'=>date('Y-m-d H:i:s'),
		'usocom'=>$this->input->post('usocom'),
		'codusr'=>$this->input->post('codusr'),
		'serial'=>$this->input->post('serial'));
		$res = $this->bas->insertar('artclo',$datos);
	   if($res!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function datos_editar($codart=''){
		$datos = $this->art->datos_editar($codart);	
		$data['articulo'] = $datos;
		$this->load->view('/articulos/editar_articulos',$data); 
	}
	
	function editar_articulo(){
		$datos = array( ucwords($this->input->post('nomart')), ucwords($this->input->post('caract')), $this->input->post('soft'),$this->input->post('codart'));	
		$res = $this->art->editar_articulo($datos);
		if($res!=false){ echo 0; } else{ echo 1; }
	}
		
	function eliminar_articulo(){
		$datos = array($this->session->userdata('user'),date('Y-m-d H:i:s'),$this->input->post('codart'));	
		$res = $this->art->eliminar_articulo($datos);
		if($res!=false){ echo 0; } else{ echo 1; }			
	}
	
	//METODOS PARA VISTA ASIGNAR ARTICULO
	
	function articulos_asignados($usuario=''){
		$this->output->set_header('Content-type: application/json');
		$result = $this->art->articulos_asignados($usuario);
		$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $row ){				
			$eliminado = "<a href='#' title='Eliminar'  class='Eliminar' data-user='".$usuario."'  data-cod='".$row['codart']."'><img src='/recursos/iconos/delete.png' width='16' height='16' /></a >";
			if($this->session->userdata('perfil')==0 && $row['stdasg']=='eliminado'){
				$eliminado = "<a href='javascript:void(0)' class='restablecer' data-user='".$usuario."'  data-cod='".$row['codart']."'><img src='/recursos/iconos/activar.png' width='16' height='16' /></a>";	}
			
			$output['aaData'][] = array(
					$row['codart'],
					$row['nomtrc'],
					$row['nomart'],
					$row['carart'],
					$row['stdasg'],
					$eliminado
				);
			}
		}
		echo json_encode($output);
	}
	
	/*function usuarios_registrados(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->art->usuarios_registrados();	
		echo json_encode($res);	
	}*/
	
	function datos_articulos(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->art->datos_articulos();
		$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $row ){
				$output['aaData'][] = array(
					$row['codart'],
					$row['nomart'],
					$row['carart'],
					"<input type='checkbox' name='articulos[]' value='".$row['codart']."'>"
				);
			}
		}
		echo json_encode($output);
	}
	
	function asignar_articulos(){
		$ide= explode('-',$this->input->post('nomusu'));
		$articulos=explode(',',$this->input->post('articulos'));
		$addusr= $this->session->userdata('user');
		$fecha = date('Y-m-d H:i:s');
		$c=0;
		for($i=0; $i<count($articulos); $i++){
			$res = $this->art->asignar_articulo(trim($ide[0]),$articulos[$i],$addusr,$fecha);
			if($res!=false){ $c++; }
		}
		if($c==count($articulos)){ echo $ide[0]; } else{ echo 1;}
	}
	
	function quitar_articulo(){
		$datos = array($this->session->userdata('user'), date('Y-m-d H:i:s'), $this->input->post('user'), $this->input->post('codart'));
		$res = $this->art->quitar_articulo($datos);
		if($res!=false){ echo 0; } else{ echo 1; }	
	}
	
	function restablecer_articulo(){
		$addusr= $this->session->userdata('user');
		$fecha = date('Y-m-d H:i:s');
		$datos = array($addusr,$fecha,$this->input->post('user'),$this->input->post('codart'));
		$res = $this->art->restablecer_articulo($datos);
		if($res!=false){ echo 0; }else { echo 1;}
	}
	
	function verificar_articulos_usuario(){
		$res = $this->art->verificar_articulos_usuario($this->input->post('idusu'));
		if($res!=false){ 
			echo 0; //si tiene articulos asociados
		}else{ 
			echo 1;
		}
	}
	
	//FUNCIONES PARA REPORTES DE LOS ARTICULOS
	function reporte_todos_articulo(){
		$table = $this->art->reporte_todos_articulo();
		$nombre = 'Reporte_todos_los_articulos';
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		$datos='';
		
		$datos .= '
		<table style="border: #000 1px solid; border-collapse:collapse;">
  			<thead>
				 <tr>
					<td colspan="8" align="center" style="border-left:1px #000 solid"><span style="font-size:30px; color:#000; font-weight:bold;">ALMACEN BC S.A</span></td>
				</tr>
				<tr>
					<td colspan="8" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">Av. Pedro de Heredia El Toril No. 23-65 </span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">6695174 - 311 415 6714 - 311 415 6718 - 320 566 0011 </span></td>
			   </tr>
			   <tr>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario</span></td>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Cod Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nombre Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Caracteristicas</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha De Inserci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario que elimino el articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha De Eliminaci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Estado Del articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Sede</span></td>
			  </tr>
  		   </thead>
 		   <tbody>';
				if($table != false){
					foreach($table as $row){
						$datos .= '<tr>';	
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nombres'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['codart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['carart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['addfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delusr'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['stdasg'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomsed'].'</td>';
						$datos .= '</tr>';
					}
				}else{
					$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="8" align="center"><i>No se encontraron resultado</i></td>';
						$datos .= '</tr>';		
				}
				$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="9" align="right"><span style="font-size:11px;"><b>REPORTE DE TODOS LOS ARTICULOS ASIGNADOS</b></span></td>';
						$datos .= '</tr>';
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="9" align="right"><span style="font-size:11px;"><b>FECHA DE IMPRESI&Oacute;N '.date('Y-m-d H:i:s').'</b></span></td>';
						$datos .= '</tr>';			    
    	$datos .='
		   </tbody>
		</table>';
		echo ($datos);  	
	}
	
	function reporte_por_articulo(){
		$nomart = $this->input->get('nomart');
		$table = $this->art->reporte_por_articulo($nomart);
		$nombre = 'Reporte_por_articulo';
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		$datos='';
		
		$datos .= '
		<table style="border: #000 1px solid; border-collapse:collapse;">
  			<thead>
				 <tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:30px; color:#000; font-weight:bold;">ALMACEN BC S.A</span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">Av. Pedro de Heredia El Toril No. 23-65 </span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">6695174 - 311 415 6714 - 311 415 6718 - 320 566 0011 </span></td>
			   </tr>
			   <tr>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario</span></td>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Cod Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nombre Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Caracteristicas</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha De Inserci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario que elimino el articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha De Eliminaci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Estado Del articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Sede</span></td>
			  </tr>
  		   </thead>
 		   <tbody>';
				if($table != false){
					foreach($table as $row){
						$datos .= '<tr>';	
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nombres'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['codart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['carart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['addfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delusr'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['stdasg'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomsed'].'</td>';
						$datos .= '</tr>';
					}
				}else{
					$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="9" align="center"><i>No se encontraron resultado</i></td>';
						$datos .= '</tr>';		
				}
				$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="9" align="right"><span style="font-size:11px;"><b>REPORTE DEL ARTICULO '.strtoupper($nomart).'</b></span></td>';
						$datos .= '</tr>';
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="9" align="right"><span style="font-size:11px;"><b>FECHA DE IMPRESI&Oacute;N '.date('Y-m-d H:i:s').'</b></span></td>';
						$datos .= '</tr>';			    
    	$datos .='
		   </tbody>
		</table>';
		echo ($datos);  	
	}
	
	function reporte_fechas($fecha1='',$fecha2=''){
		$table = $this->art->reporte_por_fecha($fecha1,$fecha2);
		$nombre = 'Reporte_por_rango_fechas';
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		$datos='';
		
		$datos .= '
		<table style="border: #000 1px solid; border-collapse:collapse;">
  			<thead>
				 <tr>
					<td rowspan="3" align="center"><img src="'.base_url().'/recursos/images/bc.jpg" width="117" height="80" /></td>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:30px; color:#000; font-weight:bold;">ALMACEN BC S.A</span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">Av. Pedro de Heredia El Toril No. 23-65 </span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">6695174 - 311 415 6714 - 311 415 6718 - 320 566 0011 </span></td>
			   </tr>
			   <tr>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nro Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nombre Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Caracteristicas</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario que agrego el articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha De Inserci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario que elimino el articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha De Eliminaci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Estado Del Servicio</span></td>
			  </tr>
  		   </thead>
 		   <tbody>';
				if($table != false){
					foreach($table as $row){
						$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['codart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['carart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['addusr'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['addfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delusr'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['stdart'].'</td>';
						$datos .= '</tr>';
					}
				}else{
					$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="8" align="center"><i>No se encontraron resultado</i></td>';
						$datos .= '</tr>';		
				}
				$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="8" align="right"><span style="font-size:11px;"><b>REPORTE INSERCI&Oacute;N DE ARTICULO POR RANDO DE FECHA:  '.$fecha1.' A '.$fecha2.'</b></span></td>';
						$datos .= '</tr>';
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="8" align="right"><span style="font-size:11px;"><b>FECHA DE IMPRESI&Oacute;N '.date('Y-m-d H:i:s').'</b></span></td>';
						$datos .= '</tr>';			    
    	$datos .='
		   </tbody>
		</table>';
		echo ($datos); 
	}
	
	function todosArticulos(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->art->todos_articulos();
		echo json_encode($result);
	}
	
	function reporteArticulosAsignados(){
		$art = explode('--',$this->input->get('art'));
		$table = $this->art->reporteArticulosAsignados($art[0]);
		$nombre = 'Articulos_Asignados';
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		$datos='';
		
		$datos .= '
		<table style="border: #000 1px solid; border-collapse:collapse;">
  			<thead>
				 <tr>
					<td colspan="5" align="center" style="border-left:1px #000 solid"><span style="font-size:30px; color:#000; font-weight:bold;">ALMACEN BC S.A</span></td>
				</tr>
				<tr>
					<td colspan="5" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">Av. Pedro de Heredia El Toril No. 23-65 </span></td>
				</tr>
				<tr>
					<td colspan="5" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">6695174 - 311 415 6714 - 311 415 6718 - 320 566 0011 </span></td>
			   </tr>
			   <tr>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Identificaci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nombre Usuario</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Codigo Sede</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nombre Sede</span></td>
			  </tr>
  		   </thead>
 		   <tbody>';
				if($table != false){
					foreach($table as $row){
						$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['identificacion'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nombres'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['addfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['codsed'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomsed'].'</td>';
						$datos .= '</tr>';
					}
				}else{
					$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="5" align="center"><i>No se encontraron resultado</i></td>';
						$datos .= '</tr>';		
				}
				$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="5" align="right"><span style="font-size:11px;"><b>REPORTE DEL ARTICULO '.$art[0].'-'.strtoupper($art[1]).'</b></span></td>';
						$datos .= '</tr>';
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="5" align="right"><span style="font-size:11px;"><b>FECHA DE IMPRESI&Oacute;N '.date('Y-m-d H:i:s').'</b></span></td>';
						$datos .= '</tr>';			    
    	$datos .='
		   </tbody>
		</table>';
		echo ($datos);  
	}
	
	function reporteArticulosPorUsuario(){
		$usu = $this->input->get('usu');
		$table = $result = $this->art->reporteArticulosPorUsuario($usu);;
		$nombre = 'ArticulosUsuario'.$usu;
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		$datos='';
		
		$datos .= '
		<table style="border: #000 1px solid; border-collapse:collapse;">
  			<thead>
				 <tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:30px; color:#000; font-weight:bold;">ALMACEN BC S.A</span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">Av. Pedro de Heredia El Toril No. 23-65 </span></td>
				</tr>
				<tr>
					<td colspan="7" align="center" style="border-left:1px #000 solid"><span style="font-size:16px; color:#000;">6695174 - 311 415 6714 - 311 415 6718 - 320 566 0011 </span></td>
			   </tr>
			   <tr>
					<td align="center" width="120" style="border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Id Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Nombre Articulo</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Caracteristica</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha Registro</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Estado</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Fecha Eliminaci&oacute;n</span></td>
					<td align="center" width="200" style="border-right:1px solid #000;  border-top:1px solid #000; border-bottom:1px #000000 solid;"><span style="font-size:14px; color:#000; font-weight:bold;">Usuario que ELimino</span></td>
			  </tr>
  		   </thead>
 		   <tbody>';
				if($table != false){
					$nombre_usu='';
					foreach($table as $row){
						$nombre_usu=$row['nombres'];
						$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['codart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['nomart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['carart'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['addfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['stdasg'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delfch'].'</td>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;">'.$row['delusr'].'</td>';
						$datos .= '</tr>';
					}
				}else{
					$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="7" align="center"><i>No se encontraron resultado</i></td>';
						$datos .= '</tr>';		
				}
				$datos .= '<tr>';
							$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="7" align="right"><span style="font-size:11px;"><b>REPORTE ARTICULOS DEL USUARIO '.strtoupper($nombre_usu).'</b></span></td>';
						$datos .= '</tr>';
						$datos .= '<td style="border-right:1px solid #000; border-bottom:1px #000000 solid;" colspan="7" align="right"><span style="font-size:11px;"><b>FECHA DE IMPRESI&Oacute;N '.date('Y-m-d H:i:s').'</b></span></td>';
						$datos .= '</tr>';			    
    	$datos .='
		   </tbody>
		</table>';
		echo ($datos);
	}
	
	function verificar_serial(){
		$idart = $this->input->post('id');	
		$res = $this->art->verificar_serial($idart);
		if($res!=false){ echo '1'; }else{ echo '0'; }
	}
}