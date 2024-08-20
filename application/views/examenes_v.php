 <style type="text/css">
    .chosen-container{width: 100% !important;color:#333;}
 .chosen-container-single .chosen-single{line-height:32px;}
 .chosen-container-single .chosen-single div{top:5px;}
  td input.error{
  border-color:#3D7BCF; background:#DFEEFF;
 }
 td label.error{ display: none !important; }
     .form-group .error{border-color:#3D7BCF; background:#DFEEFF; }
.input-group .error{border-color:#3D7BCF; background:#DFEEFF; }
    
    </style>

                    <div id="new"  style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Nuevo Examen</h2>
             
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">     
                          <div class="row">                           
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control required" id="nomexa" name="nomexa" type="text">
							<input class="form-control" id="codexa" name="codexa" type="hidden">
                          </div>
                            </div>
							
                            <div class="col-md-2">
                              <div class="form-group">
                                <label>Tipo</label>
                                   <select class="chosen-select required"  data-placeholder="Seleccione Tipo"  name="tipordb" id="tipordb">
                                  <option value=""></option>                                   
                                </select>                           
                               </div>
                            </div>
							
							 <div class="col-md-2">
                            <div class="form-group">
                            <label>Precio</label>
                            <input class="form-control required" id="precio" name="precio" type="text">
                          </div>
                            </div>
							
							 <div class="col-md-2">
                            <div class="form-group">
                            <label>Vencimiento</label>
                            <input class="form-control required" id="vencimiento" name="vencimiento" type="text">
                          </div>
                            </div>
							
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                          <button type="button" id="regi" class="btn btn-success">
                            <i class="fa fa-save"></i> Registrar Datos</button>
                           <button type="button" class="btn btn-warning" id="edi" style="display: none;"><i class="fa fa-pencil"></i> Guardar Datos</button> 
                           <button type="button" class="btn btn-danger" id="cance"><i class="fa fa-times"></i>Cancelar</button>
                               
                        </div>
                      </div>
                      
                      </div>
                          

</form>
</div>
</div>
</div>

<div class="row" id="tabla-listado">
	<div class="col-md-2">
	  <div class="form-group">
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar Examen</button>
			<button class="btn btn-success" id="lis_boton"><i class="fa fa-print"></i>Listado Examenes</button>
		</div>
	</div>
	
	

<div class="col-md-12">
			<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive " id="listado">
				 <thead>
					<tr>
						<th width="5%">Codigo</th>
						<th width="50%">Nombre</th>
						<th width="5%">Precio</th>
						<th width="5%">Vence</th>
						<th width="20%">Tipo</th>
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
	
	  $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
          	 $('#regi').css('display','inline-block');
			 $('#edi').css('display','none');
          	
          }); 
		  
		  $('#lis_boton').click(function () {
		  window.open('/laboratorio/Examenes_c/imprime_listado/', '_blank');
		 });
		  
		  $('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
          	 dtl();
          });  
		  
		  $('#regi').click(function(){
                             var estado=validarSelect(); 
                             if($("form#registrar").validate().form()==true&&estado==true){             
                              $.ajax({
                                url:'/laboratorio/Examenes_c/examenib',
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
							
				 $(document).on('click','.d',function(){
          	$('#regi').css('display','none');
          	 $('#edi').css('display','inline-block');
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
/*          	 $('#id_cliente').prop('readonly',true);*/

         	  $('form#registrar').get(0).reset();
			  $('#codexa').val($(this).attr('data-codexa'));
         	  $('#nomexa').val($(this).attr('data-nomexa'));
			  $('#precio').val($(this).attr('data-precio'));
			  $('#vencimiento').val($(this).attr('data-vencimiento'));

          });   
		  
		   $('#edi').click(function(){
                              var estado=$('#tipordb').val();

                             if($("form#registrar").validate().form()==true&&estado!=''){             
                              $.ajax({
                                url:'/laboratorio/Examenes_c/actualizar_examen',
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
		  			
		$(document).on('click','.borrar<?php echo $ale;?>',function(){
			$.ajax({
					url:'/laboratorio/Examenes_c/eliminar_examen',
					data:{'codexa':$(this).attr('data-codexa')},
					type:"POST",
					success: function(ans){
						 if(ans.err=='1'){
						   toastr.success('Datos Editados Satisfactoriamente');   
							dtl();
							}else{
							toastr.error('hubo un error al editar los datos');
						}
					}	
				});
				
		});
					
		$('#tipordb').chosen({no_results_text: "Resultado no encontrado!"});
		dtl();
		
	    /* Llenado Chossen*/
		$.post('/laboratorio/Examenes_c/tipexamenes/',function(resp){
		$.each(resp,function(i,v){
			$('#tipordb').append('<option value="'+v.codtip+'">'+v.ocutip+'</option>');
		});	$('#tipordb').trigger("chosen:updated");
		},'json');
		/*Fin llenado chossen*/
		
		});
		
		 function validarSelect(){
                        var estado= true;
                         $('.validar').each(function(index, element) {            
                         if($(this).val()==null||$(this).val()==''){
                           var cod =  $(this).attr('id');             
                          $('div#'+cod+'_chosen ').addClass('chosen-container-active')
                          estado=false;
                        }else{               
                          $('div#'+cod+'_chosen ').removeClass('chosen-container-active') ;
                          estado=true;            
                        }
                        });
                        return estado;
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
									"url": "/laboratorio/Examenes_c/examenesb/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	</script>