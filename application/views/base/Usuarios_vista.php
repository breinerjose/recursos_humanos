<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar Usuario</title>
<script type="text/javascript">
jQuery.validator.messages.required = "";jQuery.validator.messages.digits = "";
var oTable;
function dtl(){
		oTable = $('#usuarios').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '300px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/base/usuario_c/consultarUsuarios/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	function selectPerfiles(perfil){
	$('#perfil1').html('');
	$.post('/base/usuario_c/selectPerfil/',function(resp){
		if(resp == '1'){
			 alert('No hay datos para mostrar');
		}else{
			$('#perfil1').append("<option value=''> Seleccione Perfil</option>");
			  for(i=0; i< resp.length; i++){
				$('<option/>').val(resp[i].codigo).text(resp[i].nombre).appendTo('#perfil1');
				$('#perfil1 option[value="'+perfil+'"]').attr('selected','selected');
			  }
		}
	},'json');
	}
	
	function selectCargos(cargo){
	$('#cargo1').html('');
	$.post('/base/usuario_c/consultarCargo/',function(resp){
		if(resp == '1'){
			 alert('No hay datos para mostrar');
		}else{
			$('#cargo1').append("<option value=''> Seleccione Cargo</option>");
			  for(i=0; i< resp.length; i++){
				$('<option/>').val(resp[i].codigo).text(resp[i].nombre).appendTo('#cargo1');
				$('#cargo1 option[value="'+cargo+'"]').attr('selected','selected');
			  }
		}
	},'json');
	}
	
	function selectSedes(sede){
	$('#sede1').html('');
	$.post('/base/usuario_c/consultarSede/',function(resp){
		if(resp == '1'){
			 alert('No Hay Sedes Registradas');
		}else{
			$('#sede1').append("<option value=''> Seleccione sede</option>");
			  for(i=0; i< resp.length; i++){
				$('<option/>').val(resp[i].codigo).text(resp[i].nombre).appendTo('#sede1');
				$('#sede1 option[value="'+sede+'"]').attr('selected','selected');
			  }
		}
	},'json');
	}
	
	function cerrarDialogo(){
			$('#usuario').dialog('close');
			dtl();
			return false;
	}
	
$(document).ready(function(){
	dtl();
 	$( ".agregar" ).button({
		icons:{primary:"ui-icon-disk"}
		}).on('click',function(){
		 if($("#agregar").validate().form()){
			 $.ajax({
				      url:"/base/usuario_c/agregarUsuario",
					  data: $('form#agregar').serialize(),
					  type:"POST",
					  dataType:"json",
					  success: function(resp){
						 if(resp=='1'){
							alert('Registro Exitoso');
							setTimeout(function(){ $('#agregar').get(0).reset();}, 900);
							dtl();
						}else{
							alert('Error al Insectar Datos');
						}
					  }	
			 });
		 }else{
			alert('Campos Pendientes por llenar');	
		 }
		});
	
	$.post('/base/usuario_c/selectPerfil/',function(resp){
		if(resp=='1'){
			 alert('No hay datos para mostrar');
		}else{
			$('#perfil').append("<option value=''> Seleccione Perfil</option>");
			  for(i=0; i< resp.length; i++){
				$('<option/>').val(resp[i].codigo).text(resp[i].nombre).appendTo('#perfil');
			  }
		}
	},'json');
	
	$.post('/base/usuario_c/consultarSede/',function(resp){
		if(resp=='1'){
			 alert('No hay datos para mostrar');
		}else{
			$('#sede').append("<option value=''> Seleccione sede</option>");
			  for(i=0; i< resp.length; i++){
				$('<option/>').val(resp[i].codigo).text(resp[i].nombre).appendTo('#sede');
			  }
		}
	},'json');
	
	$.post('/base/usuario_c/consultarCargo/',function(resp){
		if(resp=='1'){
			 alert('No hay datos para mostrar');
		}else{
			$('#cargo').append("<option value=''> Seleccione Cargo</option>");
			  for(i=0; i< resp.length; i++){
				$('<option/>').val(resp[i].codigo).text(resp[i].nombre).appendTo('#cargo');
			  }
		}
	},'json');
	
	
	$('#usuarios').on('click','.edi', function(){
			var cod = $(this).attr('data-ide');var nom = $(this).attr('data-nom');
			var eml = $(this).attr('data-eml');var prf = $(this).attr('data-prf');
			var sed = $(this).attr('data-sed');var carg = $(this).attr('data-carg');
			var est = $(this).attr('data-est');$('#estado').html('');
			$('#identificacion1').val(cod);$('#nombres1').val(nom);
			$('#correo1').val(eml);selectPerfiles(prf);selectSedes(sed);
			                       selectCargos(carg);
			$('#estado').append("<option value='Activo'>Generado</option>");
			$('#estado').append("<option value='eliminado'>Eliminado</option>");
			$('#estado option[value="'+est+'"]').attr('selected','selected');			
			$("#actualizar").dialog({
						resizable: false,
						height:350,
						width:590,
						title:'Actualizar Usuario',
						position:['mindle'],
						modal: true,
						show: {effect: 'bounce', duration: 350,times: 3},
						buttons: {'Actualizar': function() {
							                 if($("#formact").validate().form()){
													    $.ajax({
																url: "/base/usuario_c/actualizarUsuario",
																data:$('form#formact').serialize(),
																type: "POST",
																dataType:"json",
																success: function(datos){
																	if(datos=='1'){ 
																		$('.ui-dialog').remove();
																	    dtl();
																	}else{alert('No se actualizar Registro');}
															    }            
														});
												}else{
														alert('Campos Pendientes por llenar');	
												}		
									}
								}
				 		});
		     });
	
	
	$('#usuarios').on('click','.per',function(){
		var cod = $(this).attr('data-ide');
		var nom = $(this).attr('data-nom');
		var sed = $(this).attr('data-sed');
	$('<iframe id="usuario" frameborder="0" />').attr('src','/base/usuario_c/vistaPaginasusuario/'+cod+'/'+nom+'/'+sed).dialog({
				resizable:false, 
				modal: true,
				width:900, 
				height:370, 
				title: 'Actualizar Permisos de Usuario',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(900-10).height(370-10);
	});
	
	$('.buscartercero').button({
		icons:{primary:"ui-icon-search"}
	}).on('click',function(){
		var codigo = $('#identificacion').val();
		if(codigo!=''){
		 $.post('/base/configuracion_c/consultartercero',{'identificacion':codigo},function(resp){
			  if(resp == '1'){
				 alert('No Existen datos relacionados a este documento. Verifique por favor...');
				 $('#identificacion, #correo, #nombres').val('');
				 $('.agregar').button ("disable");
			  }else{
				 $('#nombres').val(resp.nomtrc);
				 $('#correo').val(resp.emltrc);
				 $('.agregar').button ("enable");
			  }
			},'json');
		}else{
			alert('Debe digitar Identificación');
			$('#identificacion').css('background','#ccc');	
		}
	});
	
	$('#usuarios').on('click','.act',function(){
	var cod = $(this).attr('data-ide');
	if(confirm("Esta Seguro que desea activar Usuario!!!")){
		$.post('/base/usuario_c/activarUsuario',{'codigo':cod},function(resp){
	 		 if(resp=='1'){
		  		dtl();
	  		 }else{
		 		alert('No se pudo actualizar Usuario');
			 }
		},'json');	 
    }else{return false;}   
	});
	
	$('.agregar').button ("disable");
	
});

</script>
</head>
<style type="text/css">
.error{border-color:#223B8D;background:#FCBE80;}
#agregar p{display:inline-block;margin: 0.5px;}
#formact p{display:inline-block;margin:0.25em; font-size:13px;}
label.par{font-size:15px;font-weight:bold;color:#223B8D;}
.txt, .txt1, .txt2{font-size:12px;padding:3px;width:330px;height:22px;}
.txt{width:160px}.txt2{width:280px;}
.sel, .sel1, .sel2{font-size:12px;padding:5px;width:200px;height:32px;}
.sel1{width:180px;}.sel2{width:250px;}
.agregar{font-size:12px;padding:3px;}
table.display tr td{font-size:13px;}
#nombres{text-transform:uppercase;}

table.display
{
    font-size: 0.9em;
    margin: 0 auto;
    background-color: #ffffff;
    box-shadow:black 1px 1px 5px;
    border-collapse: collapse;
     /* hack IE8 */
    border-collapse: collapse \0/;
    border-right: 2px inset #D3D3D3 \0/;
    border-bottom: 2px inset #D3D3D3 \0/;
     /* hack IE7 */
    *border-collapse: collapse;
    *border-right: 2px inset #D3D3D3;
    *border-bottom: 2px inset #D3D3D3;
}
table.display thead tr{
    background-color: #CC0000;
    color:white;
}
table.display th a{
   color:white;
}
table.display tr.odd
{
    background-color: #FFE8E8;
}

table.display tr.noDataRow td {
    text-align: center;
}

table.display table th.title
{
    text-align: center;
}


table.display th,td
{
    text-align: left;
    padding: 10px;
}

table.display td
{
    height: 1.6em;
    padding: 0 0.5em;
}

table.display td.editable
{
    width: 200px;
    height: 22px;
}

table.display th.sortable
{
    cursor: pointer;
}

table.display tr.loading {
    color: #dddddd;
    background-color: #f6f6f6;
}

tr.odd td.sorting_1 {
    background-color: #FCABAB;
    margin: 0.25em;
    padding: 0.25em;
}

tr.even td.sorting_1 {
    background-color: #F9DBDB;
    margin: 0.25em;
    padding: 0.25em;
}
table.display td.loading
{
    background:url(../../../recursos/images/loading.gif) no-repeat 4px center;
    padding-left: 24px;
    color: #aaaaaa;
    width: 176px;
}

#actualizar{display:none;}
.est{width:500px;display:inline-block;}
</style>
</head>

<body>
<fieldset>
<legend><b>Parametros de Registroo</b></legend>
<form id="agregar" name="agregar" method="post">
	<p>
    <label class="par">Identificación</label><br>
     <input type="text" id="identificacion" name="identificacion" class="txt required digits" />
    </p>
     <p>
    <label class="par">Nombres</label><br>
     <input type="text" id="nombres" name="nombres" class="txt1 required" readonly disabled />
    </p> 
    <p>
     <label class="par">Contraseña</label><br>
     <input type="password" id="pass" name="pass" class="txt required" minlength="6" />
     <a href="#" class="buscartercero" title="Consultar">Buscar</a>
    </p> 
     <p>
    <label class="par">Correo</label><br>
     <input type="email" id="correo" name="correo" class="txt2 required" readonly disabled />
    </p> 
     <p>
     <label class="par">perfil</label><br>
     <select id="perfil" name="perfil" class="sel required"></select>
    </p> 
    <p>
     <label class="par">Sede</label><br>
     <select id="sede" name="sede" class="sel1 required"></select>
    </p> 
    <p>
     <label class="par">Cargo</label><br>
     <select id="cargo" name="cargo" class="sel2 required"></select>
    </p> 
    <p>
    	<a href="#" class="agregar">Agregar Usuario</a>
    </p>
</form>
</fieldset>
<br>
<table id="usuarios" cellpadding="0" cellspacing="0" class="display" width="100%">
	<thead>
    	<tr>
        	<th width="15%">id</th>
            <th width="30%">Nombres Y Apellidos</th>
            <th width="20%">Correo</th>
            <th width="13%">Estado</th>
            <th width="10%">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="actualizar">
<form id="formact" method="post">
    <p>
    <label class="par">Identificación</label><br>
     <input type="text" id="identificacion1" name="identificacion1" class="txt required" readonly />
    </p>
     <p>
    <label class="par">Nombres</label><br>
     <input type="text" id="nombres1" name="nombres1" class="txt1 required" />
    </p> 
    <p>
     <label class="par">perfil</label><br>
     <select id="perfil1" name="perfil1" class="sel required"></select>
    </p> 
     <p>
    <label class="par">Correo</label><br>
     <input type="email" id="correo1" name="correo1" class="txt2 required" />
    </p> 
     <p>
     <label class="par">estado</label><br>
     <select id="estado" name="estado" class="sel required"></select>
    </p> 
    <p>
     <label class="par">Cargo</label><br>
     <select id="cargo1" name="cargo1" class="sel2 required"></select>
    </p> 
     <p>
     <label class="par">Sede</label><br>
     <select id="sede1" name="sede1" class="sel1 required"></select>
    </p> 
</form>
</div>
</body>
</html>