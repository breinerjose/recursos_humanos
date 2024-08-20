 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Empresa</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-2">
                            <div class="form-group">
                            <label>Nit</label>
							<input class="form-control requerid" id="Nit" name="Nit" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-7">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="NombreCliente" name="NombreCliente" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Nombre Resumido</label>
							<input class="form-control requerid" id="nomres" name="nomres" type="Text" maxlength="25">
                          </div>
                            </div>
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
   <button type="button" id="regi" class="btn btn-success"><i class="fa fa-save"></i> Registrar</button>
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
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar Empresa</button>
		</div>
	</div>
	
<div class="col-md-12">
			<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive" id="listado">
				 <thead>
					<tr>
						<th width="15%">Nit</th>
						<th width="45%">Nombre</th>
						<th width="20%">Resumido</th>
                        <th width="15%">Acciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	</div>
	</div>
	
<div class="row" id="email" style="display: none;">
<form action="" method="POST" class="form-horizontal"  id="nuevoemail" name="nuevoemail" role="form">
							<div class="col-md-8">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="NomCli" name="NomCli" type="Text" readonly="">
							<input class="form-control requerid" id="codcli" name="codcli" type="hidden">
                          </div>
                            </div>

						<div class="col-md-4">
                            <div class="form-group">		
							<br />				
							<button type="button" class="btn btn-danger" id="cancel"><i class="fa fa-times"></i> Regresar</button>
							</div>
							</div>
							
						<div class="col-md-8">
                            <div class="form-group">
                            <label>Email</label>
							<input class="form-control requerid" id="emlcli" name="emlcli" type="Text">
                          </div>
                            </div>

						<div class="col-md-4">
                            <div class="form-group">		
							<br />				
							<button type="button" class="btn btn-primary" id="regist"><i class="fa fa-times"></i> Registrar</button>
							</div>
							</div>	
							
							</form>
							
<div class="col-md-12">
			<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive" id="listadoemail">
				 <thead>
					<tr>
						<th width="85%">Email</th>
                        <th width="15%">Acciones</th>
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
			 $('#email').css('display','none');
          	 dtl();
          }); 
		  
		  $('#cancel').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
			 $('#email').css('display','none');
          	 dtl();
          });   	 
		  
		   $(document).on('click','.editar<?php echo $ale; ?>',function(){
          	 $('#edi').css('display','inline-block');
          	 $('#new').css('display','block');
			 $('#regi').css('display','none');
          	 $('#tabla-listado').css('display','none');

         	  $('form#registrar').get(0).reset();
			  $('#Nit').val($(this).attr('data-nit'));
         	  $('#NombreCliente').val($(this).attr('data-nom'));
			  $('#nomres').val($(this).attr('data-res'));
			  $('#Nit').prop('readonly',true);
          });  
		  
		    $(document).on('click','.email<?php echo $ale; ?>',function(){
			$('#tabla-listado').css('display','none');
          	 $('#new').css('display','none');
			 $('#email').css('display','block');
			 
			  var IdCliente = $(this).attr('data-id');
			  $('#NomCli').val($(this).attr('data-nom'));
			   $('#codcli').val($(this).attr('data-id'));
			  emails(IdCliente);
          });  
		  
		   $(document).on('click','.borrar<?php echo $ale; ?>',function(){
             var Nit =$(this).attr('data-nit');
			 	$.ajax({
					url:'/Clientes_c/borrar_cliente',
					data:{'Nit':Nit},
					type:"POST",
					success: function(ans){
						 if(ans.err=='1'){
							 toastr.success('Cliente Borrado Satisfactoriamente');              
							 dtl();
							}else{
							 toastr.error('hubo un error');
						}
					}	
				});
          });  
		  
		  
		  $(document).on('click','.borraremail<?php echo $ale; ?>',function(){
             var cod =$(this).attr('data-id');
			 var eml =$(this).attr('data-eml');
			 	$.ajax({
					url:'/Clientes_c/borrar_email',
					data:{'id_cliente':cod,'emlcli':eml},
					type:"POST",
					success: function(ans){
						 if(ans.err=='1'){
							 toastr.success('Cliente Borradi Satisfactoriamente');              
							  emails(cod);
							}else{
							 toastr.error('hubo un error');
						}
					}	
				});
          });  
		  
		   $('#regi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Clientes_c/registrar_cliente',
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
		
		  $('#regist').click(function(){
		  					var cod = $('#codcli').val(); 
                             if($("form#nuevoemail").validate().form()){             
                              $.ajax({
                                url:'/Clientes_c/registrar_email',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#nuevoemail').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('#emlcli').val('');
										emails(cod);
                                       
                                     }else toastr.error(ans.msg);
                                }
                              });
                           }//else alert('Hay campos Requeridos');
                            }); 
												
							
		 $('#edi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Clientes_c/editar_cliente',
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
									"url": "/Clientes_c/clientes/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	
	
	function emails(IdCliente){
				var oTable = $('#listadoemail').dataTable({
							  "bPaginate": false,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Clientes_c/emailclientes/",
									"type": "POST",
									"data":{'IdCliente':IdCliente,"ale":"<?php echo $ale;?>"} 		
								}
    });	
	}
	</script>
	