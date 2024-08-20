<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
		"order": [[ 0, 'desc' ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			 "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"ajax": {
									"url": "/Doc_equivalente_c/listado/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
								}
		});
	}	
	
$(document).ready(function(){
		dtl();
	});
	
	$(document).on('click','.print<?php echo $ale; ?>',function(){
       var cod = $(this).attr('data-oid');
	   window.open('/Doc_equivalente_c/imprimir/'+cod,'','scrollbars=yes,width=960,height=700');	          
    });
	
</script>
<style type="text/css">
#formact p{display:inline-block;margin:0.25em; font-size:13px;}
</style>
</head>
<body>
<div class="row" id="tabla-listado">			
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
    <tr>
        <th width="10%">Nro</th>
        <th width="20%">Identificacion</th>
        <th width="30%">Nombre</th>
        <th width="10%">Fecha</th>
        <th width="20%">Empresa</th>
        <th width="10%">Imprimir</th>
    </tr>
</thead> 
</table>
</div>
<tbody>

</tbody>
</table>
</body>
</html>