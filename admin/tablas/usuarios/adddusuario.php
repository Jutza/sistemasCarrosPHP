<?php

include_once '../../db/confighost.php';
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/datausuarios.php';
$product = new Data($db);

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Add usuario</title>

     <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
       <link rel="stylesheet" href="../../css/bootstrap.css">
      
    <!-- dtp abre --> 
       <link rel="stylesheet" href="../../css/bootstrap.min.css" />
       <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css" />
       <script src="../../js/jquery.min.js"></script>
      
    <!-- dtp cierre -->  
  


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
    
    if(empty($imgFile))
    {
      $errMSG = "Please Select Image File.";
    }
    else
    {
      $upload_dir = 'fotos/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
       $product->foto = $userpic; 
      if(in_array($imgExt, $valid_extensions))
      {     
        // Check file size '5MB' 
        if($imgSize < 5000000)
          {
          move_uploaded_file($tmp_dir,"$upload_dir/$userpic");
          
        }
        else
        {
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else
      {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
        
    }
  
  
                 
       if($product->create()) {
       ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>Success!</strong><a href="usuarios.php">Mostrar Registros</a></div>

<!-- // quitar esto ">" en el span debe ser asi <span
aria-hidden="true"> -->
<?php
}else{
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
 <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Agrega usuario"> 
        </div>
     </div>
       <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Contrasena</label>
 <input type="text" id="contrasena" name="contrasena" class="form-control" placeholder="Agrega Contrasena"> 
        </div>
     </div>
       <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Alias</label>
 <input type="text" id="alias" name="alias" class="form-control" placeholder="Agrega alias"> 
        </div>
     </div>
       <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Ocupacion</label>
 <input type="text" id="ocupacion" name="ocupacion" class="form-control" placeholder="Agrega ocupacion"> 
        </div>
     </div>
         <div class="form-group">
      <div class="hero-unit">
      <td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
     </div>
     </div>
        
      
     <button type="submit" class="btn btn-success">Guardar</button>
</form>
</div>
      
    
</form>
</div>


	
            
	</body>
</html>