<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificado Cesacion Laboral</title>
<style type="text/css">
body{font-family:Verdana, Geneva, sans-serif; font-size:14px;}
.fch{color:#933;}
h1{font-size:18px; font-weight:bold;text-align:center;}
p.cuerpo{text-align:justify; font-size:16px;line-height:1.7em;}
p span.par, span.pie{font-weight:bold;}
span.pie{font-size:16px;text-transform:uppercase;}
#contenido{margin:0 auto; padding:5px; width:95%; }
p.fot{
    bottom: 0;
    height: 45px;
    left: 0;
    padding-left: 10px;
    padding-top: 5px;
    text-align: center;
    width: 95%;
}
</style>
</head>
<body>
<div id="contenido">
<p class="cabecera">
<?php 
if(isset($logo)){
  if($logo=='ASAP' || $logo=='asap' ){
	 echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/recursos/images/asap.png"/></a>'; 
  }else if($logo=='ASECO' || $logo=='aseco'){
	 echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/recursos/images/aseco.png"/></a>'; 
  }
}
?>
</p>
<p><b>Fecha</b>&nbsp;&nbsp;<span class="fch"><?php echo $fecha; ?></span></p>
<br>
<h1>CERTIFICADO SOBRE CESACIÓN LABORAL</h1>
<br><br><br>
<p class="cuerpo">
Para dar cumplimiento al decreto 2852 de 2013 de cesación  laboral, certificamos que el señor(a) <span class="par"><?php echo $nombre; ?></span>, con C.C, N° <span class="par"><?php echo $cedula; ?></span> de <span class="par"><?php echo $lugar; ?></span>,trabajo para nuestra compañia en cargo de <span class="par"><?php echo $oficio; ?></span>, su ultima remuneración mensual fue de $<span class="par"><?php echo $salario; ?></span>, y la fecha exacta de terminacion fue <span class="par"><?php echo $fchter; ?></span>.
<br>
<br>
Causa de la terminación <span class="par"><?php echo $causa; ?></span>.
</p>
<br><br>
<p class="cuerpo">Cualquier Información adicional pueden solicitarla  a nuestro PBX 6600121 extensión 105 Departamento de Nomina.</p>
<br><br><br><br>
<p>
<img width="200px" height="80px" src="/recursos/firmas/1047416164.jpg"/><br>
_____________________________<br>
<span class="pie">KARLA VALENCIA VELANDIA </span><br>
<span class="carg">Gerencia Corporativa de Asuntos Legales y Gestion Humana</span>
</p>
</div>
<br>
<br>
<p class="fot">
<?php 
if(isset($logo)){
  if($logo=='asap'){
	 echo '<img src="/recursos/images/asap1.png"/>'; 
  }else if($logo=='aseco'){
	 echo '<img src="/recursos/images/aseco1.png"/>'; 
  }
}
?>
</p>
</body>
</html>