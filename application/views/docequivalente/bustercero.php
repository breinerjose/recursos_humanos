<?php
require('../conex.php'); 
?>         
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda de Terceros</title>
<style type="text/css">
<!--
.Estilo2 {FONT-FAMILY: Tahoma, Arial, Helvetica, sans-serif; TEXT-DECORATION: none; font-size: 11px;}
-->
</style>
<script> 
function asignarpadre( obj ) 
{ 
window.opener.document.formulario.artref.value="hola";
window.opener.document.formulario.artcod.value="mundo";
window.opener.asignartext(obj, document.pt.id.value); 
window.close();
} 
</script> 
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#75B5D9">
  
  <tr>
    <td width="600"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#599DCA">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td width="55%" class="LETRA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <form action="bustercero.php" method="post" name="form2" id="form2">
                      <tr>
                        <td width="54%" height="18" class="Estilo2">Expresion de Busqueda:</td>
                        <td width="46%" rowspan="2" class="Estilo2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="18" colspan="4">Tipo de Busqueda :</td>
                            </tr>
                            <tr>
                              <td width="16%"><label>
                                <input name="tipo" type="radio" value="1" />
                                </label>                              </td>
                              <td width="33%" class="Estilo2">Nombre</td>
                              <td width="16%"><input name="tipo" type="radio" value="2" checked="checked" /></td>
                              <td width="35%" class="Estilo2">identificacion</td>
                            </tr></table><tr>
                        <td class="Estilo2"><input name="busqueda" type="text" class="bloques" id="busqueda" onchange="javascript:this.value=this.value.toUpperCase();" onkeyup="buscar(this.value);"  size="25"/>
                            <input type="hidden" name="accion" value="buscar" />
                            <input type="submit" name="Submit2" value="Buscar"   /></td>
                      </tr>
                    </form>
                </table></td>
              </tr>
            </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="center">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table width="100%" border="0" align="center" bordercolor="black">
                <tr bgcolor="#0099CC" valign="middle">
                  <th width="22%" bgcolor="#599DCA"> <p><span class="Estilo2"><font color="#FFFFFF">IDENTIFICACION</font></span></p></th>
                  <th width="37%" bgcolor="#599DCA"><span class="Estilo2"><font color="#FFFFFF">NOMBRE </font></span></th>
                  <th width="13%" bgcolor="#599DCA"><font color="#FFFFFF">Tel. Celular</font></th>
                  <th width="28%" bgcolor="#599DCA"><font color="#FFFFFF">Direccion</font></th>
                </tr>
                <?php
				
				
		
$bus=0;
if ($_REQUEST['accion']=='buscar'){
if ($_REQUEST['tipo']=='2'){

$query = "SELECT terceros.id_tercero, terceros.nombre, terceros.direccion, terceros.telefono
FROM terceros
WHERE terceros.id_tercero LIKE '%".$_REQUEST['busqueda']."%'"; 
}else{
$query = "SELECT terceros.id_tercero, terceros.nombre, terceros.direccion, terceros.telefono
FROM terceros
WHERE terceros.nombre LIKE '%".$_REQUEST['busqueda']."%'"; 
}
$result = $con->query($query) or die ("Error consulta por nombres.");

while($row= mysqli_fetch_array($result)){
		extract($row);
		
		$bus=$bus+1;
?>
                <tr valign="top" >
                  <td align="left" class="texto">&nbsp; <a href="javascript:close();" title="Escojer Opcion" onClick="
				  window.opener.document.formulario.nombre.value='<?php echo $nombre; ?>';
				  window.opener.document.formulario.id_tercero.value='<?php echo $id_tercero; ?>';
				  window.opener.document.formulario.telefono.value='<?php echo $telefono; ?>';
				  window.opener.document.formulario.direccion.value='<?php echo $direccion; ?>'; 
				  window.opener.document.formulario.CONCEPTO.value='<?php echo $concepto; ?>';     
				  "><?php echo $id_tercero; ?></a></td>
                  <td align="left" class="texto">&nbsp;<?php echo $nombre; ?></a></td>
                  <td align="left" class="texto"><?php echo $telefono_movil; ?></td>
                  <td align="left" class="texto"><?php echo $direccion; ?></td>
                </tr>
                <?php }}?>
                <tr valign="top">
                  <td height="2" colspan="5" >&nbsp;</td>
                </tr>
                <tr valign="top">
                  <td height="2" colspan="5" bgcolor="#E9E9E9"></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>