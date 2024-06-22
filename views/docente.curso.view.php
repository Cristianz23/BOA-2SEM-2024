<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_admin.php";
    include_once "../models/docente.curso.model.php";
?>

<div class="container">
    <?php include_once "add.docente.curso.view.php"; ?>
    <br>

<table class="table table-striped" id="MisCursos">
        <caption>Listado de cursos asignados</caption>
        <thead>
            <tr>
                <th hidden>Id</th>
                <th>Curso</th>
                <th>Docente Guia</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoCurso = new DocenteCurso();
                $allDocenteCursos = $objetoCurso->read();

                while($docenteCurso = mysqli_fetch_array($allDocenteCursos)){
            ?>
            <tr>
                <td hidden><?= $docenteCurso['id']; ?></td>
                <td><?= $docenteCurso['curso']; ?></td>
                <td><?= $docenteCurso['nombre']; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateDocenteCurso<?= $docenteCurso['id'];?>" data-client-id="<?= $docenteCurso['id'];?>">Editar</button>
                    <a class="btn btn-danger btn-sm" href="/controllers/docente.curso.controller.php?curso=<?= $docenteCurso['id']; ?>">Eliminar</a>
                    <?php 
                        include "update.docente.curso.view.php"; 
                    ?>
                </td>
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
                title: 'Curso Asignado Satisfactoriamente',
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
        case 4:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Este docente ya ha sido asignado',
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

if (isset($_GET['eliminar'])) {
    $crear = intval($_GET['eliminar']); // Convertir a int para evitar errores de conversión

    switch ($crear) {
        case 1:
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Curso Desasignado Satisfactoriamente',
                showConfirmButton: false
              });</script>";
            break;
        case 0:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Hubo un error',
                showConfirmButton: false
              });</script>";
            break;
        default:
            // Manejo para valores no definidos o no válidos
            echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Valor inválido',
                showConfirmButton: false
              });</script>";
            break;
    }
}

if (isset($_GET['update'])) {
    $crear = intval($_GET['update']); // Convertir a int para evitar errores de conversión

    switch ($crear) {
        case 1:
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Curso ReAsignado Satisfactoriamente',
                showConfirmButton: false
              });</script>";
            break;
        case 0:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error al realizar la acción',
                showConfirmButton: false
              });</script>";
            break;
        case 4:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Este curso ya ha sido asignado',
                showConfirmButton: false
                });</script>";
            break;
        default:
            // Manejo para valores no definidos o no válidos
            echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Valor inválido',
                showConfirmButton: false
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
