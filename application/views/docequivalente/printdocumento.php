<?php
require('conex.php');  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!-- 

.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px;
	cursor: pointer;}
.Estilo10 {font-size: 16px}
-->
</style>

<script type="text/javascript" src="js/calendario.js"></script>
<?php 

$this->db->select('*');
$this->db->from('cuentas');
$this->db->where('id',$id);
$res = $this->db->get();
$res = $res->row_array();
extract($res);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DUCUMENTO EQUIVALENTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">
<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body topmargin="0" leftmargin="0">
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
<form id="formulario" name="formulario" method="post" action="printdocumento.php">
  <tr>
    <td><table width="700" align="center" cellpadding="0" cellspacing="0">
     <tr height="17">
       <td width="312" height="17" class="Estilo10">&nbsp;</td>
       <td height="17" class="Estilo10">&nbsp;</td>
       <td height="17" class="Estilo10">&nbsp;</td>
     </tr>
     <tr height="17">
    <td height="17" class="Estilo10"><div align="left" class="Estilo10">DOCUMENTO EQUIVALENTE </div></td>
    <td height="17" class="Estilo10"><?php echo $docquiv; ?></td>
    <td height="17" class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">FECHA</td>
    <td width="287" class="Estilo10"><?php echo $fecha; ?></td>
    <td width="99" class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10"></td>
    <td class="Estilo10"></td>
    <td class="Estilo10"></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10"></td>
    <td class="Estilo10"></td>
    <td class="Estilo10"></td>
  </tr>
  
  <tr height="17">
    <td height="17" class="Estilo10">ADQUIRIENTE DEL BIEN O SERVICIO</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  
  <tr height="17">
    <td height="17" class="Estilo10">NOMBRE O RAZON SOCIAL</td>
    <td colspan="2" class="Estilo10"><?PHP echo utf8_encode($empresa); ?></td>
    </tr>
  <tr height="17">
    <td height="17" class="Estilo10">NIT</td>
    <td class="Estilo10"><?PHP echo $nit; ?></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
   <tr height="17">
    <td height="17" colspan="3" class="Estilo10"><?PHP echo $resolu; ?></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10"></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">BENEFICIARIO DEL PAGO</td>
    <td colspan="2" class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">NOMBRE</td>
    <td height="17" colspan="2" class="Estilo10"><?php echo utf8_encode($nombre); ?></td>
    </tr>
  <tr height="17">
    <td height="17" class="Estilo10">NIT Y/O CC</td>
    <td colspan="2" class="Estilo10"><?php echo $id_tercero; ?></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">DIRECCION</td>
    <td colspan="2" class="Estilo10"><?php echo utf8_encode($direccion); ?></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">TELEFONO</td>
    <td colspan="2" class="Estilo10"><?php echo $telefono; ?></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">CIUDAD</td>
    <td colspan="2" class="Estilo10">CARTAGENA -  BOLIVAR</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10"></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="3" class="Estilo10"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="60%">CONCEPTO</td>
        <td width="13%">CANT</td>
        <td width="13%">VR UNIT </td>
        <td width="14%">VR TOTAL </td>
      </tr>
      <tr>
        <td rowspan="2"><textarea name="CONCEPTO" cols="50" rows="5" id="CONCEPTO"><?php echo utf8_encode($concepto); ?></textarea></td>
        <td><?php echo $CANT; ?></td>
        <td><?php echo "$".number_format($vlrunit); ?></td>
        <td><?php  echo  "$".number_format($total1);?>
          <div align="center"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">TOTAL</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">
      
          <div align="left">
            <?php  echo  "$".number_format($total1);?>
            </div></td>
  </tr>
  
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10"></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="2" class="Estilo10">IVA ASUMIDO DEL VALOR DEL    BIEN O SERVICIO</td>
    <td class="Estilo10"><div align="left"><?php echo  "$".number_format($ivaa); ?></div></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">IVA RETENIDO</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10"><div align="left"><?php echo  "$".number_format($ivaa); ?></div></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10"></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">TOTAL</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10"><div align="left"><?php echo  "$".number_format($total2);?></div></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10"></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">MENOS:</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" colspan="2" class="Estilo10">RETENCION EN    LA FUENTE</td>
    <td class="Estilo10"><div align="left"><?php echo  "$".number_format($rtefue); ?></div></td>
  </tr>
  <tr height="17">
    <td height="17" colspan="2" class="Estilo10">RETENCION POR    INDUSTRIA Y COMERCIO</td>
    <td class="Estilo10"><div align="left"><?php echo  "$".number_format($rteind); ?></div></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10"></td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">NETO A PAGAR</td>
    <td class="Estilo10"></td>
    <td class="Estilo10"><?php echo  "$".number_format($neto); ?></td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">FIRMA DEL BENEFICIARIO</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">_______________________________________</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10">&nbsp;</td>
  </tr>
  <tr height="17">
    <td height="17" class="Estilo10">NIT Y/O CC</td>
    <td class="Estilo10">&nbsp;</td>
    <td class="Estilo10"><div align="left"></div></td>
  </tr>
</table></td>
  </tr>
  </form>
</table>
</body>
</html>
