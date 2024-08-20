 <div id="new" style="display: block;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Registro de Ausencias</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-3">
                            <div class="form-group">
                            <label>Cedula</label>
							<input class="form-control requerid" id="codemp" name="codemp" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Fecha</label>
							<input class="form-control requerid" id="fecper" name="fecper" type="Text" placeholder="YYYY-MM-DD">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Hora Inicio</label>
							<input class="form-control requerid" id="fecper" name="fecper" type="Text" placeholder="HH:MM">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Hora Fin</label>
							<input class="form-control requerid" id="fecper" name="fecper" type="Text" placeholder="HH:MM">
                          </div>
                            </div>
							
							<div class="col-md-12">
                            <div class="form-group">
                            <label>Justificacion</label>
							<textarea name="fecper" rows="4" class="form-control requerid" id="fecper"></textarea>
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
	<div class="col-md-12"><hr /></div>
				
<div class="row" id="tabla-listado">
<div class="col-md-12">
			<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive" id="listado">
				 <thead>
					<tr>
<!--						<th width="10%">Codigo</th>-->
						<th width="30%">Estante</th>
						<th width="30%">Caja</th>
                        <th width="15%">Estado</th>
						<th width="15%">Imprimir</th>
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
                                url:'/Cajas_c/caja_i',
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
							
							
		$(document).on('click','.imp<?php echo $ale;?>',function(){ 
            var codest=$(this).attr('codest');   
            var codcaj=$(this).attr('codcaj');   
            window.open('/Cajas_c/print_caja/'+codest+'/'+codcaj,'','scrollbars=yes,width=1000,height=600');       
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
									"url": "/Ausencias_c/listado/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	</script>
	