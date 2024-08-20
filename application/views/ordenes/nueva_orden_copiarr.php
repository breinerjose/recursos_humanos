<?php
require('./conex.php');
$ocunum = $_GET['ocunum'];

//Empresa
			 echo  $consulta = "select * from ocuord where ocunum = '$ocunum'";
              $resultado = $con->query($consulta)  or die (mysql_error());
              $rows = mysqli_fetch_array($resultado);
			  extract($rows);
		//	
	
	if($ocupor == 'ASECO'){
$contemsql = "select contador from bre_fuente where id_fuente='3'"; //selecciona el contador
    $recontem = $con->query($contemsql) or die ("Error seleccionando contador 14.");
    $rcontem = mysqli_fetch_array($recontem); 
	
	$contador = "OSEASE".$rcontem[0]; //guarda el valor del contador
    $rcontem2 = $rcontem[0] + 1;
    $sqlup = "UPDATE bre_fuente set contador='$rcontem2' WHERE id_fuente='3'";
    $recontem = $con->query($sqlup) or die ("Error Actualizando contador 20.");
}else{
$contemsql = "select contador from bre_fuente where id_fuente='4'"; //selecciona el contador
    $recontem = $con->query($contemsql) or die ("Error seleccionando contador 22.");
    $rcontem = mysqli_fetch_array($recontem);  $contador ="OSEASA".$rcontem[0]; //guarda el valor del contador
    $rcontem2 = $rcontem[0] + 1;
    $sqlup = "UPDATE bre_fuente set contador='$rcontem2' WHERE id_fuente='4'";
    $recontem = $con->query($sqlup) or die ("Error Actualizando contador 27.");
}
$ocufem=date('Y-m-d');
$insert = "INSERT INTO `ocuord` (ocunum, ocupor, ocuced, ocunom, ocuape, ocudir, ocutel, ocueps, ocucel, ocucar, ocuemaem,ocutelem, ocufem, ocufre, sysfec,cliente,riesgo, tipcon, nricli,ocuobs, obssol, obsing, fecsol, fecing, tipord, tipsan,codcrg,orddep) VALUES ('$contador', '$ocupor', '$ocuced', '$ocunom', '$ocuape', '$ocudir', '$ocutel', '$ocueps','$ocucel', '$ocucar', '$empema', '$emptel', '$ocufem', '$fecres', '$fecemi','$cliente','$riesgo', '$tipcon', '$nricli', '$ocuobs', '$obssol', '$obsing', '$fecsol', '$fecing', '$tipord', '$tipsan','$codcrg','$ocunum')"; 

echo "--".$insert;
$recontem = $con->query($insert) or die ("Error Actualizando contador. 31");


?> <a href="/ordenes_c/vista/editar_orden_hseq.php?ocunum=<?php echo $contador; ?>">
             Generada Satisfactoriamente - Clic Aqui Para Gestionar Hseq</a>