<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta de Terminación Fijo</title>
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
<p class="cuerpo"> Cartagena de Índias,&nbsp;&nbsp;<?php  
//$fecha = str_replace('/','-',$fchter);
//$r = date("w",strtotime ( '-40 day' , strtotime ( $fecha ) ) );
//if($r != 6 and $r != 7 and $r != 3){
//$nuevafecha = strtotime ( '-40 day' , strtotime ( $fecha ) ) ;
//}else{
//$nuevafecha = strtotime ( '-42 day' , strtotime ( $fecha ) ) ;
//}
//$nuevafecha = date ( 'd/m/Y' , $nuevafecha );
echo $fechacarta;
?>
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
Igualmente le entregamos las copias de los pagos de aportes  parafiscales (<strong>SENA, ICBF, CAJA DE COMPENSACION FAMILIAR</strong>), y de la seguridad social integral (<strong>SALUD, PENSION Y ADMINISTRADORA DE RIESGOS PROFESIONALES</strong>), correspondientes  a los tres (3) últimos meses anteriores a la terminación de su contrato de trabajo, dando así cumplimiento  a lo normado en el parágrafo 1º. Del art. 65 del C.S.T.<br>
<br>
Atentamente,
<br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><img src="/res/firmas/1047416164.jpg" alt="firma" width="200px" height="80px"/></td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"> _____________________________<br>
<span class="pie">KARLA VALENCIA VELANDIA </span><br>
<span class="carg">Gerencia Corporativa de Asuntos Legales y Gestion Humana</span></td>
    <td align="left" valign="top">_____________________________<br>
      <span class="pie">firma del trabajador  </span><br>
<span class="pie">C.C.</span><br>
  <span class="carg">(En caso de no recibirla el empleado se enviara por correo certificado)</span></td>
  </tr>
</table>
</p>
</div>
</br>
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
</br>
</br>
</br>
</br>
</br>
</body>
</html>