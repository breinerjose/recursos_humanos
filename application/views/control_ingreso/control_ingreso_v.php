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
                    <div class="x_title titulo" id="">
                          <h2 class="color-info">Informe Ingreso y Salida </h2>
                          <div class="clearfix"></div>
                    </div>
					
                    <div class="x_content">
					    <form action="" method="POST" class="form-horizontal"  id="historia" name="historia" role="form">     
                          <div class="row">
						  
                              <div class="col-md-3">
                            <div class="form-group">
                            <label>Fecha Inicial </label>
                            <input class="form-control required" id="fecini" name="fecini" type="text" >
                          </div>
                            </div>
							
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Nueva Final</label>
                                  <input class="form-control required"  id="fecfin" name="fecfin" type="text">
                              </div>
                            </div>
						</div>
                             
                      <div class="row">
                        <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <button type="button" id="generar<?php echo $ale;?>" class="btn btn-success"><i class="fa fa-print"></i> Informe por Empleado</button>
                        </div>
                     
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <button type="button" id="fecha<?php echo $ale;?>" class="btn btn-primary"><i class="fa fa-print"></i> Informe por Fecha</button>
                        </div>
                      </div>
                      </div>
                            
</form>
</div>

  <script type="text/javascript">
                    $(document).ready(function(){
						$('#fecini,#fecfin').datepicker({
						 format: 'yyyy-mm-dd',
						 autoclose:true
						});
		
			$('#generar<?php echo $ale;?>').click(function(){        
		var fecini = $('#fecini').val();
		var fecfin = $('#fecfin').val();
		window.open('http://asapaseco.linkpc.net:82/Control_Ingreso_c/informe_ingreso/'+fecini+'/'+fecfin,'','scrollbars=yes'); 
                            });  
							
		$('#fecha<?php echo $ale;?>').click(function(){        
		var fecini = $('#fecini').val();
		var fecfin = $('#fecfin').val();
		window.open('http://asapaseco.linkpc.net:82/Control_Ingreso_c/informe_fecha/'+fecini+'/'+fecfin,'','scrollbars=yes'); 
                            });
							
							 });  

							  </script>                     