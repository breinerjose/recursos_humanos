<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consutar Hojas de Vida</title>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="/recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
function dtl(){
		oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '360px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo/retirar_c/consultarhojasdevida/",
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	}	
$(document).ready(function(){
	dtl();
	
	$('#hojadevida').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/imprimirhojadevida/'+cod,'','scrollbars=yes,width=960,height=700');
	 });
	 $('#hojadevida').on('click','.trasl',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/trasladar/'+cod,'','scrollbars=yes,width=1000,height=300');
	 });
	 $('#hojadevida').on('click','.mod',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/modificarhdv/'+cod,'','scrollbars=yes,width=1000,height=700');
	 });
	  $('#hojadevida').on('click','.act',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/nopreseleccionado/'+cod,'','scrollbars=yes,width=600,height=100');
	 });
});

</script>
<style type="text/css">

</style>
</head>

<body>
<table id="hojadevida" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="5%">Id</th>
<th width="30%">Nombres y Apellidos</th>
<th width="13%">Titulo</th>
<th width="20%">Cargos</th>
<th width="5%">F. Solicitud</th>
<th width="10%">Estado</th>
<th width="12%">Ver</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
</html>