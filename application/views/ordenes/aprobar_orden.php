<?php
$ocunum=$_GET['ocunum'];
if ($this->session->userdata('user') == ''){exit();}

 $data=array('esttem'=>'Aprobada','addapr'=>'now()','usuapr'=>$this->session->userdata('user'));
 $this->db->set($data);
 $this->db->where('ocunum',$ocunum);
 $this->db->update('ocuord');
		
 $this->db->select('*');
 $this->db->from('ocuord');
 $this->db->where('ocunum',$ocunum);
 $res = $this->db->get();
 $row = $res->row_array();
 if (isset($row)){ extract($row); }else{ echo "01"; exit(); }	

require("class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "h7.a1center.net"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
$mail->Username = "noresponder@asapaseco.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
$mail->Password = "F26ef4a24A..**"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
//$mail->Port = 465; // Puerto de conexión al servidor de envio. 
$mail->From = "noresponder@asapaseco.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
$mail->FromName = "AsapAseco"; //A RELLENAR Nombre a mostrar del remitente. 
if($codlab=='900268528'){
$mail->AddAddress("sysomanga@sysoempresarial.com"); // Esta es la dirección a donde enviamos 
$mail->AddAddress("citasmedicas@sysoempresarial.com"); // Esta es la dirección a donde enviamos
}
if($codlab=='800224583'){
$mail->AddAddress("bocagrande@laboratorioeduardofernandez.com"); // Esta es la dirección a donde enviamos 
$mail->AddAddress("sl@laboratorioeduardofernandez.com"); // Esta es la dirección a donde enviamos 
$mail->AddAddress("centro@laboratorioeduardofernandez.com"); // Esta es la dirección a donde enviamos 
}
if($codlab=='900625129'){
$mail->AddAddress("medlaboral@hysoccupational.co");
$mail->AddAddress("asistentemedicinalaboral@hysoccupational.co");
}
$mail->AddAddress("aprendeconbreiner@gmail.com"); // Esta es la dirección a donde enviamos 
$mail->AddAddress("sst@asapaseco.com"); // Esta es la dirección a donde enviamos 
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
                <td width="19%" rowspan="2">'.$ocupor.'</td>
                <td width="57%" align="center" valign="middle" class="Estilo7">ORDEN DE SERVICIO</td>
                <td width="24%"><span class="Estilo6">'.$ocunum.'</span></td>
              </tr>
              <tr>
                <td colspan="2">Nit: 800027721-3 Centro calle 35 No.8-79 Edificio CityBank Of. 13C Cartagena Colombia</td>
                </tr>
				  <tr>
                <td colspan="3" align="center">Email: salud.ocupacional@asapaseco.com pagina web www.asapaseco.com Telefono 6600121 Ext 118</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><div align="center"><span class="Estilo10">NO VALIDA - INFORMATIVA </span></div></td>
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
                <td colspan="2" class="Estilo1">Datos del Laboratorio:</td>
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
                <td>'.$tipord.' - '.$tipcon.'</td>
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
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2"><div align="center"><span class="Estilo10">NO VALIDA - INFORMATIVA</span></div></td>
        </tr>
      <tr>
        <td>Codigo  </td>
        <td>Concepto</td>
		<td>Vigencia</td>
		<td>Facturar</td>
      </tr>'; 	  
 
  $this->db->select('*');
 $this->db->from('ocudetord');
 $this->db->where('ordnum',$ocunum);
 //$this->db->where('diaven','0');
 $this->db->where('delusr IS NULL');
 $this->db->order_by('codconc');
 $res = $this->db->get();
if($res->num_rows()>0){$rows = $res->result_array();}else{$rows = false;}

if($rows != false){
 foreach($rows as $row){
		 extract($row);
		 if($facint == 'TARIFA'){ $facint='EMPRESA';} //Lo que es a tarifa se factura a empresa y empresa factura a cliente
     $body .= '<tr>
        <td>'.$codconc.'</td>
        <td>'.urldecode($desconc).'</td>
		<td>'.$diaven.'</td>
		<td>'.$facint.'</td>
      </tr>';
    } 
	}else{ echo "No Hay Examenes en esta Orden"; exit(); }
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
      <tr>
        <td>Fecha Entrega:<?php echo $sysfec; ?></td>
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
if($exito){ echo "El correo fue enviado correctamente."; }else{ echo "Hubo un problema. Contacta a un administrador."; exit(); } 

echo "Orde Aprobada";

?>