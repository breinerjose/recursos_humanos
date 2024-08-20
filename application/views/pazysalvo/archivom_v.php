<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
		  "order": [[ 4, 'desc' ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '530px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Archivomuerto_c/observaciones/",
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
	
	   $('#tabla').on('click','.a',function(){
	   var codigo = $(this).attr('data-cod');
	   var familia = $(this).attr('data-fam');
	   var coddoc = $(this).attr('data-doc');
	   window.open('/Subir_c/vista/'+familia+'/'+codigo+'/'+coddoc,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	    $('#tabla').on('click','.aa',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	   $('#tabla').on('click','.b',function(){
	   var codigo = $(this).attr('data-cod');
	   var familia = $(this).attr('data-fam');
	   var coddoc = $(this).attr('data-doc');
	   window.open('/Subir_c/vista/'+familia+'/'+codigo+'/'+coddoc,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	    $('#tabla').on('click','.ba',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
	   });
	  
	  $('#tabla').on('click','.c',function(){
	   var codigo = $(this).attr('data-cod');
	   var familia = $(this).attr('data-fam');
	   var coddoc = $(this).attr('data-doc');
	   window.open('/Subir_c/vista/'+familia+'/'+codigo+'/'+coddoc,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	    $('#tabla').on('click','.ca',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	   $('#tabla').on('click','.d',function(){
	   var codigo = $(this).attr('data-cod');
	   var familia = $(this).attr('data-fam');
	   var coddoc = $(this).attr('data-doc');
	   window.open('/Subir_c/vista/'+familia+'/'+codigo+'/'+coddoc,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	    $('#tabla').on('click','.da',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
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
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="5%">Numero</th>
<th width="30%">Persona</th>
<th width="5%">Fecha</th>
<th width="20%">Empresa</th>
<th width="40%">Observacion</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>