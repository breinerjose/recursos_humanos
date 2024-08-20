<?php 
include('conex.php');
$no='';
$IDEN_DevengoDcto=$_GET['IDEN_DevengoDcto'];
$familia=$_GET['familia'];
$FechaInicio=$_GET['FechaInicio'];
$FechaFinal=$_GET['FechaFinal'];
$nomcia=$_GET['nomcia'];
$nitcia=$_GET['nitcia'];

$queryno = "select id from conceptos where familia = '$familia'";
$selectno = $con->query($queryno) or die (mysql_error()."Error consulta por no.");
while($rowno= mysqli_fetch_array($selectno)){
extract($rowno);
$no = $no." Nm_DevengosDctosConceptos.IDEN_Concepto != ".$id." AND ";
}

$conexsql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");

$query = "SELECT     IDEN_DevengoDcto, IDEN_Periodo, IDEN_Concepto, IDEN_Contrato
FROM         Nm_DevengosDctosConceptos, Nm_Contrato,Nm_Empleado, Nm_Periodo
WHERE     (Nm_Empleado.IDEN = Nm_Contrato.IDEN_Empleado AND Nm_DevengosDctosConceptos.IDEN_Contrato = Nm_Contrato.IDEN AND Nm_DevengosDctosConceptos.IDEN_Periodo = Nm_Periodo.IDEN AND IDEN_DevengoDcto = $IDEN_DevengoDcto )
GROUP BY IDEN_DevengoDcto, IDEN_Periodo, IDEN_Concepto, IDEN_Contrato"; 

$result = $conexsql->query($query) or die ("Error consulta por nombres.25");
$row= $result->fetchAll();
$IDEN_DevengoDcto=$row[0][0];
$IDEN_Periodo=$row[0][1];
$IDEN_Concepto=$row[0][2];
$IDEN_Contrato=$row[0][3];

$query2 = "SELECT     Nm_Contrato.Codigo, Nm_Contrato.IDEN_Cargo, Nm_Contrato.CentroCosto, Nm_Contrato.IDEN_FSalud, Nm_Contrato.IDEN_Fpension, Nm_Contrato.SueldoBasico, Nm_Empleado.Identificacion, Nm_Empleado.Nombres, Nm_Empleado.Direccion
FROM         Nm_Contrato,Nm_Empleado
WHERE     (Nm_Contrato.IDEN_Empleado = Nm_Empleado.IDEN AND Nm_Contrato.IDEN = $IDEN_Contrato )"; 

$result2 = $conexsql->query($query2) or die ("Error consulta por nombres.32");
$row2= $result2->fetchAll();
$Codigo=$row2[0][0];
$IDEN_Cargo=$row2[0][1];
$CentroCosto=$row2[0][2];
$IDEN_FSalud=$row2[0][3];
$IDEN_Fpension=$row2[0][4];
$SueldoBasico=$row2[0][5];
$Identificacion=$row2[0][6];
$Nombres=$row2[0][7];
$Direccion=$row2[0][8];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprobantes de Pago</title>
<link href="recibo nomina/Impresion de Recibo/CSS/estilo.css" rel="stylesheet" type="text/css"/>
<link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="recibo nomina/Impresion de Recibo/CSS/luna/tab.css" disabled />
<link id="webfx-tab-style-sheet" type="text/css" rel="stylesheet" href="recibo nomina/Impresion de Recibo/CSS/tab.webfx.css" disabled />
<link id="winclassic-tab-style-sheet" type="text/css" rel="stylesheet" href="recibo nomina/Impresion de Recibo/CSS/tab.winclassic.css"  disabled="disabled" />
<style>
  .printx {page-break-after:always}
</style> 
</head>
<body>
<table width="900" border="0">
<form id="formulario" name="formulario" method="post" action="recibo nomina/Impresion de Recibo/recibopago.php">
  <tr>
    <td>
    <fieldset>
    <table width="100%" border=0 cellspacing=0 cellpadding=0 bordercolor="666633">
      <legend></legend>
      <tr>
        <td colspan="4" align="center"><?php echo $nomcia; ?></td>
        </tr>
      <tr>
        <td colspan="4" align="center">NIT. <?php echo $nitcia; ?></td>
        </tr>
      <tr>
        <td colspan="4" align="center">Recibo de Pago</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="92">Empleado:</td>
        <td width="475"><?php echo $Identificacion." ".$Nombres; ?></td>
        <td width="97">Contrato:</td>
        <td width="228"><?php echo $Codigo; ?></td>
      </tr>
      <tr>
        <td>Dirección:</td>
        <td><?php echo $Direccion; ?></td>
        <td>Periodo:</td>
        <td><?php echo substr($FechaInicio, 0, 11)." // ".substr($FechaFinal, 0, 11);  ?></td>
        </tr>
      <tr>
        <td height="27">Centro Costo:</td>
        <td>&nbsp;<?php echo $CentroCosto; ?></td>
        <td>Basico Neto:</td>
        <td><?php echo $SueldoBasico; ?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Cargo:</td>
        <td><?php
		$query3 = "SELECT Codigo, Nombre FROM Nm_cargo WHERE (IDEN = $IDEN_Cargo)"; 
		$result3 = $conexsql->query($query3) or die ("Error consultar Fecha Periodo.");
		$row3= $result3->fetchAll();
		echo $row3[0][0]." ".$row3[0][1]; ?></td>
      </tr>
      </table>
    </fieldset>
   
    </td>
  </tr>
  <tr>
    <td width="527">
      <fieldset>
        <table width="100%" border="0">
          <tr>
            <td colspan="7">DEVENGOS</td>
            </tr>
          <tr>
            <td width="50">Codigo</td>
            <td width="276">Descripción del Concepto</td>
            <td width="55">Cantidad</td>
            <td width="154">Devengos</td>
            <td width="145">Descuentos</td>
            <td width="83">Saldo</td>
            <td width="99"><div align="right">Acumulado</div></td>
            </tr><?php
$totaldev=0;		
$query4 = "SELECT Nm_Concepto.Codigo AS Codigo, Nm_Concepto.Nombre AS Nombre, SUM(Nm_DevengosDctosConceptos.Total) AS Total, SUM(Nm_DevengosDctosConceptos.Cantidad) AS Cantidad
FROM Nm_DevengosDctosConceptos, Nm_Concepto 
WHERE $no
Total > 0 AND 
Nm_DevengosDctosConceptos.IDEN_Concepto = Nm_Concepto.Id 
AND IDEN_DevengoDcto = $IDEN_DevengoDcto 
AND Nm_Concepto.Tipo = 0 
AND Nm_DevengosDctosConceptos.IDEN_Vacaciones  is null
AND Nm_DevengosDctosConceptos.IDEN_Concepto = Nm_Concepto.Id 
GROUP BY Nm_Concepto.Codigo, Nm_Concepto.Nombre 
ORDER BY Nm_Concepto.Codigo"; 

foreach($conexsql->query($query4) as $row4){
extract($row4);
?>
          <tr>
            <td><?php echo $Codigo; ?></td>
            <td><?php echo $Nombre; ?></td>
            <td><?php  echo round($Cantidad,0); ?></td>
            <td><?php echo '$'.number_format(ROUND($Total,0)); $totaldev=$totaldev+ROUND($Total,0); ?></td>
            <td>$0</td>
            <td>&nbsp;</td>
            <td><div align="right"></div></td>
            </tr>
          <?php } ?>
          <tr>
          <?php
$totalded=0;		
$query4 = "SELECT     Nm_Concepto.Codigo AS Codigo, Nm_Concepto.Nombre AS Nombre, Nm_DevengosDctosConceptos.Total AS Total, Cantidad
FROM         Nm_DevengosDctosConceptos, Nm_Concepto
WHERE     Nm_DevengosDctosConceptos.IDEN_Concepto = Nm_Concepto.Id AND IDEN_DevengoDcto = $IDEN_DevengoDcto AND Nm_Concepto.Tipo = 1 ORDER BY Nm_Concepto.Codigo"; 

foreach($conexsql->query($query4) as $row4){
extract($row4);
?>
          <tr>
            <td><?php echo $Codigo; ?></td>
            <td><?php echo $Nombre; ?></td>
            <td><?php  echo round($Cantidad,0); ?></td>
            <td>$0</td>
            <td><?php echo '$'.number_format(ROUND($Total,0)*-1); $totalded=$totalded+ROUND($Total,0); ?></td>
            <td>&nbsp;</td>
            <td><div align="right"></div></td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="3">Totales:</td>
            <td><?php echo '$'.number_format($totaldev); ?></td>
            <td><?php echo '$'.number_format($totalded*-1); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td colspan="7">Neto a Pagar: <?php echo '$'.number_format($totaldev+$totalded); ?></td>
            </tr>
          </table>
        </fieldset>
    </td>
    </tr>
  <tr>
    <td>
      <fieldset>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="bottom">
              <p>___________________________________________________</p>
<p>Firma Empleado</p></td>
            <td width="393" align="right" valign="bottom">
              <P>Impresora El : <?php echo date("Y-m-d"); ?></p>
              </td>
          </tr>
          <tr>
        <td colspan="4" align="center">Nota: Usted esta recibiendo su pago
Tiene un plazo de 3 dias para acercarse a la oficina administrativa a aclarar cualquier inconformidad, de lo contrario se entendera que es satisfactorio su pago</td>
        </tr>
      <tr>
          </table>
        </fieldset>
      </td>
  </tr>

 </form> 
</table>
</body>
</html>
