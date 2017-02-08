<?php
include_once 'db/confighost.php';
 
$config = new Config();
$db = $config->get_Connection();
  
if($_POST){
  
 include_once 'db/login.inc.php';
 $login = new Login($db);
 
 $login->userid = $_POST['usuario']; 
 $login->passid = $_POST['contrasena'];
  
 if($login->login()){
	 
  echo "<script>location.href='paginas/acceso.php'</script>";
 }
  
 else{
  echo "<script>alert('Usuario y/o Password no coinciden')</script>";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>Login PHP</title>
 
    <!-- Bootstrap <span id="IL_AD7" class="IL_AD">core</span> CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="css2/main.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
 
  <body>
 <h1 class="" align="center">Mediexpress</h1>
 <h2 class="" align="center">Sistema de ventas equipo medico</h2>
    <div class="container">
 
      <form class="form-signin" method="post">        
        <h2 class="form-signin-heading">Login PHP</h2>
        <label for="username">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Username" required autofocus value="">
         
  
        <label for="password">Password</label>
        <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Password" required value="">
                 
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
 
    </div> <!-- /container -->
 
  </body>
</html>
