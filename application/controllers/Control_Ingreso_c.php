<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//we need to call PHP's session object to access it through CI
class Control_Ingreso_c extends CI_Controller {
	function __Construct(){
	   parent::__construct();
	   $this->load->library('PHPExcel');
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function consulta($fecini,$fecfin){
	$this->db->trans_start();
	$this->db->query('update contmp set hora = substr(horas,12,5)');
	$con=$this->bas->consultar('*','view_fecha_min',array('Identificacion !='=>'1'));
	if($con != false){
	foreach($con as $yy){
	$condi=array('Identificacion'=>$yy['Identificacion'],'Fecha'=>$yy['Fecha']);
	$this->bas->borrar('control',$condi);
	$this->bas->insertar('control',$yy);
	}
    }
	
	$x=array('Cedula !='=>'');
	$resp=$this->bas->consultar('*','view_fecha_max',$x);
	if($resp != false){
	foreach($resp as $row){
	extract($row);
	$data=array('Salida'=>$hora);
	$condi=array('Identificacion'=>$Cedula,'Fecha'=>$Fecha);
	$this->bas->actualizar('control',$data,$condi);
	}
	}
	$this->db->query('delete from contmp');
	$this->db->trans_complete();

	$condi=array('Fecha >='=>$fecini,'Fecha <='=>$fecfin);
	$resp=$this->bas->consultar('DISTINCT(Identificacion) as Identificacion','control',$condi);
	foreach($resp as $row){
	extract($row);
	extract($this->bas->consultarf('Nombres, Cedula','view_nombres',array('Codigo'=>$Identificacion)));
	$tabla='<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FFFF">
			  <tr bgcolor="#99FF99">
				<td colspan="4" bgcolor="#99FF99">FUNCIONARIO:'.$Identificacion.' '.utf8_decode($Nombres).'</td>
			  </tr>
			  <tr>
				<td colspan="4">&nbsp;</td>
			  </tr>
			  <tr>
				<td><div align="center">No.</div></td>
				<td><div align="center">Fecha</div></td>
				<td><div align="center">ENTRADA</div></td>
				<td><div align="center">SALIDA</div></td>
			  </tr>';
  $conx=array('Fecha >='=>$fecini,'Fecha <='=>$fecfin,'Identificacion'=>$Identificacion);
  $resx=$this->bas->consultar_orden('Entrada, Salida, Fecha','control',$conx,'Fecha');
     $i=1;
  foreach($resx as $rowx){
   extract($rowx);
  $tabla.='<tr align="center" class="Estilo1">
    <td width="8%">'.$i.'</td>
  	<td width="8%">'.$Fecha.'</td>
	<td width="15%"'; 
    if($Entrada > '08:05:00' AND $Entrada > 0){ $tabla.=' bgcolor="#ECACC8">'; } else { $tabla .= '>';}
	 
	  $tabla.= $Entrada.'</td>
	  
	  <td width="15%"';
	  
	   if($Salida < '18:00:00' AND $Fecha != date("Y-m-d")){ $tabla.=' bgcolor="#ECACC8">'; }
	   elseif($Salida > '19:00:59' AND $Fecha != date("Y-m-d")){ $tabla .=' bgcolor="#868DEE">'; } else { $tabla .= '>';}
	    $tabla .= $Salida.'</td>
		</tr>';
		$i++;
	}
	$tabla .='<tr>
				<td colspan="4">&nbsp;</td>
			  </tr>
		</table>';
		echo $tabla;
	  }
	}

///////////////////////////////////////////////////////////	   
	   
	function importar(){
	$this->output->set_header('Content-type: application/json');
	$r='';
		if (isset($_FILES["registro"])){
        $archivo = './res/liquidacion/registro.xls';
		unlink($archivo);
		move_uploaded_file($_FILES['registro']['tmp_name'] , $archivo);
		$addusr = array('addusr'=>$this->session->userdata('user'));
		$nroarc=date('Y-m-d h:i:s');
//		$nroarc=str_replace (' ','', $nroarc);
//		$nroarc=str_replace ('-','', $nroarc);
//		$nroarc=str_replace (':','', $nroarc);
		
		$inputFileType = PHPExcel_IOFactory::identify($archivo);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($archivo);
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		for ($row = 2; $row <= $highestRow; $row++){ 
		$a = $sheet->getCell("A".$row)->getValue();
		$b = $sheet->getCell("B".$row)->getValue();
		if($a != '' and $b != ''){
		$timestamp = PHPExcel_Shared_Date::ExcelToPHP($a);
		$mifecha = date("Y-m-d H:i:s",$timestamp);
		$x = strtotime ( '+5 hour' , strtotime ($mifecha) ) ; 
		$a = date ( 'Y-m-d H:i:s' , $x );
		$data=array(
		'a'=>$a,
		'b'=>$b
		);
		$this->bas->insertar('ingreso',$data);
	}else{$row=999999;}
	}
	}
	
	if($r == ''){$output["err"]='1';}else{$output["err"]='0';} 
	echo json_encode($output);
}	
		
  	
	function informe_ingreso($fecini,$fecfin){

	$condi=array('a >='=>$fecini,'a <='=>$fecfin);
	$resp=$this->bas->consultar('DISTINCT(b) as b','ingreso',$condi);
	foreach($resp as $row){
	extract($row);
	$r=($this->bas->consultarf_like('nombre, numid','contrato','numid',$b,'before'));
	if ($r != false){ extract($r); }else{ $p=($this->bas->consultarf_like('nombre, numid','contrato','numid',$b,'after')); 
	if($p != false){ extract($p); }else { echo $this->db->last_query(); }
	}
	$tabla='<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FFFF">
			  <tr bgcolor="#99FF99">
				<td colspan="4" bgcolor="#99FF99">FUNCIONARIO:'.$numid.' '.$nombre.'</td>
			  </tr>
			  <tr>
				<td colspan="4">&nbsp;</td>
			  </tr>
			  <tr>
				<td><div align="center">No.</div></td>
				<td><div align="center">Fecha</div></td>
			  </tr>';
  $conx=array('a >='=>$fecini,'a <='=>$fecfin,'b'=>$b);
  $resx=$this->bas->consultar_orden('a','ingreso',$conx,'a');
     $i=1;
  foreach($resx as $rowx){
   extract($rowx);
  $tabla.='<tr align="center" class="Estilo1">
    <td width="10%">'.$i.'</td>
  	<td width="90%">'.$a.'</td>
		</tr>';
		$i++;
	}
	$tabla .='<tr>
				<td colspan="2">&nbsp;</td>
			  </tr>
		</table>';
		echo $tabla;
	  }
	}

function pagado(){
		  $codigo = $this->input->post('codigo');
		  $result = $this->reti->pagado($codigo);
		  if($result == true){ echo 1; }
		  else{echo 0;}
		  }			

function informe_fecha($fecini,$fecfin){

	$tabla='<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FFFF">
			  <tr bgcolor="#99FF99">
				<td><div align="center">#</div></td>
				<td><div align="center">Nombre</div></td>
				<td><div align="center">fecha</div></td>
			  </tr>';
 
	$condi=array('a >='=>$fecini,'a <='=>$fecfin);
	$resp=$this->bas->consultar_orden('a,b','ingreso',$condi,'a');
	foreach($resp as $row){
	extract($row);
	$r=($this->bas->consultarf_like('nombre, numid','contrato','numid',$b,'before'));
	if ($r != false){ extract($r); }else{ $p=($this->bas->consultarf_like('nombre, numid','contrato','numid',$b,'after')); 
	if($p != false){ extract($p); }else { }
	}

  $tabla.='<tr align="center" class="Estilo1">
    <td width="10%">'.$numid.'</td>
	<td width="70%">'.$nombre.'</td>
  	<td width="20%">'.$a.'</td>
		</tr>';
	}
	$tabla .='<tr>
				<td colspan="2">&nbsp;</td>
			  </tr>
		</table>';
		echo $tabla;
	  }		   
		   
}