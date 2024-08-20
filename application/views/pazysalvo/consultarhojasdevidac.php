<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="/recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<link rel="stylesheet" href="/recursos/chosen/chosen.css" />
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="/recursos/chosen/chosen.jquery.js"></script>
<script type="text/javascript">
	var oTable;
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	function dtl(labor){
		oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '350px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo/retirar_c/consultarhojasdevidac/"+labor,
			"oLanguage": {"sUrl": "/asapaseco/recursos/js/datatables/media/language/espanol.txt"}
		});
	}
	
$(document).ready(function() {
	
	dtl();
	
	$('#hojadevida').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/imprimirhojadevida/'+cod,'','scrollbars=yes,width=960,height=700');
	 });
	 
	 $('#hojadevida').on('click','.mod',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/modificarhdv/'+cod,'','scrollbars=yes,width=1000,height=700');
	 });
	  $('#hojadevida').on('click','.act',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/nopreseleccionado/'+cod,'','scrollbars=yes,width=600,height=100');
	 });
	 
	
	$('#buscar').click(function(e){
		e.preventDefault();
		
		var labor = ($('#labor').val()==''|| $('#labor').val()==null)?'0':$('#labor').val();//sede
		dtl(labor);
	});
	
});
</script>
<style>
body{ font-family: 'Capriola',sans-serif;  font-size:12px}
*{ margin:0; padding:0; }
#ui-datepicker-div{ font-size:11px;}
.ui-autocomplete { font-size:12px;}
#formulario{
    height: 130px;
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

.imprimirLocal > img{
	height:21px;
}
.imprimirNif > img{
	height:21px;
}
.imprimirCheque > img{
	height:21px;
}
</style>
</head>
<body>

<div id="contenido">
	<div id="formulario">
    	<form id="datos">
         	<fieldset>
            	<legend>Opciones de busqueda por Labor:</legend>
            	<p>
                 <span class="line"></span>
                 <input name="labor" type="text" id="labor" size="70" maxlength="70"> 
            </p>			
					 <p align="center">
              <button id="buscar"><img src="/asapaseco/recursos/iconos/buscar.png"/> Buscar</button>
                    </p>
          </fieldset>
        </form>
    </div>
	<div id="tabla">
    	<table class="display" id="hojadevida" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="10%">Id</th>
					<th width="30%">Nombres y Apellidos</th>
					<th width="38%">Cargos</th>
					<th width="10%">Estado</th>
					<th width="12%">Ver</th>
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
</html>