<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CERTIFICADDO LABORAL ACTIVO</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<!--<LINK REL=StyleSheet HREF="style.css" TITLE=Contemporary TYPE="text/css">
<link href="CSS2/estilo.css" rel="stylesheet" type="text/css" />-->
<?php
$grupo = $_GET["grupo"]; 

if ($grupo == 'aseco'){$nit = '800121354-3'; $nombre1 ='AGENCIA DE SERVICIOS COLOMBIANOS S.A.S'; $nombre2 = 'ASECO S.A.S'; $imagen = 'aseco';}
else{$nit = '800002721-3'; $nombre1 ='AGENCIA DE SERVICIOS ADMINISTRATIVO PERSONAL S.A.S'; $nombre2 = 'ASAP S.A.S'; $imagen = 'asap';}

  		  $this->db->select('nombres as nombre');
		  $this->db->from('datos');
		  $this->db->where('cedula',$this->session->userdata('user'));
		  $this->db->limit(1,0);
		  $resx = $this->db->get();
		  $rowx= $resx->row_array();
		  if (isset($rowx)){ extract($rowx); }else{ echo "01"; exit(); }
?>
</script>
<!--<script language="javascript" src="fecha.js"></script>
<script type="text/javascript" src="datepickercontrol.js"></script> 
<link type="text/css" rel="stylesheet" href="datepickercontrol.css">-->
<style type="text/css">
<!--
.Estilo1 {
	font-size: 16px;
	font-weight: bold;
}
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo3 {font-size: 20px}
.Estilo4 {font-size: 20px; font-weight: bold; }
.Estilo7 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; }
-->
</style>
</head>
<body topmargin="0" leftmargin="0">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
<!--<form id="formulario" name="formulario" method="post" action="printdocumento.php">-->
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="24%"><img src="../../images/<?php echo $imagen?>.jpg" width="177" height="67"></td>
        <td width="76%"><div align="center"><span class="Estilo1"><?php echo $nombre1; ?></span></div></td>
      </tr>
      
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1"><div align="center" class="Estilo3">EL DEPARTAMENTO DE GESTION HUMANA DE</div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo1"><?php echo $nombre2; ?></div></td>
      </tr>
	  <tr>
        <td colspan="2"><div align="center" class="Estilo1">NIT <?php echo $nit; ?></div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo4">CERTIFICA QUE:</div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><p align="justify" class="Estilo7">El se&ntilde;or (a) <?PHP echo $nombre; ?>; identificado con C&eacute;dula de Ciudadan&iacute;a No.<?php echo $this->session->userdata('user'); ?>, ha laborado en nuestra compañía bajo diferentes épocas y bajo diferentes contratos, independientes uno del otro y los cuales se dieron en las siguientes fechas:</p>          </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
	  <?php 
	  //CONSULTA DE CONTRATOS INACTIVOS
		 $this->db->select('fecdat, fincon, oficio, salario, tipocontrato');
		  $this->db->from('contrato, familias');
		  $this->db->where('numid',$this->session->userdata('user'));
		  $this->db->where('familias.nitcia',$nit);
		  $this->db->where('contrato.familia = familias.familia');
		  $this->db->order_by('fecdat');
		  $res = $this->db->get();
		  //echo $this->db->last_query();
		  if($res->num_rows()>0){
		  $res = $res->result_array();
	  ?>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
	   <?php   
	  	  foreach($res as $row){
		  extract($row);
		    if($tipocontrato == '0'){$tipoc="ATERMINO FIJO INFERIOR A UN AÑO";}
	   	    elseif($tipocontrato == '1'){$tipoc="A TERMINO INDEFINIDO";}
			elseif($tipocontrato == '2'){$tipoc="POR OBRA O LABOR CONTRATADA";}
			elseif($tipocontrato == '3'){$tipoc="ATERMINO FIJO INFERIOR A UN AÑO";}
			elseif($tipocontrato == '4'){$tipoc="POR OBRA O LABOR CONTRATADA";}
			elseif($tipocontrato == '5'){$tipoc="ATERMINO FIJO INFERIOR A UN AÑO";}
			elseif($tipocontrato == '6'){$tipoc="POR OBRA O LABOR CONTRATADA";}
			else { echo $tipocontrato." Error en el sistema, por favor llamar a nuestros numero Tel 6600121"; exit(); };
		
	
		    if($tipocontrato == '1' and $fecdat < '2011-12-31'){ $tipoc="POR OBRA O LABOR CONTRATADA"; }
			
			if($fincon == NULL ){ $fincon = 'la fecha'; }
		
	?>
      <tr>
        <td colspan="2" class="Estilo7"><table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td width="6%"><li></li></td>
            <td width="94%"><div align="justify"><?php echo "Del ".$fecdat." Hasta ".$fincon." Con tipo de contrato ".$tipoc." Ocupando el cargo de ".$oficio.", su último salario fue de $".number_format($salario); ?></div></td>
          </tr>
        </table></td>
        </tr>
	  <tr>
        <td colspan="2" class="Estilo7">&nbsp;</td>
      </tr>
<?php } } ?>

      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo7"><div align="justify">La presente certificaci&oacute;n se expide a solicitud del interesado(a) en la Ciudad de Cartagena
          de Indias a los  (<?php echo date("d"); ?>) D&iacute;as del  <?php echo date("m"); ?> del <?php echo date("Y"); ?>.</div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo2">Atentamente,</td>
      </tr>
      <tr>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2" class="Estilo1">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1"><img width="200px" height="80px" src="/res/firmas/karla.jpg"/></td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">KARLA VALENCIA VELANDIA</td>
      </tr>
      <tr>
        <td colspan="2">Gerente Corporativa de Asuntos</td>
      </tr>
      <tr>
        <td colspan="2" class="Estilo1">Legales & Gestion Humana </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">C.C Folder de Empleado</td>
      </tr>
      <tr>
        <td colspan="2"><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><p align="center" class="Estilo2">35 No. 8-79 Edificio CitiBank Piso 13 Oficina 13-C Conmutador: 6600121 - 6600114 Fax: 6644954</p>
          <p align="center" class="Estilo2">Cartagena - Colombia  </p></td>
      </tr>
    </table></td>
  </tr>
 <!-- </form>-->
</table>
</body>
</html>