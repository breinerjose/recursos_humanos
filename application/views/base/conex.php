<?php
	header('Content-Type: text/html; charset=UTF-8');
	error_reporting(E_ALL & ~E_NOTICE);
	setlocale(LC_ALL,"es_ES");
   	$con = mysqli_connect('server1','myserver_asapase','AsecoAsap301084+','myserver_asapaseco');	


	$query = "select nriper, pssusr from actusr where nriper='".$this->session->userdata('user')."' and pssusr='".$this->session->userdata('pass')."'";
	$result = mysql_query($query) or die ("Error reading data1. Config");
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
$rconfig = mysql_query($qconfig) or die ("Error consulta por nombres.");

$rowc= mysql_fetch_array($rconfig);
extract($rowc);

//$conordsum = odbc_connect("DRIVER={MySQL ODBC 3.51 Driver};Server=asapaseco.dvrdns.org;Database=ordsum", 'asapaseco', 'AsecoAsap301084+')  or die(odbc_errormsg());
//$conectID = mssql_connect("localhost","SA","asapaseco"); 

try{
    $conn = new PDO('mysql:host=server1;dbname=myserver_asapaseco', 'myserver_asapase', 'AsecoAsap301084+');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

    echo "ERROR: CONEXION PDO" . $e->getMessage();
}


?>	