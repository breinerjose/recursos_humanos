<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consutar Hojas de Vida</title>
<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
		  "order": [[ 3, 'desc' ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Contratos_c/Contratos/",
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
	
	 $('#tabla').on('click','.envema',function(){
	   var codigo = $(this).attr('data-cod');
	  window.open('/Subir_c/enviar/'+codigo,'','scrollbars=yes,width=960,height=700');
	   });
	
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
</head>
<body>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Numero</th>
<th width="20%">Persona</th>
<th width="10%">Cargo</th>
<th width="6%">Fecini</th>
<th width="6%">Enviar</th>
<th width="11%">Afiliacion</th>
<th width="10%">Seleccion</th>
<th width="10%">Induccion</th>
<th width="10%">Contrato</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
</html>