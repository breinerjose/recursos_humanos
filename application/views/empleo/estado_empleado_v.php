<script type="text/javascript">
jQuery.validator.messages.required = "";
$(document).ready(function() {
    $('.borrar').button({
		icons:{primary:"ui-icon-disk"}
	}).on('click', function(){
		var codigo = $('#numero').val();
		if(codigo!=''){
			if(!confirm("Esta seguro eliminar el registro")) {return false;} 
              else {   
					 $.post('/pazysalvo/retirar_c/borrarPazysalvo',{'numero':codigo},function(resp){
						  if(resp == '1'){
							 alert('Registro eliminado Satisfactoriamente');
							 location.reload();
						  }else{
							 alert('Error al eliminar registro');
						  }
						},'json');
			  }
		}else{
			alert('Codigo del contrato esta vacio y/o No coincide con los datos del detalle');
			$('#numero').css('background','#E9E9E9');
		
		}
	});
	
$('.buscarcont').button({
		icons:{primary:"ui-icon-search"}
	}).on('click',function(){
		var codigo = $('#numero').val();
		if(codigo!=''){
		 $.post('/Empleos_c/consultarestado',{'numero':codigo},function(resp){
			  if(resp == '1'){
				 alert('No Existen datos relacionados a esta Persona. Verifique por favor...');
				 $('#numero').val('');
				 $('#fie').html('');
				 $('.borrar').button ("disable");
				 $('#fie').css('display','none'); 
			  }else{
				 $('#fie').css('display','block');
				 $('.Nombres').html(resp.nombres);
				 $('.Estado').html(resp.estado);
				 $('.FechaSolicitud').html(resp.fechasolicitud);
			  }
			},'json');
		}else{
			alert('Debe digitar Identificación');
			$('#numid').css('background','#ccc');	
		}
	});
   
   $('.borrar').button ("disable");
});
</script>
<style type="text/css">
.error{border-color:#223B8D;background:#FCBE80;}
.txt, .txt1{
	width:300px;
	padding:3px;
	height:22px;
  }
 .txt1{width:430px;}
.bimg{
vertical-align:middle;
cursor:pointer;
}
#nombres{background:#F0F0F0;}
#fie{}
.det{
	color:#900;
	font-weight:bold;
	font-size:13px;
}
.texto{padding:0.25em; font-size:16px; font-weight:bold;}
#fie{display:none;}
</style>
</head>
<body>
<form id="buscar" name="buscar" method="post">
    <p>
    <span>Digite Cedula de la Persona Luego Clic en Boton Buscar </span><br>
    <input type="hidden" id="num1" name="num1" readonly />
    <input type="text" id="numero" name="numero" class="txt required" placeholder="Digite Numero de Identificacion"/>
    <a href="#" class="buscarcont" title="Consultar">Buscar</a>
   </p>
	<p>
    <div id="fie">
   <fieldset>
   		<legend class="det">Detalles de La Persona</legend>
        <div>
            <span class="texto">Nombres:</span>&nbsp;<span class="Nombres"></span><br><br>
            <span class="texto">Estado:</span>&nbsp;<span class="Estado"></span>&nbsp;&nbsp;
			<span class="texto">Fecha Solicitud:</span>&nbsp;<span class="FechaSolicitud"></span>&nbsp;&nbsp;
        </div>
   </fieldset>
   </p>	
   </div>
</form>