<!-- Modal -->
<div class="modal fade" id="AsignarNotaEstudiante<?= $estudiante['idEstudiante']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Nota a Estudiante <?= $estudiante['nombre']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/asignarNota.controller.php" method = "post">
            <input type="hidden" name="IdTipoUser" value="<?= $estudiante['idEstudiante']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Estudiante</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $estudiante['nombre']; ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="idClases" class="form-label">Clase</label>
                <select class="form-control" id="idClases" name="idClases" required>
                <?php 
                  $objetoClase = new Clases();
                  $allClases = $objetoClase->read();
                  if(mysqli_num_rows($allClases) > 0) {
                    while($clase = mysqli_fetch_array($allClases)){ 
                       echo '<option value="' . $clase["idClases"] . '">' . $clase["clase"] . '</option>';
                    }
                  }else {
                    echo '<option value="">No hay clases disponibles</option>';
                    }
                
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d"); ?>" placeholder="Ingrese la fecha de asignación" required>
            </div>

            <div class="mb-3">
                <label for="Nota" class="form-label">Nota</label>
                <input type="number" class="form-control" id="Nota" name="Nota" min="0" max="100" placeholder="Ingrese la califación" oninput="validity.valid||(value='');" required>
            </div>

            <div class="mb-3">
                <label for="tipouser" class="form-label">Corte Evaluativo</label>
                <select class="form-select" aria-label="Default select example" name="tipouser" id="tipouser">
                    <option selected>Selecciona el corte evaluativo</option>
                    <option value="Primer Corte">Primer Corte</option>
                    <option value="Segundo Corte" >Segundo Corte</option>
                    <option value="Tercer Corte" >Tercer Corte</option>
                    <option value="Cuarto Corte" >Cuarto Corte</option>
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