<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asignar Tecnico a Servicio</title>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/validate/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript">
jQuery.validator.messages.required = "";jQuery.validator.messages.digits = "";
$(document).ready(function(){

	$('.update').button({
		icons:{primary:"ui-icon-refresh"}
	}).on('click',function(){
		if($("#actualizar").validate().form()){
			$.ajax({
					url : '<?php echo base_url();?>servicios_c/actualizarservicio1/',
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
	   
	   $.post('<?php echo base_url();?>servicios_c/selectecnico/',function(selectecnico){
       	if(selectecnico == '1'){alert('No hay Datos de Tecnicos');}else{
		  $('#id_tecnico').append("<option value=''> Seleccione Opción</option>");
		for(i=0; i< selectecnico.length; i++){
				$('<option/>').val(selectecnico[i].id_tecnico).text(selectecnico[i].nomtrc).appendTo('#id_tecnico');
				 $('#id_tecnico option[value="<?php echo $tecnico; ?>"]').attr('selected',true);
			  }
		}
	   },'json');	
	   
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
.seleccion1, .seleccion2{
	width:520px;
	padding:4px;
	height:25px;
	margin-left:62px;
	}
.nm{font-weight:bold;color:#000;}
#actualizar p{display:inline-block;margin:0.25em; font-size:12px;}
span.par{font-size:12.5px;font-weight:bold;color:#223B8D;}
table tr td.inf{font-size:11px;}
.dat{background:#F0F0F0;}
.txt, .txt1, .txt2, .txt4, .txt5, .txt6{font-size:12px;padding:3px;width:185px;height:15px;}
.txt1, .txt4{width:300px;} .txt2{width:480px;}
.txt6{width:800px;}.txt5{width:160px;}
.update{font-size:13px;margin-left:355px;}
.nm{font-size:14px;color:#223B8D;font-weight:bold;}
.vlr, .fchdev{width:120px; font-size:10px;display:none;float:right;}
.error{border-color:#223B8D;background:#FCBE80;}
#problema{ height: 80px; width: 800px;}
#obsasg{ height: 50px; width: 800px;}

</style>
</head>
<body>
<form id="actualizar" name="actualizar" method="post">
	<p>
    	<span class="par">Numero del Servicio</span><br>
        <input type="text" id="codsrv" name="codsrv" class="txt dat required" value="<?php echo $codsrv; ?>" readonly />
    </p>
    <p>
    	<span class="par">Fecha de Solicitud</span><br>
        <input type="text" id="addfch" name="addfch" class="txt dat" value="<?php echo $addfch; ?>" readonly />
    </p>
    <p>
    	<span class="par">Dispositivo</span><br>
        <input type="text" id="nomart" name="nomart" class="txt dat" value="<?php echo $nomart; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Identificacion del Solicitante</span><br>
        <input type="text" id="addusr" name="addusr" class="txt dat" value="<?php echo $addusr; ?>" readonly disabled>
    </p>
    <p>
    	<span class="par">Nombres Y Apellidos</span><br>
        <input type="text" id="nombres" name="nombres" class="txt1 dat" value="<?php echo $nomtrc; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Sede</span><br>
        <input type="text" id="nomsed" name="nomsed" class="txt4 dat" value="<?php echo $nomsed; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Cargo</span><br>
        <input type="text" id="cargo" name="cargo" class="txt5 dat" value="<?php echo $cargo; ?>" readonly disabled />
    </p>
    <p>
    	<span class="par">Problema</span><br>
        <textarea  id="problema" name="problema" class="txt6 dat" readonly disabled ><?php echo $problema; ?></textarea>
    </p>
     <p>
    	<span class="par">Observación:</span><br>
        <textarea id="obsasg" name="obsasg" class="txt6 dat"><?php echo $obsasg; ?></textarea>
    </p>
     <p>
	<span>Asignar a Tecnico</span>
  <select name="id_tecnico" id="id_tecnico" class="seleccion1 required" ></select></p>
      <p>
    	<a href="#" class="update">Asignar Servicio</a>
      </p>

</form>
</body>
</html>