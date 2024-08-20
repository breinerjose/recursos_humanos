<?php 
   include('config2.php');
   $comfirmacion='';   
   $sql1 = "SELECT * FROM datos WHERE Cedula = '$Cedula' AND Estado='Seleccionado'";
   $query1 = mysql_query($sql1)  or die (mysql_error());
   $num=mysql_num_rows($query1);
   if($num > 0){
   $row = mysql_fetch_array($query1);
   extract($row);
   
   $sqlve = "SELECT basced as cedulave FROM hdvbas WHERE basced = '".$row["Cedula"]."'";

   //$queryve = odbc_exec($connection,$sqlve)  or die (mysql_error());
   $queryve = $conn->query($sqlve);
   //$rowsve = odbc_num_rows($queryve);
   //if($rowsve == 0){
	   $cuenta = $queryve->rowCount();
   if($cuenta == 0){
   
   $Nombres=$row['PrimerNombre']." ".$row['SegundoNombre'];
   $Apellidos=$row['PrimerApellido']." ".$row['SegundoApellido'];
   
   $sqlhdvbas = "INSERT INTO hdvbas (basced, basdec, basnom, basape, bassex, basnac, basdir, basema, baste1, bascel, basest, bashij, no1per, no2per, ap1per, ap2per) 
VALUES ('$Cedula', '$DeCedula', '$Nombres', '$Apellidos', '$Sexo', '$FechaNacimiento', '$Direccion', '$Email', '$Telefono', '$Celular', '$EstadoCivil', '$NumeroHijos', '$PrimerNombre','$SegundoNombre', '$PrimerApellido', '$SegundoApellido')";

  // $queryhdvbas = odbc_exec($connection, $sqlhdvbas)  or die("<p>"."Error Trasladando Aspiante 24" .odbc_errormsg());
   
   $queryhdvbas = $conn->query($sqlhdvbas);
   
   $esptit=$row['Grado'].$row['TipoGrado'];
   if($esptit==''){$esptit='Bachillerato';}
   
$FechaBaccillerato=$row['InicioBachillerato']." // ".$row['FinBachillerato'];
$sqlhdvesp = "INSERT INTO hdvesp (espced, espnom, espdur, esptit, item) 
VALUES ('$Cedula', '$Bachillerato', '$FechaBaccillerato', '$esptit', '1')";

//$queryhdvesp = odbc_exec($sqlhdvesp, $connection)  or die("<p>".odbc_errormsg()); 
 $queryhdvesp = $conn->query($sqlhdvesp);
   
$FechaEstudios=$row['$InicioEstudios']." // ".$row['FinEstudios'];
$sqlhdvesp2 = "INSERT INTO hdvesp (espced, espnom, espdur, esptit, item) 
VALUES ('$Cedula', '$InstitucionEstudio', '$FechaEstudios', '$NombreTitulo', '2')";

//$queryhdvesp2 = odbc_exec($sqlhdvesp2, $connection)  or die("<p>".odbc_errormsg());
$queryhdvesp2 = $conn->query($sqlhdvesp2);  
   
   
  if($row['UltimaEmpresa2']!=''){ 
$labdur1=$row['InicioEmpleo2']." // ".$row['FinEmpleo2'];
$sqlhdvlad1 = "INSERT INTO hdvlab (labced, lablug, labcar, labdur, labjef, labtel, labite) 
VALUES ('$Cedula', '$UltimaEmpresa2', '$CargoDesempenado2', '$labdur1', '$Supervisor2', '$TelefonoEmpresa2', '3')";
//$queryhdvlad1 = odbc_exec($sqlhdvlad1, $connection)  or die("<p>".odbc_errormsg());
$queryhdvlad1 = $conn->query($sqlhdvlad1);
} 
   
 if($row['UltimaEmpresa1']!=''){   
$labdur2=$row['InicioEmpleo1']." // ".$row['$FinEmpleo1'];
$sqlhdvlad2 = "INSERT INTO hdvlab (labced, lablug, labcar, labdur, labjef, labtel, labite) 
VALUES ('$Cedula', '$UltimaEmpresa1', '$CargoDesempenado1', '$labdur2', '$Supervisor1', '$TelefonoEmpresa1', '2')";
//$queryhdvlad2 = odbc_exec($sqlhdvlad2, $connection)  or die("<p>".odbc_errormsg()); 
$queryhdvlad2 = $conn->query($sqlhdvlad2);
}
   
  if($row['UltimaEmpresa']!=''){  
$labdur=$row['InicioEmpleo']." // ".$row['FinEmpleo'];
$sqlhdvlad = "INSERT INTO hdvlab (labced, lablug, labcar, labdur, labjef, labtel, labite) 
VALUES ('$Cedula', '$UltimaEmpresa', '$CargoDesempenado', '$labdur', '$Supervisor', '$TelefonoEmpresa', '1')";
//$queryhdvlad = odbc_exec($sqlhdvlad, $connection)  or die("<p>".odbc_errormsg());
$queryhdvlad = $conn->query($sqlhdvlad);
}       

$sql1ee = "UPDATE datos SET Estado='Trasladado' WHERE id_datos = '$id_datos'"; 
$query1ee = mysql_query($sql1ee)  or die (mysql_error());


echo "Puedes Cerra esta Pagina";

echo  "<script language=\"JavaScript\">   alert(\"EMPLEADO TRASLADADO\") </script>";

}else{

?>
</table>
<p>&nbsp;</p>
<table width="950" height="55" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="Mensaje.jpg"><div align="center" class="espec Estilo86">Lo Sentimos esta Persona se Encuentra Registrada en SIAGO. Debe Manejorlo con el programa SIAGO </div></td>
  </tr>
</table>
<?php
}
}else{

?>
</table>
<p>&nbsp;</p>
<table width="950" height="55" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="Mensaje.jpg"><div align="center" class="espec Estilo86">Lo Sentimos el estado de la persona no es Seleccionado. Revise Su Estado </div></td>
  </tr>
</table>
<?php
}
?>