<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solicitud De Empleo</title>
<link href="/res/css/estiloa.css" rel="stylesheet" type="text/css" />
<link href="/res/css/estilo.css" rel="stylesheet" type="text/css" />
<link href="/res/css/home-2007.css" rel="stylesheet" type="text/css" /><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
</html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="204" rowspan="2"><img src="/res/images/asapl.jpg" width="194" height="66" /></td>
    <td width="548" height="32" valign="bottom"><div align="center"><span class="titul1amar"><?php echo $res['nombres']; ?></span></div></td>
    <td width="198" rowspan="2"><div align="right"><img src="/res/images/asecol.jpg" width="186" height="57" /></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center"><span class="titul1amar">C.C <?php echo $res['cedula']; ?> </span></div></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="10" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC" class="comenta"><div align="center"><strong>DATOS PERSONALES </strong></div></td>
    </tr>
    

  <tr>
    <td class="comenta" width="25%">Lugar y Fecha de nacimiento:</td>
    <td class="comenta" width="75%"><label><?php echo $res['fechanacimiento']; ?></label></td>
  </tr>
  
  <tr>
    <td class="comenta">Direccion Residencial:</td>
    <td class="comenta"><?php echo $res['direccion']; ?></td>
  </tr>
  
  <tr>
    <td class="comenta">Correo Electronico:</td>
    <td class="comenta"><?php echo $res['email']; ?></td>
  </tr>
  <tr>
    <td class="comenta">Tel:</td>
    <td class="comenta"><?php echo  $res['celular'].' - '.$res['telefono']; ?></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td colspan="7" bgcolor="#CCCCCC" class="comenta"><div align="center"><strong>HISTORIAL DE CONTRATOS </strong></div></td>
</tr>
<tr>
<td>Oficio</td><td>Inicio</td><td>Fin</td><td>Empresa</td><td>Cliente</td>
<td>Salario</td>
<td>Tipo Contrato </td>
<tr>
<?php 
if($row != null){
foreach($row as $r){ 
$r['salario']=substr($r['salario'],0,-3);
if($r['tipocontrato'] == '0'){$tipocontrato="ATERMINO FIJO INFERIOR A UN AÑO";}
elseif($r['tipocontrato'] == '1'){$tipocontrato="INDEFINIDO";}
elseif($r['tipocontrato'] == '2'){$tipocontrato="POR OBRA O LABOR CONTRATADA";}
elseif($r['tipocontrato'] == '3'){$tipocontrato="ATERMINO FIJO INFERIOR A UN AÑO";}
elseif($r['tipocontrato'] == '4'){$tipocontrato="POR OBRA O LABOR CONTRATADA";}
elseif($r['tipocontrato'] == '5'){$tipocontrato="ATERMINO FIJO INFERIOR A UN AÑO";}
elseif($r['tipocontrato'] == '6'){$tipocontrato="POR OBRA O LABOR CONTRATADA";}
?>
<tr>
<td><?php echo $r['oficio']; ?></td><td><?php echo $r['fecini']; ?></td><td><?php echo $r['fecfin']; ?></td><td><?php echo $r['ocupor']; ?></td><td><?php echo $r['lugardes']; ?></td>
<td><?php echo number_format($r['salario'], 0, '.', '.'); ?></td>
<td><?php echo utf8_encode($tipocontrato); ?></td>
<tr>
<?php } } ?> 
</table>
</body>
</html>