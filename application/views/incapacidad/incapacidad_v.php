<script type="text/javascript">
	$(document).ready(function(){
	 $('#fecini').datepicker({
		autoclose:'true',
		 format: 'yyyy-mm-dd'
		});
		$('#fecfin').datepicker({
			autoclose:'true',
		 format: 'yyyy-mm-dd'
		});
	 $('.chosen-select').chosen(); 
	dtl();
	
	 $(document).on('click','.borrar<?php echo $ale; ?>',function(){
             var id =$(this).attr('id');
			 	$.ajax({
					url:'/Incapacidad_c/borrar',
					data:{'id':id},
					type:"POST",
					success: function(ans){
						 if(ans.err!='1'){
							 toastr.success('Cliente Borradi Satisfactoriamente');              
							 dtl();
							}else{
							 toastr.error('hubo un error');
						}
					}	
				});
          });  
	
	   $(document).on('click','.editar<?php echo $ale; ?>',function(){
             var id =$(this).attr('id');
			 $.ajax({
					url:'/Incapacidad_c/consultar_incapacidad',
					data:{'id':id},
					type:"POST",
					success: function(ans){
						 if(ans.e.err=='1'){
						    $('form#registrar').get(0).reset();   
                            $('#nombres').val(ans.i.nombres);
							$('#cargo').val(ans.i.cargo);
							$('#cliente').val(ans.i.nomcli);
							$('#empleador').val(ans.i.empleador);
							$('#codeps').val(ans.i.codeps);
							$('#nomeps').val(ans.i.nomeps);
							$('#numinc').val(ans.i.numinc);
							$('#evento').val(ans.i.evento);
							$('#evento').trigger('chosen:updated'); 
							$('#codigo').val(id);
							$('#prorroga').val(ans.i.prorroga);
							$('#prorroga').trigger('chosen:updated'); 
							$('#diagnostico').val(ans.i.diagnostico);
							$('#fecfin').val(ans.i.fecfin);
							$('#fecini').val(ans.i.fecini);
							$('#cedula').val(ans.i.cedula);
							
							}else{
							 toastr.error('hubo un error');
						}
					}	
				});
			 
			  });  
			  
		  $('#regi<?php echo $ale;?>').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Incapacidad_c/registrar',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();                                     
							          	 dtl();
                                       
                                     }else toastr.error(ans.msg);
                                }
                              });
                           }//else alert('Hay campos Requeridos');
                            });  
		  
	$('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
			 $('#email').css('display','none');
          }); 
		  	  
			  $('#cedula').keyup(function(event){
                                if(event.which == 13){
								var ced=$('#cedula').val();
								if(ced != ''){
								consultar_cedula();
								}
								}
                        });
                         
                         $('#cedula').blur(function(){
                           var ced=$('#cedula').val();
								if(ced != ''){
								consultar_cedula();
								}
                          });
						  
						  
						  
		}); 
		
	function consultar_cedula(){
	 $.ajax({
                          url:'/Incapacidad_c/consultar_empleado',
                          type:'POST',
                          dataType:'JSON',
                          data:{"cedula":$('#cedula').val(),"ale":"<?php echo $ale;?>"},
                          success: function(ans){
                            if(ans.e.err=='1'){
                            $('#nombres').val(ans.i.nombres);
							$('#cargo').val(ans.i.oficio);
							$('#cliente').val(ans.i.lugardes);
							$('#empleador').val(ans.i.ocupor);
							$('#codeps').val(ans.i.codeps);
							$('#nomeps').val(ans.i.nomeps);
                          }else{
                          toastr.error('Este Empleado No Existe o No tiene Contrato Activo');  
                          }
                        }      
				});
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
									"url": "/Incapacidad_c/listado/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}  
	</script>	  
 <div id="new">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Incapacidad</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-3">
                            <div class="form-group">
                            <label>Cedula</label>
							<input class="form-control requerid" id="cedula" name="cedula" type="Text">
							<input class="form-control requerid" id="codigo" name="codigo" type="Hidden">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Nombre</label>
							<input class="form-control requerid" id="nombres" name="nombres" type="Text" readonly="">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Cargo</label>
							<input class="form-control requerid" id="cargo" name="cargo" type="Text" readonly="">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Empleador</label>
							<input class="form-control requerid" id="empleador" name="empleador" type="Text" readonly="">
                          </div>
                            </div>
							
							 <div class="col-md-3">
                            <div class="form-group">
                            <label># de Incapacidad</label>
							<input class="form-control requerid" id="numinc" name="numinc" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Diagnostico</label>
							<input class="form-control requerid" id="diagnostico" name="diagnostico" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Tipo Evento </label>
							 <select id="evento" name="evento"  data-placeholder="Seleccione Evento "  class="required chosen-select">
						  <option></option>
						    <option value="EG">Enfermedad General</option>
                            <option value="AT">Accidente Laboral</option>
                            <option value="LM">Licencia Maternidad</option>
                            <option value="LP">Licencia Paternidad</option>
                            <option value="AC">Accidente de Transito</option>
  		 					</select>
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Prorroga</label>
							<select id="prorroga" name="prorroga"  data-placeholder="Seleccione Prorroga"  class="required chosen-select">
						  <option></option>
						  <option >SI</option>
						  <option >NO</option>
  		 					</select>
                          </div>
                            </div>
							
							<div class="clearfix"></div>
							
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Fecha Inicio</label>
							<input class="form-control requerid" id="fecini" name="fecini" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Fecha Fin</label>
							<input class="form-control requerid" id="fecfin" name="fecfin" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Eps</label>
							<input class="form-control requerid" id="nomeps" name="nomeps" type="Text" readonly="">
							<input class="form-control requerid" id="codeps" name="codeps" type="Hidden" readonly="">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>Cliente</label>
							<input class="form-control requerid" id="cliente" name="cliente" type="Text" readonly="">
                          </div>
                            </div>
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
   <button type="button" id="regi<?php echo $ale;?>" class="btn btn-success"><i class="fa fa-save"></i> Registrar</button>
<!--   <button type="button" class="btn btn-warning" id="edi" style="display: none;"><i class="fa fa-pencil"></i> Guardar Datos</button> 
   <button type="button" class="btn btn-danger" id="cance"><i class="fa fa-times"></i>Cancelar</button>-->
                               
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
			<div class="table-responsive">
			<table class="display nowrap" style="width:100%" id="listado">
				 <thead>
					<tr>
						<th>Acciones</th>
						<th>Cedula</th>
						<th>Empleado</th>
                        <th>Cargo</th>
						<th># Incapacidad</th>
						<th>Evento</th>
						<th>Prorroga</th>
                        <th># dias</th>
						<th>Inicio</th>
						<th>Fin</th>
						<th>Eps</th>
                        <th>cie10</th>
						<th>Empleador</th>
						<th>Cliente</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	</div>
	</div>