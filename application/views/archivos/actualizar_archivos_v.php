<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sScrollY" : '320px',
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Archivos_c/consultarterceros/",
			"oLanguage": {"sUrl": "/recursos/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	function cerrar_editar(){
		$('#editar').dialog('close');
		//dtl();	
	}
$(document).ready(function(){
	dtl();
	
	$('#save_examen').button({icons:{primary:"ui-icon-disk"}}).on('click',function(){
		descripcion = $('#descripcion').val();
		valor = $('#valor').val();
		vencimiento =$('#vencimiento').val();

		$('#descripcion').focus(function(){$(this).css('background-color','#FFFFFF');});
		$('#valor').focus(function(){$(this).css('background-color','#FFFFFF');});
		$('#vencimiento').focus(function(){$(this).css('background-color','#FFFFFF');});

		if(descripcion!='' && valor!='' && vencimiento!=''){
			$.ajax({
				url:'/Examenes_c/agregar_examen',
				data:{'descripcion':descripcion,'valor':valor, 'vencimiento':vencimiento},
				type:"POST",
				success: function(resp){
					if(resp==0){ alert('Examen Agregado'); dtl(); $('#data_examenen')[0].reset(); } 
					else{ alert('Ocurrio un error, intentelo más tarde.'); }
				}	
			});
		}else{
			alert('No puede dejar campos vacios');	
			if(descripcion==''){
				$('#descripcion').css('background-color','#CC0000');	
			}
			if(valor==''){
				$('#valor').css('background-color','#CC0000');	
			}
			if(vencimiento==''){
				$('#vencimiento').css('background-color','#CC0000');	
			}
		}
	});
	
	 $('#tabla').on('click','.editar',function(){
		 codtrc = $(this).attr('data-cod');
		 nomtrc = $(this).attr('data-nom');
		 codcaj = $(this).attr('data-caj');
		 codest = $(this).attr('data-est');
		$('<iframe id="editar" frameborder="0" />').attr('src','/archivos_c/editar_archivos/'+codtrc+'/'+nomtrc+'/'+codcaj+'/'+codest+'').dialog({
					resizable:false, 
					modal: true,
					width:650, 
					height:200, 
					position:['middle',100],
					title: 'Actualizar Examen',
					close : function(v, ui){							
						$(this).remove();
					}
		}).width(650-10).height(200-20);	
	});
	
});
</script>
<style type="text/css">
</style>
</head>
<body>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Codigoo</th>
<th width="60%">Nombre</th>
<th width="10%">Caja</th>
<th width="10%">Est</th>
<th width="10%">Ver</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
</body>
</html>