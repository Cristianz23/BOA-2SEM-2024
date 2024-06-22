<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_admin.php";
    include_once "../models/curso.model.php";
?>

<div class="container">
    <br>

<table class="table table-striped" id="MisCursos">
        <caption>Listado de cursos asignados</caption>
        <thead>
            <tr>
                <th>ID Curso</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoCurso = new Curso();
                $allCursos = $objetoCurso->read();

                while($curso = mysqli_fetch_array($allCursos)){
            ?>
            <tr>
                <td><?= $curso['idCursos']; ?></td>
                <td><?= $curso['curso']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

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
