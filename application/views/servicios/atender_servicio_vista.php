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
	}).on('click',function(e){
		e.preventDefault();
		if($("#actualizar").validate().form()){
			$.ajax({
					url : '<?php echo base_url();?>servicios_c/actualizarservicio2/',
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
	   
	   $.post('<?php echo base_url();?>servicios_c/selectecnico/',function(		              selectecnico){
       if(selectecnico == '1'){alert('No hay Datos de Tecnicos');}else{
		  $('#id_tecnico').append("<option value=''> Seleccione Opción</option>");
		for(i=0; i< selectecnico.length; i++){
				$('<option/>').val(selectecnico[i].id_tecnico).text(selectecnico[i].nombres).   	 
				 appendTo('#id_tecnico');
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
.dat{}
.txt, .txt1, .txt2, .txt4, .txt5, .txt6{font-size:12px;padding:3px;width:185px;height:15px;}
.txt1, .txt4{width:300px;} .txt2{width:480px;}
.txt6{width:800px;}.txt5{width:160px;}
.update{font-size:13px;margin-left:230px;}
.nm{font-size:14px;color:#223B8D;font-weight:bold;}
.vlr, .fchdev{width:120px; font-size:10px;display:none;float:right;}
.error{border-color:#223B8D;background:#FCBE80;}
#problema,#obsasg,#solucion,#causa{ height: 50px; width: 800px;}


</style>
</head>
<body>
<form id="actualizar" name="actualizar" method="post">
	<p>
    	<span class="par">Numero del Servicio</span><br>
        <input type="text" id="codsrv" name="codsrv" class="txt dat required" value="<?php echo $codsrv; ?>" readonly/>
    </p>
    <p>
    	<span class="par">Fecha de Solicitud</span><br>
        <input type="text" id="addfch" name="addfch" class="txt dat" value="<?php echo $addfch; ?>" readonly />
    </p>
    <p>
    	<span class="par">Dispositivo</span><br>
        <input type="text" id="nomart" name="nomart" class="txt dat" value="<?php echo $nomart; ?>" readonly />
    </p>
    <p>
    	<span class="par">Identificacion del Solicitante</span><br>
        <input type="text" id="addusr" name="addusr" class="txt dat" value="<?php echo $addusr; ?>" readonly />
    </p>
    <p>
    	<span class="par">Nombres Y Apellidos</span><br>
        <input type="text" id="nombres" name="nombres" class="txt1 dat" value="<?php echo $nombres; ?>" readonly  />
    </p>
    <p>
    	<span class="par">Sede</span><br>
        <input type="text" id="nomsed" name="nomsed" class="txt4 dat" value="<?php echo $nomsed; ?>" readonly />
    </p>
    <p>
    	<span class="par">Cargo</span><br>
        <input type="text" id="cargo" name="cargo" class="txt5 dat" value="<?php echo $cargo; ?>" readonly />
    </p>
    <p>
    	<span class="par">Problema descrito por el usuario</span><br>
        <textarea  id="problema" name="problema" class="txt6 dat" readonly><?php echo $problema; ?></textarea>
    </p>
     <p>
    	<span class="par">Observaciónes al ser Asignado:</span><br>
        <textarea   class="txt6 dat" id="obsasg" name="obsasg" readonly><?php echo $obsasg; ?></textarea>
        
    </p>
    <p>
    	<span class="par">Causa</span><br>
        <textarea    id="causa" name="causa" class="txt6 dat"  ><?php echo $causa; ?></textarea>
    </p>
    <p>
    	<span class="par">Solución</span><br>
        <textarea   id="solucion" name="solucion" class="txt6 dat" ><?php echo $solucion; ?></textarea>
    </p>
     <p><span class="par">Solicitar Cierre</span>
       <input name="cierre" type="checkbox" id="cierre" value="1"></p>
      <p>
    	<a href="#" class="update">Registrar Avance</a>
      </p>

</form>
</body>
</html>