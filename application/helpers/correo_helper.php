<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function correoPass($datos){
		$ci =& get_instance();
		$ci->load->library('Phpmailer_lib');
		
        $mail = new PHPMailer();
        try {
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->SMTPAuth = true;
            $mail->Host = "premium21.web-hosting.comm"; //servidor smtp
            $mail->Port = 25; //puerto smtp de gmail
            $mail->Username = 'info@asapaseco.com';
            $mail->Password = 'Danna73214641+';
            $mail->SetFrom('info@asapaseco.com', 'Recuperar Contraseña'); 
            $mail->Subject = $datos['asunto'] ;   
			$mail->IsHTML(true);
            $mail->Body = $datos['mensaje'];
            $mail->AddAddress($datos['correo']);
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