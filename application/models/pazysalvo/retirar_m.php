<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retirar_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
	
	function selectestado(){
		$sql1 = "select estado from estado";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
	function selectretiro(){
		$sql1 = "select causa from causa";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
	function consultarusuario($numid){
		$sql1 = "select nomtrc, emltrc from view_user WHERE trim(nriper) = ?";
		$result1 = $this->db->query($sql1,array($numid));
		if($result1->num_rows() > 0){
			return $result1->row_array();
			}
			else{return FALSE;}
		}
		
		function consultarTodosusuarios(){
		$sql1 = "select trim(numid) as user, nombre from contrato WHERE estado = 'activo'";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}	
		
		function consultarcontratos($numid){
		$sql1 = "select contrato.oficio, contrato.codigo, contrato.fecini AS fecini, contrato.familia, familias.conpor, familias.periodopa, contrato.lugardes from contrato, familias 
		WHERE contrato.familia = familias.familia AND contrato.estado = 'activo' AND trim(numid) = ?";
		$result1 = $this->db->query($sql1,array($numid));
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}	
		
		function consultarcontratosinactivo($numid){
		$sql1 = "select contrato.oficio, contrato.codigo, contrato.fecini AS fecini, contrato.familia, familias.conpor, familias.periodopa, contrato.lugardes from contrato, familias WHERE contrato.familia = familias.familia AND contrato.estado = 'inactivo' AND trim(numid) = ?";
		$result1 = $this->db->query($sql1,array($numid));
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}	
		
		function consultarFuente($fuente){
		$sql1 = "select contador from bre_fuente where id_fuente=?";
		$result1 = $this->db->query($sql1,array($fuente));
		if($result1->num_rows() > 0){
			return $result1->row_array();
			}
			else{return FALSE;}
		}
		
	    function actualizarContador($contador,$fuente){
		   $sql = "UPDATE bre_fuente set contador=? WHERE id_fuente=?";
		   $res = $this->db->query($sql,array($contador,$fuente));
		  if($this->db->affected_rows()){ return true;} else { return false; }
		}
		
		function verificarPazysalvo($numero,$familia){
		$sql = "select * from bre_pazysalvo WHERE numero=? and familia=?";
		//echo $this->db->last_query();
		//exit();
		$res = $this->db->query($sql,array($numero,$familia));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
		function datosCertificado($codigo){
		$this->db->select('e, u, id_persona, nombre, salario, oficio, expedicion, conpor, tipocontrato');
		$this->db->from('view_pazysalvo');
		$this->db->where('id_pazysalvo',$codigo);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
		function cartaterminacionparametros($codigo,$familia){
		 $sql = "SELECT nombre, tipocontrato, conpor
				 FROM contrato, familias
				 WHERE contrato.familia=familias.familia and codigo = ? and contrato.familia = ?";
		$res = $this->db->query($sql,array($codigo,$familia));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
		
		function datosCertificadoMax($codigo,$familia){
		 $sql = "SELECT numid as id_persona, nombre, salario, oficio, decedula as expedicion, ocupor as conpor, contrato.tipocontrato as tipocontrato 
		 FROM contrato, datos WHERE contrato.numid::text=datos.cedula and codigo =? and familia =?";
		$res = $this->db->query($sql,array($codigo,$familia));
		//echo $this->db->last_query();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
		function datosFirmas($identificacion){
		$sql = "SELECT c.identificacion as identificacion, c.cargo 
                FROM cargo c 
				WHERE c.identificacion = ?";	
		$res = $this->db->query($sql,array($identificacion));
		//echo $this->db->last_query();
		if($res->num_rows() > 0){
			return $res->row_array();
		}else{return FALSE;}
		}
		
		function consultarCesasionlaboral(){
	$sql1 = "SELECT id_pazysalvo, id_persona as identificacion, c as nombres, familia, numero 
	          FROM bre_pazysalvo
			  ORDER BY id_pazysalvo DESC LIMIT 0,500";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
		function borrarPazysalvo($numero){
		$con = "SELECT id_persona, numero, familia FROM bre_pazysalvo
		WHERE id_pazysalvo=?";	
		$rcon = $this->db->query($con,array($numero));
		$a = $rcon->row_array();
		
		$sql = "UPDATE contrato set estado='ACTIVO', fecfin='' WHERE Codigo=? AND numid=? AND familia=?";
		$res = $this->db->query($sql,array($a['numero'],$a['id_persona'],$a['familia']));
		//echo $this->db->last_query();
		//exit();
		
		 $sql = "DELETE FROM bre_pazysalvo WHERE id_pazysalvo=?";
		 $res = $this->db->query($sql,array($numero));
		 if($this->db->affected_rows()){ return true;} else { return false; }
		}
		
		function revertirPazysalvo($numero,$estado){
		 $sql = "UPDATE bre_pazysalvo set estado=? WHERE id_pazysalvo=?";
		   $res = $this->db->query($sql,array($estado,$numero));
		  if($this->db->affected_rows()){ return true;} else { return false; }
		}
		
		function consultarTodospazysalvo1(){
			$sql1 = "SELECT id_pazysalvo, d, id_persona as nriper, c as nomtrc, a, f FROM bre_pazysalvo
				 WHERE estado = '1'";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
		}
       
	   function consultarTodospazysalvo2(){
			$sql1 = "SELECT id_pazysalvo, numero,d,id_persona as nriper,c as nomtrc, a, f FROM bre_pazysalvo
				     WHERE estado = '2'";
			$result1 = $this->db->query($sql1);
			if($result1->num_rows() > 0){
				return $result1->result_array();
				}
				else{return FALSE;}
		}
		
		function datosPazysalvo($codigo){
	 $sql = "SELECT p.obsarc, p.id_pazysalvo, p.numero, p.d, p.t, p.e, p.u, p.b, p.id_persona, c.nombre, f.conpor, p.v, p.w, p.a AS lugardes, p.g, p.j, p.h, p.i, p.k, p.n, p.l, p.ll, p.o, p.p, p.q, p.r, p.dotacion, p.m, p.addfch, p.estadofin, p.id_persona, p.familia
			    FROM bre_pazysalvo p, contrato c, familias f
			    WHERE p.numero = c.codigo
			    AND p.familia = c.familia
			    AND c.familia = f.familia
			    AND p.id_pazysalvo=?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
	   function imprimirPazysalvo($codigo){
		$sql = "SELECT p.id_pazysalvo, p.numero, p.d, p.t, p.e, p.u, p.b, p.id_persona, c.nombre, f.conpor, p.v, p.w, p.a AS lugardes, p.g, p.j, p.h, p.i, p.k, p.n, p.l, p.ll, p.o, p.p, p.q, p.r, p.dotacion, p.m, p.addfch, p.estadofin, p.id_persona, p.familia
			    FROM bre_pazysalvo p, contrato c, familias f
			    WHERE p.numero = c.codigo
			    AND p.familia = c.familia
			    AND c.familia = f.familia
			    AND p.id_pazysalvo=?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
	   }
	   
	   function actualizarPazysalvo($g,$h,$i,$j,$k,$l,$ll,$m,$n,$o,$p,$q,$r,$dotacion,$t,$estado,$codigo){
	    $sql = "UPDATE bre_pazysalvo SET g=?, h=?, i=?, j=?, k=?, l=?, ll=?, m=?, n=?, o=?, p=?, q=?, r=?, 
		                                 dotacion=?, t=?, estado=? WHERE id_pazysalvo=?";	
		$res = $this->db->query($sql,array($g,$h,$i,$j,$k,$l,$ll,$m,$n,$o,$p,$q,$r,$dotacion,$t,$estado,$codigo));
		if($this->db->affected_rows()){ return true;} else { return false; }
	   }
	   
	    function actualizarDatos($estado,$codusr,$oficio){
		   $sql = "UPDATE datos set estado=?, labor4=? WHERE Cedula=?";
		   $res = $this->db->query($sql,array($estado,$oficio,trim($codusr)));
		   //echo $this->db->last_query();
		  //exit();
		 // if($this->db->affected_rows()){ return true;} else { return false; }
		}
		
		function liquidacion($numero,$familia){
		   $sql = "UPDATE contrato set liquidacion = 'pendiente' WHERE Codigo=? and familia=?";
		   $this->db->query($sql,array($numero,$familia));
		   if($this->db->affected_rows()){ return true;} else { return false; }
		}
		
		function chekeo($numero,$familia){
		$stmt = $this->db->query("SELECT codche FROM chekeo where stdche = 'generado' AND tipche = 1");
		foreach($stmt->result_array() as $row){
		$sql = "INSERT INTO detche (codche, Codigo, familia) VALUES (?,?,?);";
		$this->db->query($sql,array($row['codche'],$numero,$familia));
		}
		}

function datos_persona($cedula){
		$sql1 = "select estado, Nombres, Estudios, NombreTitulo, laborppal, FechaSolicitud, Sexo FROM datos 
		WHERE estado = 'Preseleccionado' AND Cedula=?";
		$res = $this->db->query($sql1,array($cedula));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
function disponibles(){
		$sql1 = "select Cedula, estado, Nombres, Estudios, NombreTitulo, laborppal, labor4, token FROM datos 
		WHERE estado = 'Disponible' or estado='Seleccionado' or estado='seleccionado'";
		$res = $this->db->query($sql1);
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->result_array();
			}
			else{return FALSE;}
		}
		
function contratados(){
		$sql1 = "select Cedula, estado, Nombres, Estudios, NombreTitulo, laborppal, labor4 FROM datos 
		WHERE estado = 'Contratado'";
		$res = $this->db->query($sql1);
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->result_array();
			}
			else{return FALSE;}
		}		
		
function datos_personac($cedula){
		$sql1 = "select estado, Nombres FROM datos 
		WHERE estado = 'Contratado' AND Cedula=?";
		$res = $this->db->query($sql1,array($cedula));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}

function postulaciones(){
if($labor != 'todas'){
$sql = "SELECT Distinct(Cedula), titulo FROM postulaciones, vacantes WHERE postulaciones.id=vacantes.id and titulo like '%$labor%'";}else{
$sql = "SELECT Distinct(Cedula), titulo FROM postulaciones, vacantes WHERE postulaciones.id=vacantes.id";
}
$res = $this->db->query($sql);

		if($res->num_rows() > 0){
			return $res->result_array();
			}
			else{return FALSE;}
	   }
	   	   	   

function preseleccionados(){
$sql = "SELECT Distinct(Cedula) Cedula, token FROM datos WHERE estado='Preseleccionado'";
$res = $this->db->query($sql);

		if($res->num_rows() > 0){
			return $res->result_array();
			}
			else{return FALSE;}
	   }

 function imprimirhojadevida($codigo){
		$sql = "SELECT * FROM datos WHERE Cedula = ?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
	   }
	   
 function consultarestado($codigo){
		$sql = "SELECT Cedula FROM datos WHERE Cedula = ?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
	   }
	   
function modificarhdv($codigo){
		$sql = "SELECT id_datos FROM datos WHERE Cedula = ?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
	   }	   
	   	   
function nopreseleccionado($codigo){
		$sql = "UPDATE datos SET estado='No Preseleccionado' WHERE Cedula = ?";
		$res = $this->db->query($sql,array($codigo));
		if($this->db->affected_rows()){ return true;} else { return false; }
	   }
	   
	   function consultarcontrato(){
		$sql1 = "select numid, nombre, oficio, fecini, fecfin, Codigo FROM contrato WHERE liquidacion = 'pendiente'";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}

		function contratofirmado($codigo){
		$sql = "UPDATE contrato SET liquidacion='lista' WHERE Codigo = ?";
		$res = $this->db->query($sql,array($codigo));
		if($this->db->affected_rows()){ return true;} else { return false; }
	   }
	   
		function contratopagado(){
		$sql1 = "select numid, nombre, oficio, fecini, fecfin, Codigo FROM contrato WHERE liquidacion = 'lista'";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}	   

		function pagado($codigo){
		$sql = "UPDATE contrato SET liquidacion='pagada' WHERE Codigo = ?";
		$res = $this->db->query($sql,array($codigo));
		if($this->db->affected_rows()){ return true;} else { return false; }
	   }

}
?>