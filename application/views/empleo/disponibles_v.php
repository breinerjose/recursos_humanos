<script type="text/javascript">
function dtl(){
		oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			 "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"ajax": {
									"url": "/pazysalvo/retirar_c/disponibles/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
								}
		});
	}	
	
	
$(document).ready(function() {
	dtl();	
	$('#hojadevida').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/imprimirhojadevida/'+cod,'','scrollbars=yes,width=960,height=700');
	 });
	 
	 $(document).on('click','.pdf<?php echo $ale;?>',function(){
			var token=$(this).attr('data-tok');	
			window.open('/Ver_c/Vista_hvid/'+token,'','scrollbars=yes,width=1000,height=650');
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
	 var codigo = $(this).attr('data-cod');
                                             $.ajax({
                                                url: "/pazysalvo_c/cambiarestado/",
                                                data: {'codigo':codigo},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){dtl();
													}else{
                                                    alert(datos.msg)
                                                    }
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
        </table>
    </div>    
</div>