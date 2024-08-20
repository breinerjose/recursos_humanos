<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta <?php echo $codtrc; ?></title>
<style type="text/css">
body{
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.fch{color:#933;}
h1{font-size:18px; font-weight:bold;text-align:center;}
p.cuerpo{text-align:justify; font-size:16px;line-height:1.7em;}
p span.par, span.pie{font-weight:bold;}
span.pie{font-size:16px;text-transform:uppercase;}
#contenido{margin:0 auto; padding:1px; width:95%; }
p.fot{
    bottom: 0;
    height: 25px;
    left: 0;
    padding-left: 2px;
    padding-top: 1px;
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
  if($logo=='ASAP' || $logo=='asap' ||  $logo=='DISTRI'){
	 echo '<a href="#" onClick="window.print();" title="ASAP"><img src="/res/images/asap.png"/></a>'; 
  }else if($logo=='ASECO' || $logo=='aseco'){
	 echo '<a href="#" onClick="window.print();" title="ASECO"><img src="/res/images/aseco.png"/></a>'; 
  }
}
?>
<br>
<b>Cartagena de Indias</b>&nbsp;&nbsp;<span class="fch"><?php echo date('Y-m-d'); ?></span></p>
<br>
<p class="cuerpo">
<?php echo $textoa; ?>
</p>
<br>
<table border="1" cellpadding="3" cellspacing="0">
<tr>
<td width="150">CEDULA</td>
<td width="400">NOMBRE</td>
</tr>
<tr>
<td><?php echo $codtrc; ?></td>
<td><?php echo $nomtrc; ?></td>
</tr>
</table>
</p>
<p class="cuerpo"><?php echo $textob; ?></p>
<p>
<table>
<tr>
<td width="300px">
<img width="250px" height="80px" src="/res/firmas/karla.jpg"/>
</td>
<td>
<?php 
if(isset($logo)){
  if($logo=='ASAP' || $logo=='DISTRI'){
	 echo '<img width="200px" height="80px" src="/res/firmas/sello_asuntos_legales_asap.jpg"/>'; 
  }else if($logo=='ASECO'){
	 echo '<img width="200px" height="80px" src="/res/firmas/sello_asuntos_legales_aseco.jpg"/>'; 
  }
}
?>
</td>
</tr>
</table>
<span class="pie">KARLA VALENCIA VELANDIA </span><br>
<span class="carg">Gerencia Corporativa de Asuntos Legales y Gestion Humana</span>
</p>
</div>
<p class="fot">
<?php 
if(isset($logo)){
  if($logo=='ASAP' || $logo=='DISTRI'){
	 echo '<img src="/res/images/asap1.png"/>'; 
  }else if($logo=='ASECO'){
	 echo '<img src="/res/images/aseco1.png"/>'; 
  }
}
?>
</p>
</body>
</html>