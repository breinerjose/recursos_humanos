<?php if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();} ?>
<form action="" method="POST" class="form-horizontal"  id="upd_form<?php echo $ale;?>"  name="upd_form<?php echo $ale;?>" role="form">
	
	 <div>
	 <div class="col-md-12">
       <div class="item form-group">
	   <center>
         <center><h2 class="text-primary">DATOS BASICOS DEL ASPIRANTE</h2></center>
       </center>
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class="item form-group">
        <label class="control-label">Cedula:</label>
		<input type="text" class="form-control required" name="ocuced" id="ocuced">
       
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Nombre:</label>
		<input type="text" class="form-control required" name="ocunom" id="ocunom">
       
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Apellidos:</label>
		<input type="text" class="form-control required" name="ocuape" id="ocuape">
       
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Direccion:</label>
		<input type="text" class="form-control required" name="ocudir" id="ocudir">
       
       </div>
     </div>
	 
	  <div class="col-md-2">
       <div class=" form-group">
        <label class="control-label">Telefono:</label>
		<input type="text" class="form-control required" name="ocutel" id="ocutel">
       
       </div>
     </div>
	 
	 <div class="col-md-2">
       <div class=" form-group">
        <label class="control-label">Celular:</label>
		<input type="text" class="form-control required" name="ocucel" id="ocucel">
       
       </div>
     </div>
	 
	 <div class="col-md-2">
       <div class="form-group">
        <label class="control-label">Edad:</label>
		<input type="text" class="form-control required" name="edad" id="edad" >
		    </div>
     </div>
       
	    <div class="col-md-6">
       <div class="form-group">
       <label class="control-label">Laboratorio</label>
       <select class="chosen-select required validar" id="codlab" name="codlab" data-placeholder="Seleccione Laboratorio">
            <option value=""></option>           
     </select>  
       </div>
     </div>
	   
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Fecha Solicitud:</label>
		 <input name="fecsol" class="form-control required" id="fecsol" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>" readonly>   
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Observación:</label>
		<textarea class="form-control" type="text" name="obssol"  id="obssol" ></textarea>
       
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Fecha Ingreso:</label>
		 <input name="fecing" class="form-control required" id="fecing" placeholder="YYYY-MM-DD" value="">  
       
       </div>
     </div>
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Observación:</label>
		<textarea class="form-control" type="text" name="obsing"  id="obsing" ></textarea>
       
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Tipo de Vinculacion:</label>
		<input class="form-control required" type="text" name="tipcon"  id="tipcon" readonly >
       
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Eps:</label>
		 <select class="chosen-select required validar" id="eps" name="eps" data-placeholder="Seleccione Tipo">
            <option value=""></option>           
     </select> 
       
       </div>
     </div>
	 
	 <div class="col-md-3">
       <div class="item form-group">
       <label class="control-label">Tipo</label>
     <select class="chosen-select required validar" id="tipord" name="tipord" data-placeholder="Seleccione Tipo">
            <option value=""></option>           
     </select>  
       
       </div>
     </div>
	 
	 <div class="col-md-3">
       <div class=" form-group">
        <label class="control-label">Contratista:</label>
		  <select class="chosen-select required validar" id="ocupor" name="ocupor" data-placeholder="Seleccione Contratista">
		  <option value=""></option> 
	   <option value="ASECO">ASECO</option> 
	   <option value="ASAP">ASAP</option>  
	   </select>
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class="item form-group">
       <label class="control-label">Tipo de Sangre:</label>
       <select class="chosen-select required validar" id="tipsan" name="tipsan" data-placeholder="Seleccione Tipo de Sangre">
       <option value=""></option>
	   <option value="O+">O+</option>
       <option value="O-">O-</option>
       <option value="A+">A+</option>
       <option value="A-">A-</option>
       <option value="B+">B+</option>
       <option value="B-">B-</option>
       <option value="AB+">AB+</option>
       <option value="AB-">AB-</option>       
     </select>  
       </div>
     </div>
	 
	  <div class="col-md-6">
       <div class="item form-group">
       <label class="control-label">Cliente</label>
       <select class="chosen-select required validar" id="id_empresa" name="id_empresa" data-placeholder="Seleccione Cliente">
       <option value=""></option>           
     </select>  
       </div>
     </div>
	 
	 
	 <div class="col-md-6">
       <div class="item form-group">
       <label class="control-label">Cargo</label>
       <select class="chosen-select required validar" id="codcar" name="codcar" data-placeholder="Seleccione Cargo">
            <option value=""></option>           
     </select>  
       </div>
     </div>
	 
	 <div class="col-md-12">
       <div class="item form-group">
       <center>
	   <button type="button" id="update_form<?php echo $ale;?>" style="margin-top: 23px;" class="btn btn-success">
                            <i class="fa fa-save"></i> Generar Orden</button>
       </center>
       </div>
     </div>
	 
	 
</form>	 
	<script type="text/javascript">
		$(document).ready(function(){
		jQuery.validator.messages.required = "";  				
		$("#id_empresa").chosen();
		$("#codcar").chosen();
		$("#tipsan").chosen();			
		$("#tipord").chosen();
		$("#ocupor").chosen();
		$("#eps").chosen();
		$("#codlab").chosen();

		$.post('/Cargos_c/laboratorios/',function(resp){
		$.each(resp,function(i,v){
		$('#codlab').append('<option value="'+v.empnom+'-'+v.empema+'-'+v.emptel+'-'+v.empcel+'-'+v.ocuemp+'-'+v.empnit+'">'+v.empnit+' '+v.empnom+'</option>');
		});	$('#codlab').trigger("chosen:updated");
		},'json');
		
		
		$('#fecing').datepicker({
		 format: 'yyyy-mm-dd',
		 autoclose:true
		});
	
		$.post('/laboratorio/Examenes_c/subgru',function(resp){
		$.each(resp,function(i,v){
			$('#tipord').append('<option value="'+v.subgru+'">'+v.subgru+'</option>');
		});	$('#tipord').trigger("chosen:updated");
		},'json');
		
		$.post('/laboratorio/Eps_c/todas_eps/',function(resp){
		$.each(resp,function(i,v){
			$('#eps').append('<option value="'+v.codeps+' '+v.nomeps+'">'+v.codeps+' '+v.nomeps+'</option>');
		});	$('#eps').trigger("chosen:updated");
		},'json');
					
		$('#ocupor').on('change',function(){	
		$('#id_empresa').empty();
		var ocupor = $('#ocupor').val();					
		$.post('/Cargos_c/clientes/',{'ocupor':ocupor},function(resp){
		$.each(resp,function(i,v){
			$('#id_empresa').append('<option value="'+v.codcli+'-'+v.nomcli+'">'+v.codcli+' '+v.nomcli+'</option>');
		});	$('#id_empresa').trigger("chosen:updated");
		},'json');
		});
		
		$('#id_empresa').on('change',function(){
		var id_empresa = $('#id_empresa').val();
		var ocupor = $('#ocupor').val();
		$('#codcar').empty();
		$.post('/Cargos_c/Cargos_empresa',{'id_empresa':id_empresa, 'ocupor':ocupor},function(resp){
		$.each(resp,function(i,v){
			$('#codcar').append('<option value="'+v.codcrg+'-'+v.cardes+'">'+v.cardes+'</option>');
		});	$('#codcar').trigger("chosen:updated");
		},'json');
		});
		
		 $('#ocuced').keyup(function(event){
                            if(event.which == 13){ 
							cargarDatosUsuario($(this).val()); 
							tipocontratacion($(this).val()); 
												 }
                            });
							
		 $('#ocuced').blur(function(){ 
		 cargarDatosUsuario($('#ocuced').val()); 
		 tipocontratacion($('#ocuced').val()); 
		 });	
		 
					  $('#update_form<?php echo $ale;?>').click(function(){
              				 var estado=validarSelect();    
							  var eps = $('#eps').val(); 
							  var tipsan = $('#tipsan').val(); 
							  var codcar = $('#codcar').val();
							  var codlab = $('#codlab').val();
							      
        if($("form#upd_form<?php echo $ale;?>").validate().form()==true&&estado==true&&eps!=''&&tipsan!=''&&codcar!='-'&&codlab!=''){ 
                              $.ajax({
                                url:'/laboratorio/Orden_c/generar/',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#upd_form<?php echo $ale;?>').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
									 $('form#upd_form<?php echo $ale;?>').get(0).reset();
									 $('#codcar').empty();    
                                       toastr.success('Datos Actualizados Satisfactoriamente');               
                                     }else toastr.error('hubo un error');

                                }
                              });
                            }else toastr.error('Hay Campos Requeridos');
                            }); 				
		
		}); <!--Fin document ready-->
		
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
		
		function calculateAge(birthday) {
    	var birthday_arr = birthday.split("/");
   		var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
    	var ageDifMs = Date.now() - birthday_date.getTime();
    	var ageDate = new Date(ageDifMs);
    	return Math.abs(ageDate.getUTCFullYear() - 1970);
		}

		 function cargarDatosUsuario(ocuced){
                      $.ajax({
                         url:'/Empleados_c/tercerosc/',
                         type:'POST',
                         dataType:'JSON',
                         data:{"ocuced":ocuced},
                         success:function(ans){
                          if(ans.err=='1'){                           
                            $('#ocunom').val(ans.a.ocunom);
                            $('#ocuape').val(ans.a.ocuape);
                            $('#ocudir').val(ans.a.ocudir);
                            $('#ocucel').val(ans.a.ocucel);
							$('#ocutel').val(ans.a.ocutel);
							var age = calculateAge(ans.a.edad);
                            $('#edad').val(age);
                            $('#ocuced').removeClass('error');
                          }else{
						 	$('#ocunom').val(''); 
                            $('#ocuape').val('');  
                            $('#ocudir').val(''); 
                            $('#ocucel').val('');  
							$('#ocutel').val(''); 
                            $('#edad').val(''); 
                            $('#ocuced').addClass('error');
                            toastr.warning('!Este Aspírante No Existe¡, o su estado no es Habilitado');      
                          }
                         } 
                      });
                    }
					
				function tipocontratacion(ocuced){
                      $.ajax({
                         url:'/Empleados_c/contrato/',
                         type:'POST',
                         dataType:'JSON',
                         data:{"ocuced":ocuced},
                         success:function(ans){
                          if(ans.err=='1'){                           
                            $('#tipcon').val('NUEVA CONTRATACION');
                          }else{
						 	$('#tipcon').val('NUEVO ASPIRANTE');  
                          }
                         } 
                      });
                    }	
	</script>