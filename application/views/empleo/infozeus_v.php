<script type="text/javascript">
function dtl(){
		oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			 "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"ajax": {
									"url": "/pazysalvo/retirar_c/infozeus/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
								}
		});
	}	
	
$(document).ready(function() {
	dtl();
	
	$('#hojadevida').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/infozeusprint/'+cod,'','scrollbars=yes,width=960,height=400');
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
	<div id="tabla">
    	<table class="display" id="hojadevida" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="10%">Id</th>
					<th width="20%">Nombres y Apellidos</th>
					<th width="22%">Telefono1</th>
					<th width="26%">Telefono2</th>
					<th width="12%">Ver</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>    
</div>