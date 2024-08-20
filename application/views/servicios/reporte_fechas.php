<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
var fecha1 = '<?php echo $fecha1; ?>';
var fecha2 = '<?php echo $fecha2; ?>';
var tipo_consuta = '<?php echo $tipo_consuta; ?>';
$(document).ready(function() {
    $('.genXLS').button({
	    icons:{primary:"ui-icon-document"}
	 }).click(function(){
		 window.open('<?php echo base_url(); ?>servicios_c/reporte_fechas2/'+fecha1+'/'+fecha2+'/'+tipo_consuta);	
		 
                        /*var table = '<table class="report" cellspacing="0" cellpadding="0" border="1"></thead>'+$('#reporte').html()+'<tbody></tbody></table>';
                        var a = $('body').append('<a class="shoot" href="data:application/vnd.ms-excel,'+unescape(encodeURIComponent(escape(table)))+'" download="Listado de Articulos por fecha.xls"></a>').find('a.shoot')[0];
                        a.click();
                        $(a).remove();*/
               });
});
</script>
<style type="text/css">
table.report tr td{font-size:13px;}

table.report
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
table.report thead tr.cabec{
    background-color: #CC0000;
    color:white;
}
table.report th a{
   color:white;
}
table.report tr.odd
{
    background-color: #FFE8E8;
}

table.report tr.noDataRow td {
    text-align: center;
}

table.report table th.title
{
    text-align: center;
}


table.report th,td
{
    text-align: left;
    padding: 10px;
}

table.report td
{
    height: 1.6em;
    padding: 0 0.5em;
	border:1px dashed #CCCCCC;
}

table.report td.editable
{
    width: 200px;
    height: 22px;
}

table.report th.sortable
{
    cursor: pointer;
}

table.report tr.loading {
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
table.report td.loading
{
    background:url(../../../recursos/images/loading.gif) no-repeat 4px center;
    padding-left: 24px;
    color: #aaaaaa;
    width: 176px;
}
</style>
</head>

<body>
<p>
<a href="#" class="genXLS" title="Descargar Informe">Generar Excel</a>
</p>
<table id="reporte" cellspacing="0" cellpadding="0" width="100%" class="report">
	<thead>
    	<tr>
        	<th rowspan="2" style="text-align:center;"><img src="<?php echo base_url(); ?>/recursos/images/logo.png" width="100"/></th>
            <th colspan="4"  style="text-align:center; font-size:18px;">ALMACEN BC S.A</th>
            
        </tr>
        <tr>
        	<th colspan="4"  style="text-align:center;">Dirección - Telefono</th>
        </tr>
        <tr class="cabec">
        	<th width="15%">Nro. Servicio</th>
            <th width="25%">Nombre Articulo</th>
            <th width="25%">Problema</th>
            <th width="25%">Solución</th>
            <th width="10%">Sede</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
		   if(isset($datos)){
			   if($datos!=''){
				   foreach($datos as $res){
					   echo '<tr>';
					   		echo '<td>'.$res['codsrv'].'</td>';
							echo '<td>'.$res['nomart'].'</td>';
							echo '<td>'.$res['problema'].'</td>';
							echo '<td>'.$res['solsrv'].'</td>';
							echo '<td>'.$res['nomsed'].'</td>';
					   echo '</tr>';
					}
				}else{
					echo '<tr><h2>No hay datos Para mostrar</h2></tr>';	
				}
		   }
		
		?>
    </tbody>
</table>
</body>
</html>