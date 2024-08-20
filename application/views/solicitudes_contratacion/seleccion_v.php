                    <style>
table.display tbody tr td p input {
    width: 95%;
}
table.display th{font-size:11px; padding:1px;}
table.display tbody tr td{font-size:11px; padding:1px;}
.inpeditdetdcm{width:161px;height:20px;margin:1px;}
</style>
				    <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Datos de la Persona Seleccionada</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />  
				    <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
                  		 <div class="col-md-4">
                            <div class="form-group">
                            <label>Identificacion</label>
							<input class="form-control requerid" id="codsol" name="codsol" type="hidden">
							<input class="form-control requerid" id="codtrc" name="codtrc" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-8">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="nomtrc" name="nomtrc" type="Text" readonly>
                          </div>
                            </div>
					  
                     
						<br>
					  <center>
					  <button type="button" class="btn btn-success" id="regi" ><i class="fa fa-save"></i> Registrar</button>
					  <button type="button" class="btn btn-warning" id="edi" style="display: none;"><i class="fa fa-pencil"></i> Guardar Datos</button> 
                      <button type="button" class="btn btn-danger" id="cance"><i class="fa fa-times"></i>Cancelar</button>
					  </center>
                    </form>
					</div>
					</div>
					</div>
					</div>
					<div class="row" id="tabla-listado">

<div class="col-md-12">
			<!--<table class="table table-bordered table-striped dt-responsive" id="listado">-->
			<table class="display table-striped" style="width:100%" id="listado">
				 <thead>
					<tr>
<!--						<th width="10%">Codigo</th>-->
                        <th width="20%">Cargo</th>
						<th width="20%">Cliente</th>
						<th width="10%">Fech. Solicitud</th>
						<th width="10%"> Env. A Cliente </th>
						<th width="15%"> Seleccionado </th>
						<th width="5%">Fecha Ingreso</th>
						<th width="5%">Fecha Contrato </th>
						<th width="5%">Estado</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	
	</div>				
<script type="text/javascript">
$(document).ready(function(){
	dtl();
          }); 
			
	 $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','none');
			 $('#regi').css('display','inline-block');
			 
			 
			});
				 
		  $(document).on('click','.enviado<?php echo $ale; ?>',function(){
		 var codsol = $(this).attr('data-cod');
			 $.ajax({
                                url:'/Solcon_c/enviado_cliente',
                                type:'POST',
                                dataType:'JSON',
                                data:{'codsol':codsol},
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       dtl();
                                     }else toastr.error(ans.msg);
                                }
                              });
					 });  
					 
		  $(document).on('click','.borrar<?php echo $ale; ?>',function(){
		 var codsol = $(this).attr('data-cod');
			 $.ajax({
                                url:'/Solcon_c/eliminar_seleccionado',
                                type:'POST',
                                dataType:'JSON',
                                data:{'codsol':codsol},
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       dtl();
                                     }else toastr.error(ans.msg);
                                }
                              });
					 });  			 
					 
		  $(document).on('click','.seleccion<?php echo $ale; ?>',function(){
			$('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','none');
			 $('#regi').css('display','inline-block');
			$('#codsol').val($(this).attr('data-cod'));
			
					 });  			 
		  
	  $('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
          	 dtl();
          });  	 
		  
	 $('#regi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Solcon_c/seleccionado',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
/*                                        $('#nom_tipidentificacion').trigger('chosen:updated');*/

   										$('#new').css('display','none');
							          	 $('#tabla-listado').css('display','block');
							          	 dtl();
                                       
                                     }else toastr.error(ans.msg);
                                }
                              });
                           }//else alert('Hay campos Requeridos');
                            }); 
		
		$('#codtrc').on('change',function(){
		var codtrc = $('#codtrc').val();
		$('#nomtrc').empty();
		$.ajax({
			url:'/Solcon_c/nombre/',
			type:'POST',
			dataType:'JSON',
			data:{"codtrc":codtrc},
			success:function(ans){
                                    if(ans.e.err=='1'){
                                      $('#nomtrc').val(ans.i.nomtrc);                                      
                                     }else toastr.error('hubo error al consultar seleccionado');
                                }
		});
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
									"url": "/Solcon_c/seleccion/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
</script> 
	