<?php 
header('Content-type: application/pdf');// esta linea fue mi dolor de cabeza
header('Content-Disposition: inline; filename="' . $archivo. '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($archivo));
header('Accept-Ranges: bytes');
@readfile($archivo);