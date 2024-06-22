<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_docente.php";
    include_once "../models/curso.model.php";
    include_once "../models/clases.model.php";
    include_once "../models/asignarNota.model.php";
?>

<div class="container">
    <br>
<h1>Listado de calificaciones</h1>
<br>
<table class="table table-striped" id="MisCursos">
        <caption>Listado de estudiantes</caption>
        <thead>
            <tr>
                <th>Codigo Estudiante</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Corte</th>
                <th>Clase</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoCurso = new AsignaNota();
                $allCursos = $objetoCurso->readListaNotasXIdGuia(($_SESSION['usuarioautenticado']['IdTipoUser']));

                while($curso = mysqli_fetch_array($allCursos)){
            ?>
            <tr>
                <td><?= $curso['idEstudiante']; ?></td>
                <td><?= $curso['nombre']; ?></td>
                <td><?= $curso['curso']; ?></td>
                <td><?= $curso['Corte']; ?></td>
                <td><?= $curso['clase']; ?></td>
                <td><?= $curso['Nota']; ?></td>
            </tr>
            <?php } ?>

        </tbody>
    </table>

</div>



<?php 

if (isset($_GET['crear'])) {
    $crear = intval($_GET['crear']); // Convertir a int para evitar errores de conversión

    switch ($crear) {
        case 1:
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Nota Asignada Correctamente',
                showConfirmButton: false
              });</script>";
            break;
        case 0:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error al procesar los datos',
                showConfirmButton: false
              });</script>";
            break;
        case 2:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Este estudiante ya tiene una nota registrada para ese corte',
                showConfirmButton: false
                });</script>";
            break;
        default:
            echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Hubo un error en el procesamiento',
                showConfirmButton: false,
              });</script>";
            break;
    }
}

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
