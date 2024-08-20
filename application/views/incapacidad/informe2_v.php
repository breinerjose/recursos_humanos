<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Informe.xls");
header("Pragma: no-cache");
header("Expires: 0");
//echo $fecini;//=$_GET['fecini'];
//$fecfin=$_GET['fecfin'];
//$deveps=$_GET['deveps'];
//$empleador=$_GET['empleador'];

?>
<table width="1600" border="0" cellspacing="0" cellpadding="0" bordercolor="#FFFFFF">
            <tr>
              <td colspan="12"><div align="center"><strong><H1>CONTROL  DE INCAPACIDADES <?php echo $hoy; ?></h1></strong></div></td>
            </tr>
            <tr>
              <td width="24" align="center" bgcolor="#CCCCCC" class="Estilo7">#</td>
              <td width="86" align="center" bgcolor="#CCCCCC" class="Estilo7">Cedula</td>
              <td width="350" align="center" bgcolor="#CCCCCC" class="Estilo7">Empleado</td>
              <td width="200" align="center" bgcolor="#CCCCCC" class="Estilo7">Cargo</td>
              <td width="109" align="center" bgcolor="#CCCCCC" class="Estilo7"># Incapacidad</td>
              <td width="46" align="center" bgcolor="#CCCCCC" class="Estilo7">Evento</td>
              <td width="46" align="center" bgcolor="#CCCCCC" class="Estilo7">Prorroga</td>
              <td width="46" align="center" bgcolor="#CCCCCC" class="Estilo7"># dias</td>
              <td width="83" align="center" bgcolor="#CCCCCC" class="Estilo7">Fecha Inicio</td>
              <td width="83" align="center" bgcolor="#CCCCCC" class="Estilo7"><div align="center">Fecha Fin</div></td>
              <td width="200" align="center" bgcolor="#CCCCCC" class="Estilo7">Eps</td>
              <td width="100" align="center" bgcolor="#CCCCCC" class="Estilo7">Diagnostico</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Empleador</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Cliente</td>
			  <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Fecha Registro</td>
			  <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Estado</td>
			  <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Historico</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Cobrada</td>
              <td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Archivada</td>
			 <?php if ($$deveps == '1'){ ?><td width="176" align="center" bgcolor="#CCCCCC" class="Estilo7">Observacion</td><?php } ?>
            </tr>
              <?php 
			  $i = 0 ;
	if($deveps == 1){ $consulta = "SELECT * FROM incapacidad WHERE addfch >= '$fecini' AND addfch <= '$fecfin' AND tipo='2'";}
	else{$consulta = "SELECT * FROM incapacidad WHERE tipo='1' AND addfch >= '$fecini' AND addfch <= '$fecfin' ";}
			  if($empleador != ''){ $consulta = $consulta." AND empleador ='".$empleador."'";}
			  $consulta = $consulta." ORDER BY Id ASC"; 
			 // echo $consulta;
              $resultado = $con->query($consulta);
              while($rows = mysqli_fetch_array($resultado)){
              extract($rows); $i=$i+1;?>
			  <tr>
              <td class="Estiloimp" align="center"><?php echo $i;?></td>
              <td class="Estiloimp" align="center"><?php echo $cedula; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $nombres; ?></td>
              <td class="Estiloimp" align="center"><?php echo $cargo; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $numinc; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $evento; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $prorroga; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $numdias; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $fecini; ?></td>
              <td class="Estiloimp" align="center"><?php echo $fecfin; ?></td>
              <td class="Estiloimp" align="center"><?php echo $nomeps; ?></td>
              <td class="Estiloimp" align="center"><?php echo $diagnostico; ?></td>
              <td class="Estiloimp" align="center"><?php echo $empleador; ?></td>
              <td class="Estiloimp" align="center"><?php echo $nomcli; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $addfch." ".$hora; ?></td>
			  <td class="Estiloimp" align="center"><?php echo $estado; ?></td>
			  <td class="Estiloimp" align="center"><?php 
			   $consultanew = "SELECT * FROM inclog WHERE codinc='$Id'";
			  //echo $consultanew;
              $resultadonew = $con->query($consultanew);
              while($rowsnew = mysqli_fetch_array($resultadonew)){
			  extract($rowsnew);
			  echo $observ.' - '.$addfch.' - '.$addusr.'**';
			  }
			   ?></td>
              <td class="Estiloimp" align="center"><?php echo $pagada; ?></td>
              <td class="Estiloimp" align="center"><?php echo $archivado; ?></td>
			  <?php if ($$deveps == '1'){?><td class="Estiloimp" align="center"><?php echo $deveos; ?></td><?php } ?>
            </tr>
            <?php } ?>
          </table>
