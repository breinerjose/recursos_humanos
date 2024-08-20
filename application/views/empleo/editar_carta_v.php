 <div class="row" id="new" >
     <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
       <div class="col-md-12">
       <div class="form-group">
       <label>Asap Cuerpo</label>
	     <textarea class="form-control" rows="2" id="asap" name="asap" ></textarea>
    </div>
     </div>
	  <div class="col-md-12">
       <div class="form-group">
       <label>Asap Pie</label>
	     <textarea class="form-control" rows="2" id="asappie" name="asappie" ></textarea>
    </div>
     </div>
	  <div class="col-md-12">
       <div class="form-group">
       <label>Aseco Cuerpo</label>
	     <textarea class="form-control" rows="2" id="aseco" name="aseco" ></textarea>
    </div>
     </div>
	 <div class="col-md-12">
       <div class="form-group">
       <label>Aseco Pie</label>
	     <textarea class="form-control" rows="2" id="asecopie" name="asecopie" ></textarea>
    </div>
     </div>
	 
	  <div class="col-md-12">
       <div class="form-group">
       <label>Distri Cuerpo</label>
	     <textarea class="form-control" rows="2" id="distri" name="distri" ></textarea>
    </div>
     </div>
	  <div class="col-md-12">
       <div class="form-group">
       <label>Distri Pie</label>
	     <textarea class="form-control" rows="2" id="distripie" name="distripie" ></textarea>
    </div>
     </div>
 

      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
           <button type="button" class="btn btn-success" id="regi<?php echo $ale; ?>" ><i class="fa fa-save"></i> Guadar</button>
                               
                        </div>
                      </div>
                      
                      </div>
    </form> 
    </div><!--Fin Div New-->
    <script type="text/javascript">
	$(document).ready(function(){
		 $('#asap').Editor();
		 $('#aseco').Editor();
		 $('#distri').Editor();
		 $('#asappie').Editor();
		 $('#asecopie').Editor();
		 $('#distripie').Editor();		
		$('#regi<?php echo $ale; ?>').click(function(){  
		$('#asap').text($('#asap').Editor('getText'));
		$('#distri').text($('#distri').Editor('getText'));			
		$('#aseco').text($('#aseco').Editor('getText'));  
		$('#asappie').text($('#asappie').Editor('getText'));
		$('#distripie').text($('#distripie').Editor('getText'));			
		$('#asecopie').text($('#asecopie').Editor('getText'));      	
          	  if($("form#registrar").validate().form()==true){    
                              $.ajax({
                                url:'/Carta_c/actualiza',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');       
									    $('form#registrar').get(0).reset();
                                     }else toastr.error(ans.msg);

                                }
                              });
 
                           }else toastr.error('Campos Requeridos Pendientes');
          });
		  
		  //Inicio Editar
		 $(document).on('click','.regi<?php echo $ale; ?>',function(){ 
			 $('#id_consentimiento').val($(this).attr('data-cod'));
			 $('#new').css('display','block');
          	 $('#listados').css('display','none');
			 	                     
          }); 
		//Fin Editar
	
	});
	
	</script>