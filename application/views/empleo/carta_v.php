   <script type="text/javascript">
    $(document).ready(function () {
        $('.buscar').on('shown.bs.modal', function () {
            $('.buscar input[type="search"]').focus();
        });

        $('.imgbuscar').click(function () {
            cod_vista = $(this).attr('vista');
            $(cod_vista).modal();
        });
		
		$('#generar<?php echo $ale; ?>').click(function () {
                var data = $('#cabecera').serialize();
                if ($('#cabecera').validationEngine('validate', {promptPosition: "topLeft", scroll: false})) {
                     window.open('/Carta_c/generar_carta?' + data, '_blank');
                } else {
                    new PNotify({
                        title: 'Concepto',
                        text: 'Falta Llenar Campos Obligatorios',
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }
        });

	 //enter
        $('#codtrc').keyup(function (event) {
            if (event.which == 13) {
                cargarDatosProvedor($(this).val());
                $("#codcts").focus();
            }
        });

        //pierde el focus
        $('#codtrc').on('change', function () {
            cargarDatosProvedor($(this).val());
            $("#codcts").focus();
        });
		
 });
 
 function cargarDatosProvedor(codtrc) {
    $.post('/Terceros_c/cargarDatosProvedor', {"codtrc": codtrc}, function (ans) {
        if (ans.err == '1') {
            $('#nomtrc').val(ans.nomtrc);
        }
    }, 'JSON');
}

 </script>
   <!-- AQUI VA EL CONTENIDO /-->
                            <div class="container">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="row">
                                            <form id="cabecera" name="cabecera">
											  		   <div class="col-md-2">
                                                            <div class="input-group">
															 <select id="empresa" name="empresa"  data-placeholder="Seleccione " class="chosen-select form-control">
															 <option>ASAP</option>
															 <option>ASECO</option>
															 <option>DISTRI</option>
                                                            </select>
															</div>
														</div>	
													  <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="text" id="codtrc" name="codtrc" class="form-control required">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-primary imgbuscar" id="imgbuscar" vista="#busquedatercerosa" >
																	<i class="fa fa-search" aria-hidden="true"></i>
                                                                    </button>
                                                                </span>
                                                            </div><!-- /input-group -->
                                                        </div><!-- /.col-lg-2 -->
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <input type="text" id="nomtrc" name="nomtrc" class="form-control required">
                                                            </div><!-- /input-group -->
                                                        </div><!-- /.col-lg-6 -->
														<div class="col-md-2">
                                                            <div class="input-group">
															<button type="button" class="btn btn-primary" id="generar<?php echo $ale; ?>" >Generar Carta</button>
															</div>
														</div>	
											</form>
										</div>
									</div>
								</div>
							</div>				 
 
 <div class="modal fade bs-example-modal-lg buscar" tabindex="-1" role="dialog" id="busquedatercerosa">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terceros</h5>
                </div>
                <div class="modal-body">
                    <script type="text/javascript">
                        function table() {
                            $('#e').dataTable({
                                "bProcessing": true,
                                "bDestroy": true,
                                "bPaginate": true,
                                "sPaginationType": "full_numbers",
                                "sAjaxSource": "/Terceros_c/cargarListadoTerceros/",
                                "oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
                            });
                        }

                        $(document).ready(function () {
                            table();
                            $('#e').on('click', '.cod', function () {
                                $('#codtrc').val($(this).attr('id'));
								$('#nomtrc').val($(this).attr('nom'));
                                $('#busquedatercerosa').modal('toggle');
                            });
                        });
                    </script>

                    <table id="e" cellpadding="0" cellspacing="0" class="display" width="100%">
                        <thead>
                            <tr>
                                <th width="20%">Codigo</th>
                                <th width="40%">Nombres</th>
                            </tr>
                        </thead> 
                        <tbody>

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>