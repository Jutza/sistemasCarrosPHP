<?php

/**
*
*/
class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "marcas";

	// Propiedades del objeto
  public $idmarca;
	public $marca;


    public function __construct($db)
	//function __construct($db)
	{
		$this->conn = $db;
	}

    // Creacion de los metodos o productos

    function create()
    {
       // Escribir el Query (La Consulta)

    $query = "insert into ". $this->table_name." values (null,?)";

     $stmt = $this->conn->prepare($query);


     $stmt->bindParam(1, $this->marca);


       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
   }

     // Leer Registros
    function readAll($page,$from_record_num,$records_per_page)
    {

   $query ="select idmarca,marca from marcas
	 order by idmarca asc limit
	 {$from_record_num},{$records_per_page}";

	    $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select idmarca from ". $this->table_name . "";

	   $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

	   return $num;


    }


    // Usarlo Cuando Queramos Actualizar la Tabla con sus registros
    function readOne()
    {
	$query="
   select distinct idmarca,marca from marcas
where idmarca = ?";

       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->idmarca);


       $stmt->execute();

       // Crea el vinculo con la BD y Muestra los registros existentes
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // en las llaves "[ ]" van los nombres de atributos de BD.
       $this->idmarca= $row['idmarca'];
	   	$this->marca = $row['marca'];

    }


      // Funcion para Actualizar o Modificar los registros en BD.
      function update()
      {

	$query="update
					" . $this->table_name . "
				set
					marca = :m
          	where
					 idmarca= :id";




          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(':id', $this->idmarca);
    	   $stmt->bindParam(':m', $this->marca);


       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;

       } else {
        //var_dump($stmt->errorInfo());
        return false;
       }

      }


 // Funcion para Eliminar los registros en BD.
      function delete()
      {
           $query="delete from " . $this->table_name . " where idmarca = ?";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(1, $this->idmarca);

       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
      }
}

?>
