<?php
	require_once 'Connection.simple.php';
 
	$conn = dbConnect();
	// Create the query
	$sql = 'select pr.id_prom,p.producto as nombre,fechai,fechaf,descuento,descripcion
from
promociones as pr
inner join
productos as p
where fkproducto = prod';
	// Create the query and asign the result to a variable call $result
	$result = $conn->query($sql);
	// Extract the values from $result
	$rows = $result->fetchAll();
	// Since the values are an associative array we use foreach to extract the values from $rows
	foreach ($rows as $row) {
		echo 'ID: '.$row['id_prom'].'<br/>';
		echo 'Producto: '.$row['nombre'].'<br/>';
		echo 'Fecha inicial: '.$row['fechai'].'<br/>';
		echo 'Fecha Termino: '.$row['fechaf'].'<br/>';
		echo 'Descuento %: '.$row['descuento'].'<br/>';
		echo 'Descripcion: '.$row['descripcion'].'<br/>';
		echo "<hr/>";
	}
 ?>