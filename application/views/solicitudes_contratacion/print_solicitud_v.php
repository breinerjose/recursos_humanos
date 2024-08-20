<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solicitud de Contratacion</title>
</head>

<body>
<table width="800" border="1" cellspacing="0" cellpadding="0">
  <tr>
 
    <td width="156"><?php if ($codemp=='800900600-1'){echo " <img src='/res/images/asap.jpg' width='200' height='40' />";}else{echo " <img src='/res/images/aseco.jpg' width='200' height='40' />";}?></td>
    <td width="638"><div align="center"><strong>SOLICITUD DE CONTRATACION </strong></div></td>
  </tr>
</table>
</br>
<table width="800" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center"><strong>DATOS DEL SOLICITANTE </strong></div></td>
  </tr>
  <tr>
    <td width="288"><div align="center">CLIENTE:</div></td>
    <td colspan="2"><?php echo $nomcli; ?></td>
  </tr>
  <tr>
    <td><div align="center">NOMBRE DEL FUNCIONARIO SOLICITANTE: </div></td>
    <td colspan="2"><?php echo utf8_decode($nomfun); ?></td>
  </tr>
  <tr>
    <td><div align="center">AREA DONDE SE DESEMPE&Ntilde;ARA </div></td>
    <td colspan="2"><?php echo $nomare; ?></td>
  </tr>
  <tr>
    <td><div align="center">FECHA DE SOLICITUD: </div></td>
    <td colspan="2"><?php echo $addfch; ?></td>
  </tr>
  <tr>
    <td><div align="center">CARGO A DESEMPE&Ntilde;AR </div></td>
    <td colspan="2"><?php echo $nomcar; ?></td>
  </tr>
  <tr>
    <td><div align="center">LABOR A REALIZAR: </div></td>
    <td colspan="2"><?php echo utf8_decode($labrel); ?></td>
  </tr>
  <tr>
    <td><div align="center">FECHA REQUERIDA DE CONTRATACION: </div></td>
    <td colspan="2"><?php echo $fchcon; ?></td>
  </tr>
  <tr>
    <td><div align="center">FECHA APROXIMADA TERMINACION DE LA OBRA: </div></td>
    <td colspan="2"><?php echo $fchter; ?></td>
  </tr>
  <tr>
    <td><div align="center">SALARIO:</div></td>
    <td colspan="2"><?php echo '$ '.number_format($salari,0,",","."); ?></td>
  </tr>
  <tr>
    <td rowspan="2"><div align="center">BONIFICACION:</div></td>
    <td width="319"><?php echo $bonifi;?></td>
    <td width="185">VALOR:</td>
  </tr>
  <tr>
    <td>FRECUENCIA:</td>
    <td>SALARIAL:</td>
  </tr>
  <tr>
    <td><div align="center">SUBSIDIO DE ALIMENTACION: </div></td>
    <td><?php echo $subali;?></td>
    <td>VALOR C/U </td>
  </tr>
  <tr>
    <td><div align="center">SUBSIDIO DE TRANSPORTE: </div></td>
    <td colspan="2"><?php echo $subtra;?></td>
  </tr>
  <tr>
    <td><div align="center">TRANSPORTE (RUTA) </div></td>
    <td colspan="2"><?php echo $trarut;?></td>
  </tr>
  <tr>
    <td><div align="center">HORARIO DE TRABAJO: </div></td>
    <td colspan="2"><?php echo $hortra?>
  <tr>
    <td><div align="center">DOTACI&Oacute;N:</div></td>
    <td colspan="2"><?php echo $dotaci;?></td>
  </tr>
  <tr>
    <td><div align="center">REQUIERE PROTECCI&Oacute;N AUDITIVA: </div></td>
    <td colspan="2"><?php echo $reqaud;?></td>
  </tr>
  <tr>
    <td><div align="center">REQUIERE PROTECCI&Oacute;N RESPIRATORIA: </div></td>
    <td colspan="2"><?php echo $reqres;?></td>
  </tr>
  <tr>
    <td><div align="center">REQUIERE CERTIFICADO TRABAJO EN ALTURAS: </div></td>
    <td colspan="2"><?php echo $reqalt;?></td>
  </tr>
  <tr>
    <td><div align="center">REQUIERE CERTIFICADO DE ESPACIO CONFINADO: </div></td>
    <td colspan="2"><?php echo $reqcon;?></td>
  </tr>
  <tr>
    <td><div align="center">OBSERVACIONES:</div></td>
    <td colspan="2"><?php echo utf8_decode($observ); ?></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>DATOS DE QUIEN DILIGENCIA LA SOLICITUD </strong></div></td>
  </tr>
  <tr>
    <td><div align="center">NOMBRE:</div></td>
    <td colspan="2"><?php echo utf8_decode($nombres);?></td>
  </tr>
  <tr>
    <td><div align="center">CEDULA:</div></td>
    <td colspan="2"><?php echo $addusr;?></td>
  </tr>
  <tr>
    <td><div align="center">FIRMA:</div></td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</body>
</html>