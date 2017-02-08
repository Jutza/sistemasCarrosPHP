<?php
	//conexion con la base de datos.
	$link = mysql_connect("mediexpress.db.8921605.hostedresource.com","mediexpress","MedieX70!") or die("<h2> No se encuentra la base de datos</h2>");
	$bd = mysql_select_db("mediexpress",$link) or die("<h2>Error de conexion</h2>");

	//obtenemos los valores del formulario
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
	$asunto=$_POST['asunto'];
	$mensaje=$_POST['mensaje'];


	//ingresamos la informacion a la base de datos
	mysql_query("INSERT INTO contacto VALUES (null,'$nombre','$email','$asunto','$mensaje'",$link) or die ("<h2>Error de envio")


?>