<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<!--<script src="//recursos/js/jquery.blockUI.js"></script>
<script src="//recursos/js/codigo_blockui.js"></script>-->
<script>
$(document).ready(function(e) {
    $('#nomart').val('<?php echo $articulo[0]['nomart']; ?>');
    $('#caract').val('<?php echo $articulo[0]['carart']; ?>');	
    $('#save_articulo').attr('codart','<?php echo $articulo[0]['codart']; ?>');
	$('#software option[value="<?php echo $articulo[0]['soft']; ?>"]').attr('selected',true);
	
	$('#save_articulo').button({icons:{primary:"ui-icon-disk"}}).on('click',function(){
		nomart = $('#nomart').val();
		caract = $('#caract').val();
		codart = $('#save_articulo').attr('codart');
		soft = $('#software').val();
		if(nomart!='' && caract!=''){
			$.ajax({
				url:'/articulos_c/editar_articulo',
				data:{'nomart':nomart,'caract':caract,'codart':codart,'soft':soft},
				type:"POST",
				success: function(resp){
					if(resp==0){ alert('Articulo Actualizado'); window.parent.cerrar(); } 
					else{ alert('Ocurrio un error, intentelo más tarde.'); }
				}	
			});
		}else{
			alert('No puede dejar campos vacios');	
		}
	});
});
</script>
<style>
*{margin:0; padding:0;}
#datos{}
#nomart{ border: 1px solid #CCCCCC;
    margin-bottom: 10px;
    margin-top: 3px;
    padding: 4px;
    width: 360px;}
#caract{ border: 1px solid #CCCCCC;
    font-family: arial;
    font-size: 13px;
    margin-bottom: 10px;
    margin-top: 3px;
    max-width: 360px;
    min-height: 80px;
    min-width: 360px;
    padding: 4px;}
#software{ border: 1px solid #ccc;
    margin-bottom: 8px;
    padding: 2px;
    width: 370px;}
</style>
</head>

<body>
<form id="datos">
	<p>Nombre</p>
    <p> <input type="text" id="nomart"></p>  
    <p>Caracteristicas</p>
    <p><textarea id="caract"></textarea></p>
    <p>Software</p>
    <p><select id="software"><option value="si">Si</option><option value="no">No</option></select></p>
    <p align="right"><a href="javascript:void(0);" id="save_articulo">Guardar</a></p>
</form>
</body>
</html>