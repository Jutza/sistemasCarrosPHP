<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;
include_once '../../db/confighost.php';
include_once '../../db/datausuarios.php';
$database = new Config();
$db = $database->get_Connection();
$product = new Data($db);
$stmt = $product->readAll($page, $from_record_num,$records_per_page);
$num = $stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>CRUD PHP</title>
    <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
 
       
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../../css/styles.css" rel="stylesheet">
	</head>
	<body>
<p><br></br></p>
<div class="container">
<p>
 <a class="btn btn-primary" href="adddusuario.php" role="button">Agregar usuario</a>
</p>
<?php

if ($num>0){ 

?>
<table class="table table-bordered table-hover table-striped">
<caption>Tabla de usuarios</caption>
<thead>
<tr>
     <th>ID</th>
     <th>Usuario</th>
     <th>Contrasena</th>
     <th>Alias</th>
     <th>Ocupacion</th>
     <th>Foto</th>
     

     
</tr> 
</thead>
<tbody>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
?>
<tr>
      <?php echo "<td>{$id_usu}</td>" ?>
      <?php echo "<td>{$usuario}  </td>" ?>
      <?php echo "<td>{$contrasena}</td>" ?>
      <?php echo "<td>{$alias}</td>" ?>
      <?php echo "<td>{$ocupacion}</td>" ?>
    <?php echo "<td><img src='fotos/{$foto}' class='img-rounded' width='70px' height='60px'/></td>" ?>
     
      
      
      <?php echo "<td width='100px'>	  
        <a class='btn btn-warning btn-sm' href='modificausuario.php?id={$id_usu}' role='button'>
         <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
         <a class='btn btn-danger btn-sm' href='eliminarusuario.php?id={$id_usu}' role='button'>
         <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
         </td>" ?>
</tr>  

    
<?php 
}
?>
</tbody>
</table>
<?php
$page_dom= "usuarios.php";
include_once '../../db/paginacion.php';
}
else
{
?>  
<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>Warning!</strong> La Tabla esta vacia</div>

<!-- // quitar esto ">" en el span debe ser asi <span
aria-hidden="true"> -->
<?php
}
?>
</div>
	<!-- script references -->
		<script src="../../js/jquery.min.js">
    </script>
		<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>