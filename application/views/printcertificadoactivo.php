<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CERTIFICADDO LABORAL ACTIVO</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<!--<LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">
<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />-->
<?php
require('conex.php');  
$grupo = $_GET["grupo"]; 

if ($grupo == 'aseco'){$nit = '800121354-3'; $nombre1 ='AGENCIA DE SERVICIOS COLOMBIANOS S.A.S'; $nombre2 = 'ASECO S.A.S'; $imagen = 'aseco';}
else{$nit = '800002721-3'; $nombre1 ='AGENCIA DE SERVICIOS ADMINISTRATIVO PERSONAL S.A.S'; $nombre2 = 'ASAP S.A.S'; $imagen = 'asap';}

//SELECCIONAMOS LAS FAMILIAS

$query = "SELECT     nombre, salario, oficio, fecini, numid
FROM         contrato, familias
WHERE     numid = '".$this->session->userdata('user')."' AND contrato.estado = 'ACTIVO' AND contrato.familia = familias.familia AND familias.nitcia = '$nit'
LIMIT 0,1";

//AQUI LE PASAMOS EL PARAMETRO
 $rquery = $con->query($query) or die ("Error consultando contrato inactivo.");
$row= mysqli_fetch_array($rquery);
extract($row);?>
</script>
<!--<script language="javascript" src="fecha.js"></script>
<script type="text/javascript" src="datepickercontrol.js"></script> 
<link type="text/css" rel="stylesheet" href="datepickercontrol.css">-->
<style type="text/css">
<!--
.Estilo1 {
	font-size: 16px;
	font-weight: bold;
}
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo3 {font-size: 20px}
.Estilo4 {font-size: 20px; font-weight: bold; }
.Estilo7 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; }
-->
</style>
</head>
<body topmargin="0" leftmargin="0">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
<!--<form id="formulario" name="formulario" method="post" action="printdocumento.php">-->
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td><img src="../../images/<?php echo $imagen?>.jpg" width="177" height="67"></td>
        <td><div align="center"><span class="Estilo1"><?php echo $nombre1; ?></span></div></td>
      </tr>
      
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1"><div align="center" class="Estilo3">EL DEPARTAMENTO DE GESTION HUMANA DE</div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo1"><?php echo $nombre2; ?></div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo4">CERTIFICA QUE:</div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><p align="justify" class="Estilo7">El se&ntilde;or (a) <?PHP echo $nombre; ?>; identificado con C&eacute;dula de Ciudadan&iacute;a No.<?php echo $numid; ?>, labora en nuestra compa&ntilde;&iacute;a con un contrato
            <?php 
		$queryc = "SELECT     COUNT(identificacion) AS Cantidad
		FROM         fijos
		WHERE     identificacion = '".$this->session->userdata('user')."'";

		//AQUI LE PASAMOS EL PARAMETRO
 		$rqueryc = $con->query($queryc) or die ("Error consultando contrato inactivo.");
		$rowc= mysqli_fetch_array($rqueryc);
		extract($rowc);
		
		if($Cantidad > 0){echo "Indefinido"; }else {echo "por obra o labor contratada";}?>
            desde el <?php echo substr($fecini,0,11); ?> desempe&ntilde;a el cargo de <?php echo $oficio; ?>, Tiene un salario b&aacute;sico mensual de <?php echo '$'.number_format($salario); ?></p>          </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo7"><div align="justify">La presente certificaci&oacute;n se expide a solicitud del interesado(a) en la Ciudad de Cartagena<br>
          de Indias a los  (<?php echo date("d"); ?>) D&iacute;as del  <?php echo date("m"); ?> del <?php echo date("Y"); ?>.</div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo2">Atentamente,</td>
      </tr>
      <tr>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2" class="Estilo1">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1"><img width="200px" height="80px" src="/res/firmas/45449372.jpg"/></td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">MIRIAM ULLOQUE GUTIERREZ</td>
      </tr>
      <tr>
        <td colspan="2">Gerente de Nomina y Contratos </td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">Nit. <?php echo $nit; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">Tel 6600121 Ext 105 </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">C.C Folder de Empleado</td>
      </tr>
      <tr>
        <td colspan="2"><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><p align="center" class="Estilo2">35 No. 8-79 Edificio CitiBank Piso 13 Oficina 13-C Conmutador: 6600121 - 6600114 Fax: 6644954</p>
          <p align="center" class="Estilo2">Cartagena - Colombia  </p></td>
      </tr>
    </table></td>
  </tr>
 <!-- </form>-->
</table>
</body>
</html>