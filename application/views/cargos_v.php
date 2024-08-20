 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Cargos</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-4">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="carcod" name="carcod" type="hidden">
							<input class="form-control requerid" id="cardes" name="cardes" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-8">
                            <div class="form-group">
                            <label>Riesgo</label>
							<input class="form-control requerid" id="riesgo" name="riesgo" type="Text">
                          </div>
                            </div>
							
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                          <button type="button" id="regi" class="btn btn-success">
                            <i class="fa fa-save"></i> Registrar</button>
                           <button type="button" class="btn btn-warning" id="edi" style="display: none;"><i class="fa fa-pencil"></i> Guardar Datos</button> 
                           <button type="button" class="btn btn-danger" id="cance"><i class="fa fa-times"></i>Cancelar</button>
                               
                        </div>
                      </div>
                      
                      </div>
							</form>
							</div>
							</div>
			</div>
			</div>					
					
					
<div class="row" id="tabla-listado">
	<div class="col-md-12">
	  <div class="form-group">
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar Cargos</button>
		</div>
	</div>
	
<div class="col-md-12">
			<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive" id="listado">
				 <thead>
					<tr>
<!--						<th width="10%">Codigo</th>-->
						<th width="20%">Nombre</th>
						<th width="65%">Riesgo</th>
                        <th width="5%">Acciones</th>
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
	
	 $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','none');
			 $('#regi').css('display','inline-block');
          	$('#Nit').prop('readonly',false);
          }); 
		  
	  $('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
          	 dtl();
          });  	 
		  
		   $(document).on('click','.editar<?php echo $ale; ?>',function(){
          	 $('#edi').css('display','inline-block');
          	 $('#new').css('display','block');
			 $('#regi').css('display','none');
          	 $('#tabla-listado').css('display','none');

         	  $('form#registrar').get(0).reset();
			  $('#carcod').val($(this).attr('data-cod'));
         	  $('#cardes').val($(this).attr('data-des'));
			  $('#riesgo').val($(this).attr('data-rie'));
          });  
		  
		   $(document).on('click','.borrar<?php echo $ale; ?>',function(){
             var carcod =$(this).attr('data-cod');
			 	$.ajax({
					url:'/Cargos_c/cargo_d',
					data:{'carcod':carcod},
					type:"POST",
					success: function(ans){
						 if(ans.err=='1'){
							 toastr.success('Cliente Borradi Satisfactoriamente');              
							 dtl();
							}else{
							 toastr.error('hubo un error');
						}
					}	
				});
          });  
		  
		   $('#regi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Cargos_c/cargo_i',
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
							
		 $('#edi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Cargos_c/cargo_u',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Editados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
                                        /*$('#nom_tipidentificacion').trigger('chosen:updated');  */ 
                                         $('#new').css('display','none');
							          	 $('#tabla-listado').css('display','block');
							          	 dtl();
							                                       
                                     }else toastr.error('hubo un error al editar los datos');

                                }
                              });
                                                       
                           }//else alert('Hay campos Requeridos');
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
									"url": "/Cargos_c/listado/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	</script>
	