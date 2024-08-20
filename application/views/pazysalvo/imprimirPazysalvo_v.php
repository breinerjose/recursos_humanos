<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imprimir Paz y Salvo</title>
</head>
<style type="text/css">
body{font-family:Verdana, Geneva, sans-serif; font-size:15px;}
.fch{color:#933;}
h1{font-size:12px; font-weight:bold;text-align:center;}
div.cuerpo{text-align:justify; font-size:12px; border:1px solid #999999;}
p span.par, span.pie{font-weight:bold;}
span.pie{font-size:12px;text-transform:uppercase;}
#contenido{margin:0 auto; padding:3px; width:98%; }
p.fot{
    bottom: 0;
    height: 45px;
    left: 0;
    padding-left: 10px;
    padding-top: 5px;
    text-align: center;
    width: 95%;
}
p.cabecera{text-align:center;}
#left,#right{width:47%;border:1px solid #000;display:inline-block; vertical-align:top;margin:0.25em;}
#left p, #right p{margin: -1px;padding: 0.1em;font-size:13px; line-height:1.5em;}
#firma{width:90%;}
#firma .firma1, #firma .firma2{display:inline-block;text-align:center;}
#firma .firma2{float:right;}#firma .firma1{margin-left:50px;}
hr{border:1px dashed #666666;}
img.tij{ vertical-align:middle;}

</style>
</head>
<body>
    <div id="contenido">
        <p class="cabecera">
        <?php 
        if(isset($logo)){
          if($logo=='ASAP' || $logo=='asap' ){
            echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/res/images/asap.png"/></a>';
          }else if($logo=='ASECO' || $logo=='aseco'){
           echo '<a href="#" onClick="window.print();" title="imprimir"><img src="/res/images/aseco.png"/></a>';
          }
        }
        ?>
        </p>
    <h1>INFORMACIÓN CUALITATIVA PARA LIQUIDACIÓN DE PRESTACIONES</h1>
    <br>
    <div class="cuerpo">
    <table width="100%" border="0" cellpadding="3" class="display">
       <thead>
        <tr>
        	<td width="50%"><span>NUMERO PAZ Y SALVO:</span></td>
            <td width="50%"><span><?php echo $id; ?></span></td>
        </tr>
        
        <tr>
        	<td height="15"><span>NUMERO DE CONTRATO:</span></td>
            <td><span><?php echo $numero; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>PERIODO DE PAGO:</span></td>
            <td><span><?php echo $per; ?></span></td>
        </tr>
        <tr>
          <td height="15><span>NIT y/o CC:</span></span></td>
            <td><span><?php echo $cedula; ?></span></td>
        </tr>
        <tr>
        	<td height="15">NUMERO DE IDENTIFICACION </td>
          <td><?php echo $id_persona; ?></td>
        </tr>
        <tr>
        	<td height="15><span>NIT y/o CC:</span></span></td>
            <td><span><?php echo $cedula; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>NOMBRE Y APELLIDOS:</span></td>
            <td><span><?php echo $nombre; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>FECHA DE EJECUCIÓN PAZ Y SALVO:</span></td>
            <td><span><?php echo $fcheje; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>FECHA DE RETIRO:</span></td>
            <td><span><?php echo $fchter; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>EMPRESA - CLIENTE:</span></td>
            <td><span><?php echo $empclt; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>Reporte de producción y/o tiempo:</span></td>
            <td><?php echo $g; ?></td>
        </tr>
        
        <tr>
        	<td height="15"><span>Paz y salvo empresa cliente:</span></td>
            <td><?php echo $i; ?></td>
        </tr>
        <tr>
        	<td height="15"><span>Paz y salvo cooperativa:</span></td>
            <td><?php echo $j; ?></td>
        </tr>
        <tr>
        	<td height="15"><span>Paz y salvo dotación:</span></td>
            <td><?php echo $k; ?></td>
        </tr>
        <tr>
        	<td height="15"><span>Descuentos pendientes ASAP - ASECO:</span></td>
            <td><span><?php echo $l.' '.$ll; ?></span></td>
        </tr>
        <tr>
        	<td height="15"><span>Documento cliente de terminación del contrato:</span></td>
            <td><?php echo $m; ?></td>
        </tr>
        
        <tr>
        	<td height="15"><span>Examen médico de egreso</span></td>
            <td><?php echo $o; ?></td>
        </tr>
        <tr>
        	<td height="15"><span>Carnet de ASAP - ASECO:</span></td>
            <td><?php echo $p; ?></td>
        </tr>
        <tr>
        	<td height="15"><span>Carnet de la ARP:</span></td>
            <td><?php echo $q; ?></td>
        </tr>
        <tr>
        	<td height="15"><span>Carnet del cliente:</span></td>
            <td><?php echo $r; ?></td>
        </tr>
        
         <tr>
        	<td height="15"><span>Causa de terminación del contrato:</span></td>
            <td><?php echo $u; ?></td>
        </tr>
         <tr>
        	<td height="15"><span>Observación:</span></td>
            <td><span><?php echo $obs; ?></span></td>
        </tr>
		 <tr>
           <td height="15">Estado:</td>
           <td><?php echo  $estado;
		    ?></td>
         </tr>
    </table>
    </div>
    <br><br><br>
    <div id="firma">
        <p class="firma1">
        _________________________________<br/>
          <span>ELABORADO POR:</span>
        </p>
        <p class="firma2">
        _______________________________<br/>
          <span>APROBADO POR:</span>
        </p>
    </div>
    <br/>
    <img class="tij" height="24" width="24" src="/res/images/tijeras.jpg" />
    -----------------------------------------------------------------------------------------------------------------------------------
    <p><b>Razon de la Terminacion :&nbsp; <?php echo $nota; ?></b></p>
</body>
</html>