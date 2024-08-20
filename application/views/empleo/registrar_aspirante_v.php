<script type="text/javascript">

 $('#regi').click(function(){

 			 if($("form#registrar").validate().form()==true){ 
                              $.ajax({
                                url:'/Registrar_aspirante_c/agregar_aspirante',
                               type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err==1){
                                       toastr.success('datos Insertados satisfactoriamente');              
                                       $('form#registrar').get(0).reset();                                       
                                     }else toastr.error('Ocurrio error al Guardarr');
									}
                                });
								}else toastr.error('Favor Verificar campos Requeridos');	
                            });
					
	
	
</script>
	 <form action="" method="pOst" class="form-horizontal"  id="registrar" name="registrar" role="form">	
 				<div class="row">                  
                          		
							   <div class="col-md-3">
                               <div class="form-group">
                               <label>cedula: </label>
							   <input class="form-control required" id="cedula" name="cedula" type="text">
                               </div>
                               </div>
							   
							    <div class="col-md-3">
                               <div class="form-group">
                               <label>expedida en: </label>
							   <input class="form-control " id="decedula" name="decedula" type="text">
                               </div>
                               </div>
							   
							   <div class="col-md-3">
                               <div class="form-group">
                               <label>primer nombre: </label>
							   <input class="form-control required" id="primernombre" name="primernombre" type="text">
                               </div>
                               </div>
							   
							    <div class="col-md-3">
                               <div class="form-group">
                               <label>segundo nombre: </label>
							   <input class="form-control" id="segundonombre" name="segundonombre" type="text">
                               </div>
                               </div>
							   
							   <div class="col-md-3">
                               <div class="form-group">
                               <label>primer apellido: </label>
							   <input class="form-control required" id="primerapellido" name="primerapellido" type="text">
                               </div>
                               </div>
							   
							    <div class="col-md-3">
                               <div class="form-group">
                               <label>segundo apellido: </label>
							   <input class="form-control" id="segundoapellido" name="segundoapellido" type="text">
                               </div>
                               </div>
							   
							    <div class="col-md-3">
                               <div class="form-group">
                               <label>telefono: </label>
							   <input class="form-control " id="telefono" name="telefono" type="text">
                               </div>
                               </div>
							   
							    <div class="col-md-3">
                               <div class="form-group">
                               <label>Fecha de nacimiento: </label>
							   <input class="form-control " id="fecnac" name="fecnac" type="text" placeholder="dd/mm/aaaa">
                               </div>
                               </div>
							   
							   <div class="col-md-3">
                               <div class="form-group">
                               <label>direccion: </label>
							   <input class="form-control " id="direccion" name="direccion" type="text">
                               </div>
                               </div>
							   
							    <div class="col-md-3">
                               <div class="form-group">
                               <label>email: </label>
							   <input class="form-control " id="email" name="email" type="text">
                               </div>
                               </div>
							   
							   <div class="col-md-3">
                               <div class="form-group">
                               <label>cargo: </label>
							   <input class="form-control " id="laborppal" name="laborppal" type="text">
                               </div>
                               </div>
							   
							   <div class="col-md-3">
                               <div class="form-group">
                               <label>Justificación: </label>
							   <input class="form-control " id="observ" name="observ" type="text">
                               </div>
                               </div>
		</div>
		
						<div class="row">
                        <div class="form-group">
						<center><button type="button" class="btn btn-warning" id="regi"><i class="fa fa-pencil"></i> Guardar </button> 	</center>   
						</div>	
						</div>				

        </form>        

