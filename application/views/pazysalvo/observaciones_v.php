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
					url : '/pazysalvo/retirar_c/actualizarobservacion/',
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
    	<span class="par">Notas:</span><br>
        <input type="text" id="nota" name="nota" class="txt4 dat" value="<?php echo $nota; ?>" readonly disabled />
    </p>
	 <p>
    	<span class="par">Observacion Archivo Muerto:</span><br>
        <input type="text" id="obsarc" name="obsarc" class="txt6 dat" value="<?php echo $obsarc; ?>" readonly />
    </p>
	 <p>
    	<span class="par">Nueva Observacion Archivo Muerto:</span><br>
        <textarea name="nobser" cols="100" rows="5" id="nobser"></textarea>
    </p>
      <p><a href="#" class="update">Agregar</a>
      </p>

</form>
</body>
</html>