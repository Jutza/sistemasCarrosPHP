<<!DOCTYPE html>
<html>
<head>
	<title>Promociones</title>
</head>
<body>

<?php
	require_once 'Connection.simple.php';
 
	$conn = dbConnect();
	// Create the query
	$sql = 'select p.prod,p.producto,t.id_prom,t.fechai,t.fechaf,t.descripcion,t.descuento,p.precio
from
productos as p
inner join promociones as t
on
p.prod = t.fkproducto
where
 t.fechai<= curdate() and t.fechaf>=curdate();';
	// Create the query and asign the result to a variable call $result
	$result = $conn->query($sql);
	// Extract the values from $result
	$rows = $result->fetchAll();
	// Since the values are an associative array we use foreach to extract the values from $rows
	foreach ($rows as $row) {
		echo 'ID: '.$row['id_prom'].'<br/>';
		echo 'Producto: '.$row['producto'].'<br/>';
		echo 'Fecha inicial: '.$row['fechai'].'<br/>';
		echo 'Fecha Termino: '.$row['fechaf'].'<br/>';
		echo 'Descuento %: '.$row['descuento'].'<br/>';
		echo 'Descripcion: '.$row['descripcion'].'<br/>';
		echo 'Precio: '.$row['precio'].'<br/>';
		echo "<hr/>";
	}
 ?>

</body>
</html>

