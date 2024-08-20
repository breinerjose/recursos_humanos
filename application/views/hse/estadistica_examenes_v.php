<?php if($this->session->userdata('user') == ''){echo "Acceso no Autorizado"; exit();} ?>
	<div class="panel panel-primary">
      <div class="panel-heading">INFORME DE EXAMENES</div>
      <div class="panel-body">
	<form id="datos">
	 <div>
	 
	  <div class="col-md-3">
       <div class="form-group">
        <label class="control-label">Informe Detallado:</label>
		<input type="radio" name="tipo_informe" class="radio" value="detallado" >
       </div>
     </div>
	 
	  <div class="col-md-3">
       <div class="form-group">
        <label class="control-label">Informe Consolidado::</label>
		 <input type="radio" name="tipo_informe" class="radio" value="consolidado" checked>
       </div>
     </div>
	 
	 <div class="col-md-3">
       <div class=" form-group">
        <label class="control-label">Fecha Inicial:</label>
		 <input name="fecha1" class="form-control required" id="fecha1" placeholder="YYYY-MM-DD" value=""> 
       </div>
     </div>
	 
	  <div class="col-md-3">
       <div class=" form-group">
        <label class="control-label">Fecha Final:</label>
		 <input name="fecha2" class="form-control required" id="fecha2" placeholder="YYYY-MM-DD" value=""> 
       </div>
     </div>
	 </div>
	 
	   <div class="col-md-6">
       <div class=" form-group">
       <label class="control-label">Cliente:</label>
		    <select id="nricli" class="chosen-select" data-placeholder="Seleccione Cliente" style="width:500px;">
    			<option value=""></option>
            </select> 
       </div>
       </div>	 
	 
	   <div class="col-md-2">
       <div class=" form-group" style="margin-top:25px;">
	   <a href="javascript:void(0);" id="generar_reporte" style="float:right;"><img src="/res/iconos/excel.png" width="64px" height="40px"/></a>&nbsp;&nbsp;&nbsp;
	   </div>
	   </div>
	   
	   <div class="col-md-2">
       <div class=" form-group" style="margin-top:25px;">
	   <a href="javascript:void(0);" id="general" style="float:right;">General</a>&nbsp;&nbsp;
	   </div>
	   </div>
	   
	   <div class="col-md-2">
       <div class=" form-group" style="margin-top:25px;">
	   <a href="javascript:void(0);" id="imprimir" style="float:right;"><img src="/res/iconos/impresora.png" width="54px" height="40px"/></a>
	   </div>
	   </div>
 </form>
 </div>
 </div>
 	<div class="panel panel-primary">
      <div class="panel-heading">INFORME DE ORDENES</div>
      <div class="panel-body">
	<form id="datoss">
	 <div class="row">
	 	 
	  <div class="col-md-3">
       <div class=" form-group" >
        <label class="control-label">A&ntilde;o:</label>
		 <input name="anio" class="form-control required" id="anio" placeholder="YYYY" value=""> 
       </div>
      </div>
	 
	 <div class="col-md-3">
       <div class=" form-group">
         <center><button class="btn btn-primary" id="informe" type="button" ><i class="fa fa-plus"></i> Generar Informe</button></center>
       </div>
     </div>
	 
	 </div>
 </form>
 </div>
 </div>
 
 <div class="panel panel-primary">
      <div class="panel-heading">INFORME DE ORDENES EMPLEADOS ACTIVOS</div>
      <div class="panel-body">
	<div class="col-md-2">
       <div class=" form-group" style="margin-top:25px;">
	   <a href="javascript:void(0);" id="generar_reporte_activos" style="float:right;"><img src="/res/iconos/excel.png" width="64px" height="40px"/></a>&nbsp;&nbsp;&nbsp;
	   </div>
	   </div>
 </div>
 </div>
 
<script type="text/javascript">
$(document).ready(function() {

	$('#imprimir').button().on('click',function(e){
		e.preventDefault();
		var fecha1 = $('#fecha1').val();
		var fecha2 = $('#fecha2').val();
		var tipo_informe = $('input:radio[name="tipo_informe"]:checked').val();
		var nricli = $('#nricli').val();
		if (nricli == '') {nricli = 1;}
		window.open("/hse_c/generar_reporte_web/"+fecha1+"/"+fecha2+"/"+nricli+"/"+tipo_informe);
	});	
	
	 $('#informe').click(function(){
		var anio = $('#anio').val();
		window.open("/hse_c/informe_ordenes/"+anio);
	 });	
	
	$('#generar_reporte').button().on('click',function(e){
		e.preventDefault();
		var fecha1 = $('#fecha1').val();
		var fecha2 = $('#fecha2').val();
		var tipo_informe = $('input:radio[name="tipo_informe"]:checked').val();
		var nricli = $('#nricli').val();
		if (nricli == '') {nricli = 1;}
		window.open("/hse_c/generar_reporte/"+fecha1+"/"+fecha2+"/"+nricli+"/"+tipo_informe);	
		});
		
	
	$('#generar_reporte_activos').button().on('click',function(e){
		e.preventDefault();
		var fecha1 = $('#fecha1').val();
		var fecha2 = $('#fecha2').val();
		var tipo_informe = $('input:radio[name="tipo_informe"]:checked').val();
		var nricli = $('#nricli').val();
		if (nricli == '') {nricli = 1;}
		window.open("/hse_c/generar_reporte_activos/"+fecha1+"/"+fecha2+"/"+nricli+"/"+tipo_informe);	
		});	
		
	$('#general').button().on('click',function(e){
		e.preventDefault();
		var fecha1 = $('#fecha1').val();
		var fecha2 = $('#fecha2').val();
		var nricli = $('#nricli').val();
		if (nricli == '') {nricli = 1;}
		window.open("/hse_c/general/"+fecha1+"/"+fecha2+"/"+nricli);	
		});
		
		$( ".fecha" ).datepicker({
		changeMonth: true, 
		changeYear: true,
		 format: 'yyyy-mm-dd',
		  autoclose:true
		});	
	
	$( "#fecha1" ).datepicker({
		changeMonth: true, 
		changeYear: true,
		 format: 'yyyy-mm-dd',
		  autoclose:true,
		onClose: function (selectedDate) {
			$("#fecha2").datepicker("option", "minDate", selectedDate);
		}
	});
	
	$('#fecha2').datepicker({
		changeMonth: true, 
		changeYear: true,
		 format: 'yyyy-mm-dd',
		  autoclose:true,
		onClose: function (selectedDate) {
			$("#fecha1").datepicker("option", "maxDate", selectedDate);
		}
	});
	
	$("#nricli").chosen({no_results_text: "Resultado no encontrado!"});
		$.post('/Clientes_c/clientesexamenes',function(resp){
		$.each(resp,function(i,v){
			$('#nricli').append('<option value="'+v.nricli+'">'+v.nricli+' - '+v.cliente+'</option>');
		});	$('#nricli').trigger("chosen:updated");
	},'json'); 

}); 
</script>
<style>
body{ font-family: 'Capriola',sans-serif;  font-size:12px}
*{ margin:0; padding:0; }
#ui-datepicker-div{ font-size:11px;}
.ui-autocomplete { font-size:12px;}
#formulario{
    height: 216px;
    margin-bottom: 15px;}
#formulario p{margin-bottom: 5px;}

#formulario legend{font-size: 13px;
    font-weight: bold;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;}

#formulario select{border: 1px solid #CCCCCC;
    padding: 2px;}
	#datos fieldset{padding: 5px;}
#fecha1,#fecha2{padding: 2px;border: 1px solid #CCCCCC;
    text-align: center;
    width: 85px;}	
</style>