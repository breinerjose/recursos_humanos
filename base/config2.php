<?php
   	error_reporting(E_ALL & ~E_NOTICE);
	define('SQL_HOST', 'localhost');
	define('SQL_DB', 'myserver_asapaseco');
	define('SQL_USER', 'myserver_asapase');
    define('SQL_PASSW', 'AsecoAsap301084+');
	
$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSW) or die('Could not connect to MySQL database.');		
	if(!$conn){
		   echo 'Error: No me pude conectar a la base de Datos.';
		   exit;
	}		 
	mysql_select_db(SQL_DB, $conn);	


	$query = "select nriper, pssusr from actusr where nriper='".$this->session->userdata('user')."' and pssusr='".$this->session->userdata('pass')."'";
	$result = mysql_query($query) or die ("Error reading data1. Config");
	   if(!$fila1 = mysql_fetch_array($result)) {	
   echo  "<script language=\"JavaScript\">   alert(\"ACCESO DENEGADO. \") </script>";
     "<script language=\"JavaScript\"> window.location.href = \"index.php\" </script>";
   exit(); 
   }

?>	