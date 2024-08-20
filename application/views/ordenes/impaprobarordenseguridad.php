<?php 
include("config.php");
$b="anular";	
$a = substr($ocunum,0,6);
$mensaje="NO VALIDA -- NO VALIDA";
if($a != 'anular'){
 $consulta = "select * from ocuord where ocunum = '$ocunum'";
              $resultado = mysqli_query($conn,$consulta);
              $row = mysqli_fetch_array($resultado);
              extract($row); 
	}else{
	$ocunum = substr($ocunum,6);
	$sql_e4="UPDATE ocuord set esttem='Anulada', addapr=now(), usuapr='".$this->session->userdata('user')."' WHERE ocunum = '$ocunum'";	
	 $row = mysqli_query($conn,$sql_e4);

	$consulta = "select * from ocuord where ocunum = '$ocunum'";
              $resultado = mysqli_query($conn,$consulta);
              $row = mysqli_fetch_array($resultado);
              extract($row); 
	$mensaje = "ORDEN ANULADA -- ORDEN ANULADA";
	}
?>
<style type="text/css">
<!--
.Estilo1 {font-family: Verdana, Arial, sans-serif}
.Estilo6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 15px;
	font-weight: bold;
}
.Estilo7 {font-size: 33px}
.Estilo9 {font-family: Verdana, Arial, sans-serif; font-size: 12px; }
.Estilo10 {color: #FF0000}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
}
-->
</style>


<title><?php echo $ocunum; ?></title><table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="19%" rowspan="2"><img src="/res/images/<?php echo $ocupor; ?>.jpg" alt="ocupor" height="60" /></td>
                <td width="57%" align="center" valign="middle" class="Estilo7">ORDEN DE SERVICIO</td>
                <td width="24%"><span class="Estilo6"><?php echo $ocunum; ?></span></td>
              </tr>
              <tr>
                <td colspan="2">Nit: 800027721-3 Centro calle 35 No.8-79 Edificio CityBank Of. 13C Cartagena Colombia</td>
                </tr>
              <tr>
                <td colspan="3" align="center">Email: infol@asapaseco.com pagina web www.asapaseco.com Telefono 6600121 Ext 118</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><div align="center"><span class="Estilo10"><?php echo $mensaje; ?></div></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="Estilo1">Datos personales del Evaluado </td>
                </tr>
              <tr>
                <td width="16%"class="Estilo1"> Cedula:</td>
                <td width="84%" class="Estilo1"><?php echo $ocuced; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Nombre:</td>
                <td class="Estilo1"><?php echo $ocunom; ?>&nbsp;<?php echo $ocuape; ?></td>
              </tr>
                <tr>
                  <td class="Estilo1">Edad:</td>
                  <td class="Estilo1"><?php echo $edad; ?></td>
                </tr>
                <tr>
                <td colspan="2" class="Estilo1">Direccion: <?php echo $ocudir; ?></td>
                </tr>
               <tr>
                <td colspan="2" class="Estilo1">Telefono:&nbsp; <?php echo $ocutel; ?> Celular: <?php echo $ocucel; ?></td>
                </tr>
                   <td class="Estilo1">Cargo:</td>
                <td class="Estilo1"><?php echo $ocucar; ?></td>
              </tr>
              
              <tr>
                <td class="Estilo1">Cliente:</td>
                <td class="Estilo1"><?php echo $cliente; ?></td>
              </tr>
            </table></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="Estilo1">Datos del Proveedor:</td>
                </tr>
              <tr>
                <td width="29%" class="Estilo1">Empresa:</td>
                <td width="71%" class="Estilo1"><?php echo $oculab; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Contacto:</td>
                <td class="Estilo1"><?php echo $ocuemp; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Email:</td>
                <td class="Estilo1"><?php echo $ocuemaem; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Telefono:</td>
                <td class="Estilo1"><?php echo $ocutelem; ?></td>
              </tr>
              
              <tr>
            <tr>
                <td><span class="Estilo1">Cargar A:</span></td>
                <td><?php echo $asume; ?></td>
              </tr>
            <tr>
              <td>
<a href="/ordenes_c/vista/aprobar_orden_seguridad.php?ocunum=<?php echo $ocunum; ?>"><img src="/res/iconos/aceptar.png"/></a></td>
              <td>
<a href="../../ordenes_c/impaprobarordenseguridad/<?php echo "anular".$ocunum; ?>"><img alt="ANULAR ORDEN" src="/res/iconos/delete.png"/></a>
</td>
            </tr>
              
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="950" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td colspan="3"><div align="center"><span class="Estilo10"><?php echo $mensaje; ?></span></div></td>
        </tr>
      <tr>
        <td width="15%">Codigo  </td>
        <td width="70%">Concepto</td>
        <td width="15%"><div align="center">Valor Unitario </div></td>
      </tr>
      <?php 
	  $total=0;
	  $iva=0;
	  $sql2 = "select * from ocudetord where ordnum = '$ocunum'";
	  $res2 = mysqli_query($conn,$sql2);
 	 while($row = mysqli_fetch_array($res2)){
		 extract($row);
	  ?>
      <tr>
        <td><?php echo $codconc; ?></td>
        <td><?php echo urldecode($desconc); ?></td>
        <td><div align="center"><?php echo '$'.number_format($valconc); $total +=+$valconc; $iva += $ordlab;  ?></div></td>
      </tr>
	        <?php } ?>
            <tr>
              <td rowspan="4">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="right"><strong>SUBTOTAL</strong></div></td>
              <td><div align="center"><strong><?php echo '$'.number_format($total); ?></strong></div></td>
            </tr>
            <tr>
              <td><div align="right"><strong>I.V.A</strong></div></td>
              <td><div align="center"><strong><?php echo '$'.number_format($iva); ?></strong></div></td>
            </tr>
        <tr>
        <td><div align="right"><strong>TOTAL ORDEN</strong></div></td>
        <td><div align="center">
          <div align="center"><strong><?php echo '$'.number_format($total+$iva);  ?></strong></div>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>OBSERVACION:&nbsp;<?php echo $ocuobs;?></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
      <tr>
        <td width="37%">Elaborado por:</td>
        <td width="38%">Aprobado por:</td>
        <td width="25%">Fecha</td>
      </tr>
      <tr>
        <td><?php if($addord != ''){?><img width="150" height="50" src="/res/firmas/<?php echo $addord.".jpg";?>"/><?php } ?></td>
        <td><?php if($usuapr != ''){?><img width="150" height="50" src="/res/firmas/<?php echo $usuapr.".jpg";?>"/><?php } ?></td>
        <td>Fecha Pedido:<?php echo $ocufem; ?></td>
      </tr>
      
    </table></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" >
  <tr>
    <td><div align="center"><span class="Estilo9">Nota: La presente orden no tiene validez despues de 5 dias habiles a partir de a fecha de emision</span></div></td>
  </tr>
  <tr>
      <td>
           <div align="right" style="font-family:Arial, Helvetica, sans-serif; font-size:9px;">
           FT-HESQ-021 VER: 03<br />
           MAYO 2016
           </div>
      </td>
  </tr>
</table>
