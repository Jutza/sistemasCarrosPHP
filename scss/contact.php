<!DOCTYPE html>

<html>
<head>
<?php


		try{
			$conn = new PDO('mysql:host=mediexpress.db.8921605.hostedresource.com;dbname=mediexpress','mediexpress','MedieX70!');
				echo "Conecion realizada con exito!!";
		}
		catch (PDOException $ex){
			echo $ex->getMessage();
			exit;
		}
?>

	<meta charset="UTF-8">
	<title>Contacto - Mediexpress</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<a href="index.html"><img src="images/logo2.png" alt="LOGO" height="112" width="118"></a>
				</div>
				<div id="navi">
					<ul>
						<li type="none" class="navi"   >
							<a href="admin/login.php">Log in </a>
						</li>
						</ul>
				</div>

				<div id="navigation">
					<ul>
						<li>
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="about.html">Quienes Somos</a>
						</li>
						<li>
							<a href="rooms.html">Historia</a>
						</li>
						<li>
							<a href="dives.html">Servicios</a>
						</li>
						<li>
							<a href="foods.html">Productos</a>
						</li>
						<li>
							<a href="news.html">Galeria</a>
						</li>
						<li class="selected">
							<a href="contact.php">Contacto</a>
						</li>						
					</ul>
				</div>
			</div>
			<div id="contents">
				<div class="box">
					<div>
						<div id="contact" class="body">
							<h1>Contacto</h1>
							<form action="reg.php" method="POST">
							<form action="index.html" method="POST">
								<table>
									<tbody>
										<tr>
											<td>Nombre:</td>
											<td><input type="text" name="nombre" value="" class="txtfield"></td>
										</tr> <tr>
											<td>Email:</td>
											<td><input type="text" name="email" value="" class="txtfield"></td>
										</tr> <tr>
											<td>Asunto:</td>
											<td><input type="text" name="asunto" value="" class="txtfield"></td>
										</tr> <tr>

										<td>Mensaje:</td>
											<td><input type="text" name="mensaje" value="" class="txtfield"></td>
										</tr> <tr>	
											<td></td>
											<td><input type="submit" value="" class="btn"></td>
										</tr>
									</tbody>
								</table>
							</form>

							<?
    //Comprovamos si se han recivido datos del formulario
    //Como vemos se lo utilizando el campo nombre
    if(isset($_POST['nombre'])){
      //Insertamos los datos en SQL en mi caso la tabla se  
      //llama personas y consta de dos celdas 
      //la de nombres y la de nick
      $insertar = "INSERT INTO contacto (null,nombre,email,asunto,mensaje) 
          VALUES ('".$_POST['nombre']."', '".$_POST['email']."','".$_POST['asunto']."','".$_POST['mensaje']."')";
      mysql_query($insertar,$conn); 
     }
?>
							<h2>Mediexpress</h2>
							<p>
								<span>Dirección:</span> 76 Colosio, Hermosillo,Sonora
							</p>
							<p>
								<span>Numero Telefonico:</span> 1-800-555-6666
							</p>
							<p>
								<span>Fax:</span> 1-800-123-4567
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div>
				<ul class="navigation">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="about.html">Quienes Somos</a>
					</li>
					<li>
						<a href="rooms.html">Historia</a>
					</li>
					<li>
						<a href="dives.html">Servicios</a>
					</li>
					<li>
						<a href="foods.html">Productos</a>
					</li>
					<li>
						<a href="news.html">Galeria</a>
					</li>
					<li class="active">
						<a href="contact.html">Contacto</a>
					</li>
					<li>
					<a href="acercade.html">Acerca de </a>
					</li>
				</ul>
				<div id="connect">
					<a href="http://pinterest.com/fwtemplates/" target="_blank" class="pinterest"></a> <a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a> <a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a> <a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
				</div>
			</div>
			<p>
				© 2023 by Mediexpress. All Rights Reserved
			</p>
		</div>
	</div>
</body>
</html>