<?php 

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL); 

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
       class Mk_c extends CI_Controller {
	   function __Construct(){ 
	   parent::__construct();
	   $this->load->model('Basico_m','bas',TRUE);
	   date_default_timezone_set('America/Bogota');
	}
	

	function  inicial(){  
	$ip='a280098ed91f.sn.mynetname.net';
	$usuario='breiner';
	$clave='F26ef4a24A..--++%';
	$puerto='8728';
	$interface = $this->input->get('interface');
	$API = new RouterosAPI();
	$data = new StdClass();

	if ($API->connect($ip,$usuario,$clave,$puerto)) {
		$API->write('/system/resource/print');

		$READ = $API->read(false);
		$ARRAY = $API->parseResponse($READ);
		   
		$API->disconnect();

		$data->estado = 1;
		$data->boardname = $ARRAY[0]['board-name'];
		$data->uptime = $ARRAY[0]['uptime'];
		$data->cpuload = $ARRAY[0]['cpu-load'];
		$data->version = $ARRAY[0]['version'];


	} else {
		$data->estado = 0;
	}
		echo json_encode($data);
	}
	
	function arpx(){
	for($i=1;$i>0;$i++){
	echo $i;
	
	}
	}
	
	function diarioo(){
	
	ini_set('max_execution_time', 300000);
	//Consultar Api
	//$resp=json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/dispositivos/'),true);
	$r = json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/usuarios_cortados/'),true);
	foreach($this->bas->consultar('*','mikrot',array('nombre !='=>'inactivo')) as $rows){
	extract($rows);
	$API = new RouterosAPI();
	$data = new StdClass();
	$API->debug = false;
    if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){
	
//
		$API->write('/ip/arp/print');
		$READ = $API->read(false);
		$ARRAY = $API->parseResponse($READ);
		//echo $iphost.'--------------------</br>';
		foreach($ARRAY as $row){	 
		$x = array_search($row['address'], array_column($r, 'ip'));
		$stdusr = $r[$x]['stdusr'];
		if ($stdusr == 'Activo' and $x != ''){
		//Si está activo no hacer nada
		//$API->write('/ip/arp/enable', false);
		//$API->write('=.id='.$row['.id']);
		//echo "Activa".$row['address'].'</br>';
		//$API->read();
    	}elseif($x == ''){
		   echo "Remueve".$row['address'].'</br>'; //remove
		   $API->write('/ip/arp/disable', false);
	       $API->write('=.id='.$row['.id']);
	       $API->read();
		}
		else{
		   //echo "Desabilita".$row['address'].'</br>';
		   $API->write('/ip/arp/disable', false);
	       $API->write('=.id='.$row['.id']);
	       $API->read();
		}	
		
	  }	   
		$API->disconnect();
		} else {
		echo "No Conecto";
	}
		//echo json_encode($data);
	}
	echo date ('Y-m-d H:i');
	}
	
	function arp(){
	ini_set('max_execution_time', 300000);
	//Consultar Api
	//$resp=json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/dispositivos/'),true);
	$r = json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/pagos_hoy/'),true);
	foreach($this->bas->consultar('*','mikrot',array('nombre !='=>'inactivo')) as $row){
	extract($row);
	$API = new RouterosAPI();
	$data = new StdClass();
	$API->debug = false;
    if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){//
	    //echo $iphost.'--------------------</br>';
		$API->write('/ip/arp/print');
		$READ = $API->read(false);
		$ARRAY = $API->parseResponse($READ);
		foreach($ARRAY as $row){	 
		//$x=(array_search($row['address'],array_map(function($r){return $r["stdusr"];},$r)));
		$x = array_search($row['address'], array_column($r, 'ip'));
		$stdusr = $r[$x]['stdusr'];
		if ($stdusr == 'Activo' and $x != ''){
		   $API->write('/ip/arp/enable', false);
	       $API->write('=.id='.$row['.id']);
		   //echo $r[$x]['nomtrc'].' '.date('Y-m-d H:i').'</br>';
	       $API->read();
		}
		
	  }
	  		   
		$API->disconnect();
		$data->estado = 1;
		$data->host = $iphost;
	} else {
		$data->estado = 0;
		$data->host = $iphost;
	}
		//echo json_encode($data).'</br>';
	}
	header ("Location: https://vired.asapaseco.com/Login_c/ip/");
	echo date ('Y-m-d H:i');
	}
	
	
	function trafico(){
	foreach($this->bas->consultar('*','mikrot',array('nombre !='=>'inactivo')) as $row){
	extract($row);
	$API = new RouterosAPI();
	$API->debug = false;
  
  if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){
    $getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
      "interface" => $interface,
      "once" => "",
      ));

    $rows = array(); 
	$rows2 = array();

    $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
    $frx = $getinterfacetraffic[0]['rx-bits-per-second'];

      /*$rows['name'] = 'Tx';
      $rows['data'][] = $ftx;
      $rows2['name'] = 'Rx';
      $rows2['data'][] = $frx;*/
	  $mb = round($frx/1000000,0);
	   echo date('h:i').' '.$nombre.' '.$mb.'</br>'; 
	   $h=date('G');
	   
	   switch($nombre) {
	   case 'rb11':
	      if( ($mb < 30 and ($h > 5 and $h < 9)) or ($mb < 80 and $h > 8 and $h < 22) or ($mb < 30 and $h > 21)){
	   ?> <audio src="/res/sonido.mp3" controls="controls" autoplay></audio></br><?php  }
	   break;
	   case 'rb16':
	      if( ($mb < 30 and ($h > 5 and $h < 9)) or ($mb < 100 and $h > 8 and $h < 22) or ($mb < 70 and $h > 21)){
	   ?> <audio src="/res/sonido.mp3" controls="controls" autoplay></audio></br><?php  }
	   break;
	   }

  }else{
		 echo "<font color='#ff0000'>Connection Failed!!</font><audio src='/res/sonido.mp3'  controls='controls' autoplay></audio>";
  }
  	$API->disconnect();
    /*$result = array();
	array_push($result,$rows);
	array_push($result,$rows2);
  	print json_encode($result);*/
	}
	}
	
	function add_arp($ip,$mac,$comentario,$int,$stdusr){
	$lenght=strlen($mac);
	if($lenght == 17){
	$this->benchmark->mark('code_start');
	ini_set('max_execution_time', 30000000);
	
	//Consultar Api
	$r = json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/estado_usuarios/'),true);
	$resp=json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/dispositivos_todos/'),true);
	foreach($resp as $rows){
	extract($rows);
	$API = new RouterosAPI();
	$API->debug = false;
	$data = new StdClass();
    if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){
		$API->write('/ip/arp/print');
		$READ = $API->read(false);
		$ARRAY = $API->parseResponse($READ);
		foreach($ARRAY as $row){			 
		//$x=(array_search($row['address'],array_map(function($r){return $r["stdusr"];},$r)));
		//Borro el registro con la misma ip
		if ($row['address'] == $ip){ 
		   $API->write('/ip/arp/remove', false);
	       $API->write('=.id='.$row['.id']);
	       $API->read();
		   break;
		   }
		  }
			if ($stdusr == 'Activo' or $stdusr == 'Cortado'){
	   		$API->comm("/ip/arp/add", array(
			"address" => $ip, 
			"interface" => $int,
			"mac-address" => $mac,
			"comment" => urldecode($comentario),
      		));
			} 
	  }
    }	
print '<script>window.close();</script>';
}else{ echo "Mac Invalida";}
}
	
	
	function reconstruir(){
	ini_set('max_execution_time', 30000000);
	
	//Consultar Api
	$r = json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/estado_usuarios/'),true);
	$resp=json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/dispositivos/'),true);
	foreach($resp as $rows){
	extract($rows);
	$API = new RouterosAPI();
	$data = new StdClass();
    if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){
		$API->write('/ip/arp/print');
		$READ = $API->read(false);
		$ARRAY = $API->parseResponse($READ);
		foreach($ARRAY as $row){			 
		//$x=(array_search($row['address'],array_map(function($r){return $r["stdusr"];},$r)));
		//$x = array_search(trim($row['address']), array_column($r, 'ip'));

		// $API->write('/ip/arp/remove', false);
//	     $API->write('=.id='.$row['.id']);
//	     $API->read();
//		
//		 if($r[$x]['stdusr'] == 'Activo' or $r[$x]['stdusr'] == 'Cortado'){
//		 $API->comm("/ip/arp/add", array(
//         "address" => $row['address'], 
//		 "interface" => $row['interface'],
//		 "mac-address" => $row['mac-address'],
//		 "comment" => utf8_decode(urldecode($r[$x]['nomtrc'])),
//      	 ));
	
	if($row['comment']!='NO TIENE'){	 
	echo "UPDATE cnttrc SET interf='".$row['interface']."', mac='".$row['mac-address']."' WHERE ip='".$row['address']."';".'</br>';
    }
		 //$r[$x]['nomtrc']='NO TIENE';
//$payload = array('mac' => $row['address'],'ip'=>$row['address'],'interf'=>$row['interface'],);
//		   $process = curl_init('https://vired.asapaseco.com/Mk_c/user_put/'); //your API url
//			//curl_setopt($process, CURLOPT_HTTPHEADER);
//			curl_setopt($process, CURLOPT_HEADER, 1);
//			curl_setopt($process, CURLOPT_TIMEOUT, 30);
//			curl_setopt($process, CURLOPT_POST, 1);
//			curl_setopt($process, CURLOPT_POSTFIELDS, $payload);
//			curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
//			$return = curl_exec($process);
//			curl_close($process);
//		
//			//finally print your API response
//			print_r($return);
//			exit();
		 
		//}

	  }   
		$API->disconnect();
		$data->estado = 1;
		$data->host = $iphost;
	} else {
		$data->estado = 0;
		$data->host = $iphost;
	}
  }

}
	
	function diarioo($ip,$mac,$comentario,$int){
	ini_set('max_execution_time', 30000000);
	
	//Consultar Api
	$r = json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/estado_usuarios/'),true);
	$resp=json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/dispositivos/'),true);
	foreach($resp as $rows){
	extract($rows);
	$API = new RouterosAPI();
	$data = new StdClass();
    if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){
		$API->write('/ip/arp/print');
		$READ = $API->read(false);
		$ARRAY = $API->parseResponse($READ);
		foreach($ARRAY as $row){			 
		//$x=(array_search($row['address'],array_map(function($r){return $r["stdusr"];},$r)));
		$x = array_search($row['address'], array_column($r, 'ip'));
		$stdusr = $r[$x]['stdusr'];
		if ($row['address'] != $ip){ 
		   $API->write('/ip/arp/remove', false);
	       $API->write('=.id='.$row['.id']);
	       $API->read();
		
		 $API->comm("/ip/arp/add", array(
         "address" => $row['address'], 
		"interface" => $row['interface'],
		"mac-address" => $row['mac-address'],
		"comment" => urldecode($r[$x]['nomtrc']),
      	));
	  
		}
	  }   
		$API->disconnect();
		$data->estado = 1;
		$data->host = $iphost;
	} else {
		$data->estado = 0;
		$data->host = $iphost;
	}
}

	//->
	$comentario=urldecode($comentario);
	//header('Access-Control-Allow-Origin: http://act.lacastellana.co');	
	$resp=json_decode(file_get_contents('https://vired.asapaseco.com/Mk_c/dispositivos/'),true);
	foreach($resp as $row){
	extract($row);
	$API = new RouterosAPI();
	$API->debug = false;
    if($API->connect( $iphost, $userhost, $passwdhost,$puerto)){
	  $API->comm("/ip/arp/add", array(
         "address" => $ip, 
		"interface" => $int,
		"mac-address" => $mac,
		"comment" => $comentario,
      ));

	}else{	
	echo "Error de Conexión";
	echo date ('Y-m-d H:i'); }
	
	}
	echo "Proceso realizado";
	echo date ('Y-m-d H:i');
	
	$API->disconnect();
	}
	
}