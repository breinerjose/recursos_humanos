<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AsapAseco</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
error_reporting(E_ALL & ~E_NOTICE);
 if(!isset($_POST['consultar'])){?>
<style type="text/css">
<!--
.Estilo1 {
	color: #000066;
	font-weight: bold;
}
.Estilo3 {color: #990033; font-weight: bold; }
.Estilo5 {color: #FF0000; font-weight: bold; }
.Estilo6 {color: #FF0000}
-->
</style>
<form method="post">
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table>
	<tr>
	<td colspan="2"><div align="center"><span class="Estilo1">POLITICA DE CONFIDENCIALIDAD Y TRATAMIENTO DE DATOS</span></div></td>
  </tr>
  <tr align="center">
    <td colspan="2"><p align="justify">La aceptaci&oacute;n de los t&eacute;rminos de uso y la politica de confidencialidad y tratamiento de datos de servicios en linea de las compa&ntilde;ias ASECO S.A.S Y ASAP S.A.S, lo hace responsable en relaci&oacute;n con: </p>      </td>
  </tr>
  <tr align="center">
    <td width="55">&nbsp;</td>
    <td width="765"><div align="left">* La informaci&oacute;n que registra es veridica y real, y corresponde a sus datos personales.</div></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td><div align="left">* El usuario y la contrase&ntilde;a asognados son de caracter intransferible, personal y modificable &uacute;nicamente por su titular.</div></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td><div align="left">* La suplantacion o ingreso de informaci&oacute;n falsa constituye un fraude el cual puede conllevar sanciones y bloqueos.</div></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td><div align="left">* Como usuario har&aacute; un buen uso de la informaci&oacute;n a la que tenga acceso. </div></td>
  </tr>
  <tr align="center">
    <td colspan="2"><span class="Estilo5">
      <input name="a" type="checkbox" id="a" value="a" />
      Acepto los t&eacute;rminos de uso y pol&iacute;tica de confidencialidad y entiendo </span></td>
	</tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
  </tr>
	</table></td>
  </tr>
  <tr>
    <td><table>
	<tr align="center">
    <td colspan="2"><span class="Estilo1">AUTORIZACION TRATAMIENTO DE DATOS</span></td>
  </tr>
  <tr align="center">
    <td colspan="2"><p align="justify">Mediante el registro de sus datos personales en el presente formulario y los siguientes formularios, usted autoriza a las compa&ntilde;ias ASECO S.A.S Y ASAP S.A.S para la recolecci&oacute;n, almacenamiento y uso de los mismos con la finalidad de tener su hoja de vida en nuestras bases de datos y poder contactarlo en procesos de seleccion de personal para ocupar vacantes de la compa&ntilde;ia o de nuestros clientes, asi como enviarle informacion relacionada con nuestras funciones, sobre servicios que prestamos, para que evalue la calidad de nuestros servicios, entre otros. Como titular de la informaci&oacute;n tiene derecho a conocer, actualizar y rectificar sus datos personales, solicitar prueba de autorizaci&oacute;n otorgada para su tratamiento, ser informado sobre el uso que se ha dado a los mismo, presentar queja ante la SIC por infracci&oacute;n a la ley, revocar la autorizaci&oacute;n y/o solicitar la supresi&oacute;n de sus datos en los casos en que sea procedente y acceder de forma gratuita a los mismos. Las compa&ntilde;ias ASECO S.A.S Y ASAP S.A.S tienen su oficina principal en Centro Edificio City Bank Oficna 13C, en la ciudad de cartagena-BOlivar, Contact Center +57(5) 6600121 Email protecciondedatos@asapaseco.com</p>
        </td>
  </tr>
  <tr align="center">
    <td colspan="2"><input name="b" type="checkbox" id="b" value="b" />
      <span class="Estilo5">Entiendo y acepto el registroy uso de mis datos personales, como se estipula anteriormente.</span></td>
  </tr>
	</table></td>
  </tr>
  <tr>
    <td><table align="center">
	<tr align="center">
    <td><p>&nbsp;</p>
      <p>Digita Su Numero de Identificacion (Cedula)
        <input name="cedula" type="text" class="Estilo3" id="cedula" value="" />
        </p></td>
  </tr>
  <tr align="center">
    <td>[ <input type="submit" name="consultar" value="Acepto los Términos y Condiciones"> 
    ]</td>
  </tr>
	</table></td>
  </tr>
</table>
</form>
<?php 
} 
if(isset($_POST['consultar'])){
$cedula=$_POST['cedula'];
$this->session->set_userdata('cedula',$Cedula);
echo  "<script language=\"JavaScript\"> window.location.href = \"hoja_de_vida_v_2.php\" </script>";
}
?>
