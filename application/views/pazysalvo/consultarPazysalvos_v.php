<script type="text/javascript">
function dtl(){
		oTable = $('#pazysalvo').dataTable( {
		    "order": [[ 1, 'desc' ]],
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/pazysalvo/retirar_c/consultarTodospazysalvo1/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	

$(document).ready(function(){
	    dtl();
		
		 $('#t').datepicker({
		   format: 'yyyy-mm-dd',
            autoclose: true
		 });
	
		$('#update').click(function(){
		if($("#actualizar").validate().form()){
			$.ajax({
					url : '/pazysalvo/retirar_c/actualizarPazysalvo/',
					type : 'POST',
					data : $('form#actualizar').serialize(), 
					success : function (resp){
						if(resp == '1'){
							alert('Proceso Exitoso');
							$('#new').css('display','none');
          				    $('#listado').css('display','block'); 
						}else{
							alert('Error al actualizar');
							}
					}//fin success
			  });
		}else{
			alert('Campos Pendientes por llenar--');	
		 }
	   });
	   
	   $('#cancelar_tbn').click(function(){
	  		$('#new').css('display','none');
          	$('#listado').css('display','block');
	    });
	   
	   $('#update2').click(function(){
		if($("#actualizar").validate().form()){
			$.ajax({
					url : '/pazysalvo/retirar_c/actualizarPazysalvo2/',
					type : 'POST',
					data : $('form#actualizar').serialize(), 
					success : function (resp){
						if(resp == '1'){
							alert('Proceso Exitoso');
							 $('#new').css('display','none');
          				     $('#listado').css('display','block'); 	
						}else{
							alert('Error al actualizar');
							}
					}//fin success
			  });
		}else{
			alert('Campos Pendientes por llenar');	
		 }
	   });

	   $('.ck').on('click',function(){
		 var cod = $(this).val();
		  if(cod=='SI'){
			  $('#valor').css('display','inline-block');
			  $('#valor').removeAttr("disabled");
			  $('#valor').addClass('required digits');
		  }else{
		      $('#valor').val('');
			  $('#valor').css('display','none');
			  $('#valor').attr("disabled");
			  $('#valor').removeClass('required digits');
		 }
		 });
		 
		 $('.dck').on('click',function(){
		 var id = $(this).val();
		  if(id=='SI'){
			  $('#t').css('display','inline-block');
			  $('#t').removeAttr("disabled");
			  $('#t').addClass('required');
			  
		  }else{
		  	  $('#t').val('');
			  $('#t').css('display','none');
			  $('#t').attr("disabled");
			  $('#t').removeClass('required');
		 }
		 });
	
	$('#pazysalvo').on('click','.act',function(){
	datosPazysalvo($(this).attr('data-cod'));
		});
		
		$('#pazysalvo').on('click','.obs',function(){
		var cod = $(this).attr('data-cod');
		$('<iframe id="buscar" frameborder="0" />').attr('src','/pazysalvo/retirar_c/observaciones/'+cod).dialog({
				resizable:false, 
				modal: true,
				width:890, 
				height:495, 
				title: 'Actualizar Observacion Archivo Muerto',
				close : function(v, ui){							
					$(this).remove();
				}
			}).width(890-25);	
		
		});
    
	$('#pazysalvo').on('click','.ver',function(){
	   var cod = $(this).attr('data-cod');
	   window.open('/pazysalvo/retirar_c/imprimirPazysalvo/'+cod,'','scrollbars=yes,width=960,height=650');
	 });
	
});

function datosPazysalvo(codigo){
                         $.ajax({
                         url:'/pazysalvo/retirar_c/datosPazysalvo/',
                         type:'POST',
                         dataType:'JSON',
                         data:{"codigo":codigo},
                         success:function(ans){
                          if(ans.err=='1'){    
						   $('#new').css('display','block');
          				   $('#listado').css('display','none');    
                          $('#numero').val(ans.info.id_pazysalvo);  
						  $('#empresa').val(ans.info.conpor); 
						  $('#periodo').val(ans.info.b);  
						  $('#nit').val(ans.info.id_persona);  
						  $('#nombre').val(ans.info.nombre);  
						  $('#empretiro').val(ans.info.lugardes);  
						  $('#fechar').val(ans.info.e);  
						  $('#causa').val(ans.info.u);  
						  $('#observ').val(ans.info.v);
						  $('#nota').val(ans.info.w);
						  $('#valor').val(ans.info.ll);
						  $('#t').val(ans.info.t);
						  
				if(ans.info.g == 'SI'){ $("#g1").attr('checked', true); } else if (ans.info.g == 'NO'){ $("#g2").attr('checked', true);}else{ $("#g3").attr('checked', true); }
				if(ans.info.n == 'SI'){ $("#n1").attr('checked', true); } else if (ans.info.n == 'NO'){ $("#n2").attr('checked', true);}else{ $("#n3").attr('checked', true); }
				if(ans.info.h == 'SI'){ $("#h1").attr('checked', true); } else if (ans.info.h == 'NO'){ $("#h2").attr('checked', true);}else{ $("#h3").attr('checked', true); }
				if(ans.info.o == 'SI'){ $("#o1").attr('checked', true); } else if (ans.info.o == 'NO'){ $("#o2").attr('checked', true);}else{ $("#o3").attr('checked', true); }
				if(ans.info.i == 'SI'){ $("#i1").attr('checked', true); } else if (ans.info.i == 'NO'){ $("#i2").attr('checked', true);}else{ $("#i3").attr('checked', true); }
				if(ans.info.p == 'SI'){ $("#p1").attr('checked', true); } else if (ans.info.p == 'NO'){ $("#p2").attr('checked', true);}else{ $("#p3").attr('checked', true); }
				if(ans.info.j == 'SI'){ $("#j1").attr('checked', true); } else if (ans.info.j == 'NO'){ $("#j2").attr('checked', true);}else{ $("#j3").attr('checked', true); }
				if(ans.info.q == 'SI'){ $("#q1").attr('checked', true); } else if (ans.info.q == 'NO'){ $("#q2").attr('checked', true);}else{ $("#q3").attr('checked', true); }
				if(ans.info.k == 'SI'){ $("#k1").attr('checked', true); } else if (ans.info.k == 'NO'){ $("#k2").attr('checked', true);}else{ $("#k3").attr('checked', true); }
				if(ans.info.r == 'SI'){ $("#r1").attr('checked', true); } else if (ans.info.r == 'NO'){ $("#r2").attr('checked', true);}else{ $("#r3").attr('checked', true); }
				if(ans.info.l == 'SI'){ $("#l1").attr('checked', true); 
				$('#valor').css('display','inline-block');
			    $('#valor').removeAttr("disabled");
			    $('#valor').addClass('required digits');
				} else if (ans.info.l == 'NO'){ $("#l2").attr('checked', true);}else{ $("#l3").attr('checked', true); }		  				
				if(ans.info.m == 'SI'){ $("#m1").attr('checked', true); } else if (ans.info.m == 'NO'){ $("#m2").attr('checked', true);}else{ $("#m3").attr('checked', true); }	
				if(ans.info.t == 'SI'){ $("#t1").attr('checked', true); } else if (ans.info.t == 'NO'){ $("#t2").attr('checked', true);}else{ $("#t3").attr('checked', true); }	
				if(ans.info.dotacion == 'SI'){ $("#dotacion1").attr('checked', true); 
				$('#t').css('display','inline-block');
			    $('#t').removeAttr("disabled");
			    $('#t').addClass('required');
				} else { $("#dotacion2").attr('checked', true);}
						 }else{
                              alert('Error al Consultar la Informacion');  
                          }
                         } 
                      });
                      }
					  
</script>
 <div id="new" style="display: none;" >
 <form id="actualizar" name="actualizar" method="post">
	<div class="row">
	<div class="col-md-4">
    	<span class="par">Paz y Salvo</span><br>
        <input type="text" id="numero" name="numero" class="form-control dat required" value="" readonly />
   </div>
   <div class="col-md-4">
    	<span class="par">Empresa</span><br>
        <input type="text" id="empresa" name="empresa" class="form-control dat" value="" readonly disabled />
    </div>
	<div class="col-md-4">
    	<span class="par">Periodo de Pago</span><br>
        <input type="text" id="periodo" name="periodo" class="form-control dat" value="" readonly disabled />
   </div>
   </div>
   
   <div class="row">
   <div class="col-md-4">
    	<span class="par">Nit y/o CC</span><br>
        <input type="text" id="nit" name="nit" class="form-control dat" value="" readonly disabled>
   </div>
   <div class="col-md-4">
    	<span class="par">Nombres Y Apellidos</span><br>
        <input type="text" id="nombre" name="nombre" class="form-control dat" value="" readonly disabled />
   </div>
   <div class="col-md-4">
    	<span class="par">Empresa Cliente</span><br>
        <input type="text" id="empretiro" name="empretiro" class="form-control dat" value="" readonly disabled />
    </div>
	</div>
	
	<div class="row">
	<div class="col-md-2">
    	<span class="par">Fecha de Retiro</span><br>
        <input type="text" id="fechar" name="fechar" class="form-control dat" value="" readonly disabled />
    </div>
	<div class="col-md-2">
    	<span class="par">Notas:</span><br>
        <input type="text" id="nota" name="nota" class="form-control dat" value="" readonly disabled />
    </div>
	<div class="col-md-4">
    	<span class="par">Causa de terminaci&oacute;n</span><br>
        <input type="text" id="causa" name="causa" class="form-control dat" value="" readonly disabled />
    </div>
	<div class="col-md-4">
    	<span class="par">Observaci&oacute;n:</span><br>
        <input type="text" id="observ" name="observ" class="form-control dat"  value="" readonly disabled />
    </div>
	</div>

    <table width="100%" id="display">
        <tr>
        	<td width="27%"><span class="par">&raquo; Reporte de producci&oacute;n y/o tiempo en medio f&iacute;sico</span></td>
            <td class="inf" width="11%"> 
            	<input type="radio" id="g1" name="g" value="SI" />SI&nbsp;
        		<input type="radio" id="g2" name="g" value="NO" />NO&nbsp;
        		<input type="radio" id="g3" name="g" value="N/A" />N/A&nbsp;
            </td>
            <td width="22%"><span class="par">&nbsp;&nbsp;&raquo; Se realiz&oacute; examen m&eacute;dico de ingreso</span></td>
            <td class="inf" width="12%">
                <input type="radio" id="n1" name="n" value="SI" />SI&nbsp;
                <input type="radio" id="n2" name="n" value="NO" />NO&nbsp;
                <input type="radio" id="n3" name="n" value="N/A" />N/A&nbsp;
            </td>
        </tr>
        <tr>
        	<td><span class="par">&raquo; Reporte de producci&oacute;n y/o tiempo en medio electr&oacute;nico</span></td>
            <td class="inf"> 
            	<input name="h" type="radio" id="h1" value="SI"/>SI&nbsp;
        		<input name="h" type="radio" id="h2" value="NO" />NO&nbsp;
        		<input name="h" type="radio" id="h3"  value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Se realiz&oacute; examen m&eacute;dico de egreso</span></td>
            <td class="inf">
                <input type="radio" id="o1" name="o" value="SI" />SI&nbsp;
                <input type="radio" id="o2" name="o" value="NO" />NO&nbsp;
                <input type="radio" id="o3" name="o" value="N/A" />N/A&nbsp;
            </td>
            
        </tr>
        <tr>
            <td><span class="par">&raquo; Paz y salvo empresa cliente</span></td>
            <td class="inf">
                <input type="radio" id="i1" name="i" value="SI" />SI&nbsp;
                <input type="radio" id="i2" name="i" value="NO" />NO&nbsp;
                <input type="radio" id="i3" name="i" value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Devoluci&oacute;n de carnet de ASAP - ASECO</span></td>
            <td class="inf"> 
            	<input type="radio" id="p1" name="p" value="SI" />SI&nbsp;
        		<input type="radio" id="p2" name="p" value="NO" />NO&nbsp;
        		<input type="radio" id="p3" name="p" value="N/A" />N/A&nbsp;
            </td>

        </tr>
        <tr>
           <td><span class="par">&raquo; Paz y salvo cooperativa </span></td>
            <td class="inf">
                <input type="radio" id="j1" name="j" value="SI" />SI&nbsp;
                <input type="radio" id="j2" name="j" value="NO" />NO&nbsp;
                <input type="radio" id="j3" name="j" value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Devoluci&oacute;n de carnet de la ARP</span></td>
            <td class="inf">
                <input type="radio" id="q1" name="q" value="SI" />SI&nbsp;
                <input type="radio" id="q2" name="q" value="NO" />NO&nbsp;
                <input type="radio" id="q3" name="q"value="N/A"  />N/A&nbsp;
            </td>
        </tr>
         <tr>
           <td><span class="par">&raquo; Paz y salvo dotaci&oacute;n y herramientas de trabajo</span></td>
            <td class="inf"> 
            	<input type="radio" id="k1" name="k" value="SI" />SI&nbsp;
        		<input type="radio" id="k2" name="k" value="NO" />NO&nbsp;
        		<input type="radio" id="k3" name="k" value="N/A" />N/A&nbsp;
            </td>
            <td><span class="par">&nbsp;&nbsp;&raquo; Devoluci&oacute;n de carnet de la empresa cliente</span></td>
            <td class="inf"> 
            	<input type="radio" id="r1" name="r" value="SI" />SI&nbsp;
        		<input type="radio" id="r2" name="r" value="NO" />NO&nbsp;
        		<input type="radio" id="r3" name="r" value="N/A"  />N/A&nbsp;
            </td>
        	
        </tr>
        <tr>
         <td><span class="par">&raquo; Descuentos pendientes</span></td>
            <td class="inf"> 
            	<input type="radio" id="l1" name="l" value="SI"  class="ck"/>SI&nbsp;
        		<input type="radio" id="l2" name="l" value="NO"  class="ck"/>NO&nbsp;
        		<input type="radio" id="l3" name="l" checked value="N/A" class="ck" />N/A&nbsp;
            </td>
        	<td colspan="2"><span class="par">&nbsp;&nbsp;&raquo; Valor</span>
            &nbsp;<input type="text" id="valor" name="valor" class="vlr" maxlength="10" placeholder="Digite valor" disabled/>
            </td>
        </tr>
         <tr>
         <td><span class="par">&raquo; Se entrego dotaci&oacute;n</span></td>
            <td class="inf">
                <input type="radio" id="dotacion1" name="dotacion" class="dck" value="SI" />SI&nbsp;
                <input type="radio" id="dotacion2" name="dotacion" class="dck" value="NO" checked />NO&nbsp;
            </td>
        	<td colspan="2"><span class="par">&nbsp;&nbsp;&raquo; Fecha de devoluci&oacute;n de dotaci&oacute;n:</span>
            &nbsp;<input type="text" id="t" name="t" class="fchdev" readonly disabled value="" />
            </td>
        </tr>
         <tr>
         <td colspan="3">
            <span class="par">&raquo; Documento anexo: (Notificaci&oacute;n escrita del cliente sobre la terminaci&oacute;n del contrato)</span>
            </td>
            <td class="inf"> 
            	<input type="radio" id="m1" name="m" value="SI" />SI&nbsp;
        		<input type="radio" id="m2" name="m" value="NO" />NO&nbsp;
        		<input type="radio" id="m3" name="m" checked value="N/A" />N/A&nbsp;
            </td>
        	
        </tr>
    </table>
	 <div class="row">
	<div class="col-md-4">
	<center><button class="btn btn-danger" id="update2" type="button" ><i class="fa fa-plus"></i> Cerrar Paz y Salvo </button></center>
	</div>
	<div class="col-md-4">
	<center><button class="btn btn-success" id="update" type="button" ><i class="fa fa-plus"></i> Actualizar Paz y Salvo </button></center>
	</div>
	 <div class="col-md-4">
	 <center><button class="btn btn-warning" id="cancelar_tbn" type="button" ><i class="fa fa-plus"></i> Cancelar </button></center>
	 </div>
	</div>

</form>
 </div>
 <div id="listado">
<table id="pazysalvo" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
    <tr>
		<th width="5%">Id</th>
        <th width="15%">Fecha</th>
        <th width="45%">Empleado</th>
        <th width="20%">Empresa</th>
        <th width="15%">Acciones</th>
    </tr>
</thead> 
<tbody>
</tbody>
</table>
</div>