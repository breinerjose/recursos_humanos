<script type="text/javascript">
function dtl(sw){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			 "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"ajax": {
									"url": "/incapacidades_c/incapacidadesarchivadas/",
									"type": "POST",
									"data":{"ale":"<?php echo $ale;?>","sw":sw}             
								}
		});
	}	
	
 function cerraDialogo(){
	$('#pag').dialog('close');
	dtl('no');
	return false;
}
	
$(document).ready(function(){
		dtl('no');
	
	$('#buscar_todas').click(function(){		
			dtl('si');
	});
	
	
	$('#tabla').on('click','.ver<?php echo $ale; ?>',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/incapacidades_c/vistaPaginaHistorico/'+cod,'','scrollbars=yes,width=620,height=700');
	 });
	
	
	<!--Inicio Transcripcion-->
	$(document).on('click','.tra<?php echo $ale; ?>',function(){
        var codigo = $(this).attr('data-id');
                                             $.ajax({
                                                url: "/incapacidades_c/registrarevento/",
                                                data: {'codigo':codigo, 'observ':'Transcripcion'},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    dtl('no');
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
                   
    });
	<!--Fin Transcripción-->
	
	<!--Inicio Cobrada-->
	$(document).on('click','.cob<?php echo $ale; ?>',function(){
        var codigo = $(this).attr('data-id');
                                             $.ajax({
                                                url: "/incapacidades_c/registrarevento/",
                                                data: {'codigo':codigo, 'observ':'Cobrada'},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    dtl('no');
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
    });
	<!--Fin Cobrada-->
	
	<!--Inicio Archivada-->
	$(document).on('click','.arc<?php echo $ale; ?>',function(){
        var codigo = $(this).attr('data-id');

                                             $.ajax({
                                                url: "/incapacidades_c/registrarevento/",
                                                data: {'codigo':codigo, 'observ':'Archivada'},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    dtl('no');
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
                   
    });
	<!--Fin Archivada-->
	
	<!--Inicio Recobro-->
	$(document).on('click','.rec<?php echo $ale; ?>',function(){
        var codigo = $(this).attr('data-id');
                                             $.ajax({
                                                url: "/incapacidades_c/registrarevento/",
                                                data: {'codigo':codigo, 'observ':'Recobro con Carta'},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                   dtl('no');
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
    });
	<!--Fin Recobro-->
	
	<!--Inicio Negada-->
	$(document).on('click','.pen<?php echo $ale; ?>',function(){
        var codigo = $(this).attr('data-id');
                                             $.ajax({
                                                url: "/incapacidades_c/registrarevento/",
                                                data: {'codigo':codigo, 'observ':'Negada'},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    dtl('no');
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
    });
	<!--Fin Pendiente de Pago-->
	
	<!--Inicio Pendiente de Pago-->
	$(document).on('click','.pag<?php echo $ale; ?>',function(){	
	         $('#edi').css('display','inline-block');
          	 $('#new').css('display','block');
			 $('#regi').css('display','none');
          	 $('#tabla-listado').css('display','none');

         	  $('form#registrar').get(0).reset();
			  $('#codigo').val($(this).attr('data-id'));

			  
			  
	
	});
	<!--Fin Pendiente de Pago-->
});

 $('#edi').click(function(){
            codigo = $('#codigo').val();
			varl = $('#varl').val();
			veps = $('#veps').val();
			obs = $('#descripcion').val();
			vasumido = $('#vasumido').val();
			recibo = $('#recibo').val();
			
			if(descripcion!='' & (varl!='' || veps!='' || vasumido!='')){
			
                             if($("form#registrar").validate().form()){             
                              $.ajax({
                                url:'/incapacidades_c/actualizar_pagado',
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
							          	 dtl('no');
                                       
                                     }else toastr.error(ans.msg);
                                }
                              });
                           }//else alert('Hay campos Requeridos');
						   
						   }else{
						   toastr.error('Por lo menos debe haber campo de Valor Lleno');
			}
                            }); 
</script>
<style type="text/css">
#formact p{display:inline-block;margin:0.25em; font-size:13px;}
</style>
</head>
<body>
 <div id="new" style="display: none;">
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Cargos</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">				
							   <div class="col-md-1">
                            <div class="form-group">
                            <label>Codigo: </label>
							<input class="form-control requerid" id="codigo" name="codigo" type="Text" readonly>
                          </div>
                            </div>
							
							<div class="col-md-1">
                            <div class="form-group">
                            <label>Valor Eps:</label>
							<input class="form-control requerid" id="veps" name="veps" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-1">
                            <div class="form-group">
                            <label>Valor Arl</label>
							<input class="form-control requerid" id="varl" name="varl" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-1">
                            <div class="form-group">
                            <label>$ Asumido :</label>
							<input class="form-control requerid" id="vasumido" name="vasumido" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Recibo Nro. :</label>
							<input class="form-control requerid" id="recibo" name="recibo" type="Text">
                          </div>
                            </div>
							
							<div class="col-md-6">
                            <div class="form-group">
                            <label>Observacion :</label>
							<input class="form-control requerid" id="descripcion" name="descripcion" type="Text">
                          </div>
                            </div>
							
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                           <button type="button" class="btn btn-warning" id="edi"><i class="fa fa-pencil"></i> Guardar Datos</button> 
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

     <div class="col-md-3">
       <div class="item form-group">
       <br />
       <button type="button" class="btn btn-primary" id="buscar_todas"><i class="fa fa-search"></i> Buscar Todas</button>
       </div>
     </div>
			
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
    <tr>
        <th width="5%">Numero</th>
        <th>Empleado</th>
        <th width="10%">Eps</th>
        <th width="20%">Cliente</th>
        <th>Inicia</th>
        <th>Fin</th>
		 <th>Estado</th>
        <th width="20%">Acciones</th>
    </tr>
</thead> 
</table>
</div>
<tbody>

</tbody>
</table>
</body>
</html>