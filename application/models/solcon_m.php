<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class solcon_m extends CI_Model {

	public function insert($data)
	{
		$this->db->insert('solcon',$data);
	}
	
function selectclientes($codigo){
	  $sql= "SELECT Nit, NombreCliente FROM clientes";
	  $res = $this->db->query($sql);
	 //echo $this->db->last_query();
	  return ($res->num_rows() >0)? $res->result_array():false;
	}	

function selectareas($codcli){
	  $this->db->select('codare, nomare');
	  $this->db->from('cliare');
	  $this->db->where('codcli', $codcli);
	  $res = $this->db->get();
	 //echo $this->db->last_query();
	  return ($res->num_rows() >0)? $res->result_array():false;
	}	
	
function consultarsolicitudes($fecini,$fecfin){
		$this->db->select('nomfun, nomare, labrel, fchcon');
		$this->db->from('solcon');
		$this->db->where('addfch >=',$fecini);
		$this->db->where('addfch <=',$fecfin);	
		$res = $this->db->get();
	    //echo $this->db->last_query();
		//exit();
		if($res->num_rows()>0){
			return $res->result_array();
		}else{
			return false; //No existen item pricipales	
		}
	}
		
}