<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/Connection.php';

class Empleado extends Connection
{
    private $ID;
    private $Nombre;
    private $Apellido;
    private $Cargo;

    public function __construct($ID = null, $Nombre = null, $Apellido = null, $Cargo = null)
    {
        $this->ID = $ID;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Cargo = $Cargo;
        parent::__construct();
    }

    public function getAll()
    {
        try {
            // FETCH_OBJ
            $sql = $this->dbConnection->prepare("SELECT * FROM empleados");

            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function insert_empleados()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO empleados (ID, Nombre, Apellido, Cargo)values(?,?,?,?)");
            $sql->bindParam(1, $this->ID);
            $sql->bindParam(2, $this->Nombre);
            $sql->bindParam(3, $this->Apellido);
            $sql->bindParam(4, $this->Cargo);
            // Ejecutamos
            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong></strong>
    </div>';
            die();

        }

    }

    public function editar_empleado($ID)
{
    try
    {
        $dbempleado = $this->dbConnection->prepare("UPDATE empleados SET Nombre=:Nombre, Apellido=:Apellido, Cargo=:Cargo WHERE ID=:ID");
        $dbempleado->bindParam(":ID", $ID);
        $dbempleado->bindParam(":Nombre", $this->Nombre);
        $dbempleado->bindParam(":Apellido", $this->Apellido);
        $dbempleado->bindParam(":Cargo", $this->Cargo);

        $dbempleado->execute();
        return $dbempleado;
    } catch (PDOException $ex) {
        echo '<div class="alert alert-danger container text-center" role="alert">
            <strong>ERROR </strong>
        </div>';

        die();
    }
}


    public function eliminar_empleado()
    {
        try
        {
            $dbempleado = $this->dbConnection->prepare("DELETE FROM empleados where ID=:ID");
            $dbempleado->bindParam(":ID", $this->ID);
            $dbempleado->execute();
            return $dbempleado;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR </strong>
    </div>';

            die();
        }

    }

    public function getItem()
    {
        try {

            $sql = $this->dbConnection->prepare("SELECT * FROM empleados WHERE ID =?");
            $sql->bindParam(1, $this->ID);
            $sql->execute();
            $resultSet = null;
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR</strong>
    </div>';

            die();
        }
    }

    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */


    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }
    
    /**
     * Set the value of nombre
     *
     * @return  self
     */


    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
        return $this;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */


    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
        return $this;
    }

    public function getCargo()
    {
        return $this->Cargo;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */


    public function setCargo($Cargo)
    {
        $this->Cargo = $Cargo;
        return $this;
    }

}   
?>