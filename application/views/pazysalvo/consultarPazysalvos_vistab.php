<?php
error_reporting(E_ALL & ~E_NOTICE);
require('config2.php');                             
?>
                    <table width="100%" border="0" align="center" bordercolor="black">
					<form method="post">
                      <tr bgcolor="#0099CC" valign="middle">
                        <th>&nbsp;</th>
                        <th colspan="2"><input type="text" name="campo" style="width:100%"></th>
                        <th><input type="submit" name="datobusq" value=" Buscar "></th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                      <tr bgcolor="#ffffff" valign="middle">
                        <th colspan="7">&nbsp;</th>
                      <tr bgcolor="#0099CC" valign="middle">
                        <th><font color="#FFFFFF" size="2" face="Arial">Contrato</font></th>
                        <th><font color="#FFFFFF" size="2" face="Arial">Fecha</font></th>
                        <th><font color="#FFFFFF" size="2" face="Arial">Identificacion</font></th>
                        <th><font face="Arial" size="2" color="#FFFFFF">
                          Nombres y Apellidos</font></th>
                       <th width="6%">
                          <div align="left">
                           <font face="Arial" size="2" color="#FFFFFF">Empresa</font>                           </div></th>
                          <th width="3%"><font color="#FFFFFF" size="2" face="Arial">Act</font></th>
                          <?php if($_SESSION["user"] == 'miriam'){?><th width="3%"><font color="#FFFFFF" size="2" face="Arial">Apro</font></th>
                          <?php } ?>
                   
                        <?php
if(isset($_REQUEST['campo'])){
$dato=$_REQUEST['campo'];
$consulta="SELECT id_pazysalvo, numero,d,id_persona,c, a, f FROM bre_pazysalvo
				     WHERE estado = '1' AND (id_persona LIKE '%".$dato."%' OR c  LIKE '%".$dato."%' OR numero  LIKE '%".$dato."%') ";
					 echo $consulta;
//echo $consulta;
$resultado = mysql_query($consulta);

	while($rows = mysql_fetch_array($resultado)){
		extract($rows);
?>
                        <tr valign=top <?php if ($sw==0){echo "bgColor=#FFFFFF"; $sw=1;} else{echo "bgColor=#eeeee0"; $sw=0;} ?>>
                          <td width="12%" align="center"><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $numero; ?></font></td>
                          <td width="8%" align="center"><div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $d; ?></font></div></td>
                          <td width="32%" align="center"><div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $id_persona; ?></font></div></td>
                          <td align="center"><div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $c; ?></font></div></td>
                          <td align="center"><div align="left"><font color="#003366" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $f; ?></font></div></td>
                          <?php if($_SESSION["user"] == 'miriam'){ ?><td align="center"><a href="#" onClick="MM_openBrWindow('aprobar.php?id_pazysalvo=<?php echo $numero; ?>','','scrollbars=yes')"><img src="images/actualizar.gif" border="0" alt="DETALLADO"></a></td><?php } ?>
						  <td></td>
                        </tr>
                        <?php } ?>
                      </form>
                    </table>
                    </td>
                </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
</table>
<?php 
mysql_close();
}else{echo "Por Favor escriba expresion y dele en buscar";} ?>