<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
.datagrid table { 
	border-collapse: collapse; text-align: left; width: 100%; 
} 
.datagrid {
	background: none repeat scroll 0 0 #fff;
    border: 1px solid #991821;
    border-radius: 3px;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 11px;
	max-height: 310px;
    overflow-y: auto;
}

.datagrid table td, .datagrid table th { padding: 3px 10px; }

.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #991821), color-stop(1, #80141C) );background:-moz-linear-gradient( center top, #991821 5%, #80141C 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#991821', endColorstr='#80141C');background-color:#991821; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #B01C26; } 

.datagrid table thead th:first-child { border: none; }

.datagrid table tbody td { color: #80141C; border-left: 1px solid #F7CDCD;font-size: 12px;font-weight: normal; }

.datagrid table tbody .alt td { background: #F7CDCD; color: #80141C; }

.datagrid table tbody td:first-child { border-left: none; }

.datagrid table tbody tr:last-child td { border-bottom: none; }

.datagrid table tfoot td div { border-top: 1px solid #991821;background: #F7CDCD;} 

.datagrid table tfoot td { padding: 0; font-size: 12px } 

.datagrid table tfoot td div{ padding: 2px; }

.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }

.datagrid table tfoot  li { display: inline; }

.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #991821;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #991821), color-stop(1, #80141C) );background:-moz-linear-gradient( center top, #991821 5%, #80141C 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#991821', endColorstr='#80141C');background-color:#991821; }

.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #80141C; color: #FFFFFF; background: none; background-color:#991821;}

div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
#descargar{    padding-right: 15px;
    text-align: right; }
#excel{    font-size: 12px;
    margin-top: 10px; }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
//excel
$(document).ready(function() {
	
	$('#excel').attr('ide','<?php echo $codsrv; ?>');
	
    $('#excel').button({icons: {primary: "ui-icon-print"}}).on('click',function(){
		codsrv = $(this).attr('ide');
		window.open('<?php echo base_url(); ?>servicios_c/repoteServReasginado?codsrv='+codsrv+'');
	});
});
</script>
</head>
<body>

<div class="datagrid">
	<table>
		<thead>
        	<tr>
            	<th>ID</th>
                <th>Articulo</th>
                <th>Usuario que agreg&oacute;</th>
                <th>Tecnico</th>
            	<th>Estado</th>
                <th>Fecha de registro</th>
                <th>Fecha de asignaci&oacute;n</th>
                <th>Problema</th>                
                <th>Observaci&oacute;n</th>
                <th>Sede</th>
            </tr>
        </thead>
		<tfoot>
		<tbody>
        	<?php 
				if(isset($detalle)){
					if($detalle!=false){
						$c=1;
						foreach($detalle as $row){
							if($c%2==0){
								echo "<tr>
										<td>".$row['codsrv']."</td>
										<td>".$row['nomart']."</td>
										<td>".$row['n1']."</td>
										<td>".$row['n2']."</td>
										<td>".$row['stdsrv']."</td>
										<td>".$row['addfch']."</td>
										<td>".$row['fchasg']."</td>
										<td>".$row['problema']."</td>                
										<td>".$row['obsasg']."</td>
										<td>".$row['nomsed']."</td>
									 </tr>";	
							}else{
								echo "<tr class='alt'>
										<td>".$row['codsrv']."</td>
										<td>".$row['nomart']."</td>
										<td>".$row['n1']."</td>
										<td>".$row['n2']."</td>
										<td>".$row['stdsrv']."</td>
										<td>".$row['addfch']."</td>
										<td>".$row['fchasg']."</td>
										<td>".$row['problema']."</td>                
										<td>".$row['obsasg']."</td>
										<td>".$row['nomsed']."</td>
									 </tr>";
							}
							$c++;
						}
					}else{
						echo "<tr>
							<th colspan='10'>No se encontro informaci&oacute;n</th>
						  </tr>";		
					}
				}else{
					echo "<tr>
							<th colspan='10'>Ocurrio un error, porfavor cierre e inicie sesión.</th>
						  </tr>";	
				}
			?>
		</tbody>
	</table>
</div>
<div id="descargar">
	<a href="javascript:void(0)" id="excel">Descargar</a>
</div>

</body>
</html>