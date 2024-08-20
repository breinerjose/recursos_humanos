<script type="text/javascript">
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
									"url": "/Archivos_c/consultarterceros/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}	
	
	
$(document).ready(function(){
	dtl();
		
	 $(document).on('click','.editar<?php echo $ale; ?>',function(){
	  		 $('#edi').css('display','inline-block');
          	 $('#new').css('display','block');
			 $('#regi').css('display','none');
          	 $('#tabla-listado').css('display','none');
			 
			  $('#codtrc').val($(this).attr('data-cod'));
			  $('#nomtrc').val($(this).attr('data-nom'));
			  $('#codcaj').val($(this).attr('data-caj'));
			  $('#codest').val($(this).attr('data-est'));
			
	});
	
	 $('#cance').click(function(){
	         $('#edi').css('display','none');
			 $('#tabla-listado').css('display','block');
          	/* dtl();*/
          }); 
		  
		  $('#edi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Archivos_c/archivos_i',
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
							          	/* dtl();*/
							                                       
                                     }else toastr.error('hubo un error al editar los datos');

                                }
                              });
                                                       
                           }//else alert('Hay campos Requeridos');
                            });     
	
});
</script>
<div class="row" id="tabla-listado">

		<table class="table table-bordered table-striped dt-responsive" id="listado">
		<thead>
		<tr>
		<th width="10%">Codigoo</th>
		<th width="60%">Nombre</th>
		<th width="10%">Acciones.</th>
		</tr>
		</thead> 
		<tbody>
		</tbody>
		</table>
	</div>
	 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Registrar Archivo</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Identificacion</label>
							<input class="form-control requerid" id="codtrc" name="codtrc" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="nomtrc" name="nomtrc" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Estante</label>
							<input class="form-control requerid" id="codest" name="codest" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Caja</label>
							<input class="form-control requerid" id="codcaj" name="codcaj" type="Text">
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