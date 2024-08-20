<script type="text/javascript">
jQuery.validator.messages.required = "";
jQuery.validator.messages.digits = "";
	
function datoArt(codart,nomart){
	$('#buscar').dialog('close');
	$('#codart').val(codart);
	$('#nomart').val(nomart);
	$('.boton').button("enable");
}

function dtl(){
	oTable = $('#detalles_servicio').dataTable( {
		"bProcessing": true,
		"bDestroy" : true,
		"bPaginate": true,
		"sScrollY" : '230px',
		"sPaginationType": "full_numbers",
		"sAjaxSource": "/servicios_c/mis_servicios/",
		"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
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
		$('<iframe id="buscar" frameborder="0" />').attr('src','/servicios_c/vista/conArtasig').dialog({
				resizable:false, 
				modal: true,
				width:770, 
				height:300, 
				title: 'Consultar Articulos Asignados',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(770-25).height(300-25);	
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
							
							for(i=0; i<archivo.length; i++){
								data.append('archivo'+i,archivo[i]);	
							}
							
							$.ajax({
								url:'/servicios_c/insertarServicoConImagen', 
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
					  url:"/servicios_c/insertarServicio",
					  data: $('form#retirar').serialize(),
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
	
	$('#tabs').tabs();
	
	$('#ui-id-2').click(function(){
		dtl();	
	});
	
	$('#detalles_servicio').on('click','.observacion',function(){
		codsrv = $(this).attr('data-cod'); 
		$('<iframe id="agregar_observacion" frameborder="0" />').attr('src','/servicios_c/datos_editar/'+codsrv).dialog({
			resizable:false, 
			modal: true,
			width:500, 
			height:300, 
			title: 'Observaciones o quejas',
			close : function(v, ui){							
				$(this).remove();
			}
		}).width(500-30).height(300-30);	
	});
	
	$('#detalles_servicio').on('click','.cerrado',function(){
		alert('El servicio ya fue cerrado');	
	});
	
	$('#detalles_servicio').on('click','.historial',function(){
		codsrv = $(this).attr('data-cod');
		$('<iframe id="historial" frameborder="0" />').attr('src','/servicios_c/detalle_servicio/'+codsrv).dialog({
			resizable:false, 
			modal: true,
			width:520, 
			height:300, 
			title: 'Historial de Observaciones',
			close : function(v, ui){							
				$(this).remove();
			}
		}).width(520-30).height(300-30);	
	});
	
	
}); 
</script>
<style type="text/css">
.error{border-color:#223B8D;background:#FCBE80;}
#retirar p{padding:0.25em;margin:0.3em;}
.campo{
	  float: right;
    margin-right: 263px;
    padding: 5px;
    width: 300px;
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
	margin-left:113px;
	width:520px;
	height:100px;
	}
	
.buscar,.buscar1{
	font-size:12px;
	float: right;
    margin-left: -505px;
    margin-right: 153px;
	}
.boton{font-size:11px; margin-left:255px;}			

#tabs{ font-size:12px;}

#retirar p{font-weight: bold;
    padding: 7px;}
#detalles_servicio tr td {
    font-size: 12px;
}

#img{  font-size: 11px;
    margin-left: 44px;
    margin-top: 7px;}
</style>
</head>
<body>
<div id="tabs">
	<ul>
        <li><a href="#tabs-1">Solicitar Servicio</a></li>
        <li><a href="#tabs-2">Mis Solicitudes</a></li>
    </ul>
  <div id="tabs-1">
    <form id="retirar" name="retirar" method="post" enctype="multipart/form-data">
      <p><span>Codigo de Articulo</span>
      <a href="#" class="buscar" >Buscar</a>
      <input type="text" name="codart" id="codart" class="campo required" readonly="readonly" /></p>
  	  <p>
    <span>Descripcion </span>
    <input type="text" name="nomart" id="nomart" class="campo" readonly="readonly" /></p>
    <p>
    	<span>Adjuntar imagen </span>
   	 <input type="file" id="img" multiple="multiple" name="img"/>	
    </p>
    <p> 
    <span>Nota</span>
    <textarea name="problema" id="problema" class="nota required"></textarea></p><p>
    <a href="#" class="boton">Guardar Información</a>  
    </form>
  </div>
  <div id="tabs-2">
    <div id="tabla">
    	<table id="detalles_servicio" cellpadding="0" cellspacing="0" class="display" width="100%">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="15%">F Solicitud</th>
                    <th width="15%">F Asignación</th>
                    <th width="25%">Articulo</th>
                    <th width="30%">Problema</th>
                    <th width="10%"></th>
                </tr>
            </thead> 
            <tbody>
            
            </tbody>
        </table>
    </div>
  </div>

</div>


</body>

</html>