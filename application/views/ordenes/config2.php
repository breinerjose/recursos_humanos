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
	mysqli_select_db(SQL_DB, $conn);	


	$query = "select nriper, pssusr from actusr where nriper='".$_SESSION["usuario"]."' and pssusr='".$_SESSION["pass"]."'";
    $result = mysqli_query($query) or die ("Error reading data1. Config");
	   if(!$fila1 = mysql_fetch_array($result)) {	
   echo  "<script language=\"JavaScript\">   alert(\"ACCESO DENEGADO. \") </script>";
     "<script language=\"JavaScript\"> window.location.href = \"index.php\" </script>";
   exit(); 
   }
	extract($fila1); 
function Vpesos($Valorp){
		$tama=strlen($Valorp);
	$aux='';
	$pun=0;
	while ( 0 < $tama){
		$tama=$tama-1;
		$sub=substr($Valorp,$tama,1);
		$aux=$sub.$aux;
		$pun=$pun+1;
		$fer=strlen($aux);
			if (($pun==3) and $tama!=0){
			$aux= ".".$aux;
			$pun=0;}}
$aux= "$".$aux;
return $aux;
}

$qconfig = "SELECT * FROM config";
$rconfig = mysqli_query($qconfig) or die ("Error consulta por nombres.");

$rowc= mysqli_fetch_array($rconfig);
extract($rowc);

//$conordsum = odbc_connect("DRIVER={MySQL ODBC 3.51 Driver};Server=asapaseco.dvrdns.org;Database=ordsum", 'asapaseco', 'AsecoAsap301084+')  or die(odbc_errormsg());
//$conectID = mssql_connect("localhost","SA","asapaseco"); 

try{
    $conn = new PDO('mysql:host=localhost;dbname=myserver_asapaseco', 'myserver_asapase', 'AsecoAsap301084+');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

    echo "ERROR: CONEXION PDO" . $e->getMessage();
}


?>	