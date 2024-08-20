<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta de Terminación Labor</title>
<style type="text/css">
body{font-family:Verdana, Geneva, sans-serif; font-size:12px;}
.sp{font-size:12px;}
h1{font-size:12px; font-weight:bold;}
p.cuerpo{text-align:justify; font-size:14px;line-height:1.7em;}
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
<p class="cuerpo"><br>
Caartagena de Índias,&nbsp;&nbsp;<?php  
//$fecha = str_replace('/','-',$fchter);
//$r = date("w",strtotime ( '-1 day' , strtotime ( $fecha ) ) );
//if($r != '6' or $r != '7'){
//$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;}
//else{$nuevafecha = strtotime ( '-3 day' , strtotime ( $fecha ) ) ;}
//$nuevafecha = date ( 'd/m/Y' , $nuevafecha );
echo $fechacarta;
?>
<br>
<br>
Señor(a)</p>
<h1><?php echo $nombre; ?></h1>
<span class="sp">Ciudad</span>
<br><br><span class="sp">Apreciado(a) colaborador(a):</span><br><br>
<p class="cuerpo">Atentamente nos permitimos comunicarle que su contrato de trabajo por duración de la <span class="par">obra o labor contratada</span> termina el día  <span class="par"><?php echo $fchter; ?></span>, por haber finalizado la labor para la cual usted fue contratado.<br><br>
Así  mismo, le informamos que debe presentarse en nuestra oficina el día siguiente a la fecha de terminación y una vez se ponga a PAZ Y SALVO, le será cancelada su liquidación de prestaciones sociales y demás acreencias laborales.<br><br>
Igualmente entregamos las copias de los pagos de aportes  parafiscales (SENA, ICBF, CAJA DE COMPENSACION FAMILIAR), y de la seguridad social integral (SALUD, PENSION Y ADMINISTRADORA DE RIESGOS PROFESIONALES), correspondientes  a los tres (3) últimos meses anteriores a la terminación de su contrato de trabajo, por lo que le adjunto los comprobantes de pago que lo certifiquen.  Para dar así cumplimiento  a lo normado en el parágrafo 1º. Del art. 65 del C.S. del T. M. L. 789/02, art.29.<br><br>
Usted cuenta con cinco (5) días hábiles a partir de recibido de esta comunicación para que, si usted lo considera pertinente, se presente  en el centro medico a fin de que se practique la evaluación medica ocupacional de egreso.<br><br>
Atentamente,
<br>
<br>
<p>
<img width="200px" height="80px" src="/res/firmas/1047416164.jpg"/><br>
_____________________________<br>
<span class="pie">KARLA VALENCIA VELANDIA </span><br>
<span class="carg">Gerencia Corporativa de Asuntos Legales y Gestion Humana</span>
</p>
</div>
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