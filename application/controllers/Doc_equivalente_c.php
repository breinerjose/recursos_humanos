<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doc_equivalente_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	
	function resolucion(){
	 $this->output->set_header('Content-type:application/json');
	 $asap=$this->security->xss_clean($this->input->post('asap'));
	 $this->bas->actualizar('fuente',array('resolu'=>$asap),array('id_fuente'=>'2'));
	 $aseco=$this->security->xss_clean($this->input->post('aseco'));
	 $this->bas->actualizar('fuente',array('resolu'=>$aseco),array('id_fuente'=>'1'));
	 echo '{"title" : "Notificación", "type" : "success", "msg" : "Exito al realizar la operación"}';
	 
	}
	 
	 function resolucioncon() {
        $this->output->set_header('Content-type: application/json');
        $res = $this->bas->consultarf('resolu', 'fuente', array('id_fuente'=>'1'));
        $output["a"] = array('aseco' => $res['resolu']);
		$res = $this->bas->consultarf('resolu', 'fuente', array('id_fuente'=>'2'));
        $output["b"] = array('asap' => $res['resolu']);
        echo json_encode($output);
    }
	
	function registrar(){
	 $this->output->set_header('Content-type:application/json');
	 $str=explode('**',$this->security->xss_clean($this->input->post('nombre')));
	 extract($this->bas->consultarf('nombre, direccion, telefono','terceros',array('id_tercero'=>$str['0'])));  
	 $empresa=$this->security->xss_clean($this->input->post('empresa'));
	 if($empresa == 'ASECO S.A.S'){
	 $condi=array('id_fuente'=>'1');
	 $data['nit'] = '800121354-3';
	 }else{ 
	 $condi=array('id_fuente'=>'2');
	 $data['nit'] = '800002721-3';
	 }
	 extract($this->bas->consultarf('contador,resolu','fuente',$condi));
	 $rcontem2 = $contador + 1;
	 $this->bas->actualizar('fuente',array('contador'=>$rcontem2),$condi);
     $data['docquiv'] = $contador;
	 $data['resolu'] = $resolu;
	 $data['fecha'] = $this->security->xss_clean($this->input->post('fecha'));
	 $data['nombre'] = $nombre;
	 $data['id_tercero'] = $str['0'];
	 $data['direccion'] = $direccion;
	 $data['telefono'] = $telefono;
	 $data['concepto'] = $this->security->xss_clean($this->input->post('concepto'));
	 $data['cant'] = $this->security->xss_clean($this->input->post('cant'));
	 $data['vlrunit'] = str_replace('.','',$this->security->xss_clean($this->input->post('vrunit')));
	 $data['total1'] = str_replace('.','',$this->security->xss_clean($this->input->post('vrtotal')));
	 $data['ivaa'] = str_replace('.','',$this->security->xss_clean($this->input->post('ivaa')));
	 $data['ivar'] = str_replace('.','',$this->security->xss_clean($this->input->post('ivar')));
	 $data['total2'] = str_replace('.','',$this->security->xss_clean($this->input->post('vrtotal')));
	 $data['rtefue'] = str_replace('.','',$this->security->xss_clean($this->input->post('rtefue')));
	 $data['rteind'] = str_replace('.','',$this->security->xss_clean($this->input->post('rteind')));
	 $data['neto'] = $data['total2']-$data['rtefue']-$data['rteind'];
	 $data['empresa'] = $empresa;
	 
	 $row = $this->bas->insertar('cuentas', $data);
	  if ($row != false) {
            echo '{"title" : "Notificación", "type" : "success", "msg" : "Exito al realizar la operación"}';
        } else {
            echo '{"title" : "Notificación", "type" : "error", "msg" : "Ocurrio un error en la operación"}';
        }
	}
	
	function listado() {
        $ale = $this->security->xss_clean($this->input->post('ale'));
        $output["aaData"] = array();
        $resp = $this->bas->consultar('*', 'cuentas', array('id !=' => '0'));
        if ($resp != false) {
            foreach ($resp as $row) {
             $boton = "<a href='#' title='Borar Informacion' class='btn btn-sm btn-primary print" . $ale . "'  data-oid='" . $row['id'] . "' ><i class='fa fa-print'></i></a >";
                $output["aaData"][] = array($row["id"], $row["id_tercero"], $row["nombre"], $row["fecha"], $row["empresa"], $boton);
            }
        }
        echo json_encode($output);
    }
    
	function imprimir($id){
        $data['id'] = $id;
        $this->load->view("docequivalente/printdocumento", $data);
	}
	
	function listado_ter(){
	 $ale = $this->security->xss_clean($this->input->post('ale'));
        $output["aaData"] = array();
        $resp = $this->bas->consultar('id_tercero,nombre,telefono,direccion', 'terceros', array('id_tercero !=' => '0'));
        if ($resp != false) {
            foreach ($resp as $row) {
     $boton = "<a href='#' title='Borar Informacion' class='btn btn-sm btn-primary editar" . $ale . "'  data-oid='" . $row['id_tercero'] . "' ><i class='fa fa-edit'></i></a >";
                $output["aaData"][] = array($row["id_tercero"], $row["nombre"], $row["telefono"], $row["direccion"], $boton);
            }
        }
        echo json_encode($output);
	}
}