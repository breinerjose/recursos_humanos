<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="/recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/fnReloadAjax.js"></script>
<script type="text/javascript">
	var oTable;
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
$(document).ready(function() {
	var asInitVals = new Array();
	oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '350px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo/retirar_c/disponibles/",
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	
	$("tfoot input").keyup( function () {
							/* Filter on the column (the index) of this element */
							oTable.fnFilter( this.value, $("tfoot input").index(this) );
						} );
						$("tfoot input").each( function (i) {
							asInitVals[i] = this.value;
						} );
		
						$("tfoot input").focus( function () {
							if ( this.className == "search_init" )
							{
								this.className = "";
								this.value = "";
							}
						} );
		
						$("tfoot input").blur( function (i) {
							if ( this.value == "" )
							{
								this.className = "search_init";
								this.value = asInitVals[$("tfoot input").index(this)];
							}
						} );
	
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
	
	$('#tabla').on('click','.rvtir',function(){
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
                                                url: "/pazysalvo_c/cambiarestado/",
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
#tabla .rvtir {
     background-color: #5cb85c;
    border-color: #4cae4c;
    color: #fff;
}
</style>
</head>
<body>

<div id="contenido">
	<div id="tabla">
    	<table class="display" id="hojadevida" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="8%">Id</th>
					<th width="20%">Nombres y Apellidos</th>
					<th width="22%">Profesion</th>
					<th width="26%">Cargos</th>
					<th width="8%">Estado</th>
					<th width="16%">Ver</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
			 <tfoot align="center">
            <tr >

               							<th width="8%"><input type="text" name="search_ID" value="ID" class="search_init" /></th>
										<th width="20%"><input type="text" name="search_Nombre" value="Nombres y Apellidos" class="search_init" /></th>
										<th width="22%"><input type="text" name="search_Profesion" value="Profesion" class="search_init" /></th>
										<th width="26%"><input type="text" name="search_Cargos" value="Cargos" class="search_init" /></th>
										<th width="8%"></th>
										<th width="16%"></th>
									 </tr>
							</tfoot>
        </table>
    </div>    
</div>
</body>
<div id="informate" title="Confirmación" style="display:none;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b>Esta seguro que desea enviar a archivo muerto?</b></p>
</div>
</html>