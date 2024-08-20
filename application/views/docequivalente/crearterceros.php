<?php error_reporting(E_ALL & ~E_NOTICE);
     require('../conex.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>CREACION DE MARCAS</title>
<?php include("js/calendario.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
 <LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">
<style type="text/css">
<!-- 
.Estilo3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
}
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #000000; }
-->
</style>
<!-- <SCRIPT LANGUAGE="JavaScript" SRC="scripts/FSdateSelect.js"></SCRIPT>
<LINK REL="stylesheet" HREF="styles/FSdateSelect.css" type="text/css"> -->
</head>

<?php
   if(isset($_POST['aceptar'])){
   $id_tercero=$_POST['id_tercero'];
   $nom_tipidentificacion=$_POST['nom_tipidentificacion'];
   $dig_verificacion=$_POST['dig_verificacion'];
   $PRINOMBRE=$_POST['PRINOMBRE'];
   $SEGNOMBRE=$_POST['SEGNOMBRE'];
   $PRIAPELLIDO=$_POST['PRIAPELLIDO'];
   $SEGAPELLIDO=$_POST['SEGAPELLIDO'];
   $TELEFONO=$_POST['telefono'];
   $DIRECCION=$_POST['direccion'];
   $NOMBRE = $PRINOMBRE." ".$SEGNOMBRE." ".$PRIAPELLIDO." ".$SEGAPELLIDO;
   $IMP1=$_POST['IMP1'];
   $IMP2=$_POST['IMP2'];
   
   
   $sql1 = "INSERT INTO terceros (id_tercero, nom_tipidentificacion, dig_verificacion, PRINOMBRE, SEGNOMBRE, PRIAPELLIDO, SEGAPELLIDO, TELEFONO, DIRECCION, NOMBRE, IMP1, IMP2) VALUES ('$id_tercero', '$nom_tipidentificacion', '$dig_verificacion', '$PRINOMBRE', '$SEGNOMBRE', '$PRIAPELLIDO', '$SEGAPELLIDO', '$TELEFONO', '$DIRECCION', '$NOMBRE', '$IMP1', '$IMP2')";
   $query1 = $con->query($sql1)  or die (mysql_error());
   
echo  "<script language=\"JavaScript\">   alert(\"TERCERO REGISTRADO EXITOSAMENTE\") </script>";

}
?>

<body topmargin="0" leftmargin="0" bgcolor="#F2FCFF">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" bgcolor="#00338D"><div align="center"><strong><font color="#FFFFFF">MODELO DE TERCEROS </font></strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><fieldset class="Estilo3">
      <p><span class="Estilo5">Creacion de Terceros</span> </p>
    </fieldset></td>
  </tr>
</table>
<table width="700" border="0" cellspacing="0" cellpadding="0"  bgcolor="#F8F8F8" align="center">
 <form   id="formulario2" name="formulario2" action="crearterceros.php" method="post"> 
  
  <tr>
    <td colspan="4"></td>
</tr>
	<table width="700" border="0" cellspacing="3" cellpadding="0"  bgcolor="#F8F8F8" align="center">

  <tr>
    <td width="187" class="Estilo3"><div align="left">&nbsp;&nbsp;Tipo Identidad </div></td>
	
    <td colspan="3"><select name="nom_tipidentificacion" id="nom_tipidentificacion">
      <option>Cedula de Ciudadania</option>
      <option>Cedula de Extranjeria</option>
    </select>    </td>
  </tr>
    <?php $nom_tippersona = $_REQUEST['nom_tippersona']; ?>
  <tr>
    <td width="187" class="Estilo3">&nbsp;&nbsp;CC/ NIT </td>
    <td width="182"><input name="id_tercero" type="text" class="Estilo3" id="id_tercero" /></td>
    <td width="127"><span class="Estilo3">&nbsp;&nbsp;Digito Verificacion </span></td>
    <td width="204"><input name="dig_verificacion" type="text" class="Estilo3" id="dig_verificacion" size="1" maxlength="1" /></td>
  </tr>
  <tr>
    <td width="187" class="Estilo3">&nbsp;&nbsp;Primer Nombre </td>
    <td><input name="PRINOMBRE" type="text" class="Estilo3" id="PRINOMBRE" /></td>
    <td><span class="Estilo3">&nbsp;&nbsp;Segundo Nombre </span></td>
    <td><input name="SEGNOMBRE" type="text" class="Estilo3" id="SEGNOMBRE" /></td>
  </tr>
  <tr>
    <td width="187" class="Estilo3">&nbsp;&nbsp;Primer Apellido</td>
    <td><input name="PRIAPELLIDO" type="text" class="Estilo3" id="PRIAPELLIDO" /></td>
    <td><span class="Estilo3">&nbsp;&nbsp;Segundo Apelllido </span></td>
    <td><input name="SEGAPELLIDO" type="text" class="Estilo3" id="SEGAPELLIDO" /></td>
  </tr>
  <tr>
    <td width="187" class="Estilo3">&nbsp;&nbsp;RETENCION EN LA FUENTE</td>
    <td>&nbsp;</td>
    <td><input name="IMP1" type="text" id="IMP1" size="10" /></td>
    <td></td>
    </tr>
  
    <tr>
      <td colspan="2" class="Estilo3">&nbsp;&nbsp;RETENCION POR INDUSTRIA Y COMERCIO</td>
      <td><input name="IMP2" type="text" id="IMP2" size="10" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr><td width="187" class="Estilo3">&nbsp;&nbsp;&nbsp;Direccion</td>
    <td><input name="direccion" type="text" class="Estilo3" id="direccion" /></td>
    <td><span class="Estilo3">&nbsp;&nbsp;Telefono</span></td>
    <td><input name="telefono" type="text" class="Estilo3" id="telefono" /></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
 

  <tr>
    <td colspan="4" height="27" align="right"><div align="center">
        <!--  <input type="hidden" name="aceptar" value="1">-->
        [  <input type="submit" name="aceptar" value=" Guardar Datos "> 
        ]</div></td>
  </tr>
  </tr><tr>
    <td colspan="4" height="5" bgcolor="#003366"></td>
  </tr>
 </form>
</table>
</body>
</html>