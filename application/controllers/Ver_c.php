<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ver_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   //$this->load->library('session');
	   //$this->load->model('laboratorio/Ver_m','ver',TRUE);
	   //$this->load->helper('form');
	   //$this->load->helper('url');
	}

	public function Vista_pdf($token){
		$data['archivo']='./res/contratospdf/'.$token.'.pdf';
		$this->load->view('verarchivos/view_file',$data);
		}
	
		public function Vista_hvid($token){
		$data['archivo']='./res/hvid/'.$token.'.pdf';
		$this->load->view('verarchivos/view_file',$data);
		}	
		
}
