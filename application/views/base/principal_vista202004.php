<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asap Aseco</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../res/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../res/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="../res/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../res/build/css/custom.min.css" rel="stylesheet">
    <link href="../res/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../res/bootstrap/css/bootstrap-chosen.css" rel="stylesheet">
    <link href="../res/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<link href="../res/vendors/jquery.validationEngine/validationEngine.jquery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../res/js/bootstrap-datepicker.min.css" />   <link rel="stylesheet" href="/res/js/toastr/toastr.min.css"/>
	<link rel="stylesheet" type="text/css" href="/res/js/bootstrap.switch/bootstrap-switch.css" />
	<link href="/res/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="/res/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="/res/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet"> 
 <link rel="stylesheet" type="text/css" href="/res/css/adminlte.css" />
 
    <style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
.form-group .error {
    border-color: #3D7BCF;
    background: #DFEEFF;
}
label.error {
    display: none !important;
}
    </style>
</head>
  <body >
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Asap  Aseco</span></a>
            </div>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
				<?php echo $menu; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
               <li><a href="logout"><i class="fa fa-sign-out pull-right"></i>Salir</a></li>
                      <div class="text-center">
                        <a>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
  </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

  

<!--corte-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
	
  
              <div class="col-md-12" id="formularios">
			  
		
			  <?php 
				$con = mysqli_connect('localhost','myserver_asapase','AsecoAsap301084+','myserver_asapaseco');
				$qcesantias = "select numid, nombre, oficio, fecini, fecfin, Codigo, liquidacion, bre_pazysalvo.familia FROM contrato, bre_pazysalvo WHERE trim(id_persona) = '".$this->session->userdata('user')."' AND contrato.familia = bre_pazysalvo.familia and contrato.codigo = bre_pazysalvo.numero and liquidacion = 'lista' order by id_pazysalvo desc";

$rcesantias = $con->query($qcesantias) or die (mysql_error()."Error consultando contrato.");
$cant = mysqli_num_rows($rcesantias);
if ($cant > 0){
  $rowfcesantias= mysqli_fetch_array($rcesantias);
  extract($rowfcesantias);
 if($liquidacion == 'lista'){?>
<table width="700" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#0099FF">
  <tr>
    <td><table width="700">
      <tr>
        <td><img src="/res/images/ver.png" alt="1" width="200" height="100" class="decoded shrinkToFit" /></td>
        <td>POR FAVOR ACERCARSE A NUESTRAS OFICINAS A FIRMAR SU LIQUIDACION DEL CONTRATO CUYO OFICIO ERA <?php echo $oficio;?> QUE INICIO EL <?php echo $fecini; ?> Y FINALIZO EL <?php echo $fecfin; ?> PARA PROCEDER AL PAGO. SI YA SE ACERCO ESPERE MENSAJE DE COMFIRMACION DE PAGO. </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php } } 
$qcesantias = "select * FROM cesantias WHERE trim(identificacion) = '".$this->session->userdata('user')."' AND fecha = '2020-02-14'";
$rcesantias = $con->query($qcesantias) or die (mysql_error()."Error consultando Cesantias.");
$cant = mysqli_num_rows($rcesantias);
if ($cant > 0){
  $rowfcesantias= mysqli_fetch_array($rcesantias);
  extract($rowfcesantias); ?>
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#0099FF">
<tr><td><H3><?php echo "Hemos Consignado sus Cesantias el dia 14 de Febrero de 2020 por Valor de $".number_format($valor)." En El Fondo ".$fondo; ?></H3></td></tr>
</table>
<?php } ?>
			 </div>
			

              </div> 
      		</div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
<footer>
          <div class="pull-right">
            dudas??? favor escribenos al correo sistemas@asapaseco.com
          </div>
          
        </footer>
        <!-- /footer content -->
      </div>
    </div>
      </div>
    </div>
		 <script type="text/javascript" language="javascript" src="../res/vendors/jquery/dist/jquery.js"></script>
       <script src="../res/js/chosen.jquery.js" type="text/javascript"></script>     
   		<script type="text/javascript" language="javascript" src="../res/js/validation/dist/jquery.validate.min.js"></script>
		<script type="text/javascript" language="javascript" src="../res/js/validation/localization/messages_es.js"></script>
        <script type="text/javascript" language="javascript" src="../res/js/jquery.dataTables.min.js"></script>
    	<script type="text/javascript" language="javascript" src="../res/js/dataTables.bootstrap.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="../res/js/moment.min.js"></script> 
		<!--<script src="../res/bootstrap/validador/validator.min.js"></script>-->
    <script type="text/javascript" src="../res/js/bootstrap-datepicker.min.js"></script>
	  <script src="../res/vendors/switchery/dist/switchery.min.js"></script>
	  <script src="../res/vendors/iCheck/icheck.min.js"></script>
      <script type="text/javascript" src="/res/js/toastr/toastr.min.js"></script>
   <script src="/res/js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
	<script src="/res/js/bootstrap.switch/bootstrap-switch.min.js"></script>
    <script src="../res/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../res/vendors/jquery.validationEngine/jquery.validationEngine.js"></script>
	<script src="../res/vendors/jquery.validationEngine/jquery.validationEngine-es.js"></script>
	<script src="../res/js/autoNumeric-min.js"></script>
	<script src="../res/js/basico.js"></script>
	 <!-- PNotify -->
    <script type="text/javascript" src="/res/vendors/pnotify/dist/pnotify.js"></script>
    <script type="text/javascript" src="/res/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script type="text/javascript" src="/res/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript" src="/res/vendors/pnotify/dist/pnotify.callbacks.js"></script>
    <script type="text/javascript" src="/res/vendors/pnotify/dist/pnotify,TabbedNotification.js"></script>
    		<script src="../res/build/js/custom.min.js"></script>
    
    <!-- Flot -->
    <script>
      $(document).ready(function() {
		  		
		$('.mnu').click(function(){
			var url=$(this).attr('url');
			$('#formularios').load('/Login_c/cargarMenu',{"url":url});
			$('#formu2').attr('src','');
		});
		$('.mnu2').click(function(){
			var url=$(this).attr('url');
			$('#formularios').html('');
			$('#formu2').attr('src',url);
		});  
        
       
      });
    </script>
    <!-- /Flot -->
  </body>
</html>
