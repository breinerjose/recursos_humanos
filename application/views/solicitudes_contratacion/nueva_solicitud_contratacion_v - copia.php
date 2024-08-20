                    <style>
table.display tbody tr td p input {
    width: 95%;
}
table.display th{font-size:11px; padding:1px;}
table.display tbody tr td{font-size:11px; padding:1px;}
.inpeditdetdcm{width:161px;height:20px;margin:1px;}
</style>
				    <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">SOLICITUD DE CONTRATACION</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />  
				    <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
                    <center><h4><strong>DATOS DEL SOLICITANTE</strong></h4></center><br>
					
					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contratista</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="codemp" name="codemp"  data-placeholder=" "  class="chosen-select form-control col-md-7 col-xs-12">
						  <option></option>
						  <option value="800900600-1">ASAP</option>
						  <option value="800900700-1">ASECO</option>
  		 					</select>
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="codcli" name="codcli"  data-placeholder=" "  class="chosen-select form-control col-md-7 col-xs-12" >
						  <option value="" selected="selected"></option>
  		 					</select>
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del funcionario solicitante</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nomfun" class="form-control col-md-7 col-xs-12" data-validate-words="2" 
						  name="nomfun" required="required" type="text">
                        </div>
                      </div>
					  					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Área donde se desempeñara</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nomare" class="form-control" name="nomare" required="required" type="text">		
                        </div>
                      </div><br>
                      <center><h4><strong>DATOS DE LA CONTRATACIÓN</strong></h4></center><br>
                     
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo a desempeñar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nomcar"  id="nomcar" required="required">
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Labor a realizar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">						  
						   <textarea class="form-control" name="labrel" id="labrel" rows="3"></textarea>
			            </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha requerida de contratación </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control fechas col-md-7 col-xs-12" name="fchcon" >
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha aproximada terminación</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control fechas col-md-7 col-xs-12" name="fchter" required="required">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Salario</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" name="salari" required="required">
                        </div>
                      </div>
					  
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bonificación:</label>
                          <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat" name="bonifi" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat" checked name="bonifi" value="no"></label>
                          </div>
                         </div>
						
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Valor Bonificación:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="valbon" name="valbon" class="form-control col-md-7 col-xs-12">
                        </div>
					</div>	
						
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Frecuencia Bonificación:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" id="frebon" name="frebon" class="form-control col-md-7 col-xs-12">
                        </div>
					</div>	
						
					  <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Bonificación Salarial:</label>	
                          <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" class="flat" name="salbon" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" class="flat" name="salbon" checked value="no"></label>
                        </div>
                      </div>
					  					  
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subsidio de alimentación</label>
                        <div class="radio">
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="subali" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="subali" value="no" checked></label>
                          </div>
                        </div>
					</div>	
	
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subsidio de transporte</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="subtra" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="subtra" checked value="no"></label>
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Transporte (Ruta)</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="trarut" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="trarut" checked value="no"></label>
                        </div>
                      </div>
					  
                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Horario de trabajo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="hortra" class="form-control" col-md-7 col-xs-12>
                        </div>
                      </div>
					  
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dotación</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="dotaci" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="dotaci" value="no" checked></label>
                        </div>
                      </div>
					  
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere protección auditiva</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="reqaud" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input   name="reqaud" type="radio"  class="flat" value="no" checked="checked">
                            </label>
                        </div>
                      </div>
					  
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere protección respiratoria</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="reqres" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="reqres" checked value="no"></label>
                        </div>
                      </div>
					  
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere certificado trabajo en alturas</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  class="flat"   name="reqalt" value="si"></label>
                             <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input   name="reqalt" type="radio"  class="flat" value="no" checked="checked">
                             </label>
                        </div>
                      </div>
					  
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere certificado de espacio confinado</label>
                           <div class="radio">
                            <label>Si:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"  class="flat"   name="reqcon" value="si"></label>
                            <label>No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input   name="reqcon" type="radio"  class="flat" value="no" checked="checked">
                            </label>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="observ" id="observ" rows="3"></textarea>
                        </div>
                      </div><br>
					  <center>
					  <button type="button" class="btn btn-success" id="regi" ><i class="fa fa-save"></i> Registrar</button>
					  <button type="button" class="btn btn-warning" id="edi" style="display: none;"><i class="fa fa-pencil"></i> Guardar Datos</button> 
                      <button type="button" class="btn btn-danger" id="cance"><i class="fa fa-times"></i>Cancelar</button>
					  </center>
                    </form>
					</div>
					</div>
					</div>
					</div>
					<div class="row" id="tabla-listado">
	<div class="col-md-12">
	  <div class="form-group">
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar Solicitud</button>
		</div>
	</div>
	
<div class="col-md-12">
			<table class="table table-bordered table-striped dt-responsive" id="listado">
				 <thead>
					<tr>
<!--						<th width="10%">Codigo</th>-->
						<th width="10%">Fech. Solicitud</th>
                        <th width="20%">Cargo</th>
						<th width="20%">Cliente</th>
						<th width="10%">Seleccion</th>
						<th width="5%">Emo</th>
						<th width="5%">Poligrafia</th>
						<th width="5%">Estudio Seguridad</th>
						<th width="5%">Fecha Ingreso</th>
						<th width="5%">Fecha Contrato</th>
						<th width="5%">Estado</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	
	</div>				
<script type="text/javascript">
$(document).ready(function(){

/*Inicio detdcm*/
  var valoranterior='';
   $('table.display tbody').on('click','.detdcm',function(event){
   		var valor=$(this).attr('valor');
   		var oid=$(this).attr('oid');
		var campo=$(this).attr('campo'); 
		var codexa=$(this).attr('codexa'); 
   		valoranterior=valor;	
   		var td=$(this).parent();
   		td.html('<p><input type="text" name="" oid="'+oid+'" codexa="'+codexa+'" campo="'+campo+'" class="inpeditdetdcm" value="'+valor+'" /></p>').find('input').focus();
   }).on('keyup','input.inpeditdetdcm',function(event){
   	if(event.which == 13){
						$(this).trigger('blur');
		}
   		
   }).on('blur','input.inpeditdetdcm',function(){
   	var valor=$(this).val();
   	var oid=$(this).attr('oid');
	var campo=$(this).attr('campo'); 
	var codexa=$(this).attr('codexa'); 
   	var td=$(this).parent().parent();
   	if(valor==''){
	  td.html('<p class="detdcm" valor="'+valoranterior+'" codexa="'+codexa+'" oid="'+oid+'" campo="'+campo+'">'+valoranterior+'</p>');
	  return false;
   	}
    var respuesta= actualizarCampo(valor,oid,campo,codexa);
    if(respuesta==1){
   	td.html('<p class="detdcm" valor="'+valor+'" codexa="'+codexa+'" campo="'+campo+'" oid="'+oid+'">'+valor+'</p>');
   }else{
   	 td.html('<p class="detdcm" valor="'+valoranterior+'" codexa="'+codexa+'" campo="'+campo+'" oid="'+oid+'">'+valoranterior+'</p>');
   }
   });	
 /*  Fin detdcm*/

dtl();
	
	 $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
			 $('#edi').css('display','none');
			 $('#regi').css('display','inline-block');
			 
			 $(function() {
         	 $('.chosen-select').chosen();
       		 $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      			});
			 
			 $("#codcli").chosen({no_results_text: "Resultado no encontrado!"});
		$.post('/Solcon_c/selectclientes',function(resp){
		$.each(resp,function(i,v){
			$('#codcli').append('<option value="'+v.codcli+'-'+v.nomcli+'">'+v.codcli+' - '+v.nomcli+'</option>');
			});	$('#codcli').trigger("chosen:updated");
			},'json'); 
			});

          }); 
		
							
 
		$(document).on('click','.editar<?php echo $ale; ?>',function(){
		 });
		 
		 $(document).on('click','.print<?php echo $ale; ?>',function(){
		 var codsol = $(this).attr('data-cod');
			window.open('/Solcon_c/imprimir/'+codsol,'','scrollbars=yes,width=1000,height=650');
		 });  
		  
	  $('#cance').click(function(){
			 $('#tabla-listado').css('display','block');
          	 $('#new').css('display','none');
          	 dtl();
          });  	 
		  
	 $('#regi').click(function(){
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/Solcon_c/insertar',
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
		
		function actualizarCampo(valor,oid,campo){
		var response;
		$.ajax({
			url:'/sirco/Doc_excel_c/actualizarCampo/',
			type:'POST',
			dataType:'JSON',
			data:{"valor":valor,"oid":oid,"campo":campo},
			async : false,
			success:function(ans){
				response= ans;
				totales();
			}
		});
		return response;
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
									"url": "/solcon_c/listado/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
</script> 
	