 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Cajas</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							
							   <div class="col-md-4">
                            <div class="form-group">
                            <label>Estante</label>
							<input class="form-control requerid" id="codest" name="codest" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-8">
                            <div class="form-group">
                            <label>Caja</label>
							<input class="form-control requerid" id="codcaj" name="codcaj" type="Text">
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
					
					
<div class="row" id="tabla-listado">
	<div class="col-md-12">
	  <div class="form-group">
			<button class="btn btn-primary" id="add"><i class="fa fa-plus"></i> Agregar Cajas</button>
		</div>
	</div>
	
<div class="col-md-12">
			<div class="table-responsive">
			<table class="display table table-bordered table-striped dt-responsive" id="listado">
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
	
  /*Inicio detdcm*/
        var valoranterior = '';
        $('table.display tbody').on('click', '.detdcm', function (event) {
            var valor = $(this).attr('valor');
            var oid = $(this).attr('oid');
            var campo = $(this).attr('campo');
            valoranterior = valor;
            var td = $(this).parent();
            td.html('<p><input type="text" name="" oid="' + oid + '" campo="' + campo + '" class="inpeditdetdcm" value="' + valor + '" /></p>').find('input').focus();
        }).on('keyup', 'input.inpeditdetdcm', function (event) {
            if (event.which == 13) {
                $(this).trigger('blur');
            }

        }).on('blur', 'input.inpeditdetdcm', function () {
            var valor = $(this).val();
            var oid = $(this).attr('oid');
            var campo = $(this).attr('campo');
            var td = $(this).parent().parent();
            if (valor == '' || valoranterior == valor) {
                td.html('<p class="detdcm" valor="' + valoranterior + '" oid="' + oid + '" campo="' + campo + '">' + valoranterior + '</p>');
                return false;
            }
            var respuesta = actualizarCampo(valor, oid, campo);
            if (respuesta == 1) {
				dtl();
            } else {
                td.html('<p class="detdcm" valor="' + valoranterior + '" campo="' + campo + '" oid="' + oid + '">' + valoranterior + '</p>');
            }
        });
        /*  Fin detdcm*/

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
		
		$(document).on('click','.del<?php echo $ale;?>',function(){ 
            var codest=$(this).attr('codest');   
            var codcaj=$(this).attr('codcaj');   
            window.open('/Cajas_c/del_caja/'+codest+'/'+codcaj,'','scrollbars=yes,width=1000,height=600');       
        });    
		  
	});
	
	function actualizarCampo(valor, oid, campo) {
        var response;
        $.ajax({
            url: '/Cajas_c/actualizarCampo/',
            type: 'POST',
            dataType: 'JSON',
            data: {"valor": valor, "oid": oid, "campo": campo},
            async: false,
            success: function (ans) {
                response = ans;
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
									"url": "/Cajas_c/cajas/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
						
								}
    });	
	}
	</script>
	