<?php

include_once '../../db/confighost.php';


  $id = isset($_GET['id']) ? $_GET['id'] : die('Necesito el ID');

//isset() - Determina si una variable está definida y no es NULL
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/datausuarios.php';
$product = new Data($db);

$product->id_usu = $id;
$product->readOne();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Update usuarios</title>
       <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
       <link rel="stylesheet" href="../../css/bootstrap.css">
      
    <!-- dtp abre --> 
        <link rel="stylesheet" href="../../css/bootstrap.min.css" />
       <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css" />
       <script src="../../js/jquery.min.js"></script>
     
    <!-- dtp cierre -->            
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
 <a class="btn btn-primary" href="usuarios.php" role="button">Regresar</a>
</p><br></br>

<?php

if ($_POST){ 
  // $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
  // escribir lo que esta escrito en la propiedad name del input
       
      $product->usuario = $_POST['usuario'];
       $product->contrasena = $_POST['contrasena'];  
       $product->alias = $_POST['alias']; 
       $product->ocupacion = $_POST['ocupacion'];
       $product->foto = $_POST['user_image'];
     
     $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
    
    if($imgFile)
    {
      $upload_dir = 'fotos/'; // upload directory 
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
      $userpic = rand(1000,1000000).".".$imgExt;
      $product->imagen = $userpic;
      
      if(in_array($imgExt, $valid_extensions))
      {     
        if($imgSize < 5000000)
        {
          unlink($upload_dir.$edit_row['userPic']);
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          
        }
        else
        {
          $errMSG = "Sorry, your file is too large it should be less then 5MB";
        }
      }
      else
      {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      } 
    }
    else
    {
      // if no image selected the old image remain as it is.
      //$userpic = $edit_row['userPic']; // old image from database
      // $product->foto = $edit_row['userPic']; 
       
       $product->imagen;
              
    }    
           
     if($product->update()) {
      ?>
         <script>window.location.href='usuarios.php'</script>
     <?php
       }
       else
       {
     ?>
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>Fail!</strong></div>
     <?php
       }

    }   
     ?>

<form method="post">
     
        <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Usuario</label>
 <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Agrega usuario" value='<?php echo $product->usuario; ?>'>
     </div> 
        </div>
     

       <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Contrasena</label>
 <input type="text" id="contrasena" name="contrasena" class="form-control" placeholder="Agrega Contrasena" value='<?php echo $product->contrasena; ?>'>
     </div> 
        </div>
    

       <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Alias</label>
 <input type="text" id="alias" name="alias" class="form-control" placeholder="Agrega alias" value='<?php echo $product->alias; ?>'>
     </div> 
        </div>
    
       <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Ocupacion</label>
 <input type="text" id="ocupacion" name="ocupacion" class="form-control" placeholder="Agrega ocupacion" value='<?php echo $product->ocupacion; ?>'>
     </div> 
        </div>
    

      <div class="hero-unit">
      <td><label class="control-label" <?php echo $product->foto;  ?> </label></td>
      <td><img src="fotos/<?php echo $product->foto; ?>" class='img-rounded' width='120px' height='150px'/></td>
      <br></br> 
      <td><label class="control-label">Cargar Imagen</label></td>
      <td><input class="input-group" type="file" name="user_image" accept="fotos/*" value="" /></td>
     </div>
   
   
      
     <button type="submit" class="btn btn-success">Modificar</button>
</form>
</div>
  </body>
</html>