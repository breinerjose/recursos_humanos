<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
tr.respuesta{text-align:lefth; font-size:14px; } 
tr.pregunta{ background-color:#33CCFF; } 
</style>
</head>
<body>
<table width="800" border="1" cellspacing="0" cellpadding="0">
  <tr height="50px">
    <td colspan="3" align="center" valign="middle"><h3>EVALUACIÓN DE LA INDUCCIÓN Y REINDUCCIÓN</h3></td>
    <td width="26%" valign="middle" align="center"><?php 
if(isset($empresa)){
  if($empresa=='ASAP S.A.S'){
	 echo '<a href="#" onClick="window.print();" title="ASAP"><img width="100" height="60" src="/res/images/asap.jpg"/></a>'; 
  }else {
	 echo '<a href="#" onClick="window.print();" title="ASECO"><img src="/res/images/aseco.jpg"/></a>'; 
  }
}
?></td>
  </tr>
  <tr>
    <td width="15%" align="center" valign="middle"><div align="left">Fecha: </div></td>
    <td width="29%" align="center" valign="middle"><div align="left">&nbsp;&nbsp;&nbsp;<?php echo $addfch; ?>&nbsp;
    </div>
    <div align="left"></div></td>
    <td colspan="2" align="center" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;Tipo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>&nbsp;&nbsp;&nbsp;INDUCCIÓN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REINDUCCIÓN</td>
  </tr>
  <tr>
    <td width="15%" valign="middle">Empresa Cliente:</td>
    <td colspan="3" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo $cliente; ?></td>
  </tr>
  <tr>
    <td width="15%" valign="middle">Nombre:</td>
    <td colspan="3" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo $nombre; ?></td>
  </tr>
</table>
<table width="800" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td height="25" colspan="2" bgcolor="#33CCFF" ><strong>1. Explique con sus palabras de qué trata la Política Integral HSEQ y su contribución en el logro de la misma.</strong></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2"><?php echo $preg1; ?></td>
  </tr>
  <tr>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#33CCFF"><strong>2. Del listado siguiente, seleccione sus responsabilidades dentro del SG-SST</strong></td>
  </tr>
  <tr class="respuesta">
    <td width="50%">a) Procurar el cuidado integral de su salud.
    <?php if($p2a == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
    <td width="50%">e) Reportar las horas trabajadas
	<?php if($p2e == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td>b) Cumplir con las normas, reglamento e instrucciones del sistema de seguridad y salud en el trabajo.
	<?php if($p2b == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
    <td>f) Participar en las actividades de capacitacion en seguridad y salud en el trabajo definido en el plan de capacitacion del SG- SST
	<?php if($p2f == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td>c) Informar a sus jefes oportunamente sobre las situaciones de riesgo observadas o los accidentes ocurridos.
	<?php if($p2c == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
    <td>g) Usar en forma oportuna y adecuada los dispositivos de prevención de riesgos y los elementos de protección personal.
	<?php if($p2g == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td>d)  Informar a sus jefes algunas veces sobre las situaciones de riesgo observadas o los accidentes ocurridos
	<?php if($p2d == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
    <td>h) Conservar en orden y aseo los lugares de trabajo, las herramientas y los equipos de trabajo
	<?php if($p2h == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#33CCFF"><strong>3. Para protegerme de los riesgos generales ¿Qué debo tener en cuenta?</strong></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="respuesta">
        <td>a) Respetar delimitaciones de area y señalización
		<?php if($p3a == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
      </tr>
      <tr class="respuesta">
        <td>b) Seguir los procedimientos de trabajo y firmar el analisis de riesgo en caso que se requiera
		<?php if($p3b == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
      </tr>
      <tr class="respuesta">
        <td>c) Utilizar mis elementos de protección personal
		<?php if($p3c == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
      </tr>
      <tr class="respuesta">
        <td>d) Mantener distancia segura a equipos energizados
		<?php if($p3d == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
      </tr>
      <tr class="respuesta">
        <td>e) Todas las anteriores
		<?php if($p3e == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>4. Responda Si o No a las siguientes frases:  La Política y las Normas de HSE de la empresa  incluyen :</strong></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">a) Puedo FUMAR o ingerir ALCOHOL  y DROGAS durante el trabajo.(&nbsp;<?php if($p4a == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?>&nbsp;)</td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">b) Debo utilizar adecuadamente los EPP y cumplir con las normas de HSE dentro de las empresas clientes.(&nbsp;<?php if($p4b == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?>&nbsp;)</td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">c) Debo respetar y acatar las normas sobre Seguridad, Salud en el Trabajo, Ambiente y Calidad de nuestros clientes.(&nbsp;<?php if($p4c == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?>&nbsp;)</td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">d) Se pueden usar, alterar y reparar equipos sin autorización. (&nbsp;<?php if($p4d == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?>&nbsp;)</td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">e) Como trabajador debo tener compromiso y ser responsable con mi trabajo.(&nbsp;<?php if($p4e == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?>&nbsp;)</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>5.  Mencione los peligros a los que considera, estará expuesto en su cargo</strong></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2"><?php echo $preg5; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>6. De las siguientes situaciones, asigne la  letra correcta, para identificar un acto inseguro, una condicion insegura y un incidente</strong></td>
  </tr>
  <tr class="respuesta">
    <td>Operar un equipo en mal estado. (&nbsp;<?php echo $p6a; ?>&nbsp;)</td>
    <td>a. Condición Insegura</td>
  </tr>
  <tr class="respuesta">
    <td>Un equipo sin guardas de seguridad. (&nbsp;<?php echo $p6b; ?>&nbsp;)</td>
    <td>b. Inicidente</td>
  </tr>
  <tr class="respuesta">
    <td>Caída de una lampara de vidrio en la ruta de acceso a la planta.(&nbsp;<?php echo $p6c; ?>&nbsp;)</td>
    <td>c. Acto inseguro</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>7.  Escriba los nombres de los miembros del COPASST de su centro de trabajo y otro nombre de un miembro de la oficina principal de Asap o de otro centro de trabajo.</strong></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $p7a.', '.$p7b.', '.$p7c.', '.$p7d; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>8. ¿Cual es el procedimiento a seguir en caso de ocurrir un accidente de trabajo?</strong></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">a) Informar dos dias despues del accidente.
    <?php if($p8a == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">b) Informarle inmediatamente a mi jefe y/o al departamento de seguridad y salud en el trabajo.
	<?php if($p8b == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">c) Portar y conservar siempre mi carné de ARL.
	<?php if($p8c == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">d) Entregar las incapacidades en las oficinas de ASAP y/o supervisor.
	<?php if($p8d == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr class="respuesta">
    <td colspan="2">e) Todas las anteriores, excepto la a.
	<?php if($p8e == '1'){echo '<img src="/res/icons/sirco/seleccion.png" alt="seleccion"/>';}; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>9.  Escriba dos nombres de clínicas por las que puede ser atendido en caso de Accidente de Trabajo</strong></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $p9a.', '.$p9b; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>10.  Explique brevemente los impactos ambientales que usted puede ocasionar con sus actividades y como puede evitarlos o minimizarlos</strong></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $preg10; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="pregunta">
    <td colspan="2"><strong>11. Dibuje y escriba en la imagen a continuación los nombres de los elementos de protección personal requeridos en su trabajo y los riesgos de los cuales le esta protegiendo:</strong></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="respuesta">
        <td width="20%">Item</td>
        <td width="40%">EPP</td>
        <td width="40%">Riesgos de los cuales lo protege</td>
      </tr>
      <tr class="respuesta">
        <td>Cabeza</td>
        <td><?php echo $p11a; ?></td>
        <td><?php echo $p11b; ?></td>
      </tr>
      <tr class="respuesta">
        <td>Manos</td>
        <td><?php echo $p11c; ?></td>
        <td><?php echo $p11d; ?></td>
      </tr>
      <tr class="respuesta">
        <td>Pies</td>
       <td><?php echo $p11e; ?></td>
       <td><?php echo $p11f; ?></td>
      </tr>
      <tr class="respuesta">
        <td>Ojos</td>
        <td><?php echo $p11g; ?></td>
        <td><?php echo $p11h; ?></td>
      </tr>
      <tr class="respuesta">
        <td>Oídos</td>
        <td><?php echo $p11i; ?></td>
        <td><?php echo $p11j; ?></td>
      </tr>
      <tr class="respuesta">
        <td>Cara</td>
        <td><?php echo $p11k; ?></td>
        <td><?php echo $p11l; ?></td>
      </tr>
      <tr class="respuesta">
        <td>Tronco</td>
        <td><?php echo $p11m; ?></td>
        <td><?php echo $p11n; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
