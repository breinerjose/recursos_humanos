<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta de Terminación Fijo</title>
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
	 echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/recursos/images/asap.png"/></a>'; 
  }else if($logo=='ASECO' || $logo=='aseco'){
	 echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/recursos/images/aseco.png"/></a>'; 
  }
}
?>
</p>
<p class="cuerpo">
<br>
<br>
Cartagena de Índias,&nbsp;&nbsp;<?php  
$fecha = str_replace('/','-',$fchter);
$r = date("w",strtotime ( '-40 day' , strtotime ( $fecha ) ) );
if($r != 6 and $r != 7){
$nuevafecha = strtotime ( '-40 day' , strtotime ( $fecha ) ) ;}
else{$nuevafecha = strtotime ( '-42 day' , strtotime ( $fecha ) ) ;}
$nuevafecha = date ( 'd/m/Y' , $nuevafecha );
echo $nuevafecha;
?>
<br>
<br>
<br>
Señor(a)</p>
<h1><?php echo $nombre; ?></h1>
<span class="sp">Ciudad</span>
<br><br><span class="sp">Apreciado(a) colaborador(a):</span><br><br>
<p class="cuerpo">La presente es para comunicarle, que su contrato de trabajo a término fijo finaliza el día <?php echo $fchter; ?> el cual no será prorrogado, ni renovado. <br>
  <br>
Así  mismo, le informamos que debe presentarse en nuestra oficina principal el día siguiente a la fecha de terminación y una vez se ponga a PAZ Y SALVO, le será cancelada su liquidación de prestaciones sociales y demás acreencias laborales.<br>
<br>
Igualmente le entregamos las copias de los pagos de aportes  parafiscales (<strong>SENA, ICBF, CAJA DE COMPENSACION FAMILIAR</strong>), y de la seguridad social integral (<strong>SALUD, PENSION Y ADMINISTRADORA DE RIESGOS PROFESIONALES</strong>), correspondientes  a los tres (3) últimos meses anteriores a la terminación de su contrato de trabajo, por lo que le adjunto los comprobantes de pago que lo certifiquen.  Para dar así cumplimiento  a lo normado en el parágrafo 1º. Del art. 65 del C.S. del T. M. L. 789/02, art.29.<br>
<br>
Usted cuenta con cinco (5) días hábiles a partir de recibido de esta comunicación para que, si usted lo considera pertinente, se presente  en el centro medico a fin de que se practique la evaluación medica ocupacional de egreso.<br><br>
Atentamente,
<br>
<br>
<br>
<p>
<img width="200px" height="80px" src="/recursos/firmas/1047416164.jpg"/><br>
_____________________________<br>
<span class="pie">KARLA VALENCIA VELANDIA </span><br>
<span class="carg">Gerencia Corporativa de Asuntos Legales y Gestion Humana</span>
</p>
</div>
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