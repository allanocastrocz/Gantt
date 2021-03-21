<?php
session_start();
if (!isset($_SESSION['usuario']))
    Header("Location: login.php");

require("bd/Consultas.php");
$queries = new Consultas();
$usuarios = $queries->GetDatosUsuarios();
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

    <!-- Barra de navegación -->
    <?php include('_navbar_.php'); ?>

    <!-- Tabla -->
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container mb-5">
                <h1 class="display-4">INGRESAR REGISTRO</h1>
                <p class="lead">Complete todos los campos del formulario</p>
            </div>
        </div>

        <form class="row g-3" id="registro">
            <!-- Fila 1 -->
            <div class="col-md-6">
                <label for="inputTarea" class="form-label">Tarea</label>
                <input type="text" class="form-control" name="tarea" id="inputTarea" placeholder="Nombre de la tarea" required>
                <div class="invalid-feedback">No usar caracteres especiales</div>
            </div>
            <div class="col-md-6">
                <label for="inputResponsable" class="form-label">Responsable</label>
                <select class="form-select" name="responsable" id="inputResponsable" required>
                    <option selected disabled>Selecciona un usuario</option>
                    <?php foreach ($usuarios as $user) { ?>
                        <option value="<?php echo $user['idus']; ?>"><?php echo $user['nombre'] . ' ' . $user['apepat']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- Fila 2 -->
            <div class="col-4">
                <label for="inputInicio" class="form-label">Inicio</label>
                <input type="datetime-local" class="form-control" id="inputInicio" name="inicio" required>
            </div>
            <div class="col-4">
                <label for="inputFin" class="form-label">Fin</label>
                <input type="datetime-local" class="form-control" id="inputFin" name="fin" required>
            </div>
            <div class="col-4">
                <label for="inputAvance" class="form-label">Avance</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAvance" placeholder="95" name="avance" maxlength="3" minlength="1" required>
                    <span class="input-group-text" id="basic-addon2">%</span>
                </div>
            </div>
            <!-- Fila 3 -->
            <div class="col-3">
                <label for="inputMano" class="form-label">Mano de Obra</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputMano" name="mano_obra" placeholder="0.00">
                </div>
            </div>
            <div class="col-3">
                <label for="inputMateria" class="form-label">Materia Prima</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputMateria" name="materia_prima" placeholder="0.00">
                </div>
            </div>
            <div class="col-3">
                <label for="inputDepreciacion" class="form-label">Depreciación</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputDepreciacion" name="depreciacion" placeholder="0.00">
                </div>
            </div>
            <div class="col-3">
                <label for="inputGastos" class="form-label">Gastos Administrativos</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">$</span>
                    <input type="number" class="form-control" id="inputGastos" name="gastos" placeholder="0.00">
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputEntregables" class="form-label">Entregables</label>
                <input type="text" class="form-control" name="entregables" id="inputEntregables" placeholder="Entregables" required>
                <div class="invalid-feedback">No usar caracteres especiales</div>
            </div>
            <div class="col-md-6">
                <label for="inputObservaciones" class="form-label">Observaciones</label>
                <input type="text" class="form-control" name="observaciones" id="inputObservaciones" placeholder="Observaciones" required>
                <div class="invalid-feedback">No usar caracteres especiales</div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-dark">Agregar</button>
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