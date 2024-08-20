<?php
require('../config2.php');  
$id_pazysalvo=$_REQUEST['id_pazysalvo'];
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</style><?php include("js/calendario.php"); ?>
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
.Estilo11 {	color: #FFFFFF;
	font-weight: bold;
}
.Estilo12 {color: #000000}
.Estilo13 {font-size: 8px}
-->
</style>

<script type="text/javascript" src="js/calendario.js"></script>
<?php 
$contemsql = "select * from bre_pazysalvo where numero='$id_pazysalvo'"; //selecciona el contador
    $recontem = mysql_query($contemsql) or die ("Error seleccionando bre_pazysalvo");
	$cant = mysql_num_rows($recontem);
	if($cant > 0){
    $rcontem = mysql_fetch_array($recontem); 
	extract($rcontem);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Impresion de Paz y Salvo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">
<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />
</script>
<script language="javascript" src="fecha.js"></script>
<script type="text/javascript" src="datepickercontrol.js"></script> 
<link type="text/css" rel="stylesheet" href="datepickercontrol.css">
</head>
<body topmargin="0" leftmargin="0">
<table width="100" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
<form id="formulario" name="formulario" method="post" action="printdocumento.php">
  <tr>
    <td><table width="850" height="787" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr height="17">
        <td height="17" colspan="2">&nbsp;</td>
      </tr>
      <tr height="17">
        <td height="17" colspan="2"><div align="center" class="Estilo11"><span class="Estilo12">INFORMACI&Oacute;N  CUALITATIVA PARA LIQUIDACI&Oacute;N DE PRESTACIONES</span></div></td>
      </tr>
      <tr height="17">
        <td width="350" height="17">&nbsp;</td>
        <td width="500">&nbsp;</td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;PAZ Y SALVO NUMERO </td>
        <td>&nbsp;&nbsp;<?php echo $documento; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;NUMERO DE CONTRATO</td>
        <td>&nbsp;&nbsp;<?php echo $numero; ?></td>
      </tr>
      
      <tr height="17">
        <td height="17">&nbsp;&nbsp;EMPRESA</td>
        <td>&nbsp;&nbsp;<?php echo $a; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;PERIODO PAGO </td>
        <td><label>
          &nbsp;&nbsp;<?php echo $b; ?>
        </label></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;NIT Y/O CC</td>
        <td>&nbsp;&nbsp;<?php echo $id_persona; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;NOMBRE</td>
        <td>&nbsp;&nbsp;<?php echo $c; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Fecha de ejecuci&oacute;n de paz y salvo: </td>
        <td>&nbsp;&nbsp;<?php echo $d; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;FECHA RETIRO </td>
        <td>&nbsp;&nbsp;<?php echo $e; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;EMPRESA CLIENTE </td>
        <td>&nbsp;&nbsp;<?php echo $f; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Reporte de producci&oacute;n y/o tiempo en medio f&iacute;sico</td>
        <td><label>
          &nbsp;&nbsp;<?php echo $g; ?>
        </label></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Reporte de producci&oacute;n y/o tiempo en medio electr&oacute;nico</td>
        <td height="17">&nbsp;&nbsp;<?php echo $h; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Paz y salvo empresa cliente:</td>
        <td>&nbsp;&nbsp;<?php echo $i; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Paz y salvo cooperativa :</td>
        <td>&nbsp;&nbsp;<?php echo $j; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Paz y salvo dotaci&oacute;n y herramientas de trabajo:</td>
        <td>&nbsp;&nbsp;<?php echo $k; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Descuentos pendientes </td>
        <td><div align="left">
           &nbsp;&nbsp; <?php echo $l; ?>&nbsp;&nbsp;
          Valor
          <label>
            &nbsp;&nbsp;<?php echo Vpesos($ll); ?>            </label>
        </div></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Documento anexo:  (Notificaci&oacute;n escrita del cliente sobre la terminaci&oacute;n del contrato) </td>
        <td>&nbsp;&nbsp;<?php echo $m; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Se realiz&oacute; examen m&eacute;dico de ingreso: </td>
        <td>&nbsp;&nbsp;<?php echo $n; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Se realiz&oacute; examen m&eacute;dico de egreso: </td>
        <td>&nbsp;&nbsp;<?php echo $o; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Devoluci&oacute;n de carnet de ASAP - ASECO:</td>
        <td>&nbsp;&nbsp;<?php echo $p; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Devoluci&oacute;n de carnet de la ARP:</td>
        <td>&nbsp;&nbsp;<?php echo $q; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Devoluci&oacute;n de carnet de la empresa cliente:</td>
        <td>&nbsp;&nbsp;<?php echo $r; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Se entrego dotaci&oacute;n:</td>
        <td>&nbsp;&nbsp;<?php echo $dotacion; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Fecha de devoluci&oacute;n  de dotaci&oacute;n:</td>
        <td>&nbsp;&nbsp;<?php echo $t; ?></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Causa de terminaci&oacute;n del contrato:</td>
        <td><label>
          &nbsp;&nbsp;<?php echo $u; ?>
        </label></td>
      </tr>
      <tr height="17">
        <td height="17">&nbsp;&nbsp;Observacion</td>
        <td><label>
          &nbsp;&nbsp;<?php echo $v; ?>
        </label></td>
      </tr>
    </table></td>
  </tr>
  </form>
</table>
<p>&nbsp;</p>
<table width="850" border="0" align="center">
  <tr>
    <td>&nbsp;&nbsp;_________________________________</td>
    <td>&nbsp;&nbsp;_________________________________</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;ELABORADO POR: <?php 
$contemsql = "select nombre as elaborado from usuarios WHERE user='$usuario'"; //selecciona el contador
    $recontem = mysql_query($contemsql) or die ("Error seleccionando nombre elaborado");
	$cant = mysql_num_rows($recontem);
	if($cant > 0){
    $rcontem = mysql_fetch_array($recontem); 
	extract($rcontem);
	} echo $elaborado; ?></td>
    <td>APROBADO POR: <?php 
$contemsql = "select nombre as aprobado from usuarios WHERE user='$aprobado'"; //selecciona el contador
    $recontem = mysql_query($contemsql) or die ("Error seleccionando nombre elaborado");
	$cant = mysql_num_rows($recontem);
	if($cant > 0){
    $rcontem = mysql_fetch_array($recontem); 
	extract($rcontem);
	} echo $aprobado; ?></td>
  </tr>
</table>
<table width="850" border="0" align="center">
  <tr>
    <td height="42" colspan="2"><img src="images/tijeras.jpg" width="53" height="32" align="absbottom" />-----------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="131">Notas</td>
    <td width="709"><?php echo $w; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
