<?php 
    include_once "../models/curso.model.php";
    include_once "../models/docente.model.php";
?>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  ASIGNAR CURSO A DOCENTE
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar curso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="../controllers/docente.curso.controller.php" method="post">
          
            <div class="mb-3">
                <label for="docente_id" class="form-label">Docente</label>
                <select class="form-control" id="docente_id" name="docente_id" required>
                <?php 
                  $objetoDocente = new Docente();
                  $alldocentes = $objetoDocente->read();
                  if(mysqli_num_rows($alldocentes) > 0) {
                    while($docente = mysqli_fetch_array($alldocentes)){ 
                      echo '<option value="' . $docente["idDocente"] . '">' . $docente["nombre"] . '</option>';
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
                  if(mysqli_num_rows($allCursos) > 0) {
                    while($curso = mysqli_fetch_array($allCursos)){ 
                      echo '<option value="' . $curso["idCursos"] . '">' . $curso["curso"] . '</option>';
                    }
                  }else {
                    echo '<option value="">No hay cursos disponibles</option>';
                    }
                
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d"); ?>" placeholder="Ingrese la fecha de asignación" required>
            </div>

            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary">ASIGNAR CURSO</button>
            </div>
      </form>
    </div>
  </div>
</div>
<br>