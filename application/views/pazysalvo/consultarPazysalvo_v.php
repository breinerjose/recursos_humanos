<script type="text/javascript">
function dtl(){
		oTable = $('#pazysalvo2').dataTable( {
		    "order": [[ 1, 'desc' ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '360px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo/retirar_c/consultarTodospazysalvo2/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
$(document).ready(function(){
	dtl();
	
	$('#pazysalvo2').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/imprimirPazysalvo/'+cod,'','scrollbars=yes,width=960,height=650');
	 });

$('#pazysalvo2').on('click','.obs',function(){
		var cod = $(this).attr('data-cod');
		$('<iframe id="buscar" frameborder="0" />').attr('src','/pazysalvo/retirar_c/observaciones/'+cod).dialog({
				resizable:false, 
				modal: true,
				width:890, 
				height:495, 
				title: 'Actualizar Observacion Archivo Muerto',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(890-25);	
		
		});
	
});
</script>
<style type="text/css">

</style>
</head>

<body>
<table id="pazysalvo2" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Contrato</th>
<th width="10%">Fecha</th>
<th width="15%">Identificación</th>
<th width="25%">Nombres y Apellidos</th>
<th width="10%">Empresa</th>
<th width="20%">Cliente</th>
<th width="10%">Acciones</th>
</tr>
</thead> 
<tbody>

</tbody>
</table>
</body>
</html>