<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI
date_default_timezone_set('America/Bogota');
class Incapacidades_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('incapacidades_m','inc',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("incapacidades/".$nombre); //llamo a la vista
		}
	
	function vistan($nombre=''){ // declarar el metodo
		$this->load->view("incapacidad/".$nombre); //llamo a la vista
		}
		
	function excela($fecini,$fecfin,$ocupor,$deveps){
	$i = 0 ;
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=Informe.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	$tabla='<table width="1600" border="0" cellspacing="0" cellpadding="0" bordercolor="#FFFFFF">
            <tr>
              <td colspan="12"><div align="center"><strong><H1>CONTROL  DE INCAPACIDADES'.date('Y-m-d H:i').'</h1></strong></div></td>
            </tr>
            <tr>
              <td width="24" align="center" bgcolor="#CCCCCC" class="Estilo7">#</td>
              <td width="86" align="center" bgcolor="#CCCCCC" class="Estilo7">Cedula</td>
              <td width="350" align="center" bgcolor="#CCCCCC" class="Estilo7">Empleado</td>
              <td width="200" align="center" bgcolor="#CCCCCC" class="Estilo7">Cargo</td>
              <td width="109" align="center" bgcolor="#CCCCCC" class="Estilo7"># Incapacidad</td>
              <td width="46" align="center" bgcolor="#CCCCCC" class="Estilo7">Evento</td>
              <td width="46" align="center" bgcolor="#CCCCCC" class="Estilo7">Prorroga</td>
              <td width="46" align="center" bgcolor="#CCCCCC" class="Estilo7"># dias</td>
              <td width="83" align="center" bgcolor="#CCCCCC" class="Estilo7">Fecha Inicio</td>
              <td width="83" align="center" bgcolor="#CCCCCC" class="Estilo7"><div align="center">Fecha Fin</div></td>
              <td width="200" align="center" bgcolor="#CCCCCC" class="Estilo7">Eps</td>
              <td width="100" align="center" bgcolor="#CCCCCC" class="Estilo7">Diagnostico</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Empleador</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Cliente</td>
			  <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Fecha Registro</td>
			  <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Estado</td>
			  <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Historico</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Cobrada</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Archivada</td>';
	 if ($deveps == '1'){ $tabla.='<td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Observacion</td>'; }
	 $tabla.='</tr>'; 	 
	 if($deveps == 1){ 
	 $consulta=$this->bas->consultar_orden('*','incapacidad',array('addfch >=' => $fecini, 'addfch <= ' => $fecfin,'tipo'=>'2'),'id');
	}else{  $consulta=$this->bas->consultar_orden('*','incapacidad',array('addfch >=' => $fecini, 'addfch <= ' => $fecfin,'tipo'=>'1'),'id'); }
	foreach($consulta as $rows){
	 extract($rows); $i=$i+1;
	  $tabla.='<tr>
              <td class="Estiloimp" align="center">'.$i.'</td>
              <td class="Estiloimp" align="center">'.$cedula.'</td>
			  <td class="Estiloimp" align="center">'.$nombres.'</td>
              <td class="Estiloimp" align="center">'.$cargo.'</td>
			  <td class="Estiloimp" align="center">'.$numinc.'</td>
			  <td class="Estiloimp" align="center">'.$evento.'</td>
			  <td class="Estiloimp" align="center">'.$prorroga.'</td>
			  <td class="Estiloimp" align="center">'.$numdias.'</td>
			  <td class="Estiloimp" align="center">'.$fecini.'</td>
              <td class="Estiloimp" align="center">'.$fecfin.'</td>
              <td class="Estiloimp" align="center">'.$nomeps.'</td>
              <td class="Estiloimp" align="center">'.$diagnostico.'</td>
              <td class="Estiloimp" align="center">'.$empleador.'</td>
              <td class="Estiloimp" align="center">'.$nomcli.'</td>
			  <td class="Estiloimp" align="center">'.$addfch." ".$hora.'</td>
			  <td class="Estiloimp" align="center">'.$estado.'</td>
			  <td class="Estiloimp" align="center"></td>
			  <td class="Estiloimp" align="center">'.$pagada.'</td>
              <td class="Estiloimp" align="center">'.$archivado.'</td>
			  </tr>';
		}
	  $tabla.='</table>';
	  echo $tabla;
	}	
	
	function incapacidades(){
		$this->output->set_header('Content-type: application/json');
		$qfamilias = "SELECT distinct(familia) as familia FROM inccfg";
		$result1 = $this->db->query($qfamilias);
		if($result1->num_rows() > 0)$res = $result1->result_array();
		
		foreach($res as $rowf){
		extract($rowf);
		$no="";
		$queryno = "select codigo from inccfg where familia = '$familia'";
		$selectno =  $this->db->query($queryno);
		if($selectno->num_rows() > 0)$resb = $selectno->result_array();
		
		foreach($resb as $rowno){
		extract($rowno);
		$no .= " Nm_DevengosDctosConceptos.IDEN_Concepto = ".$codigo." OR ";
		}
		$no = substr($no, 1, -4);
		$no ="(".$no.")";
		$conn = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");

		$query1 = "SELECT Nm_DevengosDctosConceptos.IDEN_Ausencia, Nm_Empleado.Identificacion, Nm_Empleado.Nombres, Nm_Contrato.SueldoBasico, 
					Nm_Concepto.Nombre, CONVERT(char, Nm_Ausencias.FechaInicial, 111) FechaInicial, 
					CONVERT(char, Nm_Ausencias.FechaFinal, 111) FechaFinal, Sum(Nm_DevengosDctosConceptos.Cantidad) Cantidad, SUM(Nm_DevengosDctosConceptos.Total) Total,
					 Nm_IncapacidadDiagnostico.Codigo, Nm_IncapacidadDiagnostico.Nombre 
					FROM Nm_Contrato,Nm_Empleado, Nm_DevengosDctosConceptos, Nm_Concepto, Nm_Ausencias, Nm_IncapacidadDiagnostico
					WHERE $no AND Nm_Ausencias.IDEN_Diagnostico=Nm_IncapacidadDiagnostico.IDEN AND Nm_DevengosDctosConceptos.IDEN_Contrato = Nm_Contrato.IDEN 
					AND Nm_Contrato.IDEN_Empleado = Nm_Empleado.IDEN  AND Cantidad>0
					AND Nm_DevengosDctosConceptos.IDEN_Concepto = Nm_Concepto.Id AND Nm_DevengosDctosConceptos.IDEN_Ausencia= Nm_Ausencias.IDEN
					AND  CONVERT(char, Nm_Ausencias.FechaInicial, 111) >= '2017/06/01' 
					AND CONVERT(char, Nm_Ausencias.FechaInicial, 111) <= '2017/06/30'
					GROUP BY Nm_DevengosDctosConceptos.IDEN_Ausencia, Nm_Empleado.Identificacion, Nm_Empleado.Nombres, Nm_Contrato.SueldoBasico, Nm_Concepto.Nombre, 
					FechaInicial, FechaFinal, Nm_IncapacidadDiagnostico.Codigo, Nm_IncapacidadDiagnostico.Nombre
					ORDER BY Nm_Empleado.Identificacion, FechaInicial"; 
		//echo $query1;
		//exit();			
		$cant1 = 0;		   
		foreach ($conn->query($query1) as $resultado)
        { 
			$res = $this->inc->estado_incapacidad($resultado['IDEN_Ausencia']);
			$output['aaData'][] = array($resultado['Identificacion'],$resultado['Nombres'],$resultado['FechaInicial'],$resultado['FechaFinal'],round($resultado['Cantidad'],0),
			$resultado['Total'],$familia,$res,
			"<a href='javascript:void(0);' title='Transcripcion'  class='tra btnst' data-id ='".$resultado['IDEN_Ausencia']."'>Tra</a >&nbsp;&nbsp;&nbsp;
			<a href='#' title='Cobrada'  class='cob'  data-id='".$resultado['IDEN_Ausencia']."'>Cob</a >&nbsp;&nbsp;&nbsp;
			<a href='#' title='Recobro Con carta'  class='rec'  data-id='".$resultado['IDEN_Ausencia']."'>Rec</a >&nbsp;&nbsp;&nbsp;
			<a href='#' title='Pendiente de pago'  class='pen'  data-id='".$resultado['IDEN_Ausencia']."'>Pen</a >&nbsp;&nbsp;&nbsp;
			<a href='#' title='Pagada'  class='pag'  data-id='".$resultado['IDEN_Ausencia']."'>Pag</a >&nbsp;&nbsp;&nbsp;
			<a href='#' title='Ver Historial'  class='ver'  data-cod='".$resultado['IDEN_Ausencia']."'>His</a >&nbsp;&nbsp;&nbsp;");
			}			   
          }
		  echo json_encode($output);
		}
		
		function incapacidades_informe($fecini,$fecfin){
		$nombre = 'Informe-Incapacidades'.date('d-m-Y');
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=$nombre.xls");
		$fecini = str_replace("-","/",$fecini);
		$fecfin = str_replace("-","/",$fecfin);
		$tabla = '<table width="100%" border="1" cellspacing="0" cellpadding="0">
				  <tr>
					<td>Identificacion</td>
					<td>Nombres</td>
					<td>Detalle Concepto</td>
					<td>Ausencia</td>
					<td>Sueldo Basico</td>
					<td>Valor</td>
					<td>Fecha Inicio</td>
					<td>Fecha Final</td>
					<td>Cie10</td>
					<td>Diagnostico</td>
					<td>Familia</td>
					<td>Estado</td>
				  </tr>';
		$qfamilias = "SELECT distinct(familia) as familia FROM inccfg";
		$qfamiliasb =  $this->db->query($qfamilias);
		
		
		while($rowf= mysql_fetch_array($rfamilias)){
		extract($rowf);
		$no="";
		$queryno = "select codigo from inccfg where familia = '$familia'";
		$selectno = mysql_query($queryno) or die (mysql_error()."Error consulta por no.");
		while($rowno= mysql_fetch_array($selectno)){
		extract($rowno);
		$no .= " Nm_DevengosDctosConceptos.IDEN_Concepto = ".$codigo." OR ";
		}
		$no = substr($no, 1, -4);
		$no ="(".$no.")";
		$conn = new PDO("sqlsrv:Server=localhost;Database=$familia", "sa", "zeus2015*");

		$query1 = "SELECT Nm_DevengosDctosConceptos.IDEN_Ausencia, Nm_Empleado.Identificacion, Nm_Empleado.Nombres, Nm_Contrato.SueldoBasico, 
					Nm_Concepto.Nombre Nconcepto, CONVERT(char, Nm_Ausencias.FechaInicial, 111) FechaInicial, 
					CONVERT(char, Nm_Ausencias.FechaFinal, 111) FechaFinal, Sum(Nm_DevengosDctosConceptos.Cantidad) Cantidad, SUM(Nm_DevengosDctosConceptos.Total) Total,
					 Nm_IncapacidadDiagnostico.Codigo, Nm_IncapacidadDiagnostico.Nombre 
					FROM Nm_Contrato,Nm_Empleado, Nm_DevengosDctosConceptos, Nm_Concepto, Nm_Ausencias, Nm_IncapacidadDiagnostico
					WHERE $no AND Nm_Ausencias.IDEN_Diagnostico=Nm_IncapacidadDiagnostico.IDEN AND Nm_DevengosDctosConceptos.IDEN_Contrato = Nm_Contrato.IDEN 
					AND Nm_Contrato.IDEN_Empleado = Nm_Empleado.IDEN  AND Cantidad>0
					AND Nm_DevengosDctosConceptos.IDEN_Concepto = Nm_Concepto.Id AND Nm_DevengosDctosConceptos.IDEN_Ausencia= Nm_Ausencias.IDEN
					AND  CONVERT(char, Nm_Ausencias.FechaInicial, 111) >= '$fecini' 
					AND CONVERT(char, Nm_Ausencias.FechaInicial, 111) <= '$fecfin'
					GROUP BY Nm_DevengosDctosConceptos.IDEN_Ausencia, Nm_Empleado.Identificacion, Nm_Empleado.Nombres, Nm_Contrato.SueldoBasico, Nm_Concepto.Nombre, 
					FechaInicial, FechaFinal, Nm_IncapacidadDiagnostico.Codigo, Nm_IncapacidadDiagnostico.Nombre
					ORDER BY Nm_Empleado.Identificacion, FechaInicial"; 
		//echo $query1;
		//exit();			
		$cant1 = 0;		   
		foreach ($conn->query($query1) as $resultado)
        { 
			$res = $this->inc->estado_incapacidad($resultado['IDEN_Ausencia']);
			
			$tabla .=' <tr>
						<td>'.$resultado['Identificacion'].'</td>
						<td>'.$resultado['Nombres'].'</td>
						<td>'.$resultado['Nconcepto'].'</td>
						<td>'.round($resultado['Cantidad'],0).'</td>
						<td>'.$resultado['SueldoBasico'].'</td>
						<td>'.$resultado['Total'].'</td>
						<td>'.$resultado['FechaInicial'].'</td>
						<td>'.$resultado['FechaFinal'].'</td>
						<td>'.$resultado['Codigo'].'</td>
						<td>'.$resultado['Nombre'].'</td>
						<td>'.$familia.'</td>
						<td>'.$res.'</td>
					  </tr>';
			}			   
          }
		  $tabla .='</table>';
		  echo $tabla;
		}
		
		
		function registrarevento(){
		   $this->output->set_header('Content-type: application/json');
		   $codigo = $this->input->post('codigo');
		   $observ = $this->input->post('observ');
		  echo( $this->inc->registrarevento($codigo,$observ,$this->session->userdata('user'),date("Y-m-d H:i:s")))? '{"msg":"0"}': '{"msg":"1"}';   
		 //echo $this->db->last_query(); 
		   }
		   
		  function actualizar_pagado(){
		   $this->output->set_header('Content-type: application/json');
		   $codigo = $this->input->post('codigo');
		   $varl = $this->input->post('varl');
		   $veps = $this->input->post('veps');
		   $obs = $this->input->post('obs');
		   $vasumido = $this->input->post('vasumido');
		   $recibo = $this->input->post('recibo');
		  $this->inc->actualizar_pagado($codigo,'Pagada',$this->session->userdata('user'),date("Y-m-d H:i:s"),$varl,$veps,$obs,$vasumido,$recibo);
		   echo '{"err":"1"}';
		   }
		    
		   
		function historicoincapacidades($codigo){
		$this->output->set_header('Content-type: application/json');
			$datos = array("aaData" => array());
			$res = $this->inc->historicoincapacidades($codigo);
			//echo $this->db->last_query();
			foreach($res as $row){
			   $datos['aaData'][] = array($row['addfch'],$row['addusr'],$row['observ']);
			}//fin de foreach
		echo json_encode($datos);	
		}
		
	  function vistaPaginaHistorico($codigo){
	  $data['codinc'] = $codigo; 
	  $this->load->view('/incapacidad/historico_incapacidades_v',$data);   
		}
		
 	function vista_inc_pagada($codigo){
	  $data['codinc'] = $codigo; 
	  $this->load->view('/incapacidades/incapacidad_pagada_v',$data);   
		}		
	
	function consultaincapacidades(){
	$this->output->set_header('Content-type: application/json');
	$ale=$this->input->post('ale');
	$sw=$this->input->post('sw');
		$result = $this->inc->consultaincapacidades($sw);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['numinc'],$row['cedula']." ".$row['nombres'],$row['nomeps'],$row['nomcli'],$row['fecini'],$row['fecfin'],$row['estado'],
				'<a href="javascript:void(0);" title="Transcripcion"  class="tra'.$ale.' btnst" data-id ="'.$row['id'].'">Tra</a >&nbsp;&nbsp;&nbsp;
				<a href="#" title="Cobrada"  class="cob'.$ale.'"  data-id="'.$row['id'].'">Cob</a >&nbsp;&nbsp;
				<a href="#" title="Recobro Con carta"  class="rec'.$ale.'"  data-id="'.$row['id'].'">Rec</a >&nbsp;&nbsp;
				<a href="#" title="Negada"  class="pen'.$ale.'"  data-id="'.$row['id'].'">Neg</a >&nbsp;&nbsp;
				<a href="#" title="Pagada"  class="pag'.$ale.'"  data-id="'.$row['id'].'">Pag</a >&nbsp;&nbsp;
				<a href="#" title="Archivada"  class="arc'.$ale.'"  data-id="'.$row['id'].'">Arc</a >&nbsp;&nbsp;
				<a href="#" title="Ver Historial"  class="ver'.$ale.'"  data-cod="'.$row['id'].'">His</a >&nbsp;&nbsp;');
				}
				echo json_encode($output);
			}
	}
	
	function incapacidadesarchivadas(){
	$this->output->set_header('Content-type: application/json');
	$ale=$this->input->post('ale');
	$sw=$this->input->post('sw');
		$result = $this->bas->consultar('id, numinc, cedula, nombres, nomeps, nomcli, fecini, fecfin, estado','incapacidad',array('tipo'=>'1' , 'estado' => 'Archivada'));
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['numinc'],$row['cedula']." ".$row['nombres'],$row['nomeps'],$row['nomcli'],$row['fecini'],$row['fecfin'],$row['estado'],
				'<a href="javascript:void(0);" title="Transcripcion"  class="tra'.$ale.' btnst" data-id ="'.$row['id'].'">Tra</a >&nbsp;&nbsp;&nbsp;
				<a href="#" title="Cobrada"  class="cob'.$ale.'"  data-id="'.$row['id'].'">Cob</a >&nbsp;&nbsp;
				<a href="#" title="Recobro Con carta"  class="rec'.$ale.'"  data-id="'.$row['id'].'">Rec</a >&nbsp;&nbsp;
				<a href="#" title="Negada"  class="pen'.$ale.'"  data-id="'.$row['id'].'">Neg</a >&nbsp;&nbsp;
				<a href="#" title="Pagada"  class="pag'.$ale.'"  data-id="'.$row['id'].'">Pag</a >&nbsp;&nbsp;
				<a href="#" title="Archivada"  class="arc'.$ale.'"  data-id="'.$row['id'].'">Arc</a >&nbsp;&nbsp;
				<a href="#" title="Ver Historial"  class="ver'.$ale.'"  data-cod="'.$row['id'].'">His</a >&nbsp;&nbsp;');
				}
				echo json_encode($output);
			}
	}
	
    
}