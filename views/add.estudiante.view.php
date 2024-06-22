<?php 
    include_once "../models/curso.model.php";
?>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  AGREGAR ESTUDIANTE
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Estudiante</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/estudiante.controller.php" method="post" id="miFormulario">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
            </div>
            <div class="mb-3">
                <label for="telef" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telef" name="telef" placeholder="Ingrese el teléfono" pattern="\d{8}" title="Debe ser un número de 8 dígitos" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un número de 8 dígitos.
                </div>
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <!-- <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese el curso" required> -->
                <select class="form-control" id="curso" name="curso" required>
                <?php 
                  $objetoCurso = new Curso();
                  $allCursos = $objetoCurso->read();
                  if(mysqli_num_rows($allCursos) > 0) {
                    while($curso = mysqli_fetch_array($allCursos)){ 
                      echo '<option value="' . $curso["curso"] . '">' . $curso["curso"] . '</option>';
                    }
                  }else {
                    echo '<option value="">No hay cursos disponibles</option>';
                    }
                
                ?>
                </select>
            </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR ESTUDIANTE</button>
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