<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Liquidaciones_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Liquidaciones_m','liq',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->library('PHPExcel');
	   $this->load->model('Basico_m','bas',TRUE);
	}
					  
	function liquidacionpendiente(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->liq->liquidacionpendiente();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['numid'],$row['nombre'],$row['oficio'],$row['fecini'],$row['fecfin'],
				"<a href='#' title='Pagada'  class='pagada'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/iconos/seleccion.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }	
	   
	   function loginc(){
		$this->output->set_header('Content-type: application/json');
		$condi=array('addusr !='=>'0');
		$result = $this->bas->consultar('*','liqlog',$condi);
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['observ'],$row['addfch'],$row['addusr']);
				}
				echo json_encode($output);
			}
	   }	
	   
	function updliquidacionfirmada(){
	      $codigo = $this->input->post('codigo');
		  $result = $this->liq->liquidacionfirmada($codigo);
		  if($result == true){ echo 1; }
		  else{echo 0;}
		  }	
				
	function liquidacionfirmada(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->liq->liquidacionfirmada();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['numid'],$row['nombre'],$row['oficio'],$row['fecini'],$row['fecfin'],
				"<a href='#' title='Pagada'  class='pagada'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/iconos/seleccion.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }		
	     
	function cesantias(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->bas->consultas('*','cesantias');
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['identificacion'],$row['valor'],$row['empresa'],$row['fondo'],$row['fecha']);
				}
				echo json_encode($output);
			}
	   }		
	     
		  
	function updliquidacionpagada(){
	      $codigo = $this->input->post('codigo');
		  $result = $this->liq->updliquidacionpagada($codigo);
		  if($result == true){ echo 1; }
		  else{echo 0;}
		  }	
		    	  
	
	///////////////////////////////////////////////////////////	   
	   
	function importar(){
	$this->output->set_header('Content-type: application/json');
	$r='';
		if (isset($_FILES["archivo"])){
		$archivo = './res/liquidacion/archivo.xlsx';
		unlink($archivo);
		move_uploaded_file($_FILES['archivo']['tmp_name'] , $archivo);
		$addusr = array('addusr'=>$this->session->userdata('user'));
		$nroarc=date('Y-m-d h:i:s');
		$nroarc=str_replace (' ','', $nroarc);
		$nroarc=str_replace ('-','', $nroarc);
		$nroarc=str_replace (':','', $nroarc);
		
		$inputFileType = PHPExcel_IOFactory::identify($archivo);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($archivo);
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		for ($row = 2; $row <= $highestRow; $row++){ 
		$a = $sheet->getCell("C".$row)->getValue();
		$b = $sheet->getCell("D".$row)->getValue();
		if($a != ''){
		$data=array(
		'nroarc'=>$nroarc,
		'id_pazysalvo'=>$a
		);
		$this->bas->insertar('arcliq',$data);	
		$condi=array('id_pazysalvo'=>$a);
		$sql=$this->bas->consultarf('id_pazysalvo','bre_pazysalvo',$condi);
		if($sql != false){	
		$data=array('liquidacion'=>'lista');
		$condi=array('id_pazysalvo'=>$a);
		$this->bas->actualizar('bre_pazysalvo',$data,$condi);
		
		$data=array('stdliq'=>'lista');
		$this->bas->actualizar('arcliq',$data,$condi);

		}else{
	$r = "Liquidacion ".$a." ".$b." No Encontrada";
	$data=array('observ'=>$r,'addusr'=>$this->session->userdata('user'));
	$this->bas->insertar('liqlog',$data);	
	}
	}else{$row=999999;}
	}
	}
	
	if($r == ''){$output["err"]='1';}else{$output["err"]='0';} 
	echo json_encode($output);
}

	///////////////////////////////////////////////////////////	   
	   
	function importar_cesantias(){
	$this->output->set_header('Content-type: application/json');
	$r='';
		if (isset($_FILES["archivo_cesantias"])){
		$archivo = './res/liquidacion/archivo_cesantias.xlsx';
		unlink($archivo);
		$this->bas->borrar('cesantias',array('empresa !='=>'NO'));
		move_uploaded_file($_FILES['archivo_cesantias']['tmp_name'] , $archivo);
		$addusr = array('addusr'=>$this->session->userdata('user'));
		$nroarc=date('Y-m-d h:i:s');
		
		$inputFileType = PHPExcel_IOFactory::identify($archivo);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($archivo);
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();

		for ($row = 2; $row <= $highestRow; $row++){ 
		$a = $sheet->getCell("A".$row)->getValue();
		$b = $sheet->getCell("B".$row)->getValue();
	    $c = $sheet->getCell("C".$row)->getValue();
		$d = $sheet->getCell("D".$row)->getValue();
		$e = $sheet->getCell("E".$row)->getValue();
		//$e='2022-02-15';
		if($a != ''){
		$data=array(
		'identificacion'=>$a,
		'valor'=>$b,
        'empresa'=>$c,
		'fondo'=>strtolower(trim($d)),
		'fecha'=>$e
		);
		$this->bas->insertar('cesantias',$data);	
	}else{$row=999999;}
}
}
	$output["err"]='0';
	echo json_encode($output);
}


}