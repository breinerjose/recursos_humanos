<?php 	  
 $this->db->select('*');
 $this->db->from('ocuord');
 $this->db->where('ocunum',$ocunum);
 $res = $this->db->get();
 $row = $res->row_array();
 if (isset($row)){ extract($row); }else{ echo "01"; exit(); }				  
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
-->
</style>


<title><?php echo $ocunum; ?></title><table width="1000" border="0" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="19%" rowspan="2"><img src="/res/images/<?php echo $ocupor; ?>.jpg" alt="ocupor" height="60" /></td>
                <td width="57%" align="center" valign="middle" class="Estilo7">ORDEN DE SERVICIO</td>
                <td width="24%"><span class="Estilo6"><?php 
				$a='';
				if($cargar == 'EMPRESA'){$a='E';}
				elseif($cargar == 'ARL'){$a='A';}
				echo $ocunum.$a; ?></span></td>
              </tr>
              <tr>
                <td colspan="2">Nit: 800027721-3 Centro calle 35 No.8-79 Edificio CityBank Of. 13C Cartagena Colombia</td>
                </tr>
              <tr>
                <td colspan="3" align="center">Email: salud.ocupacional@asapaseco.com pagina web www.asapaseco.com Telefono 6600121 Ext 118</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
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
                <td width="16%" class="Estilo1">Cedula:</td>
                <td width="84%" class="Estilo1"><?php echo $ocuced; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Nombre:</td>
                <td class="Estilo1"><?php echo $ocunom; ?>&nbsp;<?php echo $ocuape; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Direccion:</td>
                <td class="Estilo1"><?php echo $ocudir; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Telefono: </td>
                <td class="Estilo1"><?php echo $ocutel; ?> Celular: <?php echo $ocucel; ?></td>
                </tr>
              <tr>
                <td class="Estilo1">Cargo:</td>
                <td class="Estilo1"><?php echo $ocucar; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Riesgo:</td>
                <td class="Estilo1"><?php echo $riesgo; ?></td>
              </tr>
              <tr>
                <td class="Estilo1">Cliente</td>
                <td class="Estilo1"><?php echo $cliente; ?></td>
              </tr>
            </table></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="Estilo1">Datos del Laboratorio</td>
                </tr>
              <tr>
                <td width="29%" class="Estilo1">Laboratorio:</td>
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
                <td><span class="Estilo1">Eps:</span></td>
                <td><?php echo $ocueps; ?></td>
              </tr>
              <tr>
                <td><span class="Estilo1">Tipo Contrato:</span></td>
                <td><?php echo $tipcon; ?></td>
              </tr>
              <tr>
                <td><span class="Estilo1">Cargar A:</span></td>
                <td><?php echo $cargar; ?></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Codigo  </td>
        <td>Concepto</td>
		<td><div align="left">Valor</div></td>
      </tr>
      <?php 
	  $total=0;
	  $this->db->select('*');
      $this->db->from('ocudetord');
      $this->db->where('ordnum',$ocunum);
	  $this->db->where('diaven','0');
	  $this->db->where('delusr IS NULL');
	 	  if($cargar == 'ARL'){ $this->db->where('facint','ARL'); }else{ $this->db->where('facint !=','ARL'); }
      $res = $this->db->get();
	  //echo $this->db->last_query();
	  if($res != false){
      $row = $res->result_array();
	  foreach($row as $rows){
		 extract($rows);
		 $valconc=0;
	  ?>
      <tr>
        <td><?php echo $codconc; ?></td>
        <td><?php echo urldecode($desconc); ?></td>
		<td><div align="left"><?php echo '$'.number_format($valconc); $total = $total+$valconc;  ?></div></td>
      </tr>
      <?php } ?>
      <tr>
        <td><div align="right">Total Orden&nbsp;&nbsp;</div></td>
        <td>&nbsp;</td>
        <td><div align="left"><?php echo '$'.number_format($total); ?></div></td>
      </tr>
	  <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td>OBSERVACION:&nbsp;<?php echo $ocuobs;?></td>
  </tr>
  <!--!
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
      <tr>
        <td width="25%">Elaborado por:</td>
        <td width="25%">Revisado por:</td>
        <td width="25%">Revisado por:</td>
        <td width="25%">Fecha</td>
      </tr>
      <tr>
        <td rowspan="2">&nbsp;</td>
        <td rowspan="2">&nbsp;</td>
        <td rowspan="2">&nbsp;</td>
        <td>Fecha Pedido: <?php// echo $ocufem; ?></td>
      </tr>
      <tr>
        <td>Fecha Entrega:<?php// echo $sysfec; ?></td>
      </tr>
    </table></td>
  </tr>
  -->
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
      <tr>
        <td width="37%">Elaborado por:
          <?php 
					 $this->db->select('nombres');
					 $this->db->from('actusr');
					 $this->db->where('nriper',$addord);
					 $res = $this->db->get();
					 //echo $this->db->last_query();
					 if($res != false){
					 $row = $res->row_array();
					 extract($row); 
					 if (isset($nombres)) 
					{ echo $nombres; }else{ echo "No se registro quien la Genera!!!"; }
					 }else{ echo "01"; exit(); }	
		 
		?></td>
        <td width="38%">Aprobado por:
          <?php 
		  
		  if($usuapr != '')	{	
		  
		  			 $this->db->select('nombres');
					 $this->db->from('actusr');
					 $this->db->where('nriper',$usuapr);
					 $res = $this->db->get();
					 //echo $this->db->last_query();
					 $row = $res->row_array();
					 if (isset($row)){ extract($row); }
					 echo $nombres;
					 }else{echo "Esta Orden No ha sido Aprobada";}
		?></td>
        <td width="25%">Fecha Pedido: <?php echo $fecsol; ?></td>
      </tr>
      <tr>
        <td rowspan="2"><?php if($addord != ''){?><img width="100" src="/res/firmas/<?php echo $addord.".jpg";?>"/><?php } ?></td>
        <td rowspan="2"><?php if($usuapr != ''){?><img width="100" src="/res/firmas/<?php echo $usuapr.".jpg";?>"/><?php } ?></td>
        <td>Fecha Ingreso:<?php echo $fecing; ?></td>
      </tr>
      <tr>
        <td>Fecha Entrega:<?php echo $sysfec; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" >
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
