<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Informe_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	}
	
	function informe($fecini,$fecfin){
	
	$tabla= '
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Cedula</td>
    <td>contrato</td>
    <td>paz y salvo</td>
    <td>Nombre</td>
    <td>Cargo</td>
    <td>Empresa</td>
    <td>Razon Social</td>
	<td>Retiro</td>
  </tr>';
  $res = $this->bas->consultar('*','view_pazysalvo_exc',array('fecfin >='=>$fecini,'fecfin <='=>$fecfin));
  foreach($res as $row){
  $tabla .='
  <tr>
    <td>'.$row['id_persona'].'</td>
    <td>'.$row['numero'].'</td>
    <td>'.$row['id_pazysalvo'].'</td>
     <td>'.$row['nombre'].'</td>
     <td>'.$row['oficio'].'</td>
     <td>'.$row['lugardes'].'</td>
     <td>'.$row['ocupor'].'</td>
	 <td>'.$row['fecfin'].'</td>
  </tr>';
  }
$tabla .='</table>';
	
	echo $tabla;
    }
	
}
?>