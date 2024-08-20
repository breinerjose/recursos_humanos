<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');		

function  verificarCorreo($correo){ 
	return (preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$/", $correo )) ? true : false;
}

function enviarcorreo($archivo1,$archivo2,$archivo3,$archivo4,$codigo) {
	$carpeta='F:\wamp\www\extranet\res\contratospdf';
    $ci = & get_instance();
    $ci->load->library('Phpmailer_lib');
    $mail = new PHPMailer();
    try {
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPAuth = true;
        $mail->Host = "mail.asapaseco.com"; //servidor smtp
        $mail->Port = 25; //puerto smtp de gmail
        $mail->Username = 'noresponder@asapaseco.com';
        $mail->Password = 'F26ef4a24A..**';
        $mail->SetFrom('miriam.ulloque@asapaseco.com', 'Miriam Ulloque');
        $mail->Subject = 'Archivos de Contratacion';
        $mail->IsHTML(true);
        $mail->AddAddress('sarith.pacheco@grupodistri.com', 'Sarith Pacheco');
		$mail->AddAddress('carlos.angulo@grupodistri.com', 'Carlos Angulo');
		$mail->AddBCC('miriam.ulloque@asapaseco.com', 'Miriam Ulloque');
        $mail->AddBCC("aprendeconbreiner@gmail.com");
        $mail->AltBody = 'Para visualizar este mensaje use un visor HTML compatible!';
		$data['codigo']=$codigo;
        $mail->MsgHTML($ci->load->view('emailcliente_v', $data, true));
		//$mail->AddAttachment('./'.$carpeta.'/'.$empresa.' PAGO PLANILLA SEGURIDAD SOCIAL MES '.$fecha.'.pdf');
        //$mail->AddAttachment($carpeta.'/' . $archivo1);
		//$mail->AddAttachment($carpeta.'/' . $archivo2);
		//$mail->AddAttachment($carpeta.'/' . $archivo3);
		//$mail->AddAttachment($carpeta.'/' . $archivo4);
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
	
?>