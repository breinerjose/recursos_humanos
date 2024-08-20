<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Ordenes_c/ordenes/2/Generado/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
				  $('td:eq(0)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(1)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(2)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(3)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(4)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(5)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(6)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(7)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(8)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
            }
		});
	}	
	
	function cerrar_editar(){
		$('#editar').dialog('close');
		dtl();	
	}
$(document).ready(function(){
	dtl();
	
	   $('#tabla').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/Ordenes_c/impaprobarordenseguridad/'+cod,'','scrollbars=yes,width=960,height=700');	
	   });
	  
});
</script>
<style type="text/css">
td.blanco{ background-color: white;
    margin: 0.25em;
    padding: 0.25em;
}
td.verde{
 background-color: #006600;
    margin: 0.25em;
    padding: 0.25em;
}
td.rojo{
 background-color: #FB4D51;
    margin: 0.25em;
    padding: 0.25em;
}
td.azul{
 background-color: #34A5F8;
    margin: 0.25em;
    padding: 0.25em;
}
td.amarillo{
 background-color: #FFFF99;
    margin: 0.25em;
    padding: 0.25em;
}
</style>
<div class="container">
<div class="row">
<div class="col-md-12">
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Numero</th>
<th width="20%">Persona</th>
<th width="10%">Cargo</th>
<th width="10%">Centro de Trabajo</th>
<th width="15%">Proveedor</th>
<th width="9%">Tipo</th>
<th width="8%">Estado</th>
<th width="1%">.</th>
<th width="8%">Fec. Sol</th>
<th width="9%">Ver</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</div>
</div>
</div>