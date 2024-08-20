<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/res/js/datatables/media/css/demo_table.css" />
<link rel="stylesheet" href="/res/js/datatables/media/css/demo_page.css" />
<link rel="stylesheet" href="/res/jquery/ui/css/siaweb/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="/res/chosen/chosen.css" />
<link rel="stylesheet" href="/res/jboesch-Gritter/css/jquery.gritter.css" />

<script type="text/javascript" src="/res/jquery/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/res/jquery/ui/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="/res/js/datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/res/jquery/ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="/res/js/fnReloadAjax.js"></script>
<script type="text/javascript" src="/res/js/blockUI.js"></script>
<script type="text/javascript" src="/res/jboesch-Gritter/js/jquery.gritter.min.js"></script>
<script type="application/javascript" src="/res/chosen/chosen.jquery.js"></script>

<script type="text/javascript">

		function cerrarDialogo(){
			$('#buscarter1').dialog('close');
			return false;
	} 
	
	var oTable;
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	function dtl(codsed,coddoc,codcts,codcta,codnif,fecha1,fecha2,nrocmp,nroegr,codtrc){
		oTable = $('#tab_busqueda').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '400px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/sirco/busqueda_doc_contable_c/consultarDatos/"+codsed+"/"+coddoc+"/"+codcts+"/"+codcta+"/"+codnif+"/"+fecha1+"/"+fecha2+"/"+nrocmp+"/"+nroegr+"/"+codtrc,
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 0] }],
		   "fnDrawCallback": function( settings ) {
			var allChecked = true;
			$('#tab_busqueda tbody tr').each(function() {
				$(this).find(':checkbox[name="revertir[]"]').each(function(){
					if (!$(this).is(':checked')) {
						allChecked = false;
						}
					});
				});
			$('#all').prop('checked', allChecked);},
		});
	}
	
$(document).ready(function() {
	
	dtl();
	
	$('#aprobar').button({icons:{primary:'ui-icon-check'}}).click(function(){
		var total = oTable.$('input.revertir_all[type="checkbox"]:checked').length;		
	$('#mensaje').html(' Esta seguro que desea revertir '+total+' Documentos?');		
			 $("#confirmar_i").dialog({
							resizable: false,
							dialogClass: 'hide-close',
							height:170,
							width:360,
							position:['mindle'],
							modal: true,
							show: {effect: 'bounce', duration: 350,times: 3},
							hide: "explode",
							buttons: {'Aceptar': function() {				
								        $('.ui-dialog').remove();

										 var sData = oTable.$('input.revertir_all[type="checkbox"]:checked').serializeArray();
										 $.ajax({
											url:'/sirco/documento_contable_c/revertirInformacionTodos',
											type:'POST',
											data:sData,
											beforeSend : function(){
												 $.blockUI({ message: '<h2><img src="/res/images/pre-loader/Rounded stripes.gif" /> Revirtiendo Documentos Por Favor Espere...</h2>' });
											},
											success:function(ans){
												if(ans.err=='1'){
													$.extend($.gritter.options, {
													 position: 'bottom-left', 
													 fade_in_speed: 100, 
													 fade_out_speed: 100, 
													 time: 900 
													});
																					
													$.gritter.add({
														title: 'Se revirtieron '+total+' Documentos',
														image: '/res/icons/practica/ok.png',
														text: ' Satisfactoriamente',
														sticky: false//,
													});
													oTable.fnReloadAjax();
												
												}
												else(ans.msg);
											
											} 
										});
								
									},
									Cancelar: function() {$(this).dialog("close");}
									}
					 });	
		
		
		
	});
	$("#coddoc").chosen({no_results_text: "Resultado no encontrado!"});
		$.post('/sirco/documento_contable_c/selectdocumentos',function(resp){
		$.each(resp,function(i,v){
			$('#coddoc').append('<option value="'+v.coddoc+'">'+v.coddoc+' - '+v.nomdoc+'</option>');
		});	$('#coddoc').trigger("chosen:updated");
	},'json');
	
	$("#codsed").chosen({no_results_text: "Resultado no encontrado!"});
		$.post('/sirco/sedes_c/selectsedes',function(resp){
		$.each(resp,function(i,v){
			$('#codsed').append('<option value="'+v.codsed+'">'+v.codsed+' - '+v.nomsed+'</option>');
		});	$('#codsed').trigger("chosen:updated");
	},'json'); 
	
	$("#codcta").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/sirco/cuentas_c/cuentas_cta',function(resp){
		$.each(resp,function(i,v){
			$('#codcta').append('<option value="'+v.codcta+'">'+v.codcta+' - '+v.nomcta+'</option>');
		});	$('#codcta').trigger("chosen:updated");
	},'json');
	
	$("#codnif").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/sirco/cuentas_c/cuentas_nif',function(resp){
		$.each(resp,function(i,v){
			$('#codnif').append('<option value="'+v.codnif+'">'+v.codnif+' - '+v.nomnif+'</option>');
		});	$('#codnif').trigger("chosen:updated");
	},'json'); 
	
	$("#codcts").chosen({no_results_text: "Resultado no encontrado!",allow_single_deselect: true});
		$.post('/sirco/centro_c/centro_costo',function(resp){
		$.each(resp,function(i,v){
			$('#codcts').append('<option value="'+v.codcts+'">'+v.codcts+' - '+v.nomcts+'</option>');
		});	$('#codcts').trigger("chosen:updated");
	},'json');
	
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
	
	$(document).on('click','.imprimirLocal',function(){
			var id= $(this).attr('data-print');
			window.open('/sirco/imprimir_doc_c/imprimir_doc_local/'+id);
		});
			$(document).on('click','.imprimirNif',function(){
			var id= $(this).attr('data-print');
			window.open('/sirco/imprimir_doc_c/imprimir_doc_nif/'+id);
		});
		
		$(document).on('click','.imprimirCheque',function(){
			var id= $(this).attr('data-print');
			window.open('/sirco/imprimir_doc_c/imprimir_doc_cheque/'+id);
		});
		
		//boton edtar
	 $('#tab_busqueda').on('click','.edit',function(){
	     var idebtn = $(this).attr('data-id');
		 var  hab=$(this).attr('data-hab');
		 if(hab=='Abierto'){		 
		$('<iframe id="nuevoPrd" frameborder="0" />').attr('src','/sirco/documento_contable_c/vistaEditdc/'+idebtn+'/1').dialog({
						resizable:false, 
						modal: true,
						width:1100, 
						height:650, 
						position:['middle',3],
						title: 'Editar Documento',
						close : function(v, ui){							
							$(this).remove();
						}
			}).width(1100-3).height(650-3);

		 }else alert('El Perido contable se encuentra cerrada');
	 });
		
			//eliminar 
	 $('#tab_busqueda').on('click','.rvtir',function(){
		var codigo = $(this).attr('data-id');
		$("#informate").dialog({
		resizable: false,
		height:180,
		width:420,
		position:['mindle'],
		modal: true,
		show: {effect: 'bounce', duration: 350,times: 3},
		hide: "explode",
		buttons: {'Aceptar': function() {
			  $('.ui-dialog').remove();

											 $.ajax({
												url: "/sirco/documento_contable_c/revertirInformacion/",
												data: {'codigo':codigo}, 
												type: "POST",
												dataType:"json",
												success: function(datos){
													if(datos.msg=='0'){ 
													$('.ui-dialog').remove();
													oTable.fnReloadAjax();
													}else{
													alert(datos.msg)
													}
												}            
										});
					},
					Cancelar: function() {$(this).dialog("close");}
				}
		});
	});
	
	//boton edtar
	 $('#tab_busqueda').on('click','.vrdet',function(){
	     var idebtn = $(this).attr('data-id');
		$('<iframe id="verdetalle" frameborder="0" />').attr('src','/sirco/documento_contable_c/vistaEditdc/'+idebtn+'/2').dialog({
						resizable:false, 
						modal: true,
						width:950, 
						height:450, 
						position:['middle',50],
						title: 'Detalles de documentos',
						close : function(v, ui){							
							$(this).remove();
						}
			}).width(950-10).height(450-10);	
	 });
	 
	 
	
	$('#buscar').click(function(e){
		e.preventDefault();
		
		var codsed = ($('#codsed').val()==''|| $('#codsed').val()==null)?'0':$('#codsed').val();//sede
		var coddoc = ($('#coddoc').val()==''|| $('#coddoc').val()==null)?'0':$('#coddoc').val();//tipo de documt
		var codcts = ($('#codcts').val()==''|| $('#codcts').val()==null)?'0':$('#codcts').val();//centro
		var codcta = ($('#codcta').val()==''|| $('#codcta').val()==null)?'0':$('#codcta').val();//centro
		var codnif = ($('#codnif').val()==''|| $('#codnif').val()==null)?'0':$('#codnif').val();//centro
		var fecha1 = ($('#fecha1').val()=='')?'0':$('#fecha1').val();//fecha uno
		var fecha2 = ($('#fecha2').val()=='')?'0':$('#fecha2').val();//fecha dos
		var nrocmp = ($('#nrocmp').val()=='')?'0':$('#nrocmp').val();//cuenta 
		var nroegr = ($('#nroegr').val()=='')?'0':$('#nroegr').val();//egreso nro
		var codtrc = ($('#codtrc').val()=='')?'0':$('#codtrc').val();//codtrc
		dtl(codsed,coddoc,codcts,codcta,codnif,fecha1,fecha2,nrocmp,nroegr,codtrc);
	});
	
	$('#all').click(function(e) {
    var chk = $(this).prop('checked');
    var currentRows = $('#tab_busqueda tbody tr');
    $.each(currentRows, function(){
        $(this).find(':checkbox[name="revertir[]"]').each(function(){
            $(this).prop('checked', chk);
        });
    });
	var total = oTable.$('input.revertir_all[type="checkbox"]:checked').length;
				if(total>0){					
				var x=$('.ocultar').css('display');
					if(x=='none'){
						$('.ocultar').css('display','inline-block');
					}				
				}
				else{$('.ocultar').css('display','none');}
  });
	
		$(document).on('click','.revertir_all',function(){
		 var total = oTable.$('input.revertir_all[type="checkbox"]:checked').length;
				if(total>0){					
				var x=$('.ocultar').css('display');
					if(x=='none'){
						$('.ocultar').css('display','inline-block');
					}				
				}
				else{$('.ocultar').css('display','none');}
	});
	
	 $('.buscarter1').click(function(){
				cod_vista = $(this).attr('vista');
				$('<iframe id="buscarter1" frameborder="0" />').attr('src','/sirco/terceros_c/vista_buscar/'+cod_vista).dialog({
							resizable:false, 
							modal: true,
							width:500, 
							height:370, 
							title: 'Buscar Tercero',
							close : function(v, ui){							
					$(this).remove();
					}
				}).width(500-10).height(370-10);
			});
			
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

#tipo_doc{margin-right: 20px;
    width: 240px;}

#datos fieldset{padding: 5px;}
#fecha1,#fecha2{padding: 2px;border: 1px solid #CCCCCC;
    text-align: center;
    width: 85px;}
	
	#codtrc{padding: 2px;border: 1px solid #CCCCCC;
    width: 85px;}
	
	#nomtrc{padding: 2px;border: 1px solid #CCCCCC;
    width: 300px;}
	
#sede{  margin-right: 20px;
    width: 120px;}
#codcta{border: 1px solid #CCCCCC;
    padding: 2px;
    width: 140px;}
	
#centro_c{width: 237px;}

#nroegr,#nrocmp{ border: 1px solid #CCCCCC;
    padding: 2px;
    width: 50px;}
	
#buscar:hover{ cursor:pointer; }

#bctaknp{margin-right: 32px;}

#tab_busqueda .btnst{
    border: 1px solid transparent;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    padding: 2px;
	list-style:none;
	font-weight:bold;
	text-decoration:none;
}

#tab_busqueda .edit {
    background-color: #5bc0de;
    border-color: #46b8da;
    color: #fff;
}

#tab_busqueda .rvtir {
     background-color: #5cb85c;
    border-color: #4cae4c;
    color: #fff;
}
#tab_busqueda .vrdet {
   background-color: #f0ad4e;
    border-color: #eea236;
    color: #fff;
}
.imprimirLocal > img{
	height:21px;
}
.imprimirNif > img{
	height:21px;
}
.imprimirCheque > img{
	height:21px;
}
.ocultar{display:none;}

</style>
</head>
<body>

<div id="contenido">
	<div id="formulario">
    	<form id="datos">
         	<fieldset>
            	<legend>Opciones de busqueda:</legend>
            	<p>
                 <span class="line">Sede  <select id="codsed" name="codsed"  data-placeholder="Seleccione" style="width:230px;" 
                class="chosen-select"></select></span>
                
                <span class="line"> &nbsp;&nbsp; Documento:  <select id="coddoc" name="coddoc"  data-placeholder="Seleccione Tipo Documento" style="width:280px;" 
                class="chosen-select"><option value=""></option>
  		 		</select></span>
                    
                  <span class="line">&nbsp;&nbsp;Numero&nbsp;<input name="nrocmp" type="text" id="nrocmp" size="7" maxlength="6" ></span>    
                   &nbsp;&nbsp;Egreso <input name="nroegr" type="text" id="nroegr" size="7" maxlength="7"> 
                    </p>
             		<p>
                    <span class="line">Fechas:&nbsp;&nbsp;  
                    <input type="text" id="fecha1" name="fecha1"> a <input type="text" id="fecha2" name="fecha2"></span>	
                    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    	C. de costo: <select id="codcts" name="codcts"  data-placeholder="Seleccione Cuenta" style="width:495px;" 
                class="chosen-select"><option value=""></option>
  		 		</select>
                   <p>
                   <label class="titulo">Tercero:&nbsp;&nbsp;</label>
    				<input type="text" name="codtrc" id="codtrc">  <a href="javascript:void(0)" class="buscarter1" vista="busquedaterceros"><img class="imgbuscar" src="/res/icons/sirco/buscar.png"></a>
                    <input type="text" name="nomtrc" id="nomtrc">
                    	
                    </p> 	
                    </p>
                    <p>
                    Cuenta Local: 
                        <select id="codcta" name="codcta"  data-placeholder="Seleccione Cuenta" style="width:350px;" 
                class="chosen-select"><option value=""></option>
  		 		</select>
                
                &nbsp;&nbsp;Cuenta Niif: 
                        <select id="codnif" name="codnif"  data-placeholder="Seleccione Cuenta" style="width:350px;" 
                class="chosen-select"><option value=""></option>
  		 		</select>
                    </p>
                    <p align="center">
              <button id="buscar"><img src="/res/icons/sirco/busca.png"/> Buscar</button>
                    </p>
                    <p>              <a href="#" id="aprobar" name="aprobar" class="ocultar">Revertir Seleccionados</a>
 </p>
          </fieldset>
            
        </form>
    </div>
	<div id="tabla">
    	<table class="display" id="tab_busqueda" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                	<th width="5%"><input type="checkbox" id="all" name="all" /></th>
                    <th width="10%">Año</th>
                    <th width="10%">Mes</th>
                    <th width="10%">Fuente</th>
                    <th width="10%">Número</th>
                    <th width="15%">Fecha</th>
                    <th width="15%">Sede</th>
                    <th width="25%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>    
</div>
</body>
<div id="informate" title="Confirmación" style="display:none;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b>Esta seguro que desea revertir registro?</b></p>
</div>
<div id="confirmar_i" title="Confirmación" style="display:none;">
			<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b id="mensaje"> <b id="rec"></b></b></p>
	</div>
</html>