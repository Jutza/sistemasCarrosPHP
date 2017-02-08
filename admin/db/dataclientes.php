<?php

/**
*
*/
class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "clientes";

	// Propiedades del objeto
  public $idclientes;
	public $nombre;
	public $telefono;
	public $email;


    public function __construct($db)
	//function __construct($db)
	{
		$this->conn = $db;
	}

    // Creacion de los metodos o productos

    function create()
    {
       // Escribir el Query (La Consulta)

    $query = "insert into ". $this->table_name." values (null,?,?,?)";

     $stmt = $this->conn->prepare($query);


     $stmt->bindParam(1, $this->nombre);
     $stmt->bindParam(2, $this->telefono);
     $stmt->bindParam(3, $this->email);


       if ($stmt->execute())
       {
       	return true;
       }
       else {

        return false;
       }
   }

     // Leer Registros
    function readAll($page,$from_record_num,$records_per_page)
    {
        $query ="select idclientes,nombre,telefono,email from clientes
				order by idclientes asc limit
				{$from_record_num},{$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select idclientes from ". $this->table_name . "";

     $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

     return $num;

    }


    // Usarlo Cuando Queramos Actualizar la Tabla con sus registros
    function readOne()
    {
       $query="select distinct idclientes,nombre,telefono,email
			 from clientes where idclientes = ?;";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->idclientes);
       $stmt->execute();

       // Crea el vinculo con la BD y Muestra los registros existentes
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // en las llaves "[ ]" van los nombres de atributos de BD.
        $this->idclientes = $row['idclientes'];
        $this->nombre = $row['nombre'];
        $this->telefono = $row['telefono'];
        $this->email = $row['email'];


    }


      // Funcion para Actualizar o Modificar los registros en BD.
      function update()
      {

	$query="update
					" . $this->table_name . "
				set
					nombre = :n,
					telefono = :t,
          email = :e
          	where
					 idclientes= :id";

          $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $this->idclientes);
	   $stmt->bindParam(':n', $this->nombre);
     $stmt->bindParam(':t', $this->telefono);
     $stmt->bindParam(':e', $this->email);


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
           $query="delete from " . $this->table_name . " where idclientes = ?";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(1, $this->idclientes);

       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
      }
}

?>
