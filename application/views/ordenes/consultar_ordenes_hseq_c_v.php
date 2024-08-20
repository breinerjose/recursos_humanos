<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"order": [[ 5, "desc" ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Ordenes_c/consultarordeneshseqclientes/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
		
$(document).ready(function(){
	dtl();	
	   $('#tabla').on('click','.arl',function(){
	   var cod = $(this).attr('data-cod');
	   var tipo = $(this).attr('data-tip');
	   window.open('/Ordenes_c/imprimir_orden_cli/'+cod+'/'+tipo,'','scrollbars=yes,width=1024,height=750');	
	   });
	   
	    $('#tabla').on('click','.empresa',function(){
	   var cod = $(this).attr('data-cod');
	   var tipo = $(this).attr('data-tip');
	   window.open('/Ordenes_c/imprimir_orden_cli/'+cod+'/'+tipo,'','scrollbars=yes,width=1024,height=750');	
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
<th width="28%">Persona</th>
<th width="15%">Cargo</th>
<th width="20%">Centro de Trabajo</th>
<th width="9%">Tipo</th>
<th width="8%">Fec. Sol</th>
<th width="10%">Ver</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
</html>