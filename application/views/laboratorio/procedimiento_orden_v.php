<style type="text/css">
  h2.cab{background:#eee; font-size:13px;text-align:center;margin: auto;border-bottom:1px dashed #999999; color:#333;padding:0.1em;}
  .bg-titu {
  background: #1ABB9C;
  height: 30px;
  text-align: center;
  color: white;
  font-family: verdana;
  padding-top: 5px;
  padding-bottom: 5px;
  /*! margin: auto; */
}
 td input.error{
  border-color:#3D7BCF; background:#DFEEFF;
 }
 td label.error{ display: none !important; }
     .form-group .error{border-color:#3D7BCF; background:#DFEEFF; }
.input-group .error{border-color:#3D7BCF; background:#DFEEFF; }

.titulo.x_title{
 border-bottom: 2px solid #4DA5DF;
 color:#4DA5DF;
}
</style>
                  <div id="editar_act_proce" style="display: none;" >
                    <div class="x_title titulo" id="">
                          <h2 class="color-info consecu"> </h2>
             
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content"> 
                      <div class="row" id="actualizar_dat_procediemiento">
                            <form action="" method="POST" class="form-horizontal"  id="act_procedimiento<?php echo $ale;?>" name="act_procedimiento<?php echo $ale;?>" role="form">  
                               <input type="hidden" class="required" name="id_consentimiento2" id="id_consentimiento" value="">
                               <input type="hidden" class="required" name="id_examen_lab" id="id_examen_lab2" value="">
                               <input type="hidden" class="required" name="id_exa_hist" id="id_exa_hist" value="">
                               <input type="hidden" class="required" name="medicoanterior" id="medicoanterior" value="">
                               
                             
                                
                        <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Medico</label>
                          <select class="chosen-select required valr2"  data-placeholder="Seleccione Tipo Examen"  name="medico" id="medico">
                                  <option value=""></option>
                               
                                </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Tipo Examen :</label>
                          <select class="chosen-select required valr2" disabled="disabled" data-placeholder="Seleccione Tipo Examen"  name="" id="id_examen_lab1">
                                  <option value=""></option>
                               
                                </select>
                      </div>
                    </div>
                      <div class="col-md-4">
                      <div class="form-group">
                          <label>Precio:</label>
                              <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input type="text" class="form-control required" aria-label="Amount (to the nearest dollar)" id="precio1" name="precio">
                              <span class="input-group-addon">.00</span>
                            </div>
                      </div>
                    </div>
                       <div class="col-md-3 col-md-offset-4">
                              <div class="form-group">
                            <button type="button" id="update_act_proc<?php echo $ale;?>" style="margin-top: 23px;" class="btn btn-success">
                            <i class="fa fa-save"></i> Guardar</button>
                            <button type="button" id="cancelar_act_pro<?php echo $ale;?>" style="margin-top: 23px;" class="btn btn-danger">
                            <i class="fa fa-times"></i> Cancelar</button>
                          </div>
                            </div>  
                            </form>                  
                      </div>
                  </div>
                </div>

                    <div id="act_procedimiento_cap" >
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">AGREGAR EXAMENES A REALIZAR </h2>
             
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content"> 
                      <div class="row">
                        <div class="col-md-2">
                          <div class="col-form-group">
                            <label>consecutivo</label>
                             <div class="input-group">
           <input type="text" id="ocunum" name="ocunum"  class="form-control" value="<?php if(isset($tipo)){if($tipo=='inse'){ echo $solicitud;} }?>">
                                <span class="input-group-addon" id="consultar-procedimiento"></span>
                                 
                                 <!--  -->
                              </div>
                           
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="col-form-group">
                            <label>identificcacion</label>
                            <input type="text" id="ocuced" readonly="" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-form-group">
                            <label>Nombres</label>
                            <input type="text" id="ocunom" readonly="" class="form-control">
                          </div>
                        </div>                       
                        <div class="col-md-4">
                          <div class="col-form-group">
                            <label>Cargo</label>
                            <input type="text" id="ocucar" readonly="" class="form-control">
                          </div>
                        </div>
                  

   </div>
                   <br>

                      <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <div class="table-responsive">
                              <table class="table table-bordered table-striped dt-responsive " id="listado_examenes">
                                 <thead>
                                  <tr>
                                    <th width="">Codigo</th>
                                    <th width="">Examen</th>
                                    <th width="">Vigencia</th>                     
                                    <th width="">Factura</th>
                                    <th width="" class="sum">Precio</th>
                                    <th width="5%">Eliminar</th>
                                    
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
                </div>
                      
                     <form action="" method="POST" class="form-horizontal"  id="procedimiento" name="procedimiento" role="form">  
                          <div class="row">                           
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Examen :</label>
				 <select class="chosen-select required valr"  data-placeholder="Seleccione Tipo Examen"  name="id_examen_lab" id="id_examen_lab">
                 <option value=""></option>              
                 </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                               <label>Precio:</label>
                              <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input type="text" class="form-control required" aria-label="Amount (to the nearest dollar)" id="precio" name="precio">
                              <span class="input-group-addon">.00</span>
                            </div>
                            </div>
                            
                            <div class="col-md-3">
                              <div class="form-group">
                               <button type="button" id="add_examen" style="margin-top: 23px;" class="btn btn-primary">
                            <i class="fa fa-save"></i>Agregar</button>
                          </div>
                            </div>
                            
                     
                            
                    

                    </div>
                    </form>
                  </div>

                  <script type="text/javascript">
                    var oTable; var tipo='<?php if(isset($tipo)) echo $tipo;?>'; var codsol=0; var conse_anterior='';
                    $(document).ready(function(){
                        jQuery.validator.messages.required = "";  
                        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
                      
                        $('#consultar-procedimiento').click(function(){
                       // if($('#conse').val()!=''){
                          $.ajax({
                            url:'/laboratorio/Orden_c/ordenc/',
                          type:'POST',
                          dataType:'JSON',
                          data:{"ocunum":$('#ocunum').val(),"ale":"<?php echo $ale;?>"},
                          success: function(ans){
                            if(ans.e.err=='1'){
                            $('#ocuced').val(ans.i.ocuced);
                            $('#ocunom').val(ans.i.ocunom);
                            $('#ocucar').val(ans.i.ocucar);
                            $('#id_consentimiento,#id_consentimiento2').val(ans.i.id_consentimiento);
                            $('#id_examen_lab').val('').prop('disabled', false).trigger('chosen:updated');
                            $('#precio').val('');
                            $('#add_examen').css('display','block');
                           
                            cargarlistado_examenes($('#ocunum').val());
                            
                          }else{
                          toastr.error('este numero de historia no existe');  
                            $('#id_cliente').val('');
                            $('#nombre').val('');
                            $('#nomempresal').val('');
                            $('#id_consentimiento,#id_consentimiento2').val('');
                            $('#precio').val('');
                            $('#id_examen_lab').val('').prop('disabled', true).trigger('chosen:updated');
                             $('#add_examen').css('display','none');
                           
                            cargarlistado_examenes(0);
                          }
                        }
                          
                          });
                         
                       /* }else{
                        alert('este campo es requerido');   
                       }*/
                      });

                         $('#ocunum').keyup(function(event){
                                if(event.which == 13){
                                    $('#consultar-procedimiento').trigger('click');                            
                                  }
                        });
                         
                         $('#ocunum').blur(function(){

                            if($('#ocunum').val()!=conse_anterior){
                              $('#consultar-procedimiento').trigger('click');    
                            }
                            
                          });

                       
                    
                        $('#id_examen_lab1,#medico').chosen({no_results_text: "Resultado no encontrado!"});
                        $('#id_examen_lab').chosen({no_results_text: "Resultado no encontrado!"}).on("change", function (evt, params) { 
                             if($(this).val()!=''){    
                              consultarPrecio($(this).val(),$('#ocunum').val());
                            }
                       });
                        $(document).on('click','.eliminar<?php echo $ale;?>',function(){
                          var id=$(this).attr('data-con');
                              $.post('/laboratorio/Orden_c/examen_ordern_borrar',{"id":id},function(ans){
                                if(ans.err=='1'){
                                    toastr.success('Datos Actualizados Satisfactoriamente');
                                     cargarlistado_examenes($('#conse').val());           
                                }

                              },'JSON');
                            
                        });
                          $(document).on('click','.editar<?php echo $ale;?>',function(){
                          var id_consentimiento=$(this).attr('data-con');
                          var id_examen_lab=$(this).attr('data-exa');
                          var precio=$(this).attr('precio');
                          var idmedi=$(this).attr('idmedi');
                          var id_exa_hist=$(this).attr('id_exa_hist');
                         // $('#medico').val('').trigger('chosen:updated');
                          $('#precio1').val(precio);
                           consultarMedicos(id_examen_lab,idmedi);
                           $('#medicoanterior').val(idmedi);
                           $('#id_examen_lab1').val(id_examen_lab).trigger('chosen:updated');
                           $('#id_examen_lab2').val(id_examen_lab);
                           $('#id_consentimiento2').val(id_consentimiento);
                           $('#id_exa_hist').val(id_exa_hist);
                           $('#editar_act_proce').css('display','block');
                           $('#act_procedimiento_cap').css('display','none');
                           $('.consecu').text('Editar Examen - '+id_examen_lab);
                           
                        });
                          $('#cancelar_act_pro<?php echo $ale;?>').click(function(){
                             $('#editar_act_proce').css('display','none');
                             $('#act_procedimiento_cap').css('display','block');
                             $('#act_procedimiento<?php echo $ale;?>').get(0).reset();
                             $('#medico,#id_examen_lab1').trigger('chosen:updated');
                          });
						  
						   $('#sticker<?php echo $ale;?>').click(function(){
			 				var codhis = $('#conse').val();
							window.open('/laboratorio/Sticker_c/imprimir/'+codhis,'','scrollbars=yes,width=1000,height=650');
							return false;
						}); 

                        $('#add_examen').click(function(){
                              var estado=validarSelect2('valr'); 
                              if($("form#procedimiento").validate().form()==true&&estado==true){   
                              $.ajax({
                                url:'/laboratorio/Examenes_c/exameni',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#procedimiento').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Actualizados Satisfactoriamente');
                                       $('form#procedimiento').get(0).reset();                                   
                                        $('#id_examen_lab').trigger('chosen:updated');
                                        cargarlistado_examenes($('#id_consentimiento').val());                                      
                                       
                                     }else toastr.error('hubo un error');

                                }
                              });
                            }else alert('Hay campos Requeridos');
                            }); 
                       $('#update_act_proc<?php echo $ale;?>').click(function(){
                              var estado=validarSelect2('valr2'); 
                              if($("form#act_procedimiento<?php echo $ale;?>").validate().form()==true&&estado==true){   
                              $.ajax({
                                url:'/laboratorio/Examenes_c/actualizar_procedimiento',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#act_procedimiento<?php echo $ale;?>').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Actualizados Satisfactoriamente');
                                       setTimeout(function(){$('form#act_procedimiento<?php echo $ale;?>').get(0).reset();
                                       $('#medico,#id_examen_lab1').trigger('chosen:updated');
                                       $('#editar_act_proce').css('display','none');
                                       $('#act_procedimiento_cap').css('display','block');
                                        cargarlistado_examenes($('#conse').val());}, 500);
                                                                             
                                       
                                     }else toastr.error('hubo un error');

                                }
                              });
                            }else alert('Hay campos Requeridos');
                       });


                      cargarExamenes();

                       if(tipo=='inse'){                          
                          $('#consultar-procedimiento').trigger('click'); 
                           
                        } else{
                           //var codsol=($('#conse').val()!='')?$('#conse').val():0;
                          cargarlistado_examenes(0);
                        }
                        });
                    function cargarExamenes(){
                      $('#id_examen_lab,#id_examen_lab1').empty();
                      $('#id_examen_lab,#id_examen_lab1').html('<option value=""></option>');
                      $.ajax({
                        url:'/laboratorio/Examenes_c/examenes',
                        type:'POST',
                        dataType:'JSON',
                        success:function(ans){
                          if(ans.err=='1'){
                            for (a in ans.a){
                              $('<option/>').val(ans.a[a].codexa).text(ans.a[a].codexa+' - '+ans.a[a].nomexa).appendTo('#id_examen_lab,#id_examen_lab1');
                            }
                            $('#id_examen_lab,#id_examen_lab1').trigger('chosen:updated');
                          }

                        }
                      });
                    }
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
                    function consultarMedicos(codexa,idmedi){
                        $.ajax({
                        url:'/laboratorio/Examenes_c/medicosc',
                        type:'POST',
                        dataType:'JSON',
                        data:{"codexa":codexa},
                        success:function(ans){
                           $('#medico').empty().html('<option></option>');
                           if(ans.err=='1'){
                            for (a in ans.a){
                              if(ans.a[a].cedula==idmedi){
                                $('<option/>').val(ans.a[a].cedula).text(ans.a[a].cedula+' - '+ans.a[a].nombre).attr('selected','selected').appendTo('#medico');
                              }else{
                              $('<option/>').val(ans.a[a].cedula).text(ans.a[a].cedula+' - '+ans.a[a].nombre).appendTo('#medico');
                              }
                            }
                            $('#medico').trigger('chosen:updated');
                          }
                        }
                      });
                    }
                   function validarSelect2(clase){
                        var estado= true;
                         $('.'+clase).each(function(index, element) {            
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
                  "url": "/laboratorio/orden_c/examenes_ordenc/",
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
           <style type="text/css">
             .chosen-container{ width: 100% !important; }
           </style>