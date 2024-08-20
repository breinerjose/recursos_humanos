<?php
include("config.php");
$sql1 = "select ocunum, ocufre from ocuord";
	  $res = mysql_query($sql1);
 	  while($rows = mysql_fetch_array($res)){
	  extract($rows);
	  
	  $fecha = substr($ocufre,2,1);
	if($fecha == '/'){
	   $fecha = substr($ocufre,6,4)."-".substr($ocufre,3,2)."-".substr($ocufre,0,2);
	}else{
		$fecha =  date("Y-m-d",  strtotime($ocufre)); 
		}
	  	$sqlup = "UPDATE ocuord set ocufre='$fecha' WHERE ocunum='$ocunum'";
    	$recontem = mysql_query($sqlup) or die ("Error Actualizando contador.");
	  
	 }
/////////////////////	 
	 $sql1 = "select ocunum, sysfec as ocufre from ocuord";
	  $res = mysql_query($sql1);
 	  while($rows = mysql_fetch_array($res)){
	  extract($rows);
	  
	  $fecha = substr($ocufre,2,1);
	if($fecha == '/'){
	   $fecha = substr($ocufre,6,4)."-".substr($ocufre,3,2)."-".substr($ocufre,0,2);
	}else{
		$fecha =  date("Y-m-d",  strtotime($ocufre)); 
		}
	  	$sqlup = "UPDATE ocuord set sysfec='$fecha' WHERE ocunum='$ocunum'";
    	$recontem = mysql_query($sqlup) or die ("Error Actualizando contador.");
	  
	 }
//////////////////////////	 
	 $sql1 = "select ocunum, ocufem as ocufre from ocuord";
	  $res = mysql_query($sql1);
 	  while($rows = mysql_fetch_array($res)){
	  extract($rows);
	  
	  $fecha = substr($ocufre,2,1);
	if($fecha == '/'){
	   $fecha = substr($ocufre,6,4)."-".substr($ocufre,3,2)."-".substr($ocufre,0,2);
	}else{
		$fecha =  date("Y-m-d",  strtotime($ocufre)); 
		}
	  	$sqlup = "UPDATE ocuord set ocufem='$fecha' WHERE ocunum='$ocunum'";
    	$recontem = mysql_query($sqlup) or die ("Error Actualizando contador.");
	  
	 }
?>