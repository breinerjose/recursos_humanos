<script type="text/javascript">
$(document).ready(function() {
	
$('#actualizar<?php echo $ale; ?>').click(function () {
		if($("#cambiarpass").validate().form()){
				$.ajax({
						url:"/base/Configuracion_c/cambiarPassword",
						data:$('form#cambiarpass').serialize(),
						type:"POST",
						dataType:"json",
						success: function(resp){
							if(resp=='1'){
								 alert('Actualización Exitosa');
								 setTimeout(function(){ $('#cambiarpass').get(0).reset();}, 900);
							 }else{alert('Error al actualizar Contraseña');}
						}
				});
		 }else{
			alert('Hay campos pendientes por llenar');	
		 }	
	});
	
	$('#anterior').blur(function(){
		var pass = $('#anterior').val();
	   $.post('/base/Configuracion_c/verificarPassword',{'contr':pass},function(resp){
	   		if(resp!='1'){
				alert('La Contraseña no Coinciden');
				$('#anterior').val('');
			}
	   },'json');
	});
   /* */
});
</script>

<div class="row">
    <form id="cambiarpass" name="cambiarpass" method="post">
       <div class="col-md-12">
       <div class=" form-group">
        <label class="control-label">Contraseña Actual</label>
    		<input type="text" class="form-control required" id="anterior" name="anterior"/>
        </div>
        </div>
		
    	<div class="col-md-12">
        <div class=" form-group">
        <label class="control-label">Nueva Contraseña</label>
    		<input type="text" class="form-control required" id="nueva" name="nueva" minlength="8"/>
        </div>
		</div>
		
		<div class="col-md-12">
        <div class=" form-group">
        <label class="control-label">Repetir Contraseña</label>
    		<input type="text" class="form-control required"  id="rnueva" name="rnueva" minlength="8" equalTo="#nueva"/>
        </div>
		</div>
		
		<div class="col-md-12">
       <div class="item form-group">
       <center><button type="button" id="actualizar<?php echo $ale;?>" style="margin-top: 5px;" class="btn btn-danger"> <i class="fa fa-save"></i> Cambiar Clave</button></center>
       </div>
       </div>
    </form>
</div>