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
        // Datos POST de entrada
        $id_act = $_POST['id_act'];
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
            ':observaciones' => $observaciones,
            ':id_act' => $id_act
        ];


        $sql = "UPDATE actividades SET 
        tarea=:tarea,
        responsable=:responsable, 
        inicio=:inicio, 
        fin=:fin,
        avance=:avance, 
        mano_obra=:mano_obra, 
        materia_prima=:materia_prima, 
        depreciacion=:depreciacion, 
        gastos_admi=:gastos_admi, 
        entregables=:entregables, 
        observaciones=:observaciones
    WHERE idact=:id_act";

        $stmt = $pdo->prepare($sql);

        // echo json_encode($data);

        if ($stmt->execute($valores)) {
            $jsonRes['status'] = true;
        } else {
            $jsonRes['msg'] = $stmt->errorInfo();
        }
    }
} catch (PDOException $e) {
    $jsonRes['msg'] = $e->getMessage();
}
echo json_encode($jsonRes);
