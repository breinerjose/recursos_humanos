<script type="text/javascript">
$(document).ready(function() {

 $('#e').datepicker({
 format: 'dd/mm/yyyy',
 autoclose: true
 <!--maxDate: respuesta.fechafin-->
 });//fin de datepicker
		 
$('.ocu').css('display','none');
$(".chosen-select").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});

$("#codlab").chosen();

		$.post('/Cargos_c/laboratorios/',function(resp){
		$.each(resp,function(i,v){
		$('#codlab').append('<option value="'+v.empnit+'">'+v.empnit+' '+v.empnom+'</option>');
		});	$('#codlab').trigger("chosen:updated");
		},'json');
		
		$('#numid').on('change',function(){
		var numid = $('#numid').val();
		$('#numero').empty();
		$.post('/pazysalvo/retirar_c/chosen_contratos_inactivo',{'numid':numid},function(resp){
		$.each(resp,function(i,v){
		$('#numero').append('<option value="'+v.codigo+' * '+v.familia+'">'+v.familia+' * '+v.oficio+' * '+v.lugardes+' * '+v.ocupor+'</option>');
		});	$('#numero').trigger("chosen:updated");
		},'json');
		});
		
		$('#numero').on('change',function(){
		 var text = $('#numero').val();
		 var text = text.split("*");
		$.post('/pazysalvo/retirar_c/datoscontratos_inactivo',{'codigo':text[0],'familia':text[1]},function(res){
		$('#familia').val(res.familia);
		$('#oficio').val(res.oficio);
		$('#lugardes').val(res.lugardes);
		$('#conpor').val(res.conpor);
		$('#periodopago').val(res.periodopa);
		$('#e').val(res.fecfin);
		},'json');	
		});

	
	$.post('/pazysalvo/retirar_c/selectestado/',function(selestado){
     if(selestado == '1'){alert('No hay Datos de Estado');}else{
		 $('#v').append("<option value=''> Seleccione Opción</option>");
		for(i=0; i< selestado.length; i++){
				$('<option/>').val(selestado[i].estado).text(selestado[i].estado).appendTo('#v');
			  }
		}
	},'json');	

	$.post('/pazysalvo/retirar_c/selectretiro/',function(selretiro){
     if(selretiro == '1'){alert('No hay Datos de Causas de Retiro');}else{
		  $('#u').append("<option value=''> Seleccione Opción</option>");
		for(i=0; i< selretiro.length; i++){
				$('<option/>').val(selretiro[i].causa).text(selretiro[i].causa).appendTo('#u');
			  }
		}
	},'json');	
	
	
	$('#numid').on('blur',function(){
		var numid = $(this).val(); /* this saco el valor de aqui mismo*/	
		 if(numid != ''){
			 $.post('/pazysalvo/retirar_c/consultarusuario',{'numid':numid},function(respuesta){
				 if(respuesta == '1'){alert('No hay Informacion con este numero de Cedula');$('#numid').val('');}else{
					$('#nombre').val(respuesta.nomtrc);
				 }
	         },'json');	
		 }
		});
	
	$('input:radio[name="estado"]').click(function(){
		if($(this).val()!='Disponible'){
			$('.ocu').css('display','inline-block');
			$('#obsarc').addClass('required');
		}else{
			$('.ocu').css('display','none');
			$('#obsarc').removeClass('required');
			$('#obsarc').removeClass('error');		

		}
	});
	
   $('#add').click(function(){
	var estado = $('#estado').val();
	if($("form#retirar").validate().form()){
	var cod = $('#numero').val(); 
	var fecha = '<?php echo date('Y-m-d') ?>';
	 				$.ajax({
				      url:"/pazysalvo/retirar_c/actualizarContrato",
					  data: $('form#retirar').serialize(),
					  type:"POST",
					  dataType:"json",
					  success: function(resp){
						 if(resp != '0'){
						    $('#numero').empty();
							alert('Actualizacion Exitosa');
							window.open('/pazysalvo/retirar_c/datosCertificado/'+resp+'/'+fecha,'','scrollbars=yes,width=900,height=550');
							window.open('/pazysalvo/retirar_c/cartaterminacionMax/'+resp,'','scrollbars=yes,width=900,height=550');
							setTimeout(function(){ $('#retirar').get(0).reset();}, 900);
						 }else if(resp == '2'){
							alert('Error al Insectar Datos');
						 }else if(resp == '3'){
						    alert('Ya existe un paz y salvo');
							$('#retirar').get(0).reset();
						}
					  }	
			 });
		 }else{
			alert('Campos Pendientes por llenar');	
		 }
	});	

}); 


</script>

</head>
<body>
<form action="" id="retirar" name="retirar" method="post" role="form">
<div class="row">
<div class="col-md-3">
<input type="hidden" name="ide" id="ide" readonly="readonly" />
<input type="hidden" name="tipo" id="tipo" value="manual" />
<span>Identificacion</span>
</div>
<div class="col-md-7">
<input type="text" name="numid" id="numid" class="form-control  required digits" />
</div>
<div class="col-md-2">
</div>
</div>


<div class="row">
<div class="col-md-3">
<span>Empleado</span>
</div>
<div class="col-md-7">
<input type="text" name="nombre" id="nombre" class="form-control required" readonly="readonly" />
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Contrato</span>
</div>
<div class="col-md-7">
 <select class="chosen-select required validar"  data-placeholder="Seleccione Contrato"  name="numero" id="numero">
       <option value=""></option>
       </select>
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Empresa</span>
</div>
<div class="col-md-7">
<input type="text" name="conpor" id="conpor" class="form-control"/>
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Cliente</span>
</div>
<div class="col-md-7">
<input type="text" name="lugardes" id="lugardes" class="form-control"/>
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Periodo de Pago</span>
</div>
<div class="col-md-7">
<input type="text" name="periodopago" id="periodopago" class="form-control required" />
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Fecha de Retiro</span>
</div>
<div class="col-md-7">
<input type="text" name="e" id="e" class="form-control required" readonly="readonly" />
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Cargo</span>
</div>
<div class="col-md-7">
<input type="text" name="oficio" id="oficio" class="form-control" readonly="readonly" />
</div>
<div class="col-md-2">
</div>
</div>


<div class="row">
<div class="col-md-3">
<span>Familia</span>
</div>
<div class="col-md-7">
<input type="text" name="familia" id="familia" class="form-control" readonly="readonly" />
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
		<div class="col-md-3">
		<span>Laboratorio</span>
		</div>
 	   <div class="col-md-7">
       <select class="chosen-select required validar" id="codlab" name="codlab" data-placeholder="Seleccione Laboratorio">
       <option value=""></option>           
       </select>  
       </div>
	   <div class="col-md-2">
	   </div>
</div>	 

<div class="row">
<div class="col-md-3">
<span>Causa Terminacion </span>
</div>
<div class="col-md-7">
<select name="u" id="u" class="form-control seleccion1 required" ></select>
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Razon de la Terminación </span>
</div>
<div class="col-md-7">
<select class="seleccion8 required" name="w" id="w">
  <option>R</option>
  <option>P</option>
  <option>S</option>
  <option>B</option>
  <option>D</option>
</select>
</div>
<div class="col-md-2">
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Disponible:</span>
</div>
<div class="col-md-9">
<input name="estado" class="required" type="radio" value="Disponible" />
</div>
</div>

<div class="row">
<div class="col-md-3">
<span>Archivo Muerto:</span>
</div>
<div class="col-md-9">
<input name="estado" class="required" type="radio" value="Archivo Muerto" />
</div>
</div>

	<table>
	<tr>
	<td class="ocu">Causa de envio a archivo muerto</td>
	</tr>
	<tr>
	<td rowspan="3" class="ocu"><textarea class="form-control" name="obsarc" id="obsarc" rows="5" cols="90"></textarea></td>
	</tr>
  </table>
 <div class="row">
<div class="col-md-3">
</div>
<div class="col-md-9">
<button class="btn btn-primary" id="add" type="button" ><i class="fa fa-plus"></i> Guardar Información</button>
</div>
</div>

</form>