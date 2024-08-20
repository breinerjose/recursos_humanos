<?php
error_reporting(E_ALL & ~E_NOTICE);
require('../conex.php');  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</style>
<style type="text/css">
<!--
.Estilo9 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<?php include("js/calendario.php"); ?>
<style type="text/css">
<!-- 

.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px;
	cursor: pointer;}
-->
</style>

<script type="text/javascript" src="js/calendario.js"></script>
<?php 
$CANT =$_REQUEST['CANT'];
$VRUNIT =$_REQUEST['VRUNIT'];
$id_tercero =$_REQUEST['id_tercero'];
$nombre =$_REQUEST['nombre'];
$direccion =$_REQUEST['direccion'];
$telefono =$_REQUEST['telefono'];
$EMPRESA =$_REQUEST['EMPRESA'];
$fechah =$_REQUEST['fechah'];
$CONCEPTO =$_REQUEST['CONCEPTO'];
$CANT =$_REQUEST['CANT'];
$VLRUNIT =$_REQUEST['VLRUNIT'];

if(isset($_POST['id_tercero'])){
$selectt="SELECT terceros.id_tercero, terceros.nombre, terceros.direccion, terceros.telefono
          FROM terceros
          WHERE id_tercero = '$id_tercero'";
          $rselectt = $con->query($selectt);
          $rowsapt = mysqli_fetch_array($rselectt); 
          extract($rowsapt);
}

if(isset($_POST['VRUNIT'])){
$select="SELECT IMP1, IMP2
          FROM terceros
          WHERE id_tercero = '$id_tercero'";
          $rselect = $con->query($select);
          $rowsap = mysqli_fetch_array($rselect); 
          extract($rowsap);
}

if(isset($_POST['guardar'])){
$CANT =$_REQUEST['CANT'];
$VRUNIT =$_REQUEST['VRUNIT'];
$id_tercero =$_REQUEST['id_tercero'];
$nombre =$_REQUEST['nombre'];
$direccion =$_REQUEST['direccion'];
$telefono =$_REQUEST['telefono'];
$EMPRESA =$_REQUEST['EMPRESA'];
$fechah =$_REQUEST['fechah'];
$CONCEPTO =$_REQUEST['CONCEPTO'];
$CANT =$_REQUEST['CANT'];
$VRUNIT =$_REQUEST['VRUNIT'];
$TOTAL1 =$_REQUEST['TOTAL1'];
$IVAA =$_REQUEST['IVAA'];
$IVAR =$_REQUEST['IVAR'];
$TOTAL2 =$_REQUEST['TOTAL2'];
$RTEFUE =$_REQUEST['RTEFUE'];
$RTEIND =$_REQUEST['RTEIND'];
$NETO =$_REQUEST['NETO'];


if($EMPRESA == 'ASECO S.A.S'){
$contemsql = "select contador from fuente where id_fuente='1'"; //selecciona el contador
    $recontem = $con->query($contemsql) or die ("Error seleccionando contador.");
    $rcontem = mysqli_fetch_array($recontem);  $contador =$rcontem[0]; //guarda el valor del contador
    $rcontem2 = $contador + 1;
    $sqlup = "UPDATE fuente set contador='$rcontem2' WHERE id_fuente='1'";
    $recontem = $con->query($sqlup) or die ("Error Actualizando contador.");
	$NIT = '800121354-3';
}else{
$contemsql = "select contador from fuente where id_fuente='2'"; //selecciona el contador
    $recontem = $con->query($contemsql) or die ("Error seleccionando contador.");
    $rcontem = mysqli_fetch_array($recontem);  $contador =$rcontem[0]; //guarda el valor del contador
    $rcontem2 = $contador + 1;
    $sqlup = "UPDATE fuente set contador='$rcontem2' WHERE id_fuente='2'";
    $recontem = $con->query($sqlup) or die ("Error Actualizando contador.");
	$NIT = '800002721-3';
}
$sqconsen = "INSERT INTO cuentas (DOCQUIV, FECHA, NIT, NOMBRE, id_tercero, DIRECCION, TELEFONO, CONCEPTO, CANT, VLRUNIT, TOTAL1, IVAA, IVAR, TOTAL2, RTEFUE, RTEIND, NETO, EMPRESA)
VALUES ('$contador', '$fechah', '$NIT', '$nombre','$id_tercero' ,'$direccion' ,'$telefono' ,'$CONCEPTO' ,'$CANT' ,'$VRUNIT', '$TOTAL1', '$IVAA', '$IVAR', '$TOTAL2', '$RTEFUE', '$RTEIND', '$NETO', '$EMPRESA')";
$queryconsen = $con->query($sqconsen)  or die (mysql_error());	
$CANT ='';
$VRUNIT ='';
$id_tercero ='';
$nombre ='';
$direccion ='';
$telefono ='';
$EMPRESA ='';
$fechah ='';
$CONCEPTO ='';
$CANT ='';
$VRUNIT ='';
$TOTAL1 ='';
$IVAA ='';
$IVAR ='';
$TOTAL2 ='';
$RTEFUE ='';
$RTEIND ='';
$NETO ='';
}
if(!isset($_POST['guardar'])){
if(!isset($_POST['VRUNIT'])){
$fechah = date("Y-m-d");
}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Evaluacin Osteomuscular - INMUNIZACIONES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--<LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">-->
<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />
</script>
<!--<script language="javascript" src="fecha.js"></script>-->
<!--<script type="text/javascript" src="datepickercontrol.js"></script> 
<link type="text/css" rel="stylesheet" href="datepickercontrol.css">-->
</head>
<body topmargin="0" leftmargin="0">
<table width="200" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#7AAFB9">
  <tr>
    <td><table width="900" align="center" cellpadding="0" cellspacing="0">
<form id="formulario" name="formulario" method="post" action="documento.php">
  <tr height="17">
    <td height="17" colspan="4"><div align="center" class="Estilo9">DOCUMENTO EQUIVALENTE </div></td>
    </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">FECHA</td>
    <td width="75"><input name="fechah" type="text" id="fecha_"  style="cursor: text" onClick="ds_sh(this);" value="<?php echo $fechah; ?>" size="12" maxlength="10" readonly="readonly"/></td>
    <td>&nbsp;</td>
    <td width="150">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17"></td>
    <td></td>
    <td width="136"></td>
    <td></td>
  </tr>
  <tr height="17">
    <td height="17"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <tr height="17">
    <td height="17">EMPRESA</td>
    <td><select name="EMPRESA" id="EMPRESA" onchange="this.form.submit();">
      <option><?PHP echo $EMPRESA; ?></option>
      <option>ASAP S.A.S</option>
      <option>ASECO S.A.S</option>
    </select>    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">BENEFICIARIO DEL PAGO</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">NOMBRE</td>
    <td colspan="2"><input name="nombre" type="text" id="nombre" value="<?php echo $nombre; ?>" size="80" /></td>
    <td><a href="#" onClick="window.open('bustercero.php','','scrollbars=yes,width=900,height=300')" ><img src="images/buscar.gif" width="25" height="20" border="0" /></a></td>
  </tr>
  <tr height="17">
    <td height="17">NIT Y/O CC</td>
    <td colspan="3"><input name="id_tercero" type="text" id="id_tercero" onchange="this.form.submit();" value="<?php echo $id_tercero; ?>" /></td>
  </tr>
  <tr height="17">
    <td height="17">DIRECCION</td>
    <td colspan="3"><input name="direccion" type="text" id="direccion" value="<?php echo $direccion; ?>" /></td>
  </tr>
  <tr height="17">
    <td height="17">TELEFONO</td>
    <td colspan="3"><input name="telefono" type="text" id="telefono" value="<?php echo $telefono; ?>" /></td>
  </tr>
  <tr height="17">
    <td height="17">CIUDAD</td>
    <td colspan="3"><input name="textfield5" type="text" value="CARTAGENA -  BOLIVAR" size="30" /></td>
  </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="67%">CONCEPTO</td>
        <td width="9%">CANT</td>
        <td width="14%">VR UNIT </td>
        <td width="10%">VR TOTAL </td>
      </tr>
      <tr>
        <td rowspan="2"><textarea name="CONCEPTO" cols="50" rows="5" id="CONCEPTO"><?php echo $CONCEPTO; ?></textarea></td>
        <td><input name="CANT" type="text" id="CANT" size="3" maxlength="2" onchange="this.form.submit();" value="<?php echo $CANT; ?>" /></td>
        <td><input name="VRUNIT" type="text" id="VRUNIT" size="12" maxlength="12"  onchange="this.form.submit();" value="<?php echo $VRUNIT; ?>"/></td>
        <td><input name="VRTOTAL" type="text" id="VRTOTAL" size="12" maxlength="12" value="<?php $VRTOTAL = $CANT*$VRUNIT; echo $VRTOTAL;?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">TOTAL</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="TOTAL1" type="text" id="TOTAL1" value="<?php $VRTOTAL = $CANT*$VRUNIT; echo $VRTOTAL;?>" size="12" maxlength="12" />
    </div></td>
  </tr>
  
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="2">IVA ASUMIDO DEL VALOR DEL    BIEN O SERVICIO</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="IVAA" type="text" id="IVAA" value="<?php if($EMPRESA == 'ASECO S.A.S'){$IVAA =  ($VRTOTAL/100)*12; echo round($IVAA);} else {$IVAA =  ($VRTOTAL/100)*2.4;
	  echo round($IVAA);} ?>" size="12" maxlength="12" />
    </div></td>
  </tr>
  <tr height="17">
    <td height="17">IVA RETENIDO</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="IVAR" type="text" id="IVAR" value="<?php if($EMPRESA == 'ASECO S.A.S'){$IVAA =  ($VRTOTAL/100)*12; echo round($IVAA);} else {$IVAA =  ($VRTOTAL/100)*2.4; 
	  echo round($IVAA);} ?>" size="12" maxlength="12" />
    </div></td>
  </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">TOTAL</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="TOTAL2" type="text" id="TOTAL2" value="<?php $VRTOTAL = $CANT*$VRUNIT; echo $VRTOTAL;?>" size="12" maxlength="12" />
    </div></td>
  </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">MENOS:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="2">RETENCION EN    LA FUENTE</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="RTEFUE" type="text" id="RTEFUE" value="<?php $RTEFUE =  ($VRTOTAL/100)*$IMP1; echo round($RTEFUE); ?>" size="12" maxlength="12" />
    </div></td>
  </tr>
  <tr height="17">
    <td height="17" colspan="2">RETENCION POR    INDUSTRIA Y COMERCIO</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="RTEIND" type="text" id="RTEIND" value="<?php $RTEIND =  ($VRTOTAL/100)*$IMP2; echo round($RTEIND); ?>" size="12" maxlength="12" />
    </div></td>
  </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17">NETO A PAGAR</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="NETO" type="text" id="NETO" value="<?php $NETO =  $VRTOTAL-round($RTEFUE)-round($RTEIND); echo $NETO; ?>" size="12" maxlength="12" />
    </div></td>
  </tr>
</table></td>
  </tr>
</table>

<p align="center">
  <input name="guardar" type="submit" id="guardar" value="Guardar" />
</p>
  </body>
</html>
