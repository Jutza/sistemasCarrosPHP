<?php

include_once '../../db/confighost.php';

 // $id = isset($_GET['id']) ? $_GET['id'] : die('Necesito el ID');
  $id = 1;
//isset() - Determina si una variable está definida y no es NULL
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/datagrabaciones.php';
$product = new Data($db);

$product->Det = $id;
$product->readOne();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Update Detalles</title>
       <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
       <link rel="stylesheet" href="../../css/bootstrap.css">
      
    <!-- dtp abre --> 
       <link rel="stylesheet" href="../../css/bootstrap.min.css" />
       <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css" />
       <script src="../../js/jquery.min.js"></script>
       <script src="../../js/bootstrap-datepicker.min.js"></script>
    <!-- dtp cierre -->  
    <script>
        $( document ).ready(function() {
            $('#Fecha').datepicker({ format: 'yyyy-mm-dd' , todayHighlight: true, orientation: "bottom right" , autoclose: true});
			
        });			
    </script>    
		<link href="../../css/styles.css" rel="stylesheet">        
    </head>
	<body>
<p><br></br></p>
<div class="container">
<p>
 <a class="btn btn-primary" href="../../login.php" role="button">Regresar</a>
</p><br></br>

<?php

	// $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
	// escribir lo que esta escrito en la propiedad name del input
     //  $product->Foliof = $_POST['foliof'];
      // $product->Prodf = $_POST['prodf'];  
      // $product->Cantidad = $_POST['cantidad'];
	   
	     $product->Foliof = 2;
       $product->Prodf = $_POST['prodf'];  
       $product->Cantidad = 20;
	   
?>
<form method="post">


<!-- Aqui inicia el combobox -->

   <div class="form-group">
     	<div class="hero-unit">
         <label for="fa">Foliof</label>
       <select class="form-control" id="foliof" name="foliof" selected="selected">
  <option selected value="<?php echo $product->Foliof; ?>"><?php echo $product->Foliof; ?></option>
        <?php
		        
        $stmt = $db->prepare('select Folio from facturas order by Folio');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $Folio; ?>"><?php echo $Folio; ?></option>
            <?php
        }
        ?>
        </select>
        </div>
     </div>
     
  <?php
        $stmt2 = $db->prepare('select d.det,d.foliof,p.prod,p.producto,d.cantidad
from
facturas as f
inner join
detalles as d
on
f.Folio=d.foliof
inner join
productos as p
on
p.prod=d.prodf where d.det= ' . $product->Det . ' order by d.det asc' );

        $stmt2->execute();
		while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
        {
            extract($row2);
	    }
  ?>   
  
  <!-- Aqui Termina el combobox -->    
  
  
  
   
  
  <!-- Aqui inicia el segundo combobox -->  
  <div class="form-group">
        <label for="ao">Producto</label>      
       
 <select class="form-control" id="prodf" name="prodf" selected="selected">
  <option selected value="<?php echo $prod; ?>"><?php echo $producto; ?></option>
        <?php
		        
 $stmt = $db->prepare('select prod,producto from productos');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $prod; ?>"><?php echo $producto; ?></option>
            <?php
        }
        ?>
        </select>
      
      </div> 
 
    <!-- Aqui Termina el Segundo combobox -->    
    
    
       
 <div class="form-group">
     	<div class="hero-unit">
         <label for="fa">Cantidad</label>
 <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Agrega la Cantidad" value="<?php echo $product->Cantidad; ?>"> 
        </div>
     </div>
    
</form>
</div>
	</body>
</html>