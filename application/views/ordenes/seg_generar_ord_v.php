<script type="text/javascript">
$(document).ready(function() {
	
	$( "#fecha1" ).datepicker({
		changeMonth: true, 
		changeYear: true,
		dateFormat: "yy-mm-dd",
		onClose: function (selectedDate) {
			$("#fecha2").datepicker("option", "minDate", selectedDate);
		}
	});
	
	$('#fecha2').datepicker({
		changeMonth: true, 
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		onClose: function (selectedDate) {
			$("#fecha1").datepicker("option", "maxDate", selectedDate);
		}
	});
	
	$("#nricli").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/clientesexamenes',function(resp){
		$.each(resp,function(i,v){
			$('#nricli').append('<option value="'+v.nricli+'-'+v.cliente+'">'+v.nricli+' - '+v.cliente+'</option>');
		});	$('#nricli').trigger("chosen:updated");
	},'json'); 
	
	$("#proveedor").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/clientes_seguridad',function(resp){
		$.each(resp,function(i,v){
			$('#proveedor').append('<option value="'+v.empnit+'-'+v.empnom+'-'+v.emptel+'-'+v.empema+'-'+v.ocuemp+'">'+v.empnit+' - '+v.empnom+'</option>');
		});	$('#proveedor').trigger("chosen:updated");
	},'json'); 
	
	$("#ocuced").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/empleados',function(resp){
		$.each(resp,function(i,v){
			$('#ocuced').append('<option value="'+v.ocuced+'-'+v.ocunom+'">'+v.ocuced+' - '+v.ocunom+'</option>');
		});	$('#ocuced').trigger("chosen:updated");
	},'json'); 
	
	$("#codconc1").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/servicios',function(resp){
		$.each(resp,function(i,v){
			$('#codconc1').append('<option value="'+v.codconc+'-'+v.desconc+'-'+v.valconc+'-'+v.ordlab+'">'+v.codconc+' - '+v.desconc+'</option>');
		});	$('#codconc1').trigger("chosen:updated");
	},'json'); 
	
	$("#codconc2").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/servicios',function(resp){
		$.each(resp,function(i,v){
			$('#codconc2').append('<option value="'+v.codconc+'-'+v.desconc+'-'+v.valconc+'-'+v.ordlab+'">'+v.codconc+' - '+v.desconc+'</option>');
		});	$('#codconc2').trigger("chosen:updated");
	},'json'); 
	
	$("#codconc3").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/servicios',function(resp){
		$.each(resp,function(i,v){
			$('#codconc3').append('<option value="'+v.codconc+'-'+v.desconc+'-'+v.valconc+'-'+v.ordlab+'">'+v.codconc+' - '+v.desconc+'</option>');
		});	$('#codconc3').trigger("chosen:updated");
	},'json'); 
	
	$("#codconc4").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Clientes_c/servicios',function(resp){
		$.each(resp,function(i,v){
			$('#codconc4').append('<option value="'+v.codconc+'-'+v.desconc+'-'+v.valconc+'-'+v.ordlab+'">'+v.codconc+' - '+v.desconc+'</option>');
		});	$('#codconc4').trigger("chosen:updated");
	},'json'); 

 $('#add').click(function(){
	if($("form#datos").validate().form()){	
	 $.ajax({
				      url:"/Ordenes_c/gen_ord_seguridad",
					  data: $('form#datos').serialize(),
					  type:"POST",
					  dataType:"json",
					  success: function(resp){
						 if(resp == '1'){
						 $('#datos').get(0).reset();
						 $('#nricli').val('');
						 $('#nricli').trigger("chosen:updated");
						 $('#proveedor').val('');
						 $('#proveedor').trigger("chosen:updated");
						 $('#ocuced').val('');
						 $('#ocuced').trigger("chosen:updated");
						 $('#codconc1').val('');
						 $('#codconc1').trigger("chosen:updated");
						 $('#codconc2').val('');
						 $('#codconc2').trigger("chosen:updated");
						 $('#codconc3').val('');
						 $('#codconc3').trigger("chosen:updated");
						 $('#codconc4').val('');
						 $('#codconc4').trigger("chosen:updated");
						 alert('Orden Generada');
						 }else{						    
						  $('#datos').get(0).reset();
						}
					  }	
			 });
		 }else{
			alert('Campos Pendientes por llenar');	
		 }
});	

}); 
</script>
<div id="contenido">
	<div id="formulario">
    	<form id="datos">
         	<div class="row">
			<div class="col-md-2"><label>Cargo A:</label></div>
			<div class="col-md-3"><input type="radio" name="tipcon" class="radio" value="Facturar" >Facturar</div>
		    <div class="col-md-3"><input type="radio" name="tipcon" class="radio" value="Tarifa" >Tarifa</div>
			</div>
			
			<div class="row">
			<div class="col-md-2"><label>Facturar A:</label></div>
			<div class="col-md-3"><input type="radio" name="ocupor" class="radio" value="6" ><label>ASAP</label></div>
		    <div class="col-md-3"><input type="radio" name="ocupor" class="radio" value="5" >ASECO</div>
			</div>
            
			<div class="row">
			<div class="col-md-2"><label>Clientes:</label></div>
			<div class="col-md-10">
				 <select id="nricli" name="nricli" class="chosen-select" data-placeholder="Seleccione Cliente">
    			<option value=""></option>
            </select>
			</div>
			</div>
			
			<div class="row">
			<div class="col-md-2"><label>Proveedor:</label></div>
			<div class="col-md-10">
				 <select id="proveedor" name="proveedor" class="chosen-select" data-placeholder="Seleccione Proveedor">
    			 <option value=""></option>
                 </select>
			</div>
			</div>
			
            <div class="row">
			<div class="col-md-2"><label>Aspirante:</label></div>
			<div class="col-md-10">
				 <select id="ocuced" name="ocuced" class="chosen-select" data-placeholder="Seleccione Aspirante" >
    			 <option value=""></option>
                 </select>
			</div>
			</div>
			
			
            <div class="row">
			<div class="col-md-2"><label>Servicio1:</label></div>
			<div class="col-md-10">
				 <select id="codconc1" name="codconc1" class="chosen-select" data-placeholder="Seleccione Servicio" >
    			<option value=""></option>
                </select>
			</div>
			</div>
			
			<div class="row">
			<div class="col-md-2"><label>Servicio2:</label></div>
			<div class="col-md-10">
				 <select id="codconc2" name="codconc2" class="chosen-select" data-placeholder="Seleccione Servicio">
    			 <option value=""></option>
                 </select>
			</div>
			</div>
			
			
			<div class="row">
			<div class="col-md-2"><label>Servicio3:</label></div>
			<div class="col-md-10">
				 <select id="codconc3" name="codconc3" class="chosen-select" data-placeholder="Seleccione Servicio" >
    			 <option value=""></option>
                 </select>
			</div>
			</div>
			
			<div class="row">
			<div class="col-md-2"><label>Servicio4:</label></div>
			<div class="col-md-10">
				 <select id="codconc4" name="codconc4" class="chosen-select" data-placeholder="Seleccione Servicio" >
    			 <option value=""></option>
                 </select>
			</div>
			</div>
			
			<div class="row">
			<div class="col-md-12">
		    <center><button class="btn btn-primary" id="add" type="button" ><i class="fa fa-plus"></i> Guardar Información</button></center>
			</div>
			</div>
 </form>
    </div>
</div>
</body>
<div id="confirm" title="Generar Certificado" style="display:none;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 30px 0;"></span><b>Desea Ver Orden</b></p>
	</div>
</html>			
