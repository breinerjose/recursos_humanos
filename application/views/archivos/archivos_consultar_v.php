<script type="text/javascript">
function dtl(){
		oTable = $('#tabla').dataTable( {
			"bProcessing": true,
			"bDestroy" : true,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "/Archivos_c/consultararchivos/",
			"oLanguage": {"sUrl": "/res/js/datatables/media/language/espanol.txt"}
		});
	}	
	
	function actualizarCampo(valor,oid,campo,codexa){
		var response;
		$.ajax({
			url:'/Archivos_c/actualizarCampo/',
			type:'POST',
			dataType:'JSON',
			data:{"valor":valor,"oid":oid,"campo":campo},
			async : false,
			success:function(ans){
				response= ans;
			}
		});
		return response;
	}
	
$(document).ready(function(){
	dtl();
	
	
	$('#tabla').on('click','.borrar',function(){
        var codoid = $(this).attr('codoid');
		var oid = $(this).attr('oid');
      
                                             $.ajax({
                                                url: "/Archivos_c/borrar/",
                                                data: {'oid':oid,'codoid':codoid},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    alert('Borrado Realizado');
													dtl();
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
                   
    });
	
		$('#tabla').on('click','.rvtir',function(){
        var codigo = $(this).attr('data-id');
		var nomemp = $(this).attr('nomemp');
      
                                             $.ajax({
                                                url: "/Archivos_c/prestamo/",
                                                data: {'codigo':codigo,'nomemp':nomemp},
                                                type: "POST",
                                                dataType:"json",
                                                success: function(datos){
                                                    if(datos.msg=='0'){
                                                    alert('Prestamos Realizado');
													dtl();
                                                    }else{
                                                    alert(datos.msg)
                                                    }
                                                }           
                                        });
                   
    });
	/*Inicio detdcm*/
  var valoranterior='';
   $('table.display tbody').on('click','.detdcm',function(event){
   		var valor=$(this).attr('valor');
   		var oid=$(this).attr('oid');
		var campo=$(this).attr('campo'); 
		var codexa=$(this).attr('codexa'); 
   		valoranterior=valor;	
   		var td=$(this).parent();
   		td.html('<p><input type="text" name="" oid="'+oid+'" codexa="'+codexa+'" campo="'+campo+'" class="inpeditdetdcm" value="'+valor+'" /></p>').find('input').focus();
   }).on('keyup','input.inpeditdetdcm',function(event){
   	if(event.which == 13){
						$(this).trigger('blur');
		}
   		
   }).on('blur','input.inpeditdetdcm',function(){
   	var valor=$(this).val();
   	var oid=$(this).attr('oid');
	var campo=$(this).attr('campo'); 
	var codexa=$(this).attr('codexa'); 
   	var td=$(this).parent().parent();
   	if(valor==''){
	  td.html('<p class="detdcm" valor="'+valoranterior+'" codexa="'+codexa+'" oid="'+oid+'" campo="'+campo+'">'+valoranterior+'</p>');
	  return false;
   	}
    var respuesta= actualizarCampo(valor,oid,campo,codexa);
    if(respuesta==1){
   	td.html('<p class="detdcm" valor="'+valor+'" codexa="'+codexa+'" campo="'+campo+'" oid="'+oid+'">'+valor+'</p>');
   }else{
   	 td.html('<p class="detdcm" valor="'+valoranterior+'" codexa="'+codexa+'" campo="'+campo+'" oid="'+oid+'">'+valoranterior+'</p>');
   }
   });	
 /*  Fin detdcm*/
	
});
</script>
<table id="tabla" cellpadding="0" cellspacing="0" class="display" width="100%">
<thead>
<tr>
<th width="10%">Codigo</th>
<th width="60%">Nombre</th>
<th width="10%">Borar</th>
<th width="10%">Caja</th>
<th width="10%">Est</th>
<th width="10%">Acciones</th>
</tr>
</thead> 
<tbody>
</tbody>
</table>
