<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualizar Paz y Salvo</title>
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/validate/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="/recursos/jquery/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript">
jQuery.validator.messages.required = "";jQuery.validator.messages.digits = "";
$(document).ready(function(){

	$('.update').button({
		icons:{primary:"ui-icon-refresh"}
	}).on('click',function(){
		if($("#actualizar").validate().form()){
			$.ajax({
					url : '/pazysalvo/retirar_c/actualizarPazysalvo/',
					type : 'POST',
					data : $('form#actualizar').serialize(), 
					success : function (resp){
						if(resp == '1'){
							alert('Proceso Exitoso');
							/*window.parent.cerraDialogo();	*/
						}else{
							alert('Error al actualizar');
							}
					}//fin success
			  });
		}else{
			alert('Campos Pendientes por llenar--');	
		 }
	   });
	   
	   $('.ck').on('click',function(){
		 var cod = $(this).val();
		  if(cod=='SI'){
			  $('#valor').css('display','inline-block');
			  $('#valor').removeAttr("disabled");
			  $('#valor').addClass('required digits');
		  }else{
			  $('#valor').css('display','none');
			  $('#valor').attr("disabled");
			  $('#valor').removeClass('required digits');
		 }
		 });
		 
		 	$('.update2').button({
		icons:{primary:"ui-icon-refresh"}
	}).on('click',function(){
		if($("#actualizar").validate().form()){
			$.ajax({
					url : '/pazysalvo/retirar_c/actualizarPazysalvo2/',
					type : 'POST',
					data : $('form#actualizar').serialize(), 
					success : function (resp){
						if(resp == '1'){
							alert('Proceso Exitoso');
							window.parent.cerraDialogo();	
						}else{
							alert('Error al actualizar');
							}
					}//fin success
			  });
		}else{
			alert('Campos Pendientes por llenar');	
		 }
	   });
	   
	   $('.ck').on('click',function(){
		 var cod = $(this).val();
		  if(cod=='SI'){
			  $('#valor').css('display','inline-block');
			  $('#valor').removeAttr("disabled");
			  $('#valor').addClass('required digits');
		  }else{
			  $('#valor').css('display','none');
			  $('#valor').attr("disabled");
			  $('#valor').removeClass('required digits');
		 }
		 });
		 
		 $('.dck').on('click',function(){
		 var id = $(this).val();
		  if(id=='SI'){
			  $('#t').css('display','inline-block');
			  $('#t').removeAttr("disabled");
			  $('#t').addClass('required');
		  }else{
			  $('#t').css('display','none');
			  $('#t').attr("disabled");
			  $('#t').removeClass('required');
		 }
		 });
		 
		 $('#t').datepicker({
			dateFormat:'yy-mm-dd' 
		});
});
</script>
<style type="text/css">
.nm{font-weight:bold;color:#000;}
#actualizar p{display:inline-block;margin:0.25em; font-size:12px;}
span.par{font-size:12.5px;font-weight:bold;color:#223B8D;}
table tr td.inf{font-size:11px;}
.dat{background:#F0F0F0;}
.txt, .txt1, .txt2, .txt4, .txt5, .txt6{font-size:12px;padding:3px;width:185px;height:15px;}
.txt1, .txt4{width:300px;} .txt2{width:480px;}
.txt6{width:800px;}.txt5{width:160px;}
.update{font-size:13px;}
.update2{font-size:13px;margin-left:250px;}
.nm{font-size:14px;color:#223B8D;font-weight:bold;}
.vlr, .fchdev{width:120px; font-size:10px;display:none;float:right;}
.error{border-color:#223B8D;background:#FCBE80;}

</style>
</head>
<body>
<form id="actualizar" name="actualizar" method="post">
	<p>
    	<span class="par">Paz y Salvo</span><br>
        <input type="text" id="numero" name="numero" class="txt dat required" value="<?php echo $numero; ?>" readonly />
    </p>
    <p>
    	<span class="par">Empresa</span><br>
        <input type="text" id="empresa" name="empresa" class="txt dat" value="<?php echo $logo; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Periodo de Pago</span><br>
        <input type="text" id="periodo" name="periodo" class="txt dat" value="<?php echo $per; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Nit y/o CC</span><br>
        <input type="text" id="nit" name="nit" class="txt dat" value="<?php echo $cedula; ?>" readonly disabled>
    </p>
    <p>
    	<span class="par">Nombres Y Apellidos</span><br>
        <input type="text" id="numero" name="numero" class="txt1 dat" value="<?php echo $nombre; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Empresa Cliente</span><br>
        <input type="text" id="empretiro" name="empretiro" class="txt4 dat" value="<?php echo $empclt; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Fecha de Retiro</span><br>
        <input type="text" id="fechar" name="fechar" class="txt5 dat" value="<?php echo $fchter; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Causa de terminación</span><br>
        <input type="text" id="causa" name="causa" class="txt2 dat" value="<?php echo $causa; ?>" readonly disabled />
    </p>
     <p>
    	<span class="par">Observación:</span><br>
        <input type="text" id="observ" name="observ" class="txt4 dat"  value="<?php echo $obs; ?>" readonly disabled />
    </p>
     <p>
    	<span class="par">Notas:</span><br>
        <input type="text" id="nota" name="nota" class="txt6 dat" value="<?php echo $nota; ?>" readonly disabled />
    </p>
    <table width="100%" id="display">
        <tr>
        	<td width="27%"><span class="par">&raquo; Reporte de producción y/o tiempo en medio físico<?php echo $g; ?></span></td>
            <td class="inf" width="11%"> 
            	<input type="radio" id="g1" name="g" value="SI" <?php if($g == 'SI'){?>checked<?php }?> />SI&nbsp;
        		<input type="radio" id="g2" name="g" value="NO" <?php if($g == 'NO'){?>checked<?php }?>/>NO&nbsp;
        		<input type="radio" id="g3" name="g" value="N/A" />N/A&nbsp;
            </td>
            <td width="22%"><span class="par">&nbsp;&nbsp;&raquo; Se realizó examen médico de ingreso</span></td>
            <td class="inf" width="12%">
                <input type="radio" id="n1" name="n" value="SI" <?php if($n == 'SI'){?>checked<?php }?>/>SI&nbsp;
                <input type="radio" id="n2" name="n" value="NO" <?php if($n == 'NO'){?>checked<?php }?>/>NO&nbsp;
                <input type="radio" id="n3" name="n" value="N/A" />N/A&nbsp;
            </td>
        </tr>
        <tr>
        	<td><span class="par">&raquo; Reporte de producción y/o tiempo en medio electrónico</span></td>
            <td class="inf"> 
            	<input name="h" type="radio" id="h1" value="SI" <?php if($h == 'SI'){?>checked<?php }?>/>SI&nbsp;
        		<input name="h" type="radio" id="h2" value="NO" <?php if($h == 'NO'){?>checked<?php }?>/>NO&nbsp;
        		<input name="h" type="radio" id="h3"  value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Se realizó examen médico de egreso</span></td>
            <td class="inf">
                <input type="radio" id="o1" name="o" value="SI" <?php if($o == 'SI'){?>checked<?php }?>/>SI&nbsp;
                <input type="radio" id="o2" name="o" value="NO" <?php if($o == 'NO'){?>checked<?php }?>/>NO&nbsp;
                <input type="radio" id="o3" name="o" value="N/A" />N/A&nbsp;
            </td>
            
        </tr>
        <tr>
            <td><span class="par">&raquo; Paz y salvo empresa cliente</span></td>
            <td class="inf">
                <input type="radio" id="i1" name="i" value="SI" <?php if($i == 'SI'){?>checked<?php }?>/>SI&nbsp;
                <input type="radio" id="i2" name="i" value="NO" <?php if($i == 'NO'){?>checked<?php }?>/>NO&nbsp;
                <input type="radio" id="i3" name="i" value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Devolución de carnet de ASAP - ASECO</span></td>
            <td class="inf"> 
            	<input type="radio" id="p1" name="p" value="SI" <?php if($p == 'SI'){?>checked<?php }?>/>SI&nbsp;
        		<input type="radio" id="p2" name="p" value="NO" <?php if($p == 'NO'){?>checked<?php }?>/>NO&nbsp;
        		<input type="radio" id="p3" name="p" value="N/A" />N/A&nbsp;
            </td>

        </tr>
        <tr>
           <td><span class="par">&raquo; Paz y salvo cooperativa </span></td>
            <td class="inf">
                <input type="radio" id="j1" name="j" value="SI" <?php if($j == 'SI'){?>checked<?php }?>/>SI&nbsp;
                <input type="radio" id="j2" name="j" value="NO" <?php if($j == 'NO'){?>checked<?php }?>/>NO&nbsp;
                <input type="radio" id="j3" name="j" value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Devolución de carnet de la ARP</span></td>
            <td class="inf">
                <input type="radio" id="q1" name="q" value="SI" <?php if($q == 'SI'){?>checked<?php }?>/>SI&nbsp;
                <input type="radio" id="q2" name="q" value="NO" <?php if($q == 'NO'){?>checked<?php }?>/>NO&nbsp;
                <input type="radio" id="q3" name="q"value="N/A"  />N/A&nbsp;
            </td>
        </tr>
         <tr>
           <td><span class="par">&raquo; Paz y salvo dotación y herramientas de trabajo</span></td>
            <td class="inf"> 
            	<input type="radio" id="k1" name="k" value="SI" <?php if($k == 'SI'){?>checked<?php }?>/>SI&nbsp;
        		<input type="radio" id="k2" name="k" value="NO" <?php if($k == 'NO'){?>checked<?php }?>/>NO&nbsp;
        		<input type="radio" id="k3" name="k" value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Devolución de carnet de la empresa cliente</span></td>
            <td class="inf"> 
            	<input type="radio" id="r1" name="r" value="SI" <?php if($r == 'SI'){?>checked<?php }?>/>SI&nbsp;
        		<input type="radio" id="r2" name="r" value="NO" <?php if($r == 'NO'){?>checked<?php }?>/>NO&nbsp;
        		<input type="radio" id="r3" name="r" value="N/A"  />N/A&nbsp;
            </td>
        	
        </tr>
        <tr>
         <td><span class="par">&raquo; Descuentos pendientes</span></td>
            <td class="inf"> 
            	<input type="radio" id="l1" name="l" value="SI"  class="ck"/>SI&nbsp;
        		<input type="radio" id="l2" name="l" value="NO"  class="ck"/>NO&nbsp;
        		<input type="radio" id="l3" name="l" checked value="N/A" class="ck" />N/A&nbsp;
            </td>
        	<td colspan="2"><span class="par">&nbsp;&nbsp;&raquo; Valor</span>
            &nbsp;<input type="text" id="valor" name="valor" class="vlr" maxlength="3" placeholder="Digite valor" disabled/>
            </td>
        </tr>
         <tr>
         <td><span class="par">&raquo; Se entrego dotación</span></td>
            <td class="inf">
                <input type="radio" id="dotacion1" name="dotacion" class="dck" value="SI" />SI&nbsp;
                <input type="radio" id="dotacion2" name="dotacion" class="dck" value="NO" checked />NO&nbsp;
            </td>
        	<td colspan="2"><span class="par">&nbsp;&nbsp;&raquo; Fecha de devolución de dotación:</span>
            &nbsp;<input type="text" id="t" name="t" class="fchdev" readonly disabled value="0000-00-00" />
            </td>
        </tr>
         <tr>
         <td colspan="3">
            <span class="par">&raquo; Documento anexo: (Notificación escrita del cliente sobre la terminación del contrato)</span>
            </td>
            <td class="inf"> 
            	<input type="radio" id="m1" name="m" value="SI" />SI&nbsp;
        		<input type="radio" id="m2" name="m" value="NO" />NO&nbsp;
        		<input type="radio" id="m3" name="m" checked value="N/A" />N/A&nbsp;
            </td>
        	
        </tr>
    </table>
      <p>
    	<a href="#" class="update2">Cerrar Paz y Salvo</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="update">Actualizar Paz y Salvo</a>
      </p>

</form>
</body>
</html>