<!-- Modal -->
<div class="modal fade" id="updateCurso<?= $curso['idCursos']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Clases a <?= $curso['curso']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/asignaClases.controller.php" method = "post">
            <input type="hidden" name="modificaCurso" value="<?= $curso['idCursos']; ?>">
            <div class="mb-3">
                <label for="curso" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese el nombre del curso" value="<?= $curso['curso']; ?>" disabled>
                <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese el nombre del curso" value="<?= $curso['curso']; ?>" hidden>
            </div>
            
            <div class="mb-3">
                <label for="idClases" class="form-label">Clase</label>
                <!-- <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese el curso" required> -->
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