<div id="new" style="display: none;">
 <div class="x_title titulo" id="">
                    <h2 class="color-info">Agregar Clases</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                       <div class="row">   
					        <!--Contenido-->
					    </div>
						</div>
</div>
</div>	
	
<div class="row" id="tabla-listado">
	<div class="col-md-12">
	  <div class="form-group">
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar clases</button>
		</div>
	</div>
	
<div class="col-md-12">
			<div class="table-responsive">
			<table class="display table table-bordered table-striped dt-responsive" id="listado">
				 <thead>
					<tr>
<!--						<th width="10%">Codigo</th>-->
						<th width="20%">Codigo</th>
						<th width="50%">Nombre</th>
						<th width="30%">Acciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	</div>
	
	</div>
			
<script type="text/javascript">
$(document).ready(function(){
dtl();
});

function dtl(){
				var oTable = $('#listado').dataTable({
							  "bPaginate": true,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Clases_c/clases/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	
	</script>