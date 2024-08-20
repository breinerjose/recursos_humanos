<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
	
	function mes($mes){
	switch ($mes) {	
    	case "1":
			$mes='ENERO';
        	break;
    	case "2":
			$mes='FEBRERO';
        	break;
        case "3":
			$mes='MARZO';
        	break;
		case "4":
			$mes='ABRIL';
        	break;
    	case "5":
			$mes='MAYO';
        	break;
        case "6":
			$mes='JUNIO';
        	break;
		case "7":
			$mes='JULIO';
        	break;
    	case "8":
			$mes='AGOSTO';
        	break;
        case "9":
			$mes='SEPTIEMBRE';
        	break;
		case "10":
        	$x='10';
			$mes='OCTUBRE';
        	break;	
    	case "11":
			$mes='NOVIEMBRE';
        	break;	
    	case "12":
			$mes='DICIEMBRE';
        	break;	
		}
		return $mes;
	}	

 function listar_archivos_asap($carpeta){
	  $ci =& get_instance();
	  $ci->load->database();
      $correo=array();
	  $final=array();	$get=0; $send=0;	
	  $mes = date("m")-1;

	  			//exit();
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                  // echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
					$sql="select * from correo_enviado where archivo=?";
					$res2=$ci->db->query($sql,$archivo);
				
					if($res2->num_rows()>0){						
						
					}else{
						echo "No enviado ".$archivo."<br>";
						$correo[]=array('archivo'=>$archivo);
					}
                }
            }
            closedir($dir);
        }
		
    }
	
	echo 'Archivos Nuevos: '.$get.'<br>';
	echo 'Archivos Enviados: '.$send.'<br>';
}

 function listar_archivos_aseco($carpeta){
	  $ci =& get_instance();
	  $ci->load->database();
      $correo=array();
	  $final=array();	$get=0; $send=0;	
	  $mes = date("m")-1;
	  			//exit();
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                  // echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
					$sql="select * from correo_enviado where archivo=?";
					$res2=$ci->db->query($sql,$archivo);
				
					if($res2->num_rows()>0){						
						
					}else{
						echo "No enviado ".$archivo."<br>";
						$correo[]=array('archivo'=>$archivo);
					}
                }
            }
            closedir($dir);
        }				
    }
	
}


 function listar_archivos_asapnew($carpeta){
	  $ci =& get_instance();
	  $ci->load->database();
      $correo=array();
	  $final=array();	
	  $get=0; $send=0; $mes = date("m"); $anio=date('Y');
	  if($mes == 1){$mes = 12; $anio -= 1; }else{ $mes = date("m")-1; }
	  $mes=mes($mes);
	  
	  			//exit();
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                  // echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
					$sql="select * from correo_enviado where archivo=?";
					$res2=$ci->db->query($sql,$archivo);
				
					if($res2->num_rows()>0){						
						
					}else{
						echo "No enviado ".$archivo."<br>";
						$correo[]=array('archivo'=>$archivo);
					}
                }
            }
            closedir($dir);
        }

		foreach($correo as $co){			
			$dividir = explode("-", $co['archivo']);
			$sql2="select emaemp from vista_email_cliente  where delusr IS NULL AND nomemp=?";
			$res3=$ci->db->query($sql2,trim($dividir[0]));
			//echo $ci->db->last_query().'<br>';
			//exit();
			if($res3->num_rows()>0){
				$resp=$res3->result_array();
				$final[]=array('emaemp'=>$resp,'archivo'=>$co['archivo']);	
			}
		}

		
		
    }
	
	
	$get=count($final);
	foreach($final as $i=>$fi){
			$nuevo=array();
			foreach($fi['emaemp'] as $co){
				if(verificarCorreo($co['emaemp'])){
					$nuevo[]= $co['emaemp'];
				}
			}
			
				if(count($nuevo)>0){
					$empresa=explode("-",$fi['archivo']);
					$asunto="Seguridad Social";		
					$mensaje1 =  'Sr(a) '.$empresa[0];
					$mensaje2 =  '<p>Buenos Dias</p>
								  <p>Cordial Saludo</p>
								  <p>En Nombre de Asap S.A.S Adjunto seguridad social correspondiente al mes '.$mes.' del a&ntilde;o '.$anio.', dando cumplimiento con lo establecido en el Art. 13 
								  del Decreto 4369 de 2006.</p>
								  <p>Agradezco la atencion prestada</p> 
								  <p>por favor confirmar recibido</p>
								  <p>Enviado mediante Sistema Automatizado</p>
								  <p>Adjuntamos informacion correspondiente</p>';

					$datosCorreo = array('mensaje1'=> $mensaje1, 'mensaje2'=>$mensaje2, 'nombre'=>'','asunto' =>$asunto , 'correo'=>$nuevo, 'adjunto'=> $fi['archivo']);		
				
 
					if(enviarcorreoasap($datosCorreo,$mes,'ASAP',$carpeta)){
					echo "Enviado ".$fi['archivo']."<br>";
						$enviado=array('nomemp'=>$empresa[0],'archivo'=>$fi['archivo'],'ocupor'=>'ASAP');	
						$resp3=$ci->db->insert('correo_enviado',$enviado);
						if($ci->db->affected_rows()>0){
							$send=$send+1;
							
						}
					
					}
				}
		
		
	}
	
	echo 'Archivos Nuevos: '.$get.'<br>';
	echo 'Archivos Enviados: '.$send.'<br>';
	
}

 function listar_archivos_aseconew($carpeta){
	  $ci =& get_instance();
	  $ci->load->database();
      $correo=array();
	  $final=array();	
	  $get=0; $send=0; $mes = date("m"); $anio=date('Y');
	  if($mes == 1){$mes = 12; $anio -= 1; }else{ $mes = date("m")-1; }
	  $mes=mes($mes);
	  //exit();
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                  // echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
					$sql="select * from correo_enviado where archivo=?";
					$res2=$ci->db->query($sql,$archivo);
				        //echo $ci->db->last_query();
					if($res2->num_rows()>0){						
						
					}else{
						echo "No enviado ".$archivo."<br>";
						$correo[]=array('archivo'=>$archivo);
					}
                }
            }
            closedir($dir);
        }

		foreach($correo as $co){			
			$dividir = explode("-", $co['archivo']);
			$sql2="select emaemp from vista_email_cliente  where delusr IS NULL and nomemp=?";
			$res3=$ci->db->query($sql2,trim($dividir[0]));
                        //echo $ci->db->last_query();
			if($res3->num_rows()>0){
				$resp=$res3->result_array();
				$final[]=array('emaemp'=>$resp,'archivo'=>$co['archivo']);	
			}
		}

		
		
    }
	
	
	$get=count($final);
	foreach($final as $i=>$fi){
			$nuevo=array();
			foreach($fi['emaemp'] as $co){
				if(verificarCorreo($co['emaemp'])){
					$nuevo[]= $co['emaemp'];
				}
			}
			
				if(count($nuevo)>0){
					$empresa=explode("-",$fi['archivo']);
					$asunto="Seguridad Social";		
					$mensaje1 =  'Sr(a) '.$empresa[0];
					$mensaje2 =  '<p>Buenos Dias</p>
								  <p>Cordial Saludo</p>
								  <p>En Nombre de Aseco S.A.S Adjunto seguridad social correspondiente al mes '.$mes.' del a&ntilde;o '.$anio.', dando cumplimiento con lo establecido en el Art. 13 
								  del Decreto 4369 de 2006.</p>
								  <p>Agradezco la atencion prestada</p> 
								  <p>por favor confirmar recibido</p>
								  <p>Enviado mediante Sistema Automatizado</p>
								  <p>Adjuntamos informacion correspondiente</p>';

					$datosCorreo = array('mensaje1'=> $mensaje1, 'mensaje2'=>$mensaje2, 'nombre'=>'','asunto' =>$asunto , 'correo'=>$nuevo, 'adjunto'=> $fi['archivo']);		
				
 
					if(enviarcorreoaseco($datosCorreo,$mes,'ASECO',$carpeta)){
					echo "Enviado ".$fi['archivo']."<br>";
						$enviado=array('nomemp'=>$empresa[0],'archivo'=>$fi['archivo'],'ocupor'=>'ASECO');	
						$resp3=$ci->db->insert('correo_enviado',$enviado);
						if($ci->db->affected_rows()>0){
							$send=$send+1;
							
						}
					
					}
				}
		
		
	}
	
	echo 'Archivos Nuevos: '.$get.'<br>';
	echo 'Archivos Enviados: '.$send.'<br>';
	
}

function  verificarCorreo($correo){ 
	return (preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$/", $correo )) ? true : false;
}

function enviarcorreoasap($datosCorreo,$mes,$empresa,$carpeta) {
    $ci = & get_instance();
    $ci->load->library('Phpmailer_lib');
		$b = date("Y");
		$fecha = $mes.' DE '.$b;
    $mail = new PHPMailer();
    try {
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPAuth = true;
        $mail->Host = "premium21.web-hosting.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
        //$mail->Port = 25; //puerto smtp de gmail
        $mail->Username = 'noresponder@asapaseco.com';
        $mail->Password = 'F26ef4a24A..**';
        $mail->SetFrom('noresponder@asapaseco.com', $empresa);
        
        $mail->Subject = $datosCorreo['asunto'];
        $mail->IsHTML(true);
        foreach ($datosCorreo['correo'] as $correo)
        $mail->AddAddress($correo, $datosCorreo['nombre']);
        //$mail->AddBCC("heidy.castro@asapaseco.com");
		$mail->AddBCC("aprendeconbreiner@gmail.com");
        $mail->AltBody = 'Para visualizar este mensaje use un visor HTML compatible!';
        $mail->MsgHTML($ci->load->view('email_v', $datosCorreo, true));
		$mail->AddAttachment($carpeta.'/'.$empresa.' PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.'.pdf');
        $mail->AddAttachment($carpeta.'/'.$datosCorreo['adjunto']);
        $mail->Send();
        return true;
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
		exit();
        return false;
    } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
		exit();
        return false;
    }
}
	
function enviarcorreoaseco($datosCorreo,$mes,$empresa,$carpeta) {
    $ci = & get_instance();
    $ci->load->library('Phpmailer_lib');
		$b = date("Y");
		$fecha = $mes.' DE '.$b;
    $mail = new PHPMailer();
    try {
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPAuth = true;
        $mail->Host = "premium21.web-hosting.com"; //servidor smtp
        //$mail->Port = 25; //puerto smtp de gmail
        $mail->Username = 'noresponder@asapaseco.com';
        $mail->Password = 'F26ef4a24A..**';
        $mail->SetFrom('noresponder@asapaseco.com', $empresa);
        
        $mail->Subject = $datosCorreo['asunto'];
        $mail->IsHTML(true);
        foreach ($datosCorreo['correo'] as $correo)
        $mail->AddAddress($correo, $datosCorreo['nombre']);
        //$mail->AddBCC("heidy.castro@asapaseco.com");
		$mail->AddBCC("aprendeconbreiner@gmail.com");
        $mail->AltBody = 'Para visualizar este mensaje use un visor HTML compatible!';
        $mail->MsgHTML($ci->load->view('email_v', $datosCorreo, true));
		$mail->AddAttachment($carpeta.'/'.$empresa.' PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.' A.pdf');
		$mail->AddAttachment($carpeta.'/'.$empresa.' PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.' B.pdf');
        $mail->AddAttachment($carpeta.'/' . $datosCorreo['adjunto']);
        $mail->Send();
        return true;
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
        return false;
    } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
        return false;
    }
}	

function cargarMenu(){
        $ci =& get_instance();
		$ci->load->database();
		$nriper = $ci->session->userdata('nriper');
		$sql1="select distinct p.codopc,nomopc,iconop from mnupso op inner join mnupag p on p.codpag=op.codpag 
			  inner join mnuopc m on m.codopc=p.codopc where codusu=?";
		$res1=$ci->db->query($sql1,$nriper);
		$sql2="select op.codpag,nompag,codopc,urlpag from mnupso op inner join mnupag p 
			  on p.codpag=op.codpag  where codusu=? order by orden asc";
		$res2=$ci->db->query($sql2,$nriper);
		$resp1=($res1->num_rows()>0)?$res1->result_array():false;
		$resp2=($res2->num_rows()>0)?$res2->result_array():false;
		$opt='';
		if($resp1!=false&&$resp2!=false){
			foreach($resp1 as $row1){
				
				$opt.='<li><a href="#"><i class="'.$row1['iconop'].'"></i>'.$row1['nomopc'].'</a>';
				
				
			$opt.='
						<ul class="sub-menu">';
						foreach($resp2 as $row2){
							if($row1['codopc']==$row2['codopc']){
								$opt.='<li><a href="'.$row2['urlpag'].'">'.$row2['nompag'].'</a></li>';
							}
							
						}
					
			$opt.='</ul></li>';
			}	
		}
		return $opt;
		
		
		
	}
	function breadcrumb($tree,$opcion,$subopcion){
		$ci=& get_instance();
		$ci->load->database();
		$opt='';
		$sql="select trim(nompag) as nompag ,trim(urlpag) as urlpag from mnupag where codpag=?";
		$res=$ci->db->query($sql,$opcion);

				if($res->num_rows()>0){
					$resp=$res->row_array();
					
					$opt.='<div class="page-head">
			 				 <h2>'.$resp['nompag'].'</h2>
			  				 <ol class="breadcrumb">
								<li><a href="/">Inicio</a></li>
								<li><a href="javascript:void(0);">'.$tree.'</a></li>';
					
					$opt.='<li class="active"><a href="'.$resp['urlpag'].'">'.$resp['nompag'].'</a></li>';					
				}
				$opt.='</ol></div>';
		return $opt;
	}
	

	
	
?>