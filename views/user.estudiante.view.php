<!-- Modal -->
<div class="modal fade" id="AsignarUserEstudiante<?= $estudiante['idEstudiante']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Usuario Estudiante <?= $estudiante['nombre']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/usuario.controller.php" method = "post">
            <input type="hidden" name="IdTipoUser" value="<?= $estudiante['idEstudiante']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $estudiante['nombre']; ?>" disabled>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $estudiante['nombre']; ?>" hidden>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Contraseña" required>
            </div>

            <div class="mb-3">
                <label for="tipouser" class="form-label">Tipo de Usuario</label>
                <select class="form-select" aria-label="Default select example" name="tipouser" id="tipouser" disabled>
                    <option selected>Selecciona el tipo de usuario</option>
                    <option value="Estudiante" selected>Estudiante</option>
                    <option value="Docente" >Docente</option>
                </select>
                <select class="form-select" aria-label="Default select example" name="tipouser" id="tipouser" hidden>
                    <option >Selecciona el tipo de usuario</option>
                    <option value="Estudiante" selected>Estudiante</option>
                    <option value="Docente">Docente</option>
                </select>
            </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
      </div>
      </form>
    </div>
  </div>
</div>
<br>