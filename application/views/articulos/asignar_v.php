<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="/recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="//recursos/js/jquery.blockUI.js"></script>
<script src="//recursos/js/codigo_blockui.js"></script>
<script type="text/javascript">

	function dtl(idusu){
		oTable = $('#articulos_asignados').dataTable( {
			"bProcessing": false,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '170px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/articulos_c/articulos_asignados/"+idusu,
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	}
	
	function cerrar(datos){
		$('#seleccionar').dialog('close');
		var valores='';
		for(var i=0; i<datos.length; i++){
			if(i==0){ valores = datos[i].value;	 }
			else{
				valores += ","+datos[i].value;		
			}
		}
		$('#articulos').val(valores);		
		return false;	
	}
	
	function datos_user(coduser,nomuser){
		$('#buscar_usuarios').dialog('close');
		$('#usuario').val(coduser+'-'+nomuser);
	}

$(document).ready(function(e) {
	
	$('#data_articulos')[0].reset();
	
	//AUTOCOMPLETE USUARIOS REGISTRADOS	
	
    $('#tabs').tabs();
	
	$('#save_articulo').button({icons:{primary:"ui-icon-link"}}).on('click',function(){
		nomusu = $('#usuario').val();
		articulos = $('#articulos').val();
		
		$('#usuario').focus(function(){$(this).css('background-color','#FFFFFF');});
		$('#articulos').focus(function(){$(this).css('background-color','#FFFFFF');});
		
		if(nomusu!='' && articulos!=''){
			$.ajax({
				url:'/articulos_c/asignar_articulos',
				type:"POST",
				data:{'nomusu':nomusu,'articulos':articulos},
				success: function(resp){
					if(resp!=1){ 
						$('#data_articulos')[0].reset();
						 alert('Asignación Satisfactoria.'); 
						 dtl(resp);  
					}
					else{ alert('Ocurrio un error, intente más tarde.'); }
				}	
			});
		}else{
			alert('No puede dejar campos vacios');	
			if(nomusu==''){
				$('#usuario').css('background-color','#CC0000');		
			}
			if(articulos==''){
				$('#articulos').css('background-color','#CC0000');
			}
		}
	});
	
	$('#articulos_search').button({icons:{primary:"ui-icon-search"}}).on('click',function(){
		$('<iframe id="seleccionar" frameborder="0" />').attr('src','/articulos_c/vista/vista_articulos').dialog({
			resizable:false, 
			modal: true,
			width:650, 
			height:370, 
			title: 'Selección de Articulos',
			close : function(v, ui){							
				$(this).remove();
			}
		}).width(650-30).height(370-30);
	});
	
	$('#filtrar').button({icons:{primary:"ui-icon-search"}}).on('click',function(){
		var usu = $('#idusu').val();
		if(usu != ''){ 
			$.post('/articulos_c/verificar_articulos_usuario',{'idusu':usu},function(resp){
				if(resp==0){ dtl(usu); } else{ alert('El usuario no tiene articulos asignados'); }
			})
		}else{ alert('El campo no pude ir vacio'); }
	});
	
	$('#articulos_asignados').on('click','.Eliminar',function(){
		codart = $(this).attr('data-cod');
		user = $(this).attr('data-user');
		if(confirm('¿Desea quitar el articulo seleccionado al usuario?')){
			$.ajax({
				url:'/articulos_c/quitar_articulo',
				data:{'codart':codart,'user':user},
				type:"POST",
				success: function(resp){
					if(resp==0){ alert('Articulo Eliminado'); dtl(user); } 
					else{ alert('Ocurrio un error, intentelo más tarde.'); }
				}	
			});
		}
	});
	
	$('#articulos_asignados').on('click','.restablecer',function(){
		codart = $(this).attr('data-cod');
		user = $(this).attr('data-user');
		if(confirm('¿Desea restablecer el articulo al usuario?')){
			$.ajax({
				url:'/articulos_c/restablecer_articulo',
				data:{'codart':codart,'user':user},
				type:"POST",
				success: function(resp){
					if(resp==0){ alert('Articulo Restablecido'); dtl(user); } 
					else{ alert('Ocurrio un error, intentelo más tarde.'); }
				}	
			});
		}
	});
	
	$('#ReportExcel').button({icons:{primary: "ui-icon-print" }}).on('click',function(){
		idusu = $('#idusu').val();
		if(idusu!=''){
			window.open('/articulos_c/reporteArticulosPorUsuario?usu='+idusu+'');
		}else{
			alert('Porfavor escoja un articulo.');	
		}
	});
	
	$('#buscar1').button({
		icons:{primary:"ui-icon-search"}	
	}).on('click',function(){
		$('<iframe id="buscar_usuarios" frameborder="0" />').attr('src','/servicios_c/vista/todos_usuarios').dialog({
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
	
	
});
</script>
<style>
*{margin:0; padding:0;}
#tabs{ font-size:12px;}
.datos{ font-weight: bold;
    margin: 0 auto;
    width: 680px;}
#articulos tr td {
    font-size: 11px;
}
.parra{ margin-bottom: 12px; }
#usuario,#articulos{
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 12px;
    padding: 4px;
    width: 485px;}
#articulos{margin-left: 3px;
    width: 390px;}	
#save_articulo{ font-size: 12px;
    margin-left: 15px;}
#idusu{border: 1px solid #CCCCCC;
    margin-bottom: 20px;
    padding: 3px;
    width: 200px;}
#articulos_asignados tr td {
    font-size: 11px;
}
.restablecer{ text-decoration:underline; color:#00F;}
.ui-widget-content a {
    color: #00F;
}
#buscar{background-color: #cc0000;
  	box-shadow: 1px 1px 5px black;
    color: white;
    font-size: 12px;
    font-weight: bold;
    margin-bottom: 15px;
    margin-left: -54px;
    margin-top: 20px;
    padding: 3px;
    width: 780px;
	}
#buscar1{ margin-left: 10px;}
.readonly{ background-color:#ccc; }
</style>
</head>
<body>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Asignar Articulos</a></li>
    <!--<li><a href="#tabs-2">Articulos</a></li>-->
  </ul>
  <div id="tabs-1">
   	<div class="datos">
    	<form id="data_articulos">
    	<p><b>Usuario</b> <input type="text" class="readonly" id="usuario" readonly><a href="javascript:void(0);" id="buscar1">Buscar</a></p>  
    	<p><b>Articulos</b> <input type="text" class="readonly"  id="articulos" readonly>     
        <a href="javascript:void(0);" id="articulos_search">Buscar</a>
        <a href="javascript:void(0);" id="save_articulo">Asignar</a>   
        </p> 
     <h3 id="buscar">Busqueda</h3>   
   	 <b>Filtrar articulos por usuario</b>&nbsp;&nbsp;
   		 <input type="text" id="idusu">&nbsp;&nbsp;&nbsp;<a href="#" id="filtrar">Filtrar</a>  
          <a href="javascript:void(0)" id="ReportExcel">Excel</a></p>     
     </form>
    <table id="articulos_asignados" cellpadding="0" cellspacing="0" class="display" width="100%">
        <thead>
            <tr>
                <th width="10%">Nro Art</th>
                <th width="25%">Usuario</th>
                <th width="25%">Nombre Art</th>
                <th width="25%">Caracteristicas</th>
                <th width="10%">Estado</th>
                <th width="5%"></th>
            </tr>
        </thead> 
        <tbody>
        
        </tbody>
    </table>
  </div>
  <div id="tabs-2">
   
  </div>
</div>
</body>
</html>