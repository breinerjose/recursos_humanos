<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Retirar_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('pazysalvo/retirar_m','reti',TRUE);//modelo, alias, verdadero cargue modelo 
	   $this->load->model('Basico_m','bas',TRUE);//modelo, alias, verdadero cargue modelo 
	}
	
	function vista($nombre=''){ // declarar el metodo
		$this->load->view("pazysalvo/".$nombre); //llamo a la vista
		}
		
	function selectestado(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->reti->selectestado();
		if($result != FALSE){
			$result2 = array();
			foreach($result as $resultado){
				$fila = array('estado'=>$resultado['estado']);
				$result2[] = $fila;
				}
				echo json_encode($result2);
			}else{echo '1';}
			
		}
	
	//chossen
	function chosen_contratos(){
		$this->output->set_header('Content-type: application/json');
		$condicion = array('estado' => 'ACTIVO', 'numid' => $this->input->post('numid'));
		$res = $this->bas->consultar('codigo,familia,oficio,lugardes,ocupor','contrato',$condicion);
		//echo $this->db->last_query();
		$info=array();
		$info[]=array('codigo'=>'','familia'=>'','oficio'=>'','lugardes'=>'','ocupor'=>''); 
		if($res!=false){ foreach($res as $row){
						 	$info[]=array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'oficio'=>$row['oficio'],'lugardes'=>$row['lugardes'],'ocupor'=>$row['ocupor']); 
							}
		echo json_encode($info); 
						} else echo 1;	
	}
	
		//chossen
	function contratos(){
		$this->output->set_header('Content-type: application/json');
		$condicion = array('estado' => 'ACTIVO');
		$res = $this->bas->consultar('numid,nombre','contrato',$condicion);
		//echo $this->db->last_query();
		$info=array();
		if($res!=false){ foreach($res as $row){
						 	$info[]=array('numid'=>$row['numid'],'nombre'=>$row['nombre']); 
							}
		echo json_encode($info); 
						} else echo 1;	
	}
	
	//chossen
	function chosen_contratos_inactivo(){
		$this->output->set_header('Content-type: application/json');
		$condicion = array('estado' => 'INACTIVO', 'numid' => $this->input->post('numid'));
		$res = $this->bas->consultar_orden('codigo,familia,oficio,lugardes,ocupor','contrato',$condicion,'fecdat');
		$info=array();
		$info[]=array('codigo'=>'','familia'=>'','oficio'=>'','lugardes'=>'','ocupor'=>''); 
		if($res!=false){ foreach($res as $row){
				$sw=$this->bas->consultarf('familia','bre_pazysalvo',array('familia'=>$row['familia'],'numero'=>$row['codigo']));
			    if($sw==false){
						 	$info[]=array('codigo'=>$row['codigo'],'familia'=>$row['familia'],'oficio'=>$row['oficio'],'lugardes'=>$row['lugardes'],'ocupor'=>$row['ocupor']); 
							}
							}
		echo json_encode($info); 
						} else echo 1;	
	}
	
	function periodopago(){
	$this->output->set_header('Content-type: application/json');
        $condicion = array('familia' =>trim($this->input->post('familia')));
        $res = $this->bas->consultarf('periodopa', 'familias', $condicion);
        $output["a"] = array('periodopa' => $res['periodopa']);
        echo json_encode($output);
	}
		
	function selectretiro(){
	$this->output->set_header('Content-type: application/json');
	$result = $this->reti->selectretiro();	
	if($result != FALSE){
			$result2 = array();
			foreach($result as $resultado){
				$fila = array('causa'=>$resultado['causa']);
				$result2[] = $fila;
				}
				echo json_encode($result2);
			}else{echo '1';}
		
		}
		
	function consultarusuario(){
	$this->output->set_header('Content-type: application/json');
	$result = $this->bas->consultarf('nombre as nomtrc','contrato',array('numid'=>$this->input->post('numid')));	
	if($result != FALSE){
	 $fila = array('nomtrc'=>$result['nomtrc']);
	 echo json_encode($fila);		
	}else{echo '1';}
		
		}	
		
		
		function vistabuscarinactivo($numid, $nombre){
		$data['nombre']=urldecode($nombre);
		$data['numid']=$numid;
		$this->load->view('/pazysalvo/buscarcontratoinactivo',$data);
		}
		
	function consultarcontratos($numid){
	$this->output->set_header('Content-type: application/json');
	$result = $this->reti->consultarcontratos($numid);
	$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $resultado ){
			$output['aaData'][] = array($resultado['codigo'],$resultado['oficio'],$resultado['fecini'],$resultado['familia'],
										" <a href='#' title='Agregar'  class='add'  data-cod='".$resultado['codigo']."'
										  data-ofi='".$resultado['oficio']."' 
		 	                              data-fam='".$resultado['familia']."' data-emp='".$resultado['conpor']." - ".$resultado['lugardes']."'
										  data-per='".$resultado['periodopa']."'data-empc='".$resultado['lugardes']."'>
										  <img src='/res/iconos/perfil.png' /></a >");
			}
			echo json_encode($output);
	    }

	}
	
	function consultarcontratosinactivo($numid){
	$this->output->set_header('Content-type: application/json');
	$result = $this->reti->consultarcontratosinactivo($numid);
	$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $resultado ){
			$output['aaData'][] = array($resultado['codigo'],$resultado['oficio'],$resultado['fecini'],$resultado['familia'],
										" <a href='#' title='Agregar'  class='add'  data-cod='".$resultado['codigo']."'
										  data-ofi='".$resultado['oficio']."' 
		 	                              data-fam='".$resultado['familia']."' data-emp='".$resultado['conpor']." - ".$resultado['lugardes']."'
										  data-per='".$resultado['periodopa']."'data-empc='".$resultado['lugardes']."'>
										  <img src='/res/iconos/perfil.png' /></a >");
			}
			echo json_encode($output);
	    }

	}
	
	
	function consultarTodosusuarios(){
	$this->output->set_header('Content-type: application/json');
	$result = $this->reti->consultarTodosusuarios();
	$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $resultado ){
			$output['aaData'][] = array($resultado['user'],$resultado['nombre'],
										" <a href='#' title='Agregar'  class='add'  data-cod='".$resultado['user']."' 
		 	                              data-nom='".$resultado['nombre']."'>
										  <img src='/res/iconos/perfil.png' /></a >");
			}
			echo json_encode($output);
	    }
		
	}
	
	
	function datoscontratos(){
		$this->output->set_header('Content-type: application/json');
		$codigo = $this->input->post('codigo');
		$familia = $this->input->post('familia');
		$conn = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
		$query1 = "SELECT IndRetirado
				   FROM nm_Contrato
		           WHERE IndRetirado = 0 AND Codigo = '$codigo'"; 		   
		$cant1 = 0;		   
		foreach ($conn->query($query1) as $row)
        { $cant1 = $cant1+1; }	
				   
		if($cant1 > 0){
		$query2 = "SELECT   TOP 1  IDEN, CONVERT(char, FechaInicio, 103) AS FechaInicio, CONVERT(char, FechaFinal, 103) AS FechaFinal
					FROM         Nm_Periodo
					WHERE     (Cerrado = 'False')";
		$cant2 = 0;
		foreach ($conn->query($query2) as $row2)
        { $cant2 = $cant2 + 1; }	}
		
		if ( $cant2 > 0){
		foreach ($conn->query($query2) as $row2)
			 { 	
			   $data['fechainicio']= "01".substr($row2[1],2);
			   $data['fechafin']="30".substr($row2[2],2);
			   $data['periodo']=$row2[0];
			   echo json_encode($data);
			 } 
		 } else{
		  echo '1';
		}
         
		}
		
		function datoscontratos_inactivo(){
		$this->output->set_header('Content-type: application/json');
		$condi['numero'] = trim(str_replace('+','',$this->input->post('codigo')));
		$condi['familia'] = trim(str_replace('+','',$this->input->post('familia')));
		$f=$this->bas->consultarf('numero','bre_pazysalvo',$condi);
		if($f == false){
		unset($condi);
		$condi['codigo'] = trim(str_replace('+','',$this->input->post('codigo')));
		$condi['familia'] = trim(str_replace('+','',$this->input->post('familia')));
		$data=$this->bas->consultarf('familia,oficio,lugardes,conpor,periodopa,fecfin','contrato_manual',$condi);
		echo json_encode($data);
		}else{ echo '0';}
		}
	
		
		function actualizarContrato(){
		   $this->output->set_header('Content-type: application/json');
		   $data['e'] = trim($this->input->post('e'));
		   $data['familia'] = trim($this->input->post('familia'));
		   $numeroa = trim($this->input->post('numero'));
		   $numeroa = explode('*',$numeroa);
		   $data['numero'] = trim($numeroa['0']);
		   $data['u'] = trim($this->input->post('u'));
		   $oficio = trim($this->input->post('oficio'));
		   $data['w'] = trim($this->input->post('w'));
		   $data['a'] = strtoupper(trim($this->input->post('conpor').' - '.$this->input->post('lugardes')));
		   $data['id_persona'] = trim($this->input->post('numid'));
		   $data['b'] = trim($this->input->post('periodopago'));
		   $data['addusr'] = $this->session->userdata('user'); 
		   $data['addfch'] = date('Y-m-d H:i:s'); 
		   $data['estadofin'] = trim($this->input->post('estado'));
		   $data['obsarc'] = trim($this->input->post('obsarc'));
		   $data['c'] = trim($this->input->post('nombre'));
		   $data['codlab'] = trim($this->input->post('codlab'));
		   $data['tipo'] = trim($this->input->post('tipo'));
		   $numero = $data['numero'];
		   $familia = $data['familia'];
		   $ee = $data['e'];
		   $IDEN = trim($this->input->post('ide'));
				   
		    $respuesta = $this->reti->verificarPazysalvo($numero,$familia);
			//echo $this->db->last_query().'</br>';
			if($respuesta==false){
		   
		   if($data['tipo'] != 'manual'){
			  $conn = new PDO("sqlsrv:Server=192.168.150.244;Database=$familia", "sa", "zeus2015*");
			  $query1 = "UPDATE Nm_Contrato SET  IndRetirado = 1, IDEN_PeriodoFinal = $IDEN, FechaRetiro = '$ee', TipoRetiro = 1, ObservacionRetiro = 'Pendiente Finiquitar', IDEN_CausasRetiro = '1' Where Codigo = '$numero' AND IndRetirado = 0"; 
			  $result1 = $conn->query($query1);
			  }
					
					   $this->reti->actualizarDatos($data['estadofin'],$data['id_persona'],$oficio);
					   //echo $this->db->last_query().'</br>';
					   $this->reti->chekeo($numero,$familia);
					   //echo $this->db->last_query().'</br>';
					   $result = $this->bas->insertar('bre_pazysalvo',$data);
					   //echo $this->db->last_query().'</br>';
					    if($result != false){
						$sqlid = "select max(id_pazysalvo) id from bre_pazysalvo";
						$res = $this->db->query($sqlid);
						$codigo = $res->row_array();
						echo $codigo['id'];
				        }else{echo '0';}				  
				  }else{
					echo '3';	
				 }   
	        }
		   
		   
	function verificarContrato(){
		$this->output->set_header('Content-type: application/json');
		$numero = $this->input->post('numero');
		$result = $this->reti->verificarPazysalvo($numero);	
		if($result != FALSE){
			echo '1';
	    }else{echo '0';}
   }
   
   function datosCertificado($codigo,$fechaemi){
	$res = $this->reti->datosCertificado($codigo);
	$res1 = $this->reti->datosFirmas('73214641');
	if($res1 == false){ echo "No Tiene Cargo El Usuario"; exit(); }
	if($res != FALSE){
		
		$data=array('fecha'=>urldecode($fechaemi),'nombre'=>$res['nombre'],'cedula'=>trim($res['id_persona']),
		            'lugar'=>$res['expedicion'],'oficio'=>$res['oficio'],'salario'=>$res['salario'],
					'fchter'=>$res['e'],'causa'=>$res['u'],'logo'=>$res['conpor'],
				'nombres'=>$this->session->userdata('nombres'),'firma'=>$this->session->userdata('user'),'cargo'=>$res1['cargo'],                
				'identificacion'=>$res1['identificacion']);			
		 $this->load->view('pazysalvo/certificadoCesasion', $data);
	}
   }
   
   function cartaterminacionparametros($codigo,$familia,$fechaemi){
	$res = $this->reti->cartaterminacionparametros($codigo,$familia);
	$res1 = $this->reti->datosFirmas('73214641');
	if($res != FALSE){
		
		$data=array('fchter'=>urldecode($fechaemi),'nombre'=>$res['nombre'],'tipocontrato'=>$res['tipocontrato'],'logo'=>$res['conpor'],
				'nombres'=>$this->session->userdata('nombres'),'firma'=>$this->session->userdata('user'));	
				
				if($res['tipocontrato']==0 or $res['tipocontrato']==3 or $res['tipocontrato']==4){$this->load->view('pazysalvo/certificadoFijo', $data);}
		 		if($res['tipocontrato']==2 or $res['tipocontrato']==5 or $res['tipocontrato']==6){$this->load->view('pazysalvo/certificadoLabor', $data);}
				$this->load->view('pazysalvo/CartaExamenesRetiro', $data);
				
	}
   }
	
	function cartaterminacionMax($codigo,$familia,$e,$fechacarta){
	$res = $this->reti->datosCertificadoMax(trim($codigo),trim($familia));
	//$this->session->userdata('user'); exit();
	$res1 = $this->reti->datosFirmas('73214641');
	if($res != FALSE){
		
		$data=array('fechacarta'=>$fechacarta,'nombre'=>$res['nombre'],'cedula'=>trim($res['id_persona']),
		            'lugar'=>$res['expedicion'],'oficio'=>$res['oficio'],'salario'=>$res['salario'],
					'fchter'=>$e,'logo'=>$res['conpor'],'tipocontrato'=>$res['tipocontrato'],
				'nombres'=>$this->session->userdata('nombres'),'firma'=>$this->session->userdata('user'),'cargo'=>$res1['cargo'],                
				'identificacion'=>$res1['identificacion']);	
				if($res['tipocontrato']==0 or $res['tipocontrato']==3 or $res['tipocontrato']==4){
				//echo "Ingreso Aca ".$res['tipocontrato'];
				$this->load->view('pazysalvo/certificadoFijo', $data);}
		 		elseif($res['tipocontrato']==2 or $res['tipocontrato']==5 or $res['tipocontrato']==6){
				//echo "Ingreso Aqui ".$res['tipocontrato'];
				$this->load->view('pazysalvo/certificadoLabor', $data);}
				//$this->load->view('pazysalvo/CartaExamenesRetiro', $data);
	}
   }
   
   function cartaterminacionUltima(){
	$res = $this->reti->datosCertificadoMax(trim($codigo),trim($familia));
	//$this->session->userdata('user'); exit();
	$res1 = $this->reti->datosFirmas('73214641');
	if($res != FALSE){
		
		$data=array('fechacarta'=>$fechacarta,'nombre'=>$res['nombre'],'cedula'=>trim($res['id_persona']),
		            'lugar'=>$res['expedicion'],'oficio'=>$res['oficio'],'salario'=>$res['salario'],
					'fchter'=>$e,'logo'=>$res['conpor'],'tipocontrato'=>$res['tipocontrato'],
				'nombres'=>$this->session->userdata('nombres'),'firma'=>$this->session->userdata('user'),'cargo'=>$res1['cargo'],                
				'identificacion'=>$res1['identificacion']);	
				if($res['tipocontrato']==0 or $res['tipocontrato']==3 or $res['tipocontrato']==4){
				//echo "Ingreso Aca ".$res['tipocontrato'];
				$this->load->view('pazysalvo/certificadoFijo', $data);}
		 		elseif($res['tipocontrato']==2 or $res['tipocontrato']==5 or $res['tipocontrato']==6){
				//echo "Ingreso Aqui ".$res['tipocontrato'];
				$this->load->view('pazysalvo/certificadoLabor', $data);}
				//$this->load->view('pazysalvo/CartaExamenesRetiro', $data);
	}
   }
	
	function CartaExamenesRetiro($codigo,$fecha){
	$res = $this->bas->consultarf('nombre,e,conpor','datoscertificado',array('id_pazysalvo'=>trim($codigo)));
	$codlab=$this->bas->consultarf('codlab','bre_pazysalvo',array('id_pazysalvo'=>$codigo));
	$row=$this->bas->consultarf('empnom,emptel,empcel,empdir','ordemp',array('empnit'=>$codlab['codlab']));
	//echo $this->db->last_query();
		$data=array('nombre'=>$res['nombre'],'fchter'=>$res['e'],'logo'=>$res['conpor'],'empnom'=>$row['empnom'],'emptel'=>$row['emptel'],'empcel'=>$row['empcel'],'empdir'=>$row['empdir']);
	$this->load->view('pazysalvo/CartaExamenesRetiro', $data);
	}
	
	function datosCertificadoMax($fechaemi){
	$res = $this->reti->datosCertificadoMax();
	$res1 = $this->reti->datosFirmas('73214641');
	if($res != FALSE){
		
		$data=array('fecha'=>urldecode($fechaemi),'nombre'=>$res['nombre'],'cedula'=>trim($res['id_persona']),
		            'lugar'=>$res['expedicion'],'oficio'=>$res['oficio'],'salario'=>$res['salario'],
					'fchter'=>$res['e'],'causa'=>$res['u'],'logo'=>$res['conpor'],
				'nombres'=>$this->session->userdata('nombres'),'firma'=>$this->session->userdata('user'),'cargo'=>$res1['cargo'],                
				'identificacion'=>$res1['identificacion']);			
		 $this->load->view('pazysalvo/certificadoCesasion', $data);
	}
   }
	
	function CertificadoCesacion($fechaemi){
	$res = $this->reti->datosCertificado('7735');
	$res1 = $this->reti->datosFirmas('73214641');
	if($res != FALSE){
		
		$data=array('fecha'=>urldecode($fechaemi),'nombre'=>$res['nombre'],'cedula'=>trim($res['id_persona']),
		            'lugar'=>$res['expedicion'],'oficio'=>$res['oficio'],'salario'=>$res['salario'],
					'fchter'=>$res['e'],'causa'=>$res['u'],'logo'=>$res['conpor'],
				'nombres'=>$this->session->userdata('nombres'),'firma'=>$this->session->userdata('user'),'cargo'=>$res1['cargo'],                
				'identificacion'=>$res1['identificacion']);			
		 $this->load->view('pazysalvo/certificadoCesasion', $data);
	}
   }
	
	function consultarCesasionlaboral(){
	$this->output->set_header('Content-type: application/json');
	$result = $this->reti->consultarCesasionlaboral();
	$output = array("aaData" => array());
		if($result != FALSE){
			foreach($result as $row ){
			$output['aaData'][] = array($row['identificacion'],$row['nombres'],
			                            $row['familia'],$row['numero'],
			" <a href='#' title='Agregar'  class='add'  data-cod='".$row['id_pazysalvo']."'>
			  Agregar</a >");
			}
			echo json_encode($output);
	    }
		
	}
	
	function consultarPazysalvo(){
		$this->output->set_header('Content-type: application/json');
		$numero = trim($this->input->post('numero'));
		$result = $this->reti->datosCertificado($numero);
		if($result != FALSE){
		 	$fila = array('numero'=>$numero,'id'=>$result['id_persona'],
			              'nombre'=>$result['nombre'],'causa'=>$result['u'],'empresa'=>strtoupper($result['conpor']));
		 	echo json_encode($fila);		
		}else{echo '1';}
	}
	
	function borrarPazysalvo(){
		$this->output->set_header('Content-type: application/json');
		$numero = trim($this->input->post('numero'));
		$result = $this->reti->borrarPazysalvo($numero);
		if($result != false){echo '1';}else{echo '0';}	
	
	}
	
	function consultarTodospazysalvo1(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->reti->consultarTodospazysalvo1();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['id_pazysalvo'],$row['d'],$row['nriper'].' '.$row['nomtrc'],
				                            $row['a'],
				"<a href='#' title='Observacion Archivo Muerto'  class='obs'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/icons/chat.png' width='16' height='16' /></a >&nbsp;&nbsp;&nbsp;
				<a href='#' title='Actualizar'  class='act'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/iconos/editar.png' width='16' height='16' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='ver'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/iconos/buscar.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
	   	function consultarTodospazysalvo2(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->reti->consultarTodospazysalvo2();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['id_pazysalvo'],$row['d'],$row['nriper'],$row['nomtrc'],$row['a'],$row['f'],
				"<a href='#' title='Observacion Archivo Muerto'  class='obs'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/icons/chat.png' width='16' height='16' /></a >&nbsp;&nbsp;&nbsp;
				<a href='#' title='Ver Informacion'  class='ver'  data-cod='".$row['id_pazysalvo']."'>
				  <img src='/res/iconos/buscar.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }
	   
      function datosPazysalvo(){
	  	  $this->output->set_header('Content-type:application/json');	
		  $row = $this->reti->datosPazysalvo($this->input->post('codigo'));
		  if($row!=false){
		  $output['info']=$row;
		  $output["err"]='1';	
		  }else{
			$output["err"]='0';}
		 echo json_encode($output);
	   }
	   
	   
	   
	   function observaciones($codigo){
		  $res = $this->reti->datosPazysalvo($codigo);
		  $data=array('numero'=>$codigo,'nombre'=>$res['nombre'],'cedula'=>$res['id_persona'],
		            'empclt'=>$res['lugardes'],'obs'=>$res['v'],'nota'=>$res['w'],'t'=>$res['t'],'u'=>$res['u'],
					'fchter'=>$res['e'],'causa'=>$res['u'],'logo'=>$res['conpor'],
					'per'=>$res['b'],'g'=>$res['g'],'n'=>$res['n'],'h'=>$res['h'],'o'=>$res['o'],'i'=>$res['i'],'p'=>$res['p'],'j'=>$res['j'],'q'=>$res['q'],'k'=>$res['k'],'r'=>$res['r'],'obsarc'=>$res['obsarc']);
		  $this->load->view('/pazysalvo/observaciones_v',$data);
	   }
	   
	   function revertirPazysalvo(){
		  $this->output->set_header('Content-type: application/json');
		  $numero = trim($this->input->post('numero'));$estado='1';
		  $result = $this->reti->revertirPazysalvo($numero,$estado);
		  if($result != false){echo '1';}else{echo '0';}
		}
	  
	  function actualizarPazysalvo(){
		$this->output->set_header('Content-type: application/json');
		$g =($this->input->post('g'))?$this->input->post('g'):'N/A';
		$h =($this->input->post('h'))?$this->input->post('h'):'N/A';
		$i =($this->input->post('i'))?$this->input->post('i'):'N/A';
		$j =($this->input->post('j'))?$this->input->post('j'):'N/A';
		$k =($this->input->post('k'))?$this->input->post('k'):'N/A';
		$l =($this->input->post('l'))?$this->input->post('l'):'N/A';
		$m =($this->input->post('m'))?$this->input->post('m'):'N/A';
		$n =($this->input->post('n'))?$this->input->post('n'):'N/A';
		$o =($this->input->post('o'))?$this->input->post('o'):'N/A';
		$p =($this->input->post('p'))?$this->input->post('p'):'N/A';
		$q =($this->input->post('q'))?$this->input->post('q'):'N/A';
		$r =($this->input->post('r'))?$this->input->post('r'):'N/A';
		$dotacion= $this->input->post('dotacion');
		$codigo= $this->input->post('numero');
		if($l =='SI'){$ll = $this->input->post('valor');}else{$ll=null;}
		if($dotacion=='SI'){$t = $this->input->post('t');}else{$t=null;}
		$estado='1';
		$result = $this->reti->actualizarPazysalvo($g,$h,$i,$j,$k,$l,$ll,$m,$n,$o,$p,$q,$r,$dotacion,$t,$estado,$codigo);
		if($result !=false){
			echo '1';
		}else{echo '0';}
	   }   
	   
	     function actualizarobservacion(){
		$this->output->set_header('Content-type: application/json');
		$data ['obsarc'] = $this->input->post('obsarc').' *** '.$this->input->post('nobser');
		$condicion = array('id_pazysalvo' => $this->input->post('numero'));
		$result = $this->bas->actualizar('bre_pazysalvo',$data,$condicion);
		//echo $this->db->last_query();
		if($result !=false){
			echo '1';
		}else{echo '0';}
	   }   
	   
	    function actualizarPazysalvo2(){
		$this->output->set_header('Content-type: application/json');
		$g =($this->input->post('g'))?$this->input->post('g'):'N/A';
		$h =($this->input->post('h'))?$this->input->post('h'):'N/A';
		$i =($this->input->post('i'))?$this->input->post('i'):'N/A';
		$j =($this->input->post('j'))?$this->input->post('j'):'N/A';
		$k =($this->input->post('k'))?$this->input->post('k'):'N/A';
		$l =($this->input->post('l'))?$this->input->post('l'):'N/A';
		$m =($this->input->post('m'))?$this->input->post('m'):'N/A';
		$n =($this->input->post('n'))?$this->input->post('n'):'N/A';
		$o =($this->input->post('o'))?$this->input->post('o'):'N/A';
		$p =($this->input->post('p'))?$this->input->post('p'):'N/A';
		$q =($this->input->post('q'))?$this->input->post('q'):'N/A';
		$r =($this->input->post('r'))?$this->input->post('r'):'N/A';
		$dotacion= $this->input->post('dotacion');
		$codigo= $this->input->post('numero');
		if($l =='SI'){$ll = $this->input->post('valor');}else{$ll=null;}
		if($dotacion=='SI'){$t = $this->input->post('t');}else{$t=null;}
		$estado='2';
		$result = $this->reti->actualizarPazysalvo($g,$h,$i,$j,$k,$l,$ll,$m,$n,$o,$p,$q,$r,$dotacion,$t,$estado,$codigo);
		if($result !=false){
			echo '1';
		}else{echo '0';}
	   }
	   
	   function imprimirPazysalvo($codigo){
		  $res = $this->reti->imprimirPazysalvo($codigo);
			$data=array('numero'=>$res['familia']." ".$res['numero'],'nombre'=>$res['nombre'],'cedula'=>$res['id_persona'],
				'empclt'=>$res['lugardes'],'obs'=>$res['v'],'nota'=>$res['w'],
				'fchter'=>$res['e'], 'logo'=>$res['conpor'],
				'per'=>$res['b'],'id'=>$res['id_pazysalvo'],'fcheje'=>$res['addfch'],'g'=>$res['g'],
				'j'=>$res['j'],'h'=>$res['h'],'i'=>$res['i'],'k'=>$res['k'],'n'=>$res['n'],
				'l'=>$res['l'],'ll'=>$res['ll'],'o'=>$res['o'],'p'=>$res['p'],'q'=>$res['q'],'r'=>$res['r'],'estado'=>$res['estadofin'],
				'dotacion'=>$res['dotacion'],'m'=>$res['m'],'u'=>$res['u'],'t'=>$res['t'], 'id_persona'=>$res['id_persona']);	
			 $this->load->view('pazysalvo/imprimirPazysalvo_v', $data);
	   }
	   	
		
		function consultarhojasdevida($labor){
		$this->output->set_header('Content-type: application/json');
		//$labor=$this->input->post('labor');
		$result = $this->reti->postulaciones($labor);
		$output = array("aaData" => array());
		if($result != FALSE){
				foreach($result as $row ){
				$res = $this->reti->datos_persona(trim($row['cedula']));
				if($res != FALSE){
				$output['aaData'][] = array($row['cedula'],$res['nombres'],$row['titulo'],$res['estado'],
				"<a href='#' title='No Preseleccionado'  class='act'  data-cod='".$row['cedula']."'>
				  <img src='/res/iconos/no.png' width='16' height='16' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='ver'  data-cod='".$row['cedula']."'>
				  <img src='/res/iconos/buscar.png' width='20' height='20' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Modificar Informacion'  class='mod'  data-cod='".$row['cedula']."'>
				  <img src='/res/iconos/editar.png' width='20' height='20' /></a >");
				  }
				}
				echo json_encode($output);
			}
	   }
	   
	   function consultarhojasdevidatodas(){
		$this->output->set_header('Content-type: application/json');
		//$labor=$this->input->post('labor');
		$ale=$this->input->post('ale');
		$result = $this->reti->preseleccionados();
		$output = array("aaData" => array());
		if($result != FALSE){
				foreach($result as $row ){
				$a='';
					if($row['token'] != ''){$a="<a class='btn btn-warning btn-xs pdf".$ale."' 
					title='Ver Pdf' data-tok='".$row['token']."' 
			   role='button' href='javascript:void(0);'><i class='fa fa-print'></i></a>"; }
				$res = $this->reti->datos_persona(trim($row['cedula']));
				if($res != FALSE){
				if($res['laborppal'] != ''){
				$output['aaData'][] = array(trim($row['cedula']),$res['nombres'],$res['estudios'].": ".$res['nombretitulo'],$res['laborppal'],$res['sexo'],substr($res['fechasolicitud'],0,10),
				"
				<a href='#' title='No Preseleccionado'  class='act'  data-cod='".trim($row['cedula'])."'>X</a >&nbsp;
    			<a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($row['cedula'])."'>Ver</a >&nbsp; 
				<a href='#' title='Modificar Informacion'  class='mod'  data-cod='".trim($row['cedula'])."'>Mod</a >
				".$a."
				   ");
				  	}
				  }
				}
				echo json_encode($output);
			}
	   }
	   
	   function consultarhojasdevidad($labor){
		$this->output->set_header('Content-type: application/json');
		//$labor=$this->input->post('labor');
		$result = $this->reti->postulaciones($labor);
		$output = array("aaData" => array());
		if($result != FALSE){
				foreach($result as $row ){
				$res = $this->reti->datos_personad(trim($row['cedula']));
				if($res != FALSE){
				$output['aaData'][] = array(trim($row['cedula']),$res['nombres'],$row['titulo'],$res['estado'],
				"<a href='#' title='No Preseleccionado'  class='act'  data-cod='".trim($row['cedula'])."'>
				  <img src='/res/iconos/no.png' width='16' height='16' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($row['cedula'])."'>
				  <img src='/res/iconos/buscar.png' width='20' height='20' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Modificar Informacion'  class='mod'  data-cod='".trim($row['cedula'])."'>
				  <img src='/res/iconos/editar.png' width='20' height='20' /></a >");
				  }
				}
				echo json_encode($output);
			}
	   }
	   
	    function disponibles(){
		$this->output->set_header('Content-type: application/json');
		$ale=$this->input->post('ale');
		$output = array("aaData" => array());
				$row = $this->reti->disponibles();
				if($row != FALSE){
					foreach($row as $res ){
					$a='';
					if($res['token'] != ''){$a="<a class='btn btn-warning btn-xs pdf".$ale."' 
					title='Ver Pdf' data-tok='".$res['token']."' 
			   role='button' href='javascript:void(0);'><i class='fa fa-print'></i></a>"; }
				$output['aaData'][] = array(
				trim($res['cedula']),
				$res['nombres'],
				$res['estudios'].": ".$res['nombretitulo'],
				$res['laborppal'].", ".$res['labor4'],$res['estado'],
				"<a href='javascript:void(0);' title='Archivo Muerto'  class='rvtir btnst' data-cod ='".trim($res['cedula'])."'>Archivo Muerto</a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($res['cedula'])."'>Ver</a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Modificar Informacion'  class='mod'  data-cod='".trim($res['cedula'])."'>Mod</a >
				 '".$a."'");
				  	}
				  }
				echo json_encode($output);
			}
	   
	   
	    function contratados(){
		$this->output->set_header('Content-type: application/json');
		$output = array("aaData" => array());
				$row = $this->reti->contratados();
				if($row != FALSE){
					foreach($row as $res ){
				$output['aaData'][] = array(
				trim($res['cedula']),
				$res['nombres'],
				$res['estudios'].": ".$res['nombretitulo'],
				$res['laborppal'].", ".$res['labor4'],$res['estado'],
				"<a href='#' title='No Preseleccionado'  class='act'  data-cod='".trim($res['cedula'])."'>X</a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($res['cedula'])."'>Ver</a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Modificar Informacion'  class='mod'  data-cod='".trim($res['cedula'])."'>Mod</a >");
				  	}
				  }
				echo json_encode($output);
			}
	   
	    function procesar(){
		$this->output->set_header('Content-type: application/json');
		$ale=$this->input->post('ale');
		$output = array("aaData" => array());
		$row = $this->bas->consultar('cedula, estado, nombres, estudios, nombretitulo, laborppal, labor4, token','datos',array('estado'=>'Por Preseleccionar'));
				if($row != FALSE){
				foreach($row as $res ){
				$a='';
					if($res['token'] != ''){$a="<a class='btn btn-warning btn-xs pdf".$ale."' 
					title='Ver Pdf' data-tok='".$res['token']."' 
			   role='button' href='javascript:void(0);'><i class='fa fa-print'></i></a>"; }
				$x="<a href='#' title='No Preseleccionado'  class='act'  data-cod='".trim($res['cedula'])."'>X</a >&nbsp;&nbsp;&nbsp;
				<a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($res['cedula'])."'>Ver</a >&nbsp;&nbsp;&nbsp";
				if($this->session->userdata('user') == '1047416164'){$x .="<a href='#' title='Modificar Informacion'  class='mod'  data-cod='".trim($res['cedula'])."'>Mod</a >";}
				$output['aaData'][] = array(
				trim($res['cedula']),
				$res['nombres'],
				$res['estudios'].": ".$res['nombretitulo'],
				$res['laborppal'].", ".$res['labor4'],$res['estado'],$x.''.$a);
				  	}
				  }
				echo json_encode($output);
			}
	   
	   
	     function infozeus(){
		$this->output->set_header('Content-type: application/json');
		$output = array("aaData" => array());
		        $row = $this->bas->consultar('cedula, nombres, telefono, celular','datoszeus',array('cedula !='=>'0'));
				if($row != FALSE){
					foreach($row as $res ){
				$output['aaData'][] = array(
				trim($res['cedula']),
				$res['nombres'],
				$res['telefono'],
				$res['celular'],
				"<a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($res['cedula'])."'>Ver</a >");
				  	}
				  }
				echo json_encode($output);
			}
			
	    function infozeusprint($codigo){
			$data['res']=$this->bas->consultarf('*','datoszeus',array('cedula'=>$codigo));
			$data['row']=$this->bas->consultar_orden('*','contrato',array('numid'=>$codigo),'fecini');
			 $this->load->view('pazysalvo/infozeusprint', $data);
		}
	   	function consultarhojasdevidac($labor){
		$this->output->set_header('Content-type: application/json');
		//$labor=$this->input->post('labor');
		$result = $this->reti->postulaciones($labor);
		$output = array("aaData" => array());
		if($result != FALSE){
				foreach($result as $row ){
				$res = $this->reti->datos_personac(trim($row['cedula']));
				if($res != FALSE){
				$output['aaData'][] = array(trim($row['cedula']),$res['nombres'],$row['titulo'],$res['estado'],
				"<a href='#' title='No Preseleccionado'  class='act'  data-cod='".trim($row['cedula'])."'>
				  <img src='/res/iconos/no.png' width='16' height='16' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Ver Informacion'  class='ver'  data-cod='".trim($row['cedula'])."'>
				  <img src='/res/iconos/buscar.png' width='20' height='20' /></a >&nbsp;&nbsp;&nbsp;
				  <a href='#' title='Modificar Informacion'  class='mod'  data-cod='".trim($row['cedula'])."'>
				  <img src='/res/iconos/editar.png' width='20' height='20' /></a >");
				  }
				}
				echo json_encode($output);
			}
	   }
	   
function imprimirhojadevida($codigo){
		  $res = $this->reti->imprimirhojadevida($codigo);
			$data=array('primernombre'=>$res['primernombre'],'segundonombre'=>$res['segundonombre'],
				'primerapellido'=>$res['primerapellido'],'segundoapellido'=>$res['segundoapellido'],'nombres'=>$res['nombres'],'cedula'=>trim($res['cedula']),
				'decedula'=>$res['decedula'], 'dianac'=>$res['dianac'],
				'mesnac'=>$res['mesnac'],'anionac'=>$res['anionac'],'lugarnacimiento'=>$res['lugarnacimiento'],'email'=>$res['email'],
			'direccion'=>$res['direccion'],'ciudad'=>$res['ciudad'],'tipocasa'=>$res['tipocasa'],'valorarriendo'=>$res['valorarriendo'],'tiempocasaanio'=>$res['tiempocasaanio'],
			'tiempocasames'=>$res['tiempocasames'],'telefono'=>$res['telefono'],'celular'=>$res['celular'],'nombrefamiliar'=>$res['nombrefamiliar'],
			'telefonofamiliar'=>$res['telefonofamiliar'],'nombrevecino'=>$res['nombrevecino'],'telefonovecino'=>$res['telefonovecino'],'estadocivil'=>$res['estadocivil'],'numerohijos'=>$res['numerohijos'],'ultimaempresa1'=>$res['ultimaempresa1'],'telefonoempresa1'=>$res['telefonoempresa1'],'direccionempresa1'=>$res['direccionempresa1'],'ciudadempresa1'=>$res['ciudadempresa1'],'ultimosalario1'=>$res['ultimosalario1'],'cargodesempenado1'=>$res['cargodesempenado1'],'supervisor1'=>$res['supervisor1'],
			'inicioempleo1'=>$res['inicioempleo1'],'finempleo1'=>$res['finempleo1'],'ultimaempresa2'=>$res['ultimaempresa2'],'telefonoempresa2'=>$res['telefonoempresa2'],'direccionempresa2'=>$res['direccionempresa2'],'ciudadempresa2'=>$res['ciudadempresa2'],'ultimosalario2'=>$res['ultimosalario2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'inicioempleo2'=>$res['inicioempleo2'],'finempleo2'=>$res['finempleo2'],'ultimaempresa'=>$res['ultimaempresa'],'telefonoempresa'=>$res['telefonoempresa'],'direccionempresa'=>$res['direccionempresa'],'ciudadempresa'=>$res['ciudadempresa'],'ultimosalario'=>$res['ultimosalario'],'cargodesempenado'=>$res['cargodesempenado'],'supervisor'=>$res['supervisor'],'inicioempleo'=>$res['inicioempleo'],'finempleo'=>$res['finempleo'],'bachillerato'=>$res['bachillerato'],'iniciobachillerato'=>$res['iniciobachillerato'],'finbachillerato'=>$res['finbachillerato'],'grado'=>$res['grado'],'tipogrado'=>$res['tipogrado'],'tipogrado'=>$res['tipogrado'],'institucionestudio'=>$res['institucionestudio'],'inicioestudios'=>$res['inicioestudios'],'nombretitulo'=>$res['nombretitulo'],'estudiosactualmente'=>$res['estudiosactualmente'],'fechasolicitud'=>$res['fechasolicitud'],'estado'=>$res['estado'],'estudios'=>$res['estudios'],'finestudios'=>$res['finestudios'],'estudios2'=>$res['estudios2'],'finestudios2'=>$res['finestudios2'],
				'institucionestudio2'=>$res['institucionestudio2'],'inicioestudios2'=>$res['inicioestudios2'],'nombretitulo2'=>$res['nombretitulo2'],'comentario'=>$res['comentario'],'fechanacimiento'=>$res['fechanacimiento'],'funciones1'=>$res['funciones1'],'funciones2'=>$res['funciones2'],'emazeus'=>$res['emazeus'],'telzeus'=>$res['telzeus']);	
			 $this->load->view('pazysalvo/imprimirhojadevida', $data);
	   }
	   
	   function editar_hvida(){
	    $labor1 = $this->input->post('labor1');
		$emp = $this->input->post('emp');
		$data = $this->input->post('data');
		$condi=array('cedula'=>$emp);
		//valido estado
		if($data != ''){
		$data=array('labor1'=>$labor1, 'estado'=>$data);
		$this->bas->actualizar('datos',$data,$condi);
		}elseif($emp != ''){echo "Escoja Estado Empleado";}
		
		
	   $condi=array('estado'=>'Por Preseleccionar');
	   $res=$this->bas->consultarf_limit('*','datos',$condi);
	   if($res != false){
			$data=array('primernombre'=>$res['primernombre'],'segundonombre'=>$res['segundonombre'],
				'primerapellido'=>$res['primerapellido'],'segundoapellido'=>$res['segundoapellido'],'nombres'=>$res['nombres'],'cedula'=>trim($res['cedula']),
				'decedula'=>$res['decedula'], 'dianac'=>$res['dianac'],'laborppal'=>$res['laborppal'],
				'mesnac'=>$res['mesnac'],'anionac'=>$res['anionac'],'lugarnacimiento'=>$res['lugarnacimiento'],'email'=>$res['email'],
				'direccion'=>$res['direccion'],'ciudad'=>$res['ciudad'],'tipocasa'=>$res['tipocasa'],'valorarriendo'=>$res['valorarriendo'],'tiempocasaanio'=>$res['tiempocasaanio'],
				'tiempocasames'=>$res['tiempocasames'],'telefono'=>$res['telefono'],'celular'=>$res['celular'],'nombrefamiliar'=>$res['nombrefamiliar'],'telefonofamiliar'=>$res['telefonofamiliar'],
				'nombrevecino'=>$res['nombrevecino'],'telefonovecino'=>$res['telefonovecino'],'estadocivil'=>$res['estadocivil'],'numerohijos'=>$res['numerohijos'],'ultimaempresa1'=>$res['ultimaempresa1'],'telefonoempresa1'=>$res['telefonoempresa1'],'direccionempresa1'=>$res['direccionempresa1'],'ciudadempresa1'=>$res['ciudadempresa1'],'ultimosalario1'=>$res['ultimosalario1'],'cargodesempenado1'=>$res['cargodesempenado1'],'supervisor1'=>$res['supervisor1'],'inicioempleo1'=>$res['inicioempleo1'],'finempleo1'=>$res['finempleo1'],'ultimaempresa2'=>$res['ultimaempresa2'],'telefonoempresa2'=>$res['telefonoempresa2'],'direccionempresa2'=>$res['direccionempresa2'],'ciudadempresa2'=>$res['ciudadempresa2'],'ultimosalario2'=>$res['ultimosalario2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'inicioempleo2'=>$res['inicioempleo2'],'finempleo2'=>$res['finempleo2'],'ultimaempresa'=>$res['ultimaempresa'],'telefonoempresa'=>$res['telefonoempresa'],'direccionempresa'=>$res['direccionempresa'],'ciudadempresa'=>$res['ciudadempresa'],'ultimosalario'=>$res['ultimosalario'],'cargodesempenado'=>$res['cargodesempenado'],'supervisor'=>$res['supervisor'],'inicioempleo'=>$res['inicioempleo'],'finempleo'=>$res['finempleo'],'bachillerato'=>$res['bachillerato'],'iniciobachillerato'=>$res['iniciobachillerato'],'finbachillerato'=>$res['finbachillerato'],'grado'=>$res['grado'],'tipogrado'=>$res['tipogrado'],'tipogrado'=>$res['tipogrado'],'institucionestudio'=>$res['institucionestudio'],'inicioestudios'=>$res['inicioestudios'],'nombretitulo'=>$res['nombretitulo'],'estudiosactualmente'=>$res['estudiosactualmente'],'fechasolicitud'=>$res['fechasolicitud'],'estado'=>$res['estado'],'estudios'=>$res['estudios'],'finestudios'=>$res['finestudios'],'estudios2'=>$res['estudios2'],'finestudios2'=>$res['finestudios2'],
				'institucionestudio2'=>$res['institucionestudio2'],'inicioestudios2'=>$res['inicioestudios2'],'nombretitulo2'=>$res['nombretitulo2'],'comentario'=>$res['comentario'],'fechanacimiento'=>$res['fechanacimiento'],'funciones1'=>$res['funciones1'],'funciones2'=>$res['funciones2']);	
				
				$x=$this->bas->consultarf('count(cedula) as total','datos',$condi);
				$data['cantidad']=$x['total'];

			 $this->load->view('pazysalvo/hojadevida_editar_v', $data);
			 
			 
			 }else{
			 echo '<span><center><font color="#FF0000" size="+4">NO EXISTEN SOLICITUDES POR REVISAR</font></center></span>';
			 }
	   }
	   
	   
	   	   function c_hvida($emp){
		   
		$labor1 = $this->input->post('labor1');
		$data = $this->input->post('data');
		$condi=array('cedula'=>$emp);
		//valido estado
		if($data != ''){
		$data=array('labor1'=>$labor1, 'estado'=>$data);
		$this->bas->actualizar('datos',$data,$condi);
		echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
		}elseif($emp != ''){echo "Escoja Estado Empleado";}
		
	   $res=$this->bas->consultarf_limit('*','datos',$condi);
	   if($res != false){
		  
			$data=array('primernombre'=>$res['primernombre'],'segundonombre'=>$res['segundonombre'],
				'primerapellido'=>$res['primerapellido'],'segundoapellido'=>$res['segundoapellido'],'nombres'=>$res['nombres'],'cedula'=>trim($res['cedula']),
				'decedula'=>$res['decedula'], 'dianac'=>$res['dianac'],'laborppal'=>$res['laborppal'],
				'mesnac'=>$res['mesnac'],'anionac'=>$res['anionac'],'lugarnacimiento'=>$res['lugarnacimiento'],'email'=>$res['email'],
				'direccion'=>$res['direccion'],'ciudad'=>$res['ciudad'],'tipocasa'=>$res['tipocasa'],'valorarriendo'=>$res['valorarriendo'],'tiempocasaanio'=>$res['tiempocasaanio'],
				'tiempocasames'=>$res['tiempocasames'],'telefono'=>$res['telefono'],'celular'=>$res['celular'],'nombrefamiliar'=>$res['nombrefamiliar'],'telefonofamiliar'=>$res['telefonofamiliar'],
				'nombrevecino'=>$res['nombrevecino'],'telefonovecino'=>$res['telefonovecino'],'estadocivil'=>$res['estadocivil'],'numerohijos'=>$res['numerohijos'],'ultimaempresa1'=>$res['ultimaempresa1'],'telefonoempresa1'=>$res['telefonoempresa1'],'direccionempresa1'=>$res['direccionempresa1'],'ciudadempresa1'=>$res['ciudadempresa1'],'ultimosalario1'=>$res['ultimosalario1'],'cargodesempenado1'=>$res['cargodesempenado1'],'supervisor1'=>$res['supervisor1'],'inicioempleo1'=>$res['inicioempleo1'],'finempleo1'=>$res['finempleo1'],'ultimaempresa2'=>$res['ultimaempresa2'],'telefonoempresa2'=>$res['telefonoempresa2'],'direccionempresa2'=>$res['direccionempresa2'],'ciudadempresa2'=>$res['ciudadempresa2'],'ultimosalario2'=>$res['ultimosalario2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'cargodesempenado2'=>$res['cargodesempenado2'],'supervisor2'=>$res['supervisor2'],'inicioempleo2'=>$res['inicioempleo2'],'finempleo2'=>$res['finempleo2'],'ultimaempresa'=>$res['ultimaempresa'],'telefonoempresa'=>$res['telefonoempresa'],'direccionempresa'=>$res['direccionempresa'],'ciudadempresa'=>$res['ciudadempresa'],'ultimosalario'=>$res['ultimosalario'],'cargodesempenado'=>$res['cargodesempenado'],'supervisor'=>$res['supervisor'],'inicioempleo'=>$res['inicioempleo'],'finempleo'=>$res['finempleo'],'bachillerato'=>$res['bachillerato'],'iniciobachillerato'=>$res['iniciobachillerato'],'finbachillerato'=>$res['finbachillerato'],'grado'=>$res['grado'],'tipogrado'=>$res['tipogrado'],'tipogrado'=>$res['tipogrado'],'institucionestudio'=>$res['institucionestudio'],'inicioestudios'=>$res['inicioestudios'],'nombretitulo'=>$res['nombretitulo'],'estudiosactualmente'=>$res['estudiosactualmente'],'fechasolicitud'=>$res['fechasolicitud'],'estado'=>$res['estado'],'estudios'=>$res['estudios'],'finestudios'=>$res['finestudios'],'estudios2'=>$res['estudios2'],'finestudios2'=>$res['finestudios2'],
				'institucionestudio2'=>$res['institucionestudio2'],'inicioestudios2'=>$res['inicioestudios2'],'nombretitulo2'=>$res['nombretitulo2'],'comentario'=>$res['comentario'],'fechanacimiento'=>$res['fechanacimiento'],'funciones1'=>$res['funciones1'],'funciones2'=>$res['funciones2']);	
				$x=$this->bas->consultarf('count(cedula) as total','datos',array('estado'=>'Por Preseleccionar'));
				$data['cantidad']=$x['total'];
			 $this->load->view('pazysalvo/hojadevida_editar_v', $data);
			 
			 
			 }else{
			 echo '<span><center><font color="#FF0000" size="+4">NO EXISTEN SOLICITUDES POR REVISAR</font></center></span>';
			 }
	   }
	   
		  function trasladar($codigo){
		  $res = $this->reti->consultarestado($codigo);
		  $data=array('cedula'=>trim($res['cedula']));
		  $this->load->view('pazysalvo/trasladar', $data);
		  }   	   
	   
	   	  function modificarhdv($codigo){
		  $res = $this->reti->modificarhdv($codigo);
		  $data=array('id_datos'=>$res['id_datos']);
		  $this->load->view('pazysalvo/empleo2b', $data);
		  } 
		  
		  function nopreseleccionado(){
		  $codigo = $this->input->post('cod');
		  $result = $this->reti->nopreseleccionado($codigo);
		  if($result == true){ echo 1; }
		  else{echo 0;}
		  }
		  
		
		
		  
function consultarcontrato(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->reti->consultarcontrato();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['numid'],$row['nombre'],$row['oficio'],$row['fecini'],$row['fecfin'],
				"<a href='#' title='Pagada'  class='pagada'  data-cod='".$row['Codigo']."'>
				  <img src='/res/iconos/seleccion.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }	
	   
	   function contratofirmado(){
	      $codigo = $this->input->post('codigo');
		  $result = $this->reti->contratofirmado($codigo);
		  if($result == true){ echo 1; }
		  else{echo 0;}
		  }		 
		  
function contratopagado(){
		$this->output->set_header('Content-type: application/json');
		$result = $this->reti->contratopagado();
		$output = array("aaData" => array());
			if($result != FALSE){
				foreach($result as $row ){
				$output['aaData'][] = array($row['numid'],$row['nombre'],$row['oficio'],$row['fecini'],$row['fecfin'],
				"<a href='#' title='Pagada'  class='pagada'  data-cod='".$row['Codigo']."'>
				  <img src='/res/iconos/seleccion.png' width='20' height='20' /></a >");
				}
				echo json_encode($output);
			}
	   }		  

function pagado(){
		  $codigo = $this->input->post('codigo');
		  $result = $this->reti->pagado($codigo);
		  if($result == true){ echo 1; }
		  else{echo 0;}
		  }			
		   
}

?>