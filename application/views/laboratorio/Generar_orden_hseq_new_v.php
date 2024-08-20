<?php if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();} ?>
<form autocomplete="off" action="" method="POST" class="form-horizontal"  id="upd_form<?php echo $ale;?>"  name="upd_form<?php echo $ale;?>" role="form">
	
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
	 
	 <div class="col-md-1">
       <div class="form-group">
        <label class="control-label">Edad:</label>
		<input type="text" class="form-control required" name="edad" id="edad" >
		    </div>
     </div>
	 
	  <div class="col-md-1">
       <div class="form-group">
        <label class="control-label">Aprobado:</label>

		    <label>
		    <input name="aproba" type="checkbox" id="aproba" value="si" checked="checked" />
		    </label>
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
	   <div class="clearfix"></div>
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
	 <div class="clearfix"></div>
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Fecha Ingreso / Egreso:</label>
		 <input name="fecing"  class="form-control required" id="fecing" placeholder="YYYY-MM-DD" value="">  
       
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
	 <div class="clearfix"></div>
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
	   <div id="botones" name="botones" style="display: none;">
       <center>
	   <button type="button" id="update_form<?php echo $ale;?>" style="margin-top: 23px;" class="btn btn-success">
                            <i class="fa fa-save"></i> Generar Orden</button>
       </center>
	   </div>
       </div>
     </div>
	 
</form>	 

<!--	 ----->
	   <div class="row">
                        <div class="col-sm-12 col-md-12">

                          
                              <table class="table table-bordered table-striped dt-responsive " id="listado_examenes">
                                 <thead>
                                  <tr>
                                    <th width="5%">#</th>
                                    <th width="45%">Examen</th>
                                    <th width="10%">Vigencia</th>                     
                                    <th width="10%">Factura</th>
                                    <th width="10%" class="sum">Precio</th>
                                    <th width="10%">Eliminar</th>
                                    
                                  </tr>
                                </thead>
                                        <tfoot>
                                      <tr>
                                        <th colspan="4" style="text-align: right;"><label >Total</label></th>
                                        <th>Precio</th>
                                        <th></th>
                                      </tr>
                                    </tfoot>
                                <tbody>
                                </tbody>
                          </table>
                          
                  </div>
                </div>
				
						<form autocomplete="off" action="" method="POST" class="form-horizontal"  id="procedimiento" name="procedimiento" role="form">  
                          <div class="row">                           
                           
						    <div class="col-md-6">
                              <div class="form-group">
                                <label>Examen :</label>
				 <select class="chosen-select required valr"  data-placeholder="Seleccione Tipo Examen"  name="codconc" id="codconc">
                 <option value=""></option>              
                 </select>
                                </div>
                            </div>
							
							  <div class="col-md-2">
							  	<label>Factura</label>
							   <div class="form-group">
							   <select name="tipcob" id="tipcob">
							   <option value="ARL">ARL</option> 
							   <option value="CLIENTE">CLIENTE</option> 
							   <option value="EMPRESA">EMPRESA</option> 
							   <option value="TARIFA">TARIFA</option>  
							   </select> 
							   </div>
							 </div>
	 
                            <div class="col-md-2">
                               <label>Precio:</label>
                              <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input type="text" class="form-control required" aria-label="Valor del Examen" id="precio" name="precio" value="0">
                              <span class="input-group-addon">.00</span>
                            </div>
                            </div>
                            
                            <div class="col-md-2">
                              <div class="form-group">
                               <button type="button" id="add_examen" style="margin-top: 23px;" class="btn btn-primary">
                            <i class="fa fa-save"></i>Agregar</button>
                          </div>
                            </div>
                    </div>
                    </form>
<!--	 ----->
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
		$("#codconc").chosen();
		$("#tipcob").chosen();

		$.post('/Cargos_c/laboratorios/',function(resp){
		$.each(resp,function(i,v){
		$('#codlab').append('<option value="'+v.empnom+'-'+v.empema+'-'+v.emptel+'-'+v.empcel+'-'+v.ocuemp+'-'+v.empnit+'">'+v.empnit+' '+v.empnom+'</option>');
		});	$('#codlab').trigger("chosen:updated");
		},'json');
		
				$(document).on('click','.eliminar<?php echo $ale;?>',function(){
                          var id=$(this).attr('data-con');
                              $.post('/laboratorio/Orden_c/examen_ordern_borrar',{"id":id},function(ans){
                                if(ans.err=='1'){
                                    toastr.success('Datos Actualizados Satisfactoriamente');
                                     cargarlistado_examenes('0');           
                                }

                              },'JSON');
                            
                        });
						
		$('#codconc').empty();
		$.post('/laboratorio/Examenes_c/exameness/',function(resp){
		$.each(resp,function(i,v){
			$('#codconc').append('<option value="'+v.codexa+'-'+v.nomexa+'">'+v.nomexa+'</option>');
		});	$('#codconc').trigger("chosen:updated");
		},'json');
		
		$('#codconc').on("change", function (evt, params) { 
                             if($(this).val()!=''){   
                              consultarPrecio($(this).val(),$('#codconc').val());
                            }
		 });
		
		$('#fecing').datepicker({
		 format: 'yyyy-mm-dd',
		 autoclose:true
		});
	
	   $('#add_examen').click(function(){  
	   						if($("form#procedimiento").validate().form()){
                              $.ajax({
                                url:'/Ordenes_new_c/exameni',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#procedimiento').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Actualizados Satisfactoriamente');
                                       $('form#procedimiento').get(0).reset();                                   
         							   cargarlistado_examenes('0');         
                                     }else toastr.error('hubo un error');

                                }
								
                              });
                       			}else alert('Hay campos Requeridos');
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
		var tipord = $('#tipord').val();					
		$.post('/Cargos_c/clientes/',{'ocupor':ocupor,'tipord':tipord},function(resp){
		$.each(resp,function(i,v){
			$('#id_empresa').append('<option value="'+v.codcli+'-'+v.nomcli+'">'+v.codcli+' '+v.nomcli+'</option>');
		});	$('#id_empresa').trigger("chosen:updated");
		},'json');
		});
		
		
		$('#tipord').on('change',function(){
		
		var codcar = $('#codcar').val();
		var id_empresa = $('#id_empresa').val();
		var ocupor = $('#ocupor').val();
		var tipord = $('#tipord').val();
		var ocuced = $('#ocuced').val();
		var fecing = $('#fecing').val();
		
		if(ocuced != '' && codcar != '' && id_empresa != '' && ocupor != '' && tipord != '' && fecing != ''){
		$('#botones').css('display','block');
		$.post('/Ordenes_new_c/carga_examen',{'ocuced':ocuced, 'codcar':codcar, 'id_empresa':id_empresa, 'ocupor':ocupor, 'tipord':tipord, 'fecing':fecing},function(resp){
		 if(resp.err=='1'){ toastr.error(resp.msg); }else{
		$.each(resp,function(i,v){
			cargarlistado_examenes('0');
			});	
		}
		},'json');
		}
		
		});
		
		
		$('#id_empresa').on('change',function(){
		var id_empresa = $('#id_empresa').val();
		var ocupor = $('#ocupor').val();
		var tipord = $('#tipord').val();
		$('#codcar').empty();
		$.post('/Cargos_c/Cargos_empresa',{'id_empresa':id_empresa, 'ocupor':ocupor, 'tipord':tipord},function(resp){
		$.each(resp,function(i,v){
			$('#codcar').append('<option value="'+v.codcrg+'-'+v.cardes+'">'+v.cardes+'</option>');
		});	$('#codcar').trigger("chosen:updated");
		},'json');
		});
		
		$('#codcar').on('change',function(){
		var codcar = $('#codcar').val();
		var id_empresa = $('#id_empresa').val();
		var ocupor = $('#ocupor').val();
		var tipord = $('#tipord').val();
		var ocuced = $('#ocuced').val();
		var fecing = $('#fecing').val();
		
		$('#botones').css('display','block');
		$.post('/Ordenes_new_c/carga_examen',{'ocuced':ocuced, 'codcar':codcar, 'id_empresa':id_empresa, 'ocupor':ocupor, 'tipord':tipord, 'fecing':fecing},function(resp){
		 if(resp.err=='1'){ toastr.error(resp.msg); }else{
		$.each(resp,function(i,v){
			cargarlistado_examenes('0');
			});	
		}
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
					  
					 		$('#botones').css('display','none');
              				 var estado=validarSelect();    
							  var eps = $('#eps').val().trim(); 
							  var tipsan = $('#tipsan').val().trim(); 
							  var codcar = $('#codcar').val().trim();
							  var codlab = $('#codlab').val().trim();
							  var edad = $('#edad').val().trim();
							  var fecing = $('#fecing').val().trim();
							  var ocuced = $('#ocuced').val().trim(); 
 if(estado==true&&eps!=''&&tipsan!=''&&codcar!='-'&&codlab!='' && edad != '' &&  fecing != '' && ocuced != ''){ 								  

                              $.ajax({
                                url:'/Ordenes_new_c/generar_new/',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#upd_form<?php echo $ale;?>').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
									 $('form#upd_form<?php echo $ale;?>').get(0).reset();
									 $('#codcar').empty();   
									 $('#botones').css('display','block'); 
                                       toastr.success('Datos Actualizados Satisfactoriamente');
									   if($('#aproba').val() == 'si'){
									   window.open('/Ordenes_c/impaprobarordenhseq/'+ans.num,'','scrollbars=yes,width=1020,height=750'); 
									   }           
                                     }else toastr.error('hubo un error');

                                }
                              });
                            }else toastr.error('Hay Campos Requeridos que no haz digitado');
							 }); 				
		cargarlistado_examenes('0'); 
		}); <!--Fin document ready-->
		
		function consultarPrecio(codexa,codsol){
                      $.ajax({
                        url:'/laboratorio/Examenes_c/precioc',
                        type:'POST',
                        dataType:'JSON',
                        data:{"codexa":codexa,"codsol":codsol},
                        success:function(ans){
                          if(ans.err=='1'){
                          $('#precio').val(ans.a.precio);
                        }else{
                          $('#precio').val('');
                        }
                        }
                      });
                    }
					
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
    	var edad = Math.abs(ageDate.getUTCFullYear() - 1970);
		if (edad > 0){
			 $('#edad').val(edad);
			 $('#edad').removeClass('error');
		}else{ $('#edad').addClass('error');
		toastr.warning('!Por favor digite la edad');      }
							
		}

		 function cargarDatosUsuario(ocuced){
                      $.ajax({
                         url:'/Empleados_c/terceros_orden/',
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
							if (ans.a.edad != null){ var ncaracter = ans.a.edad.length; } else{ var ncaracter = 0; }
							if ( ncaracter == 10){ calculateAge(ans.a.edad); }
                           }else{
						 	$('#ocunom').val(''); 
                            $('#ocuape').val('');  
                            $('#ocudir').val(''); 
                            $('#ocucel').val('');  
							$('#ocutel').val(''); 
                            $('#edad').val(''); 
							$('#ocuced').val(''); 
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
					
		function cargarlistado_examenes(ocunum){
          var suma=0;
           var  oTable = $('#listado_examenes').dataTable({
                "bPaginate": false,
                "ordering": true,
                "bLengthChange": true,
                "responsive": true,
                "bInfo": false,
                "bFilter": true,
                "bDestroy": true,
                 "bSort": false,
                "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},             
                "ajax": {
                  "url": "/Ordenes_new_c/examenes_ordenc/",
                  "async":false,
                  "type": "POST"   ,
                  "data":{"ocunum":ocunum,"ale":"<?php echo $ale;?>"}             
            
                },
                "footerCallback": function (row, data, start, end, display) {
        var api = this.api(),
        intVal = function (i) {
              return typeof i === 'string' ?
                   i.replace(/[, Rs]|(\.\d{2})/g,"")* 1 :
                   typeof i === 'number' ?
                   i : 0;
        },
        total2 = api
            .column(4)
            .data()
            .reduce(function (a, b) {
                return formatearNumero(intVal(a) + intVal(b));
            }, 0);
  
         $(api.column(4).footer()).html(
            '$' + total2 
         );
    }           
    });
	}
	
	function formatearNumero(str) {
      return (str + "").replace(/\b(\d+)((\.\d+)*)\b/g, function(a, b, c) {
        return (b.charAt(0) > 0 && !(c || ".").lastIndexOf(".") ? b.replace(/(\d)(?=(\d{3})+$)/g, "$1,") : b) + c;
      });
    }	
	
	</script>