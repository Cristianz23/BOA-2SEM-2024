<!-- Modal -->
<div class="modal fade" id="updateDocenteCurso<?= $docenteCurso['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Curso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/docente.curso.controller.php" method = "post">
            <input type="hidden" name="modificaDocenteCurso" value="<?= $docenteCurso['id']; ?>">
            <div class="mb-3">
                <label for="docente_id" class="form-label">Docente</label>
                <select class="form-control" id="docente_id" name="docente_id" required>
                <?php 
                  $objetoDocente = new Docente();
                  $alldocentes = $objetoDocente->read();
                  $selectedDocenteId = $docenteCurso['docente_id'];  
                  if(mysqli_num_rows($alldocentes) > 0) {
                    while($docente = mysqli_fetch_array($alldocentes)){ 
                      // echo '<option value="' . $docente["idDocente"] . '">' . $docente["nombre"] . '</option>';
                      $selected = $docente["idDocente"] == $selectedDocenteId ? 'selected' : '';
                      echo '<option value="' . $docente["idDocente"] . '" ' . $selected . '>' . $docente["nombre"] . '</option>';         
                    }
                  }else {
                    echo '<option value="">No hay docentes disponibles</option>';
                    }
                
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <!-- <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese el curso" required> -->
                <select class="form-control" id="curso_id" name="curso_id" required>
                <?php 
                  $objetoCurso = new Curso();
                  $allCursos = $objetoCurso->read();
                  $selectedCursoId  = $docenteCurso["curso_id"];  
                  if(mysqli_num_rows($allCursos) > 0) {
                    while($curso = mysqli_fetch_array($allCursos)){ 
                      // echo '<option value="' . $curso["idCursos"] . '">' . $curso["curso"] . '</option>';
                      $selectedC = $curso["idCursos"] == $selectedCursoId ? 'selected' : '';
                      echo '<option value="' . $curso["idCursos"] . '" ' . $selectedC . '>' . $curso["curso"] . '</option>';        
                    }
                  }else {
                    echo '<option value="">No hay cursos disponibles</option>';
                    }
                
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha de asignación" value="<?= $docenteCurso['fecha']; ?>" required>
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