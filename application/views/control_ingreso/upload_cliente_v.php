<script type="text/javascript">
 $('#importar').click(function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "/Control_Ingreso_c/importar/";
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
</script>
<div class="container" style="padding-top: 1em;">
<h3>Cargar Archivo Huellero</h3>
<form role="form" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
    <div class="form-group">
      <label for="nombre"></label>
      <input type="hidden" class="form-control" id="sw" name="sw" value="1">
    </div>
    
 <div class="form-group">
      <label for="registro">Adjuntar Eventos Archivo </label>
      <input type="file" id="registro" name="registro">
 </div>
   
   <button type="button" id="importar" class="btn btn-success"><i class="fa fa-save"></i> Guardar </button>
  </form>
</div>