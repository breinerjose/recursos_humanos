<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class hoja_de_vida_c extends CI_Controller {

	function __Construct(){
	   parent::__construct();
	   $this->load->model('hoja_de_vida_m','hoja',TRUE);
	   $this->load->model('Basico_m','bas',TRUE);
	   $this->load->library('session');
	}

	function vista($vista=''){
	$this->load->view('hoja_de_vida/'.$vista);
	}	
	
	function vista_induccion($vista,$empresa){
	$data['empresa']=$empresa;
	$this->load->view('hoja_de_vida/'.$vista,$data);
	}	
	
	function vista_registro(){
	$this->load->view('hoja_de_vida/'.$vista);
	}
	
		public function insert_hoja_vida_a()
	{
		$data['primernombre'] = $this->security->xss_clean($this->input->post('primernombre'));
		$data['segundonombre'] = $this->security->xss_clean($this->input->post('segundonombre'));
		$data['primerapellido'] = $this->security->xss_clean($this->input->post('primerapellido'));
		$data['segundoapellido'] = $this->security->xss_clean($this->input->post('segundoapellido'));
		$data['nombres'] = $data['primernombre']." ".$data['segundonombre']." ".$data['primerapellido']." ".$data['segundoapellido'];
		$data['cedula'] = trim($this->security->xss_clean($this->input->post('cedula')));
		$data['decedula'] = $this->security->xss_clean($this->input->post('decedula'));
		$data['fechanacimiento'] = $this->security->xss_clean($this->input->post('fechanacimiento'));
		$data['lugarnacimiento'] = $this->security->xss_clean($this->input->post('lugarnacimiento'));
		$data['email'] = $this->security->xss_clean($this->input->post('email'));
		$data['direccion'] = $this->security->xss_clean($this->input->post('direccion'));
		$data['ciudad'] = $this->security->xss_clean($this->input->post('ciudad'));
		$data['valorarriendo'] = $this->security->xss_clean($this->input->post('valorarriendo'));
		$data['tiempocasaanio'] = $this->security->xss_clean($this->input->post('tiempocasaanio'));
		$data['tiempocasames'] = $this->security->xss_clean($this->input->post('tiempocasames'));
		$data['tipocasa'] = $this->security->xss_clean($this->input->post('tipocasa'));
		$data['telefono'] = $this->security->xss_clean($this->input->post('telefono'));
		$data['celular'] = $this->security->xss_clean($this->input->post('celular'));
		$data['nombrefamiliar'] = $this->security->xss_clean($this->input->post('nombrefamiliar'));
		$data['telefonofamiliar'] = $this->security->xss_clean($this->input->post('telefonofamiliar'));
		$data['nombrevecino'] = $this->security->xss_clean($this->input->post('nombrevecino'));
		$data['telefonovecino'] = $this->security->xss_clean($this->input->post('telefonovecino'));
		$data['estadocivil'] = $this->security->xss_clean($this->input->post('estadocivil'));
		$data['numerohijos'] = $this->security->xss_clean($this->input->post('numerohijos'));
		$data['ultimaempresa'] = $this->security->xss_clean($this->input->post('ultimaempresa'));
		$data['direccionempresa'] = $this->security->xss_clean($this->input->post('direccionempresa'));
		$data['telefonoempresa'] = $this->security->xss_clean($this->input->post('telefonoempresa'));
		$data['cargodesempenado'] = $this->security->xss_clean($this->input->post('cargodesempenado'));
		$data['ultimosalario'] = $this->security->xss_clean($this->input->post('ultimosalario'));
		$data['supervisor'] = $this->security->xss_clean($this->input->post('supervisor'));
		$data['inicioempleo'] = $this->security->xss_clean($this->input->post('inicioempleo'));
		$data['finempleo'] = $this->security->xss_clean($this->input->post('finempleo'));
		$data['bachillerato'] = $this->security->xss_clean($this->input->post('bachillerato'));
		$data['iniciobachillerato'] = $this->security->xss_clean($this->input->post('iniciobachillerato'));
		$data['finbachillerato'] = $this->security->xss_clean($this->input->post('finbachillerato'));
		$data['grado'] = $this->security->xss_clean($this->input->post('grado'));
		$data['estudios'] = $this->security->xss_clean($this->input->post('estudios'));
		$data['institucionestudio'] = $this->security->xss_clean($this->input->post('institucionestudio'));
		$data['inicioestudios'] = $this->security->xss_clean($this->input->post('inicioestudios'));
		$data['finestudios'] = $this->security->xss_clean($this->input->post('finestudios'));
		$data['nombretitulo'] = $this->security->xss_clean($this->input->post('nombretitulo'));
		$data['estudiosactualmente'] = $this->security->xss_clean($this->input->post('estudiosactualmente'));
		$data['ciudadempresa'] = $this->security->xss_clean($this->input->post('ciudadempresa'));
		$data['ultimaempresa1'] = $this->security->xss_clean($this->input->post('ultimaempresa1'));
		$data['direccionempresa1'] = $this->security->xss_clean($this->input->post('direccionempresa1'));
		$data['telefonoempresa1'] = $this->security->xss_clean($this->input->post('telefonoempresa1'));
		$data['cargodesempenado1'] = $this->security->xss_clean($this->input->post('cargodesempenado1'));
		$data['ultimosalario1'] = $this->security->xss_clean($this->input->post('ultimosalario1'));
		$data['supervisor1'] = $this->security->xss_clean($this->input->post('supervisor1'));
		$data['inicioempleo1'] = $this->security->xss_clean($this->input->post('inicioempleo1'));
		$data['finempleo1'] = $this->security->xss_clean($this->input->post('finempleo1'));
		$data['ultimaempresa2'] = $this->security->xss_clean($this->input->post('ultimaempresa2'));
		$data['direccionempresa2'] = $this->security->xss_clean($this->input->post('direccionempresa2'));
		$data['telefonoempresa2'] = $this->security->xss_clean($this->input->post('telefonoempresa2'));
		$data['cargodesempenado2'] = $this->security->xss_clean($this->input->post('cargodesempenado2'));
		$data['ultimosalario2'] = $this->security->xss_clean($this->input->post('ultimosalario2'));
		$data['supervisor2'] = $this->security->xss_clean($this->input->post('supervisor2'));
		$data['inicioempleo2'] = $this->security->xss_clean($this->input->post('inicioempleo2'));
		$data['finempleo2'] = $this->security->xss_clean($this->input->post('finempleo2'));
		$data['sexo'] = $this->security->xss_clean($this->input->post('sexo'));
		$data['ciudadempresa1'] = $this->security->xss_clean($this->input->post('ciudadempresa1'));
		$data['ciudadempresa2'] = $this->security->xss_clean($this->input->post('ciudadempresa2'));
		$data['estudios2'] = $this->security->xss_clean($this->input->post('estudios2'));
		$data['institucionestudio2']=$this->security->xss_clean($this->input->post('institucionestudio2'));
		$data['inicioestudios2'] = $this->security->xss_clean($this->input->post('inicioestudios2'));
		$data['finestudios2'] = $this->security->xss_clean($this->input->post('finestudios2'));
		$data['nombretitulo2'] = $this->security->xss_clean($this->input->post('nombretitulo2'));
		$data['laborppal'] = $this->security->xss_clean($this->input->post('laborppal'));
		$data['funciones1'] = $this->security->xss_clean($this->input->post('funciones1'));
		$data['funciones2'] = $this->security->xss_clean($this->input->post('funciones2'));
		$data['tipbtn'] = $this->security->xss_clean($this->input->post('tipbtn'));
		$data['tipins'] = $this->security->xss_clean($this->input->post('tipins'));
		$this->bas->insertar('datos_hist',$data);
		$this->db->last_query();
		
		if ($data['tipbtn'] == 5){
		$resdata=$this->bas->consultarf('*','datos_hist_fin',array('cedula'=>trim($data['cedula'])));
		//echo $this->db->last_query();
		$dias=$this->hoja->dias_registro(trim($data['cedula']));
		//echo $this->db->last_query();
		//echo $dias['dias'];
		//exit();
		if($dias['dias'] == false or $dias['dias'] > 180){
		$resdata['fechasolicitud'] = date("Y-m-d H:i:s");
		if($dias['estado'] == 'No Preseleccionado'){$resdata['estado']='Por Preseleccionar';}
		else{$resdata['estado'] = $dias['estado'];}
		}else{
		$resdata['fechasolicitud']=$dias['fechasolicitud'];
		$resdata['estado']=$dias['estado'];
		}
		if($resdata['estado'] == ''){$resdata['estado'] = 'Por Preseleccionar';}
		//$data['cedula'] = $this->session->userdata('cedula');
		//echo "Controler";
		$x=$this->bas->consultarf('cedula','datos',array('cedula'=>trim($data['cedula'])));
	    if($x != false){ 
		$this->bas->actualizar('datos',$resdata,array('cedula'=>trim($data['cedula'])));}
		else{ $this->bas->insertar('datos',$resdata);}
		//echo $this->db->last_query();
		echo '0';
		}
		
	}
	

	
	function actualizarDatosHojaVida(){
		$this->output->set_header('Content-type:application/json');	
		$where = array('cedula'=>trim($this->security->xss_clean($this->session->userdata('user'))));

		$data['fechanacimiento'] = $this->security->xss_clean($this->input->post('FechaNacimiento'));
		$data['LugarNacimiento'] = $this->security->xss_clean($this->input->post('LugarNacimiento'));
		$data['Email'] =($this->input->post('Email'))? $this->security->xss_clean($this->input->post('Email')):null;
		$data['Direccion'] = $this->security->xss_clean($this->input->post('Direccion'));
		$data['Ciudad'] = $this->security->xss_clean($this->input->post('Ciudad'));
		$data['Sexo'] = $this->security->xss_clean($this->input->post('Sexo'));
		$data['TipoCasa'] = $this->security->xss_clean($this->input->post('TipoCasa'));
		if($this->input->post('TipoCasa')=='Arrendada')$data['ValorArriendo'] =$this->security->xss_clean($this->input->post('ValorArriendo'));
		$data['TiempoCasaAnio'] =$this->security->xss_clean($this->input->post('TiempoCasaAnio'));
		$data['TiempoCasaMes'] = $this->security->xss_clean($this->input->post('TiempoCasaMes'));	
		$data['Telefono'] = ($this->input->post('Telefono')!='')?$this->security->xss_clean($this->input->post('Telefono')):'';// valor not null
        $data['Celular'] = ($this->input->post('Celular')!='')?$this->security->xss_clean($this->input->post('Celular')):'';// valor not null
        $data['NombreFamiliar'] = $this->security->xss_clean($this->input->post('NombreFamiliar'));
		$data['TelefonoFamiliar'] = $this->security->xss_clean($this->input->post('TelefonoFamiliar'));
		$data['EstadoCivil'] = $this->security->xss_clean($this->input->post('EstadoCivil'));
		$data['NumeroHijos'] = ($this->input->post('NumeroHijos'))?$this->security->xss_clean($this->input->post('NumeroHijos')):0;	
		$data['NombreVecino'] = $this->security->xss_clean($this->input->post('NombreVecino'));
		$data['TelefonoVecino'] = $this->security->xss_clean($this->input->post('TelefonoVecino'));
		
		$data['UltimaEmpresa'] = ($this->input->post('UltimaEmpresa')!='')?$this->security->xss_clean($this->input->post('UltimaEmpresa')):'';//not null
		$data['DireccionEmpresa'] =($this->input->post('DireccionEmpresa')!='')?$this->security->xss_clean($this->input->post('DireccionEmpresa')):'';//not null
		$data['TelefonoEmpresa'] = ($this->input->post('TelefonoEmpresa')!='')?$this->security->xss_clean($this->input->post('TelefonoEmpresa')):'';
		$data['CargoDesempenado'] = ($this->input->post('CargoDesempenado')!='')?$this->security->xss_clean($this->input->post('CargoDesempenado')):'';// not null
		$data['UltimoSalario'] =($this->input->post('UltimoSalario'))?$this->security->xss_clean($this->input->post('UltimoSalario')):'';// not null
		$data['Supervisor'] = ($this->input->post('Supervisor')!='')?$this->security->xss_clean($this->input->post('Supervisor')):'';//// not null
		$data['InicioEmpleo'] =($this->input->post('InicioEmpleo')!='')? $this->security->xss_clean($this->input->post('InicioEmpleo')):'';// not null
		$data['FinEmpleo'] = ($this->input->post('FinEmpleo')!='')?$this->security->xss_clean($this->input->post('FinEmpleo')):'';//not null
		$data['Bachillerato'] = ($this->input->post('Bachillerato')!='')?$this->security->xss_clean($this->input->post('Bachillerato')):'';// not null

		$data['InicioBachillerato'] = $this->security->xss_clean($this->input->post('InicioBachillerato'));//not null
		$data['FinBachillerato'] = $this->security->xss_clean($this->input->post('FinBachillerato'));//not null
		$data['Grado'] = $this->security->xss_clean($this->input->post('Grado'));// not null
		$data['Estudios'] = $this->security->xss_clean($this->input->post('Estudios'));// not null
		$data['InstitucionEstudio'] = $this->security->xss_clean($this->input->post('InstitucionEstudio'));// not null
		$data['InicioEstudios'] = $this->security->xss_clean($this->input->post('InicioEstudios'));// not null
		$data['FinEstudios'] = $this->security->xss_clean($this->input->post('FinEstudios'));// not null
		$data['NombreTitulo'] = $this->security->xss_clean($this->input->post('NombreTitulo'));// not null
		$data['EstudiosActualmente'] = $this->security->xss_clean($this->input->post('EstudiosActualmente'));// not null
		$data['CiudadEmpresa'] =($this->input->post('CiudadEmpresa'))?$this->security->xss_clean($this->input->post('CiudadEmpresa')):null;
		$data['UltimaEmpresa1'] = ($this->input->post('UltimaEmpresa1')!='')?$this->security->xss_clean($this->input->post('UltimaEmpresa1')):'';// not null
		$data['DireccionEmpresa1'] =($this->input->post('DireccionEmpresa1')!='')?$this->security->xss_clean($this->input->post('DireccionEmpresa1')):'';// not null
		$data['TelefonoEmpresa1'] = ($this->input->post('TelefonoEmpresa1')!='')?$this->security->xss_clean($this->input->post('TelefonoEmpresa1')):'';// not null
		$data['CargoDesempenado1'] = ($this->input->post('CargoDesempenado1')!='')?$this->security->xss_clean($this->input->post('CargoDesempenado1')):'';// not null
		$data['UltimoSalario1'] = ($this->input->post('UltimoSalario1')!='')?$this->security->xss_clean($this->input->post('UltimoSalario1')):'';// not null
		$data['Supervisor1'] = ($this->input->post('Supervisor1')!='')?$this->security->xss_clean($this->input->post('Supervisor1')):'';// not null
		$data['InicioEmpleo1'] = ($this->input->post('InicioEmpleo1')!='')?$this->security->xss_clean($this->input->post('InicioEmpleo1')):'';// not null
		$data['FinEmpleo1'] = $this->security->xss_clean($this->input->post('FinEmpleo1'));// not null
		$data['UltimaEmpresa2'] = $this->security->xss_clean($this->input->post('UltimaEmpresa2'));// not null
		$data['DireccionEmpresa2'] = $this->security->xss_clean($this->input->post('DireccionEmpresa2'));// not null
		$data['TelefonoEmpresa2'] = $this->security->xss_clean($this->input->post('TelefonoEmpresa2'));// not null
		$data['CargoDesempenado2'] = $this->security->xss_clean($this->input->post('CargoDesempenado2'));// not null
		$data['UltimoSalario2'] = $this->security->xss_clean($this->input->post('UltimoSalario2'));// not null
		$data['Supervisor2'] = $this->security->xss_clean($this->input->post('Supervisor2'));// not null
		$data['InicioEmpleo2'] = $this->security->xss_clean($this->input->post('InicioEmpleo2'));// not null
		$data['FinEmpleo2'] = $this->security->xss_clean($this->input->post('FinEmpleo2'));// not null
	
		$data['CiudadEmpresa1'] = ($this->input->post('CiudadEmpresa1')!='')?$this->security->xss_clean($this->input->post('CiudadEmpresa1')):null;
		$data['CiudadEmpresa2'] = ($this->input->post('CiudadEmpresa2')!='')?$this->security->xss_clean($this->input->post('CiudadEmpresa2')):null;
		$data['Estudios2'] = ($this->input->post('Estudios2'))?$this->security->xss_clean($this->input->post('Estudios2')):null;
		$data['InstitucionEstudio2'] =($this->input->post('InstitucionEstudio2')!=false)?$this->security->xss_clean($this->input->post('InstitucionEstudio2')):null;
		$data['InicioEstudios2'] =($this->input->post('InicioEstudios2')!='')?$this->security->xss_clean($this->input->post('InicioEstudios2')):null;
		$data['FinEstudios2'] = ($this->input->post('FinEstudios2')!='')?$this->security->xss_clean($this->input->post('FinEstudios2')):null;
		$data['NombreTitulo2'] = ($this->input->post('NombreTitulo2')!='')?$this->security->xss_clean($this->input->post('NombreTitulo2')):null;
		$data['laborppal'] = $this->security->xss_clean($this->input->post('laborppal'));
		//$data['FechaSolicitud'] = date("Y-m-d H:i:s");// not null
		if($data['laborppal']  != ''){
		$resp=$this->hoja->actualizarDatosHojaVida($data,$where);
		echo ($resp!=false)?'{"err":"1"}':'{"msg":"hubo un error al actulizar los Datos"}';	
		}
	
	}
	
	function cargarDatos(){
		$this->output->set_header('Content-type:application/json');	
		$nriper=$this->input->post('nriper');
		$resp=$this->hoja->cargarDatos($nriper);
		if($resp!=false){
		$data=array();		
		$data['estado'] = $this->security->xss_clean($resp['estado']);
		$data['primernombre'] = $this->security->xss_clean($resp['primernombre']);
		$data['segundonombre'] = $this->security->xss_clean($resp['segundonombre']);
		$data['primerapellido'] = $this->security->xss_clean($resp['primerapellido']);
		$data['segundoapellido'] = $this->security->xss_clean($resp['segundoapellido']);
		$data['nombres'] = $data['primernombre']." ".$data['segundonombre']." ".$data['primerapellido']." ".$data['segundoapellido'];
		$data['cedula'] = trim($this->security->xss_clean($resp['cedula']));
		$data['decedula'] = $this->security->xss_clean($resp['decedula']);
		$data['fechanacimiento'] = $this->security->xss_clean($resp['fechanacimiento']);
		$data['lugarnacimiento'] = $this->security->xss_clean($resp['lugarnacimiento']);
		$data['email'] = $this->security->xss_clean($resp['email']);
		$data['direccion'] = $this->security->xss_clean($resp['direccion']);
		$data['ciudad'] = $this->security->xss_clean($resp['ciudad']);
		$data['valorarriendo'] = $this->security->xss_clean($resp['valorarriendo']);
		$data['tiempocasaanio'] = $this->security->xss_clean($resp['tiempocasaanio']);
		$data['tiempocasames'] = $this->security->xss_clean($resp['tiempocasames']);
		$data['tipocasa'] = $this->security->xss_clean($resp['tipocasa']);
		$data['telefono'] = $this->security->xss_clean($resp['telefono']);
		$data['celular'] = $this->security->xss_clean($resp['celular']);
		$data['nombrefamiliar'] = $this->security->xss_clean($resp['nombrefamiliar']);
		$data['telefonofamiliar'] = $this->security->xss_clean($resp['telefonofamiliar']);
		$data['nombrevecino'] = $this->security->xss_clean($resp['nombrevecino']);
		$data['telefonovecino'] = $this->security->xss_clean($resp['telefonovecino']);
		$data['estadocivil'] = $this->security->xss_clean($resp['estadocivil']);
		$data['numerohijos'] = $this->security->xss_clean($resp['numerohijos']);
		$data['ultimaempresa'] = $this->security->xss_clean($resp['ultimaempresa']);
		$data['direccionempresa'] = $this->security->xss_clean($resp['direccionempresa']);
		$data['telefonoempresa'] = $this->security->xss_clean($resp['telefonoempresa']);
		$data['cargodesempenado'] = $this->security->xss_clean($resp['cargodesempenado']);
		$data['ultimosalario'] = $this->security->xss_clean($resp['ultimosalario']);
		$data['supervisor'] = $this->security->xss_clean($resp['supervisor']);
		$data['inicioempleo'] = $this->security->xss_clean($resp['inicioempleo']);
		$data['finempleo'] = $this->security->xss_clean($resp['finempleo']);
		$data['bachillerato'] = $this->security->xss_clean($resp['bachillerato']);
		$data['iniciobachillerato'] = $this->security->xss_clean($resp['iniciobachillerato']);
		$data['finbachillerato'] = $this->security->xss_clean($resp['finbachillerato']);
		$data['grado'] = $this->security->xss_clean($resp['grado']);
		$data['estudios'] = $this->security->xss_clean($resp['estudios']);
		$data['institucionestudio'] = $this->security->xss_clean($resp['institucionestudio']);
		$data['inicioestudios'] = $this->security->xss_clean($resp['inicioestudios']);
		$data['finestudios'] = $this->security->xss_clean($resp['finestudios']);
		$data['nombretitulo'] = $this->security->xss_clean($resp['nombretitulo']);
		$data['estudiosactualmente'] = $this->security->xss_clean($resp['estudiosactualmente']);
		$data['ciudadempresa'] = $this->security->xss_clean($resp['ciudadempresa']);
		$data['ultimaempresa1'] = $this->security->xss_clean($resp['ultimaempresa1']);
		$data['direccionempresa1'] = $this->security->xss_clean($resp['direccionempresa1']);
		$data['telefonoempresa1'] = $this->security->xss_clean($resp['telefonoempresa1']);
		$data['cargodesempenado1'] = $this->security->xss_clean($resp['cargodesempenado1']);
		$data['ultimosalario1'] = $this->security->xss_clean($resp['ultimosalario1']);
		$data['supervisor1'] = $this->security->xss_clean($resp['supervisor1']);
		$data['inicioempleo1'] = $this->security->xss_clean($resp['inicioempleo1']);
		$data['finempleo1'] = $this->security->xss_clean($resp['finempleo1']);
		$data['ultimaempresa2'] = $this->security->xss_clean($resp['ultimaempresa2']);
		$data['direccionempresa2'] = $this->security->xss_clean($resp['direccionempresa2']);
		$data['telefonoempresa2'] = $this->security->xss_clean($resp['telefonoempresa2']);
		$data['cargodesempenado2'] = $this->security->xss_clean($resp['cargodesempenado2']);
		$data['ultimosalario2'] = $this->security->xss_clean($resp['ultimosalario2']);
		$data['supervisor2'] = $this->security->xss_clean($resp['supervisor2']);
		$data['inicioempleo2'] = $this->security->xss_clean($resp['inicioempleo2']);
		$data['finempleo2'] = $this->security->xss_clean($resp['finempleo2']);
		$data['sexo'] = $this->security->xss_clean($resp['sexo']);
		$data['ciudadempresa1'] = $this->security->xss_clean($resp['ciudadempresa1']);
		$data['ciudadempresa2'] = $this->security->xss_clean($resp['ciudadempresa2']);
		$data['estudios2'] = $this->security->xss_clean($resp['estudios2']);
		$data['institucionestudio2'] = $this->security->xss_clean($resp['institucionestudio2']);
		$data['inicioestudios2'] = $this->security->xss_clean($resp['inicioestudios2']);
		$data['finestudios2'] = $this->security->xss_clean($resp['finestudios2']);
		$data['nombretitulo2'] = $this->security->xss_clean($resp['nombretitulo2']);
		$data['laborppal'] = $this->security->xss_clean($resp['laborppal']);
		$data['fechasolicitud'] = date("Y-m-d H:i:s");
		//$data['cedula'] = $this->session->userdata('cedula');
		$data['cedula'] =trim($this->security->xss_clean($resp['cedula']));
		$out=array('err'=>'1','info'=>$data);
		echo json_encode($out);
		}else echo '{"err":"0","msg":"no hay datos "}';
		
	}
	
	function tokenizado(){
		$token=date('d-n-g-W-j-u-Y-N-m-w-z-L-H-s-h');
		$token=str_replace ('-','',$token);
		$data['cedula'] = trim($this->security->xss_clean($this->input->post('cedula')));
		move_uploaded_file($_FILES['archivo']['tmp_name'] , './res/hvid/'.$token.'.pdf');
		$this->bas->actualizar('datos',array('token'=>$token),array('cedula'=>trim($data['cedula'])));
	}

	
	
}