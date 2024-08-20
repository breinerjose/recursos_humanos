<script type="text/javascript">
	$(document).ready(function(){
	 $('#eliminar').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Archivos_c/eliminar',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Archivo Eliminado Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();                                
                                     }else toastr.error(ans.msg);
                                }
                              });
                           }//else alert('Hay campos Requeridos');
                            }); 
							
							
							 }); 
							</script>
<div class="x_content">     
<div class="row">   
 							<form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							<div class="col-md-6">
                            <div class="form-group">
                            <label>Codigo</label>
							<input class="form-control requerid" id="token" name="token" type="Text">
                            </div>
                            </div>
							
							<div class="form-group">
                        	<div class="col-md-4">
                          	<button type="button" id="eliminar" style="margin-top:25px;" class="btn btn-warning"><i class="fa fa-save"></i> Eliminar</button>
                        	</div>
                      		</div>
							</form>
</div>
</div>