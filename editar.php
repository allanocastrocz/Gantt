<?php
session_start();
if (!isset($_SESSION['usuario']))
    Header("Location: login.php");

include_once('bd/Consultas.php');
$queries = new Consultas();
$datos = $queries->GetRegistro($_GET['idact']);
$usuarios = $queries->GetDatosUsuarios();

$fecha_inicio = new DateTime($datos['inicio']);
$fecha_fin = new DateTime($datos['fin']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gantt</title>
    <!-- Librerías CSS -->
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>

    <?php include('_navbar_.php'); ?>

    <!-- Tabla -->
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container mb-5">
                <h1 class="display-4">EDITAR REGISTRO</h1>
                <p class="lead">Modifique los campos deseados y guarde los cambios</p>
            </div>
        </div>

        <form class="row g-3" id="registro_editar">
            <!-- Fila 1 -->
            <div class="col-md-6">
                <label for="inputTarea" class="form-label">Tarea</label>
                <input type="text" class="form-control" name="tarea" id="inputTarea" value="<?php echo $datos['tarea']; ?>" required>
                <div class="invalid-feedback">No usar caracteres especiales</div>
            </div>
            <div class="col-md-6">
                <label for="inputResponsable" class="form-label">Responsable</label>
                <select class="form-select" name="responsable" id="inputResponsable" required>
                    <?php foreach ($usuarios as $user) { ?>
                        <option value="<?php echo $user['idus']; ?>" <?php if($user['idus'] == $datos['responsable']){ echo 'selected';}?>>
                            <?php echo $user['nombre'] . ' ' . $user['apepat']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <!-- Fila 2 -->
            <div class="col-4">
                <label for="inputInicio" class="form-label">Inicio</label>
                <input type="datetime-local" class="form-control" id="inputInicio" name="inicio" 
                value="<?php echo $fecha_inicio->format('Y-m-d') . 'T' . $fecha_inicio->format('H:i:s'); ?>" required>
            </div>
            <div class="col-4">
                <label for="inputFin" class="form-label">Fin</label>
                <input type="datetime-local" class="form-control" id="inputFin" name="fin" 
                value="<?php echo $fecha_fin->format('Y-m-d') . 'T' . $fecha_fin->format('H:i:s'); ?>" required>
            </div>
            <div class="col-4">
                <label for="inputAvance" class="form-label">Avance</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAvance" value="<?php echo $datos['avance']; ?>" name="avance" required>
                    <span class="input-group-text" id="basic-addon2">%</span>
                </div>
            </div>
            <!-- Fila 3 -->
            <div class="col-3">
                <label for="inputMano" class="form-label">Mano de Obra</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputMano" name="mano_obra" value="<?php echo $datos['mano_obra']; ?>">
                </div>
            </div>
            <div class="col-3">
                <label for="inputMateria" class="form-label">Materia Prima</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputMateria" name="materia_prima" value="<?php echo $datos['materia_prima']; ?>">
                </div>
            </div>
            <div class="col-3">
                <label for="inputDepreciacion" class="form-label">Depreciación</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputDepreciacion" name="depreciacion" value="<?php echo $datos['depreciacion']; ?>">
                </div>
            </div>
            <div class="col-3">
                <label for="inputGastos" class="form-label">Gastos Administrativos</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputGastos" name="gastos" value="<?php echo $datos['gastos_admi']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputEntregables" class="form-label">Entregables</label>
                <input type="text" class="form-control" name="entregables" id="inputEntregables" value="<?php echo $datos['entregables']; ?>" required>
                <div class="invalid-feedback">No usar caracteres especiales</div>
            </div>
            <div class="col-md-6">
                <label for="inputObservaciones" class="form-label">Observaciones</label>
                <input type="text" class="form-control" name="observaciones" id="inputObservaciones" value="<?php echo $datos['observaciones']; ?>" required>
                <div class="invalid-feedback">No usar caracteres especiales</div>
            </div>

            <input type="text" value="<?php echo $_GET['idact']; ?>" name="id_act" style="display: none;">

            <div class="col-12">
                <button type="submit" class="btn btn-dark">Guardar</button>
            </div>
        </form>
    </div>


    <!-- Librerías Js -->
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Validatejs -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <!-- Local -->
    <script src="js/validaciones.js"></script>
</body>

</html>