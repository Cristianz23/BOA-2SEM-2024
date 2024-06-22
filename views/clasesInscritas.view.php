<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_docente.php";
    include_once "../models/curso.model.php";
    include_once "../models/clases.model.php";
    include_once "../models/asignaClases.model.php";
?>

<div class="container">
    <br>
<h1>Clases inscritas</h1>
<br>
<table class="table table-striped" id="MisCursos">
        <caption>Clases </caption>
        <thead>
            <tr>
                <th>Curso</th>
                <th>Docente Guía</th>
                <th>Clases Inscritas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoCurso = new AsignaClases();
                $allCursos = $objetoCurso->readByIdEncargado(($_SESSION['usuarioautenticado']['IdTipoUser']));

                while($curso = mysqli_fetch_array($allCursos)){
            ?>
            <tr>
                <td><?= $curso['curso']; ?></td>
                <td><?= $curso['nombre']; ?></td>
                <td><?= $curso['clase']; ?></td>
            </tr>
            <?php } ?>

        </tbody>
    </table>

</div>



<?php 

    include_once "../template/footer.php";
?>

<script>
    $(document).ready(function() {
        $('#MisCursos').DataTable({
            responsive: true,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
<br>
