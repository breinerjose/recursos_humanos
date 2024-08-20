 					<div id="new" style="display: block;">
                    <div class="x_title titulo" id="">
                    <h2 class="color-info">RESOLUCION</h2>
                    <div class="clearfix"></div>
					   <div class="x_content">     
                          <div class="row">   
						  <br />                        
                            <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
                              <div class="col-md-12"><div class="form-group">
							  <label>ASAP</label>
                              <input class="form-control requerid" id="asap" name="asap" type="Text" />
                              </div>
                            </div>
							
							<div class="col-md-12">
                            <div class="form-group">
                            <label>ASECO</label>
							<input class="form-control requerid" id="aseco" name="aseco" type="Text" >
                            </div>
                            </div>
							
							<div class="clearfix"></div>
							
							<br>
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <button type="button" id="regi<?php echo $ale; ?>" class="btn btn-success"><i class="fa fa-save"></i> Registrar</button> 
                  
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
				
					 datos();
					
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
						   datos();
                        }
                    };
                    ajaxGenerico('/Doc_equivalente_c/resolucion', data, callback);
					   }
					});
			
					});
					
				 function datos() {
				$.ajax({
					url: '/Doc_equivalente_c/resolucioncon',
					type: 'POST',
					dataType: 'JSON',
					data: {},
					success: function (ans) {
						$('#aseco').val(ans.a.aseco);
						$('#asap').val(ans.b.asap);
					}
				});
			}
			
					 
	
					</script>