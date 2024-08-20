<script type="text/javascript">
function dtl(){
		oTable = $('#contratos').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Liquidaciones_c/liquidacionpendiente/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	
$(document).ready(function(){
	dtl();
	$('#contratos').on('click','.pagada',function(){
	   var cod = $(this).attr('data-cod');
	   $.ajax({
				      url:"/Liquidaciones_c/updliquidacionfirmada",
					  data: { 'codigo' : cod },
					  type:"POST",
					  dataType:"json",
					  success: function(resp){if(resp == '1'){ alert('Actualizacion Exitosa');
					  	dtl();
					  }}
							
				 });
							 
	     });
});

</script>
<table id="contratos" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Identificacónn</th>
<th width="30%">Nombres y Apellidos</th>
<th width="20%">Oficio</th>
<th width="17%">F. Inicio</th>
<th width="17%">F. Fin</th>
<th width="6%">Firmar</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>