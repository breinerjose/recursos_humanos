<?php
include('conex.php');

$qfamilias = "SELECT * FROM familias WHERE estado = '0'";
$rfamilias = $con->query($qfamilias) or die ("Error consultando familias.");

while($rowf= mysqli_fetch_array($rfamilias)){
extract($rowf);
$conexsql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");

$sqlcon = "SELECT     IDEN_DevengoDcto, IDEN_Periodo
FROM         Nm_DevengosDctosConceptos, Nm_Contrato,Nm_Empleado, Nm_Periodo
WHERE     (Nm_DevengosDctosConceptos.IDEN_Pago > 0 AND Nm_Empleado.IDEN = Nm_Contrato.IDEN_Empleado AND Nm_DevengosDctosConceptos.IDEN_Contrato = Nm_Contrato.IDEN AND Nm_DevengosDctosConceptos.IDEN_Periodo = Nm_Periodo.IDEN AND Identificacion = '".$this->session->userdata('user')."' ) 
GROUP BY IDEN_DevengoDcto, IDEN_Periodo ORDER BY IDEN_Periodo DESC"; 

$result = $conexsql->query($sqlcon) or die ("Error consultando sql server");

$cant =  $result->rowCount();
//$cant = mssql_num_rows($result);
//echo $cant."***";
if($cant != 0){
$filas = $result->fetchAll();

		
?>
</p>
<p>
  <script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
  </script>
  <style type="text/css">
<!--
.Estilo4 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color:#FF0000;
}
.Estilo5 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo6 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Estilo7 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.Estilo8 {color: #FFFFFF}
-->
  </style>
<table width="700" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#0099FF">
  <tr>
    <td colspan="4" align="center" valign="middle" bgcolor="#0099FF"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF">PERIODOS - Seleccione del Lado Derecho Para Ver El Volante</font></td>
  </tr>
  <tr>
    <td>Fecha Inicio</td>
    <td>Fecha Final</td>
    <td>Compa&#241;ia</td>
    <td>Ver Volante</td>
  </tr>
  <?php 
  		foreach ($filas as $row){
		extract($row); 
		
$query2 = "SELECT     FechaInicio, FechaFinal
FROM         Nm_Periodo
WHERE     (IDEN = $IDEN_Periodo)"; 


//$result2 = mssql_query($query2) or die ("Error consultar Fecha Periodo.");
$result2 = $conexsql->query($query2) or die ("Error consultando sql server 115");
//$row2= mssql_fetch_array($result2);
$filas2 = $result2->fetchAll();
foreach($filas2 as $rows2){
extract ($rows2);
}

		?>
  <tr>
    <td width="291"><?php echo substr($FechaInicio, 0, 11); ?></td>
    <td width="292"><?php echo substr($FechaFinal, 0, 11) ; ?></td>
    <td width="185"><?php echo $nomcia; ?></td>
    <td width="122" align="center"><a href="#" onClick="MM_openBrWindow('vista/printrecibopago.php?IDEN_DevengoDcto=<?php echo $IDEN_DevengoDcto; ?>&familia=<?php echo $familia; ?>&FechaInicio=<?php echo $FechaInicio; ?>&FechaFinal=<?php echo $FechaFinal; ?>&nomcia=<?php echo $nomcia; ?>&nitcia=<?php echo $nitcia; ?>','','scrollbars=yes')"><img src="../images/iconos/i_new_msg.gif" border="0" alt="DETALLADO"></a></td>
  </tr>
  <?php } ?>
</table>
<p>
  <?php } }

if (isset($_POST['informe'])){
$nueva = $_REQUEST['nueva'];
$sqlup = "UPDATE usuarios set pass='$nueva' WHERE user='".$this->session->userdata('user')."'";
$ok = $con->query($sqlup) or die ("Error Actualizando Clave.");
echo "Clave Actualizada Correctamente";
$_SESSION['pass'] = $nueva;
}  
if ($this->session->userdata('user') == $this->session->userdata('pass') ){
   ?>
<p align="center" class="Estilo7">PARA MAYOR SEURIDAD EN TU INFORMACION TE RECOMENDAMOS CAMBIAR LA CLAVE </p>
<table width="500" border="0" align="center"  bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <form action="" method="post"  name="datos" id="datos">
    <tr bgcolor="#0099CC">
      <td height="24" colspan="3"><div align="center" class="Estilo5">CAMBIO DE CLAVE </div></td>
    </tr>
    <tr>
      <td height="24" colspan="3"><span class="Estilo1">..</span></td>
    </tr>
    
    <tr>
      <td width="194" height="24"><span class="Estilo6">&nbsp;&nbsp;CLAVE NUEVA </span></td>
      <td width="296" colspan="2" class="Estilo4" ><input name="nueva" type="text" id="nueva" size="40" /></td>
    </tr>
    <tr>
      <td  colspan="3"><span class="Estilo1">..</span></td>
    </tr>
    <tr>
      <td  colspan="3"><div align="center">
        <input name="informe" type="submit" id="informe" value="Cambiar" />
      </div></td>
    </tr>
    <tr>
      <td colspan="3" height="5" bgcolor="#0099CC"></td>
    </tr>
  </form>
</table>
<?php } ?>