<script type="text/javascript">
function dtl(){
		oTable = $('#listado').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Induccion_c/listado/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}
			
$(document).ready(function(){
	dtl();
	
	 $('#listado').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/Induccion_c/imprimir_examen/'+cod,'','scrollbars=yes,width=1020,height=750');	
	   });
});

</script>
<table id="listado" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="20%">Fecha</th>
<th width="30%">Persona</th>
<th width="15%">Empresa</th>
<th width="25%">Cliente</th>
<th width="10%">Acciones</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>