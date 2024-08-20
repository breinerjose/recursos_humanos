<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consutar Paz Y Salvo</title>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="/recursos/css/tabla_css.css" type="text/css" />
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/recursos/js/fnReloadAjax.js"></script>
<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '360px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo_c/Estado_Empleados_PazySalvo/",
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	}	
$(document).ready(function(){
	dtl();
	
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
<style type="text/css">
#tabla .rvtir {
     background-color: #5cb85c;
    border-color: #4cae4c;
    color: #fff;
}
</style>
</head>

<body>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="15%">Identificación</th>
<th width="25%">Nombres y Apellidos</th>
<th width="10%">Estado</th>
<th width="10%">Acciones</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
<div id="informate" title="Confirmación" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b>Esta seguro que desea cambiar a Disponible?</b></p>
</div>
<div id="archivo_muerto" title="Confirmación" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b>Esta seguro que desea cambiar a Archivo Muerto?</b></p>
</div>
</html>