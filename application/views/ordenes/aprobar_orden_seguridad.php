<?php
require('./conex.php'); 
$ocunum=$_GET['ocunum'];

$sql_e4="UPDATE ocuord set esttem='Aprobada', addapr=now(), usuapr='".$_SESSION["usuario"]."' WHERE ocunum = '$ocunum'";
$result_e4 = $con->query($sql_e4) or die ("error Actualizando");	

 $consulta = "select * from ocuord where ocunum = '$ocunum'";
              $resultado = $con->query($consulta);
              $row = mysqli_fetch_array($resultado);
              extract($row); 

require("class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "asapaseco.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
$mail->Username = "noresponder@asapaseco.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
$mail->Password = "F26ef4a24A..**"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
//$mail->Port = 465; // Puerto de conexión al servidor de envio. 
$mail->From = "noresponder@asapaseco.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
$mail->FromName = "AsapAseco"; //A RELLENAR Nombre a mostrar del remitente. 
$mail->AddAddress($ocuemaem); // Esta es la dirección a donde enviamos /
$mail->AddAddress('tatiana.caro@asapaseco.com');
$mail->IsHTML(true); // El correo se envía como HTML 
$mail->Subject = "Orden de Servicio"; // Este es el titulo del email. 
$body = "Cordial Saludo<br>"; 
$body .= '<style type="text/css">
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
-->
</style>
<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			 <tr>
                <td width="19%" rowspan="2"></td>
                <td width="57%" align="center" valign="middle" class="Estilo7">ORDEN DE SERVICIO</td>
                <td width="24%"><span class="Estilo6">'.$ocunum.'</span></td>
              </tr>
              <tr>';
			  if($ocupor == 'ASECO'){
                $body .= '<td colspan="2">ASECO S.A.S Nit: 800121354-3 Centro calle 35 No.8-79 Edificio CityBank Of. 13C Cartagena Colombia</td></tr>';}
				else{$body .= '<td colspan="2">ASAP S.A.S Nit: 800002721-3 Centro calle 35 No.8-79 Edificio CityBank Of. 13C Cartagena Colombia</td></tr>';}
				$body .= '<tr>
                <td colspan="3" align="center">Email: info@asapaseco.com pagina web www.asapaseco.com Telefono 6600121 Ext 118</td>
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
                <td colspan="2" class="Estilo1">Datos personales del beneficiario</td>
                </tr>
              <tr>
                <td width="16%"class="Estilo1"> Cedula:</td>
                <td width="84%" class="Estilo1">'.$ocuced.'</td>
              </tr>
			    <tr>
                <td class="Estilo1">Nombre:</td>
                <td class="Estilo1">'.$ocunom.'&nbsp;'.$ocuape.'</td>
              </tr>
                <tr>
                  <td class="Estilo1">Edad:</td>
                  <td class="Estilo1">'.$edad.'</td>
                </tr>
                <tr>
                <td colspan="2" class="Estilo1">Direccion:.'.$ocudir.'</td>
                </tr>
               <tr>
                <td colspan="2" class="Estilo1">Telefono:&nbsp; '.$ocutel.' Celular: .'.$ocucel.'</td>
                </tr>
               
			   <tr>
			    <td class="Estilo1">Cargo:</td>
                <td class="Estilo1">'.$ocucar.'</td>
              </tr>
			  
              <tr>
                <td class="Estilo1">Riesgo:</td>
                <td class="Estilo1">'.$riesgo.'</td>
              </tr>
			  
              <tr>
                <td class="Estilo1">Cliente:</td>
                <td class="Estilo1">'.$cliente.'</td>
              </tr>
			  
            </table></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="Estilo1">Datos del Proveedor:</td>
                </tr>
              <tr>
                <td width="29%" class="Estilo1">Laboratorio:</td>
                <td width="71%" class="Estilo1">'.$oculab.'</td>
              </tr>
              <tr>
                <td class="Estilo1">Contacto:</td>
                <td class="Estilo1">'.$ocuemp.'</td>
              </tr>
              <tr>
                <td class="Estilo1">Email:</td>
                <td class="Estilo1">'.$ocuemaem.'</td>
              </tr>
              <tr>
                <td class="Estilo1">Telefono:</td>
                <td class="Estilo1">'.$ocutelem.'</td>
              </tr>
              <tr>
                <td><span class="Estilo1">Eps:</span></td>
                <td>'.$ocueps.'</td>
              </tr>
              <tr>
              <td><span class="Estilo1">Tipo Contrato:</span></td>
                <td>'.$tipcon.'</td>
              </tr>
              <tr>
                <td><span class="Estilo1">Cargar A:</span></td>
                <td>'.$asume.'</td>
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
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
        <tr>
		 <td width="15%">Codigo  </td>
        <td width="65%">Concepto</td>
        <td width="20%"><div align="center">Valor Unitario </div></td>
      </tr>'; 	  
 
	  $sql2 = "select * from ocudetord where ordnum = '$ocunum'";
	  $res2 = $con->query($sql2);
	  $total=0;
 	 while($row = mysqli_fetch_array($res2)){
		 extract($row);
		 $total +=+$valconc; $iva += $ordlab; 
     $body .= '<tr>
        <td>'.$codconc.'</td>
        <td>'.urldecode($desconc).'</td>
		<td><div align="center">$'.number_format($valconc).'</div>
      </tr>';
    } 
	$tb=$total+$iva;
$body .='<tr>
              <td rowspan="4">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="right"><strong>SUBTOTAL</strong></div></td>
              <td><div align="center"><strong>$'.number_format($total).'</strong></div></td>
            </tr>
            <tr>
              <td><div align="right"><strong>I.V.A</strong></div></td>
              <td><div align="center"><strong>$'.number_format($iva).'</strong></div></td>
            </tr>
        <tr>
        <td><div align="right"><strong>TOTAL ORDEN</strong></div></td>
        <td><div align="center">
          <div align="center"><strong>$'.number_format($tb).'</strong></div>
        </div></td>
      </tr>';
$body .=' </table></td>
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
        <td rowspan="2">Usuario Genera'.$addord.'</td>
        <td rowspan="2">'.$usuapr.'</td>
        <td>Fecha Pedido:'.$ocufem.'</td>
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
</table>';	
	    
$mail->Body = $body; // Mensaje a enviar. 
$exito = $mail->Send(); // Envía el correo.
if($exito){ echo "El correo fue enviado correctamente."; }else{ echo "Hubo un problema. Contacta a un administrador."; } 

echo "Orde Aprobada";

?>