<script type="text/javascript">
$(document).ready(function() {

		$('#generar_reporte_excel').button().on('click',function(e){
		e.preventDefault();
		var fecini = $('#fecini').val();
		var fecfin = $('#fecfin').val();		
		var empleador = $('input:radio[name="empleador"]:checked').val();
        if($('#deveps').is(':checked')){
        var deveps = 1;
        }



		window.open("/incapacidades_c/excela/"+fecini+"/"+fecfin+"/"+empleador+"/"+deveps);	
		});
		
		$( "#fecini" ).datepicker({
		changeMonth: true, 
		changeYear: true,
		format: 'yyyy-mm-dd',
		onClose: function (selectedDate) {
			$("#fecfin").datepicker("option", "minDate", selectedDate);
		},
		 autoclose:true
	});
	
	$('#fecfin').datepicker({
		changeMonth: true, 
		changeYear: true,
		format: 'yyyy-mm-dd',
		onClose: function (selectedDate) {
			$("#fecini").datepicker("option", "maxDate", selectedDate);
		},
		autoclose:true
	});
}); 
</script>		
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <form action="informe2" name="formulario" id="formulario"  method="post">
    <tr>
      <td><div align="center" class="Estilo6">
        <table width="400" border="0" cellspacing="0">
          <tr>
            <td width="400" colspan="4"><table width="100%" border="0" align="center" bgcolor="#599DCA">
              <tr>
                <td width="12%" class="Estilo7">Fecha Inicio.</td>
                <td width="11%" class="Estilo7">Fecha Fin</td>
                </tr>
              <tr>
                <td><input type="text" id="fecini" name="fecini"></td>
                <td><input type="text" id="fecfin" name="fecfin"></td>
                </tr>
              <tr>
                <td class="Estilo7">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="Estilo7">Empleador</td>
                <td><div align="left" class="Estilo7">
                  <input name="empleador" id="empleador"  type="radio" value="ASAP"/>
                  Asap
                  <input name="empleador" id="empleador" type="radio" value="ASECO"/>
              Aseco</div></td>
              </tr>
              <tr>
                <td class="Estilo7">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="Estilo7"> Incapacidades Devueltas </td>
                <td><label>
                  <input name="deveps" id="deveps" type="checkbox" id="deveps" value="1">
                </label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td colspan="2" align="center"><p align="center">
		   <a href="javascript:void(0);" id="generar_reporte_excel" style="float:center;"><img src="/res/icons/excel.png" width="64px" height="40px"/></a>
           </p></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </div>
          <div align="center" class="Estilo3" bgcolor="#D2E9FF"></div></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </form>
</table>