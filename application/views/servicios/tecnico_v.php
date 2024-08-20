<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Servicio a Tercero</title>
<link rel="stylesheet" href="<?php echo base_url();?>/recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css" />
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_page.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/js/datatables/media/css/demo_table.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/css/tabla_css.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/recursos/js/jquery-1.8.2.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/recursos/jquery/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/recursos/js/validate/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery.validator.messages.required = "";
jQuery.validator.messages.digits = "";

function dtl(){
	oTable = $('#tabla_tecnicos').dataTable( {
		"bProcessing": true,
		"bDestroy" : true,
		"bPaginate": true,
		"sScrollY" : '230px',
		"sPaginationType": "full_numbers",
		"sAjaxSource": "<?php echo base_url(); ?>tecnico_c/obtener_tecnicos/",
		"oLanguage": {"sUrl": "<?php echo base_url(); ?>recursos/js/datatables/media/language/espanol.txt"}
	});
}	

function datos_user(coduser,nomuser){
	$('#buscar_usuarios').dialog('close');
	$('#user').val(nomuser);
	$('#user').attr('ide_usu',coduser);
	$('#btn_buscar1').button("enable");
}

$(document).ready(function() {
	
	$('#retirar')[0].reset();
	
	$('#tabs').tabs();
	
	dtl();
	
	$('.buscar1').button({
		icons:{primary:"ui-icon-search"}	
	}).on('click',function(){
		$('<iframe id="buscar_usuarios" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/vista/todos_usuarios').dialog({
				resizable:false, 
				modal: true,
				width:740, 
				height:300, 
				title: 'Usuarios',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(740-25).height(300-25);	
	});	
	
	$('.boton').button({
		icons:{primary:"ui-icon-disk"}	
	}).on('click',function(){
		user = $('#user').attr('ide_usu');
		if(user!='' && $('#user').val()!=''){
			$.post('<?php echo base_url(); ?>tecnico_c/agregar_tecnico',{'ide':user},function(resp){
				if(resp==1){
					dtl();
					$('#retirar')[0].reset();		
				}else{ alert('Ocurrio un error, intente más tarde.'); }
			});
		}else{
			alert('No puede dejar campos vacios.');	
		}
	});	
	
	$('#tabla_tecnicos').on('click','.Eliminar',function(){
		ide = $(this).attr('data-cod');
		$.post('<?php echo base_url(); ?>tecnico_c/eliminar_tecnico',{'ide':ide},function(resp){
			if(resp==1){
				dtl();
				$('#retirar')[0].reset();		
			}else{ alert('Ocurrio un error, intente más tarde.'); }
		});
	});		
	
}); 
</script>
<style type="text/css">
body{ font-size: 15px;  }
.error{border-color:#223B8D;background:#FCBE80;}
a{ text-decoration:none; }
#retirar p{padding:0.25em;margin:0.3em;}
#user{  background-color: #ccc;
margin-left: 5px;
    margin-right: 12px;
    padding: 5px;
    width: 380px; }
#retirar .buscar1,#retirar .boton{font-size: 12px;}
#tabla{margin-top: 20px;}
</style>
</head>
<body>
<div id="tabs">
	<ul>
        <li><a href="#tabs-1">Registrar tecnico</a></li>
    </ul>
  <div id="tabs-1">
    <form id="retirar" name="retirar" method="post" enctype="multipart/form-data">
      <p><span>Tecnico </span>
      <input type="text" name="user" id="user" class="campo required" readonly />&nbsp;
      <a href="#" class="buscar1">Buscar</a>
      &nbsp;
   	  <a href="#" class="boton">Guardar</a>  
      </p>
    </form>
    <div id="tabla">
    <table id="tabla_tecnicos" cellpadding="0" cellspacing="0" class="display" width="100%">
        <thead>
        <tr>
        <th width="20%">ID</th>
        <th width="73%">Nombre</th>
        <th width="7%"></th>
        </tr>
        </thead> 
        <tbody>
        
        </tbody>
    </table>
    </div>
  </div>

</div>
</body>
</html>