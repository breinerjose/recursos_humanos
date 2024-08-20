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
    width:100px;}
#descripcion{border: 1px solid #CCCCCC;
	margin-left: 58px; 
    margin-right: 66px;
    margin-top: 10px;
    padding: 2px;
    width: 340px;}
#veps{   border: 1px solid #CCCCCC;
	margin-left: 25px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 100px;}
#varl{   border: 1px solid #CCCCCC;
	margin-left: 25px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 100px;}		
#vasumido{   border: 1px solid #CCCCCC;
	margin-left: 41px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 100px;}
#recibo{   border: 1px solid #CCCCCC;
	margin-left: 59px; 
    font-size: 12px;
    margin-top: 5px;
    padding: 2px;
    width: 100px;}		
#actualizar:hover{cursor:pointer;}
</style>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/js/funciones.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
        $('#codigo').val('<?php echo $codinc; ?>');
		
		$('#actualizar').on('click',function(){
			codigo = $('#codigo').val();
			varl = $('#varl').val();
			veps = $('#veps').val();
			obs = $('#descripcion').val();
			vasumido = $('#vasumido').val();
			recibo = $('#recibo').val();
			
			if(descripcion!='' & (varl!='' || veps!='' || vasumido!='')){
					$.ajax({
						url:'/incapacidades_c/actualizar_pagado',
						type:"POST",
						data:{'codigo':codigo,'varl':varl,'veps':veps,'obs':obs,'vasumido':vasumido,'recibo':recibo},
						success: function(resp){
							if(resp==1){
								alert('Incapacidad Actualizado Satisfactoriamente');
								window.parent.cerraDialogo();
							}else{
								alert('Ocurrio un error por favor informar');	
							}
						}	
					});
			}else{
				alert('Por lo menos debe haber campo de Valor Lleno');	
			}
		});
		
    });
</script>
</head>
<body>
<div id="contenido">
	<div class="datos">
    	<p>Codigo: 
   	  <input type="text" id="codigo" readonly></p>
        <p>Valor Pagado Eps:
          <input type="text" id="veps"></p>
        <p>Valor Pagado Arl :
          <input type="text" id="varl"></p>
		<p>Valor Asumido :
         <input type="text" id="vasumido"></p>
		 <p>Recibo Nro. :
         <input type="text" id="recibo"></p>
		 <p>Observacion:
    	  <textarea cols="70" id="descripcion"></textarea> 
   	  </p>
        <p><button id="actualizar"><img src="/recursos/images/editar.png"> Actualizar</button></p>
    </div>
</div>
</body>
</html>