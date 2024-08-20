 <div id="new" style="display: none;">
 <div class="x_title titulo" id="">
                    <h2 class="color-info">Agregar Lineas</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                       <div class="row">   
					        <!--Contenido-->
							 <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
								   <div class="col-md-4">
                            <div class="form-group">
                            <label>Codigo</label>
							<input class="form-control requerid" id="codlin" name="codlin" type="Text" readonly>
                          </div>
                            </div>
							
							<div class="col-md-8">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="nomlin" name="nomlin" type="Text">
                          </div>
                            </div>
							
							 <div class="clearfix"></div>
							 <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                          <button type="button" id="regi" class="btn btn-success">
                            <i class="fa fa-save"></i> Registrar</button>
                           <button type="button" class="btn btn-warning" id="edi" style="display: none;">
						   <i class="fa fa-pencil"></i> Guardar Datos</button> 
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
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar Lineas</button>
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

 $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','none');
			 $('#regi').css('display','inline-block');
          }); 
		  
		    $('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
          	 dtl();
          });  
		  
		   $('#regi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Lineas_c/registrar_l',
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
							
			$(document).on('click','.edi<?php echo $ale;?>',function(){ 
			 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','inline-block');
			 $('#regi').css('display','none');
             $('#codlin').val($(this).attr('codlin'));
             $('#nomlin').val($(this).attr('nomlin'));   
        });  
		
		
			$(document).on('click','.del<?php echo $ale;?>',function(){
			                 var codlin = $(this).attr('codlin');
                              $.ajax({
                                url:'/Lineas_c/borrar_l',
                                type:'POST',
                                data:{'codlin':codlin},
                                success:function(resp){
                                    if(resp=='1'){
                                       toastr.warning('Datos Actualizados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
   									   $('#new').css('display','none');
   						          	   $('#tabla-listado').css('display','block');
							          	 dtl();
                                       
                                     }else toastr.error(resp.msg);
                                }
                              });
                            
		  });  
			
		 $('#edi').click(function(){  
                             if($("form#registrar").validate().form()){             
                                $.ajax({
                                url:'/Lineas_c/actualiza_l',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.warning('Datos Actualizados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
   										$('#new').css('display','none');
							          	 $('#tabla-listado').css('display','block');
							          	 dtl();                                       
                                     }else toastr.error(ans.msg);
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
									"url": "/Lineas_c/lineas/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	
	</script>