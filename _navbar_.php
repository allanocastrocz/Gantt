<style>
    .topbar-divider {
        width: 0;
        border-right: 1px solid #e3e6f0;
        height: calc(4.375rem - 2rem);
        margin: auto 1rem;
    }

    .d-none {
        display: none !important;
    }

    .d-sm-block {
        display: block !important;
    }
</style>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-4 bg-body rounded">
    <div class="container">
        <a class="navbar-brand" href="index.php">NombreEmpresa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="gantt.php">Gantt</a>
                </li>
            </ul>
            <ul class="navbar-nav mt-1">
                <li class="nav-item">
                    <p class="nav-link"><?php echo $_SESSION['usuario']['nombre']; ?></p>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item">
                    <a class="nav-link active text-primary" href="bd\logout.php" aria-current="page">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>