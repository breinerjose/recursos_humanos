<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script type="text/javascript">
	$(document).ready(function(){
	 $("#codpro").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
	 $("#tipcob").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});	
		
    $("#codexa").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/laboratorio/Examenes_c/exameness',function(resp){
		$.each(resp,function(i,v){
			$('#codexa').append('<option value="'+v.codexa+'">'+v.codexa+' - '+v.nomexa+'</option>');
		});	$('#codexa').trigger("chosen:updated");
	},'json');
	
	$("#subgru").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/laboratorio/Examenes_c/subgru',function(resp){
		$.each(resp,function(i,v){
			$('#subgru').append('<option value="'+v.codgru+'">'+v.subgru+'</option>');
		});	$('#subgru').trigger("chosen:updated");
	},'json');
	
	$("#codcar").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Cargos_c/Cargos',function(resp){
		$.each(resp,function(i,v){
			$('#codcar').append('<option value="'+v.carcod+'">'+v.cardes+'</option>');
		});	$('#codcar').trigger("chosen:updated");
	},'json');
	
	$("#codcarb").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Cargos_c/Cargos',function(resp){
		$.each(resp,function(i,v){
			$('#codcarb').append('<option value="'+v.carcod+'">'+v.cardes+'</option>');
		});	$('#codcarb').trigger("chosen:updated");
	},'json');
	
	$("#id_empresa").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/Tarifa_c/clientes/',function(resp){
		$.each(resp,function(i,v){
			$('#id_empresa').append('<option value="'+v.codcli+'-'+v.nomcli+'">'+v.nomcli+'</option>');
		});	$('#id_empresa').trigger("chosen:updated");
	},'json');
	
	$('#agregar').click(function(){		
			var codexa=($('#codexa').val()!=''||$.type($('#codexa').val()) === "undefined")?$('#codexa').val():0;
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var tipcob=($('#tipcob').val()!='')?$('#tipcob').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			var codpro=($('#codpro').val()!=''||$.type($('#codpro').val()) === "undefined")?$('#codpro').val():0;	
			insercion(codexa,subgru,codcar,id_empresa,codpro,tipcob);
	
	});
	
	
	
	$('#consultar').click(function(){		
			var codexa=0;
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var tipcob=($('#tipcob').val()!='')?$('#tipcob').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			var codpro=($('#codpro').val()!=''||$.type($('#codpro').val()) === "undefined")?$('#codpro').val():0;	
			insercion(codexa,subgru,codcar,id_empresa,codpro,tipcob);
	
	});
	
	$('#codcar').on('change',function(){
		var codexa=0;
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var tipcob=($('#tipcob').val()!='')?$('#tipcob').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			var codpro=($('#codpro').val()!=''||$.type($('#codpro').val()) === "undefined")?$('#codpro').val():0;	
			insercion(codexa,subgru,codcar,id_empresa,codpro,tipcob);
	});
	
	$('#cambiar').click(function(){		
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var tipcob=($('#tipcob').val()!='')?$('#tipcob').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			var codpro=($('#codpro').val()!=''||$.type($('#codpro').val()) === "undefined")?$('#codpro').val():0;	
			cambiar(subgru,codcar,id_empresa,codpro);
	
	});
	
	$('#confirmar').click(function(){		
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			var codpro=($('#codpro').val()!=''||$.type($('#codpro').val()) === "undefined")?$('#codpro').val():0;	
			confirmar_gru(subgru,codcar,id_empresa,codpro);
	
	});
	
	$('#clonar').click(function(){
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;		
			var codcarb=($('#codcarb').val()!='')?$('#codcarb').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			var codpro=($('#codpro').val()!=''||$.type($('#codpro').val()) === "undefined")?$('#codpro').val():0;	
			clonar_cargo(codcarb,codcar,id_empresa,codpro,subgru);
	
	});
	
	
	$(document).on('click','.borrar<?php echo $ale;?>',function(){
			var codigo=$(this).attr('data-codpro');
			var subgru=($('#subgru').val()!=''||$.type($('#subgru').val()) === "undefined")?$('#subgru').val():0;
			var codcar=($('#codcar').val()!='')?$('#codcar').val():0;	
			var codpro=($('#codpro').val()!='')?$('#codpro').val():0;	
			var id_empresa=($('#id_empresa').val()!='')?$('#id_empresa').val():0;	
			$.ajax({
					url:'/Cargos_c/profesiogramad',
					data:{'codpro':codigo},
					type:"POST",
					success: function(resp){
						if(resp==1){
							insercion(0,subgru,codcar,id_empresa,codpro);
							}else{
							alert('Revisar la Informacion');
						}
					}	
				});
				
		});
	
	});<!-- Fin Document Ready Function-->
	
	function insercion(codexa,subgru,codcar,id_empresa,codpro,tipcob){
				var oTable = $('#listado').dataTable({
					"order": [[ 4, "asc" ]],
							  "bPaginate": false,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Cargos_c/profesiogramai/",
									"type": "POST"   ,
									"data":{"codexa":codexa,"subgru":subgru,"codcar":codcar,"id_empresa":id_empresa,"ale":"<?php echo $ale;?>","codord":codpro,"tipcob":tipcob}             
						
								}
    		});	
	}
	
	function cambiar(subgru,codcar,id_empresa,codpro){
				var oTable = $('#listado').dataTable({
				"order": [[ 4, "asc" ]],
							  "bPaginate": false,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Cargos_c/profesiogramau/",
									"type": "POST"   ,
									"data":{"subgru":subgru,"codcar":codcar,"id_empresa":id_empresa,"ale":"<?php echo $ale;?>","codord":codpro}             
						
								}
    		});	
	}
	
	function clonar_cargo(codcarb,codcar,id_empresa,codpro,subgru){
				var oTable = $('#listado').dataTable({
				"order": [[ 4, "asc" ]],
							  "bPaginate": false,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Cargos_c/clonar_cargo/",
									"type": "POST"   ,
									"data":{"codcarb":codcarb,"codcar":codcar,"id_empresa":id_empresa,"ale":"<?php echo $ale;?>","codord":codpro,"subgru":subgru}             
						
								}
    		});	
	}
	
	function confirmar_gru(subgru,codcar,id_empresa,codpro){
				var oTable = $('#listado').dataTable({
				"order": [[ 4, "asc" ]],
							  "bPaginate": false,
							  "ordering": true,
							  "bLengthChange": true,
							  "responsive": true,
							  "bInfo": true,
							  "bFilter": true,
							  "bDestroy": true,
							  "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},							
								"ajax": {
									"url": "/Cargos_c/confirmar_pro/",
									"type": "POST"   ,
									"data":{"subgru":subgru,"codcar":codcar,"id_empresa":id_empresa,"ale":"<?php echo $ale;?>","codord":codpro}             
						
								}
    		});	
	}
	</script>
    <style type="text/css">
    .chosen-container{width: 100% !important;color:#333;}
 .chosen-container-single .chosen-single{line-height:32px;}
 .chosen-container-single .chosen-single div{top:5px;}
    
    </style>
	</head>
<body>
<div class="row">	
	<form class="form-label-left" novalidate >
    
     <div class="col-md-4">
       <div class="item form-group">
        <label class="control-label">Empresa</label>
       <select class="chosen-select required validar"  data-placeholder="Seleccione Empresa"  name="id_empresa" id="id_empresa">
       <option value=""></option>
       </select>
       </div>
     </div>
    
    <div class="col-md-2">
       <div class="item form-group">
       <label class="control-label">Tipo</label>
     <select class="chosen-select valid_sele" id="subgru" name="subgru" data-placeholder="Seleccione Tipo">
            <option value=""></option>           
     </select>  
       
       </div>
     </div>
      
      <div class="col-md-3">
       <div class="item form-group">
       <label class="control-label">Cargo</label>
        <select class="chosen-select valid_sele" id="codcar" name="codcar" data-placeholder="Seleccione Cargo">
            <option value=""></option>           
     </select> 
       </div>
     </div>
     
    <div class="col-md-3">
       <div class="item form-group">
       <label class="control-label">Examen</label>
       <select class="chosen-select valid_sele" id="codexa" name="codexa" data-placeholder="Seleccione Examen">
       <option value=""></option>           
     </select>  
       </div>
     </div>
     
	  <div class="col-md-4">
       <div class="item form-group">
       <label>Empresa</label>
	   <select name="codpro" id="codpro">
	   <option value="ASECO">ASECO</option> 
	   <option value="ASAP">ASAP</option>  
	   </select> 
       </div>
     </div>
	 
	 <div class="col-md-2">
       <div class="item form-group">
       <label>Factura</label>
	   <select name="tipcob" id="tipcob">
	   <option value="ARL">ARL</option> 
	   <option value="CLIENTE">CLIENTE</option> 
	   <option value="EMPRESA">EMPRESA</option> 
	   <option value="TARIFA">TARIFA</option>  
	   </select> 
       </div>
     </div>
	 
	  <div class="col-md-3">
       <div class="item form-group">
       <label class="control-label">Cargo</label>
        <select class="chosen-select valid_sele" id="codcarb" name="codcarb" data-placeholder="Seleccione Cargo">
            <option value=""></option>           
     </select> 
       </div>
     </div>
	 
      <div class="col-md-3">
       <div class="item form-group">
       <center>
	    <button type="button" class="btn btn-success" id="clonar"><i class="fa fa-plus-circle"></i> Clonar Empresa</button>
       </center>
       </div>
       </div>
	</form>
	<div class="table-responsive">
			<table class="table table-bordered table-striped dt-responsive " id="listado">
				 <thead>
					<tr>
						<th width="18%">Empresa</th>
						<th width="10%">Tipo</th>
						<th width="22%">Cargo</th>
						<th width="18%">Examen</th>
						<th width="10%">Factura</th>
						<th width="7%">Confirma</th>
                        <th width="5%">Borrar</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
	</table>
	</div>
	</div>
</body>
</html>