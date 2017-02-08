<?php
function dbConnect (){
 	$conn =	null;
 	$host = 'localhost';
 	$db = 	'mariscal';
 	$user = 'root';
 	$pwd = 	'123';
	try {
	   	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
		//echo 'Connected succesfully.<br>';
	}
	catch (PDOException $e) {
		echo '<p>Cannot connect to database !!</p>';
	    exit;
	}
	return $conn;
 }
 
 ?>