<script type="text/javascript">
$(document).ready(function() {

	$('#empresa').click(function(){
        $('#clientes,#consolidado').removeAttr('checked',true);
    });
	
	$('#clientes').click(function(){
        $('#empresa,#consolidado').removeAttr('checked',true);
    });
	
	$('#consolidado').click(function(){
        $('#clientes,#check3,#check4').removeAttr('checked',true);
    });
	
	$('#generar_reporte_excel').button().on('click',function(e){
		e.preventDefault();
		var anio = $('#anio').val();
		var mes = $('#mes').val();
		window.open("/contratos_c/generar_reporte_excel/"+anio+"/"+mes);	
	
		});

}); 
</script>
                          <h2 class="color-info">INFORME ESTADISTICO DE CONTRATOS</h2>   
                          <div class="row">     
						  
					<div class="col-md-1">
                    <div class="form-group">
						<label>Mes</label>
                          <select id="mes" name="mes"  data-placeholder=" "  class="chosen-select">
						  <option value="01" <?php if(date("m") == '01') { ?>selected="selected" <?php } ?> >ENERO</option>
						  <option value="02" <?php if(date("m") == '02') { ?>selected="selected" <?php } ?> >FEBRERO</option>
						  <option value="03" <?php if(date("m") == '03') { ?>selected="selected" <?php } ?> >MARZO</option>
						  <option value="04" <?php if(date("m") == '04') { ?>selected="selected" <?php } ?> >ABRIL</option>
						  <option value="05" <?php if(date("m") == '05') { ?>selected="selected" <?php } ?> >MAYO</option>
						  <option value="06" <?php if(date("m") == '06') { ?>selected="selected" <?php } ?> >JUNIO</option>
						  <option value="07" <?php if(date("m") == '07') { ?>selected="selected" <?php } ?> >JULIO</option>
						  <option value="08" <?php if(date("m") == '08') { ?>selected="selected" <?php } ?> >AGOSTO</option>
						  <option value="09" <?php if(date("m") == '09') { ?>selected="selected" <?php } ?> >SEPTIEMBRE</option>
						  <option value="10" <?php if(date("m") == '10') { ?>selected="selected" <?php } ?> >OCTUBRE</option>
						  <option value="11" <?php if(date("m") == '11') { ?>selected="selected" <?php } ?> >NOVIEMBRE</option>
						  <option value="12" <?php if(date("m") == '12') { ?>selected="selected" <?php } ?> >DICIEMBRE</option>
  		 					</select>
                        </div>
                      </div>
					  
					  <div class="col-md-1">
                      <div class="form-group">
						<label>Año</label>
                          <select id="anio" name="anio"  data-placeholder=" "  class="chosen-select">
						  <option value="2017" <?php if(date("Y") == '2017') { ?>selected="selected" <?php } ?> >2017</option>
						  <option value="2018" <?php if(date("Y") == '2018') { ?>selected="selected" <?php } ?> >2018</option>
						  <option value="2019" <?php if(date("Y") == '2019') { ?>selected="selected" <?php } ?> >2019</option>
						  <option value="2020" <?php if(date("Y") == '2020') { ?>selected="selected" <?php } ?> >2020</option>
  		 					</select>
                        </div>
                      </div>
					  <div class="clearfix"></div>
					   
					    <a href="javascript:void(0);" id="generar_reporte_excel" style="float:center;"><img src="/res/iconos/excel.png" width="64px" height="40px"/></a>
			</form>
		</div>
	  
	