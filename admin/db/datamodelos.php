<?php

/**
*
*/
class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "modelos";

	// Propiedades del objeto
  public $idmodelos;
	public $modelo;
	public $precio;
	public $fkmarca;


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


     $stmt->bindParam(1, $this->modelo);
     $stmt->bindParam(2, $this->precio);
     $stmt->bindParam(3, $this->fkmarca);


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
			$query ="select distinct idmodelos,modelo,precio,marca,idmarca,fkmarca
from
modelos as mo
inner join
marcas as ma
where mo.fkmarca = ma.idmarca order by idmodelos asc limit {$from_record_num},{$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select idmodelos from ". $this->table_name . "";

     $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

     return $num;


      $query = "SELECT idmodelos from " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();

        return $num;

    }


    // Usarlo Cuando Queramos Actualizar la Tabla con sus registros
    function readOne()
    {
			$query="select distinct idmodelos,modelo,precio,fkmarca
from
modelos where idmodelos = ?";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->idmodelos);
       $stmt->execute();

       // Crea el vinculo con la BD y Muestra los registros existentes
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // en las llaves "[ ]" van los nombres de atributos de BD.
        $this->idmodelos = $row['idmodelos'];
        $this->modelo = $row['modelo'];
        $this->precio = $row['precio'];
        $this->pkmarca = $row['fkmarca'];


    }


      // Funcion para Actualizar o Modificar los registros en BD.
      function update()
      {

	$query="update
					" . $this->table_name . "
				set
					modelo = :mo,
					precio = :p,
          fkmarca = :ma
          	where
					 idmodelos= :id";




          $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $this->idmodelos);
	   $stmt->bindParam(':mo', $this->modelo);
     $stmt->bindParam(':p', $this->precio);
     $stmt->bindParam(':ma', $this->fkmarca);


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
           $query="delete from " . $this->table_name . " where idmodelos = ?";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(1, $this->idmodelos);

       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
      }
}

?>
