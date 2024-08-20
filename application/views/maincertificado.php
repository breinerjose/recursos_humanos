
<style type="text/css">
<!--
.Estilo4 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color:#FF0000;
}
.Estilo5 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo6 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Estilo7 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.Estilo8 {color: #FFFFFF}
-->
</style>
<script type="text/JavaScript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#0099FF"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF">SELECCIONE PARA GENERAR SU CERTIFICADO LABORAL </font></td>
  </tr>
  <tr>
    <td width="122">&nbsp;</td>
  </tr>
  <?php 
        $usu = $this->session->userdata('user');
        $condicionx="numid = $usu AND contrato.familia = familias.familia AND familias.nitcia = '800121354-3'";
        $this->db->select('fecini');
		$this->db->from('contrato, familias');
		$this->db->where($condicionx);
		$res = $this->db->get();
        $cuenta1 = $res->num_rows(); 
		 
        $condicionx="numid = $usu AND contrato.familia = familias.familia AND familias.nitcia = '800121354-3'  and contrato.estado='ACTIVO'";
        $this->db->select('fecini');
		$this->db->from('contrato, familias');
		$this->db->where($condicionx);
		$res = $this->db->get();

        $cuenta2 = $res->num_rows();
if($cuenta1 > 0){
  ?>
  <tr>
    <td align="center"><a href="#" onclick="MM_openBrWindow('vista/printcertificado.php?grupo=aseco','','scrollbars=yes')">CERTIFICADO LABORAL ASECO</a>
	<?php if($cuenta2 > 0){ ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="MM_openBrWindow('/Carta_c/generar_carta?empresa=ASECO&codtrc=<?php echo $this->session->userdata('user'); ?>','','scrollbars=yes')">PERMISO MOVILIDAD</a><?php } ?>
	</td>
  </tr>
  <?php } ?>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   <?php 

        $usu = $this->session->userdata('user');
        $condicionx="numid = $usu AND contrato.familia = familias.familia AND familias.nitcia = '800002721-3'";
        $this->db->select('fecini');
		$this->db->from('contrato, familias');
		$this->db->where($condicionx);
		$res = $this->db->get();
        $cuenta3 = $res->num_rows(); 
		 
        $condicionx="numid = $usu AND contrato.familia = familias.familia AND familias.nitcia = '800002721-3' and contrato.estado='ACTIVO'";
        $this->db->select('fecini');
		$this->db->from('contrato, familias');
		$this->db->where($condicionx);
		$res = $this->db->get();
        $cuenta4 = $res->num_rows();

if($cuenta3 > 0){
  ?>
  <tr>
    <td align="center"><a href="#" onclick="MM_openBrWindow('vista/printcertificado.php?grupo=asap','','scrollbars=yes')">CERTIFICADO LABORAL ASAP</a>
	<?php if($cuenta4 > 0){ ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="MM_openBrWindow('/Carta_c/generar_carta?empresa=ASAP&codtrc=<?php echo $this->session->userdata('user'); ?>','','scrollbars=yes')">PERMISO MOVILIDAD</a><?php } ?>
	</td>
  </tr>
  <?php } ?>

</table>
