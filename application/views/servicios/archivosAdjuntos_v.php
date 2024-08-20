<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<style>
*{ margin:0; padding:0; }

#imagenes{margin: 10px auto 0;
    width: 500px;}

#imagenes img{border: 2px solid #CCCCCC;
    border-radius: 3px;
    height: 293px;
    margin-bottom: 20px;
    width: 480px;}
</style>
</head>
<body>

<?php
	$datosAdjuntos = $imagenes;
	if($datosAdjuntos==false){
		echo " EL SERVICIO NO CONTIENE ARCHIVOS ADJUNTOS.";	
	}else{
		$ruta = "".base_url()."recursos/img_servicios/".$addusr."/";
		echo '<div id="imagenes">';
		$datos = explode(',',$datosAdjuntos[0]['imgs']);
			
		for($i=0; $i<count($datos)-1; $i++){
			echo '<p><img src="'.$ruta.$datos[$i].'"></p>';
		}
		echo '</div>';
	}
?>
</body>
</html>