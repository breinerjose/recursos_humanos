<?php
   	error_reporting(E_ALL & ~E_NOTICE);
	session_start(); 
	define('SQL_HOST', '192.168.150.90');
	define('SQL_DB', 'myserver_asapaseco');
	define('SQL_USER', 'myserver_asapase');
    define('SQL_PASSW', 'AsecoAsap301084+');
	
$conn = mysqli_connect(SQL_HOST, SQL_USER, SQL_PASSW) or die('Could not connect to MySQL database.');		
	if(!$conn){
		   echo 'Error: No me pude conectar a la base de Datos.';
		   exit;
	}		 
	mysqli_select_db($conn,SQL_DB);	
	

?>	