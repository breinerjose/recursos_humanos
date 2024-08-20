<?
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=informe-examenes.xls");
header("Pragma: no-cache");
header("Expires: 0");?>
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asapaseco/recursos/js/jquery.js"></script>
<script>
$(document).ready(function() {
    $('#tabla_reporte').on('click','.reimprimir',function(e){
		e.preventDefault();
		id = $(this).attr('id');
		window.open('/asapaseco/ordenes_c/imprimirordenhseq/'+id, "_blank", 'toolbar=yes, scrollbars=yes, resizable=yes,top=100, left=100,  width=965, height=480');
		
	});
});
</script>
</head>
<body>
<?php echo $tabla; ?>
</body>
</html>