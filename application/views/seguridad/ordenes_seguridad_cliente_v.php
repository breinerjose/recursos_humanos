<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '320px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Ordenes_seguridad_c/ordenesseguridadcliente/2/Aprobada/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
$(document).ready(function(){
	dtl();
	
	 $('#tabla').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/Ordenes_seguridad_c/impordenseguridad/'+cod,'','scrollbars=yes,width=960,height=700');	
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
<th width="10%">Numeroo</th>
<th width="10%">Id</th>
<th width="35%">Persona</th>
<th width="10%">Cargo</th>
<th width="20%">Centro de Trabajo</th>
<th width="8%">Fec. Sol</th>
<th width="5%">Ver</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
</html>