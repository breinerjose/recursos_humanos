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
                          <select id="codemp" name="codemp"  data-placeholder=" "  class="required chosen-select form-control col-md-7 col-xs-12">
						  <option></option>
						  <option value="800900600-1">ASAP</option>
						  <option value="800900700-1">ASECO</option>
  		 					</select>
				<input type="hidden" class="form-control col-md-7 col-xs-12" name="codsol"  id="codsol" required="required">
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="codcli" name="codcli"  data-placeholder=" "  class="chosen-select form-control col-md-7 col-xs-12 required" >
						  <option value="" selected="selected"></option>
  		 					</select>
                        </div>
                      </div>
                     
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo a desempeñar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control col-md-7 col-xs-12 required" name="nomcar"  id="nomcar" required="required">
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control col-md-7 col-xs-12 required" name="cantidad"  id="cantidad" required="required" value="1">
                        </div>
                      </div>
                     
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha requerida de contratación </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						   <input name="fchcon" class="form-control required" id="fchcon" placeholder="YYYY-MM-DD" value="">  
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
					  <button type="button" class="btn btn-success" id="regi" ><i class="fa fa-save"></i> Guardar Datos</button>
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
		<!--	<table class="table table-bordered table-striped dt-responsive" id="listado">-->
			<table class="display table-striped" style="width:100%" id="listado">
				 <thead>
					<tr>
<!--						<th width="10%">Codigo</th>-->
						<th width="10%">Fech. Solicitud</th>
                        <th width="15%">Cargo</th>
						<th width="15%">Cliente</th>
						<th width="20%">Seleccion</th>
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

$('#fchcon').datepicker({
		 format: 'yyyy-mm-dd',
		 autoclose:true
		});

dtl();
	
	 $('#add').click(function(){          	
          	 $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
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
		
		$(document).on('click','.borrar<?php echo $ale; ?>',function(){
		 var codsol = $(this).attr('data-cod');
		     $.ajax({
                                url:'/Solcon_c/borrar',
                                type:'POST',
                                dataType:'JSON',
                                data:{"ale":"<?php echo $ale;?>","codsol":codsol},
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Seleccionado Eliminada Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
										/*$('#nom_tipidentificacion').trigger('chosen:updated');*/
   										$('#new').css('display','none');
							          	 $('#tabla-listado').css('display','block');
							          	 dtl();
                                       
                                     }else toastr.error(ans.msg);
									}
                                });
		 });					
 
		$(document).on('click','.editar<?php echo $ale; ?>',function(){
			
		var codsol = $(this).attr('data-cod');
		     $('form#registrar').get(0).reset();
          	 $('#new').css('display','block');
          	 $('#tabla-listado').css('display','none');
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
				 
		$('#codsol').val(codsol);
			$.ajax({
        url:'/Solcon_c/consultac',
        type:'POST',
        dataType:'JSON',
        data:{"ale":"<?php echo $ale;?>","codsol":codsol},
        success:function(ans){
		  	if(ans.err=='1'){
			$('#nomcar').val(ans.a.nomcar);
			$('#observ').val(ans.a.observ);
			$('#fchcon').val(ans.a.fchcon);
			$('#codemp').val(ans.a.codemp);
			$('#codemp').trigger("chosen:updated");
			$('#codcli').val(ans.a.codcli+'-'+ans.a.nomcli);
			$('#codcli').trigger("chosen:updated");
			 
				}
			  }	
			});	
		
		
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
	 var codemp = $('#codemp').val();
	 var codcli = $('#codcli').val();
	 var nomcar = $('#nomcar').val();
	 var fchcon = $('#fchcon').val();
                          if(codemp != '' & codcli != '' & nomcar != '' & fchcon != ''){	
                              $.ajax({
                                url:'/Solcon_c/insertar',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('form#registrar').get(0).reset();
										/*$('#nom_tipidentificacion').trigger('chosen:updated');*/
   										$('#new').css('display','none');
							          	 $('#tabla-listado').css('display','block');
							          	 dtl();
                                       
                                     }else toastr.error(ans.msg);
									}
                                });
								} else toastr.error('Faltan campos por llenar');
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
									"url": "/Solcon_c/listado/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
								}
    });	
	}
</script> 
	