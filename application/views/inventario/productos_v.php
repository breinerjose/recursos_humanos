<div id="new-usuario">
 <div class="x_title titulo" id="">
       <h2 class="color-info">Agregar Nuevo Usuarios</h2>
                    <div class="clearfix"></div>
                    </div>
					
					  <div class="x_content">     
                          <div class="row">                           
                            <form action="" method="POST" class="form-horizontal"  id="registrar_tercero" name="registrar_tercero" role="form">                          
                            <div class="col-md-6">
                            <div class="form-group">
                            <label> Id Cliente / NIT</label>
                            <input class="form-control required" placeholder="CC/ NIT" id="codusr" name="codusr" type="text">
                          </div>
                            </div>
                            
							<div class="col-md-6">
                              <div class="form-group">
                                <label>Tipo Indentificacion</label>
                                <select class="chosen-select required" id="tipide" name="tipide" data-placeholder="Seleccione Tipo">
           						 <option value=""></option>           
   							  </select>  
                               </div>
                            </div>
							
							<div class="col-md-12">
                            <div class="form-group">
                            <label> Nombre</label>
                            <input class="form-control required" placeholder="Nombre del Usuario" id="nomusr" name="nomusr" type="text">
                          </div>
                            </div>
							
							     <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                          <button type="button" id="regi_usuario" class="btn btn-success">
                            <i class="fa fa-save"></i> Registrar Usuario</button>
                           <button type="button" class="btn btn-warning" id="edi_usuario" style="display: none;"><i class="fa fa-pencil"></i> Editar Datos</button> 
                           <button type="button" class="btn btn-danger" id="cance_usuario"><i class="fa fa-times"></i>Cancelar</button>
                               
                        </div>
                      </div>
                      
                      </div>
					  
							</form>
							</div>
							</div>
					</div>
<div class="row" id="tabla-usuarios">
	<div class="col-md-12">
		<div class="form-group">
			<button class="btn btn-primary" id="add_usuario"><i class="fa fa-plus"></i> Agregar Usuario</button>
		</div>
	</div>
	<div class="col-md-12">
<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive " id="listado_historias">
				 <thead>
					<tr>
						<th width="20%">Identificacion</th>
						<th width="70%">Nombre</th>
						<th width="10%">Acciones</th>
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
			
	$("#tipide").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
	$('#new-usuario').css('display','none');
	
                            $('#regi_usuario').click(function(){

                             if($("form#registrar_tercero").validate().form()==true){             
                              $.ajax({
                                url:'/Prueba_c/insertar',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar_tercero').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('form#registrar_tercero').get(0).reset();

   										$('#new-usuario').css('display','none');
							          	 $('#tabla-usuarios').css('display','block');
							          	 cargarusuarios();
                                       
                                     }else toastr.error(ans.msg);

                                }
                              });
 
                           }//else alert('Hay campos Requeridos');
                            });  

			
			$.post('/Prueba_c/identificacion/',function(resp){
			$.each(resp,function(i,v){
			$('#tipide').append('<option value="'+v.codide+'">'+v.nomide+'</option>');
			});	$('#tipide').trigger("chosen:updated");
			},'json');
		
			cargarusuarios();			
			 $('#add_usuario').click(function(){    
			  $('#new-usuario').css('display','block');
          	 $('#tabla-usuarios').css('display','none');
			  }); 
			  
			  $('#cance_usuario').click(function(){
			 $('#new-usuario').css('display','none');
          	 $('#tabla-usuarios').css('display','block');
          	
          });  
		  
		   $(document).on('click','.editar',function(){
          	$('#regi_usuario').css('display','none');
          	 $('#edi_usuario').css('display','inline-block');
          	 $('#new-usuario').css('display','block');
          	 $('#tabla-usuarios').css('display','none');
          	 $('#codusr').prop('readonly',true);

          	var codusr=$(this).attr('data-codusr');
          	var nomusr=$(this).attr('data-nomusr');
			
         	  $('form#registrar_tercero').get(0).reset();
         	  $('#codusr').val(codusr);
         	  $('#nomusr').val(nomusr);
         	  
          });    
		  
		   $('#edi_usuario').click(function(){
                           if($("form#registrar_tercero").validate().form()==true){   
                              $.ajax({
                                url:'/Prueba_c/actualizar',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar_tercero').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Editados Satisfactoriamente');              
                                       $('form#registrar_tercero').get(0).reset();
                                        $('#nom_tipidentificacion').trigger('chosen:updated');   
                                         $('#new-usuario').css('display','none');
							          	 $('#tabla-usuarios').css('display','block');
							          	 cargarusuarios();
							                                       
                                     }else toastr.error('hubo un error al editar los datos');

                                }
                              });
                                                       
                           }//else alert('Hay campos Requeridos');
                            });               
			  
		});
			function cargarusuarios(){
				var oTable = $('#listado_historias').dataTable({
							  "bPaginate": true,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Prueba_c/usuario/",
									"type": "POST"   ,
									"data":{}             						
								}
    });	
	}
	</script>