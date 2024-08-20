<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Archivos_c/misfolder/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
$(document).ready(function(){
	dtl();
});
</script>

<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Id Empleado</th>
<th width="30%">Nombre Empleado</th>
<th width="8%">Solicitante</th>
<th width="15%">Fecha Solicitud</th>
<th width="15%">Fecha Entrega</th>
<th width="8%">Usuario Entrega</th>
<th width="22%">Devolucion</th>

</tr>
</thead> 
<tbody>
</tbody>
</table>