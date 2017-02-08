<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;
include_once '../../db/confighost.php';
include_once '../../db/dataclimasc.php';
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

<?php

if ($num>0){

?>
<table class="table table-bordered table-hover table-striped">
<caption>Cliente que mas ha comprado</caption>
<thead>
<tr>
     <th>ID</th>
     <th>Cliente</th>
     <th>Apelido paterno</th>
     <th>Apellido materno</th>
		 <th>Limite de credito</th>

</tr>
</thead>
<tbody>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
?>
<tr>
      <?php echo "<td>{$cli}</td>" ?>
      <?php echo "<td>{$nomb_cli}  </td>" ?>
      <?php echo "<td>{$ap_cli}</td>" ?>
      <?php echo "<td>{$am_cli}</td>" ?>
		 <?php echo "<td>{$limcredito}</td>" ?>

</tr>


<?php
}
?>
</tbody>
</table>
<?php
$page_dom= "climasc.php";
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
