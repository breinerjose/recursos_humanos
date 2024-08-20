
<script type="text/javascript">
	$(document).ready(function(){
		     jQuery.validator.messages.required = "";  
                        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
		$('#nom_tipidentificacion').chosen({no_results_text: "Resultado no encontrado!"});

			$('#id_tercero').on('blur',function(){
		    var id_tercero = $('#id_tercero').val();
		    if(id_tercero!=''){ datotercero(id_tercero); }
		   });
		   
		   
		     $('#id_tercero').keyup(function (event) {
            if (event.which == 13) {
                 var id_tercero = $('#id_tercero').val();
		    if(id_tercero!=''){ datotercero(id_tercero); }
            }
        });

        //pierde el focus
        $('#id_tercero').on('change', function () {
              var id_tercero = $('#id_tercero').val();
		    if(id_tercero!=''){ datotercero(id_tercero); }
        });
		
	

                          $("[data-mask='phone']").mask("(999)9999999");
                          $("[data-mask='celular']").mask("9999999999");
		listados();
		consultarTipoIdentificacion();

                            $('#regi_tercero').click(function(){
                              var estado=validarSelect(); 

                             if($("form#registrar_tercero").validate().form()==true&&estado==true){             
                              $.ajax({
                                url:'/Terceros_c/terceros_i',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar_tercero').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Insertados Satisfactoriamente');              
                                       $('form#registrar_tercero').get(0).reset();
                                        $('#nom_tipidentificacion').trigger('chosen:updated');

   										$('#new-tercero').css('display','none');
							          	 $('#tabla-terceros').css('display','block');
							          	 listados();
                                       
                                     }else toastr.error(ans.msg);

                                }
                              });
 
                           }//else alert('Hay campos Requeridos');
                            });  




                            $('#edi_tercero').click(function(){
                              var estado=validarSelect(); 

                             if($("form#registrar_tercero").validate().form()==true&&estado==true){             
                              $.ajax({
                                url:'/Terceros_c/terceros_i',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar_tercero').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Editados Satisfactoriamente');              
                                       $('form#registrar_tercero').get(0).reset();
                                        $('#nom_tipidentificacion').trigger('chosen:updated');   
                                         $('#new-tercero').css('display','none');
							          	 $('#tabla-terceros').css('display','block');
							          	 listados();
							                                       
                                     }else toastr.error('hubo un error al editar los datos');

                                }
                              });
                                                       
                           }//else alert('Hay campos Requeridos');
                            });   
				
			
			$(document).on('click','.editar<?php echo $ale; ?>',function(){
          	 $('form#registrar_tercero').get(0).reset();
          	 $('#nom_tipidentificacion').trigger('chosen:updated');
          	 $('#new-tercero').css('display','block');
          	 $('#tabla-terceros').css('display','none');
          	 $('#regi_tercero').css('display','inline-block');
          	 $('#edi_tercero').css('display','none');
			 var id_tercero=$(this).attr('data-oid');
			 $('#id_tercero').val(id_tercero);
			 $('#id_tercero').prop('readonly',true);
			 datotercero(id_tercero);
          }); 
							
							                       
          $('#add_tercero').click(function(){          	
          	 $('form#registrar_tercero').get(0).reset();
          	 $('#nom_tipidentificacion').trigger('chosen:updated');
          	 $('#new-tercero').css('display','block');
          	 $('#tabla-terceros').css('display','none');
          	 $('#regi_tercero').css('display','inline-block');
          	 $('#edi_tercero').css('display','none');
          	 $('#id_tercero').prop('readonly',false);

          }); 
          $('#cance_tercero').click(function(){
			 $('#new-tercero').css('display','none');
          	 $('#tabla-terceros').css('display','block');
          	 listados();
          });                

                  
	});
	
	function datotercero(id_tercero){
		 $.post('/Terceros_c/DatosTercero',{'id_tercero':id_tercero},function(resp){
			  if(resp == '1'){
				 //alert('No Existen datos relacionados a este documento. Verifique por favor...');
				 //$('#codtrc, #emltrc, #teltrc').val('');
			  }else{
				 $('#telefono').val(resp.telefono);
				 $('#direccion').val(resp.direccion);
				 $('#prinombre').val(resp.prinombre);
				 $('#segnombre').val(resp.segnombre);
				 $('#priapellido').val(resp.priapellido);
				 $('#segapellido').val(resp.segapellido);
				 $('#imp1').val(resp.imp1);
				 $('#imp2').val(resp.imp2);
				 $('#dig_verificacion').val(resp.dig_verificacion);
				 $('#nom_tipidentificacion').val(resp.nom_tipidentificacion).trigger('chosen:updated');
			  }
			},'json');
		
	}
	
	function listados(){
				var oTable = $('#listados').dataTable({
							  "bPaginate": true,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Doc_equivalente_c/listado_ter/",
									"type": "POST"   ,
									"data":{ "ale":"<?php echo $ale;?>" }             
						
								}
    });	
	}
	  function consultarTipoIdentificacion(){                 
                       $('#nom_tipidentificacion').empty();
                        $('#nom_tipidentificacion').html('<option value=""></option');             
                       
                         $.ajax({
                         url:'/Terceros_c/tip_ide',
                         type:'POST',
                         dataType:'JSON',
                         data:{"tipper":"1"},
                         success:function(ans){                    
                          if(ans.e.err=='1'){    
                               for(x in ans.a){                             
                                $('<option/>').val(ans.a[x].dsctip).text(ans.a[x].dsctip).appendTo('#nom_tipidentificacion');
                               }         
                                            
                          }
                           $('#nom_tipidentificacion').trigger('chosen:updated');
                          

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

	
	</script>
    <style type="text/css">
    .chosen-container{width: 100% !important;color:#333;}
 .chosen-container-single .chosen-single{line-height:32px;}
 .chosen-container-single .chosen-single div{top:5px;}
  td input.error{
  border-color:#3D7BCF; background:#DFEEFF;
 }
 td label.error{ display: none !important; }
     .form-group .error{border-color:#3D7BCF; background:#DFEEFF; }
.input-group .error{border-color:#3D7BCF; background:#DFEEFF; }
    
    </style>

                    <div id="new-tercero" style="display: none;" >
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Agregar Nuevo Tercero</h2>
             
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">     
                          <div class="row">                           
                            <form action="" method="POST" class="form-horizontal"  id="registrar_tercero" name="registrar_tercero" role="form">                          
                            <div class="col-md-3">
                            <div class="form-group">
                            <label> Id Cliente / NIT</label>
                            <input class="form-control required" placeholder="CC/ NIT" id="id_tercero" name="id_tercero" type="text">
                          </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label> Digito Verificacion</label>
                            <input class="form-control required" placeholder="" id="dig_verificacion" name="dig_verificacion" type="text">
                          </div>
                            </div>
							
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tipo Indentificacion</label>
                                   <select class="chosen-select required validar"  data-placeholder="Seleccione Tipo Indentificacion"  name="nom_tipidentificacion" id="nom_tipidentificacion">
                                  <option value=""></option>                                   
                                </select>                           
                               </div>
                            </div>
							
							<div class="clearfix"></div>
							
                             <div class="col-md-6">
                              <div class="form-group">
                                <label>Primer Nombre </label>
                                <input class="form-control required" placeholder="Primer Nombre"  id="prinombre" name="prinombre" type="text">
                               </div>
                            </div>
							
							
							<div class="col-md-6">
                              <div class="form-group">
                                <label>Segundo Nombre </label>
                                <input class="form-control required" placeholder="Primer Nombre"  id="segnombre" name="segnombre" type="text">
                               </div>
                            </div>
							
						 <div class="clearfix"></div>
									
							<div class="col-md-6">
                              <div class="form-group">
                                <label>Primer Apellido </label>
                                <input class="form-control required" placeholder="Primer Nombre"  id="priapellido" name="priapellido" type="text">
                               </div>
                            </div>
							
								<div class="col-md-6">
                              <div class="form-group">
                                <label>Segundo Apellido </label>
                                <input class="form-control required" placeholder="Primer Nombre"  id="segapellido" name="segapellido" type="text">
                               </div>
                            </div>
							
                         <div class="clearfix"></div>
                             <div class="col-md-6">
                              <div class="form-group">
                                <label> Direccion </label>
                                <input class="form-control required" placeholder="Direccion"  id="direccion" name="direccion" type="text">
                               </div>
                            </div>
							  
                             <div class="col-md-6">
                              <div class="form-group">
                                <label>Telefono </label>
                                <input class="form-control" placeholder="Telefono" id="telefono" name="telefono" type="text">
                               </div>
                            </div>
                             <div class="col-md-6">
                              <div class="form-group">
                                <label>Retención en la Fuente</label>
                                <input class="form-control required" placeholder="" id="imp1"  name="imp1" type="text">
                               </div>
                            </div>
							
							                          
                             <div class="col-md-6">
                              <div class="form-group">
                                <label>Retención Por Industria y Comercio</label>
                                <input class="form-control required" placeholder=""   id="imp2" name="imp2" type="text">
                               </div>
                            </div> 
                             
                            <div class="clearfix"></div>
                          </form>    
                          </div>
                             <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                          <button type="button" id="regi_tercero" class="btn btn-success">
                            <i class="fa fa-save"></i> Registrar Tercero</button>
                           <button class="btn btn-warning" id="edi_tercero" style="display: none;"><i class="fa fa-pencil"></i> Editar Datos</button> 
                           <button class="btn btn-danger" id="cance_tercero"><i class="fa fa-times"></i>Cancelar</button>
                               
                        </div>
                      </div>
                      
                      </div>
                          

                       
                
                      

                    </div>
                  </div>

<div class="row" id="tabla-terceros">
	<div class="col-md-12">
		<div class="form-group">
			<button class="btn btn-primary" id="add_tercero"><i class="fa fa-plus"></i> Agregar Terceros</button>
			
		</div>
	</div>

	<div class="col-md-12">
			<table class="table table-bordered table-striped dt-responsive " id="listados">
				 <thead>
					<tr>
						<!--<th width="10%">Fecha</th>-->
						<th width="10%">Id</th>
						<th width="40%">Nombre</th>
						<th width="10%">Telefono</th>
						<th width="30%">Direccion</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>

	</div>
