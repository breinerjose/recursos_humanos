<script type="text/javascript">
$(document).ready(function(){
			window.open('https://asapaseco.fullred.net/pazysalvo/retirar_c/editar_hvida/','','scrollbars=yes');
}); 
$('#buscarcont').button({
		icons:{primary:"ui-icon-search"}
	}).on('click',function(){
		var codigo = $('#numero').val();
		if(codigo!=''){
		window.open('https://asapaseco.fullred.net/pazysalvo/retirar_c/c_hvida/'+codigo,'','scrollbars=yes');
		}else{
			alert('Debe digitar Identificación');
			$('#numid').css('background','#ccc');	
		}
	});
	
	 $('#procesar').click(function(){  
		window.open('https://asapaseco.fullred.net/pazysalvo/retirar_c/editar_hvida/','','scrollbars=yes');
	});
</script>	
<form id="buscar" name="buscar" method="post">
    <p>
    <span>Digite Cedula de la Persona Luego Clic en Boton Buscar </span><br>
    <input type="text" id="numero" name="numero" class="txt required" />
	<button class="btn btn-success" id="buscarcont"><i class="fa fa-plus"></i> Buscar Empleado</button>
   </p>
  </form> 
  	<button class="btn btn-primary" id="procesar"><i class="fa fa-plus"></i> Procesar Solicitudes</button>