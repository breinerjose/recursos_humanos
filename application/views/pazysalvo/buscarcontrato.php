<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador de Contratos</title>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="/recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="/recursos/jquery/css/blitzer/jquery-ui.custom.css"/>
<script type="text/javascript" src="/recursos/js/jquery.js"></script>
<script type="text/javascript" src="/recursos/jquery/js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="/recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
var oTable; var numid = '<?php echo $numid;?>';
function dtl(numid){
		oTable = $('#contratos').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": false,
			"sScrollY" : '160px',
			"sAjaxSource": "/pazysalvo/retirar_c/consultarcontratos/"+numid,
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	}	
$(document).ready(function(){
	dtl(numid);
	$('#contratos').on('click','.add',function(){
		var codigo = $(this).attr('data-cod');var empresa = $(this).attr('data-emp');
		var familia = $(this).attr('data-fam');var periodo = $(this).attr('data-per');
		var empresacli = $(this).attr('data-empc');var oficio = $(this).attr('data-ofi');
		window.parent.enviardatos(codigo, familia,empresa,periodo,empresacli, oficio);
		});

	
});
</script>
</head>
<body>
<?php
echo $nombre;
?>
<table id="contratos" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Contrato</th>
<th width="50%">Cargoo</th>
<th width="20%">Fecha Inicio</th>
<th width="10%">Familia</th>
<th width="10%"></th>
</tr>
</thead> 
<tbody>

</tbody>
</table>
</body>
</html>