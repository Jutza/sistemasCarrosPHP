<?php

/**
*
*/
class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "registros";

	// Propiedades del objeto
  public $idregitros;
	public $date;
	public $fkmodelo;
	public $fkcliente;


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


     $stmt->bindParam(1, $this->date);
     $stmt->bindParam(2, $this->fkmodelo);
     $stmt->bindParam(3, $this->fkcliente);

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
        $query ="select distinct idregistros,date,fkmodelo,fkcliente,idclientes,idmodelos,modelo,nombre
from
registros as r
inner join
modelos as m
on r.fkmodelo = m.idmodelos
inner join
clientes as c
where r.fkcliente = c.idclientes order by idregistros asc limit {$from_record_num},{$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select idregistros from ". $this->table_name . "";

     $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

     return $num;


      $query = "SELECT idregistros from " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();

        return $num;

    }


    // Usarlo Cuando Queramos Actualizar la Tabla con sus registros
    function readOne()
    {
       $query="select distinct idregistros,date,fkmodelo,fkcliente,idmodelos,idclientes,nombre,modelo
from
registros as r
inner join
modelos as m
on r.fkmodelo = m.idmodelos
inner join
clientes as c
where idregistros = ?;";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->idregistros);
       $stmt->execute();

       // Crea el vinculo con la BD y Muestra los registros existentes
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // en las llaves "[ ]" van los nombres de atributos de BD.
        $this->id_ren = $row['idregistros'];
        $this->id_clif = $row['date'];
        $this->id_salf = $row['fkmodelo'];
        $this->fecha_ren = $row['fkcliente'];


    }


      // Funcion para Actualizar o Modificar los registros en BD.
      function update()
      {

	$query="update
					" . $this->table_name . "
				set
					date = :d,
					fkmodelo = :fkm,
          fkcliente = :fkc
          	where
					 idregistros= :id";




          $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $this->idregistros);
	   $stmt->bindParam(':d', $this->date);
     $stmt->bindParam(':fkm', $this->fkmodelo);
     $stmt->bindParam(':fkc', $this->fkcliente);


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
           $query="delete from " . $this->table_name . " where idregistros = ?";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(1, $this->idregistros);

       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
      }
}

?>
