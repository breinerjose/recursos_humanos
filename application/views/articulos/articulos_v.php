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
									"url": "/articulos_c/todos_articulos/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
								}
   					 });	
	}
	

$(document).ready(function(e) {
	
	dtl();
	
	$('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','none');
			 $('#regi').css('display','inline-block');
          	 $('#codart').prop('readonly',false);
			 $(".chosen").chosen();
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
			  
			  $('#codart').val($(this).attr('codart'));
         	  $('#serial').val($(this).attr('serial'));
			  $('#usocom').val($(this).attr('usocom'));
			  $('#codusr').val($(this).attr('codusr'));
			  $('#nomart').val($(this).attr('nomart'));
			  $('#carart').val($(this).attr('carart'));
			   $(".chosen").chosen();
			  $('#usocom').trigger("chosen:updated");
			  			  
          }); 
		  	  
	  $('#regi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/articulos_c/agregar_articulo',
                                type:'POST',
                                dataType:'JSON',
                             data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
   										$('#new').css('display','none');
							          	 $('#tabla-listado').css('display','block');
							          	 dtl();
                                       
                                     }else toastr.error(ans.msg);
                                }
                              });
                           }else toastr.error('Campos Requeridos');
                            }); 	  
	
	
});
</script>
<div class="row" id="tabla-listado">
	<div class="col-md-12">
	  <div class="form-group">
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i>Agregar Articulo</button>
		</div>
	</div>
	
		<div class="col-md-12">
			<table class="table table-bordered table-striped dt-responsive" id="listado">
        <thead>
            <tr>
                <th width="5%">Nro</th>
                <th width="35%">Nombre</th>
                <th width="10%">Serial</th>
                <th width="5%">Comun</th>
				<th width="40%">Responsable</th>
                <th width="5%">Acciones</th>
            </tr>
        </thead> 
        <tbody>
        
        </tbody>
    </table>
	</div>
	</div>
	
	 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Articulos</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-1">
                            <div class="form-group">
                            <label>Codigo</label>
							<input class="form-control requerid" id="codart" name="codart" type="Text">
                          </div>
                            </div>
							
							   <div class="col-md-2">
                            <div class="form-group">
                            <label>Serial</label>
							<input class="form-control requerid" id="serial" name="serial" type="Text">
                          </div>
                            </div>
							
							   <div class="col-md-1">
                            <div class="form-group">
                            <label>Uso Comun</label><br>
							<select name="usocom" id="usocom" class="chosen-select chosen" >
							<option value="NO">NO</option>
							<option value="SI">SI</option>
							</select>
                          </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Responsable</label>
							<input class="form-control requerid" id="codusr" name="codusr" type="Text">
                            </div>
                            </div>
							
							<div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre Articulo</label>
							<input class="form-control requerid" id="nomart" name="nomart" type="Text">
                          </div>
                            </div>
							
							
							<div class="col-md-12">
                            <div class="form-group">
                            <label>Descripcion</label>
							 <textarea class="form-control" rows="5" id="carart" name="carart"></textarea>
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