<?php

include_once '../../db/confighost.php';


  $id = isset($_GET['id']) ? $_GET['id'] : die('Necesito el ID');

//isset() - Determina si una variable está definida y no es NULL
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/dataregistros.php';
$product = new Data($db);

$product->idregistros = $id;
$product->readOne();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Update registros</title>
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



    
</script>


    <link href="../../css/styles.css" rel="stylesheet">

        <style type="text/css">
select{

  width:250px;
  padding:5px;
  border-radius:3px;
}
</style>
  </head>
  <body>
<p><br></br></p>
<div class="container">
<p>
 <a class="btn btn-primary" href="registros.php" role="button">Regresar</a>
</p><br></br>

<?php

if (isset($_POST['btn_save_updates'])){
  // $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
  // escribir lo que esta escrito en la propiedad name del input
       $product->idregistros = $_POST['idregistros'];
       $product->date = $_POST['date'];
       $product->fkmodelo = $_POST['fkmodelo'];
       $product->fkcliente = $_POST['fkcliente'];


     if($product->update()) {
      ?>
         <script>window.location.href='registros.php'</script>
     <?php
       }
       else
       {
     ?>
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>No se pueden duplicar campos</strong></div>


<form method="post" enctype="multipart/form-data">

    <?php
            $stmt2=$db->prepare("select idregistros,date,fkmodelo,fkcliente,idmodelos,modelo,nombre,idclientes from registros as r
inner join
modelos as m
on
r.fkmodelo = m.idmodelos
inner join
clientes as c
on
r.fkcliente = c.idclientes
where r.idregistros = " .$product->idregistros. " order by idregistros asc");

            $stmt2->execute();
            while ($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
              extract($row2);
            }
      ?>


      <div class="form-group">
      <div class="hero-unit">
         <label for="date">Fecha</label>
         <input type="date" class="form-control" id="date" name="date" class="form-control" placeholder="Agregar una Fecha" value='<?php echo $product->date; ?>' required onkeypress="return numeros(event)" onpaste="return false">
        </div>
        </div>

        <div class="form-group">

                   <label for="mo">Modelo</label><br>
                   <select type="text" class="form-control" name="fkmarca" id="fkmarca"  >
               <option  value="<?php echo $idmodelos; ?>"><?php echo $modelo;?> </option>

                     <?php
                        $stmt = $db->prepare('select idmodelo, modelo from modelos order by modelo');
               $stmt->execute();

               while($row=$stmt->fetch(PDO::FETCH_ASSOC))
               {
                   extract($row);
                   ?>
                   <option value="<?php echo $idmodelos; ?>"> <?php echo $modelo; ?></option>
                   <?php
               }
               ?>
          <div class="form-group">

                     <label for="c">Cliente</label><br>
                     <select type="text" class="form-control" name="fkcliente" id="fkcliente"  >
                 <option  value="<?php echo $idclientes; ?>"><?php echo $cliente;?> </option>

                       <?php
                          $stmt = $db->prepare('select idclientes, nombre from clientes order by nombre');
                 $stmt->execute();

                 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                 {
                     extract($row);
                     ?>
                     <option value="<?php echo $idclientes; ?>"> <?php echo $nombre; ?></option>
                     <?php
                 }
                 ?>
     <button type="submit"name="btn_save_updates" class="btn btn-success">Modificar</button>
</form>
</div>
  </body>
</html>
