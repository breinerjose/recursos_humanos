<!DOCTYPE html PUBLIC><head>
<meta charset="utf-8" />
</head>
<style>
*{ margin:0; padding:0;}
body{ font-size:12px; font-family:Arial, Helvetica, sans-serif;}
#historial{  margin: 0 auto;
    width: 455px;}
#historial .msg{border-bottom: 1px solid #CCCCCC;
    margin-bottom: 14px;
    text-align: justify;}
#historial .msg .nomusu{
    font-size: 12px;
    font-weight: bold;}
#historial .msg .fecha{}
#comentario{ font-weight: bold;
    margin: 5px auto 0;
    padding: 2px;
    width: 455px;}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/jquery/css/blitzer/jquery-ui-1.10.3.custom.css"/>
<script type="text/javascript" src="<?php echo base_url();?>recursos/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    codsrv = '<?php echo $codsrv; ?>';
	usuario = '<?php echo $this->session->userdata('identificacion');  ?>';
	perfil = '<?php echo $this->session->userdata('perfil');  ?>';
	$.ajax({
		url:'<?php echo base_url(); ?>servicios_c/mensaje_leido',
		type:"POST",
		data:{'codsrv':codsrv,'usuario':usuario,'perfil':perfil}	
	});
	
	$('#historial').on('click','.obsrv',function(){
		cod = $(this).attr('codsrv');
		$('<iframe id="obsrv2" frameborder="0" />').attr('src','<?php echo base_url(); ?>servicios_c/obsrCerrado/'+cod).dialog({
			resizable:false, 
			modal: true,
			width:400, 
			height:230, 
			title: 'Observación servicio cerrado',
			position:['middle',10],
			close : function(v, ui){							
				(this).remove();
			}
		}).width(400-25).height(230-25);	
	});
});
</script>
<body>
<div id="historial">
	<?php 
		if($detalle!=''){
			foreach($detalle as $row){
				echo '
					 <div class="msg">
						   <p><span class="nomusu">'.$row["addfch"].' - '.$row["nombres"].'</span></p>
						  <p>
							<span class="mensaje">'.$row["descri"].'</span></p>
					</div>
				';
			}
		}else{
			echo "<div id='comentario'>El servicio seleccionado no contiene comentario</div>";	
		}
	?>  
   
</div>
</body>
</html>