<script type="text/javascript">
function dtl(){
		oTable = $('#contratos').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '360px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/liquidaciones_c/loginc/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	
$(document).ready(function(){
	dtl();
});

</script>

<table id="contratos" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="70%">Observacion</th>
<th width="15%">Fecha</th>
<th width="15%">Usuario</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>