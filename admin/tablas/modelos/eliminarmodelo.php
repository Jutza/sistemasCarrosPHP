<?php
// Verificar Si el valor fue Posteado (Guardado en el Navegador)
// Incluir la base de datos y los Objetos pertinentes

include_once '../../db/confighost.php';
include_once '../../db/datamodelos.php';

// Crear la Conexion a la Base de Datos
$database = new config();
$db = $database->get_Connection();

// Preparar el Objeto Producto
$Product = new Data($db);

// Colocar en base al objeto producto el id para ser borrado
$Product->idmodelos = isset($_GET['id']) ? $_GET['id'] : die('Necesito el ID');

// Borrar el Objeto Producto
if ($Product->delete())
{
      echo "<script>location.href='modelos.php'</script>";
}
// if no borro el registro
else
{
     echo "<script>alert('Falla al Borrar el Registro')</script>";
}
?>
