<script type="text/javascript">
function dtl(){
		oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			 "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"},
			"ajax": {
									"url": "/pazysalvo/retirar_c/consultarhojasdevidatodas/",
									"type": "POST"   ,
									"data":{"ale":"<?php echo $ale;?>"}             
								}
		});
	}	
	
$(document).ready(function() {	
			dtl();
	
	$('#hojadevida').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/imprimirhojadevida/'+cod,'','scrollbars=yes,width=1000,height=650');
	 });
	 
	 	$(document).on('click','.pdf<?php echo $ale;?>',function(){
			var token=$(this).attr('data-tok');	
			window.open('/Ver_c/Vista_hvid/'+token,'','scrollbars=yes,width=1000,height=650');
		});
	
	 $('#hojadevida').on('click','.mod',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/modificarhdv/'+cod,'','scrollbars=yes,width=1000,height=650');
	 });
	 
	  $('#hojadevida').on('click','.act',function(){
	   var cod = $(this).attr('data-cod');
	   $.ajax({
					url:'/pazysalvo/retirar_c/nopreseleccionado',
					data:{'cod':cod},
					type:"POST",
					success: function(resp){
						if(resp==1){
							dtl();
							}else{
							alert('Revisar la Informacion');
						}
					}	
				});
	 });
	 
	
});

</script>
</head>
<body>

<div id="contenido">
	<div id="tabla">
    	<table class="display" id="hojadevida" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="8%">Idd</th>
					<th width="28%">Nombres y Apellidos</th>
					<th width="22%">Profesion</th>
					<th width="20%">Cargos</th>
					<th width="3%">Sx</th>
					<th width="8%">Fecha</th>
					<th width="8%">Ver</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
			
        </table>
    </div>    
</div>
</body>
</html>