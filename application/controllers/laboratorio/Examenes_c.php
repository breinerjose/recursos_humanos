<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI
class Examenes_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('/laboratorio/Examenes_m','exa',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('Basico_m','bas',TRUE);
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("ordenes/".$nombre); //llamo a la vista
		}
			
		//chossen
	function exameness(){
		$this->output->set_header('Content-type:application/json');
		$output = array("a" => array());
		$res=$this->exa->examenes();
		if($res!=false){
		foreach($res as $row){
		$output[] = array('codexa' => $row['codexa'],'nomexa' => $row['nomexa']);	
		}	
				$output["err"]='1';	
		}	
	    echo json_encode($output);
	}
	
	function examenes(){
		$this->output->set_header('Content-type:application/json');
		$output = array("a" => array());
		$res=$this->exa->examenes();
		if($res!=false){
		foreach($res as $row){
		$output["a"][] = array('codexa' => $row['codexa'],'nomexa' => $row['nomexa']);	
		}	
				$output["err"]='1';	
		}	
	    echo json_encode($output);
	}
	
	function examenesb(){
		$this->output->set_header('Content-type:application/json');
		$ale=$this->input->post('ale');
		$output = array("aaData" => array());
		$res=$this->exa->examenes();
		if($res!=false){
		foreach($res as $row){
		$output['aaData'][] = array($row['codexa'],$row['nomexa'],$row['precio'],$row['vencimiento'],$row['ocutip'],'<a class="btn btn-info btn-xs d" title="Editar" 
			   data-codexa="'.$row['codexa'].'"
			   data-nomexa="'.$row['nomexa'].'" 
			   data-precio="'.$row['precio'].'" 
			   data-vencimiento="'.$row['vencimiento'].'" 
			   data-ocutip="'.$row['ocutip'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
			   
			   <a class="btn btn-default btn-xs borrar'.$ale.'" title="BORRAR" data-codexa="'.$row['codexa'].'"
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a>
			   ');	
		}	
				//$output["err"]='1';	
		}	
	    echo json_encode($output);
	}
	
	
	public function tipexamenes(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->bas->consultas('*','ocutip');
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('codtip'=>$row['codtip'], 'ocutip'=>$row['ocutip']); }
		echo json_encode($info); } else echo 1;	
	}
	
	
	//subgrupo
	function subgru(){
		$this->output->set_header('Content-type: application/json');
		$res = $this->exa->subgru();
		$info=array();
		if($res!=false){ foreach($res as $row){ $info[]=array('codgru'=>$row['id'], 'subgru'=>$row['subgru']); }
		echo json_encode($info); } else echo 1;	
	}
			
		function consultarexamenes(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->exa->consultarexamenes();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['codigo'],urldecode($row['descripcion']),$row['valor'],$row['vencimiento'],
				"<a href='#' title='Modificar Informacion'  class='editar'  data-cod='".$row['codigo']."' 
				data-des='".$row['descripcion']."' data-val='".$row['valor']."' data-ven='".$row['vencimiento']."'>
				  <img src='".base_url()."recursos/iconos/editar.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
	   function agregar_examen(){
		$datos = array($this->input->post('descripcion'),$this->input->post('valor'),$this->input->post('vencimiento'),$this->session->userdata('user'),date('Y-m-d H:i:s'));
		$res = $this->exa->agregar_examen($datos);
		if($res!=false){ echo 0; }else{ echo 1; }
	}
	   
	   function editar_examen($codigo,$descripcion,$valor,$vencimiento){
	   			$data['codigo'] = $codigo;
				$data['descripcion'] = urldecode($descripcion);
				$data['valor'] = $valor;
				$data['vencimiento'] = $vencimiento;
				$this->load->view('ordenes/editar_examenes_v.php',$data);
	   } 
	   
	   function actualizar_examen(){
	   $this->output->set_header('Content-type: application/json');
		$codigo = $this->input->post('codexa');
		$descripcion = $this->input->post('nomexa');	
		$valor = $this->input->post('precio');	
		$vencimiento = $this->input->post('vencimiento');	
		$tipordb = $this->input->post('tipordb');		
		$datos = array($descripcion,$valor,$vencimiento,$this->session->userdata('user'),date('Y-m-d H:i:s'),$tipordb,$codigo);	
		$res = $this->exa->actualizar_examen($datos);
		if($res!=false){
			$output["err"]='1';	
		}else{
		$output["err"]='0';	
		}
		echo json_encode($output);
	}	
	
	 function eliminar_examen(){
	   $this->output->set_header('Content-type: application/json');
		$condicion = array('codigo' => $this->input->post('codexa'));	
		$data = array('delusr' => $this->session->userdata('user'), 'delfch' => date('Y-m-d H:i:s'));	
		$res = $this->bas->actualizar('ocuconc',$data,$condicion);
		if($res!=false){
			$output["err"]='1';	
		}else{
		$output["err"]='0';	
		}
		echo json_encode($output);
	}	
	
	
	
	function diagnosticos(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
		$codexa=$this->security->xss_clean($this->input->post('codexa'));
	    $subgru=$this->security->xss_clean($this->input->post('subgru'));
		$nomdia=$this->security->xss_clean($this->input->post('nomdia'));
			
			if($codexa != '0' and $subgru != '0' and $nomdia != '0'){
				$data = array('codexa' => $codexa , 'subgru' => $subgru , 'nomdia' => $nomdia);
				$this->db->insert('diagnostico', $data);	
			}
		
		$resp=$this->exa->listadodiagnosticos($codexa,$subgru);
		if($resp!=false){
			foreach($resp as $row){
				$output['aaData'][] = array(
				
			   $row['examen_lab'],$row['subgru'],$row['nomdia'],
			   '<a class="btn btn-default btn-xs borrar" title="BORRAR" data-coddia="'.$row['coddia'].'" data-codexa="'.$row['codexa'].'" data-subgru="'.$row['subgru'].'" 
			   role="button" href="javascript:void(0);"><i class="fa fa-trash"></i> </a> '
			   	  
			   );
			}	
		}		
	    echo json_encode($output);

	}
	
	function borrar_diagnosticos(){
		$this->output->set_header('Content-type: application/json');
		$coddia=$this->input->post('coddia');
		$this->db->delete('diagnostico', array('coddia' => $coddia)); 
		echo '1';
	}
	
	function diagnosticosc(){
		$this->output->set_header('Content-type:application/json');
		$output = array("aaData" => array());
		$res=$this->exa->listadodiagnosticos($this->security->xss_clean($this->input->post('id_examen_lab')),$this->security->xss_clean($this->input->post('examen')));
		if($res!=false){
		foreach($res as $row){
		$output["aaData"][] = array('nomdia' => $row['nomdia']);		
		}	
		}		
	    echo json_encode($output);
	}
	
	function profesiogramac(){
		$this->output->set_header('Content-type:application/json');
		$output = array("a" => array());
		$res=$this->exa->profesiogramac($this->security->xss_clean($this->input->post('nricli')));
		if($res!=false){
		foreach($res as $row){
		$output["a"][] = array('codcrg' => $row['codcrg'],'nomcrg' => $row['nomcrg']);	
		}	
				$output["err"]='1';	
		}	
	    echo json_encode($output);
	}

	function medicosc(){
		$this->output->set_header('Content-type:application/json');
		$condicion = array('medexa.id_exa' => $this->security->xss_clean($this->input->post('codexa')));
		$condicionb = 'medicos.cedula = medexa.id_medi';
		$output = array("a" => array());
		$campos="cedula, nombre";
		$res=$this->exa->medicosc($campos,'medicos, medexa',$condicion,$condicionb);
		//echo $this->db->last_query();
		if($res!=false){
		foreach($res as $row){
		$output["a"][] = array('cedula' => $row['cedula'],'nombre' => $row['nombre']);
		}	
		}	
			$output["a"][] = array('cedula' => '0','nombre' => 'Medico Por Defecto');
			$output["err"]='1';	
	    echo json_encode($output);
	}
	
	function examenes_historiac(){
        $this->output->set_header('Content-type:application/json');
        $ale=$this->input->post('ale');
        $id_consentimiento=$this->security->xss_clean($this->input->post('id_consentimiento'));
        if($id_consentimiento!=0){
        $resp=$this->exa->examenes_historia($id_consentimiento);
        if($resp!=false){
            foreach($resp as $row){
            $output['aaData'][] = array($row['nombre'],$row['examen_lab'],$row['addfch'],$row['finfch'],$row['precio'],
              
               '<a class="btn btn-danger btn-xs eliminar'.$ale.'" title="Eliminar" data-con="'.$row['id_consentimiento'].'"
               data-exa="'.$row['id_examen_lab'].'" role="button" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>

                <a class="btn btn-warning btn-xs editar'.$ale.'" title="Eliminar" data-con="'.$row['id_consentimiento'].'" precio="'.$row['precio'].'"
                id_exa_hist="'.$row['id_exa_hist'].'" data-exa="'.$row['id_examen_lab'].'" idmedi="'.$row['idmedi'].'"

                role="button" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
               
              ',
               );
            }
            }else{
                $output['aaData'][] = array('','NO TIENE EXAMENES','','','','');
                }
            }else{
            	  $output['aaData'][] = array('','NO TIENE EXAMENES','','','','');
            }
        echo json_encode($output);
        }

	function exameni(){

		$condicion = array('ocunum' => $this->security->xss_clean($this->input->post('ocunum')));
		$estado = $this->bas->consultarf('brigada','historias',$condicion);
		if($estado != false){$estado='brigada';}else{$estado='pendiente';}

	 $datos = array(
					  'id_consentimiento'=>$this->security->xss_clean($this->input->post('id_consentimiento')),
					  'id_examen_lab'=>$this->security->xss_clean($this->input->post('id_examen_lab')),
					  'precio'=>$this->security->xss_clean($this->input->post('precio')), 'llamado' => $estado
					 );			
		  $row=$this->bas->insertar('examen_lab_hist',$datos);
		  $output["err"]='1';	
	echo json_encode($output);
	}
	
	function examenib(){
	 $datos = array(
					  'descripcion'=>$this->security->xss_clean($this->input->post('nomexa')),
					  'tipordb'=>$this->security->xss_clean($this->input->post('tipordb')),
					  'valor'=>$this->security->xss_clean($this->input->post('precio')),
					  'vencimiento'=>$this->security->xss_clean($this->input->post('vencimiento')),
					  'addusr' => $this->session->userdata('user')
					 );			
		  $row=$this->bas->insertar('ocuconc',$datos);
		  $output["err"]='1';	
	echo json_encode($output);
	}
	
	function examend(){
	$this->db->where('id_consentimiento',$this->security->xss_clean($this->input->post('id_consentimiento')));
	$this->db->where('id_examen_lab',$this->security->xss_clean($this->input->post('id_examen_lab')));
	$this->db->delete('examen_lab_hist');
	$output["err"]='1';	
	echo json_encode($output);
	}
	
	function precioc(){
		$this->output->set_header('Content-type:application/json');
		$output = array("a" => array());
		$condicion = array('ocunum' => $this->security->xss_clean($this->input->post('codsol')));		
		$campos="nricli";
		$rescli = $this->bas->consultarf($campos,'ocuord',$condicion);
		$res=$this->exa->preciot($this->security->xss_clean($this->input->post('codexa')),$rescli['nricli']);

		if($res!=false){
		$output["a"] = array('precio' => $res['valexa']);	
		$output["err"]='1';	
		}else{
		$res=$this->exa->precioc($this->security->xss_clean($this->input->post('codexa')));
		$output["a"] = array('precio' => $res['precio']);	
		$output["err"]='1';	
		}	
	    echo json_encode($output);
	}
		 
		function cargarVistaProcediemientos(){
							$id_consentimiento=$this->input->post('id_consentimiento');
							//$id_consentimiento=53000;
                            $data['id_consentimiento']=$this->input->post('id_consentimiento');
							$data['nricli']=$this->input->post('nricli');
							$data['ale']=$this->input->post('ale');
							$sw=$this->input->post('sw');
							//$sw=0;
							if($sw=='0'){
								$data['tipo']='inse';
								$data['solicitud']=$id_consentimiento;
							}else{
								$data['tipo']='consu';
							}
							
                            $this->load->view('/laboratorio/actualizar_procedimiento_v',$data);
                          }  

        function actualizar_procedimiento(){     
        $dat = array( 'idmedi' => $this->security->xss_clean($this->input->post('medico')), 
        	'precio' => $this->security->xss_clean($this->input->post('precio')));

        if($this->security->xss_clean($this->input->post('medico')) != $this->security->xss_clean($this->input->post('medicoanterior'))){
        	$dat['addfch'] = date('Y-m-d h:i:s');
        	$dat['llamado'] ='atendido';
        	$dat['updusr'] = $this->session->userdata('user');
        }

		$this->db->where('id_exa_hist', $this->security->xss_clean($this->input->post('id_exa_hist')));
		$this->db->update('examen_lab_hist', $dat);  
		$output["err"]='1';	
		echo json_encode($output);
		} 
		      
		 function imprime_listado(){
        //$this->load->helper('dompdf');
        //extract($this->bas->consultarf('nomcia','actcia',array('nomcia !='=>'')));
        $html = '<html><head>
                    <style>
                        table tr{
                            font-size : 11px;
                        }
                    </style>
                 </head><body>
        <table border="1" width="800" cellspacing="0" >
            <thead>
                <tr tyle="background-color:#DDD;" >
                    <th width="10%"><img width="78" height="60" src="/res/imagenes/logo.png"></th>
                    <th width="80%">ASAPASECO</th>
                    <th width="10%">Fecha impresion: ' . date('Y-m-d H:i') . '</th>
                </tr>
                <tr>
                    <th colspan="3">LISTADO DE EXAMENES</th>
                </tr>
            </thead>
        </table>';
        $html .= '<table border="0" cellspacing="0" width="800">
                    <thead>                        
                        <tr align="left" style="background-color:#DDD;">
                            <th width="10%">Codigo</th>
                            <th width="70%">Nombre</th>
							<th width="10%">Valor</th>
							<th width="10%">Vencimiento</th>
                        </tr>
                    </thead>
                    <tbody>';
        $res = $this->bas->consultar('codigo, descripcion, valor, vencimiento', 'ocuconc', array('delusr' => NULL));
        foreach ($res as $row) {
            extract($row);
            $html .= '<tr>
                            <td>' . $codigo . '</td>
                            <td>' . $descripcion . '</td>
							<td>' . $valor . '</td>
							<td>' . $vencimiento . '</td>
                      </tr>';
        }
        $html .= '</tbody></table><div style="page-break-after: always;"></div>';
        $html .= '</body></html>';
        echo $html;
        //crearPdf($html, 'Listado_Productos.pdf', TRUE, 'portrait', 'A4');
    }       
}