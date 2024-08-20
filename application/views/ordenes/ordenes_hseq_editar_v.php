<?php if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();} ?>
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
<script type="text/javascript">
function dtl(a){
		oTable = $('#tabla').dataTable( {
		 	"order": [[ 7, "desc" ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Ordenes_c/editarordeneshseq/"+a,
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
				  $('td:eq(0)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(1)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(2)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(3)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(4)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(5)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(6)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(7)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
				   $('td:eq(8)', nRow).addClass( $('td:eq(0)', nRow).find('span').attr('class'));
                                         
            }
		});
	}	
	
	function cerrar_editar(){
		$('#editar').dialog('close');
		dtl('2021-01-01');	
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
                  "url": "/laboratorio/Orden_c/examenes_ordenc/",
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

$(document).ready(function(){
	     	dtl('2021-01-01');
	
		 $('#historico').click(function () {
		  if ($('#historico').is(':checked')) {
		  	dtl('2000-01-01');
		  }else{ 	dtl('2021-01-01'); }
        });
	    
	     $('#tabla').on('click','.editar',function(){
         $('#editar').css('display','block');
         $('#listado').css('display','none');
			
		jQuery.validator.messages.required = "";  				
		$("#id_empresa").chosen();
		$("#codcar").chosen();
		$("#tipsan").chosen();			
		$("#tipord").chosen();
		$("#eps").chosen();
		$("#codlab").chosen();
		$("#rencal").chosen();
		$("#estord").chosen();
		$("#codconc").chosen();
		$("#tipcob").chosen();
		
		 cargarlistado_examenes($(this).attr('data-ocunum'));
		oTable.fnAdjustColumnSizing();
		
		//Envio Valores
		$('#ocunum').val($(this).attr('data-ocunum'));
		$('#ocunumb').val($(this).attr('data-ocunum'));
		$('#ocuced').val($(this).attr('data-ocuced'));
		$('#ocunom').val($(this).attr('data-ocunom'));		
		$('#ocuape').val($(this).attr('data-ocuape'));		
		$('#ocudir').val($(this).attr('data-ocudir'));		
		$('#ocutel').val($(this).attr('data-ocutel'));		
		$('#ocucel').val($(this).attr('data-ocucel'));		
		$('#edad').val($(this).attr('data-edad'));
		$('#codlab').val($(this).attr('data-codlab'));
		$('#ocupor').val($(this).attr('data-ocupor'));  
		$('#tipsan').val($(this).attr('data-tipsan')); 
		$('#fecsol').val($(this).attr('data-fecsol'));
		$('#fecing').val($(this).attr('data-fecing'));
		$('#obssol').val($(this).attr('data-obssol'));
		$('#obsing').val($(this).attr('data-obsing'));
		$('#tipcon').val($(this).attr('data-tipcon'));
				
		var tiporda = $(this).attr('data-tipord');
		$.post('/laboratorio/Examenes_c/subgru',function(resp){
		$.each(resp,function(i,v){
		if(v.subgru == tiporda){var sel = 'selected="selected"';}else{var sel = '';}
			$('#tipord').append('<option '+sel+' value="'+v.subgru+'">'+v.subgru+'</option>');
		});	$('#tipord').trigger("chosen:updated");
		},'json');	
		
		var nriclia = $(this).attr('data-nricli');
		$.post('/Cargos_c/Clientes/',{'ocupor':$(this).attr('data-ocupor'),'tipord':$(this).attr('data-tipord')},function(resp){
		$.each(resp,function(i,v){
		if(v.codcli == nriclia){var sel = 'selected="selected"';}else{var sel = '';}
			$('#id_empresa').append('<option '+sel+' value="'+v.codcli+'-'+v.nomcli+'">'+v.codcli+' '+v.nomcli+'</option>');
		});	$('#id_empresa').trigger("chosen:updated");
		},'json');	
		
		var codcrga = $(this).attr('data-codcrg');
		$.post('/Cargos_c/Cargos_empresa',{'id_empresa':nriclia, 'ocupor':$(this).attr('data-ocupor'),'tipord':$(this).attr('data-tipord')},function(resp){
		$.each(resp,function(i,v){
		if(v.codcrg == codcrga){var sel = 'selected="selected"';}else{var sel = '';}
			$('#codcar').append('<option '+sel+' value="'+v.codcrg+'-'+v.cardes+'">'+v.cardes+'</option>');
		});	$('#codcar').trigger("chosen:updated");
		},'json');
		
		var epsa = $(this).attr('data-ocueps');
		$.post('/laboratorio/Eps_c/todas_eps/',function(resp){
		$.each(resp,function(i,v){
		if(v.codeps+' '+v.nomeps == epsa){var sel = 'selected="selected"';}else{var sel = '';}
			$('#eps').append('<option '+sel+' value="'+v.codeps+' '+v.nomeps+'">'+v.codeps+' '+v.nomeps+'</option>');
		});	$('#eps').trigger("chosen:updated");
		},'json');
		
		var tipsana = $(this).attr('data-tipsan');
		$.post('/laboratorio/Eps_c/factrh/',function(resp){
		$.each(resp,function(i,v){
		if(v.tipsan == tipsana){var sel = 'selected="selected"';}else{var sel = '';}
			$('#tipsan').append('<option '+sel+' value="'+v.tipsan+'">'+v.tipsan+'</option>');
		});	$('#tipsan').trigger("chosen:updated");
		},'json');
		
		
		var codlaba = $(this).attr('data-codlab');
		$.post('/Cargos_c/laboratorios/',function(resp){
		$.each(resp,function(i,v){
		if(v.empnit == codlaba){var sel = 'selected="selected"';}else{var sel = '';}
		$('#codlab').append('<option '+sel+' value="'+v.empnom+'-'+v.empema+'-'+v.emptel+'-'+v.empcel+'-'+v.ocuemp+'-'+v.empnit+'">'+v.empnit+' '+v.empnom+'</option>');
		});	$('#codlab').trigger("chosen:updated");
		},'json');
		//Fin Envio Valores
		
		var estord = $(this).attr('data-estord');
		$('#estord').empty();
		$.post('/laboratorio/Orden_c/estados/',function(resp){
		$.each(resp,function(i,v){
		if(v.nomest == estord){var sel = 'selected="selected"';}else{var sel = '';}
			$('#estord').append('<option '+sel+' value="'+v.nomest+'">'+v.nomest+'</option>');
		});	$('#estord').trigger("chosen:updated");
		},'json');
		
		$('#codconc').empty();
		$.post('/laboratorio/Examenes_c/exameness/',function(resp){
		$.each(resp,function(i,v){
			$('#codconc').append('<option value="'+v.codexa+'-'+v.nomexa+'">'+v.nomexa+'</option>');
		});	$('#codconc').trigger("chosen:updated");
		},'json');
		
		$('#fecing').datepicker({
		 format: 'yyyy-mm-dd',
		 autoclose:true
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
					
							      
                              if($("form#upd_form<?php echo $ale;?>").validate().form()==true&&estado==true&&eps!=''&&tipsan!=''&&codcar!='-'){ 
                              $.ajax({
                                url:'/laboratorio/Orden_c/actualizar/',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#upd_form<?php echo $ale;?>').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
									 $('form#upd_form<?php echo $ale;?>').get(0).reset();
									 $('#codcar').empty();    
                                       toastr.success('Datos Actualizados Satisfactoriamente');    
									   $('#editar').css('display','none');
         							   $('#listado').css('display','block');  
									   dtl('2021-01-01');	
									            
                                     }else toastr.error('hubo un error');

                                }
                              });
                            }else toastr.error('Hay Campos Requeridos');
                            }); 				
		
		
			
			

          });                  
		
		$('#codconc').on("change", function (evt, params) { 
                             if($(this).val()!=''){   
                              consultarPrecio($(this).val(),$('#codconc').val());
                            }
		 });
		 					
		$(document).on('click','.eliminar<?php echo $ale;?>',function(){
                          var id=$(this).attr('data-con');
                              $.post('/laboratorio/Orden_c/examen_ordern_borrar',{"id":id},function(ans){
                                if(ans.err=='1'){
                                    toastr.success('Datos Actualizados Satisfactoriamente');
                                     cargarlistado_examenes($('#ocunum').val());           
                                }

                              },'JSON');
                            
                        });
						
	   $('#tabla').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/Ordenes_c/impordenlaboratorio/'+cod,'','scrollbars=yes,width=1020,height=700');
	   });
	   
	    $('#add_examen').click(function(){
                              if($("form#procedimiento").validate().form()){   
                              $.ajax({
                                url:'/laboratorio/Orden_c/exameni',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#procedimiento').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){
                                       toastr.success('Datos Actualizados Satisfactoriamente');
                                       $('form#procedimiento').get(0).reset();                                   
         							   cargarlistado_examenes($('#ocunum').val());         
                                     }else toastr.error('hubo un error');

                                }
                              });
                            }else alert('Hay campos Requeridos');
                            }); 
	  
});

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
					  
function formatearNumero(str) {
      return (str + "").replace(/\b(\d+)((\.\d+)*)\b/g, function(a, b, c) {
        return (b.charAt(0) > 0 && !(c || ".").lastIndexOf(".") ? b.replace(/(\d)(?=(\d{3})+$)/g, "$1,") : b) + c;
      });
    }					  
					  
</script>
<style type="text/css">
td.blanco{ background-color: white;
    margin: 0.25em;
    padding: 0.25em;
}
td.verde{
 background-color: #006600;
    margin: 0.25em;
    padding: 0.25em;
}
td.rojo{
 background-color: #FB4D51;
    margin: 0.25em;
    padding: 0.25em;
}
td.azul{
 background-color: #34A5F8;
    margin: 0.25em;
    padding: 0.25em;
}
td.amarillo{
 background-color: #FFFF99;
    margin: 0.25em;
    padding: 0.25em;
}
</style>
	<div class="row" id="editar"  style="display: none;">
	<form action="" method="POST" class="form-horizontal"  id="upd_form<?php echo $ale;?>"  name="upd_form<?php echo $ale;?>" role="form">
	
	 <div>
	 <div class="col-md-12">
       <div class="item form-group">
	   <center>
         <center><h2 class="text-primary">DATOS BASICOS DEL ASPIRANTE</h2></center>
       </center>
       </div>
     </div>
	 
	 <div class="col-md-2">
       <div class="item form-group">
        <label class="control-label">Cedula:</label>
		<input type="text" class="form-control required" name="ocuced" id="ocuced" readonly >
       </div>
     </div>
	 
	  <div class="col-md-4">
       <div class="item form-group">
        <label class="control-label">Orden:</label>
		<input type="text" class="form-control required" name="ocunum" id="ocunum" readonly >
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
<div class="clearfix"></div>
	   
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Fecha Solicitud:</label>
		 <input name="fecsol" class="form-control required" id="fecsol" placeholder="YYYY-MM-DD" value="" readonly>   
       </div>
     </div>
	 
	 <div class="col-md-6">
       <div class=" form-group">
        <label class="control-label">Observacion:</label>
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
        <label class="control-label">Observacion:</label>
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
		  <input name="ocupor" class="form-control required" id="ocupor" value="" readonly> 
       </div>
     </div>
	 
	  <div class="col-md-5">
       <div class="item form-group">
       <label class="control-label">Estado:</label>
      <select class="chosen-select required validar" id="estord" name="estord">      
     </select>  
       </div>
     </div>
	 
	 <div class="col-md-1">
       <div class="item form-group">
       <label class="control-label">Sangre:</label>
      <select class="chosen-select required validar" id="tipsan" name="tipsan" data-placeholder="Seleccione Tipo Sangre">
            <option value=""></option>           
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
	 
	 
	 <div class="col-md-5">
       <div class="item form-group">
       <label class="control-label">Cargo</label>
       <select class="chosen-select required validar" id="codcar" name="codcar" data-placeholder="Seleccione Cargo">
            <option value=""></option>           
     </select>  
       </div>
     </div>
	 
	  <div class="col-md-1">
       <div class="item form-group">
       <label class="control-label">Examenes</label>
       <select class="chosen-select" id="rencal" name="rencal" data-placeholder="">
            <option value="NO">NO</option> 
			<option value="SI">SI</option>           
       </select>  
       </div>
     </div>
	 
	 <div class="col-md-12">
       <div class="item form-group">
       <center>
	   <button type="button" id="update_form<?php echo $ale;?>" style="margin-top: 23px;" class="btn btn-success">
                            <i class="fa fa-save"></i> Actualizar Orden</button>
       </center>
       </div>
     </div>
		</div> 
	 
</form>	 

<br>

                      <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <div class="table-responsive">
                              <table class="table table-bordered table-striped dt-responsive " id="listado_examenes">
                                 <thead>
                                  <tr>
                                    <th width="10%">Codigo</th>
                                    <th width="55%">Examen</th>
                                    <th width="10%">Vigencia</th>                     
                                    <th width="10%">Factura</th>
                                    <th width="10%" class="sum">Precio</th>
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
					<input type="hidden" class="form-control required" name="ocunumb" id="ocunumb"  >	
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
	</div>

	<div class="row" id="listado">
	<div class="col-md-12">
	<div class="table-responsive">
	<div class="row" id="registrar" >
	<form action="" method="POST" class="form-horizontal"  id="registrar<?php echo $ale;?>"  name="registrar<?php echo $ale;?>" role="form">
	 <div class="col-md-3">
       <div class=" form-group">
        <label class="control-label">Historico:</label>
		  <input type="checkbox" name="historico" id="historico" value="si" autocomplete="off">
       </div>
     </div>
	</form>
</div>
	<table class="table table-bordered table-striped dt-responsive " id="tabla">
	<thead>
		<tr>
				<th width="10%">Numero</th>
				<th width="20%">Persona</th>
				<th width="10%">Cargo</th>
				<th width="15%">Centro de Trabajo</th>
				<th width="15%">Laboratorio</th>
				<th width="9%">Tipo</th>
				<th width="8%">Estado</th>
				<th width="8%">Fec. Sol</th>
				<th width="5%">Ver</th>
		</tr>
	</thead> 
	<tbody>
	</tbody>
	</table>
</div>
</div>
</div>