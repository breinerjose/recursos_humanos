<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI
class Subir_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->helper('archivocli');
	    $this->load->model('basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	}		

		public function Vista($familia,$codigo,$coddoc){
		$data['familia'] = $familia;
		$data['codigo'] = $codigo;
		$data['coddoc'] = $coddoc;
		$this->load->view('subir_archivo_v',$data);
		}
		
		function subir(){
		$token=date('Y-m-d-H:i:s');
		$token=str_replace ('-','',$token);
		$token=str_replace (':','',$token);
		$token = $this->session->userdata('codigo').$token;
		move_uploaded_file($_FILES['archivo']['tmp_name'] , './res/contratospdf/'.$token.'.pdf');
		
			$data = array('stdarc' => 'inactivo');
			$this->db->where('familia',$this->session->userdata('familia'));
			$this->db->where('codigo',$this->session->userdata('codigo'));
			$this->db->where('coddoc',$this->session->userdata('coddoc'));
			$this->db->update('archivos', $data);
			
			$this->db->set('familia', $this->session->userdata('familia'));
			$this->db->set('codigo', $this->session->userdata('codigo'));
			$this->db->set('coddoc',$this->session->userdata('coddoc'));
			$this->db->set('addusr', $this->session->userdata('user'));
			$this->db->set('addfch', date('Y-m-d h:i:s'));
			$this->db->set('token', $token);
			$this->db->insert('archivos');
	echo "Archivo Cargado Satisfactoriamente";
			}
			
	function enviar($codigo){
	
	//$condicion = array('codigo'=>$codigo,'coddoc'=>'1','stdarc'=>'activo');
	//$res = $this->bas->consultarf('token','archivos',$condicion);
	//if($res != false){ $a=$res['token'].'.pdf';}else{$a='0.pdf';}
	
	//$condicion = array('codigo'=>$codigo,'coddoc'=>'2','stdarc'=>'activo');
	//$res = $this->bas->consultarf('token','archivos',$condicion);
	//if($res != false){$b=$res['token'].'.pdf';}else{$b='0.pdf';}
	
	//$condicion = array('codigo'=>$codigo,'coddoc'=>'3','stdarc'=>'activo');
	//$res = $this->bas->consultarf('token','archivos',$condicion);
	//if($res != false){$c=$res['token'].'.pdf';}else{$c='0.pdf';}
	
	//$condicion = array('codigo'=>$codigo,'coddoc'=>'4','stdarc'=>'activo');
	//$res = $this->bas->consultarf('token','archivos',$condicion);
	//if($res != false){$d=$res['token'].'.pdf';}else{$d='0.pdf';}

	echo enviarcorreo('0','0','0','0',$codigo); 
	echo "Email Enviado";
	
	}	
	
	function foto(){
		if (isset($_FILES["foto"])){
        $foto = './res/fotos/';
		$foto .=$this->input->post('codtrc').'.jpg';
		move_uploaded_file($_FILES['foto']['tmp_name'] , $foto);
		$src='/res/fotos/'.$this->input->post('codtrc').'.jpg';
		echo "<img src='$src'>";
		}
	}
	

}