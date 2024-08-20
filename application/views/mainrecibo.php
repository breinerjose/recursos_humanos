<h1 align="justify" class="btn btn-warning">Informamos que los volantes de Pago</br>pueden ser descargados en el Horario de</br>
Lunes a Viernes de 8:00Am a 10:00Pm</br>
y Sabados de 8:00Am a 4:00Pm</h1>
</br>
<?php $h = date('H');  $d = date('N');
if(($d < 6 and $h > 8 and $h < 23) or ($d == 7 and $h > 8 and $h < 17)) {
?>
<a href="http://asapaseco.linkpc.net:82/login_c/recibos_pago/<?php echo $this->session->userdata('user')?>" target="_blank">Clic Aqui Para Ver El Listado de Recibos de Pago</a>
<?php } ?>