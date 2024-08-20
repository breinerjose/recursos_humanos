 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Cambiar Estado a Empleado</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-2">
                            <div class="form-group">
                            <label>Identificacion</label>
							<input class="form-control requerid" id="codemp" name="codemp" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre del Empleado</label>
							<input class="form-control requerid" id="nombres" name="nombres" type="Text" readonly >
                          </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Estado Actual del Empleado</label>
							<input class="form-control requerid" id="estact" name="estact" type="Text" readonly >
                          </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Nuevo Estado a Empleado</label>
							  <select class="chosen-select required" id="estnue" name="estnue" data-placeholder="Seleccione Estado">
						   <option value="Archivo Muerto">Archivo Muerto</option> 
						   <option value="Disponible">Disponible</option>  
						   </select>
                          </div>
                            </div>
							
							<div class="col-md-12">
                            <div class="form-group">
                            <label>Justificion del Cambio</label>
							 <textarea id="obsest" name="obsest"  class="form-control" rows="2" ></textarea>
                          </div>
                            </div>
														
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                        <button type="button" class="btn btn-warning" id="edi" ><i class="fa fa-pencil"></i> Guardar Datos</button> 
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
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Cambiar Estado</button>
		</div>
	</div>
	
<div class="col-md-12">
			<table class="table table-bordered table-striped dt-responsive" id="listado">
				 <thead>
					<tr>
						<th width="30%">Empleado</th>
						<th width="35%">Justificacion</th>
                        <th width="10%">E. Inicial</th>
						<th width="10%">E. Final</th>
						<th width="15%">Fecha</th>
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
	
	   $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $("#estnue").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
          }); 
		  
	   $('#codemp').keyup(function(event){
                            if(event.which == 13){cargarDatosUsuario($('#codemp').val());}
                            });
							
		 $('#codemp').blur(function(){ 
		 cargarDatosUsuario($('#codemp').val()); 
		 });	
		 
	  $('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
          	 dtl();
          }); 
		
	 $('#edi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Estados_c/registrar',
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
	
	 function cargarDatosUsuario(codemp){
                      $.ajax({
                         url:'/Estados_c/datosusuario/',
                         type:'POST',
                         dataType:'JSON',
                         data:{"codemp":codemp},
                         success:function(ans){
                          if(ans.err=='1'){
						    $('#nombres').val(ans.a.nombres);
							$('#estact').val(ans.a.estado);
						  }
					 } 	  
   			 });	
	}
	 
						   
		  	
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
									"url": "/Estados_c/cambios/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	
	</script>
	