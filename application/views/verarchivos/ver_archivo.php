<?php
require('config.php');
$sql = "SELECT token FROM archivos WHERE id_consentimiento='$id_consentimiento' AND id_examen='$id_examen' AND id_exa_hist='$id_exa_hist' and stdarc='activo'";
$rsql = $con->query($sql);
$cant = mysqli_num_rows($rsql);
if ($cant == 0){echo "Resultado Pendiente"; exit();}
$rw = mysqli_fetch_array($rsql);
extract($rw);
$token=$token.".pdf";
$servidor_ftp = "asapaseco.com";
$conexion_id = ftp_connect($servidor_ftp);
$ftp_usuario = "asapasec";
$ftp_clave = "Danna73214641++";
$ftp_carpeta_remota= "/archivos/";
$resultado_login = ftp_login($conexion_id, $ftp_usuario, $ftp_clave);
if ((!$conexion_id) || (!$resultado_login)) {
echo "La conexion ha fallado! al conectar con $servidor_ftp para usuario $ftp_usuario";
exit;
}
ftp_chdir($conexion_id, $ftp_carpeta_remota);

//// intenta descargar $server_file y guardarlo en $local_file
if (ftp_get($conexion_id, $token, $token, FTP_BINARY)) {
    //echo "Se ha guardado satisfactoriamente en $local_file\n";
} else {
    //echo "Ha habido un problema\n";
}
//ftp_close($conexion_id); 
$data['file'] = $token;
$this->load->view('laboratorio/examenesvarios/view_file',$data);
?>