<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consutar Paz Y Salvo</title>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	function dtl(){
		oTable = $('#pazysalvo').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '310px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "<?php echo base_url(); ?>servicios_c/consultarservicioasignado/",
			"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	function observaciones_servicios(){
		oTable = $('#observaciones_servicios').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '310px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "<?php echo base_url(); ?>servicios_c/servicios_tecnicos/",
			"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
		});
	}	
	
 function cerraDialogo(){
	$('#buscar').dialog('close');
	dtl();
	return false;
}

function cerrar_obs(){
	$('#agregar_observacion').dialog('close');
	observaciones_servicios();
	return true;
}
$(document).ready(function(){
	dtl();
	
	$('#tabs').tabs();
	
	$('#pazysalvo').on('click','.act',function(){
		var cod = $(this).attr('data-cod');
		$('<iframe id="buscar" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/atenderserviciotecnico/'+cod).dialog({
			resizable:false, 
			modal: true,
			width:890, 
			height:395, 
			title: 'Atender Servicio Tecnico',
			close : function(v, ui){							
				$(this).remove();
			}
		}).width(890-25);	
	});
	
	$('#pazysalvo').on('click','.adjuntos',function(){
		cod = $(this).attr('data-cod');
		$('<iframe id="archivosAdjuntos" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/archivosAdjuntos/'+cod).dialog({
			resizable:false, 
			modal: true,
			width:600, 
			height:395, 
			title: 'Archivos Adjuntos',
			close : function(v, ui){							
				$(this).remove();
			}
		}).width(600-25);	
	});
    
	$('#ui-id-2').on('click',function(){
	 	observaciones_servicios();
	 });
	 
	$('#observaciones_servicios').on('click','.observacion',function(){
		codsrv = $(this).attr('data-cod'); tipo_usuario='tecnico';
		$('<iframe id="agregar_observacion" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/datos_editar/'+codsrv+'/'+tipo_usuario).dialog({
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
	
	$('#tabs').tabs();
	
	$('#observaciones_servicios').on('click','.historial',function(){
		codsrv = $(this).attr('data-cod'); tipo_usuario='admin';
		$('<iframe id="historial" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/detalle_servicio/'+codsrv+'/'+tipo_usuario).dialog({
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
#tabs{ font-size:12px;}
a{ text-decoration:none; }
</style>
</head>

<body>
<div id="tabs">
	<ul>
        <li><a href="#tabs-1">Atender Servicio</a></li>
        <li><a href="#tabs-2">Observaciones de los Servicios</a></li>
    </ul>
      <div id="tabs-1">
        	<table id="pazysalvo" cellpadding="0" cellspacing="0" class="display" width="100%">
                <thead>
                    <tr>
                        <th width="5%">Codigo</th>
                        <th width="10%">Fecha</th>
                        <th width="20%">Articulo</th>
                        <th width="10%">Cedula</th>
                        <th width="25%">Solicitante</th>
                        <th width="10%">Sede</th>
                        <th width="10%">Cargo</th>
                        <th width="10%">Acciones</th>
                    </tr>
                </thead> 
                <tbody>
                
                </tbody>
            </table>
      </div>
      
      <div id="tabs-2">
      	<table id="observaciones_servicios" cellpadding="0" cellspacing="0" class="display" width="100%">
            <thead>
                <tr>
                    <th width="5%">Codigo</th>
                    <th width="25%">Articulo</th>
                    <th width="17%">F Asignación</th>
                    <th width="20%">Problema</th>
                    <th width="25%">Observación</th>
                    <th width="8%"></th>
                </tr>
            </thead> 
            <tbody>
            
            </tbody>
        </table>
      </div>
</div>

</body>
</html>