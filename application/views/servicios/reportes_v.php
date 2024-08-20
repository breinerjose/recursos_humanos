<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url();?>recursos/js/datePickerSpanish.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/datatables/media/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript">

	function dtl(){
		oTable = $('#tabla_todas_sedes').dataTable( {
			"bProcessing": false,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '210px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "<?php echo base_url(); ?>servicios_c/articulos_por_sedes/",
			"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
		});
	}

$(document).ready(function(e) {
	
	dtl();
	
	$.ajax({
		url: '<?php echo base_url(); ?>servicios_c/sedes',
		dataType:"json",
		type:"POST",
		success: function(resp){
			$('#sedes').append('<option value="0">Todas</option>');
			$.each(resp,function(i,v){
				$('#sedes').append('<option value="'+v.codse+'">'+v.nomsed+'</option>');
			});
		}	
	});
	
    $('#tabs').tabs();
	
	$('#datos')[0].reset();
	
	//AUTOCOMPLETE ARTICULOS REGISTRADOS
	$.ajax({
		url:'<?php echo base_url(); ?>servicios_c/articulos_report',
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
	
	$.post('<?php echo base_url();?>servicios_c/selectecnico/',function(selectecnico){
		$('#tecnico').append("<option value=''></option>");
		if(selectecnico != '1'){
			for(i=0; i< selectecnico.length; i++){
				$('<option/>').val(selectecnico[i].id_tecnico).text(selectecnico[i].nombres).appendTo('#tecnico');
			}
		}
    },'json');
	
	$('#r_sedes').button({icons:{primary: "ui-icon-print" }}).on('click',function(e){
		e.preventDefault();
		val = $('#sedes').val();
		if(val=='0'){
			window.open('<?php echo base_url(); ?>servicios_c/export_data');
		}else if(val!=''){
			window.open('<?php echo base_url(); ?>servicios_c/casos_por_sedes/'+val);
		}else{
			alert('Seleccione una opción');	
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
		tipo_consuta = $('input:radio[name="tipo_consulta"]:checked').val();
		if(fecha1!='' && fecha2!=''){
			if(tipo_consuta!=''){
				window.open('<?php echo base_url(); ?>servicios_c/reporte_fechas2/'+fecha1+'/'+fecha2+'/'+tipo_consuta);	
			}else{
				alert('Por favor seleccione el tipo de consulta');
			}		
		}else{
			alert('Por favor digite un rango de fechas');	
		}
	});
	
	$('#r_art').button({icons:{primary: "ui-icon-print" }}).on('click',function(){
		nomart = $('#articulos').val();
		if(nomart!=''){
			window.open('<?php echo base_url(); ?>servicios_c/reporte_por_articulos?nomart='+nomart+'');
		}else{
			alert('Por favor seleccione un articulo');	
		}
	});
	
	$('#reporTecnico').button({icons:{primary: "ui-icon-print" }}).on('click',function(){
		tecnico = $('#tecnico').val();
		nomtecnico = $("#tecnico option:selected").text();;
		if(tecnico!='' && tecnico!=null){
			window.open('<?php echo base_url(); ?>servicios_c/reporte_por_tecnico?tecnico='+tecnico+'&nomtecnico='+nomtecnico+'');
		}else{
			alert('Por favor seleccione un tecnico');	
		}
	});
});
</script>
<style>
*{margin:0; padding:0;}
#tabs{ font-size:12px;}
#sedes{ border: 1px solid #CCCCCC;
    border-radius: 3px;
    height: 25px;
    margin-left: 13px;
    margin-right: 10px;
    padding: 2px;
    width: 150px;}
#articulos{
	border: 1px solid #CCCCCC;
    margin-left: 5px;
    padding: 2px;
	font-size:12px;
    width: 250px;
}
.filtros{ font-weight: bold;
    margin-bottom: 25px;}
#fecha1,#fecha2{ border: 1px solid #CCCCCC;
    border-radius: 3px;
    padding: 3px;
    text-align: center;
	margin-left: 15px;
    width: 90px;}
#r_sedes{margin-right: 20px;}
#fechas{ margin-left: 10px;}
#tabla_todas_sedes tr td {
    font-size: 11px;
}
.parra{ margin-bottom: 12px; }
#tecnico{ border: 1px solid #ccc;
    margin-left: 5px;
    margin-right: 30px;
    padding: 3px;
    width: 375px;}
</style>
</head>
<body>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Reportes Por</a></li>
    <!--<li><a href="#tabs-2">Articulos</a></li>-->
  </ul>
  <div id="tabs-1">
 	  <form id="datos">
   	  <div class="filtros">
    	<p class="parra">Sedes <select id="sedes"><option value=""></option></select>
        <a href="javascript:void(0)" id="r_sedes">Excel</a>
         Articulos <input type="text" id="articulos"> <a href="javascript:void(0)" id="r_art">Excel</a>
        </p>
        <p class="parra">
        Fecha <input type="text" id="fecha1">&nbsp;&nbsp; a &nbsp;&nbsp; <input type="text" id="fecha2"> &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" value="fchasg" name="tipo_consulta"> Asignación&nbsp;&nbsp; 
        <input type="radio" value="fchcie"  name="tipo_consulta"> Cierre&nbsp;&nbsp;
        <a href="javascript:void(0)" id="fechas">Excel</a></p>
        <p class="parra">Tecnico  <select id="tecnico"></select>&nbsp;&nbsp; 
        <a href="javascript:void(0)" id="reporTecnico">Excel</a>
        </p>
     </div>  
     </form>
    <table id="tabla_todas_sedes" cellpadding="0" cellspacing="0" class="display" width="100%">
        <thead>
            <tr>
                <th width="8%"># Serv</th>
                <th width="22%">Articulo</th>
                <th width="20%">Problema</th>
                <th width="15%">F solicitud</th>
                <th width="15%">F Cierre</th>
                <th width="10%">Sede</th>
            </tr>
        </thead> 
        <tbody>
        
        </tbody>
    </table>
  </div>
</div>
</body>
</html>