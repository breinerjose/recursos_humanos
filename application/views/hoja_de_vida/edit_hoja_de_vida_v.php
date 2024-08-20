<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AsapAseco</title>
    <link href="../../../res/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../res/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../../res/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../../../res/build/css/custom.min.css" rel="stylesheet">
	<!--<link href="../../../res/bootstrap/css/bootstrap-chosen.css" rel="stylesheet">-->
    <!-- <link href="../res/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
	<!--<link href="../res/css/bootstrap-datepicker.min.css" type="text/css">-->
	<style type="text/css">
	 body{ background:#fff;}
	 .pjur, .oe{display:none;}
	</style>
 
  </head>
  <body >
  		<script src="../../../res/vendors/jquery/dist/jquery.min.js"></script>
		<script src="../../../res/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!--<script src="../../../res/js/chosen.jquery.js" type="text/javascript"></script>   --> 
		<script src="../../../res/vendors/iCheck/icheck.min.js"></script>
		<script src="../../../res/vendors/switchery/dist/switchery.min.js"></script>
		<script src="../../../res/build/js/custom.min.js"></script>
    	<script src="../../../res/vendors/validator/validator.js"></script>
		<script src="../../../res/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Flot -->
					<div class="container">
					<div class="row">
					 <div class="col-md-12">
                    <form class="form-horizontal" novalidate >
                    <center>
                      <h4><strong>DATOS BASICOS DEL SOLICITANTE</strong> - ACTUALIZACION HOJA DE VIDA.</h4>
                    </center><br>
					
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Primer Nombre *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="PrimerNombre" class="form-control" name="PrimerNombre" type="text" value="<?php echo $this->session->userdata('PrimerNombre'); ?>" readonly >
						  <input id="Estado" class="form-control" name="Estado" type="hidden" 
						  value="<?php echo $this->session->userdata('Estado'); ?>">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Segundo Nombre</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="SegundoNombre" class="form-control" name="SegundoNombre" type="text" value="<?php echo $this->session->userdata('SegundoNombre'); ?>" readonly > 
                        </div>
                      </div>
					  
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Primer Apellido *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
            <input id="PrimerApellido" class="form-control col-xs-12" name="PrimerApellido" type="text" value="<?php echo $this->session->userdata('PrimerApellido'); ?>" readonly > 
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Segundo Apellido</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                   <input id="SegundoApellido" class="form-control col-xs-12" name="SegundoApellido" type="text" value="<?php echo $this->session->userdata('SegundoApellido'); ?>" readonly >
                        </div>
                      </div>
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Cedula *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Cedula" class="form-control col-md-3 col-xs-12" name="Cedula" type="text" 
						  value="<?php echo $this->session->userdata('Cedula') ;?>" 
						  readonly required="required" >
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Expedida en: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="DeCedula" class="form-control col-md-3 col-xs-12" name="DeCedula" type="text" required="required">
                        </div>
                      </div>			  					  
                
				   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                           <select id="Sexo" name="Sexo"  data-placeholder=" "  class="form-control" required="required">
						  <option></option>
						  <option value="Femenino">Femenino</option>
						  <option value="Masculino">Masculino</option>
  		 					</select>
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo Electronico: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Email" class="form-control col-md-3 col-xs-12" name="Email" type="email" required="required">
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento: * dd/mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="FechaNacimiento" class="form-control col-md-3 col-xs-12" name="FechaNacimiento" data-inputmask="'mask': '99/99/9999'" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar de Nacimiento: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="LugarNacimiento" class="form-control col-md-3 col-xs-12" name="LugarNacimiento" type="text" required="required">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion Residencial: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Direccion" class="form-control col-md-3 col-xs-12" name="Direccion" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad de Residencia: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Ciudad" class="form-control col-md-3 col-xs-12" name="Ciudad" type="text" required="required">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Vivienda: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="TipoCasa" name="TipoCasa"  class="form-control" required="required">
						  <option></option>
						  <option value="Familiar">Familiar</option>
						  <option value="Propia">Propia</option>
						   <option value="Arrendada">Arrendada</option>
  		 					</select>
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Si Aplica Valor Arriendo: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ValorArriendo" class="form-control col-md-3 col-xs-12" name="ValorArriendo" type="text" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Años en la vivienda actual: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input name="TiempoCasaAnio" type="text" class="form-control col-md-3 col-xs-12" id="TiempoCasaAnio"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Y Meses: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="TiempoCasaMes" class="form-control col-md-3 col-xs-12" name="TiempoCasaMes" type="text" required="required"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> 
                        </div>
                      </div>
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero Telefono Fijo:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Telefono" class="form-control col-md-3 col-xs-12" name="Telefono" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero Celular Personal: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Celular" class="form-control col-md-3 col-xs-12" name="Celular"   
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  required="required">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de un Familiar: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="NombreFamiliar" class="form-control col-md-3 col-xs-12" name="NombreFamiliar" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono del Familiar: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="TelefonoFamiliar" class="form-control col-md-3 col-xs-12" name="TelefonoFamiliar" onKeyUp="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="EstadoCivil" name="EstadoCivil"  class="form-control" required="required">
						  <option></option>
						  <option value="Soltero">Soltero</option>
						  <option value="Casado">Casado</option>
						  <option value="Separado">Separado</option>
						  <option value="U. Libre">U. Libre</option>
  		 					</select>
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Hijos: *</label>
						  <div class="item col-md-3 col-sm-3 col-xs-12">
						  <select id="NumeroHijos" name="NumeroHijos"  class="form-control" required="required">
						  <option></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  <option value="9">9</option>
						  <option value="10">10</option>
  		 					</select>
						  
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de un Vecino: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="NombreVecino" class="form-control col-md-3 col-xs-12" name="NombreVecino" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono del Vecino: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="TelefonoVecino" class="form-control col-md-3 col-xs-12" name="TelefonoVecino" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de un Vecino: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="NombreVecino" class="form-control col-md-3 col-xs-12" name="NombreVecino" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono del Vecino: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="TelefonoVecino" class="form-control col-md-3 col-xs-12" name="TelefonoVecino" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
                      </div>
  					<br><center><h4><strong>EXPERIENCIA LABORAL</strong></h4></center><br>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de Ultima Empresa Donde ha Trabajo</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="UltimaEmpresa1" class="form-control col-md-3 col-xs-12" name="UltimaEmpresa1" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="TelefonoEmpresa1" class="form-control col-md-3 col-xs-12" name="TelefonoEmpresa1" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion Empresa:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="DireccionEmpresa1" class="form-control col-md-3 col-xs-12" name="DireccionEmpresa1" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="CiudadEmpresa1" class="form-control col-md-3 col-xs-12" name="CiudadEmpresa1" type="text">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ultimo Salario:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="UltimoSalario1" class="form-control col-md-3 col-xs-12" name="UltimoSalario1" type="text" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo Desempeñado</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="CargoDesempenado1" class="form-control col-md-3 col-xs-12" name="CargoDesempenado1" type="text">
                        </div>
                      </div>


						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Supervisor Inmediato:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Supervisor1" class="form-control col-md-3 col-xs-12" name="Supervisor1" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio Empleo: * dd/mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="InicioEmpleo1" class="form-control col-md-3 col-xs-12" name="InicioEmpleo1" data-inputmask="'mask': '99/99/9999'" >
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin Empleo: * dd/mm/aaaa</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="FinEmpleo1" class="form-control col-md-3 col-xs-12" name="FinEmpleo1"  data-inputmask="'mask': '99/99/9999'" >
                        </div>
                      </div>
						<br>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de Penultima Empresa Donde ha Trabajo</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="UltimaEmpresa2" class="form-control col-md-3 col-xs-12" name="UltimaEmpresa2" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="TelefonoEmpresa2" class="form-control col-md-3 col-xs-12" name="TelefonoEmpresa2"
						   onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion Empresa:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="DireccionEmpresa2" class="form-control col-md-3 col-xs-12" name="DireccionEmpresa2" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="CiudadEmpresa2" class="form-control col-md-3 col-xs-12" name="CiudadEmpresa2" type="text">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ultimo Salario:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="UltimoSalario2" class="form-control col-md-3 col-xs-12" name="UltimoSalario2" type="text"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo Desempeñado</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="CargoDesempenado2" class="form-control col-md-3 col-xs-12" name="CargoDesempenado2" type="text">
                        </div>
                      </div>


						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Supervisor Inmediato:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Supervisor2" class="form-control col-md-3 col-xs-12" name="Supervisor2" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio  Empleo: * dd/mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="InicioEmpleo2" class="form-control col-md-3 col-xs-12" name="InicioEmpleo2" data-inputmask="'mask': '99/99/9999'" >
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin   Empleo: * dd/mm/aaaa</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="FinEmpleo2" class="form-control col-md-3 col-xs-12" name="FinEmpleo2" data-inputmask="'mask': '99/99/9999'" >
                        </div>
                      </div>
					  <br><center><h4><strong>ESTUDIOS REALIZADOS</strong></h4></center><br>
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de la Institucion Donde Estudio La Primaria o el Bachillerato: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Bachillerato" class="form-control col-md-3 col-xs-12" name="Bachillerato" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Indique hasta que grado curso: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="Grado" class="form-control col-md-3 col-xs-12" name="Grado" type="text" required="required"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>
					 
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio del Bachilleto: * dd/mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="InicioBachillerato" class="form-control col-md-3 col-xs-12" name="InicioBachillerato" data-inputmask="'mask': '99/99/9999'"  required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Finalizacion Bachillerato: * dd/mm/aaaa</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="FinBachillerato" class="form-control col-md-3 col-xs-12" name="FinBachillerato" data-inputmask="'mask': '99/99/9999'"  
						  required="required">
                        </div>
                      </div>
					  <br>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Especifique Nivel de Estudios Superiores:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="Estudios" name="Estudios"  class="form-control">
						  <option></option>
						  <option value="Tecnico">Tecnico</option>
						  <option value="Tecnologico">Tecnologico</option>
						   <option value="Universitario">Universitario</option>
  		 					</select>
                        </div>
						 <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Titulo Obtenido</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="NombreTitulo" class="form-control pjur col-md-3 col-xs-12" name="NombreTitulo" type="text" required="required">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Nombre de la institución</label>
                        <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="InstitucionEstudio" class="form-control pjur col-md-9 col-xs-12" name="InstitucionEstudio" type="text" required="required">
                        </div>
                      </div>
					 
					 <div class="form-group">
                        <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Fecha Inicio Estudios</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="InicioEstudios" class="form-control pjur col-md-3 col-xs-12" name="InicioEstudios" data-inputmask="'mask': '99/99/9999'" 
						  required="required">
                        </div>
						 <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Fecha Fin  Estudios</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="FinEstudios" class="form-control pjur col-md-3 col-xs-12" name="FinEstudios" data-inputmask="'mask': '99/99/9999'" 
						  required="required">
                        </div>
                      </div>
						<br>
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Otros Estudios: </label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="Estudios2" name="Estudios2"  class="form-control">
						  <option></option>
						  <option value="Diplomado">Diplomado</option>
						  <option value="Especializacion">Especializacion</option>
						   <option value="Maestria">Maestria</option>
  		 					</select>
                        </div>
						 <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Titulo Obtenido</label>
						 <div class="item col-md-3  col-sm-3 col-xs-12">
                          <input id="NombreTitulo2" oe class="form-control oe col-md-3 col-xs-12" name="NombreTitulo2" type="text" required="required">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Nombre de la institución</label>
                        <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="InstitucionEstudio2" class="form-control oe col-md-9 col-xs-12" name="InstitucionEstudio2" type="text" required="required">
                        </div>
                      </div>
					 
					 <div class="form-group">
                        <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Fecha Inicio Estudios dd/mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="InicioEstudios2" class="form-control oe col-md-3 col-xs-12" name="InicioEstudios2" data-inputmask="'mask': '99/99/9999'" 
						  required="required">
                        </div>
						 <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Fecha Fin  Estudios dd/mm/aaaa</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="FinEstudios2" class="form-control oe col-md-3 col-xs-12" name="FinEstudios2" data-inputmask="'mask': '99/99/9999'"  
						  required="required">
                        </div>
                      </div>
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Que otros estudioa adelanta Actualmente</label>
                        <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="EstudiosActualmente" class="form-control col-md-9 col-xs-12" name="EstudiosActualmente" type="text">
                        </div>
                      </div>
					
					  <center>
					  <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
					  </center>
                    </form>
					</div></div></div>
					
	<script>
      $(document).ready(function() {
        $(":input").inputmask();
		
		//metodo llenar select tipo de documento dependiendo del cambio
		$('#Estudios').on('change',function(){
		  var codigo = $(this).val();
		  if(codigo != ''){
			$('.pjur').css("display","block");
		  }else{
		$('.pjur').css("display","none");
		  }
		});

		
		//metodo llenar select tipo de documento dependiendo del cambio
		$('#Estudios2').on('change',function(){
		  var codigo = $(this).val();
		  if(codigo != ''){
			$('.oe').css("display","block");
		  }else{
		$('.oe').css("display","none");
		  }
		});

      });
    </script>				
					
 <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'No es una fecha Real';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;


		// Valido el formulario
        if (!validator.checkAll($(this))) {
		 alert('Faltan campos por llenar');
          submit = false;
        }
		
       	//Valido Arriendo
		var TipoCasa = $('#TipoCasa').val();
		var ValorArriendo = $('#ValorArriendo').val();
		 if (TipoCasa == 'Arrendada' && ValorArriendo== '') {
		 alert('Escojio Casa Arrendada por favor Digite Valor del Arriendo');
         submit = false;
        }
		
		//Valido Datos Ultima Empresa
		var UltimaEmpresa1 = $('#UltimaEmpresa1').val();
		var TelefonoEmpresa1 = $('#TelefonoEmpresa1').val();
		var DireccionEmpresa1 = $('#DireccionEmpresa1').val();
		var CiudadEmpresa1 = $('#CiudadEmpresa1').val();
		var UltimoSalario1 = $('#UltimoSalario1').val();
		var CargoDesempenado1 = $('#CargoDesempenado1').val();
		var Supervisor1 = $('#Supervisor1').val();
		var InicioEmpleo1 = $('#InicioEmpleo1').val();
		var FinEmpleo1 = $('#FinEmpleo1').val();
		 		
		 //valido todos los campos llenos
		 if (UltimaEmpresa1 != '' && TelefonoEmpresa1 != '' && DireccionEmpresa1 != '' && CiudadEmpresa1 != '' && UltimoSalario1 != '' && CargoDesempenado1 != '' && Supervisor1 != '' && InicioEmpleo1 != '' && FinEmpleo1 != '') {
		 }else{
		 //valido que todos esten vacios
		 if (UltimaEmpresa1 == '' && TelefonoEmpresa1 == '' && DireccionEmpresa1 == '' && CiudadEmpresa1 == '' && UltimoSalario1 == '' && CargoDesempenado1 == '' && Supervisor1 == '' && InicioEmpleo1 == '' && FinEmpleo1 == ''){
		 }else{
		 alert('Todos Los Campos deben estar Llenos o Vacios de Ultima empresa.  ¡No se acepta Informacion Incompleta!');
         submit = false;
		 }
		 }
		
		//Valido Datos PenUltima Empresa
		var UltimaEmpresa2 = $('#UltimaEmpresa2').val();
		var TelefonoEmpresa2 = $('#TelefonoEmpresa2').val();
		var DireccionEmpresa2 = $('#DireccionEmpresa2').val();
		var CiudadEmpresa2 = $('#CiudadEmpresa2').val();
		var UltimoSalario2 = $('#UltimoSalario2').val();
		var CargoDesempenado2 = $('#CargoDesempenado2').val();
		var Supervisor2 = $('#Supervisor2').val();
		var InicioEmpleo2 = $('#InicioEmpleo2').val();
		var FinEmpleo2 = $('#FinEmpleo2').val();
		 		
		 //valido todos los campos llenos
		 if (UltimaEmpresa2 != '' && TelefonoEmpresa2 != '' && DireccionEmpresa2 != '' && CiudadEmpresa2 != '' && UltimoSalario2 != '' && CargoDesempenado2 != '' && Supervisor2 != '' && InicioEmpleo2 != '' && FinEmpleo2 != '') {
		 }else{
		 //valido que todos esten vacios
		 if (UltimaEmpresa2 == '' && TelefonoEmpresa2 == '' && DireccionEmpresa2 == '' && CiudadEmpresa2 == '' && UltimoSalario2 == '' && CargoDesempenado2 == '' && Supervisor2 == '' && InicioEmpleo2 == '' && FinEmpleo2 == ''){
		 }else{
		 alert('Todos Los Campos deben estar Llenos o Vacios de Penultima empresa.  ¡No se acepta Informacion Incompleta!');
         submit = false;
		 }
		 }
  
        if (submit){
          <!--this.submit();-->
	  var Estado = $("input[name=Estado]").val();	  
	  var PrimerNombre = $("input[name=PrimerNombre]").val().toUpperCase();;
	  var SegundoNombre = $("input[name=SegundoNombre]").val().toUpperCase();;
	  var PrimerApellido = $("input[name=PrimerApellido]").val().toUpperCase();;
	  var SegundoApellido = $("input[name=SegundoApellido]").val().toUpperCase();;
	  var Cedula = $("input[name=Cedula]").val();
	  var DeCedula = $("input[name=DeCedula]").val();
	  var FechaNacimiento = $("input[name=FechaNacimiento]").val();
	  var LugarNacimiento = $("input[name=LugarNacimiento]").val();
	  var Email = $("input[name=Email]").val();
	  var Direccion = $("input[name=Direccion]").val();
	  var Ciudad = $("input[name=Ciudad]").val();
	  var TiempoCasaAnio = $("input[name=TiempoCasaAnio]").val();
	  var TiempoCasaMes = $("input[name=TiempoCasaMes]").val();
	  var Telefono = $("input[name=Telefono]").val();
	  var Celular = $("input[name=Celular]").val();
	  var NombreFamiliar = $("input[name=NombreFamiliar]").val();
	  var TelefonoFamiliar = $("input[name=TelefonoFamiliar]").val();
	  var NombreVecino = $("input[name=NombreVecino]").val();
	  var TelefonoVecino = $("input[name=TelefonoVecino]").val();
	  var EstadoCivil = $("#EstadoCivil").val();
	  var NumeroHijos = $("#NumeroHijos").val();
	  var Sexo = $("#Sexo").val();
	  
	  var Bachillerato = $("input[name=Bachillerato]").val();
	  var InicioBachillerato = $("input[name=InicioBachillerato]").val();
	  var FinBachillerato = $("input[name=FinBachillerato]").val();
	  var Grado = $("input[name=Grado]").val();
	  
	  var Estudios = $("#Estudios").val();
	  var InstitucionEstudio = $("input[name=InstitucionEstudio]").val();
	  var InicioEstudios = $("input[name=InicioEstudios]").val();
	  var FinEstudios = $("input[name=FinEstudios]").val();
	  var NombreTitulo = $("input[name=NombreTitulo]").val();
	  
	  var Estudios2 = $("#Estudios2").val();
	  var InstitucionEstudio2 = $("input[name=InstitucionEstudio2]").val();
	  var InicioEstudios2 = $("input[name=InicioEstudios2]").val();
	  var FinEstudios2 = $("input[name=FinEstudios2]").val();
	  var NombreTitulo2 = $("input[name=NombreTitulo2]").val();
	  
	  var EstudiosActualmente = $("input[name=EstudiosActualmente]").val();
	  var laborppal = $("input[name=laborppal]").val();
	  
	  
      $.ajax({
      url:   '/hoja_de_vida_c/update_hoja_vida/',
      data: {Estado, PrimerNombre,  SegundoNombre, PrimerApellido, SegundoApellido, Cedula, DeCedula, FechaNacimiento, LugarNacimiento, Email, Direccion,
Ciudad, ValorArriendo, TiempoCasaAnio, TiempoCasaMes, TipoCasa, Telefono, Celular, NombreFamiliar, TelefonoFamiliar, NombreVecino, TelefonoVecino, EstadoCivil, NumeroHijos,  Bachillerato, InicioBachillerato, FinBachillerato, Grado, InstitucionEstudio, Estudios, InicioEstudios, FinEstudios, NombreTitulo, EstudiosActualmente, CiudadEmpresa1, UltimaEmpresa1, DireccionEmpresa1, TelefonoEmpresa1, CargoDesempenado1, UltimoSalario1, Supervisor1, InicioEmpleo1,  FinEmpleo1, UltimaEmpresa2, DireccionEmpresa2, TelefonoEmpresa2, CargoDesempenado2, UltimoSalario2, Supervisor2, InicioEmpleo2,  FinEmpleo2, Sexo, CiudadEmpresa1, CiudadEmpresa2,Estudios2,InstitucionEstudio2,InicioEstudios2,FinEstudios2,NombreTitulo2,laborppal},
        type:  'post',
        success:  function (response) {
		alert('Hoja de Vida Guardada Correctamente');
	 window.location="http://www.asapaseco.com";
      }
  });
       }
	    return false;
      });
    </script>
    <!-- /validator -->