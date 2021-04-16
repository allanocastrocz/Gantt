<?php
session_start();
if (!isset($_SESSION['usuario']))
    Header("Location: login.php");

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

    <style>



    </style>

    <?php include('_navbar_.php'); ?>


    <!-- Tabla -->
    <div class="container">
        <a href="agregar.php" class="btn btn-primary mb-3">Agregar registro</a>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Tarea </th>
                    <th>Responsable</th>
                    <th>Version</th>
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
                        <td>
                            <div class="btn-group mb-3">
                                <button type="button" class="btn btn-outline-primary btnEditar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                    </svg>
                                </button>
                                <button type="button" class="btn  btn-outline-danger btnEliminar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                        <td><?php echo $reg['tarea']; ?></td>
                        <td><?php echo $reg['nombre'] . ' ' . $reg['apepat']; ?></td>
                        <td><?php echo $reg['version']; ?></td>
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

        <!-- Modal de alerta -->
        <div class="modal fade" id="modalAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        ¡Alerta! Estás a punto de eliminar este registro. <br>
                        ¿Desea continuar?
                    </div>
                    <div class="modal-footer">
                        <form action="bd/eliminar-registro.php" method="post">
                            <input type="text" value="0" name="id_registro" id="idEliminar" style="display: none;">
                            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Continuar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
            $('#example').DataTable({
                scrollX: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            });

            $(document).on("click", ".btnEditar", function(e) {
                var id = $(this).closest('tr').attr('id');
                window.location.href = 'editar.php?idact=' + id;
            });

            $(document).on("click", ".btnEliminar", function(e) {
                var id = $(this).closest('tr').attr('id');
                $('#idEliminar').val(id);
                $('#modalAlerta').modal('show');
                console.log('Eliminar ' + id);
            });
        });
    </script>
</body>

</html>