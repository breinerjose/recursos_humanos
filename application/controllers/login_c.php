<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_c extends CI_Controller {

	function __Construct(){
	   parent::__construct();
	   $this->load->model('base/Login_m','login',TRUE);
	    $this->load->model('base/configuracion_m','conf',TRUE);
		$this->load->model('base/usuario_m','usu',	TRUE);
		$this->load->model('Basico_m','bas',	TRUE);
	}

	public function index(){
//	    $this->session->sess_destroy();
		if($this->input->post('user') != '' AND $this->input->post('pass') != ''){
		$this->session->set_userdata('pass',md5(trim($this->input->post('pass'))));
		$this->session->set_userdata('user',trim($this->input->post('user')));
		$res = $this->login->logueo($this->session->userdata('user'),$this->session->userdata('pass'));
		//echo $this->db->last_query();
		if($res != false){
		//echo $this->db->last_query();
		$this->session->set_userdata('nomtrc',$res['nomtrc']);
		$this->session->set_userdata('codsed',$res['codsed']);
		//Armo el meni
		$arbol='';
		//Opciones de Empleado
		$concultarOpciones = $this->login->concultarOpcionesEmpleado($this->session->userdata('user'));
		//echo $this->db->last_query();
		if($concultarOpciones!=false){
			foreach($concultarOpciones as $row){
				$arbol .= '<li><a><i class="'.trim($row['clase']).'"></i>'.trim($row['nomapl']).'<span class="fa fa-chevron-down"></span></a>';
				$arbol .= '<ul class="nav child_menu">';
				$subOpciones = $this->login->subOpcionesEmpleado($this->session->userdata('user'),$row['codapl']);
				if($subOpciones!=false){
				foreach($subOpciones as $rows){
				if(trim($rows['item']) != 'dialogo'){
				$arbol .= ' <li><a  class="mnu" href="javascript:void(0);" url="'.trim($rows['urlpag']).'">'.trim($rows['nompag']).'</a></li>';	
					}else{	
				$arbol .= ' <li><a  class="mnu2" url="'.trim($rows['urlpag']).'">'.trim($rows['nompag']).'</a></li>';
				}
					}
				}
				$arbol .= '</ul></li>';
				}			
		}
		//
		$x = $this->bas->consultarf('cedula','datos',array('estado'=>'Contratado','cedula'=>$this->session->userdata('user')));
		
		if($x == false){ $x = $this->bas->consultarf('numid','contrato',array('estado'=>'ACTIVO','numid'=>$this->session->userdata('user'))); }
		if($x != false or $this->session->userdata('user') == '73214641' or $this->session->userdata('user') == '20230725' or $this->session->userdata('user') == '20170101'){
		$concultarOpciones = $this->login->concultarOpciones($this->session->userdata('user'));
		if($concultarOpciones!=false){
			foreach($concultarOpciones as $row){
				$arbol .= '<li><a><i class="'.trim($row['clase']).'"></i>'.trim($row['nomapl']).'<span class="fa fa-chevron-down"></span></a>';
				$arbol .= '<ul class="nav child_menu">';
				$subOpciones = $this->login->subOpciones($this->session->userdata('user'),$row['codapl']);
				if($subOpciones!=false){
				foreach($subOpciones as $rows){
				if(trim($rows['item']) != 'dialogo'){
				$arbol .= ' <li><a  class="mnu" href="javascript:void(0);" url="'.trim($rows['urlpag']).'">'.trim($rows['nompag']).'</a></li>';	
					}else{	
				$arbol .= ' <li><a  class="mnu2" url="'.trim($rows['urlpag']).'">'.trim($rows['nompag']).'</a></li>';
				}
					}
				}
				$arbol .= '</ul></li>';
				}			
		   }
		}
		//
		
		$data['menu'] = $arbol;
		$this->load->view('/base/principal_vista',$data);	
		}else{
	    $data['msg'] = '<center><button type="button" class="btn btn-danger">Se&#241;or usuario Datos Erroneos!!! Verifique por favor</button></center></br>' ;
	    $this->load->view('/base/login_vista',$data);	
		}
	  }elseif($this->input->post('user') != '' AND $this->input->post('pass') == ''){
	  
	    // $this->output->set_header('Content-type: application/json');
	     //$this->load->helper('correo');
		 $id = trim($this->input->post('user'));
		 $res = $this->conf->consultarcorreo($id);
		 if($res != false){
			 if($res['emltrc']!= ''){
			 $d=date('Y');$m=date('1'.'m');$d=date('1'.'d');
			 $hh=date('1'.'H');$mm=date('1'.'s');$ss=date('1'.'i');
			 $clave = (($d*$hh)+($m*$mm)+($d*$ss)*10);
			 $pass = md5(trim($clave));
				if($this->usu->cambiarPassword($pass, $id)){
				  //$cuerpo = "Su clave de acceso ha sido reestablecida por:: " .trim($clave). "\n"; 
  				  //mando el correo... 
  				  //mail($res['emltrc'],"CLAVE CONTABILIDAD MISION BOSTON",$cuerpo);
				require("class.phpmailer.php");

				$mail = new PHPMailer();
					 
				//Luego tenemos que iniciar la validación por SMTP:
				$mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->Host = "asapaseco.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
				$mail->Username = "noresponder@asapaseco.com"; // Correo completo a utilizar
				$mail->Password = "F26ef4a24A..**"; // Contraseña
				$mail->Port = 25; // Puerto a utilizar
				 
				//Con estas pocas líneas iniciamos una conexión con el SMTP. 
				$mail->From = "noresponder@asapaseco.com"; // Desde donde enviamos (Para mostrar)
				$mail->FromName = "Clave Acceso AsapAseco Servicio en Linea";
					 
				//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: "From: Nombre <correo@dominio.com>");
				$mail->IsHTML(true); // El correo se envía como HTML
					  
				$mail->AddAddress($res['emltrc']); // Esta es la dirección a donde enviamos
				$mail->Subject = "Clave Acceso AsapAseco Servicio en Linea"; // Este es el titulo del email.
				$body = "Cordial Saludo. "."<br>";
				$body .= "Su Clava a sido Rstablecida la Nueva Clave es ".trim($clave)."<br>";
				$mail->Body = $body; // Mensaje a enviar
				$exito = $mail->Send(); // Envía el correo.
				$mail->ClearAddresses();
  				
				 $data['msg'] = '<center><button type="button" class="btn btn-danger">Su nueva clave ha sido enviada al correo: '.$res['emltrc'].'</button></center></br>' ;
	   			 $this->load->view('/base/login_vista',$data);	
	
			  }else{
					   $data['msg'] = '<center><button type="button" class="btn btn-danger">Error al restablecer clave</button></center></br>' ;
	    			   $this->load->view('/base/login_vista',$data);	
				 }
			 }else{ 
					$data['msg'] = '<center><button type="button" class="btn btn-danger">Usted no tiene correo por favor comuniquese con su<br/>
			                                  Coordinador.</button></center></br>' ;
	   				$this->load->view('/base/login_vista',$data); }
		} else{ $data['msg'] = '<center><button type="button" class="btn btn-danger">Usuario No Valido. Su USuario es la Cedula</button></center></br>';
				$this->load->view('/base/login_vista',$data);
			}
			}else{
//	  $this->session->sess_destroy();
	   $data['msg'] = '<center><button type="button" class="btn btn-danger">Se&#241;or usuario Es Obigatorio usuario y Clave!!!</button></center></br>';
	    $this->load->view('/base/login_vista',$data);}
	}
	
		public function menu(){
		if(isset($_SESSION['usuario'])){
			$dep = $this->input->post('dep');
			$opciones = $this->login->concultarOpciones($this->session->userdata('user'),$dep);
			$men = '<div id="menu">';
			if($opciones != false){
			 $men .= '<div id="accordion">';
				   foreach($opciones as $row){
					   $men .= '<h3 id="'.$row['codapl'].'">'.$row['nomapl'].'</h3>'; 
					   $subopc = $this->login->subOpciones($this->session->userdata('user'),$row['codapl']);
					   if($subopc != false){
						  $men .= '<div class="'.$row['codapl'].'"><ul>';
						   foreach($subopc as $row1){
									$men .= '<li><a class="ventana" href="javascript:void(null);" title="'.$row1['nompag'].'"
											data-url="'.$row1['urlpag'].'" data-alt="'.$row1['alto'].'" data-ach="'.$row1['ancho'].'">
											'.$row1['nompag'].'</a></li>';
						   }
						   $men .='</ul></div>';
					   }
				   }
			 
			 $men .= '</div></div>';
			}
			echo $men;
				
			}	
		}
	
	function logueo(){
	$this->load->view('base/login_vista');
	}
	
	function trafico(){
	$this->load->view('mk/principal_v');
	}
	
	function retirar(){
	$this->load->view('pazysalvo/retirar_v');
	}
	
	function carta_retiro(){
	$this->load->view('pazysalvo/carta_retiro_v');
	}

	function vista($vista=''){
		$this->load->view('/'.$vista);
	}
	
	function logout(){
	$this->session->sess_destroy(); 	
	$this->load->view('base/login_vista');

    }
	function cargarMenu(){
		$url=$this->input->post('url');
		$data['ale']= rand(0,10000);
		$data['user']=$this->session->userdata('user');
		$this->load->view($url,$data);		
	}	
}