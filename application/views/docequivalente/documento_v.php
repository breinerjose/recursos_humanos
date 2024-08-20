 					<div id="new" style="display: block;">
                    <div class="x_title titulo" id="">
                    <h2 class="color-info">DOCUMENTO EQUIVALENTE</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Fecha</label>
							<input class="form-control requerid" id="fecha" name="fecha" type="Text" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>Empresa</label>
							<select name="empresa" id="empresa" class="form-control requerid">
							  <option>ASAP S.A.S</option>
							  <option>ASECO S.A.S</option>
							</select>  
                          </div>
                            </div>
							
							<div class="col-md-8">
                            <div class="form-group">
                            <label>Nombre</label>
							<select name="nombre" id="nombre" class="form-control chosen-select requerid">
							</select>  
                          </div>
                            </div>
							
							<div class="col-md-6">
                            <div class="form-group">
                            <label>Concepto</label>
							<textarea class="form-control rounded-0" name="concepto" id="concepto" rows="3"></textarea>
							</div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>CANT</label>
							<input class="form-control requerid" id="cant" name="cant" type="Text">
							<input class="form-control requerid" id="imp1" name="imp1" type="hidden">
							<input class="form-control requerid" id="imp2" name="imp2" type="hidden">
                            </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>VR UNIT </label>
							<input class="form-control numero requerid" id="vrunit" name="vrunit" type="Text">
                            </div>
                            </div>
							
							<div class="col-md-2">
                            <div class="form-group">
                            <label>VR TOTAL </label>
							<input class="form-control numero requerid" id="vrtotal" name="vrtotal" type="Text" readonly>
                            </div>
                            </div>
							
							<div class="clearfix"></div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>IVA ASUMIDO - BIEN O SERVICIO</label>
							<input class="form-control numero requerid" id="ivaa" name="ivaa" type="Text">
                            </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>IVA RETENIDO</label>
							<input class="form-control numero requerid" id="ivar" name="ivar" type="Text">
                            </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>RETENCION EN LA FUENTE</label>
							<input class="form-control numero requerid" id="rtefue" name="rtefue" type="Text">
                            </div>
                            </div>
							
							<div class="col-md-3">
                            <div class="form-group">
                            <label>RETENCION POR IND Y C/CIO</label>
							<input class="form-control numero requerid" id="rteind" name="rteind" type="Text">
                            </div>
                            </div>
							
							 <br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <button type="button" id="regi<?php echo $ale; ?>" class="btn btn-success"><i class="fa fa-save"></i> Registrar</button> 
                    <button type="button" class="btn btn-danger" id="cance<?php echo $ale; ?>"><i class="fa fa-times"></i>Cancelar</button>
                               
                        </div>
                      </div>
                      
                      </div>
							</form>
							</div>
							</div>
			</div>
			</div>	
			 <script type="text/javascript">
                    $(document).ready(function(){
					 $('.numero').autoNumeric('init', {aSep: '.', aDec: ',', mDec: '0'});
					 $('.chosen-select').chosen({no_results_text: "Resultado no encontrado!"});
					nombres();
					
					$('#nombre').on('change', function () {
               		 var tipo = $('#nombre').val();
                	 var res = tipo.split("**");
                	 $('#imp1').val(res[1]);
					 $('#imp2').val(res[2]);
                    });
					
					$('#vrunit').on('change', function () {
					 calcula();
            		});
					
					$('#empresa').on('change', function () {
					 calcula();
            		});
					
					$('#regi<?php echo $ale; ?>').click(function(){
                    var data = $('#registrar').serialize();
                    if ($('#registrar').validationEngine('validate', {promptPosition: "topLeft", scroll: false})) {
					var callback = function (resp) {
                        new PNotify({
                            title: resp.title,
                            text: resp.msg,
                            type: resp.type,
                            styling: 'bootstrap3'
                        });
                        if (resp.type == 'success') {
                           $('form#registrar').get(0).reset();
                        }
                    };
                    ajaxGenerico('/Doc_equivalente_c/registrar', data, callback);
					   }
					});
			
					});
					
			function calcula(){
				     var str = $('#vrunit').val();
				     var res = str.replace(/\./g, "");
					 $('#vrtotal').val(Math.round($('#cant').val()*res));
					 $('#rtefue').val(Math.round(($('#cant').val()*res/100)*$('#imp1').val()));
					 $('#rteind').val(Math.round(($('#cant').val()*res/100)*$('#imp2').val()));
					 if($('#empresa').val() == 'ASECO S.A.S'){
					  $('#ivaa,#ivar').val(Math.round(($('#cant').val()*res/100)*12));
					 }else{
					 $('#ivaa,#ivar').val(Math.round(($('#cant').val()*res/100)*2.4));
					 }
			}		$('.numero').trigger('blur');
					 
			
			function nombres(){
                      $('#nombre').empty();
                      $('#nombre').html('<option value=""></option>');
                      $.ajax({
                        url:'/Terceros_c/terceros',
                        type:'POST',
                        dataType:'JSON', 
                        async: false,                  
                        success:function(ans){
                          if(ans.e.err=='1'){
                            for(i in ans.a){
                            $('<option/>').val(ans.a[i].id_tercero+'**'+ans.a[i].imp1+'**'+ans.a[i].imp2).text(ans.a[i].nombre).appendTo('#nombre');
                          }
                          }
                          
                          $('#nombre').trigger('chosen:updated');

                        }

                      });

                     
                    }
					</script>