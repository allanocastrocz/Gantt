<?php
require_once('conection.php');
class Consultas
{
    private $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    public function __destruct()
    {
        // close the database connection
        $this->pdo = null;
    }

    public function GetDatosGantt()
    {
        $sql = "SELECT *, usuarios.nombre, usuarios.apepat FROM actividades 
                JOIN usuarios 
                ON actividades.responsable = usuarios.idus";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetDatosUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetRegistro($idAct)
    {
        $query = "SELECT * FROM actividades WHERE idact = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$idAct]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
