<?php
require_once('conection.php');

// datos entrantes
$id_registro = $_POST['id_registro'];

/* Ejecuta una sentencia preparada pasando un array de valores */
$query = "DELETE FROM actividades WHERE actividades.idact = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id_registro]);

header("Location: ../gantt.php");
