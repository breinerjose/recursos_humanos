<?php if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();} ?>
<script type="text/javascript">
function dtl(a){
		oTable = $('#tabla').dataTable( {
		"order": [[ 8, "desc" ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Ordenes_c/ordenes/1/Generado/"+a,
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
		dtl('2021-01-01');	
	}
$(document).ready(function(){
	dtl('2021-01-01');
	
	 $('#historico').click(function () {
		  if ($('#historico').is(':checked')) {
		  	dtl('2000-01-01');
		  }else{ 	dtl('2021-01-01'); }
        });
	
	   $('#tabla').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/Ordenes_c/impaprobarordenhseq/'+cod,'','scrollbars=yes,width=1020,height=750');	
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
<div class="row" id="registrar" >
	<form action="" method="POST" class="form-horizontal"  id="registrar<?php echo $ale;?>"  name="registrar<?php echo $ale;?>" role="form">
	 <div class="col-md-3">
       <div class=" form-group">
        <label class="control-label">Historico:</label>
		  <input type="checkbox" name="historico" id="historico" value="si" autocomplete="off">
       </div>
     </div>
	</form>
</div>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Numero</th>
<th width="20%">Persona</th>
<th width="10%">Cargo</th>
<th width="10%">Centro de Trabajo</th>
<th width="15%">Laboratorio</th>
<th width="9%">Tipo</th>
<th width="8%">Estado</th>
<th width="8%">Observacion</th>
<th width="8%">Fec. Sol</th>
<th width="10%">Ver</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>