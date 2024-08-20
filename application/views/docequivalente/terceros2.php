<?php
error_reporting(E_ALL & ~E_NOTICE);
require('../conex.php');                            
$campo_ordenar = " ORDER BY nombre desc";
if(isset($_POST['orden'])){
if($_POST['orden'] == "id"){
 $campo_ordenar = " ORDER BY nombre asc";
}else{
 $campo_ordenar = " ORDER BY ".$_POST['orden'];
  //$campo_ordenar.=" desc";
}
}
if(isset($_POST['h_largo_pagina'])){
$h_largo_pagina= $_POST['h_largo_pagina'];
$mensaje="Visualizacion de ".$h_largo_pagina." Registro(s) por pagina.";

}
if(isset($_POST['h_seleccinarPagina'])){ 
	$h_seleccinarPagina = $_POST['h_seleccinarPagina']; 
}else{ $h_seleccinarPagina='0'; }
$inicial = $h_seleccinarPagina * $h_largo_pagina; 

?>
<script language="javascript">
function hector(){ 
var form = document.forms['pro']; 
form.submit(); return; 
}
function hectorweb(){			
var form = document.forms['add'];
if (form.nombre.value == ""){
alert ("Por favor introduzca el nombre");	form.nombre.focus(); return;
}if (form.numid.value == ""){
alert ("Por favor introduzca el Nº de Identidad");	form.numid.focus(); return;
}else{ form.submit(); return; } }
function seleccion(){			
var form = document.forms['resultado_consulta'];
if (form.accion.value == ""){
   alert ("Por favor seleccione una operación a realizar");
   form.accion.focus();	return;
}else{
	form.submit();
	return;
}}
function envio(formulario){ 
var form = document.forms[formulario]; 
form.submit(); return; 
}
//-->
</script><table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#E0EBF1">
<tr>
    <td width="7%" align="right"><div align="center"><img src="images/indicadores.jpg" width="54" height="45"></div></td>
    <td width="93%" valign="middle">&nbsp; <strong><font color="#000033" size="3" face="Verdana, Arial, Helvetica, sans-serif">TERCEROS</font></strong></td>
 </tr>
</table>

<table width="100%"  border="0" bgcolor="#FFFFFF">
  <tr>
    <td width="83%" valign="top"><hr size="1">
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">
              <table border="0" width="100%">
                <tr>
                  <td width="67%"><fieldset><legend><font size="2" face="Arial, Helvetica, sans-serif" color="#0033CC"><strong>Busqueda Rapida</strong></font></legend>
                    <table width="485"  border="0" cellspacing="3" cellpadding="0">
                   <form name="form1" method="post" action="admin.php"> <tr>
                      <td width="17%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Buscar por:</font> </strong></td>
                      <td width="31%"><font size="2" face="Arial, Helvetica, sans-serif"><input name="tipobus" type="radio" value="id_cliente">
                        Cedula 
                        <input name="tipobus" type="radio" value="nombre" checked>
                        Nombre</font></td>
                      <td width="8%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Dato:</font></strong></td>
                      <td width="30%"><input type="text" name="campo" style="width:100%"></td>
                      <td width="14%"><input type="submit" name="datobusq" value=" Buscar "></td>
                    </tr> <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"></form>
                  </table>
                  </fieldset></td>
                  <td width="33%">
                    <table width="107" border="0" cellspacing="0" cellpadding="0" align="right">
                      <form name="numRegistrosVer" method="post" action="admin.php">
                        <tr>
                          <td width="53" align="right"><label style="vertical-align: middle; font-family: Arial; font-size: 9pt; color: #034167; font-weight: bold; font-style: normal;">Mostrar:&nbsp;&nbsp; </label>
                          </td>
                          <td width="111">
                            <?php if(isset($_POST['h_txtSearch'])){ ?>
                            <input name="h_txtSearch" type="hidden" value="<?php echo $_POST['h_txtSearch']; ?>" />
                            <?php }?>
                           <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="tipo_cla" value="<?php echo $_REQUEST['tipo_cla']; ?>">
                            <select name="h_largo_pagina" onchange="javascript:form.submit()" language="javascript" id="ddlPageSize" align="center" style="width:50px;">
                              <OPTION value="10" <?php  if($h_largo_pagina==10){ echo "selected"; } ?>>10</OPTION>
                              <option value="25" <?php  if($h_largo_pagina==25){ echo "selected"; } ?>>25</option>
                              <option value="50" <?php  if($h_largo_pagina==50){ echo "selected"; } ?>>50</option>
                              <option value="100" <?php  if($h_largo_pagina==100){ echo "selected"; } ?>>100</option>
                          </select></td>
                        </tr>
                      </form>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div align="center"></div>                    <script> <!-- // Need to add CHECKIT or some attribute that you pass as pass.checkname to every checkbox that you want checked with this script
function goCheck(mastercheck){
var aform = document.forms['resultado_consulta'];  
var theChecks = aform.elements;
var whatAction = mastercheck.checked;
//alert(aform.name);
if (theChecks.length){
	for (r=0; r < theChecks.length; r++){
		if (aform.elements[r].getAttribute && aform.elements[r].getAttribute("CHECKIT") != null) {
			aform.elements[r].checked = whatAction;
		}
	}
}
else return false;
}
                    </script>
                    <table width="100%" border="0" align="center" bordercolor="black">
                      <tr bgcolor="#0099CC" valign="middle">
                        <form action="admin.php" method="post">
                          <th><input onClick="goCheck(this);" type="checkbox" name="mastercheck" /></th>
                        </form>
                        <th><font face="Arial" size="2" color="#FFFFFF">
                          <input type="hidden" name="h_largo_pagina2" value="<?php echo $h_largo_pagina; ?>" />
                          <input type="hidden" name="tipo_cla2" value="<?php echo $_REQUEST['tipo_cla']; ?>" />
                        Nombre</font></th>
                        <th colspan="2"><font face="Arial" size="2" color="#FFFFFF">Nº Identificacion</font></th>
                        <th><font face="Arial" size="2" color="#FFFFFF">Telefono Fijo</font></th>
                        <th><font face="Arial" size="2" color="#FFFFFF">Telefono Celular</font></th>
                        <form name="orderByCol_4" action="admin.php" method="post"> <th>
                           <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="h_largo_pagina" value="<?php echo $h_largo_pagina; ?>">
                            <input type="hidden" name="orden" value="fecha">
                            <font face="Arial" size="2" color="#FFFFFF">Correo Electronico</font>
                                                       
                        </th>
                        </form>
                      </tr>
                      <form action="admin.php" method="post" name="resultado_consulta">
                        <?php
//////
$limit=" LIMIT ".$inicial.",".$h_largo_pagina;
if(!isset($_REQUEST['datobusq'])){
$consulta="SELECT * FROM terceros".$campo_ordenar;
}else{
$dato=$_REQUEST['campo'];
$tipo=$_REQUEST['tipobus']; if($tipo=="numid"){ $dato=trim($dato); }
$consulta="SELECT * FROM terceros WHERE ".$tipo." LIKE '%".$dato."%'";
}
//echo $consulta;
$resultado2=$con->query($consulta) or die ("error buscando id cliente");  
$total_records = mysqli_num_rows($resultado2);
$numPages=intval($total_records / $h_largo_pagina);
if($total_records % $h_largo_pagina !=0){ $numPages=$numPages+1; }
////
$sw2=0;
$sw=1;
$cont=0;
$consulta = $consulta.$limit;
$resultado = $con->query($consulta);
	while($rows = mysqli_fetch_array($resultado)){
$botto=1;
		extract($rows);
$cont=$cont+1;
?>
                        <tr valign=top <?php if ($sw==0){echo "bgColor=#FFFFFF"; $sw=1;} else{echo "bgColor=#eeeee0"; $sw=0;} ?>>
                          <td width="2%" align="center"><input type=checkbox name="check_select[]" value="<?php echo $id_cliente;  ?>" checkit /></td>
                    
                          <td width="25%" align="center"><div align="left"><font color="#003366" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                            <?php echo $nombre; ?>
                          </font></div></td>
                          <td width="20%" colspan="2" align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>
                            <?php echo $id_cliente; ?>
                          </b></font></td>
                          <td width="13%" align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $telefono_fijo;  ?></font></td>
                          <td width="13%" align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $telefono_movil;  ?></font></td>
                          <td width="27%" align="center"><div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $email; ?></font></div></td>
                        </tr>
                        <?php } ?>
                        <tr valign=top>
                          <td height="18" align="left" valign="middle">&nbsp;&nbsp;</td>
                          <td  align="left" valign="middle" bordercolor="#000000" bgcolor="#0099CC"><div align="center"><a href="crearterceros.php" target="procesar"><strong><font color="#000000">Registrar Terceros</font></strong></a></div>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                          <td></td>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                          <td height="18" align="left" valign="middle">&nbsp;</td>
                        </tr>
                        <tr valign=top>
                          <td></td>
                        </tr>
                      </form>
<tr valign=top bgcolor="#EFEFEF">
                        <td colspan="10" align="left" valign="middle">
                          <?php if($cont==0) { ?>
                          <font face="Arial, Helvetica, sans-serif" size="2" color="#990000"><b>NO HAY REGISTRO EN EL SISTEMA CON ESTA BUSQUEDA.</b></font>
                          <?php }else{ ?>
                          <table width="10%" border="0" align="right">
                            <tr>
                              <form name="btn1stBlock" method="post" action="admin.php">
                                <td width="65%" valign="middle">
                                 <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="h_largo_pagina" value="<?php echo $h_largo_pagina; ?>">
                                  <input name="navegarPage" type="hidden" value="primera" />
                                  <input name="h_seleccinarPagina" type="hidden" value="<?php if(isset($h_seleccinarPagina)) echo 0;   ?>" />
                                  <input type="image" name="btn1stBlock" id="btn1stBlock2"   <?php if($h_seleccinarPagina==0){ echo "disabled=disabled";   echo " style='cursor: default; cursor:hand; cursor: default; cursor:hand; cursor: default;'"; }else{ echo " style='cursor:hand; cursor: default; cursor:hand; cursor: default; cursor:hand;'"; } ?>  title="First Page of Accounts" hsrc="<?php if(isset($hsrcPrimeraPagina)) echo $hsrcPrimeraPagina; ?>" src="<?php if($h_seleccinarPagina==0){ echo $hsrcPrimeraPagina; }else{ echo $srcPrimeraPagina; } ?>" alt="" align="middle" border="0"  /></td>
                              </form>
                              <form name="btnPrevBlock" method="post" action="admin.php">
                                <td width="6%" valign="middle">
                                  <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="h_largo_pagina" value="<?php echo $h_largo_pagina; ?>">
                                  <input name="h_seleccinarPagina" type="hidden" value="<?php if(isset($h_seleccinarPagina)) { if($h_seleccinarPagina>0){ echo $h_seleccinarPagina-1;}else{ echo 0;/*Disable */ }   }  ?>" />
                                  <input name="navegarPage2" type="hidden" value="Anterior" />
                                  <input type="image" name="btnPrevBlock" id="btnPrevBlock3" <?php if($h_seleccinarPagina==0){ echo "disabled=disabled";   echo " style='cursor: default; cursor:hand; cursor: default; cursor:hand; cursor: default;'"; }else{ echo " style='cursor:hand; cursor: default; cursor:hand; cursor: default; cursor:hand;'"; } ?>  title="Previous Page of Accounts" hsrc="<?php if(isset($hsrcAnteriorPagina)) echo $hsrcAnteriorPagina; ?>" src="<?php if($h_seleccinarPagina==0){ echo $hsrcAnteriorPagina; }else{ echo $srcAnteriorPagina; } ?>" alt="" align="middle" border="0" />                                </td>
                              </form>
                              <form name="combo_paginador" method="post" action="admin.php">
                                <td width="11%" valign="middle">
                                  <?php $numPages=$numPages-1; ?>
                                 <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="h_largo_pagina" value="<?php echo $h_largo_pagina; ?>">
                                  <select name="h_seleccinarPagina" onchange="javascript:form.submit()" language="javascript" id="select3" style="width:70px;">
                                    <option value="0" <?php   if($h_seleccinarPagina==0){ echo "selected"; } ?> >
                                    <?php if($h_largo_pagina<=$total_records){ echo "1-"; echo $var=1*$h_largo_pagina;  }else{ echo "1-"; echo $total_records; }   ?>
                                    </option>
                                    <?php   for($p=1;$p<=$numPages;$p++){  ?>
                                    <option <?php if($h_seleccinarPagina==$p){ echo "selected"; } ?> value="<?php echo $p; ?>" >
                                    <?php if(($h_largo_pagina*($p+1))<=$total_records){  echo $var=$var+1;  echo "-"; echo $var=$h_largo_pagina*($p+1); }else{ echo $var=$var+1; echo "-"; echo $total_records; }  ?>
                                    </option>
                                    <?php }  ?>
                                  </select>                                </td>
                              </form>
                              <form name="btnNextBlock" method="post" action="admin.php">
                                <td width="13%" valign="middle">
                                 <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="h_largo_pagina" value="<?php echo $h_largo_pagina; ?>">
                                  <input name="navegarPage" type="hidden" value="Siguiente" />
                                  <input name="h_seleccinarPagina" type="hidden" value="<?php if(isset($h_seleccinarPagina)) { if($h_seleccinarPagina<$numPages){ echo $h_seleccinarPagina+1;}else{ echo $numPages; /*Disable */ }   }   ?>" />
                                  <input type="image" name="btnNextBlock" <?php if($h_seleccinarPagina==$numPages){ echo "disabled=disabled";   echo " style='cursor: default; cursor:hand; cursor: default; cursor:hand; cursor: default;'"; }else{ echo " style='cursor:hand; cursor: default; cursor:hand; cursor: default; cursor:hand;'"; } ?> id="btnNextBlock" title="Next Page of Accounts" hsrc="<?php if(isset($hsrcSiguientPagina)) echo $hsrcSiguientPagina; ?>" src="<?php if($h_seleccinarPagina==$numPages){ echo $hsrcSiguientPagina; }else{ echo $srcSiguientPagina; } ?>" alt="" align="middle" border="0"  />                                </td>
                              </form>
                              <form name="btnLastBlock" method="post" action="admin.php">
                                <td width="5%" valign="middle">
                               <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="pass" value="<?php echo $pass; ?>">
						<input type="hidden" name="op" value="1"><input type="hidden" name="h_largo_pagina" value="<?php echo $h_largo_pagina; ?>">
                                  <input name="h_seleccinarPagina" type="hidden" value="<?php if(isset($h_seleccinarPagina)) echo $numPages;   ?>" />
                                  <input name="navegarPage" type="hidden" value="fin" />
                                  <input type="image" name="btnLastBlock"  id="btnLastBlock" title="Last Page of Accounts" hsrc="<?php if(isset($hsrcUltimaPagina)) echo $hsrcUltimaPagina; ?>" src="<?php if($h_seleccinarPagina==$numPages){ echo $hsrcUltimaPagina; }else{ echo $srcUltimaPagina; } ?>" align="middle" border="0" <?php if($h_seleccinarPagina==$numPages){ echo "disabled=disabled";  echo " style='cursor: default; cursor:hand; cursor: default; cursor:hand; cursor: default;'"; }else{ echo " style='cursor:hand; cursor: default; cursor:hand; cursor: default; cursor:hand;'"; } ?>  />                                </td>
                              </form>
                            </tr>
                          </table>
                          <?php } ?></td>
                      </tr>
                    </table></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
</table>