<?php
		  $this->db->select('nombre, salario, oficio, fecini, numid, tipocontrato, nomcia, nitcia');
		  $this->db->from('contrato, familias');
		  $this->db->where('trim(Codigo)',trim($codigo));
		  $this->db->where('contrato.familia = familias.familia');
		  $res = $this->db->get();
		  if($res->num_rows()>0){
		  $row = $res->row_array();
		  extract($row);

	if($tipocontrato == '0'){$tipocontrato="ATERMINO FIJO INFERIOR A UN AÑO";}
	elseif($tipocontrato == '1'){$tipocontrato="INDEFINIDO";}
	elseif($tipocontrato == '2'){$tipocontrato="POR OBRA O LABOR CONTRATADA";}
	elseif($tipocontrato == '3'){$tipocontrato="ATERMINO FIJO INFERIOR A UN AÑO";}
	elseif($tipocontrato == '4'){$tipocontrato="POR OBRA O LABOR CONTRATADA";}
	elseif($tipocontrato == '5'){$tipocontrato="ATERMINO FIJO INFERIOR A UN AÑO";}
	elseif($tipocontrato == '6'){$tipocontrato="POR OBRA O LABOR CONTRATADA";}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
	body { font-family:Verdana, Geneva, sans-serif; }
</style>
</head>
<body>
<p><strong>Cordial Saludo</strong></p><br/>
<p>De acuerdo a su solicitud confirmamos contratación de la siguiente persona:</p>
<p>NOMBRE: <?php echo $nombre; ?></p>
<p>CEDULA: <?php echo $numid; ?></p>
<p>CARGO:<?php echo $oficio; ?></p>
<p>FECHA DE INGRESO: <?php echo $fecini; ?></p>
<p>TIPO DE CONTRATO: <?php echo $tipocontrato; ?></p>
<p>EMPRESA: <?php echo $nomcia; ?></p>
<p>NIT: <?php echo $nitcia; ?></p><br/>
</body>
</html>
<?php } ?>

