<!DOCTYPE html>
<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AsapAseco</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../../../res/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../../res/vendors/jquery.validationEngine/validationEngine.jquery.css" rel="stylesheet">
  </head>
  <body >
  		<script src="../../../res/vendors/jquery/dist/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--<script src="../../../res/js/chosen.jquery.js" type="text/javascript"></script>   --> 
    	<script type="text/javascript" language="javascript" src="../../../res/js/validation/dist/jquery.validate.min.js"></script>
		<script type="text/javascript" language="javascript" src="../../../res/js/validation/localization/messages_es.js"></script>
		<script src="../../../res/build/js/custom.min.js"></script>

<div class="container">
<div class="row">
<div class="col-md-12">
<center><h2>EVALUACIÓN DE LA INDUCCIÓN Y REINDUCCIÓN</h2></center>
</div>
</div>
<div class="row">                           
   <form action="" method="POST" class="form-horizontal"  id="registrar" name="registrar" role="form">
     <div class="panel panel-primary">
     <div class="panel-heading">Nombre del Aspirante</div>
     <div class="panel-body">
	 <div class="col-md-2">
	 <label for="Cedula">Identificacion:</label>
	 <input class="form-control required" id="Cedula" name="Cedula" type="text">
	 <input class="form-control required" value="<?php echo $empresa; ?>" id="empresa" name="empresa" type="hidden">
	 </div>
	 <div class="col-md-5">
	 <label for="Nombre">Nombre:</label>
	 <input class="form-control required" id="Nombre" name="Nombre" type="text">
	 </div>
	 <div class="col-md-5">
	 <label for="Nombre">Empresa Cliente:</label>
	 <input class="form-control required" id="cliente" name="cliente" type="text">
	 </div>
	 </div>
     </div>
                             
     <div class="panel panel-primary">
     <div class="panel-heading">1. Explique con sus palabras de qué trata la Política Integral HSEQ y su contribución en el logro de la misma..</div>
     <div class="panel-body"><textarea class="form-control required" id="preg1" name="preg1" rows="3"></textarea>
	 </div>
     </div>
	 
	 <div class="panel panel-primary">
      <div class="panel-heading">2. Del listado siguiente, seleccione sus responsabilidades dentro del SG-SST</div>
      <div class="panel-body">
	  <div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2a" name="2a">
						    <label class="form-check-label" for="2a">
							a) Procurar el cuidado integral de su salud.
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2b" name="2b">
						    <label class="form-check-label" for="2b">
							b) Cumplir con las normas, reglamento e instrucciones del sistema de seguridad y salud en el trabajo.
						    </label>
							</div>
							
								<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2c" name="2c">
						    <label class="form-check-label" for="2c">
							c) Informar a sus jefes oportunamente sobre las situaciones de riesgo observadas o los accidentes ocurridos.
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2d" name="2d">
						    <label class="form-check-label" for="2d">
							d)  Informar a sus jefes algunas veces sobre las situaciones de riesgo observadas o los accidentes ocurridos
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2e" name="2e">
						    <label class="form-check-label" for="2e">
							e) Reportar las horas trabajadas
						    </label>
							</div>
														
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2f" name="2f">
						    <label class="form-check-label" for="2f">
							f) Participar en las actividades de capacitacion en seguridad y salud en el trabajo definido en el plan de capacitacion del SG- SST
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2g" name="2g">
						    <label class="form-check-label" for="2g">
							g) Usar en forma oportuna y adecuada los dispositivos de prevención de riesgos y los elementos de protección personal.
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="2h" name="2h">
						    <label class="form-check-label" for="2h">
							h) Conservar en orden y aseo los lugares de trabajo, las herramientas y los equipos de trabajo
						    </label>
							</div>
							<!--cierre div	-->	
					  </div>
					</div>
	
					<div class="panel panel-primary">
					  <div class="panel-heading">3. Para protegerme de los riesgos generales ¿Qué debo tener en cuenta?</div>
					  <div class="panel-body">
					  <div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="3a" name="3a">
						    <label class="form-check-label" for="3a">
							a) Respetar delimitaciones de area y señalización
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="3b" name="3b">
						    <label class="form-check-label" for="3b">
							b) Seguir los procedimientos de trabajo y firmar el analisis de riesgo en caso que se requiera
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="3c" name="3c">
						    <label class="form-check-label" for="3c">
							c) Utilizar mis elementos de protección personal
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="3d" name="3d">
						    <label class="form-check-label" for="3d">
							d) Mantener distancia segura a equipos energizados
						    </label>
							</div>
							
							<div class="col-md-12">
							<input class="form-check-input" type="checkbox" value="1" id="3e" name="3e">
						    <label class="form-check-label" for="3e">
							e) Todas las anteriores
						    </label>
							</div>
					  <!--cierre div	-->	
					  </div>
					</div>
					
					<div class="panel panel-primary">
					  <div class="panel-heading">4. Responda Si o No a las siguientes frases: 1. La Política y las Normas de HSE de la empresa  incluyen :</div>
					  <div class="panel-body">
					  <div class="col-md-12">
						    <label class="form-check-label" for="4a">
							a) Puedo FUMAR o ingerir ALCOHOL  y DROGAS durante el trabajo. (    )
							<select name="4a" id="4a">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							<div class="col-md-12">
						    <label class="form-check-label" for="4b">
							b) Debo utilizar adecuadamente los EPP y cumplir con las normas de HSE dentro de las empresas clientes.(     )
							<select name="4b" id="4b">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							<div class="col-md-12">
						    <label class="form-check-label" for="4c">
							c) Debo respetar y acatar las normas sobre Seguridad, Salud en el Trabajo, Ambiente y Calidad de nuestros clientes.(     )
							<select name="4c" id="4c">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							<div class="col-md-12">
						    <label class="form-check-label" for="4d">
							d) Se pueden usar, alterar y reparar equipos sin autorización. (      )
							<select name="4d" id="4d">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							<div class="col-md-12">
						    <label class="form-check-label" for="4e">
							e) Como trabajador debo tener compromiso y ser responsable con mi trabajo.(     )
							<select name="4e" id="4e">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						    </select>
						    </label>
							</div>
					  <!--cierre div	-->	
					  </div>
					</div>
					
					<div class="panel panel-primary">
					  <div class="panel-heading">5.  Mencione los peligros a los que considera, estará expuesto en su cargo</div>
					  <div class="panel-body"><textarea class="form-control required" id="preg5" name="preg5" rows="3"></textarea>
					  <!--cierre div	-->
					  </div>
					</div>
					
					<div class="panel panel-primary">
     						  <div class="panel-heading">6. De las siguientes situaciones, asigne la  letra correcta, para identificar un acto inseguro, una condicion insegura 
							  y un incidente</div>
                              <div class="panel-body">
							  <div class="col-md-5">
							  Operar un equipo en mal estado.
							  </div>
							  <div class="col-md-1">
							  <select name="6a" id="6a">
							  <option selected="selected" value=""></option>
							  <option value="A">A</option>
							  <option value="B">B</option>
							  <option value="C">C</option>
						      </select>
							  </div>
							  <div class="col-md-6">
							  <p>A. Condición Insegura</p>
							  </div>
							  
							  <div class="col-md-5">
							  Un equipo sin guardas de seguridad.
							  </div>
							  <div class="col-md-1">
							  <select name="6b" id="6b">
							  <option selected="selected" value=""></option>
							  <option value="A">A</option>
							  <option value="B">B</option>
							  <option value="C">C</option>
						      </select>
							  </div>
							  <div class="col-md-6">
							  <p>B. Incidente</p>
							  </div>
							  
							   <div class="col-md-5">
							  Caída de una lampara de vidrio en la ruta de acceso a la planta.
							  </div>
							  <div class="col-md-1">
							  <select name="6c" id="6c">
							  <option selected="selected" value=""></option>
							  <option value="A">A</option>
							  <option value="B">B</option>
							  <option value="C">C</option>
						      </select>
							  </div>
							  <div class="col-md-6">
							  <p>C. Acto inseguro</p>
							  </div>
							 <!--Cierre Panel-->
							  </div>
                            </div>
							
							 <div class="panel panel-primary">
							  <div class="panel-heading">7.  Escriba los nombres de los miembros del COPASST de su centro de trabajo y otro nombre de un miembro de la oficina
							   principal de Asap o de otro centro de trabajo.</div>
							  <div class="panel-body">
							   <div class="form-group">
							  <div class="col-md-6">
							  <input class="form-control required" id="7a" name="7a" type="text">
							  </div>
							  <div class="col-md-6">
							  <input class="form-control required" id="7b" name="7b" type="text">
							  </div>
							  </div>
							   <div class="form-group">
							  <div class="col-md-6">
							  <input class="form-control required" id="7c" name="7c" type="text">
							  </div>
							  <div class="col-md-6">
							  <input class="form-control required" id="7d" name="7d" type="text">
							  </div>
							  </div>
							   <!--Cierre Panel-->
							  </div>
							</div>
							
							<div class="panel panel-primary">
							  <div class="panel-heading">8. ¿Cual es el procedimiento a seguir en caso de ocurrir un accidente de trabajo?</div>
							  <div class="panel-body">
							  <div class="col-md-12">
						    <label class="form-check-label" for="8a">
							a) Informar dos dias despues del accidente.
							<select name="8a" id="8a">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							  <div class="col-md-12">
						    <label class="form-check-label" for="8b">
							b) Informarle inmediatamente a mi jefe y/o al departamento de seguridad y salud en el trabajo.
							<select name="8b" id="8b">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							  <div class="col-md-12">
						    <label class="form-check-label" for="8c">
							c) Portar y conservar siempre mi carné de ARL.
							<select name="8c" id="8c">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							  <div class="col-md-12">
						    <label class="form-check-label" for="8d">
							d) Entregar las incapacidades en las oficinas de ASAP y/o supervisor.
							<select name="8d" id="8d">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							  <div class="col-md-12">
						    <label class="form-check-label" for="8e">
							e) Todas las anteriores, excepto la a.
							<select name="8e" id="8e">
							<option value="1">Si</option>
							<option selected="selected" value="0">No</option>
						  </select>
						    </label>
							</div>
							
							  <!--Cierre Panel-->
							  </div>
							</div>
					
					<div class="panel panel-primary">
					  <div class="panel-heading">9.  Escriba dos nombres de clínicas por las que puede ser atendido en caso de Accidente de Trabajo</div>
					  <div class="panel-body">
					   <div class="form-group">
							  <div class="col-md-6">
							  <input class="form-control required" id="9a" name="9a" type="text">
							  </div>
							  <div class="col-md-6">
							  <input class="form-control required" id="9b" name="9b" type="text">
							  </div>
							  </div>
					  <!--cierre div	-->
					  </div>
					</div>
					
					<div class="panel panel-primary">
					  <div class="panel-heading">10.  Explique brevemente los impactos ambientales que usted puede ocasionar con sus actividades y como puede evitarlos o
					   minimizarlos</div>
					  <div class="panel-body">
					  <textarea class="form-control required" id="preg10" name="preg10" rows="3"></textarea>
					  <!--cierre div	-->
					  </div>
					</div>
					
					<div class="panel panel-primary">
					  <div class="panel-heading">11. Describa cuales son los elementos de protección personal requeridos en su trabajo  de acuerdo a cada parte del cuerpo 
					  y los riesgos de los cuales los está protegiendo :</div>
					  <div class="panel-body">
					      <div class="col-md-2">
							<p>Item</p>
						  </div>
						  <div class="col-md-5">
							<p>EPP</p>
						  </div>
						  <div class="col-md-5">
							<p>Riesgos de los cuales lo protege</p>
						  </div>
						 <!-- fin-->
						    <div class="col-md-2">
							<p>Cabeza</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11a" name="11a" type="text" placeholder="Cabeza Epp">
						  </div>
						  <div class="col-md-5">
						  <input class="form-control required" id="11b" name="11b" type="text" placeholder="Cabeza - Riesgos de los cuales lo protege">
						  </div>
						   <!-- fin-->
						    <div class="col-md-2">
							<p>Manos</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11c" name="11c" type="text">
						  </div>
						  <div class="col-md-5">
						  <input class="form-control required" id="11d" name="11d" type="text">
						  </div>
						   <!-- fin-->
						    <div class="col-md-2">
							<p>Pies</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11e" name="11e" type="text">
						  </div>
						  <div class="col-md-5">
						  <input class="form-control required" id="11f" name="11f" type="text">
						  </div>
						   <!-- fin-->
						    <div class="col-md-2">
							<p>Ojos</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11g" name="11g" type="text">
						  </div>
						  <div class="col-md-5">
						  <input class="form-control required" id="11h" name="11h" type="text">
						  </div>
						   <!-- fin-->
						    <div class="col-md-2">
							<p>Oídos</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11i" name="11i" type="text">
						  </div>
						  <div class="col-md-5">
						  <input class="form-control required" id="11j" name="11j" type="text">
						  </div>
						   <!-- fin-->
						    <div class="col-md-2">
							<p>Cara</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11k" name="11k" type="text">
						  </div>
						  <div class="col-md-5">
						  <input class="form-control required" id="11l" name="11l" type="text">
						  </div>
						   <!-- fin-->
						    <div class="col-md-2">
							<p>Tronco</p>
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11m" name="11m" type="text">
						  </div>
						  <div class="col-md-5">
							<input class="form-control required" id="11n" name="11n" type="text">
						  </div>
					  <!--cierre div	-->
					  </div>
					</div>
					
					<div class="row">
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                          <button type="button" id="regi" class="btn btn-success">
                            <i class="fa fa-save"></i> Registrar Datos</button>
                        </div>
                      </div>
                      </div>
   </form>
</div>        
</div>
	<script type="text/javascript">
	$(document).ready(function(){
		  
		  $('#regi').click(function(){
                             var estado=validarSelect(); 
                             if($("form#registrar").validate().form()==true&&estado==true){             
                              $.ajax({
                                url:'/Induccion_c/insertar',
                                type:'POST',
                                dataType:'JSON',
                                data:$('form#registrar').serialize(),
                                success:function(ans){
                                    if(ans.err=='1'){            
                                       $('form#registrar').get(0).reset();
									    alert('Induccion o Re-Induccion Guardada Correctamente');
	 								    window.location="http://www.asapaseco.com";
                                     }else alert('Error Al Registrar');
                                }
                              });
                           }else alert('Hay campos Requeridos');
                            }); 
		});
		
		function validarSelect(){
                        var estado= true;
                         $('.validar').each(function(index, element) {            
                         if($(this).val()==null||$(this).val()==''){
                           var cod =  $(this).attr('id');             
                          $('div#'+cod+'_chosen ').addClass('chosen-container-active')
                          estado=false;
                        }else{               
                          $('div#'+cod+'_chosen ').removeClass('chosen-container-active') ;
                          estado=true;            
                        }
                        });
                        return estado;
                      }
					  				  
	</script>
	</body>
	</html>