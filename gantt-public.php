<?php

include("bd/Consultas.php");
$queries = new Consultas();
$registros = $queries->GetDatosGantt();
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
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">


</head>

<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <a class="navbar-brand" href="index.php">NombreEmpresa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="gantt-public.php">Gantt</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="login.php">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Tabla -->
    <div class="container">
    <table id="tabla" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Tarea </th>
                    <th>Responsable</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Avance</th>
                    <th>Mano de Obra</th>
                    <th>Materia Prima</th>
                    <th>Depreciación</th>
                    <th>Gastos Administrativos</th>
                    <th>Totales</th>
                    <th>Entregables</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $reg) {
                    $totales = $reg['mano_obra'] + $reg['materia_prima'] + $reg['depreciacion'] + $reg['gastos_admi'];
                ?>
                    <tr id="<?php echo $reg['idact']; ?>">
                        <td><?php echo $reg['tarea']; ?></td>
                        <td><?php echo $reg['nombre'] . ' ' . $reg['apepat']; ?></td>
                        <td><?php echo $reg['inicio']; ?></td>
                        <td><?php echo $reg['fin']; ?></td>
                        <td><?php echo $reg['avance']; ?></td>
                        <td><?php echo '$' . $reg['mano_obra']; ?></td>
                        <td><?php echo '$' . $reg['materia_prima']; ?></td>
                        <td><?php echo '$' . $reg['depreciacion']; ?></td>
                        <td><?php echo '$' . $reg['gastos_admi']; ?></td>
                        <td><?php echo '$' . $totales; ?></td>
                        <td><?php echo $reg['entregables']; ?></td>
                        <td><?php echo $reg['observaciones']; ?></td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>




    <!-- Librerías Js -->
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <!-- Local -->
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                scrollX: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            });
        });
    </script>
</body>

</html>