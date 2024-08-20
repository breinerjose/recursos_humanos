<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
class Actualizar_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   set_time_limit(0); 
	   ini_set("memory_limit", "999M");
	   ini_set("max_execution_time", "99999"); 
	   $this->load->model('basico_my','bas',TRUE);
	   $this->load->model('basicol_m','post',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function infozeus(){
		
		$condi=array('estado'=>'0');
		$resp=$this->bas->consultar('familia, conpor','familias',$condi);
		$this->bas->borrar('datoszeus',array('Cedula !='=>'0'));
		foreach($resp as $rowf){
		extract($rowf);
		$consql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
		$query = "SELECT Nm_Empleado.Identificacion as Cedula, Nm_Empleado.Nombres, Nm_Empleado.Direccion, Nm_Empleado.Telefono1 AS Telefono, Nm_Empleado.Telefono2 AS Celular, Nm_Empleado.Email, CONVERT(char, FechaNacimiento, 103) AS FechaNacimiento, NoHijos FROM Nm_Empleado"; 
		foreach ($consql->query($query) as $row){
		$data=array('Cedula'=>$row['Cedula'],'Nombres'=>$row['Nombres'],'Direccion'=>$row['Direccion'],'Telefono'=>$row['Telefono'],'Celular'=>$row['Celular'],'Email'=>$row['Email'],'FechaNacimiento'=>$row['FechaNacimiento'],'NoHijos'=>$row['NoHijos']);
		$this->bas->insertar('datoszeus',$data);
		}
	}
	}
	
	function actualizar_noche(){
	    $condi=array('id_persona !='=>'0');
		$resp=$this->bas->consultar_group('max(id_pazysalvo) AS id_pazysalvo','bre_pazysalvo',$condi,'id_persona');
		foreach($resp as $rowf){
		extract($rowf);
		$conx=array('id_pazysalvo'=>$id_pazysalvo);
		$rows=$this->bas->consultarf('estadofin, id_persona','bre_pazysalvo',$conx);
		extract($rows);
		$data=array('Estado'=>$estadofin);
		$conz=array('Cedula'=>$id_persona);
		$this->bas->actualizar('datos',$data,$conz);
		}
		
		$data=array('estado'=>'Archivo Muerto');
		$condi=array('Estado'=>'Contratado');
		$this->bas->actualizar('datos',$data,$condi);
		
		$condi=array('estado'=>'0');
		$resp=$this->bas->consultar('familia, conpor','familias',$condi);
		foreach($resp as $rowf){
		extract($rowf);
		$ocupor=strtoupper($conpor);

$consql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
$query = "select Nm_FondoSalud.IDEN AS codeps, Nm_FondoSalud.Nombre AS nomeps, Nm_Contrato.Inactivo, Nm_Contrato.Indretirado, Nm_Contrato.TipoContrato, Nm_Contrato.Codigo AS Codigo, Nm_Contrato.CentroCosto AS CentroCosto, Nm_Contrato.IDEN as IDEN, Nm_Contrato.IDEN_PeriodoInicio AS IDEN_PeriodoInicio, Nm_Contrato.SueldoBasico AS salario,  Nm_Empleado.Identificacion as numid, Nm_Empleado.Nombres AS nombre, Nm_Empleado.Direccion, Nm_Empleado.Telefono1, Nm_Empleado.Telefono2, Nm_Empleado.Email, Nm_Empleado.FechaNacimiento, Nm_Empleado.IDEN_Ciudad, Nm_Empleado.TipoSangre, Nm_Cargo.Nombre AS oficio, CONVERT(char, FechaInicio, 103) AS fecini, CONVERT(char, FechaNacimiento, 103) AS fecnac, NoHijos, CONVERT(char, FechaRetiro, 103) AS fecfin FROM Nm_Contrato, Nm_Empleado, Nm_Cargo, Nm_FondoSalud WHERE Nm_Contrato.IDEN_Empleado = Nm_Empleado.IDEN AND Nm_Contrato.IDEN_Cargo = Nm_Cargo.IDEN AND Nm_Contrato.IDEN_FSalud = Nm_FondoSalud.IDEN"; 

foreach ($consql->query($query) as $row){
extract($row); $estado = 'INACTIVO'; $tipo = 2;
if($Inactivo == '0' AND $Indretirado == '0'){$estado = 'ACTIVO'; $tipo = 3; 
$condi=array('Cedula'=>$numid); $data=array('estado'=>'Contratado','Direccion'=>$Direccion,'Telefono'=>$Telefono1, 'Celular'=>$Telefono2, 'Email'=>$Email, 'FechaNacimiento'=>$fecnac, 'NumeroHijos' => $NoHijos);
$this->bas->actualizar('datos',$data,$condi);
}

$porciones = explode("/", trim($fecini));
$fecdat =$porciones[2]."-".$porciones[1]."-".$porciones[0]; // porci n1

$data = array('codeps'=>$codeps, 'nomeps'=>$nomeps, 'Codigo'=>trim($Codigo), 'IDEN'=>$IDEN,'IDEN_PeriodoInicio'=>$IDEN_PeriodoInicio, 'numid'=>trim($numid), 'nombre'=>$nombre, 'salario'=>$salario, 'oficio'=>$oficio, 'fecini'=>$fecini, 'fecfin'=>$fecfin, 'familia'=>$familia, 'estado'=>$estado, 'tipo'=>$tipo, 'ccosto'=>$CentroCosto, 'tipocontrato'=>$TipoContrato, 'fecdat'=>$fecdat, 'fecnac'=>$FechaNacimiento, 'grusan'=>$TipoSangre, 'ocupor'=>$ocupor, 'Direccion'=>$Direccion, 'Ciudad'=>$IDEN_Ciudad);

$condi=array('Codigo'=>trim($Codigo),'familia'=>$familia);
$this->bas->borrar('contrato',$condi);
		
$this->bas->insertar('contrato',$data);

		}
		}	
		$this->bas->insertar('log',array('tipo'=>'Insercion Contratos','ejefec'=>date('Y-m-d H:i:s')));	
				
		$resp=$this->bas->consultar('familia','familias',array('estado'=>'0'));		
		foreach($resp as $rowf){
		extract($rowf);
		$consql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
		$query = "Select Identificacion, Nombres, Nombre1, Nombre2, Apellido1, Apellido2, Direccion, Email from Nm_Empleado"; 
		foreach ($consql->query($query) as $row){
		extract($row);

		$dato=array('nriper'=>trim($Identificacion), 'pssusr'=>md5(trim($Identificacion)),'estusr'=>'Activo');
		$this->bas->insert_ignorar('actusr',$dato);	
		
		$dato=array('codtrc'=>trim($Identificacion), 'nomtrc'=>$Nombres);
		$this->bas->insert_ignorar('cnttrc',$dato);	
		
		$dato=array('Cedula'=>trim($Identificacion), 'Nombres'=>$Nombres, 'Estado'=>'Contratado', 'addupd'=>date('Y-m-d h:i:s'));
		$this->bas->insert_ignorar('datos',$dato);	
		
		$dato=array('PrimerNombre' => $Nombre1, 'SegundoNombre' => $Nombre2, 'PrimerApellido' => $Apellido1, 'SegundoApellido' => $Apellido2, 'Nombres' => $Nombres);
		$condi=array('Cedula' => trim($Identificacion));
		$this->bas->actualizar('datos',$dato,$condi);
		if(trim($Identificacion) == '73214641'){ echo $this->db->last_query(); }
			}
	   $this->bas->insertar('log',array('tipo'=>'Actualizacion Datos','ejefec'=>date('Y-m-d H:i:s')));	
		}
		$resp = $this->bas->consultar('trim(codcco) codcco, cliente, upper(familia) familia','centrocco',array('cliente !='=>'0','familia !='=>''));
		foreach ($resp as $rowf){
		extract($rowf);
		$data=array('lugardes' => $cliente);
		$condi=array('trim(ccosto)'=>$codcco);
		$this->bas->actualizar_cont('contrato',$data,$condi,"UPPER(familia) like '%".$familia."%'"); 
		}
		$this->bas->insertar('log',array('tipo'=>'Actualizar Contratos','ejefec'=>date('Y-m-d H:i:s')));	
		//foreach ($this->bas->consultar('distinct ccosto, familia','contrato',array(' fecdat >='=>'2018-01-01','lugardes'=>'')) as $rowf){
		//}	
		echo "TERMINO EL PROCESO DE REGISTRO CONTRATOS NUEVOS ";
	
		
	}
	
	function index(){
		$this->bas->insertar('log',array('tipo'=>'Inicio Index','ejefec'=>date('Y-m-d H:i:s')));
		$condi=array('estado'=>'0');
		$resp=$this->bas->consultar('familia, conpor','familias',$condi);
		foreach($resp as $rowf){
		extract($rowf);
		$ocupor=strtoupper($conpor);

$consql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
$query = "select Nm_FondoSalud.IDEN AS codeps, Nm_FondoSalud.Nombre AS nomeps, Nm_Contrato.Inactivo, Nm_Contrato.Indretirado, Nm_Contrato.TipoContrato, Nm_Contrato.Codigo AS Codigo, Nm_Contrato.CentroCosto AS CentroCosto, Nm_Contrato.IDEN as IDEN, Nm_Contrato.IDEN_PeriodoInicio AS IDEN_PeriodoInicio, Nm_Contrato.SueldoBasico AS salario,  Nm_Empleado.Identificacion as numid, Nm_Empleado.Nombres AS nombre, Nm_Empleado.Direccion, Nm_Empleado.Telefono1, Nm_Empleado.Telefono2, Nm_Empleado.Email, Nm_Empleado.FechaNacimiento, Nm_Empleado.IDEN_Ciudad, Nm_Empleado.TipoSangre, Nm_Cargo.Nombre AS oficio, CONVERT(char, FechaInicio, 103) AS fecini, CONVERT(char, FechaNacimiento, 103) AS fecnac, NoHijos, CONVERT(char, FechaRetiro, 103) AS fecfin FROM Nm_Contrato, Nm_Empleado, Nm_Cargo, Nm_FondoSalud WHERE Nm_Contrato.IDEN_Empleado = Nm_Empleado.IDEN AND Nm_Contrato.IDEN_Cargo = Nm_Cargo.IDEN AND Nm_Contrato.IDEN_FSalud = Nm_FondoSalud.IDEN AND FechaInicio > 2020-04-30"; 

foreach ($consql->query($query) as $row){
extract($row);
$estado = 'INACTIVO'; 
$tipo = 2;
if($Inactivo == '0' AND $Indretirado == '0'){$estado = 'ACTIVO'; $tipo = 3; }

$porciones = explode("/", trim($fecini));
$fecdat =$porciones[2]."-".$porciones[1]."-".$porciones[0]; // porci n1

$data = array('codeps'=>$codeps, 'nomeps'=>$nomeps, 'Codigo'=>trim($Codigo), 'IDEN'=>$IDEN,'IDEN_PeriodoInicio'=>$IDEN_PeriodoInicio, 'numid'=>trim($numid), 'nombre'=>$nombre, 'salario'=>$salario, 'oficio'=>$oficio, 'fecini'=>$fecini, 'fecfin'=>$fecfin, 'familia'=>$familia, 'estado'=>$estado, 'tipo'=>$tipo, 'ccosto'=>$CentroCosto, 'tipocontrato'=>$TipoContrato, 'fecdat'=>$fecdat, 'fecnac'=>$FechaNacimiento, 'grusan'=>$TipoSangre, 'ocupor'=>$ocupor, 'Direccion'=>$Direccion, 'Ciudad'=>$IDEN_Ciudad);

$condi=array('Codigo'=>trim($Codigo),'familia'=>$familia);
$this->bas->borrar('contrato',$condi);
		
$this->bas->insertar('contrato',$data);

		}
		}	
		$this->bas->insertar('log',array('tipo'=>'Actualizar','ejefec'=>date('Y-m-d H:i:s')));	
				
		$resp=$this->bas->consultar('familia','familias',array('estado'=>'0'));		
		foreach($resp as $rowf){
		extract($rowf);
		$consql = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
		$query = "Select Identificacion, Nombres, Nombre1, Nombre2, Apellido1, Apellido2, Direccion, Email from Nm_Empleado"; 
		foreach ($consql->query($query) as $row){
		extract($row);

		$dato=array('nriper'=>trim($Identificacion), 'pssusr'=>md5(trim($Identificacion)),'estusr'=>'Activo');
		$this->bas->insert_ignorar('actusr',$dato);	
		
		$dato=array('codtrc'=>trim($Identificacion), 'nomtrc'=>$Nombres);
		$this->bas->insert_ignorar('cnttrc',$dato);	
		
		$dato=array('Cedula'=>trim($Identificacion), 'Nombres'=>$Nombres, 'Estado'=>'Contratado', 'addupd'=>date('Y-m-d h:i:s'));
		$this->bas->insert_ignorar('datos',$dato);	
		if(trim($Identificacion) == '73214641'){ echo $this->db->last_query(); }
		
		$dato=array('PrimerNombre' => $Nombre1, 'SegundoNombre' => $Nombre2, 'PrimerApellido' => $Apellido1, 'SegundoApellido' => $Apellido2, 'Nombres' => $Nombres);
		$condi=array('Cedula' => trim($Identificacion));
		$this->bas->actualizar('datos',$dato,$condi);
			}
	
		}
	
	    $this->bas->insertar('log',array('tipo'=>'Actualizar Datos','ejefec'=>date('Y-m-d H:i:s')));	
		
		$resp = $this->bas->consultar('trim(codcco) codcco, cliente, upper(familia) familia','centrocco',array('cliente !='=>'0','familia !='=>''));
		foreach ($resp as $rowf){
		extract($rowf);
		$data=array('lugardes' => $cliente);
		$condi=array('trim(ccosto)'=>$codcco);
		$this->bas->actualizar_cont('contrato',$data,$condi,"UPPER(familia) like '%".$familia."%'"); 
		}
		
	    $this->bas->insertar('log',array('tipo'=>'Fin Index','ejefec'=>date('Y-m-d H:i:s')));	
		//foreach ($this->bas->consultar('distinct ccosto, familia','contrato',array(' fecdat >='=>'2018-01-01','lugardes'=>'')) as $rowf){
		//}	
		echo "TERMINO EL PROCESO DE REGISTRO CONTRATOS NUEVOS ";
	}
	
		function act(){}
	
}