<?php

include_once '../../db/confighost.php';


  $id = isset($_GET['id']) ? $_GET['id'] : die('Necesito el ID');

//isset() - Determina si una variable está definida y no es NULL
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/datamodelos.php';
$product = new Data($db);

$product->idmodelos = $id;
$product->readOne();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Update modelo</title>
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

           <script languaje="javascript">
$('#validate').click(function() {

    //Se verifica si la opcion del select esta vacia
    if ($('#options').val().trim() === '') {
        alert('Debes seleccionar una opcion');
    } else {
        alert('Campo correcto');
    }
});
</script>

        <script type="text/javascript">
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}
</script>

<!--Solo numeros-->
<script type="text/javascript">
function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
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
 <a class="btn btn-primary" href="modelos.php" role="button">Regresar</a>
</p><br></br>

<?php

if (isset($_POST['btn_save_updates'])){
  // $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
  // escribir lo que esta escrito en la propiedad name del input
       $product->modelo = $_POST['modelo'];
       $product->precio = $_POST['precio'];
       $product->marca = $_POST['fkmarca'];


     if($product->update()) {
      ?>
         <script>window.location.href='modelos.php'</script>
     <?php
       }
       else
       {
     ?>
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>No se pueden duplicar campos</strong></div>
<?php
  }

}
?>

     <form method="post" enctype="multipart/form-data">

         <?php
                 $stmt2=$db->prepare("select idmodelos,modelo,precio,fkmarca,idmarca,marca
     from modelos as mo
     inner join
     marcas as ma
     on
     mo.fkmarca = ma.idmarca
     where mo.idmodelos = " .$product->idmodelos. " order by idmodelos asc");

                 $stmt2->execute();
                 while ($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
                   extract($row2);
                 }
           ?>


      <div class="form-group">
       <div class="hero-unit">
       <label for="mo">Modelo</label>
       <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Inserte el modelo" value='<?php echo $product->modelo; ?>'>
      </div>
      </div>

          <div class="form-group">
           <div class="hero-unit">
           <label for="p">Precio</label>
           <input type="number" class="form-control" id="precio" name="precio" placeholder="Inserte el precio" value='<?php echo $product->precio; ?>'>
          </div>
          </div>

          <div class="form-group">
           <div class="hero-unit">
              <label for="ma">Marca</label>
            <select class="form-control" id="fkmarca" name="fkmarca" selected="selected" required>
       <option selected value="<?php echo $fkmarca; ?>"><?php echo $marca; ?></option>
             <?php

             $stmt = $db->prepare('select distinct idmarca, marca, idmodelos, fkmarca
             from
            modelos as mo
            inner join
            marcas as ma
            on
            mo.fkmarca=ma.idmarca group by ma.marca order by ma.marca');
             $stmt->execute();

             while($row=$stmt->fetch(PDO::FETCH_ASSOC))
             {
                 extract($row);
                 ?>
                 <option value="<?php echo $idmarca; ?>"><?php echo $marca; ?></option>
                 <?php
             }
             ?>
             </select>
             </div>
          </div>



     <button type="submit"name="btn_save_updates" class="btn btn-success">Modificar</button>


</form>
</div>

  </body>
</html>
