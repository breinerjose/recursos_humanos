<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$fecfin = date('Y-m-d');
$fecini = strtotime ( '-5 day' , strtotime ( $fecfin) ) ;
$fecini = date ( 'Y-m-d' , $fecini );
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
	var oTable;
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	function dtl(fecini,fecfin){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '300px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/laboratorio/clientes_c/consultarcertificados/"+fecini+"/"+fecfin,
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	$(document).ready(function(){
	
	$('#buscar').click(function(e){
		e.preventDefault();
		
		var fecini = $('#fecini').val();
		var fecfin = $('#fecfin').val();
		dtl(fecini,fecfin);
	});
	});
	</script>
	<script type="text/javascript">
	$(document).on("click", ".open-Modal", function () {
	var myDNI = $(this).data('id');
	$(".modal-body #DNI").val( myDNI );
	});
</script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<div class="table-responsive">
	<form id="agregar" name="agregar" method="post">
	<label>Fecha Inicio</label>
		<input name="fecini" class="form-control" id="fecini" value="<?php echo $fecini; ?>">
	<label>Fecha Fin</label>
		<input name="fecfin" class="form-control" id="fecfin" value="<?php echo $fecfin; ?>">
		<br>
		<button class="btn btn-success" id="buscar">Consultar</button>
	</form><br><br>
			<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap">
				 <thead>
					<tr>
						<th>Id</th>
						<th>Historia</th>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	</div>
	</div>
</div>
</body>
</html>