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
			"sAjaxSource": "/pazysalvo/retirar_c/consultarcontratosinactivo/"+numid,
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
<!--<style type="text/css">
table.display tr td{font-size:13px;}

table.display
{
    font-size: 0.9em;
    margin: 0 auto;
    background-color: #ffffff;
    box-shadow:black 1px 1px 5px;
    border-collapse: collapse;
     /* hack IE8 */
    border-collapse: collapse \0/;
    border-right: 2px inset #D3D3D3 \0/;
    border-bottom: 2px inset #D3D3D3 \0/;
     /* hack IE7 */
    *border-collapse: collapse;
    *border-right: 2px inset #D3D3D3;
    *border-bottom: 2px inset #D3D3D3;
}
table.display thead tr{
    background-color: #CC0000;
    color:white;
}
table.display th a{
   color:white;
}
table.display tr.odd
{
    background-color: #FFE8E8;
}

table.display tr.noDataRow td {
    text-align: center;
}

table.display table th.title
{
    text-align: center;
}


table.display th,td
{
    text-align: left;
    padding: 10px;
}

table.display td
{
    height: 1.6em;
    padding: 0 0.5em;
	border:1px dashed #CCCCCC;
}

table.display td.editable
{
    width: 200px;
    height: 22px;
}

table.display th.sortable
{
    cursor: pointer;
}

table.display tr.loading {
    color: #dddddd;
    background-color: #f6f6f6;
}

tr.odd td.sorting_1 {
    background-color: #FCABAB;
    margin: 0.25em;
    padding: 0.25em;
}

tr.even td.sorting_1 {
    background-color: #F9DBDB;
    margin: 0.25em;
    padding: 0.25em;
}
table.display td.loading
{
    background:url(../../../recursos/images/loading.gif) no-repeat 4px center;
    padding-left: 24px;
    color: #aaaaaa;
    width: 176px;
}
</style>-->
</head>

<body>
<?php
echo $nombre;
?>
<table id="contratos" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Contratoo</th>
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