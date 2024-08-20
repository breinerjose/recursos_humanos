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
    <td width="548" height="32" valign="bottom"><div align="center"><span class="titul1amar"><?php echo $nombres; ?></span></div></td>
    <td width="198" rowspan="2"><div align="right"><img src="/res/images/asecol.jpg" width="186" height="57" /></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center"><span class="titul1amar">C.C <?php echo $cedula; ?> de <?php echo $decedula; ?></span></div></td>
  </tr>
</table>

 <form name="hojavida" method="post" action="">  
<table width="950" height="900" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="10" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC" class="comenta"><div align="center"><strong>DATOS PERSONALES </strong></div></td>
    </tr>
    

  <tr>
    <td class="comenta" width="25%">Lugar y Fecha de nacimiento:</td>
    <td class="comenta" width="75%"><label><?php echo $lugarnacimiento.' '.$fechanacimiento; ?></label></td>
  </tr>
  
  <tr>
    <td class="comenta">Direccion Residencial:</td>
    <td class="comenta"><?php echo $direccion.' '.$ciudad; ?></td>
  </tr>
  <tr>
    <td class="comenta">Dato de vivienda:</td>
    <td class="comenta"><?php echo $tipocasa.' - '.$valorarriendo.' - '. $tiempocasaanio.utf8_encode(' Años Y ').$tiempocasames.' Meses'; ?></td>
  </tr>
  <tr>
    <td class="comenta">Correo Electronico:</td>
    <td class="comenta"><?php echo $email.' '.$emazeus; ?></td>
  </tr>
  <tr>
    <td class="comenta">Tel:</td>
    <td class="comenta"><?php echo  $celular.' - '.$telefono.' - '.$telzeus; ?></td>
  </tr>
  <tr>
    <td class="comenta">Estado Civil: </td>
    <td class="comenta"><?php echo $estadocivil; ?></td>
  </tr>
  <tr>
    <td class="comenta">Hijos:</td>
    <td class="comenta"><?php echo $numerohijos; ?></td>
  </tr>
  <tr>
    <td colspan="2" class="comenta">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="comenta"><div align="center"><strong>ESTUDIOS</strong></div></td>
    </tr>
  <tr>
    <td class="comenta">Bachillerato:</td>
    <td class="comenta"><?php echo $grado.' - '.$bachillerato.' - '. $iniciobachillerato.' - '.$finbachillerato; ?></td>
  </tr>
  <tr>
    <td class="comenta">Estudios Superiores: </td>
    <td class="comenta"><?php echo  $nombretitulo.' - '.$institucionestudio.' - '.$inicioestudios.' - '.$finestudios; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;</td>
    <td class="comenta"><?php if($estudios2 != ''){echo ($estudios2.' - '.$nombretitulo2.' - '.$institucionestudio2.' - '.$inicioestudios2.' - '.$finestudios2);} ?></td>
  </tr>
  <tr>
    <td class="comenta">Actualmente</td>
    <td class="comenta"><?php echo $estudiosactualmente; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;</td>
    <td class="comenta">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="comenta"><div align="center"><strong>EXPERIENCIA LABORAL </strong></div></td>
    </tr>
  
  <tr>
    <td class="comenta">Empresa:</td>
    <td class="comenta"><?php echo $ultimaempresa1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Cargo:</td>
    <td class="comenta"><?php echo $cargodesempenado1.' - '.$funciones1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Salario:</td>
    <td class="comenta"><?php echo $ultimosalario1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Direcci&oacute;n:</td>
    <td class="comenta"><?php echo $ciudadempresa1.' - '.$direccionempresa1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Tel&eacute;fono:</td>
    <td class="comenta"><?php  echo $telefonoempresa1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Jefe Inmediato: </td>
    <td class="comenta"><?php echo $supervisor1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Duraci&oacute;n:</td>
    <td class="comenta"><?php echo $inicioempleo1.' - '. $finempleo1; ?></td>
  </tr>
  <tr>
    <td class="comenta">Funciones:</td>
    <td class="comenta"><?php echo $funciones1; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;</td>
    <td class="comenta">&nbsp;</td>
  </tr>
  <tr>
    <td class="comenta">Empresa:</td>
    <td class="comenta"><?php echo $ultimaempresa2; ?></td>
  </tr>
  <tr>
    <td class="comenta">Cargo:</td>
    <td class="comenta"><?php echo $cargodesempenado2.' - '.$funciones2; ?></td>
  </tr>
  <tr>
    <td class="comenta">Salario:</td>
    <td class="comenta"><?php echo $ultimosalario2; ?></td>
  </tr>
  <tr>
    <td class="comenta">Direcci&oacute;n:</td>
    <td class="comenta"><?php if($ciudadempresa2 != ''){echo $ciudadempresa2.' - '.$direccionempresa2;} ?></td>
  </tr>
  <tr>
    <td class="comenta">Tel&eacute;fono:</td>
    <td class="comenta"><?php  echo $telefonoempresa2; ?></td>
  </tr>
  <tr>
    <td class="comenta">Jefe Inmediato: </td>
    <td class="comenta"><?php echo $supervisor2; ?></td>
  </tr>
  <tr>
    <td class="comenta">Duraci&oacute;n:</td>
    <td class="comenta"><?php if($inicioempleo2 != ''){echo $inicioempleo2.' - '.$finempleo2;} ?></td>
  </tr>
  <tr>
    <td class="comenta">Funciones:</td>
    <td class="comenta"><?php echo $funciones2; ?></td>
  </tr>
  
  <tr>
    <td colspan="2" bgcolor="#CCCCCC" class="comenta"><div align="center"><strong>REFERENCIAS</strong></div></td>
    </tr>
  <tr>
    <td class="comenta">Familiar:
      <label></label></td>
    <td class="comenta"><?php echo $nombrefamiliar.' - '.$telefonofamiliar; ?></td>
  </tr>
  <tr>
    <td class="comenta"><label>Vecino:</label></td>
    <td class="comenta"><?php echo $nombrevecino.' - '.$telefonovecino; ?></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;</td>
    <td class="comenta">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" class="comenta">Fecha de Solicitud: </td>
    <td bgcolor="#CCCCCC" class="comenta"><?php echo $fechasolicitud; ?></td>
  </tr>
  
  
  <tr>
   <td bgcolor="#CCCCCC" class="comenta"><label>Estado:</label></td>
   <td bgcolor="#CCCCCC" class="comenta"><?php echo $estado; ?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" class="comenta">Cargo al que se Postula: </td>
    <td bgcolor="#CCCCCC" class="comenta"><span class="texto">
      <?php 
	    $this->db->select('laborppal');
		$this->db->from('datos');
		$this->db->where('cedula',$cedula);
		$res = $this->db->get();
		//if($tabla == 'familias'){ echo $this->db->last_query(); exit(); }
		if($res->num_rows()>0){
		$row = $res->row_array();
			  echo $row['laborppal'];
		}
	

?>
    </span></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td></td>
  </tr>
</table>
    <?php if($estado != 'Negada'){?>
    <?php } ?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td class="comenta">APROBADO: Victor Bar&oacute;n</td>
      <td class="comenta"><div align="right">PCS VER 08</div></td>
    </tr>
    <tr>
      <td class="comenta">&nbsp;</td>
      <td class="comenta"><div align="right">NOVIEMBRE - 2018</div></td>
    </tr>
    <tr>
      <td class="comenta">&nbsp;</td>
      <td class="comenta"><div align="right">1</div></td>
    </tr>
  </table>
 </form>
</body>
</html>