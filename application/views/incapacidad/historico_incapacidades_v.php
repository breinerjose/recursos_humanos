<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/res/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" language="javascript" src="/res/vendors/jquery/dist/jquery.js"></script>
<script type="text/javascript" language="javascript" src="/res/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="/res/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
var oTable; 
var cod = '<?php echo $codinc;?>';
function dtl(codigo){
		oTable = $('#paginasuser').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": false,
			"sScrollY" : '280px',
			"sAjaxSource": "/incapacidades_c/historicoincapacidades/"+codigo,
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
$(document).ready(function(){
	dtl(cod);
});
</script>
<style type="text/css">
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
.actualizar{font-size:12px;}
.nm{font-size:14px;color:#223B8D;font-weight:bold;}
</style>
</head>
<body>
<fieldset>
    <table id="paginasuser" cellpadding="0" cellspacing="0" class="display" width="100%">
        <thead>
            <tr>
                <th width="30%">Fecha Registro</th>
                <th width="30%">Id. Usuario</th>
                <th width="50%">Estado</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</fieldset>
</body>
</html>