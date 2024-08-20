<script type="text/javascript">
  $('.fechas').datepicker({
    weekStart: 1,
    language: "es",
    autoclose: true,
    toggleActive: true
});
</script>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" name="">
                    <input type="hidden" name="codemp" value="">
                    <center><h4><strong>DATOS DEL SOLICITANTE</strong></h4></center><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control"   name="codcli">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del funcionario solicitante</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nomfun">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Área donde se desempeñara</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="codare">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div><br>
                      <center><h4><strong>DATOS DE LA CONTRATACIÓN</strong></h4></center><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo a desempeñar</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="codcar">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Labor a realizar</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="labrel" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha requerida de contratación </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control fechas" placeholder="" name="fchcon">
                        </div>

                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha aproximada terminación de la obra </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control fechas" name="fchter">
                        </div>

                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Salario</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="salari">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bonificación</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="bonifi" id="acepto" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="bonifi" id="acepto" value="no">No
                            </label>
                          </div>
                         <div id="boton_docs" style="display: none;">
                            
                        <label class="control-label" >Valor:</label>
                        <div class="">
                          <input type="text" class="form-control" name="valbon">
                        </div>
                      <label class="control-label">Frecuencia:</label>
                        <div class="">
                          <input type="text" class="form-control" name="frebon">
                        </div>
                        <label class="control-label">Salarial:</label>
                        
                          <div class="radio">
                            <label>
                              <input type="radio"  name="salbon" value="si">Si
                            </label>
                             <label>
                              <input type="radio"  name="salbon" value="no">No
                            </label>
                          </div>
                         </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subsidio de alimentación</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="subali" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="subali" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subsidio de transporte</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="subtra" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="subtra" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Transporte (Ruta)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="trarut" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="trarut" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Horario de trabajo</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="hortra" class="form-control">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dotación</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="dotaci" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="dotaci" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere protección auditiva</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="reqaud" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="reqaud" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere protección respiratoria</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="reqres" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="reqres" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere certificado trabajo en alturas</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="reqalt" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="reqalt" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Requiere certificado de espacio confinado</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" name="reqcon" value="si">Si
                            </label>
                             <label>
                              <input type="radio" name="reqcon" value="no">No
                            </label>
                          </div>
                         
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" name="observ" id="observ" rows="3"></textarea>
                        </div>
                      </div><br>
                       
                      <a  class="btn btn-app" id="enviar">
                      <i class="fa fa-save"></i> Guardar
                    </a>
                    </form>
                  </div>
                </div>
              </div>

        </div>
        <!-- /page content -->
            <script>
$(document).ready(function() {
 var toogCheck = jQuery('#acepto');
 var boton = jQuery('#boton_docs');
 $(toogCheck).click(function(event) {
  if ($('#acepto').val() == 'si') {
   boton.show("slow");
  } if ($('#acepto').val() == 'no') {
   alert('prueba');
  }
 });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#enviar').click(function(){
  var codcli = $("input[name=codcli]").val();
  var nomfun = $("input[name=nomfun]").val();
  var codare = $("input[name=codare]").val();
  
  var codcar = $("input[name=codcar]").val();
  var labrel = $("input[name=labrel]").val();
  var fchcon = $("input[name=fchcon]").val();
  var fchter = $("input[name=fchter]").val();
  var salari = $("input[name=salari]").val();
  var bonifi = $("input[name=bonifi]").val();
  var frebon = $("input[name=frebon]").val();
  var subali = $("input[name=subali]").val();
  var valbon = $("input[name=valbon]").val();
  var salbon = $("input[name=salbon]").val();
  
  var subtra = $("input[name=subtra]").val();
  var hortra = $("input[name=hortra]").val();
  var dotaci = $("input[name=dotaci]").val();
  var reqaud = $("input[name=reqaud]").val();
  var reqres = $("input[name=reqres]").val();
   var reqalt = $("input[name=reqalt]").val();
   var reqcon = $("input[name=reqcon]").val();
    var observ = $("#observ").val();
    if (codcli !='' && nomfun !='' && codare !='' && codcar !='' && labrel !='' && fchcon !='' && fchter !='' && salari !='' && bonifi !='' && subali !=''  &&  subtra !='' && hortra !='' && dotaci !='' && reqaud !='' && reqres !='' && reqalt !='' && reqcon !='' && observ !='') {
              $.ajax({
      url:   'solcon_c/insert/',
      data: {codcli, nomfun,codare,codcar,labrel,fchcon,fchter,salari,bonifi,frebon,subali,valbon,salbon,subali,subtra,hortra,dotaci,reqaud,reqres,reqalt,reqcon,observ},
        type:  'post',
        success:  function (response) {
                        var codcli = $("input[name=codcli]").val();
  var nomfun = $("input[name=nomfun]").val("");
  var codare = $("input[name=codare]").val("");
  var addfch = $("input[name=addfch]").val("");
  var codcar = $("input[name=codcar]").val("");
  var labrel = $("input[name=labrel]").val("");
  var fchcon = $("input[name=fchcon]").val("");
  var fchter = $("input[name=fchter]").val("");
  var salari = $("input[name=salari]").val("");
  var bonifi = $("input[name=bonifi]").val("");
  var frebon = $("input[name=frebon]").val("");
  var subali = $("input[name=subali]").val("");
  var valbon = $("input[name=valbon]").val("");
  var salbon = $("input[name=salbon]").val("");
  var subali = $("input[name=subali]").val("");
  var subtra = $("input[name=subtra]").val("");
  var hortra = $("input[name=hortra]").val("");
  var dotaci = $("input[name=dotaci]").val("");
  var reqaud = $("input[name=reqaud]").val("");
  var reqres = $("input[name=reqres]").val("");
   var reqalt = $("input[name=reqalt]").val("");
   var reqcon = $("input[name=reqcon]").val("");
    var observ = $("#observ").val();
        }
      
      });
    }else{
       notif({
          type: "error",
          msg: "¡No deje campos requeridos vacíos!",
          position: "center",
          timeout: 2000
      });
    }
    
});
});
</script>  