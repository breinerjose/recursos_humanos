<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/recursos/js/datePickerSpanish.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	
	$('#datos')[0].reset();
	
	//AUTOCOMPLETE ARTICULOS REGISTRADOS
	$.ajax({
		url:'/servicios_c/articulos_report',
		type:"POST",
		dataType:"json",
		success: function(resp){
			var datos = [''];
			
			for ( var i = 0; i < resp.length; i = i + 1 ) {
				datos.push(resp[i].nomart);	
			}
			
			$( "#articulos" ).autocomplete({
			  source: datos
			});
		}	
	});
	
	$.ajax({
		url:'/articulos_c/todosArticulos',
		type:"POST",
		dataType:"json",
		success: function(resp){
			var datos = [''];
			
			for ( var i = 0; i < resp.length; i = i + 1 ) {
				datos.push(resp[i].codart+'--'+resp[i].nomart);	
			}
			
			$( "#articulos2" ).autocomplete({
			  source: datos
			});
		}	
	});
	
	$("#fecha1").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true,
		onClose: function (selectedDate) {
		$("#fecha2").datepicker("option", "minDate", selectedDate);
		}
	});
	
	$("#fecha2").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true,
		onClose: function (selectedDate) {
		$("#fecha1").datepicker("option", "maxDate", selectedDate);
		}
	});
	
	$('#fechas').button({icons:{primary: "ui-icon-print" }}).on('click',function(){
		fecha1 = $('#fecha1').val();
		fecha2 = $('#fecha2').val();
		if(fecha1!='' && fecha2!=''){
			window.open('/articulos_c/reporte_fechas/'+fecha1+'/'+fecha2);		
		}else{
			alert('Por favor digite un rango de fechas');	
		}
	});
	
	//SI RADIO ESTA MARCADO LO DESMARCA Y VICEVERSA
	$("input[type='radio']").click(function(){
	  var previousValue = $(this).attr('previousValue');
	  var name = $(this).attr('name');
	
	  if (previousValue == 'checked'){
		$(this).removeAttr('checked');
		$(this).attr('previousValue', false);
	  }
	  else{
		$("input[name="+name+"]:radio").attr('previousValue', false);
		$(this).attr('previousValue', 'checked');
	  }
	});
	
	$('#r_art').button({icons:{primary: "ui-icon-print" }}).on('click',function(){
		nomart = $('#articulos').val();
		todoarticulos = $('#todos').is(':checked');
		if(nomart!='' && !$('#todos').is(':checked')){
			//reporte por articulo
			window.open('/articulos_c/reporte_por_articulo?nomart='+nomart+'');
		}else if(nomart=='' && $('#todos').is(':checked')){
			//reporte para todos los articulos
			window.open('/articulos_c/reporte_todos_articulo');
		}else if(nomart=='' && !$('#todos').is(':checked')){
			alert('Por favor seleccione una opcion');	
		}else if(nomart!='' && $('#todos').is(':checked')){
			alert('Nada más puede seleccionar una opción');
		}		
	});
	
	$('#btnAsignados').button({icons:{primary: "ui-icon-print" }}).on('click',function(){
		art2 = $('#articulos2').val();
		if(art2!=''){
			window.open('/articulos_c/reporteArticulosAsignados?art='+art2+'');
		}else{
			alert('Porfavor escoja un articulo.');	
		}
	});
});
</script>
<style>
*{margin:0; padding:0;}
body{ font-size:14px; }
#capadatos{margin: 15px auto 0;
    width: 700px;}
#articulos,#articulos2{
	border: 1px solid #CCCCCC;
    font-size: 12px;
    margin-left: 5px;
    margin-right: 10px;
    padding: 3px;
    width: 325px;
}
#r_art,#fechas,#btnAsignados{ font-size: 11px;}
.filtros{ margin-bottom: 25px;}
#fecha1,#fecha2{ border: 1px solid #CCCCCC;
    border-radius: 3px;
    padding: 3px;
    text-align: center;
    width: 90px;}
#r_sedes{margin-right: 35px;}
#fechas{ margin-left: 10px;}
#tabla_todas_sedes tr td {
    font-size: 11px;
}
.parra{   margin-bottom: 12px;
    margin-top: 15px; }
#titulo{font-family: Arial;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;}
#ui-datepicker-div{ font-size:11px;}
#articulos2{margin-left: 44px;}
</style>
</head>
<body>
<div id="capadatos">
	<div id="titulo">Reportes Por</div>
 	<form id="datos">
   	<div class="filtros">
         <p>
         Articulo Especifico <input type="text" id="articulos">&nbsp;&nbsp;&nbsp;
         <input type="radio" value="todos" id="todos" name="todos"> todos los articulo&nbsp;&nbsp;&nbsp;
         <a href="javascript:void(0)" id="r_art">Excel</a>
        </p>
        <p class="parra">
        Fecha de registro &nbsp;&nbsp;
        <input type="text" id="fecha1">&nbsp;&nbsp; a &nbsp;&nbsp; <input type="text" id="fecha2"> &nbsp;
        <a href="javascript:void(0)" id="fechas">Excel</a></p>
        <p class="parra">
        Asignados &nbsp;&nbsp;
        <input type="text" id="articulos2"> &nbsp;
        <a href="javascript:void(0)" id="btnAsignados">Excel</a></p>
     </div>
     </form>
</div>
</body>
</html>