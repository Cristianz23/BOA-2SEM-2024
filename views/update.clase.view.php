<!-- Modal -->
<div class="modal fade" id="updateClase<?= $clases['idClases']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Clase <?= $clases['clase']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/clases.controller.php" method = "post">
            <input type="hidden" name="modificaClase" value="<?= $clases['idClases']; ?>">
            <div class="mb-3">
                <label for="clase" class="form-label">Nombre de la clase</label>
                <input type="text" class="form-control" id="clase" name="clase" placeholder="Ingrese el nombre de la clase" value="<?= $clases['clase']; ?>" required>
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