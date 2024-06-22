<!-- Modal -->
<div class="modal fade" id="updateCliente<?= $docente['idDocente']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Docente <?= $docente['nombre']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/docente.controller.php" method = "post" id="miFormulario">
            <input type="hidden" name="modificaCliente" value="<?= $docente['idDocente']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="<?= $docente['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telef" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telef" name="telef" placeholder="Ingrese el teléfono" pattern="\d{8}" value="<?= $docente['telefono']; ?>" title="Debe ser un número de 8 dígitos" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un número de 8 dígitos.
                </div>
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


<script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        var inputTelef = document.getElementById('telef');
                        if (inputTelef.value.length !== 8) {
                            inputTelef.setCustomValidity('El número debe tener exactamente 8 dígitos');
                        } else {
                            inputTelef.setCustomValidity('');
                        }

                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
</script>