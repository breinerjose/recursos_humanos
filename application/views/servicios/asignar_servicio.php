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
	function dtl(estado){
		oTable = $('#pazysalvo').dataTable( {
			"bProcessing": false,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '300px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "<?php echo base_url(); ?>servicios_c/consultarserviciogenerado/"+estado,
			"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
		});
	}
	
	function tabla_observaciones(estado){
		oTable2 = $('#tabla_observaciones').dataTable( {
			"bProcessing": false,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '300px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "<?php echo base_url(); ?>servicios_c/todos_servicios/"+estado,
			"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
		});
	}
	
 	function cerraDialogo(){
		$('#buscar').dialog('close');
		dtl($('#estado').val());
		return false;
	}
	
	function cerrar_obs(){
		$('#agregar_observacion').dialog('close');
		tabla_observaciones();
		return true;
	}
	
$(document).ready(function(){
	
	dtl($('#estado').val());
	
	$( "#tabs" ).tabs();
	
	$('#pazysalvo').on('click','.act',function(){
		var cod = $(this).attr('data-cod');
		$('<iframe id="buscar" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/asignaraTecnico/'+cod).dialog({
			resizable:false, 
			modal: true,
			width:890, 
			height:450, 
			title: 'Asignar Servicio A Tecnico',
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
		
	$('#ui-id-2').click(function(){
		tabla_observaciones($('#estado2').val());
	});
	
	$('#tabla_observaciones').on('click','.observacion',function(){
		codsrv = $(this).attr('data-cod'); tipo_usuario='admin';
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
	
	$('#tabla_observaciones').on('click','.historial',function(){
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
	
	$('#estado').on('change',function(){
		dtl($('#estado').val());
	});
	
	$('#estado2').on('change',function(){
		tabla_observaciones($('#estado2').val());
	});
	
	//SERVICIO REASIGNADO
	$('#pazysalvo').on('click','.vermas',function(){
		codsrv = $(this).attr('data-cod');
		$('<iframe id="infoReasignados" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/inforServReasignados/'+codsrv).dialog({
			resizable:false, 
			modal: true,
			width:890, 
			height:400, 
			title: 'Detalle servicio reasignado',
			close : function(v, ui){							
				$(this).remove();
			}
		}).width(890-30).height(400-30);
	});
	
	$('#pazysalvo').on('click','.cerrado',function(){
		alert('El servicio ya fue cerrado.');
	});
	
});
</script>
<style type="text/css">
#tabs{ font-size:11px;}
#tabla_observaciones tr td,#pazysalvo tr td {
    font-size: 11px;
}
.opcion{border: 1px solid #ccc;
    margin-bottom: 12px;
    padding: 5px;}
#estado{}
#estado2{}
.estado{border: 1px solid #ccc;
    padding: 2px;
    width: 100px;
}
.ui-widget-content a {
    color: #00F;
	
}
td.sorting_1{ text-align:center; }
a{ text-decoration:none;}
</style>
</head>

<body>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Asignar Servicio</a></li>
    <li><a href="#tabs-2">Observaciones de servicios</a></li>
  </ul>
  <div id="tabs-1">
  		<div class="opcion">
        	Estado Servicio &nbsp; 
            <select id="estado" class="estado">
            	<option value="noasignado">No asignados</option>
            	<option value="asignados">Asignados</option>
            	<option value="reasignado">Reasignados</option>
            	<option value="cerrado">Cerrado</option>
            </select>
        </div>
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
  	<div class="opcion">
        Estado Servicio &nbsp; 
        <select id="estado2" class="estado">
            <option value="0">Todos</option>
            <option value="noasignado">No asignados</option>
            <option value="asignados">Asignados</option>
            <option value="cerrado">Cerrado</option>
        </select>
    </div>
    <table id="tabla_observaciones" cellpadding="0" cellspacing="0" class="display" width="100%">
        <thead>
            <tr>
                <th width="5%">Servicio</th>
                <th width="20%">Articulo</th>
                <th width="10%">Fecha Asig</th>
                <th width="23%">Tecnico</th>
                <th width="15%">Problema</th>
                <th width="20%">Observación</th>
                <th width="7%"></th>
            </tr>
        </thead> 
        <tbody>
        
        </tbody>
    </table>
  </div>
  
</div>
</body>
</html>