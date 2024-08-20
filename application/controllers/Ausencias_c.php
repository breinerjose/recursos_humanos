<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ausencias_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
	//chossen
	function Cajas(){
		$ale=$this->input->post('ale');
		$this->output->set_header('Content-type:application/json');
		//and usuapr IS NOT NULL
		$res = $this->bas->consultar('codest, codcaj, estado','cajas','codcaj IS NOT NULL');
		//echo $this->db->last_query();
		$output = array("aaData" => array());
		if($res!=false){ foreach($res as $row){ $output['aaData'][] = array($row['codest'],$row['codcaj'],$row['estado'],
		 '		
			<a class="btn btn-primary btn-xs imp'.$ale.'" title="Imprmir" codest="'.$row['codest'].'" codcaj="'.$row['codcaj'].'"  
			   role="button" href="javascript:void(0);"><i class="fa fa-print"></i> </a>'); }
		 echo json_encode($output);	 } else echo 1;	
	}
	
	function caja_i(){
		$condicion=array('estado'=>'activo');
		$dato=array('estado'=>'inactivo');
		$this->bas->actualizar('cajas',$dato,$condicion);
	
		$data['codest'] = $this->security->xss_clean($this->input->post('codest'));
		$data['codcaj'] = $this->security->xss_clean($this->input->post('codcaj'));
		$data['addusr'] = $this->session->userdata('user');
		$row=$this->bas->insertar('cajas',$data);
		if($row!=false){echo '{"err":"1"}';}else{echo '{"err":"0","msg":"hubo un error"}';}
	}
	
	function print_caja($codest,$codcaj){
	$condicion=array('codest'=>$codest,'codcaj'=>$codcaj);
	$res=$this->bas->consultar_orden('*','arcdis',$condicion,'nomtrc');
	$tr='
	<title>Archivo Muerto Estante '.$codest.' Caja '.$codcaj.'</title>
	<table width="800" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<table width="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
    <td><img src="/res/images/asap.jpg" width="70" height="40" /></td>
    <td colspan="2" align="center">GRUPO ASAPASECO</td>
	<td align="right"><img src="/res/images/aseco.jpg" width="70" height="40" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td colspan="2" align="center">Gestion Documental - Archivo Muerto</td>
    <td> </td>
	<td>&nbsp;</td>
  </tr>
  </table>
  </td>
  </tr>
</table>
<table width="800" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>
  </hr>
  </br>
  <table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>Estante</td>
    <td>'.$codest.'</td>
    <td>Caja</td>
    <td>'.$codcaj.'</td>
  </tr>
   <tr>
    <td>Identificacion</td>
    <td>Nombre</td>
    <td>usuario</td>
    <td>fecha</td>
  </tr>';
	if($res != false){
	foreach($res as $row){
	$tr.='<tr>
    <td>'.$row['codtrc'].'</td>
    <td>'.utf8_decode($row['nomtrc']).'</td>
    <td>'.$row['addusr'].'</td>
    <td>'.$row['addfch'].'</td>
  </tr>';
	}
	$tr .='</table>
	</br></br></br></br></br>
	<table width="800" border="0" cellspacing="0">
  <tr>
    <td>____________________________</td>
    <td>____________________________</td>
  </tr>
  <tr>
    <td>Entrega</td>
    <td>Recibe</td>
  </tr>
  <tr>
    <td>Fecha Entrega:</td>
    <td>Fecha Impresion:'.date('Y-m-d h:i').'</td>
  </tr>
</table>
</td>
  </tr>
</table>
	';
	echo $tr;
	}else{echo "Caja no contiene Informacion";}
	}
}