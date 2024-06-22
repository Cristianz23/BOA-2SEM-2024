<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_admin.php";
    include_once "../models/curso.model.php";
?>

<div class="container">
    <?php include_once "add.curso.view.php"; ?>
    <br>

<table class="table table-striped" id="MisCursos">
        <caption>Listado de cursos</caption>
        <thead>
            <tr>
                <th>ID Curso</th>
                <th>Curso</th>
                <th>Opciones</th>
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
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateCurso<?= $curso['idCursos'];?>" data-client-id="<?= $curso['idCursos'];?>">Editar</button>
                    <a class="btn btn-danger btn-sm" href="/controllers/cursos.controller.php?curso=<?= $curso['idCursos']; ?>">Eliminar</a>
                    <?php 
                        include "update.curso.view.php"; 
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
                title: 'Curso Creado Satisfactoriamente',
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
                title: 'Curso Eliminado Satisfactoriamente',
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
                title: 'Curso Actualizado Satisfactoriamente',
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
