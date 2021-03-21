<?php
session_start();
include_once('conection.php');
// objeto de respuesta a cliente
$jsonRes = [
    'status' => false,
    'msg' => null
];
try {
    // verifica exista post
    if (isset($_POST['tarea'])) {

        // Constante. Nombre de la tabla de usuarios
        $NOMBRE_TABLA = 'actividades';

        // Datos POST de entrada
        $tarea = $_POST['tarea'];
        $responsable = $_POST['responsable'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $avance = $_POST['avance'];
        $mano_obra = $_POST['mano_obra'];
        $materia_prima = $_POST['materia_prima'];
        $depreciacion = $_POST['depreciacion'];
        $gastos = $_POST['gastos'];
        $entregables = $_POST['entregables'];
        $observaciones = $_POST['observaciones'];

        /* Inserta los valores de direccion en la tabla correspondiente*/
        $sql = "INSERT INTO $NOMBRE_TABLA (tarea, responsable, inicio, fin, avance, mano_obra, materia_prima, depreciacion, gastos_admi, entregables, observaciones)
          VALUES (:tarea, :responsable, :inicio, :fin, :avance, :mano_obra, :materia_prima, :depreciacion, :gastos_admi, :entregables, :observaciones)";
        $valores = [
            ':tarea' => $tarea,
            ':responsable' => $responsable,
            ':inicio' => $inicio,
            ':fin' => $fin,
            ':avance' => $avance,
            ':mano_obra' => $mano_obra,
            ':materia_prima' => $materia_prima,
            ':depreciacion' => $depreciacion,
            ':gastos_admi' => $gastos,
            ':entregables' => $entregables,
            ':observaciones' => $observaciones
        ];
        $declaracion = $pdo->prepare($sql);
        if ($declaracion->execute($valores)) {
            $jsonRes['status'] = true;
        } else {
            $jsonRes['msg'] = $stmt->errorInfo();
        }
    }
} catch (PDOException $e) {
    $jsonRes['msg'] = $e->getMessage();
}
echo json_encode($jsonRes);
