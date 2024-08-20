<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AsapAseco</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
		<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--<script src="../../../res/js/chosen.jquery.js" type="text/javascript"></script>   --> 
		<script src="../../../res/build/js/custom.min.js"></script>
    	<script src="../../../res/vendors/validator/validator.js"></script>
		<script src="../../../res/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Flot -->

					<div class="container">
					<div class="row">
					 <div class="col-md-12">
                    <form class="form-horizontal" novalidate id="registrar" name="registar">
					<div id="parte1"  style="display: block;">
                    <center>
                    <div class="panel panel-primary">
  					  <div class="panel-heading"><center>DATOS BASICOS DEL SOLICITANTE</center></div>
    				  <div class="panel-body">
					
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Primer Nombre *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="primernombre" class="form-control" name="primernombre" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Segundo Nombre</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="segundonombre" class="form-control" name="segundonombre" type="text">
                        </div>
                      </div>
					  
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Primer Apellido *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="primerapellido" class="form-control col-xs-12" name="primerapellido" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Segundo Apellido</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="segundoapellido" class="form-control col-xs-12" data-validate-words="1" name="segundoapellido" type="text" >
                        </div>
                      </div>
                     		
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Cedula *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="cedula" class="form-control col-md-3 col-xs-12" name="cedula" type="text" >
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Expedida en: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="decedula" class="form-control col-md-3 col-xs-12" name="decedula" type="text" required="required">
						  <input id="tipbtn" name="tipbtn" type="hidden" value="1"> 
                        </div>
                      </div>			  					  
                
				   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                           <select id="sexo" name="sexo"  data-placeholder=" "  class="form-control" required="required">
						  <option></option>
						  <option value="Femenino">Femenino</option>
						  <option value="Masculino">Masculino</option>
  		 					</select>
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo Electronico: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="email" class="form-control col-md-3 col-xs-12" name="email" type="email" required="required">
                        </div>
                      </div>
					  <center>
					  <button class="btn btn-success" id="add" type="button"><i class="fa fa-save"></i> Siguiente => Paso 1 de 5</button>
					  </center>
					  </div>
					  </div>
					  </center>
					  </div> <!--Fin Parte 1-->
					  <div id="parte2"  style="display: none;">
					  <div class="panel panel-primary">
  					  <div class="panel-heading"><center>DATOS BASICOS DEL SOLICITANTE - SEGUNDA PARTE</center></div>
    				  <div class="panel-body">	  					  
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento: * dd/mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="fechanacimiento" class="form-control col-md-3 col-xs-12" name="fechanacimiento" 
						  data-inputmask="'mask': '99/99/9999'" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar de Nacimiento: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="lugarnacimiento" class="form-control col-md-3 col-xs-12" name="lugarnacimiento" type="text" required="required">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion Residencial: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="direccion" class="form-control col-md-3 col-xs-12" name="direccion" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad de Residencia: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ciudad" class="form-control col-md-3 col-xs-12" name="ciudad" type="text" required="required">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Vivienda: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="tipocasa" name="tipocasa"  class="form-control" required="required">
						  <option></option>
						  <option value="Familiar">Familiar</option>
						  <option value="Propia">Propia</option>
						   <option value="Arrendada">Arrendada</option>
  		 					</select>
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Si Aplica Valor Arriendo: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="valorarriendo" class="form-control col-md-3 col-xs-12" name="valorarriendo" type="text" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Años en la vivienda actual: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input name="tiempocasaanio" type="text" class="form-control col-md-3 col-xs-12" id="tiempocasaanio"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Y Meses: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="tiempocasames" class="form-control col-md-3 col-xs-12" name="tiempocasames" type="text" required="required"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> 
                        </div>
                      </div>
					  					
					  <center>
					 <button class="btn btn-success" id="add2" type="button"><i class="fa fa-save"></i> Siguiente => Paso 2 de 5</button>
					  </center>
					  </div>
					  </div>
					  </div> <!--Fin Parte 2-->
					  <div id="parte3"  style="display: none;">
					  <div class="panel panel-primary">
  					  <div class="panel-heading"><center>DATOS BASICOS DEL SOLICITANTE - TERCERA PARTE</center></div>
    				  <div class="panel-body">	
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero Telefono Fijo:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="telefono" class="form-control col-md-3 col-xs-12" name="telefono" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero Celular Personal: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="celular" class="form-control col-md-3 col-xs-12" name="celular"   
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  required="required">
                        </div>
                      </div>
				
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="estadocivil" name="estadocivil"  class="form-control" required="required">
						  <option></option>
						  <option value="Soltero">Soltero</option>
						  <option value="Casado">Casado</option>
						  <option value="Separado">Separado</option>
						  <option value="U. Libre">U. Libre</option>
  		 					</select>
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Hijos: *</label>
						  <div class="item col-md-3 col-sm-3 col-xs-12">
						  <select id="numerohijos" name="numerohijos"  class="form-control" required="required">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de un Familiar: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="nombrefamiliar" class="form-control col-md-3 col-xs-12" name="nombrefamiliar" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono del Familiar: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="telefonofamiliar" class="form-control col-md-3 col-xs-12" name="telefonofamiliar" onKeyUp="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de un Vecino: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="nombrevecino" class="form-control col-md-3 col-xs-12" name="nombrevecino" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono del Vecino: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="telefonovecino" class="form-control col-md-3 col-xs-12" name="telefonovecino" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="required">
                        </div>
                      </div>

					  <center>
					 <button class="btn btn-success" id="add3" type="button"><i class="fa fa-save"></i> Siguiente => Paso 3 de 5</button>
					  </center>
					  </div>
					  </div>
					  </div> <!--Fin Parte 3-->
					  <div id="parte4"  style="display: none;">
					  				<div class="panel panel-danger">
  					  <div class="panel-heading"><center>EXPERIENCIA LABORAL</center></div>
    				  <div class="panel-body">
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de Ultima Empresa Donde ha Trabajo</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ultimaempresa1" class="form-control col-md-3 col-xs-12" name="ultimaempresa1" type="text">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="telefonoempresa1" class="form-control col-md-3 col-xs-12" name="telefonoempresa1" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>

					<div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ciudadempresa1" class="form-control col-md-3 col-xs-12" name="ciudadempresa1" type="text">
						  <input id="direccionempresa1" name="direccionempresa1" type="hidden">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Supervisor Inmediato:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="supervisor1" class="form-control col-md-3 col-xs-12" name="supervisor1" type="text">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ultimo Salario:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ultimosalario1" class="form-control col-md-3 col-xs-12" name="ultimosalario1" type="text" 
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo Desempeñado</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="cargodesempenado1" class="form-control col-md-3 col-xs-12" name="cargodesempenado1" type="text">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio Empleo: * mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="inicioempleo1" class="form-control col-md-3 col-xs-12" name="inicioempleo1" 
						  data-inputmask="'mask': '99/9999'" >
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin Empleo: * mm/aaaa</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="finempleo1" class="form-control col-md-3 col-xs-12" name="finempleo1"  
						  data-inputmask="'mask': '99/9999'" >
                        </div>
                      </div>
					   <div class="form-group">
					   <label class="control-label col-md-3 col-sm-3 col-xs-12">Funciones del Cargo</label>
						 <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="funciones1" class="form-control col-md-3 col-xs-12" name="funciones1" >
                        </div>
						</div>
						<br>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de Penultima Empresa Donde ha Trabajo</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ultimaempresa2" class="form-control col-md-3 col-xs-12" name="ultimaempresa2" type="text">
						  <input id="direccionempresa2" name="direccionempresa2" type="hidden">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="telefonoempresa2" class="form-control col-md-3 col-xs-12" name="telefonoempresa2"
						   onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad Empresa: </label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ciudadempresa2" class="form-control col-md-3 col-xs-12" name="ciudadempresa2" type="text">
                        </div>
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Supervisor Inmediato:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="supervisor2" class="form-control col-md-3 col-xs-12" name="supervisor2" type="text">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ultimo Salario:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="ultimosalario2" class="form-control col-md-3 col-xs-12" name="ultimosalario2" type="text"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo Desempeñado</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="cargodesempenado2" class="form-control col-md-3 col-xs-12" name="cargodesempenado2" type="text">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio  Empleo: * mm/aaaa</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="inicioempleo2" class="form-control col-md-3 col-xs-12" name="inicioempleo2" 
						  data-inputmask="'mask': '99/9999'" >
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin   Empleo: * mm/aaaa</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="finempleo2" class="form-control col-md-3 col-xs-12" name="finempleo2" 
						  data-inputmask="'mask': '99/9999'" >
                        </div>
						</div>
					   <div class="form-group">
					   <label class="control-label col-md-3 col-sm-3 col-xs-12">Funciones del Cargo</label>
						 <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="funciones2" class="form-control col-md-3 col-xs-12" name="funciones2" >
                        </div>
						</div>					 
					  					
					  <center>
					  <button class="btn btn-success" id="add4" type="button"><i class="fa fa-save"></i> Siguiente => Paso 4 de 5 </button>
					  </center>
					  </div>
					  </div> <!--Fin parte 4-->
					  </div>
					  <div id="parte5"  style="display: none;">
					   <center>
     				  <div class="panel panel-warning">
  					  <div class="panel-heading">ESTUDIOS REALIZADOS</div>
    				  <div class="panel-body">
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de la Institucion Donde Estudio La Primaria o el Bachillerato: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="bachillerato" class="form-control col-md-3 col-xs-12" name="bachillerato" type="text" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Indique hasta que grado curso: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="grado" class="form-control col-md-3 col-xs-12" name="grado" type="text" required="required"
						  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                      </div>
					 
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Año Inicio del Bachilleto: *</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="iniciobachillerato" class="form-control col-md-3 col-xs-12" name="iniciobachillerato" required="required">
                        </div>
						 <label class="control-label col-md-3 col-sm-3 col-xs-12">Año Finalizacion Bachillerato: *</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="finbachillerato" class="form-control col-md-3 col-xs-12" name="finbachillerato"
						  required="required">
                        </div>
                      </div>
					  <br>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Especifique Nivel de Estudios Superiores:</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="estudios" name="estudios"  class="form-control">
						  <option></option>
						  <option value="Tecnico">Tecnico</option>
						  <option value="Tecnologico">Tecnologico</option>
						   <option value="Universitario">Universitario</option>
  		 					</select>
                        </div>
						 <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Titulo Obtenido</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="nombretitulo" class="form-control pjur col-md-3 col-xs-12" name="nombretitulo" type="text" required="required">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Nombre de la institución</label>
                        <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="institucionestudio" class="form-control pjur col-md-9 col-xs-12" name="institucionestudio" type="text" required="required">
                        </div>
                      </div>
					 
					 <div class="form-group">
                        <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Año Inicio Estudios</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="inicioestudios" class="form-control pjur col-md-3 col-xs-12" name="inicioestudios"  
						  required="required">
                        </div>
						 <label class="control-label pjur col-md-3 col-sm-3 col-xs-12">Año Fin  Estudios</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="finestudios" class="form-control pjur col-md-3 col-xs-12" name="finestudios" 					  required="required">
                        </div>
                      </div>
						<br>
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Otros Estudios: </label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <select id="estudios2" name="estudios2"  class="form-control">
						  <option></option>
						  <option value="Diplomado">Diplomado</option>
						  <option value="Especializacion">Especializacion</option>
						   <option value="Maestria">Maestria</option>
  		 					</select>
                        </div>
						 <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Titulo Obtenido</label>
						 <div class="item col-md-3  col-sm-3 col-xs-12">
                          <input id="nombretitulo2" oe class="form-control oe col-md-3 col-xs-12" name="nombretitulo2" type="text" required="required">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Nombre de la institución</label>
                        <div class="item col-md-9 col-sm-9 col-xs-12">
                          <input id="institucionestudio2" class="form-control oe col-md-9 col-xs-12" name="institucionestudio2" type="text" required="required">
                        </div>
                      </div>
					 
					 <div class="form-group">
                        <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Año Inicio Estudios</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="inicioestudios2" class="form-control oe col-md-3 col-xs-12" name="inicioestudios2" 				  required="required">
                        </div>
						 <label class="control-label oe col-md-3 col-sm-3 col-xs-12">Año Fin  Estudios</label>
						 <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="finestudios2" class="form-control oe col-md-3 col-xs-12" name="finestudios2" required="required">
                        </div>
                      </div>
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Que otros estudioa adelanta Actualmente</label>
                        <div class="item col-md- col-sm-3 col-xs-12">
                          <input id="estudiosactualmente" class="form-control col-md-9 col-xs-12" name="estudiosactualmente" type="text">
                        </div>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Por favor especifique un solo cargo al que se postule</label>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                          <input id="laborppal" class="form-control col-md-9 col-xs-12 required" name="laborppal" type="text" maxlength="20">
                        </div>
						
                      </div>
					  		
										
					  <center>
					   <button class="btn btn-success" id="add5" type="button"><i class="fa fa-save"></i> Guardar </button>
					  </center>
					  </div>
					  </div>
					  </center><!-- Fin Parte 5-->
					  </div>
					  </form>
					  </div>
					  </div>
					  </div>

					   <div id="parte6"  style="display: none;">
					   <div class="row">
					 <div class="col-md-12">
                    <form method="post" id="imagen" enctype="multipart/form-data">
                    <center>
     				  <div class="panel panel-warning">
  					  <div class="panel-heading">INFORMACIÓN REGISTRADA SATISFACTORIAMENTE</div>
    				  <div class="panel-body">
					  <label class="control-label">Es Necesario Adjuntar Su Hoja de Vida en <strong>PDF</strong></label>
						  <input type="file" name="archivo" accept="application/pdf">
							<div id="archivo"></div>
					  					
					  <center><button id="add6" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></center>
					  </div>
					  </div>
					  </center>
                    </form>
					</div>
					</div>
					</div><!-- Fin Parte6-->
					   <script>
      $(document).ready(function() {
        $(":input").inputmask();
		
		//metodo llenar select tipo de documento dependiendo del cambio
		$('#estudios').on('change',function(){
		  var codigo = $(this).val();
		  if(codigo != ''){
			$('.pjur').css("display","block");
		  }else{
		$('.pjur').css("display","none");
		  }
		});

		
		//metodo llenar select tipo de documento dependiendo del cambio
		$('#estudios2').on('change',function(){
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
	  

       $('#add').click(function(){
	   $("#add").attr("disabled","disabled");
        var submit = true;

		// Valido el formulario
        if (!validator.checkAll('form')) {
		 alert('Faltan campos por llenar *1');
		 $("#add").removeAttr('disabled');
          submit = false;
        }
		
  
        if (submit){ var tipins=1; }else{ var tipins=0; }
          <!--this.submit();-->
	  var primernombre = $("input[name=primernombre]").val().toUpperCase();;
	  var segundonombre = $("input[name=segundonombre]").val().toUpperCase();;
	  var primerapellido = $("input[name=primerapellido]").val().toUpperCase();;
	  var segundoapellido = $("input[name=segundoapellido]").val().toUpperCase();;
	  var cedula = $("input[name=cedula]").val();
	  var decedula = $("input[name=decedula]").val();
	  var email = $("input[name=email]").val();
	  var sexo = $("#sexo").val();
	  var tipbtn = $("#tipbtn").val();
	  
	  
      $.ajax({
      url:   '/hoja_de_vida_c/insert_hoja_vida_a/',
      data: {primernombre,  segundonombre, primerapellido, segundoapellido, cedula, decedula, email, sexo, tipbtn,tipins},
        type:  'post',
        success:  function (response) {
		if( tipins ==1 ){
	 	$('#parte1').css('display','none');
		$('#parte2').css('display','block');
		$("#tipbtn").val('2');
		}
      }
  });
       
	    return false;
	  });
	   $('#add2').click(function(){
	   $("#add2").attr("disabled","disabled");
        var submit = true;


		// Valido el formulario
        if (!validator.checkAll('form')) {
		 alert('Faltan campos por llenar');
		 $("#add2").removeAttr('disabled');
          submit = false;
        }
		
       	//Valido Arriendo
		var tipocasa = $('#tipocasa').val();
		var valorarriendo = $('#valorarriendo').val();
		 if (tipocasa == 'Arrendada' && valorarriendo== '') {
		 alert('Escojio Casa Arrendada por favor Digite Valor del Arriendo');
		 $("#add2").removeAttr('disabled');
         submit = false;
        }
		
  
      if (submit){ var tipins=1; }else{ var tipins=0; }
          <!--this.submit();-->
	  var cedula = $("input[name=cedula]").val();
	  var fechanacimiento = $("input[name=fechanacimiento]").val();
	  var lugarnacimiento = $("input[name=lugarnacimiento]").val();
	  var direccion = $("input[name=direccion]").val();
	  var ciudad = $("input[name=ciudad]").val();
	  var tiempocasaanio = $("input[name=tiempocasaanio]").val();
	  var tiempocasames = $("input[name=tiempocasames]").val(); 
	  var tipbtn = $("#tipbtn").val();
	  
      $.ajax({
      url:   '/hoja_de_vida_c/insert_hoja_vida_a/',
      data: {cedula, tipbtn, tipocasa, valorarriendo, fechanacimiento, lugarnacimiento, direccion, ciudad, tiempocasaanio, tiempocasames,tipins},
        type:  'post',
        success:  function (response) {
		if( tipins ==1 ){
		$('#parte2').css('display','none');
		$('#parte3').css('display','block');
		$("#tipbtn").val('3');
		}
      }
  });

	    return false;
      
	   });
	   
	      $('#add3').click(function(){
		  $("#add3").attr("disabled","disabled");
        var submit = true;

		// Valido el formulario
        if (!validator.checkAll('form')) {
		 alert('Faltan campos por llenar');
		 $("#add3").removeAttr('disabled');
          submit = false;
        }
		
  
       if (submit){ var tipins=1; }else{ var tipins=0; }
          <!--this.submit();--> 
	  var cedula = $("input[name=cedula]").val();
	  var telefono = $("input[name=telefono]").val();
	  var celular = $("input[name=celular]").val();
	  var nombrefamiliar = $("input[name=nombrefamiliar]").val();
	  var telefonofamiliar = $("input[name=telefonofamiliar]").val();
	  var nombrevecino = $("input[name=nombrevecino]").val();
	  var telefonovecino = $("input[name=telefonovecino]").val();
	  var estadocivil = $("#estadocivil").val();
	  var numerohijos = $("#numerohijos").val();
	  var tipbtn = $("#tipbtn").val();
	  

	  
	  
      $.ajax({
      url:   '/hoja_de_vida_c/insert_hoja_vida_a/',
      data: {cedula,telefono,celular,nombrefamiliar,telefonofamiliar,nombrevecino,telefonovecino,estadocivil,numerohijos,tipbtn,tipins},
        type:  'post',
        success:  function (response) {
		if( tipins ==1 ){
		$('#parte3').css('display','none');
		$('#parte4').css('display','block');
		$("#tipbtn").val('4');
		}
      }
 	 });

	    return false;
      
		  
		  });
		  
		$('#add4').click(function(){
		$("#add4").attr("disabled","disabled");
        var submit = true;

		// Valido el formulario
        if (!validator.checkAll('form')) {
		 alert('Faltan campos por llenar');
		 $("#add4").removeAttr('disabled');
          submit = false;
        }
		
       	//Valido Arriendo
		var tipocasa = $('#tipocasa').val();
		var valorarriendo = $('#valorarriendo').val();
		 if (tipocasa == 'Arrendada' && valorarriendo== '') {
		 alert('Escojio Casa Arrendada por favor Digite Valor del Arriendo');
		  $("#add4").removeAttr('disabled');
         submit = false;
        }
		
		//Valido Datos Ultima Empresa
		var ultimaempresa1 = $('#ultimaempresa1').val().trim();
		var telefonoempresa1 = $('#telefonoempresa1').val().trim();
		var direccionempresa1 = $('#direccionempresa1').val().trim();
		var ciudadempresa1 = $('#ciudadempresa1').val().trim();
		var ultimosalario1 = $('#ultimosalario1').val().trim();
		var cargodesempenado1 = $('#cargodesempenado1').val().trim();
		var supervisor1 = $('#supervisor1').val().trim();
		var inicioempleo1 = $('#inicioempleo1').val().trim();
		var finempleo1 = $('#finempleo1').val().trim();
		var funciones1 = $('#funciones1').val().trim();
		 		
		 //valido todos los campos llenos
		 if (ultimaempresa1 != '' && telefonoempresa1 != '' && ciudadempresa1 != '' && ultimosalario1 != '' && cargodesempenado1 != '' && supervisor1 != '' && inicioempleo1 != '' && finempleo1 != '' && funciones1 != '') {
		 }else{
		 //valido que todos esten vacios
		 //alert(UltimaEmpresa1+TelefonoEmpresa1+DireccionEmpresa1+CiudadEmpresa1+UltimoSalario1+CargoDesempenado1+Supervisor1+InicioEmpleo1+FinEmpleo1+funciones1);
		 if (ultimaempresa1 == '' && telefonoempresa1 == '' && direccionempresa1 == '' && ciudadempresa1 == '' && ultimosalario1 == '' && cargodesempenado1 == '' 
		 && supervisor1 == '' && inicioempleo1 == '' && finempleo1 == '' && funciones1 == ''){
		 }else{
		 alert('Todos Los Campos deben estar Llenos o Vacios de Ultima empresa.  ¡No se acepta Informacion Incompleta!');
		  $("#add4").removeAttr('disabled');
         submit = false;
		 }
		 }
		 
		
		//Valido Datos PenUltima Empresa
		var ultimaempresa2 = $('#ultimaempresa2').val().trim();
		var telefonoempresa2 = $('#telefonoempresa2').val().trim();
		var direccionempresa2 = $('#direccionempresa2').val().trim();
		var ciudadempresa2 = $('#ciudadempresa2').val().trim();
		var ultimosalario2 = $('#ultimosalario2').val().trim();
		var cargodesempenado2 = $('#cargodesempenado2').val().trim();
		var supervisor2 = $('#supervisor2').val().trim();
		var inicioempleo2 = $('#inicioempleo2').val().trim();
		var finempleo2 = $('#finempleo2').val().trim();
		var funciones2 = $('#funciones2').val().trim(); 		
		 //valido todos los campos llenos
		 if (ultimaempresa2 != '' && telefonoempresa2 != '' && ciudadempresa2 != '' && ultimosalario2 != '' && cargodesempenado2 != '' && supervisor2 != '' && inicioempleo2 != '' && finempleo2 != '' && funciones2 != '') {
		 }else{
		 //valido que todos esten vacios
		 if (ultimaempresa2 == '' && telefonoempresa2 == '' && direccionempresa2 == '' && ciudadempresa2 == '' && ultimosalario2 == '' && cargodesempenado2 == '' && supervisor2 == '' && inicioempleo2 == '' && finempleo2 == '' && funciones2 == ''){
		 }else{
		 alert('Todos Los Campos deben estar Llenos o Vacios de Penultima empresa.  ¡No se acepta Informacion Incompleta!');
         $("#add4").removeAttr('disabled');
		 submit = false;
		 }
		 }
  
          if (submit){ var tipins=1; }else{ var tipins=0; }
          <!--this.submit();-->
	  var cedula = $("input[name=cedula]").val();
	  var tipbtn = $("#tipbtn").val();
	  
      $.ajax({
      url:   '/hoja_de_vida_c/insert_hoja_vida_a/',
      data: {cedula, ciudadempresa1, ultimaempresa1, telefonoempresa1, cargodesempenado1, ultimosalario1, supervisor1, inicioempleo1,  finempleo1, ultimaempresa2, telefonoempresa2, cargodesempenado2, ultimosalario2, supervisor2, inicioempleo2,  finempleo2, ciudadempresa2,tipbtn,tipins},
        type:  'post',
        success:  function (response) {
			if( tipins ==1 ){
	 	$('#parte4').css('display','none');
		$('#parte5').css('display','block');
		$("#tipbtn").val('5');
		}
      }
  });

	    return false;
      
		  
		  });
		  
		$('#add5').click(function(){
		$("#add5").attr("disabled","disabled");
        var submit = true;

		// Valido el formulario
        if (!validator.checkAll('form')) {
		 alert('Faltan campos por llenar');
		 $("#add5").removeAttr('disabled');
          submit = false;
        }
  
        if (submit){ var tipins=1; }else{ var tipins=0; }
          <!--this.submit();-->
	  var tipbtn = $("#tipbtn").val();
	  var cedula = $("input[name=cedula]").val();
	  var bachillerato = $("input[name=bachillerato]").val();
	  var iniciobachillerato = $("input[name=iniciobachillerato]").val();
	  var finbachillerato = $("input[name=finbachillerato]").val();
	  var grado = $("input[name=grado]").val();
	  
	  var estudios = $("#estudios").val();
	  var institucionestudio = $("input[name=institucionestudio]").val();
	  var inicioestudios = $("input[name=inicioestudios]").val();
	  var finestudios = $("input[name=finestudios]").val();
	  var nombretitulo = $("input[name=nombretitulo]").val();
	  
	  var estudios2 = $("#estudios2").val();
	  var institucionestudio2 = $("input[name=institucionestudio2]").val();
	  var inicioestudios2 = $("input[name=inicioestudios2]").val();
	  var finestudios2 = $("input[name=finestudios2]").val();
	  var nombretitulo2 = $("input[name=nombretitulo2]").val();
	  
	  var estudiosactualmente = $("input[name=estudiosactualmente]").val();
	  var laborppal = $("input[name=laborppal]").val();
	  
	  if(laborppal == ''){
	   alert('Por Favor Especifique el Cargo al que Se Postula!');
	    $("#add5").removeAttr('disabled');
         submit = false;
	  }
	  
	  
      $.ajax({
      url:   '/hoja_de_vida_c/insert_hoja_vida_a/',
      data: {bachillerato, iniciobachillerato, finbachillerato, grado, institucionestudio, estudios, inicioestudios, finestudios, nombretitulo, estudiosactualmente,  
	  estudios2,institucionestudio2,inicioestudios2,finestudios2,nombretitulo2,tipbtn,cedula,laborppal,tipins},
        type:  'post',
        success:  function (response) {
			if( tipins ==1 ){
			 	$('#parte5').css('display','none');
			    $('#parte6').css('display','block');
		        $("#tipbtn").val('6');
	 }
      }
  });
	    return false;
      
		  
		  });
		
		$('#add6').click(function(){
		    var cedula = $("input[name=cedula]").val();
            var formData = new FormData($("#imagen")[0]);
			formData.append("cedula", cedula);
            var ruta = "/hoja_de_vida_c/tokenizado/";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                  alert('Hoja de Vida Guardada Correctamente');
				  window.location="https://www.asapaseco.com";
                }
            });
        
	    return false;
		
		   });
    </script>
    <!-- /validator -->