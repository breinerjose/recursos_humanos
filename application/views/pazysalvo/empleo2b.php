<?php
error_reporting(0);
$estado=$_POST['estado'];
if($estado != ''){
   
$data=array('primernombre'=>$_POST['primernombre'],
'primernombreok'=>$_POST['primernombreok'],
'segundonombre'=>$_POST['segundonombre'],
'segundonombreok'=>$_POST['segundonombreok'],
'primerapellido'=>$_POST['primerapellido'],
'primerapellidook'=>$_POST['primerapellidook'],
'segundoapellido'=>$_POST['segundoapellido'],
'segundoapellidook'=>$_POST['segundoapellidook'],
'nombres'=>$_POST['primernombre']." ".$_POST['segundonombre']." ".$_POST['primerapellido']." ".$_POST['segundoapellido'],
'cedula'=>$_POST['cedula'],
'cedulaok'=>$_POST['cedulaok'],
'decedula'=>$_POST['decedula'],
'decedulaok'=>$_POST['decedulaok'],
'fechanacimiento'=>$_POST['fechanacimiento'],
'fechanacimientook'=>$_POST['fechanacimientook'],
'lugarnacimiento'=>$_POST['lugarnacimiento'],
'lugarnacimientook'=>$_POST['lugarnacimientook'],
'email'=>$_POST['email'],
'emailok'=>$_POST['emailok'],
'direccion'=>$_POST['direccion'],
'direccionok'=>$_POST['direccionok'],
'ciudad'=>$_POST['ciudad'],
'ciudadok'=>$_POST['ciudadok'],
'valorarriendo'=>$_POST['valorarriendo'],
'valorarriendook'=>$_POST['valorarriendook'],
'tiempocasaanio'=>$_POST['tiempocasaanio'],
'tiempocasaaniook'=>$_POST['tiempocasaaniook'],
'tiempocasames'=>$_POST['tiempocasames'],
'tiempocasamesok'=>$_POST['tiempocasamesok'],
'tipocasa'=>$_POST['tipocasa'],
'tipocasaok'=>$_POST['tipocasaok'],
'telefono'=>$_POST['telefono'],
'telefonook'=>$_POST['telefonook'],
'celular'=>$_POST['celular'],
'celularok'=>$_POST['celularok'],
'nombrefamiliar'=>$_POST['nombrefamiliar'],
'nombrefamiliarok'=>$_POST['nombrefamiliarok'],
'telefonofamiliar'=>$_POST['telefonofamiliar'],
'telefonofamiliarok'=>$_POST['telefonofamiliarok'],
'nombrevecino'=>$_POST['nombrevecino'],
'nombrevecinook'=>$_POST['nombrevecinook'],
'telefonovecino'=>$_POST['telefonovecino'],
'telefonovecinook'=>$_POST['telefonovecinook'],
'estadocivil'=>$_POST['estadocivil'],
'estadocivilok'=>$_POST['estadocivilok'],
'numerohijos'=>$_POST['numerohijos'],
'numerohijosok'=>$_POST['numerohijosok'],
'ultimaempresa'=>$_POST['ultimaempresa'],
'ultimaempresaok'=>$_POST['ultimaempresaok'],
'direccionempresa'=>$_POST['direccionempresa'],
'direccionempresaok'=>$_POST['direccionempresaok'],
'telefonoempresa'=>$_POST['telefonoempresa'],
'telefonoempresaok'=>$_POST['telefonoempresaok'],
'cargodesempenado'=>$_POST['cargodesempenado'],
'cargodesempenadook'=>$_POST['cargodesempenadook'],
'ultimosalario'=>$_POST['ultimosalario'],
'ultimosalariook'=>$_POST['ultimosalariook'],
'supervisor'=>$_POST['supervisor'],
'supervisorok'=>$_POST['supervisorok'],
'inicioempleo'=>$_POST['inicioempleo'],
'inicioempleook'=>$_POST['inicioempleook'],
'finempleo'=>$_POST['finempleo'],
'finempleook'=>$_POST['finempleook'],
'ultimaempresa1'=>$_POST['ultimaempresa1'],
'ultimaempresa1ok'=>$_POST['ultimaempresa1ok'],
'direccionempresa1'=>$_POST['direccionempresa1'],
'direccionempresa1ok'=>$_POST['direccionempresa1ok'],
'telefonoempresa1'=>$_POST['telefonoempresa1'],
'telefonoempresa1ok'=>$_POST['telefonoempresa1ok'],
'cargodesempenado1'=>$_POST['cargodesempenado1'],
'cargodesempenado1ok'=>$_POST['cargodesempenado1ok'],
'ultimosalario1'=>$_POST['ultimosalario1'],
'ultimosalario1ok'=>$_POST['ultimosalario1ok'],
'supervisor1'=>$_POST['supervisor1'],
'supervisor1ok'=>$_POST['supervisor1ok'],
'inicioempleo1'=>$_POST['inicioempleo1'],
'inicioempleo1ok'=>$_POST['inicioempleo1ok'],
'finempleo1'=>$_POST['finempleo1'],
'finempleo1ok'=>$_POST['finempleo1ok'],
'ultimaempresa2'=>$_POST['ultimaempresa2'],
'ultimaempresa2ok'=>$_POST['ultimaempresa2ok'],
'direccionempresa2'=>$_POST['direccionempresa2'],
'direccionempresa2ok'=>$_POST['direccionempresa2ok'],
'telefonoempresa2'=>$_POST['telefonoempresa2'],
'telefonoempresa2ok'=>$_POST['telefonoempresa2ok'],
'cargodesempenado2'=>$_POST['cargodesempenado2'],
'cargodesempenado2ok'=>$_POST['cargodesempenado2ok'],
'ultimosalario2'=>$_POST['ultimosalario2'],
'ultimosalario2ok'=>$_POST['ultimosalario2ok'],
'supervisor2'=>$_POST['supervisor2'],
'supervisor2ok'=>$_POST['supervisor2ok'],
'inicioempleo2'=>$_POST['inicioempleo2'],
'inicioempleo2ok'=>$_POST['inicioempleo2ok'],
'finempleo2'=>$_POST['finempleo2'],
'finempleo2ok'=>$_POST['finempleo2ok'],
'bachillerato'=>$_POST['bachillerato'],
'bachilleratook'=>$_POST['bachilleratook'],
'iniciobachillerato'=>$_POST['iniciobachillerato'],
'iniciobachilleratook'=>$_POST['iniciobachilleratook'],
'finbachillerato'=>$_POST['finbachillerato'],
'finbachilleratook'=>$_POST['finbachilleratook'],
'grado'=>$_POST['grado'],
'gradook'=>$_POST['gradook'],
'tipogrado'=>$_POST['tipogrado'],
'tipogradook'=>$_POST['tipogradook'],
'estudios'=>$_POST['estudios'],
'estudiosok'=>$_POST['estudiosok'],
'institucionestudio'=>$_POST['institucionestudio'],
'institucionestudiook'=>$_POST['institucionestudiook'],
'inicioestudios'=>$_POST['inicioestudios'],
'inicioestudiosok'=>$_POST['inicioestudiosok'],
'finestudios'=>$_POST['finestudios'],
'finestudiosok'=>$_POST['finestudiosok'],
'nombretitulo'=>$_POST['nombretitulo'],
'nombretitulook'=>$_POST['nombretitulook'],
'estudios2'=>$_POST['estudios2'],
'estudios2ok'=>$_POST['estudios2ok'],
'institucionestudio2'=>$_POST['institucionestudio2'],
'institucionestudio2ok'=>$_POST['institucionestudio2ok'],
'inicioestudios2'=>$_POST['inicioestudios2'],
'inicioestudios2ok'=>$_POST['inicioestudios2ok'],
'finestudios2'=>$_POST['finestudios2'],
'finestudios2ok'=>$_POST['finestudios2ok'],
'nombretitulo2'=>$_POST['nombretitulo2'],
'nombretitulo2ok'=>$_POST['nombretitulo2ok'],
'estudiosactualmente'=>$_POST['estudiosactualmente'],
'estudiosactualmenteok'=>$_POST['estudiosactualmenteok'],
'fechasolicitud'=>date("Y-m-d"),
'ciudadempresa'=>$_POST['ciudadempresa'],
'ciudadempresaok'=>$_POST['ciudadempresaok'],
'sexo'=>$_POST['sexo'],
'sexook'=>$_POST['sexook'],
'ciudadempresa1'=>$_POST['ciudadempresa1'],
'ciudadempresa1ok'=>$_POST['ciudadempresa1ok'],
'ciudadempresa2'=>$_POST['ciudadempresa2'],
'ciudadempresa2ok'=>$_POST['ciudadempresa2ok'],
'laborppal'=>$_POST['laborppal'],
'labor1'=>$_POST['labor1'],
'labor2'=>$_POST['labor2'],
'labor3'=>$_POST['labor3'],
'comentario'=>$_POST['comentario'],
'estado'=>$_POST['estado']);



	$this->db->set($data);
	$this->db->where('id_datos',$id_datos);
	$this->db->update('datos');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solicitud De Empleo</title>
<link rel="stylesheet" type="text/css" href="epoch_styles.css" />
<script language="javascript">
function mis_datos(){
var key=window.event.keyCode;
if (key < 48 || key > 57){
window.event.keyCode=0;
}}
</script>
<script type="text/javascript" src="epoch_classes.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
/*You can also place this code in a separate file and link to it like epoch_classes.js*/
	var bas_cal,dp_cal,ms_cal;      
window.onload = function () {
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container2'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container3'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container4'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container5'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container6'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container7'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container8'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container9'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container10'));
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container11'));
};
/*]]>*/
</script>
<script type="text/javascript" src="epoch_classes.js"></script>
<link href="/res/css/estiloa.css" rel="stylesheet" type="text/css" />
<link href="/res/css/estilo.css" rel="stylesheet" type="text/css" />
<link href="/res/css/home-2007.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo85 {color: #FF6600}
.Estilo86 {font-size: 11px}
.Estilo88 {color: #FF6600; font-weight: bold; }
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<?php
   $this->db->select('*');
   $this->db->from('datos');
   $this->db->where('id_datos',$id_datos);
   $res = $this->db->get();
   if($res->num_rows()>0){$rows = $res->row_array();}else{exit();}
   extract($rows);
?>
<body>
<table width="950" height="1400" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
 <form name="hojavida" method="post" action="" onSubmit="return validar(this);">  
   <tr>
     <td background="images/informacionpersonal.png" class="comenta">&nbsp;</td>
   </tr>
   <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Primer Nombre 
      <input name="primernombreok" type="checkbox" id="primernombreok" value="1"  <?php if($primernombreok=='1'){ ?>checked="checked"<?php }?> />
      <input name="primernombre" type="text" <?php if($primernombreok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> 
	  id="primernombre" value="<?php echo $primernombre; ?>" onChange="javascript:this.value=this.value.toUpperCase();" size="30" />      
       Segundo Nombre
       <input name="segundonombreok" type="checkbox" id="segundonombreok" value="1" <?php if($segundonombreok=='1'){ ?>checked="checked"<?php }?>/>
<input name="segundonombre" type="text" <?php if($segundonombreok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> 
id="segundonombre" value="<?php echo $segundonombre; ?>" onChange="javascript:this.value=this.value.toUpperCase();" size="30" /></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Primer Apellido 
      <input name="primerapellidook" type="checkbox" id="primerapellidook" value="1" <?php if($primerapellidook=='1'){ ?>checked="checked"<?php }?>/>
      <input name="primerapellido" type="text" <?php if($primerapellidook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>
	   id="primerapellido" value="<?php echo $primerapellido; ?>" onChange="javascript:this.value=this.value.toUpperCase();" size="30" />
      Segundo Apellido 
    <input name="segundoapellidook" type="checkbox" id="segundoapellidook" value="1" <?php if($segundoapellidook=='1'){ ?>checked="checked"<?php }?>/>
      <input name="segundoapellido" type="text" <?php if($segundoapellidook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>
	  id="segundoapellido" value="<?php echo $segundoapellido; ?>" onChange="javascript:this.value=this.value.toUpperCase();" size="30" /></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Numero de cedula 
      <input name="cedulaok" type="checkbox" id="cedulaok" value="1" <?php if($cedulaok=='1'){ ?>checked="checked"<?php }?>/>
      <label>
      <input name="cedula" type="text" <?php if($cedulaok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>
	   id="cedula"  onKeypress="mis_datos()" value="<?php echo $cedula; ?>" onChange="javascript:this.value=this.value.toUpperCase();"/>
      de 
      <input name="decedulaok" type="checkbox" id="decedulaok" value="1" <?php if($decedulaok=='1'){ ?>checked="checked"<?php }?>/> 
      <input name="decedula" type="text" <?php if($decedulaok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="decedula" value="<?php echo $decedula; ?>" onChange="javascript:this.value=this.value.toUpperCase();" />
      &nbsp;sexo: 
      <input name="sexook" type="checkbox" id="sexook" value="1" <?php if($sexook=='1'){ ?>checked="checked"<?php }?>/> 
      <select name="sexo" id="sexo" <?php if($sexook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>>
	     <option selected="selected"><?php echo $sexo; ?></option>
        <option></option>
        <option>Masculino</option>
        <option>Femenino</option>
      </select>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;Fecha de Nacimiento: 
      <label>
    <input name="fechanacimientook" type="checkbox" id="fechanacimientook" value="1" <?php if($fechanacimientook=='1'){ ?>checked="checked"<?php }?>/>
    <input name="fechanacimiento" type="text" <?php if($cedulaok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>
	   id="fechanacimiento"  onkeypress="mis_datos()" value="<?php echo $fechanacimiento; ?>" onchange="javascript:this.value=this.value.toUpperCase();"/>
      </label>
      &nbsp;
      <label></label>      
      &nbsp;&nbsp;&nbsp;
      Lugar de Nacimiento 
      <label>
      <input name="lugarnacimientook" type="checkbox" id="lugarnacimientook" value="1" <?php if($lugarnacimientook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="lugarnacimiento" type="text" <?php if($lugarnacimientook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="lugarnacimiento" value="<?php echo $lugarnacimiento; ?>" size="30" onChange="javascript:this.value=this.value.toUpperCase();" /></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Correo Electronico 
      <label>
      <input name="emailok" type="checkbox" id="emailok" value="1" <?php if($emailok=='1'){ ?>checked="checked"<?php }?>/>
      </label> 
      <label>
      <input name="email" type="text" <?php if($emailok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="email" value="<?php echo $email; ?>" size="25" />
      direccion Residencial 
      <input name="direccionok" type="checkbox" id="direccionok" value="1" <?php if($direccionok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="direccion" type="text" <?php if($direccionok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="direccion" value="<?php echo $direccion; ?>" size="60" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">ciudad de Residencia 
      <label>
      <input name="ciudadok" type="checkbox" id="ciudadok" value="1" <?php if($ciudadok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="ciudad" type="text" <?php if($ciudadok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ciudad" value="<?php echo $ciudad; ?>" size="15" onChange="javascript:this.value=this.value.toUpperCase();"/></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Casa: 
      <label>
      <input name="tipocasaok" type="checkbox" id="tipocasaok" value="1" <?php if($tipocasaok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
      <select name="tipocasa" <?php if($tipocasaok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="tipocasa">
        <option selected="selected"><?php echo $tipocasa; ?></option>
		<option></option>
        <option>Familiar</option>
        <option>Propia</option>
        <option>Arrendada</option>
      </select>
      Valor Arriendo 
      <input name="valorarriendook" type="checkbox" id="valorarriendook" value="1" <?php if($valorarriendook=='1'){ ?>checked="checked"<?php }?>/>
      <input name="valorarriendo" type="text" <?php if($valorarriendook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="valorarriendo"  onkeypress="mis_datos()" value="<?php echo $valorarriendo; ?>" size="9" maxlength="10" onChange="javascript:this.value=this.value.toUpperCase();"/>      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiempo de residencia en la vivienda actual: A&ntilde;os 
      <input name="tiempocasaaniook" type="checkbox" id="tiempocasaaniook" value="1" <?php if($tiempocasaaniook=='1'){ ?>checked="checked"<?php }?>/>
      <input name="tiempocasaanio" type="text" <?php if($tiempocasaaniook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="tiempocasaanio"  onKeypress="mis_datos()" value="<?php echo $tiempocasaanio; ?>" size="2" maxlength="2" onChange="javascript:this.value=this.value.toUpperCase();"/>
      y  Meses 
      <input name="tiempocasamesok" type="checkbox" id="tiempocasamesok" value="1" <?php if($tiempocasamesok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="tiempocasames" type="text" <?php if($tiempocasamesok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="tiempocasames"  onKeypress="mis_datos()" value="<?php echo $tiempocasames; ?>" size="2" maxlength="2" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Numero de telefono Fijo de su Residencia 
      <label>
      <input name="telefonook" type="checkbox" id="telefonook" value="1" <?php if($telefonook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
      <input name="telefono" type="text" <?php if($telefonook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="telefono"  onKeypress="mis_datos()" value="<?php echo $telefono; ?>" size="15" maxlength="15" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label>
      <label>Numero celular Personal 
      <input name="celularok" type="checkbox" id="celularok" value="1" <?php if($celularok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="celular" type="text" <?php if($celularok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="celular"  onKeypress="mis_datos()" value="<?php echo $celular; ?>" size="15" maxlength="15" onChange="javascript:this.value=this.value.toUpperCase();"/> 
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Nombre de un Familiar 
      <label>
      <input name="nombrefamiliarok" type="checkbox" id="nombrefamiliarok" value="1" <?php if($nombrefamiliarok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="nombrefamiliar" type="text" <?php if($nombrefamiliarok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="nombrefamiliar" value="<?php echo $nombrefamiliar; ?>" size="70" onChange="javascript:this.value=this.value.toUpperCase();" />
      telefono
      <input name="telefonofamiliarok" type="checkbox" id="telefonofamiliarok" value="1" <?php if($telefonofamiliarok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="telefonofamiliar" type="text" <?php if($telefonofamiliarok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="telefonofamiliar"  onKeypress="mis_datos()" value="<?php echo $telefonofamiliar; ?>" size="15" maxlength="15" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Nombre de un Vecino&nbsp;
      <label>
      <input name="nombrevecinook" type="checkbox" id="nombrevecinook" value="1" <?php if($nombrevecinook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
      <input name="nombrevecino" type="text" <?php if($nombrevecinook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="nombrevecino" value="<?php echo $nombrevecino; ?>" size="70" />
telefono
<input name="telefonovecinook" type="checkbox" id="telefonovecinook" value="1" <?php if($telefonovecinook=='1'){ ?>checked="checked"<?php }?>/>
<input name="telefonovecino" type="text" <?php if($telefonovecinook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="telefonovecino"  onKeypress="mis_datos()" value="<?php echo $telefonovecino; ?>" size="15" maxlength="15" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;estado Civil 
      <label>
      <input name="estadocivilok" type="checkbox" id="estadocivilok" value="1" <?php if($estadocivilok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
      <select name="estadocivil" <?php if($estadocivilok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="estadocivil">
	    <option selected="selected"><?php echo $estadocivil; ?></option>
        <option></option>
        <option>Soltero</option>
        <option>Casado</option>
        <option>Separado</option>
        <option>U. Libre</option>
      </select>
      Numero de Hijos 
      <input name="numerohijosok" type="checkbox" id="numerohijosok" value="1" <?php if($numerohijosok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="numerohijos" type="text" <?php if($numerohijosok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="numerohijos"  onKeypress="mis_datos()" value="<?php echo $numerohijos; ?>" size="2" maxlength="2" onChange="javascript:this.value=this.value.toUpperCase();"/>
</label></td>
  </tr>
  <tr>
    <td width="0" height="0" background="images/experiencialaboral.png" class="comenta">&nbsp;</td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;<span class="Estilo85">&nbsp;&nbsp;<strong>Nombre de Ultima Empresa Donde ha Trabajo</strong></span>&nbsp;
      <label>
      <input name="ultimaempresa1ok" type="checkbox" id="ultimaempresa1ok" value="1" <?php if($ultimaempresa1ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
        <label>
        <input name="ultimaempresa1" type="text" <?php if($ultimaempresa1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ultimaempresa1" 
		value="<?php echo $ultimaempresa1; ?>" size="40" onChange="javascript:this.value=this.value.toUpperCase();"/>
        &nbsp;telefono Empresa&nbsp;
        <input name="telefonoempresa1ok" type="checkbox" id="telefonoempresa1ok" value="1" <?php if($telefonoempresa1ok=='1'){ ?>checked="checked"<?php }?>/>
          <input name="telefonoempresa1" type="text" <?php if($telefonoempresa1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="telefonoempresa1"  onkeypress="mis_datos()" value="<?php echo $telefonoempresa1; ?>" size="10" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;direccion <label>
      <input name="direccionempresa1ok" type="checkbox" id="direccionempresa1ok" value="1" <?php if($direccionempresa1ok=='1'){ ?>checked="checked"<?php }?>/>
    </label>
      &nbsp;
        <label>
        <input name="direccionempresa1" type="text" <?php if($direccionempresa1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="direccionempresa1" value="<?php echo $direccionempresa1; ?>" size="50" onChange="javascript:this.value=this.value.toUpperCase();"/>
          &nbsp;&nbsp;&nbsp;ciudad 
          <input name="ciudadempresa1ok" type="checkbox" id="ciudadempresa1ok" value="1" <?php if($ciudadempresa1ok=='1'){ ?>checked="checked"<?php }?>/>
        <input name="ciudadempresa1" type="text" <?php if($ciudadempresa1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ciudadempresa1" value="<?php echo $ciudadempresa1; ?>" size="20" onChange="javascript:this.value=this.value.toUpperCase();"/>
          Ultimo Salario 
          <input name="ultimosalario1ok" type="checkbox" id="ultimosalario1ok" value="1" <?php if($ultimosalario1ok=='1'){ ?>checked="checked"<?php }?>/>
        <input name="ultimosalario1" type="text" <?php if($ultimosalario1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ultimosalario1"  onkeypress="mis_datos()" value="<?php echo $ultimosalario1;  ?>" size="10" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Cargo Desempe&ntilde;ado
      <label>
        <input name="cargodesempenado1ok" type="checkbox" id="cargodesempenado1ok" value="1" <?php if($cargodesempenado1ok=='1'){ ?>checked="checked"<?php }?>/>
        <input name="cargodesempenado1" type="text" <?php if($cargodesempenado1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="cargodesempenado1" value="<?php echo $cargodesempenado1; ?>" size="20" onChange="javascript:this.value=this.value.toUpperCase();"/>
        Nombre supervisor Inmediato 
        <input name="supervisor1ok" type="checkbox" id="supervisor1ok" value="1" <?php if($supervisor1ok=='1'){ ?>checked="checked"<?php }?>/>
        <input name="supervisor1" type="text" <?php if($supervisor1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="supervisor1" value="<?php echo $supervisor1; ?>" size="45" onChange="javascript:this.value=this.value.toUpperCase();"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Fecha Inicio AntePeniltimo Empleo:&nbsp;
      <label>
      <input name="inicioempleo1ok" type="checkbox" id="inicioempleo1ok" value="1" <?php if($inicioempleo1ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      &nbsp;
      <input name="inicioempleo1" type="text"  value="<?php echo $inicioempleo1; ?>" <?php if($inicioempleo1ok=='1'){?>class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>value="<?php $inicioempleo1; ?>"  id="popup_container2"/>      
      &nbsp; 
      Fecha Fin  AntePeniltimo Empleo: 
      <label>
      <input name="finempleo1ok" type="checkbox" id="finempleo1ok" value="1" <?php if($finempleo1ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="finempleo1" type="text" id="popup_container3" <?php if($finempleo1ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $finempleo1; ?>"/></td>
  </tr>
  <tr>
    <td height="0" class="comenta">&nbsp;</td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;<span class="Estilo88"><strong>Nombre de Penultima Empresa Donde ha Trabajo</strong></span>&nbsp;
      <label>
      <input name="ultimaempresa2ok" type="checkbox" id="ultimaempresa2ok" value="1" <?php if($ultimaempresa2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>      &nbsp;&nbsp;
        <label>
        <input name="ultimaempresa2" type="text" <?php if($ultimaempresa2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ultimaempresa2" value="<?php echo $ultimaempresa2; ?>" size="40" />
          &nbsp;&nbsp;&nbsp;telefono Empresa&nbsp;
          <input name="telefonoempresa2ok" type="checkbox" id="telefonoempresa2ok" value="1" <?php if($telefonoempresa2ok=='1'){ ?>checked="checked"<?php }?>/>
          &nbsp;&nbsp;
          <input name="telefonoempresa2" type="text" <?php if($telefonoempresa2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="telefonoempresa2"  onkeypress="mis_datos()" value="<?php echo $telefonoempresa2; ?>" size="10"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;direccion&nbsp;
      <label>
      <input name="direccionempresa2ok" type="checkbox" id="direccionempresa2ok" value="1" <?php if($direccionempresa2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
        <label>
        <input name="direccionempresa2" type="text" <?php if($direccionempresa2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="direccionempresa2" value="<?php echo $direccionempresa2; ?>" size="50" />
          &nbsp;&nbsp;&nbsp;ciudad
          <input name="ciudadempresa2ok" type="checkbox" id="ciudadempresa2ok" value="1" <?php if($ciudadempresa2ok=='1'){ ?>checked="checked"<?php }?>/>
          <input name="ciudadempresa2" type="text" <?php if($ciudadempresa2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ciudadempresa2" value="<?php echo $ciudadempresa2; ?>" size="20" />
          Ultimo Salario 
          <input name="ultimosalario2ok" type="checkbox" id="ultimosalario2ok" value="1" <?php if($ultimosalario2ok=='1'){ ?>checked="checked"<?php }?>/>
        <input name="ultimosalario2" type="text" <?php if($ultimosalario2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="ultimosalario2"  onkeypress="mis_datos()" value="<?php echo $ultimosalario2; ?>" size="10"/>
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Cargo Desempe&ntilde;ado 
      <label>
      <input name="cargodesempenado2ok" type="checkbox" id="cargodesempenado2ok" value="1" <?php if($cargodesempenado2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
        <input name="cargodesempenado2" type="text" <?php if($cargodesempenado2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="cargodesempenado2" value="<?php echo $cargodesempenado2; ?>" size="20" />
        Nombre supervisor Inmediato 
        <input name="supervisor2ok" type="checkbox" id="supervisor2ok" value="1" <?php if($supervisor2ok=='1'){ ?>checked="checked"<?php }?>/>
        <input name="supervisor2" type="text" <?php if($supervisor2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="supervisor2" value="<?php echo $supervisor2; ?>" size="45" />
      </label></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Fecha Inicio Penultimo Empleo: 
      <label>
      <input name="inicioempleo2ok" type="checkbox" id="inicioempleo2ok" value="1" <?php if($inicioempleo2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>      &nbsp;&nbsp;
      <input name="inicioempleo2" type="text" id="popup_container4" <?php if($inicioempleo2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $inicioempleo2; ?>"/>      
      &nbsp;&nbsp;&nbsp;Fecha Fin  Penultimo Empleo:&nbsp;
      <label>
      <input name="finempleo2ok" type="checkbox" id="finempleo2ok" value="1" <?php if($finempleo2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="finempleo2" type="text" id="popup_container5" <?php if($finempleo2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $finempleo2; ?>"/></td>
  </tr>
  
  <tr>
    <td class="comenta">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Nombre de la Institucion Donde Termino el bachillerato:&nbsp;
      <label>
      <input name="bachilleratook" type="checkbox" id="bachilleratook" value="1" <?php if($bachilleratook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      &nbsp; 
      <input name="bachillerato" type="text" <?php if($bachilleratook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="bachillerato" value="<?php echo utf8_encode($bachillerato); ?>" size="60" /> </td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Fecha Inicio  del Bachilleto 
      <label>
      <input name="iniciobachilleratook" type="checkbox" id="iniciobachilleratook" value="1" <?php if($iniciobachilleratook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="iniciobachillerato" type="text" id="popup_container8" <?php if($iniciobachilleratook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $iniciobachillerato; ?>"/>
      Fecha Finalizacion bachillerato 
      <label>
      <input name="finbachilleratook" type="checkbox" id="finbachilleratook" value="1" <?php if($finbachilleratook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="finbachillerato" type="text" id="popup_container9" <?php if($finbachilleratook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $finbachillerato; ?>"/></td>
  </tr>
  <?php if($tipogrado!='Seleccione'){ ?>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;En caso de no terminar sus estudios indique hasta que grado curso 
      <label>
      <input name="gradook" type="checkbox" id="gradook" value="1" <?php if($gradook=='1'){ ?>checked="checked"<?php }?>/>
      </label> 
      <input name="grado" type="text" <?php if($gradook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="grado"  onKeypress="mis_datos()" value="<?php echo $grado; ?>" size="2" maxlength="2"/>
      De 
	  
      <label>
      <input name="tipogradook" type="checkbox" id="tipogradook" value="1" <?php if($tipogradook=='1'){ ?>checked="checked"<?php }?>/>
      <select name="tipogrado" <?php if($tipogradook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="tipogrado">
        <option selected="selected"><?php echo $tipogrado; ?></option>
		<option></option>
        <option>Primaria</option>
        <option>bachillerato</option>
      </select>
      </label></td>
  </tr>
  <?php } ?>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Especifique que estudios culmino 
      <label>
      <input name="estudiosok" type="checkbox" id="estudiosok" value="1" <?php if($estudiosok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
      <select name="estudios" <?php if($estudiosok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="estudios">
        <option selected="selected"><?php echo $estudios; ?></option>
		<option></option>
        <option>Tecnico</option>
        <option>Tecnologico</option>
        <option>Universitario</option>
      </select>
      &nbsp;&nbsp;&nbsp;Nombre de la instituci&oacute;n  
      <input name="institucionestudiook" type="checkbox" id="institucionestudiook" value="1" <?php if($institucionestudiook=='1'){ ?>checked="checked"<?php }?>/>
      <input name="institucionestudio" type="text" <?php if($institucionestudiook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="institucionestudio" value="<?php echo $institucionestudio; ?>" size="50" />
      </label></td>
  </tr>
  
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Fecha Inicio estudios 
      <label>
      <input name="inicioestudiosok" type="checkbox" id="inicioestudiosok" value="1" <?php if($inicioestudiosok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="inicioestudios" type="text" id="popup_container10" <?php if($inicioestudiosok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>value="<?php echo $inicioestudios; ?>"/>
      Fecha Fin  estudios 
      <label>
      <input name="finestudiosok" type="checkbox" id="finestudiosok" value="1" <?php if($finestudiosok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="finestudios" type="text" id="popup_container11" <?php if($finestudiosok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $finestudios; ?>"/></td>
  </tr>
  <tr>
    <td class="comenta">&nbsp;&nbsp;&nbsp;Nombre del titulo obtenido&nbsp;
      <label>
      <input name="nombretitulook" type="checkbox" id="nombretitulook" value="1" <?php if($nombretitulook=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      &nbsp; 
      <input name="nombretitulo" type="text" <?php if($nombretitulook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="nombretitulo" value="<?php echo $nombretitulo; ?>" size="30" />
      <label></label></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;Especifique que estudios culmino 
      <label>
      <input name="estudios2ok" type="checkbox" id="estudios2ok" value="1" 
			<?php if($estudios2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <label>
      <select name="estudios2" <?php if($estudios2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="estudios2">
        <option selected="selected"><?php echo $estudios2; ?></option>
		<option></option>
        <option>Tecnico</option>
        <option>Tecnologico</option>
        <option>Universitario</option>
      </select>
      &nbsp;&nbsp;&nbsp;Nombre de la instituci&oacute;n  
      <input name="institucionestudio2ok" type="checkbox" id="institucionestudio2ok" value="1" 
			<?php if($institucionestudio2ok=='1'){ ?>checked="checked"<?php }?>/>
      <input name="institucionestudio2" type="text" <?php if($institucionestudiook=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="institucionestudio2" value="<?php echo $institucionestudio2; ?>" size="50" />
      </label></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;Fecha Inicio estudios 
      <label>
    <input name="inicioestudios2ok" type="checkbox" id="inicioestudios2ok" value="1" <?php if($inicioestudios2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="inicioestudios2" type="text" id="popup_container10" <?php if($inicioestudios2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?>value="<?php echo $inicioestudios2; ?>"/>
      Fecha Fin  estudios 
      <label>
      <input name="finestudios2ok" type="checkbox" id="finestudios2ok" value="1" <?php if($finestudios2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="finestudios2" type="text" id="popup_container11" <?php if($finestudios2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> value="<?php echo $finestudios2; ?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;Nombre del titulo obtenido&nbsp;
      <label>
      <input name="nombretitulo2ok" type="checkbox" id="nombretitulo2ok" value="1" <?php if($nombretitulo2ok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      &nbsp; 
      <input name="nombretitulo2" type="text" <?php if($nombretitulo2ok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="nombretitulo2" value="<?php echo $nombretitulo2; ?>" size="30" /> 
      Que otros estudios adelanta  
      <label>
      <input name="estudiosactualmenteok" type="checkbox" id="estudiosactualmenteok" value="1" <?php if($estudiosactualmenteok=='1'){ ?>checked="checked"<?php }?>/>
      </label>
      <input name="estudiosactualmente" type="text" <?php if($estudiosactualmenteok=='1'){?> class="imputbox2" <?php }else{?>class="imputbox"<?php } ?> id="estudiosactualmente" value="<?php echo $estudiosactualmente; ?>" size="30" /> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Estado&nbsp;&nbsp;
      <select name="estado" id="estado" onchange="this.form.submit();">
            <option  <?php if($estado=='No Preseleccionado'){ ?> selected="selected"<?php } ?>>No Preseleccionado</option>
            <option <?php if($estado=='Preseleccionado'){ ?> selected="selected"<?php } ?>  >Preseleccionado</option>
			<option <?php if($estado=='Seleccionado'){ ?> selected="selected"<?php } ?>  >Seleccionado</option>
            <option <?php if($estado=='Disponible'){ ?> selected="selected"<?php } ?>  >Disponible</option>
			<option <?php if($estado=='Contratado'){ ?> selected="selected"<?php } ?>  >Contratado</option>
          </select></td>
  </tr>
   <tr>
    <td >
	<table width="100%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr>
        <td width="21%">Cargos a los que se Postula: </td>
        <td width="79%" colspan="6"><input name="laborppal" type="text" id="laborppal" size="45" value="<?php echo $laborppal; ?>" />
          <input name="labor1" type="text" id="labor1" size="45" value="<?php echo $labor1; ?>" /></td>
        </tr>
      <tr valign="top" >
        <td align="left" bgcolor="#599DCA" class="texto"> <p align="left"><span class="Estilo2"><strong><font color="#FFFFFF">OBSERVACIONES</font></strong></span></p></td>
        <td align="left" class="texto" bgcolor="#599DCA"><?php echo $comentario; ?></td>
      </tr>
      <tr valign="top" >
        <td align="left" class="texto">&nbsp;</td>
        <td align="left" class="texto"><label></label></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td align="center"><input name="Enviar" type="submit" id="Enviar" value="Guardar"/></td>
  </tr>
  </form>
</table>
</body>
</html>