<?php
require('conex.php');  
$grupo = $_GET["grupo"]; 
$estado = $_GET["estado"]; 

if ($grupo == 'aseco'){$nit = '800121354-3'; $nombre1 ='AGENCIA DE SERVICIOS COLOMBIANOS S.A.S'; $nombre2 = 'ASECO S.A.S'; $imagen = 'aseco';}
else{$nit = '800002721-3'; $nombre1 ='AGENCIA DE SERVICIOS ADMINISTRATIVO PERSONAL S.A.S'; $nombre2 = 'ASAP S.A.S'; $imagen = 'asap';}


//CONSULTAMOS SI TIENEN CONTRATOS
$query4 = "SELECT     fecini, fecfin, oficio, salario, tipocontrato
FROM         contrato, familias
WHERE     numid = '".$this->session->userdata('user')."' AND contrato.estado = 'INACTIVO' AND contrato.familia = familias.familia AND familias.nitcia = '$nit' ORDER BY fecini";
$rquery4 = $con->query($query4) or die ("Error consultando contrato inactivo.");
//SELECT

 $query = "SELECT  nombres as nombre
FROM         datos
WHERE     cedula = '".$this->session->userdata('user')."'
LIMIT 0,1"; 

//AQUI LE PASAMOS EL PARAMETRO
$rquery = $con->query($query) or die ("Error consultando contrato inactivo.");
while($rowf= mysqli_fetch_array($rquery)){
  $nombre = $rowf['nombre']; $numid = $rowf['numid']; 
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CERTIFICADO LABORAL INACTIVO-</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--<LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">
<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />-->
</script>
<!--<script language="javascript" src="fecha.js"></script>
<script type="text/javascript" src="datepickercontrol.js"></script> -->
<!--<link type="text/css" rel="stylesheet" href="datepickercontrol.css">-->
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
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 17px; }
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
        <td colspan="2" class="Estilo1"><div align="center" class="Estilo3">EL DEPARTAMENTO DE GESTION HUMANA DE</div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo1"><?php echo $nombre2; ?></div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo1 Estilo3">CERTIFICA QUE:</div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="justify"><span class="Estilo5">El se&ntilde;or (a) <?PHP echo $nombre; ?>; identificado con C&eacute;dula de Ciudadan&iacute;a No.<?php echo $this->session->userdata('user'); ?>,<br>
          labor&oacute; en nuestra empresa, bajo diferentes &eacute;pocas y bajo diferentes contratos, independiente uno<br>
          del otro y los cuales se dieron en las siguientes fechas;</span></div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
	   <?php    
while($row4= mysqli_fetch_array($rquery4)){
extract($row4);
if($tipocontrato == '1'){$tipoc = "a Termino Indefinido";}
elseif($tipocontrato == '2'){$tipoc = "por Labor u Obra contratada";}
else{$tipoc = "No Definido";}
?>
      <tr>
        <td colspan="2" class="Estilo2"><?php echo "Del ".$fecini." Hasta ".$fecfin." Con tipo de contrato ".$tipoc." Ocupando el cargo de ".$oficio." con un salario de $".number_format($salario); ?></td>
      </tr>
<?php } ?>

      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo5"><div align="justify">La presente certificaci&oacute;n se expide a solicitud del interesado(a) en la Ciudad de Cartagena<br>
          de Indias a los  (<?php echo date("d"); ?>) D&iacute;as del mes de <span class="Estilo7"><?php echo date("m"); ?></span> del <?php echo date("Y"); ?>.</div></td>
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
        <td colspan="2" class="Estilo1">Tel 6600121 ext 105</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">C.C Folder de Empleado</td>
      </tr>
    </table></td>
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
<!--  </form>-->
</table>
<p>&nbsp;</p>
</body>
</html>