<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	var oTable;
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
$(document).ready(function() {	
	var asInitVals = new Array();
			dtl();
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
	   window.open('/pazysalvo/retirar_c/imprimirhojadevida/'+cod,'','scrollbars=yes,width=1000,height=650');
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
	 
	
	$('#buscar').click(function(e){
		e.preventDefault();
		
		var labor = ($('#labor').val()==''|| $('#labor').val()==null)?'0':$('#labor').val();//sede
		dtl(labor);
	});
	
});
 function dtl(){
 oTable = $('#hojadevida').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '350px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo/retirar_c/consultarhojasdevidatodas/",
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
 }
 
 

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
					<th width="23%">Cargos</th>
					<th width="8%">Fecha</th>
					<th width="8%">Ver</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
			 <tfoot align="center">
            <tr >
 				<th><input type="text" name="search_ID" value="ID" class="search_init" /></th>
				<th><input type="text" name="search_Nombre" value="Nombres y Apellidos" class="search_init" /></th>
				<th><input type="text" name="search_Profesion" value="Profesion" class="search_init" /></th>
				<th><input type="text" name="search_Cargos" value="Cargos" class="search_init" /></th>
				<th><input type="text" name="search_Fecha" value="Fecha" class="search_init" /></th>
				<th></th>
				<th></th>
			</tr>
			</tfoot>
        </table>
    </div>    
</div>
</body>
<div id="informate" title="Confirmación" style="display:none;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b>Esta seguro que desea revertir registro?</b></p>
</div>
</html>