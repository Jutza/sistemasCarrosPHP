<?php

include_once '../../db/confighost.php';
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/dataregistros.php';
$product = new Data($db);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Add modelos</title>

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
        $('#fecha_ren').datepicker({ format: 'yyyy-mm-dd' , todayHighlight: true, orientation: "bottom right" , autoclose: true});

        });
      //jQuery( "#date" ).datepicker({ dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});

    </script>

    <script>
        $( document ).ready(function() {
        $('#fecha_gamv').datepicker({ format: 'yyyy-mm-dd' , todayHighlight: true, orientation: "bottom right" , autoclose: true});

        });

    //jQuery( "#date" ).datepicker({ dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});

    </script>


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
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
if(isset($_POST['btnsave']))
{
  // $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
  // escribir lo que esta escrito en la propiedad name del input


     $product->date = $_POST['date'];
     $product->fkcliente = $_POST['fkcliente'];
     $product->fkmodelo = $_POST['fkmodelo'];

/*
    if(empty($_POST['modelo']))
    {
      $errMSG = "Favor de ingresar el modelo";
    }
    else if(empty($_POST['precio']))
    {
      $errMSG = "Favor de ingresar el precio";
    }
    else(empty($_POST['marca']))
    {
      $errMSG = "Favor de ingresar el precio";
    }
*/



       if($product->create())
      {
       ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>Success!</strong><a href="registros.php">Mostrar Registros</a></div>

<!-- // quitar esto ">" en el span debe ser asi <span
aria-hidden="true"> -->
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

  <div class="form-group">
       <div class="hero-unit">
          <label for="d">Fecha</label>
  <input type="date" min="2017-02-02" id="date" name="date" class="form-control" placeholder="Agrega Fecha">
         </div>
      </div>

     <div class="form-group">
      <div class="hero-unit">
         <label for="mo">Modelo</label>
       <select class="form-control" id="fkmodelo" name="fkmodelo" selected="selected" required>
  <option selected value="">Selecciona el modelo</option>
        <?php

        $stmt = $db->prepare('select idmodelos, modelo from modelos order by modelo');
        $stmt->execute();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idmodelos; ?>"><?php echo $modelo; ?></option>
            <?php
        }
        ?>
        </select>
        </div>
     </div>

     <div class="form-group">
      <div class="hero-unit">
         <label for="c">Cliente</label>
       <select class="form-control" id="fkcliente" name="fkcliente" selected="selected" required>
  <option selected value="">Selecciona el cliente</option>
        <?php

        $stmt = $db->prepare('select idclientes, nombre from clientes order by nombre');
        $stmt->execute();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idclientes; ?>"><?php echo $nombre; ?></option>
            <?php
        }
        ?>
        </select>
        </div>
     </div>


     <button type="submit" name="btnsave" class="btn btn-success">Guardar</button>
</form>
</div>


  </body>
</html>
