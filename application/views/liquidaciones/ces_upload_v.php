<script type="text/javascript">
 $('#importar').click(function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "/Liquidaciones_c/importar_cesantias/";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(ans)
                { 
				 if(ans.err=='1'){
                                       toastr.success('Archivo Procesado Satisfactoriamente');  				   
                } else toastr.error('Se encontraron errores en el Archivo');
				 $('form#formulario').get(0).reset();
			  }	
            });
		 });

function dtl(){
		oTable = $('#cesantias').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Liquidaciones_c/cesantias/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}
			
$(document).ready(function(){
	dtl();
});		 
</script>
<div class="container" style="padding-top: 1em;">
<form role="form" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
    <div class="form-group">
      <label for="nombre"></label>
      <input type="hidden" class="form-control" id="sw" name="sw" value="1">
    </div>
    
 <div class="form-group">
      <label for="foto">Adjuntar Archivo </label>
      <input type="file" id="archivo_cesantias" name="archivo_cesantias">
 </div>
   
   <button type="button" id="importar" class="btn btn-success"><i class="fa fa-save"></i> Guardar </button>
  </form>
</div>
<table id="cesantias" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="20%">Identificac&oacute;n</th>
<th width="20%">Valor</th>
<th width="20%">Empresa</th>
<th width="20%">Fondo</th>
<th width="20%">Fecha</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>