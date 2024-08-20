<!DOCTYPE html>
<html>
<head>
	<title>Leer Archivo Excel</title>
</head>
<body>
<h1>Liquidaciones a Firmar</h1>
<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$con = mysqli_connect("localhost","myserver_asapase","AsecoAsap301084+","myserver_asapaseco");
	$nroarc=date('Y-m-d h:i:s');
	$nroarc=str_replace (' ','', $nroarc);
	$nroarc=str_replace ('-','', $nroarc);
	$nroarc=str_replace (':','', $nroarc);
require_once 'PHPExcel/Classes/PHPExcel.php';
$archivo = "excel.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
for ($row = 2; $row <= $highestRow; $row++){ 
		$a = $sheet->getCell("C".$row)->getValue();
		$b = $sheet->getCell("D".$row)->getValue();
	$sql="INSERT INTO arcliq (nroarc,id_pazysalvo) VALUES ('$nroarc','$a')";
	$resultado = $con->query($sql);
	
	$sql="SELECT id_pazysalvo FROM bre_pazysalvo WHERE id_pazysalvo='$a'";
	$resultado = $con->query($sql);
	$res=$resultado->fetch_array();
	if($res['0'] == $a){
	$sql="UPDATE bre_pazysalvo SET liquidacion='lista' WHERE id_pazysalvo='$a'";
	$resultado = $con->query($sql);
	$sql="UPDATE arcliq SET stdliq='lista' WHERE id_pazysalvo='$a'";
	$resultado = $con->query($sql);
	}else{
	echo "Liquidacion ".$a." ".$b." No Encontrada";
	echo '</br>';
	}
}
?>
<h1>Proceso Realizado Exitosamente</h1>
<?php exit(); ?>
</body>
</html>