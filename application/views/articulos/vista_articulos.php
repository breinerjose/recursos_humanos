<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" type="text/css" href="/recursos/jquery-ui/css/excite-bike/jquery-ui-1.9.2.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/js/funciones.js"></script>
<script type="text/javascript" src="/recursos/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/recursos/jquery/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script src="/recursos/blockUI/jquery.blockUI.js"></script>
<script src="/recursos/blockUI/codigo_blockui.js"></script>
<script type="text/javascript">
	var oTable;
	function dtl(){
		oTable = $('#articulos').dataTable( {
			"bProcessing": false,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '210px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/articulos_c/datos_articulos/",
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	}

$(document).ready(function(e) {
	dtl();	
	
	$('#agregar').button({ icons:{primary:"ui-icon-link" }}).on('click',function(){
		var datos = oTable.$('input:checkbox[name="articulos[]"]').serializeArray();
		window.parent.cerrar(datos);		
	});
});
</script>
<style>
*{ margin:0; padding:0;}
body{font-size: 12px;}
#agregar{font-size: 12px;  margin-top: 30px;}
#articulos_wrapper{margin-top: 10px;}
#articulos_info{ font-size:12px;}
#articulos_paginate{ font-size:13px;}
</style>
</head>
<body>
<table id="articulos" cellpadding="0" cellspacing="0" class="display" width="100%">
    <thead>
        <tr>
            <th width="7%">Nro</th>
            <th width="40%">Nombre</th>
            <th width="40%">Caracteristicas</th>
            <th width="7%"></th>
        </tr>
    </thead> 
    <tbody>
    
    </tbody>
</table>
<div id="boton asignar">
	<a href="#" id="agregar">Asignar Articulos Seleccionados</a>
</div>
</body>
</html>