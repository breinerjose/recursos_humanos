<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url();?>/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css" />
<script type="text/javascript" src="<?php echo base_url();?>/recursos/js/jquery-1.8.2.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
   	$('#codserv').val('<?php echo $codsrv; ?>'); 
   	$('#guardar').attr('codserv','<?php echo $codsrv; ?>'); 
	
	$('#guardar').button({icons: {primary: "ui-icon-disk"}}).on('click',function(){
		codsrv = $('#guardar').attr('codserv');	
		tipo_usuario = $('#guardar').attr('tipo_usuario');	
		obs = $('#inquietud').val();	
		if(obs!=''){
			 $.ajax({
				  url:"<?php echo base_url();?>servicios_c/agregar_detalle",
				  data: {'codsrv':codsrv,'obs':obs},
				  type:"POST",
				  success: function(resp){
					if(resp=='0'){
					 alert('Registro Satisfactorio');
					 window.parent.cerrar_obs();
					}else{alert('Error al Registrar Observación');}
				  }
			});	
		}else{
			alert('El campo observación no puede quedar vacio');	
		}
	});
});
</script>
<style>
*{ margin:0; padding:0;}
body{ font-family:Georgia, "Times New Roman", Times, serif;}
#datos{ font-size: 15px;
    font-weight: bold;
    margin: 10px auto 0;
    width: 450px;}
#datos p{}
#codserv{border: 1px solid #CCCCCC;
    margin-bottom: 15px;
    margin-top: 5px;
    padding: 4px;
    width: 450px;}
#inquietud{border: 1px solid #CCCCCC;margin-bottom: 8px;
    margin-top: 5px;
    max-height: 120px;
    max-width: 455px;
    min-height: 120px;
    min-width: 455px;}
</style>
</head>
<body>
<div id="datos">
<p><label>Codigo </label></p>
<p><input type="text" id="codserv" disabled></p>
<p><label>Observación o inquietud</label></p>
<p><textarea id="inquietud"></textarea></p>
<p><a href="#" id="guardar">Guardar</a></p>
</div>
</body>
</html>