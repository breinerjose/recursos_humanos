<?php date_default_timezone_set("America/Bogota"); ?>
<!DOCTYPE html PUBLIC>
<html lang="es">
<head>
<meta charset="utf-8" />
<style>
*{margin:0; padding:0;}
body{font-family: 'Capriola',sans-serif; font-size:13px; font-weight:bold; }
#codigo{   border: 1px solid #CCCCCC;
	margin-left: 91px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 25px;}
#descripcion{border: 1px solid #CCCCCC;
	margin-left: 66px; 
    margin-right: 66px;
    margin-top: 10px;
    padding: 2px;
    width: 340px;}
#valor{   border: 1px solid #CCCCCC;
	margin-left: 107px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 80px;}
#vencimiento{   border: 1px solid #CCCCCC;
	margin-left: 10px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 50px;}		
#actualizar:hover{cursor:pointer;}
</style>
<script type="text/javascript">
	$(document).ready(function(e) {
        $('#codtrc').val('<?php echo $codtrc; ?>');
        $('#nomtrc').val('<?php echo $nomtrc; ?>');
        $('#codcaj').val('<?php echo $codcaj; ?>');
        $('#codest').val('<?php echo $codest; ?>');
		
		$('#actualizar').on('click',function(){
			codtrc = $('#codtrc').val();
			nomtrc = $('#nomtrc').val();
			codcaj = $('#codcaj').val();
			codest = $('#codest').val();
			
			if(codtrc!='' & codcaj!='1' & codest!='1'){
					$.ajax({
						url:'/Archivos_c/agregar_archivo',
						type:"POST",
						data:{'codtrc':codtrc,'nomtrc':nomtrc,'codcaj':codcaj,'codest':codest},
						success: function(resp){
							if(resp==0){
								//alert('Archivo Actualizado Satisfactoriamente');
								window.parent.cerrar_editar();
							}else{
								alert('Ocurrio un error o no realiza Cambios, intente más tarde');	
							}
						}	
					});
			}else{
				alert('El campo vencimiento, descripcion y valor no pueden ir vacios');	
			}
		});
		
    });
</script>
</head>
<body>
<div id="contenido">
	<div class="datos">
    	<p>Codigo: 
   	  <input type="text" id="codtrc" readonly></p>
    	<p>Nombre:<input type="text" id="nomtrc" size="70"> </p>
        <p>Estante: <input type="text" id="codest"> </p>
		  <p>Caja: <input type="text" id="codcaj"></p>
        <p><button id="actualizar"><img src="/recursos/images/editar.png"> Actualizar</button></p>
    </div>
</div>
</body>
</html>