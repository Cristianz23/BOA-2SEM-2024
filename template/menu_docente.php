<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/logo2.png" alt="logo" width="50" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./curso.clase.view.php">Cursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./clasesInscritas.view.php">Clases Inscritas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./asignarCalificaciones.view.php">Asignar Calificaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./verCalificaciones.view.php">Ver Calificaciones</a>
        </li>
      </ul>

      <span class="fw-bold text-center me-3">Bienvenido, <?= 
        $_SESSION['usuarioautenticado']['nombre'].'';
    ?></span>
      <form class="d-flex" role="search">
        <a class="btn btn-outline-primary" href="../template/cerrar_sesion.php" type="submit">Cerrar Sesión</a>
      </form>
    </div>
  </div>
</nav>