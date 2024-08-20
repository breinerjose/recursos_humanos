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
			"sScrollY" : '650px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Contratos_c/ver_archivos_Contratos/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
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
	   alert(codigo);
	 <!--  window.open('/Subir_c/vista/'+familia+'/'+codigo+'/'+coddoc,'','scrollbars=yes,width=960,height=700');-->	
	   });
	   
	    $('#tabla').on('click','.aa',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	    $('#tabla').on('click','.ba',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
	   });
	   
	    $('#tabla').on('click','.ca',function(){
	   var token = $(this).attr('data-tok');
	   window.open('/Ver_c/Vista_pdf/'+token,'','scrollbars=yes,width=960,height=700');	
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
</head>
<body>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Numero</th>
<th width="20%">Persona</th>
<th width="10%">Cargo</th>
<th width="6%">Fecini</th>
<th width="14%">Centro de Trabajo</th>
<th width="6%">Afiliacion</th>
<th width="6%">Seleccion</th>
<th width="6%">Induccion</th>
<th width="6%">Contrato</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
</html>