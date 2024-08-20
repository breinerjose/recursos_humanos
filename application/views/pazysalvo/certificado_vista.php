<script type="text/javascript">
jQuery.validator.messages.required = "";
function datoCesasion(codigo){
	$('#bcesasion').dialog('close');
	$('#numero').val(codigo);
}
$(document).ready(function() {
    $('.imprimir').button({
		icons:{primary:"ui-icon-print"}
	}).on('click', function(){
		var cod = $('#numero').val();
		var fecha = $('#fchemi').val();
		if($("form#buscar").validate().form()){
				window.open('/pazysalvo/retirar_c/datosCertificado/'+cod+'/'+fecha,'','scrollbars=yes,width=1000,height=750');
		}else{
			alert('Campos Pendientes por llenar');	
		}
		});
		
	  $('.fijo').button({
		icons:{primary:"ui-icon-print"}
	}).on('click', function(){
		var cod = $('#numero').val();
		var fecha = $('#fchemi').val();
		if($("form#buscar").validate().form()){
				window.open('/pazysalvo/retirar_c/CartaExamenesRetiro/'+cod+'/'+fecha,'','scrollbars=yes,width=1000,height=750');
		}else{
			alert('Campos Pendientes por llenar');	
		}
		});
	
	$('#fchemi').datepicker({
	  format: 'yyyy-mm-dd',
	  autoclose: true
	});
	
	$('.buscarces').button({
		icons:{primary:"ui-icon-search"}
	}).on('click',function(){
	$('<iframe id="bcesasion" frameborder="0" />').attr('src','/pazysalvo/retirar_c/vista/consultarCesasiones').dialog({
				resizable:false, 
				modal: true,
				width:600, 
				height:300, 
				title: 'Consultar Cesasiones Laborales',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(600-25).height(300-25);	
	});

});
</script>
<style type="text/css">
.error{border-color:#223B8D;background:#FCBE80;}
.txt, .txt1{
	width:200px;
	padding:3px;
	height:22px;
  }
 .txt1{width:330px;}
.bimg{
vertical-align:middle;
cursor:pointer;
}
</style>
</head>
<body>
<form id="buscar" name="buscar" method="post">
    <p>
    <span>Fecha de Emición</span><br>
    <input type="text" id="fchemi" name="fchemi" class="txt required" readonly/>
    <a href="#" class="buscarces" title="Consultar">Buscar</a>
   </p>
	<p>
    <span>Codigo Contrato</span><br>
    <input type="text" id="numero" name="numero" class="txt1 required number" />
   </p>	
   <a href="#" class="imprimir">Imprimir Certificado Cesacion Laboral</a>
   <br><br><a href="#" class="fijo">Carta Examen Retiro</a>
</form>
</body>
</html>