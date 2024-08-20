<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
			"sAjaxSource": "/Solcon_c/consultarsolicitudes/"+fecini+"/"+fecfin,
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
<script src="../res/build/js/custom.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<div class="table-responsive">
	<form id="agregar" name="agregar" method="post">
	
	 <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha Inicial:</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
						  <input name="fecini" class="form-control" id="fecini" value="<?php echo date("Y-m")."-01"; ?>">
						</div>
						 <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha Final:</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
						<input name="fecfin" class="form-control" id="fecfin" value="<?php echo date("Y-m-d"); ?>">
                      </div>
					</div>  
		<button class="btn btn-success" id="buscar">Consultar</button>
	</form><br>
			<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap">
				 <thead>
					<tr>
						<th>Funcionario</th>
						<th>Area</th>
						<th>Labor</th>
						<th>F. Contrato</th>
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