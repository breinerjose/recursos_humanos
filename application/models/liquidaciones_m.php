<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liquidaciones_m extends CI_Model {
	
	function __Construct(){
	   parent::__construct();
	}
	
	function liquidacionpendiente(){
		$sql1 = "select id_pazysalvo, numid, nombre, oficio, fecini, fecfin, Codigo, bre_pazysalvo.familia as familia FROM contrato, bre_pazysalvo WHERE contrato.familia = bre_pazysalvo.familia and contrato.codigo = bre_pazysalvo.numero and liquidacion = 'pendiente'";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}


	function updliquidacionfirmada($codigo){
		$sql = "UPDATE bre_pazysalvo SET liquidacion='lista' WHERE id_pazysalvo = ?";
		$res = $this->db->query($sql,array($codigo));
		if($this->db->affected_rows()){ return true;} else { return false; }
	   }
	   
	  
	function liquidacionfirmada(){
		$sql1 = "select id_pazysalvo, numid, nombre, oficio, fecini, fecfin, Codigo, bre_pazysalvo.familia as familia FROM contrato, bre_pazysalvo WHERE contrato.familia = bre_pazysalvo.familia and contrato.codigo = bre_pazysalvo.numero and liquidacion = 'lista'";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}   
		
	function updliquidacionpagada($codigo){
		$sql = "UPDATE bre_pazysalvo SET liquidacion='pagada' WHERE id_pazysalvo = ?";
		$res = $this->db->query($sql,array($codigo));
		if($this->db->affected_rows()){ return true;} else { return false; }
	   }			

/////////////////////////////////////////////////////////////
	
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
		 $sql = "SELECT p.e, p.u, p.id_persona, c.nombre, c.salario, c.oficio, u.expedicion, f.conpor
				 FROM bre_pazysalvo p, contrato c, view_user u, familias f 
				 WHERE p.numero = c.codigo
				 AND c.familia = f.familia
				 AND p.id_persona = u.nriper
				 AND p.id_pazysalvo =?";
		$res = $this->db->query($sql,array($codigo));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
		function datosCertificadoMax(){
		$sqlid = "select max(id_pazysalvo) id from bre_pazysalvo";
		$res = $this->db->query($sqlid);
		$codigo = $res->row_array();
				
		 $sql = "SELECT p.e, p.u, p.id_persona, c.nombre, c.salario, c.oficio, u.expedicion, f.conpor
				 FROM bre_pazysalvo p, contrato c, view_user u, familias f 
				 WHERE p.numero = c.codigo
				 AND c.familia = f.familia
				 AND p.id_persona = u.nriper
				 AND p.id_pazysalvo =?";
		$res = $this->db->query($sql,array($codigo['id']));
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
		function datosFirmas($identificacion){
		$sql = "SELECT trim(c.identificacion) as identificacion, c.cargo 
                FROM cargo c 
				WHERE c.identificacion = ?";	
		$res = $this->db->query($sql,array($identificacion));
		if($res->num_rows() > 0){
			return $res->row_array();
		}else{return FALSE;}
		}
		
		function consultarCesasionlaboral(){
	$sql1 = "SELECT id_persona as identificacion, c as nombres, a as familia, numero 
	          FROM bre_pazysalvo
			  ORDER BY e ASC";
		$result1 = $this->db->query($sql1);
		if($result1->num_rows() > 0){
			return $result1->result_array();
			}
			else{return FALSE;}
		}
		
		function borrarPazysalvo($numero){
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
	 $sql = "SELECT p.id_pazysalvo, p.numero, p.d, p.t, p.e, p.u, p.b, p.id_persona, c.nombre, f.conpor, p.v, p.w, p.a AS lugardes, p.g, p.j, p.h, p.i, p.k, p.n, p.l, p.o, p.p, p.q, p.r, p.dotacion, p.m, p.addfch, p.estadofin, p.id_persona, p.familia
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
		$sql = "SELECT p.id_pazysalvo, p.numero, p.d, p.t, p.e, p.u, p.b, p.id_persona, c.nombre, f.conpor, p.v, p.w, p.a AS lugardes, p.g, p.j, p.h, p.i, p.k, p.n, p.l, p.o, p.p, p.q, p.r, p.dotacion, p.m, p.addfch, p.estadofin, p.id_persona, p.familia
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
		   $sql = "UPDATE datos set Estado=?, labor4=? WHERE Cedula=?";
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
		$sql1 = "select Estado, Nombres, Estudios, NombreTitulo FROM datos 
		WHERE Estado = 'Preseleccionado' AND Cedula=?";
		$res = $this->db->query($sql1,array($cedula));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
function datos_personad($cedula){
		$sql1 = "select Estado, Nombres, Estudios, NombreTitulo FROM datos 
		WHERE Estado = 'Disponible' AND Cedula=?";
		$res = $this->db->query($sql1,array($cedula));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}
		
function datos_personac($cedula){
		$sql1 = "select Estado, Nombres FROM datos 
		WHERE Estado = 'Contratado' AND Cedula=?";
		$res = $this->db->query($sql1,array($cedula));
		//echo $this->db->last_query();
		//exit();
		if($res->num_rows() > 0){
			return $res->row_array();
			}
			else{return FALSE;}
		}

function postulaciones($labor){
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