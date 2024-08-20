<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Servicio a Tercero</title>
<link rel="stylesheet" href="<?php echo base_url();?>/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css" />
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/css/tabla_css.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/recursos/js/jquery-1.8.2.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/recursos/jquery/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/recursos/js/validate/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery.validator.messages.required = "";
jQuery.validator.messages.digits = "";
	
function datoArt(codart,nomart){
	$('#buscar').dialog('close');
	$('#codart').val(codart);
	$('#nomart').val(nomart);
	$('.boton').button("enable");
}

function datos_user(coduser,nomuser){
	$('#buscar_usuarios').dialog('close');
	$('#user').val(nomuser);
	$('#user').attr('ide_usu',coduser);
	$('#btn_buscar1').button("enable");
}

function dtl(){
	oTable = $('#detalles_servicio').dataTable( {
		"bProcessing": true,
		"bDestroy" : true,
		"bPaginate": true,
		"sScrollY" : '230px',
		"sPaginationType": "full_numbers",
		"sAjaxSource": "<?php echo base_url(); ?>servicios_c/mis_servicios/",
		"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
	});
}	

function cerrar_obs(){
	$('#agregar_observacion').dialog('close');
	dtl();
	return true;
}
	
$(document).ready(function() {
	
	$('#retirar')[0].reset();
	
     /* Aqui determinamos apariencia y funcionalidad boton buscar*/
	$('.buscar').button({
		icons:{primary:"ui-icon-search"}	
	}).on('click',function(){
		iduser = $('#user').attr('ide_usu');
		$('<iframe id="buscar" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/vista_articulos/'+iduser).dialog({
				resizable:false, 
				modal: true,
				width:750, 
				height:300, 
				title: 'Articulos Asignados',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(750-25).height(300-25);	
	});	
	
	$('.buscar1').button({
		icons:{primary:"ui-icon-search"}	
	}).on('click',function(){
		$('<iframe id="buscar_usuarios" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/vista/todos_usuarios').dialog({
				resizable:false, 
				modal: true,
				width:740, 
				height:300, 
				title: 'Usuarios',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(740-25).height(300-25);	
	});	

	$('.boton').button({
		icons:{primary:"ui-icon-disk"}
		}).on('click',function(){
			if($("form#retirar").validate().form()){
				var cod = $('#codart').val(); 
				var pro = $('#problema').val();
				var imgs = document.getElementById ("img");
						
				archivo = imgs.files;		
				if(archivo.length>=1 && archivo.length<=3){
					//con imagenes
					
					var fileElement = document.getElementById("img");
					var Extensiones = "";
					if (imgs.value.lastIndexOf(".") > 0) {
						Extensiones = imgs.value.substring(imgs.value.lastIndexOf(".") + 1, imgs.value.length);
					}
					
					if (Extensiones == "jpg") {
						
						var fileSize=0;
						for(i=0; i<archivo.length; i++){
							fileSize += imgs.files[i].size;
						}
						
						if(fileSize>1572864){
							alert('El peso de las imagenes debe ser menor a 1.5 MB');	
						}else{
							var data = new FormData();					
					
							data.append('codart',cod);
							data.append('problema',pro);
							data.append('user',$('#user').attr('ide_usu'));
							
							for(i=0; i<archivo.length; i++){
								data.append('archivo'+i,archivo[i]);	
							}
							
							$.ajax({
								url:'<?php echo base_url();?>servicios_c/insertarServicoConImagen2', 
								type:'POST', 
								contentType:false, 
								data:data,
								processData:false, 
								cache:false 
							}).done(function(resp){
								if(resp==1){
									alert('Solicitud de Servicio Satisfactoria');
								 	setTimeout(function(){ $('#retirar').get(0).reset();}, 900);	
								}else{
									alert('Error al Registrar Solicitud');
								}
							});
						}
					}
					else {
						alert("Debes seleccionar las imagenes con extensión JPG");
						return false;
					}
					
					
				}else if(archivo.length==0){
					//sin imagenes
					$.ajax({
					  url:"<?php echo base_url();?>servicios_c/insertarServicio2",
					  data:{'user':$('#user').attr('ide_usu'),'codart':$('#codart').val(),'problema':$('#problema').val()},
					  type:"POST",
					  dataType:"json",
					  success: function(resp){
							if(resp=='1'){
								 alert('Solicitud de Servicio Satisfactoria');
								 setTimeout(function(){ $('#retirar').get(0).reset();}, 900);
							 }else{alert('Error al Registrar Solicitud');}
						}
					});
					
				}else if(archivo.length>3){
					alert('Nada más puede subir 3 imagenes');
				}
		 }else{
			alert('Hay campos pendientes por llenar');	
		 }	
	});
	/* fin comportamiento boton guardar informacion*/
	$('.boton').button("disable"); /* desabilito los botones*/
	$('#btn_buscar1').button("disable");
	
	$('#tabs').tabs();
	
	
	
}); 
</script>
<style type="text/css">
.error{border-color:#223B8D;background:#FCBE80;}
#retirar p{padding:0.25em;margin:0.3em;}
.campo{
	 float: right;
    margin-right: 173px;
    padding: 5px;
    width: 370px;
	}
.fecha{
	margin-left:84px;
	}
.seleccion1, .seleccion2{
	width:520px;
	padding:4px;
	height:25px;
	margin-left:62px;
	}		
.seleccion2 {
	margin-left:104px;
	}
.nota{
	margin-left:143px;
	width:520px;
	height:100px;
	}
	
.buscar,.buscar1{
	float: right;
    font-size: 8px;
    margin-left: -495px;
    margin-right: 80px;
	}
.boton{font-size:11px; margin-left:255px;}			

#tabs{ font-size:12px;}

#retirar p{font-weight: bold;
    padding: 7px;}
#detalles_servicio tr td {
    font-size: 12px;
}

#img{  font-size: 11px;
    margin-left: 45px;
    margin-top: 7px;}
#user{}
.readonly{ background-color: #ccc; }
</style>
</head>
<body>
<div id="tabs">
	<ul>
        <li><a href="#tabs-1">Solicitar Servicio a un tercero</a></li>
    </ul>
  <div id="tabs-1">
    <form id="retirar" name="retirar" method="post" enctype="multipart/form-data">
      <p><span>Usuario </span>
      <a href="#" class="buscar1" >Buscar</a>
      <input type="text" name="user" id="user" class="campo required readonly" readonly /></p>
      <p><span>Codigo de Articulo</span>
      <a href="#" class="buscar" id="btn_buscar1" >Buscar</a>
      <input type="text" name="codart" id="codart" class="campo required readonly" readonly /></p>
  	  <p>
    <span>Descripcion </span>
    <input type="text" name="nomart" id="nomart" class="campo readonly" readonly /></p>
    <p>
    	<span>Adjuntar imagen </span>
   	 <input type="file" id="img" multiple name="img"/>	
    </p>
    <p> 
    <span>Nota</span>
    <textarea name="problema" id="problema" class="nota required"></textarea></p><p>
    <a href="#" class="boton">Guardar Información</a>  
    </form>
  </div>

</div>


</body>

</html>