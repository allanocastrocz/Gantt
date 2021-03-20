<?php
// session_start();
// if(isset($_SESSION['usuario']))
//   Header("Location: empleos_usuarios.php");
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
            <a class="nav-link active" aria-current="page" href="index.php">Gantt</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-auto">
        <div class="jumbotron jumbotron-fluid">
          <div class="container mb-5">
            <h1 class="display-4">INICIO DE SESIÓN</h1>
            <p class="lead">Complete todos los campos del formulario</p>
          </div>
        </div>

        <!-- Formulario para iniciar sesión -->
        <form>
          <div class="mb-3">
            <label for="inputCorreo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="inputCorreo" name="correo">
          </div>
          <div class="mb-3">
            <label for="inputPwd" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPwd" name="clave">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Librerías Js -->
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <!-- Local -->
  <!-- <script src="js/agregar.js"></script> -->
</body>

</html>