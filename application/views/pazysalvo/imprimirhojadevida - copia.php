<?php
require('conex.php');
function Vpesos($Valorp){
		$tama=strlen($Valorp);
	$aux='';
	$pun=0;
	while ( 0 < $tama){
		$tama=$tama-1;
		$sub=substr($Valorp,$tama,1);
		$aux=$sub.$aux;
		$pun=$pun+1;
		$fer=strlen($aux);
			if (($pun==3) and $tama!=0){
			$aux= ".".$aux;
			$pun=0;}}
$aux= "$".$aux;
return $aux;
}
?>
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
    <td><img src="/res/images/asapl.jpg" width="194" height="66" /></td>
    <td><div align="right"><img src="/res/images/asecol.jpg" width="186" height="57" /></div></td>
  </tr>
    <tr>
    <td colspan="2"><div align="center" class="Estilo3">SOLICITUD DE EMPLEO
      <label></label>
    </div></td>
  </tr>
</table>

 <form name="hojavida" method="post" action="">  
<table width="950" height="900" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
    <td class="comenta">&nbsp;<span class="titul1amar">&nbsp;&nbsp;Nombre Completo:&nbsp;</span>&nbsp;&nbsp; <?php echo $Nombres; ?>
      <span class="titul1amar">&nbsp;</span>&nbsp;&nbsp; <span class="titul1amar">&nbsp;</span>&nbsp;&nbsp;</td>
    
  </tr>
   <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Primer Nombre</span><span class="titul1amar">:&nbsp;</span>&nbsp;&nbsp; <?php echo $PrimerNombre; ?><span class="titul1amar">&nbsp;</span>&nbsp;&nbsp; <span class="titul1amar">&nbsp;</span>&nbsp;&nbsp; <span class="titul1amar">Segundo Nombre:&nbsp;</span>&nbsp;&nbsp;
      <?php echo $SegundoNombre; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;<span class="titul1amar">&nbsp;&nbsp;Primer Apellido:&nbsp;</span>&nbsp;&nbsp; <?php echo $PrimerApellido; ?>
      <span class="titul1amar">&nbsp;</span>&nbsp;&nbsp; <span class="titul1amar">&nbsp;</span>&nbsp;&nbsp; <span class="titul1amar">Segundo Apellido:</span>&nbsp;&nbsp;&nbsp;<?php echo $SegundoApellido; ?>   </td>
    
  </tr>
 
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Numero de Cedula</span> 
      <label>&nbsp;&nbsp;&nbsp;<?php echo $Cedula; ?>&nbsp;&nbsp;&nbsp;
      <span class="titul1amar">de</span>&nbsp;&nbsp;&nbsp;<?php echo $DeCedula; ?>&nbsp;&nbsp;&nbsp;      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Fecha de Nacimiento</span>:&nbsp;&nbsp;&nbsp;<?php echo $FechaNacimiento; ?><span class="titul1amar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lugar de Nacimiento&nbsp;&nbsp;&nbsp;</span>      <?php echo $LugarNacimiento; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Correo Electronico:</span>  
      <label>
      <?php echo $Email; ?>
      <span class="titul1amar">Direccion Residencial</span>      <?php echo $Direccion; ?> 
      <span class="titul1amar">Ciudad</span>      <?php echo $Ciudad; ?></label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Casa:</span> 
      <label>
      <?php echo $TipoCasa; ?>

      <span class="titul1amar">Valor Arriendo </span>
      <?php echo Vpesos($ValorArriendo); ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="titul1amar">Tiempo de residencia en la vivienda actual:&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $TiempoCasaAnio; ?>
      A&ntilde;os <?php echo $TiempoCasaMes; ?>&nbsp;&nbsp;Meses      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Numero de Telefono Fijo de su Residencia</span> 
      <label>
      <?php echo $Telefono; ?>      </label>
      <label><span class="titul1amar">Numero Celular Personal</span> 
      <?php echo $Celular; ?>      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Nombre de un Familiar</span> 
      <label>
      <?php echo $NombreFamiliar; ?>
      <span class="titul1amar">Telefono</span>
      <?php echo $TelefonoFamiliar; ?>      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Nombre de un Vecino</span>&nbsp;&nbsp;
      <label>
      <?php echo $NombreVecino; ?>
      <span class="titul1amar">Telefono</span>
<?php echo $TelefonoVecino; ?>      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Estado Civil</span> 
      <label>
      <?php echo $EstadoCivil; ?>
      <span class="titul1amar">Numero de Hijos</span>
      <?php echo $NumeroHijos; ?></label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;<span class="titul1amar">&nbsp;Nombre de Ultima Empresa Donde Trabajo:</span>&nbsp;&nbsp;&nbsp;&nbsp;
      <label> <?php echo $UltimaEmpresa1; ?> &nbsp;&nbsp;&nbsp;<span class="titul1amar">Telefono Empresa</span>:&nbsp;&nbsp;&nbsp; <?php  echo $TelefonoEmpresa1; ?> </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Direccion</span>&nbsp;
        <label> <?php echo $DireccionEmpresa1; ?> &nbsp;&nbsp;&nbsp;<span class="titul1amar">Ciudad</span> <?php echo $CiudadEmpresa1; ?> <span class="titul1amar">Ultimo Salario</span> <?php echo $UltimoSalario1; ?></label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Cargo Desempe&ntilde;ado</span>
        <label> <?php echo $CargoDesempenado1; ?> <span class="titul1amar">Nombre Supervisor Inmediato</span> <?php echo $Supervisor1; ?> </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;<span class="titul1amar">&nbsp;Inicio Ultimo Empleo:</span>&nbsp;&nbsp;<?php echo $InicioEmpleo1; ?>&nbsp;&nbsp;<span class="titul1amar">Fin  Empleo</span>&nbsp;&nbsp;<?php echo $FinEmpleo1; ?></td>
  </tr>
  
  <tr>
    <td class="comenta">&nbsp;&nbsp;<span class="titul1amar">&nbsp;Nombre de Penultima Empresa Donde Trabajo:</span>&nbsp;&nbsp;&nbsp;&nbsp;
      <label> <?php echo $UltimaEmpresa2; ?> &nbsp;&nbsp;&nbsp;<span class="titul1amar">Telefono Empresa</span>:&nbsp;&nbsp;&nbsp; <?php  echo $TelefonoEmpresa2; ?> </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Direccion</span>&nbsp;
        <label> <?php echo $DireccionEmpresa2; ?> &nbsp;&nbsp;&nbsp;<span class="titul1amar">Ciudad</span> <?php echo $CiudadEmpresa2; ?> <span class="titul1amar">Penultimo Salario</span> <?php echo $UltimoSalario2; ?></label></td>
  </tr>
  <tr>
   <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Cargo Desempe&ntilde;ado</span>
        <label> <?php echo $CargoDesempenado2; ?> <span class="titul1amar">Nombre Supervisor Inmediato</span> <?php echo $Supervisor2; ?> </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;<span class="titul1amar">&nbsp;Inicio Ultimo Empleo:</span>&nbsp;&nbsp;<?php echo $InicioEmpleo2; ?>&nbsp;&nbsp;<span class="titul1amar">Fin  Empleo</span>&nbsp;&nbsp;<?php echo $FinEmpleo2; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Nombre de la Institucion Donde Termino el Bachillerato:</span>&nbsp;&nbsp; 
      <?php echo $Bachillerato; ?> </td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Fecha Inicio  del Bachilleto </span><?php echo $InicioBachillerato; ?><span class="titul1amar"> </span><span class="titul1amar"> </span>
      <span class="titul1amar"> </span><span class="titul1amar">        </span><span class="titul1amar">Fin Bach. </span><?php echo $FinBachillerato; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">En caso de no haber terminado sus estudios Bachillerato hasta que grado curso</span>  
      <?php echo $Grado; ?>    </td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Especifique que estudios culmino:</span>
      <label>
      <?php echo $Estudios; ?>      </label>
      <span class="titul1amar">&nbsp;&nbsp;Nombre de la instituci&oacute;n donde termino los estudios: </span> <?php echo $InstitucionEstudio; ?> </td>
  </tr>
  <tr>
    <td class="comenta"><label>&nbsp;&nbsp;&nbsp;<span class="titul1amar">Inicio Estudios Antes Mencionado</span> <?php echo $InicioEstudios; ?> <span class="titul1amar">&nbsp;&nbsp; Fin  Estudios</span> <?php echo $FinEstudios; ?><span class="titul1amar"> &nbsp;&nbsp; Nombre del titulo obtenido</span>&nbsp;&nbsp; <?php echo $NombreTitulo; ?></label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Especifique que estudios culmino:
        <label> <?php echo $Estudios2; ?> </label>
&nbsp;&nbsp;Nombre de la instituci&oacute;n donde termino los estudios: <?php echo $InstitucionEstudio2; ?> </span></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Inicio Estudios Antes Mencionado</span> <?php echo $InicioEstudios2; ?> <span class="titul1amar">&nbsp;&nbsp; Fin  Estudios</span> <?php echo $FinEstudios2; ?><span class="titul1amar"> &nbsp;&nbsp; Nombre del titulo obtenido</span>&nbsp;&nbsp; <?php echo $NombreTitulo2; ?></td>
  </tr>
  
  <tr>
    <td><span class="comenta"><span class="titul1amar">&nbsp;&nbsp;&nbsp;Que otros estudioa adelanta Actualmente</span> <?php echo $EstudiosActualmente; ?> </span></td>
  </tr>
  <tr>
    <td class="comenta"><span class="titul1amar">&nbsp;&nbsp;&nbsp;Fecha de Solicitud:</span>  <?php echo $FechaSolicitud; ?></td>
  </tr>
  <tr>
    <td><span class="comenta">&nbsp;&nbsp;&nbsp;</span><span class="titul1amar">Estado</span> <label><span class="comenta"><?php echo $Estado; ?></span></label></td>
  </tr>
</table>
    <?php if($Estado != 'Negada'){?>
<table width="950" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr valign="top" >
        <td width="93%" align="left" class="texto">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Cargos a los que se postula:</span>  
		<?php $sql = "select laborppal from datos where Cedula='$Cedula'";
	$result = $con->query($sql)  or die (mysql_error());
   $row= mysqli_fetch_array($result);
		echo $row['0'];

?></td>
      </tr>
       <tr valign="top" >
         <td align="left" class="comenta"><span class="texto">&nbsp;&nbsp;&nbsp;</span><span class="texto">&nbsp;&nbsp;&nbsp;</span></td>
       </tr>
       <tr valign="top" >
         <td align="left" class="comenta"><span class="texto">&nbsp;&nbsp;&nbsp;<span class="titul1amar">Observaciones</span></span></td>
       </tr>
       <tr valign="top" >
         <td align="left" class="comenta"><span class="texto">&nbsp;&nbsp;&nbsp;</span><span class="texto">&nbsp;&nbsp;&nbsp;</span><?php echo $Comentario; ?></td>
       </tr>
       <tr valign="top" >
        <td width="93%" align="left" class="comenta">&nbsp;&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  </table>
    <?php } ?>
  <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td class="comenta">APROBADO: Victor Bar&oacute;n</td>
      <td class="comenta"><div align="right">PCS VER 08</div></td>
    </tr>
    <tr>
      <td class="comenta">&nbsp;</td>
      <td class="comenta"><div align="right">JUNIO - 2011</div></td>
    </tr>
    <tr>
      <td class="comenta">&nbsp;</td>
      <td class="comenta"><div align="right">1</div></td>
    </tr>
  </table>
 </form>
</body>
</html>