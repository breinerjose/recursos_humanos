<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tarifa_c_c extends CI_Controller {
	   function __Construct(){
	   parent::__construct();
//	   $this->load->model('laboratorio/clientes_m','cli',TRUE);
	   $this->load->helper('form');
	   $this->load->helper('url');	
//	    if($this->session->userdata('user') == ''){
		 if('' != ''){ 
			echo  "<script language=\"JavaScript\">   alert(\"SU SESION A CADUCA INGRESE NUEVAMENTE\") </script>";
			exit(); }
	}
	
		function vista($vista=''){
		$this->load->view('laboratorio/tarifa/'.$vista);
		}

		function consultarcertificados($fecini,$fecfin){
		$this->output->set_header('Content-type: application/json');
		$res = $this->cli->consultarcertificados($fecini,$fecfin,$this->session->userdata('user'));
		$output = array("aaData" => array());
		if ($res != false){
			 foreach ($res as $row){
				 if(trim($row['historia'])!='Activo'){
					$images = "<form class='pull-left' action='../laboratorio/certificados_c/print_concepto' target='emergente' 
					onSubmit='emergente = window.open(this.action , 'emergente')' method='post'>
						<input type='hidden' name='historia' value='".$row['historia']."'>
						<button type='submit' target='_blank' class='btn btn-primary'><i class='fa fa-print'></i></button>
							</form>";
					$images .= "<form class='pull-left' action='../laboratorio/certificados_c/certi_altura' target='emergente' 
					onSubmit='emergente = window.open(this.action , 'emergente')' method='post'>
						<input type='hidden' name='historia' value='".$row['historia']."'>
						<button type='submit' target='_blank' class='btn btn-success'><i class='fa fa-print'></i></button>
							</form>";
					$images .= "<form class='pull-left' action='../laboratorio/certificados_c/certi_altura' target='emergente' 
					onSubmit='emergente = window.open(this.action , 'emergente')' method='post'>
						<input type='hidden' name='historia' value='".$row['historia']."'>
						<button type='submit' target='_blank' class='btn btn-info'><i class='fa fa-print'></i></button>
							</form>";				
				 }else{
					$images = " <a href='#' title='Activar Usuario'  class='act'  data-ide='".$row['nriper']."' 
							   data-nom='".$row['nomtrc']."'><img src='/res/icons/sirco/user.png' width='16'
							   height='16' /></a >";
				 }
				 
			   $output['aaData'][] = array($row['historia'],$row['fecha'],$row['id'],$row['nombre'],$images);
			}	          
		}
		echo json_encode($output);
	}
	
	public function insert_tarifa()
	{
		$data['codemp'] = $this->security->xss_clean($this->input->post('codemp'));
		$data['codcli'] = $this->security->xss_clean($this->input->post('codcli'));
		$data['nomfun'] = $this->security->xss_clean($this->input->post('nomfun'));
		$data['addfch'] = date("Y-m-d H:i:s");
		$data['addusr'] = $this->session->userdata('user');
		$this->sol->insert($data);
	}
 }