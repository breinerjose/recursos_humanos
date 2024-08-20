<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta Examenes de Retiro</title>
<style type="text/css">
body{font-family:Verdana, Geneva, sans-serif; font-size:14px;}
.sp{font-size:14px;}
h1{font-size:14px; font-weight:bold;}
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
	 echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/res/images/asap.png"/></a>'; 
  }else if($logo=='ASECO' || $logo=='aseco'){
	 echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/res/images/aseco.png"/></a>'; 
  }
}
?>
</p>
<p class="cuerpo">
<br>
<br>
Cartagena de Índias D. T. y C,&nbsp;&nbsp;<?php echo $fchter; ?>
<br>
<br>
<br>
Señor(a)</p>
<h1><?php echo $nombre; ?></h1>
<span class="sp">Ciudad</span>
<br><br>
<strong>REF: ENTREGA DE ORDEN DE EXAMEN MEDICO DE EGRESO</strong><br>
<br><span class="sp">Apreciado(a) colaborador(a):</span><br><br>
<p class="cuerpo">Sirvase practicarse los Exámenes de la referencia, no sin antes informarle que usted dispone de 5 días hábiles para la realización de este examen.<br>
  <br>
Usted debe dirigirse a la siguiente dirección.<br><br>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>Nombre del prestador del Servicio: <?php echo $empnom; ?> </td>
  </tr>
  <tr>
    <td>Dirección:  
      <?php echo $empdir.' '.$empcel.' '.$empcel; ?></td>
  </tr>
  <tr>
    <td>Horario: De Lunes a Viernes de 07:00am a 12:00pm y desde las 02:00pm hasta las 05:00pm.  Sábados de 07:00am a 10:00am</td>
  </tr>
</table>
<br><br>
En caso de que no se practique el examen de egreso, dentro de la fecha indicada, entenderemos que renuncia a dicho examen.
<br><br>
Agradezco su colaboración y esperamos contar con usted en una próxima oportunidad. 
<br>
<br>
Cordialmente,
<br>
<br>
<br>
<p>
<img src="/res/firmas/25800145.jpg"/><br>
_____________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________ <br>
<span class="pie">TATIANA CARO MONTERROZA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMA DEL EMPLEADO</span><br>
<span class="carg">Analista de Contratación</span></p>
<p>APROBADO: Victor Barón&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PCC REV 04</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCTUBRE 2011&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div>
</br>
</br>
</br>
</br>
<p class="fot">
<?php 
if(isset($logo)){
  if($logo=='asap'){
	 echo '<img src="/res/images/asap1.png"/>'; 
  }else if($logo=='aseco'){
	 echo '<img src="/res/images/aseco1.png"/>'; 
  }
}
?>
</p>
</body>
</html>