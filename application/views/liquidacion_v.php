<?php
include('config2.php');
	
//$conectID = mssql_connect("localhost","SA","asapaseco"); 

//$qcesantias = "SELECT liquidacion, oficio, fecini, fecfin, Codigo FROM contrato WHERE trim(numid) = '$_SESSION[usuario]' AND liquidacion != 'pagada'";

$qcesantias = "select numid, nombre, oficio, fecini, fecfin, Codigo, liquidacion, bre_pazysalvo.familia FROM contrato, bre_pazysalvo WHERE trim(id_persona) = '".$this->session->userdata('user')."' AND contrato.familia = bre_pazysalvo.familia and contrato.codigo = bre_pazysalvo.numero and (liquidacion = 'pendiente' or liquidacion = 'lista' or liquidacion = 'pagada')";

$rcesantias = mysql_query($qcesantias) or die (mysql_error()."Error consultando contrato.");
$cant = mysql_num_rows($rcesantias);
if ($cant > 0){
  $rowfcesantias= mysql_fetch_array($rcesantias);
  extract($rowfcesantias);
if($liquidacion == 'pendiente'){

$sql = "SELECT * FROM bre_pazysalvo WHERE trim(numero) = '$Codigo' and familia='$familia'";

$rsql = mysql_query($sql);
$rows = mysql_fetch_array($rsql);
extract ($rows);

?>
<table width="700" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#0099FF">
  <tr>
    <td height=""><table width="700" border="0" align="center">
      
      <tr>
        <td colspan="2" bgcolor="#0099FF" class="Estilo8"><p align="justify">LE INFORMAMOS QUE EL PAGO DE SU LIQUIDACION DEL CONTRATO CUYO OFICIO ERA <?php echo $oficio;?> QUE INICIO EL <?php echo $fecini; ?> Y FINALIZO EL <?php echo $fecfin; ?> ESTA SIENDO PROCESADA PARA SU PRONTO PAGO. </p>          </td>
      </tr>
      <tr>
        <td width="69"><img src="../images/ver.png" alt="1" width="60" height="60" class="decoded shrinkToFit" /></td>
        <td width="627"><p>LE RECORDAMOS QUE DEBE ESTAR A PAZ Y SALVO CON LA EMPRESA POR TODO CONCEPTO PARA EL PAGO DE LA MISMA. </p>          </td>
      </tr>
      
      <?php
	 
?>
    </table></td>
  </tr>
</table>
<?php
exit();
 }
 if($liquidacion == 'lista'){?>
<br />
<table width="700" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#0099FF">
  <tr>
    <td><table width="700">
      <tr>
        <td><img src="../images/ver.png" alt="1" width="200" height="100" class="decoded shrinkToFit" /></td>
        <td>POR FAVOR ACERCARSE A NUESTRAS OFICINAS A FIRMAR SU LIQUIDACION DEL CONTRATO CUYO OFICIO ERA <?php echo $oficio;?> QUE INICIO EL <?php echo $fecini; ?> Y FINALIZO EL <?php echo $fecfin; ?> PARA PROCEDER AL PAGO. SI YA SE ACERCO ESPERE MENSAJE DE COMFIRMACION DE PAGO. </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php exit(); }
if($liquidacion == 'pagada'){?>
<br />
<table width="700" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#0099FF">
  <tr>
    <td><table width="700">
      <tr>
        <td><img src="../images/peso.jpg" alt="1" width="200" height="100" class="decoded shrinkToFit" /></td>
        <td>LE INFORMAMOS QUE EL PAGO DE SU LIQUIDACION DEL CONTRATO CUYO OFICIO ERA <?php echo $oficio;?> QUE INICIO EL <?php echo $fecini; ?> Y FINALIZO EL <?php echo $fecfin; ?> HA SIDO PAGADA</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php exit(); }
} 
echo "NO TIENE PROCESO DE LIQUIDACION EN EL MOMENTO";
 ?>