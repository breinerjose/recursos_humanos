<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '320px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Archivos_c/folder_entregar/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
$(document).ready(function(){
	dtl();
	
	$('#tabla').on('click','.rvtir',function(){
        var codigo = $(this).attr('data-id');

                                             $.ajax({
                                                url: "/Archivos_c/entregar/",
                                                data: {'codigo':codigo},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    $('.ui-dialog').remove();
                                                    dtl();
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
                   
    });
});
</script>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="8%">Id Empleado</th>
<th width="31%">Nombre Empleado</th>
<th width="8%">Solicitante</th>
<th width="15%">Fecha Solicitud</th>
<th width="15%">Entregar</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>