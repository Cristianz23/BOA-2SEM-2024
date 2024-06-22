<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_docente.php";
    include_once "../models/curso.model.php";
    include_once "../models/clases.model.php";
?>

<div class="container">
    <br>
<h1>Asigna las clases a tu curso guiado</h1>
<br>
<table class="table table-striped" id="MisCursos">
        <caption>Asignar clases</caption>
        <thead>
            <tr>
                <th>ID Curso</th>
                <th>Curso</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoCurso = new Curso();
                $allCursos = $objetoCurso->readByIdEncargado(($_SESSION['usuarioautenticado']['IdTipoUser']));

                while($curso = mysqli_fetch_array($allCursos)){
            ?>
            <tr>
                <td><?= $curso['idCursos']; ?></td>
                <td><?= $curso['curso']; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateCurso<?= $curso['idCursos'];?>" data-client-id="<?= $curso['idCursos'];?>">Editar</button>
                    <?php 
                        include "asignaClase.view.php"; 
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
                title: 'Clase asignada Satisfactoriamente',
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
                title: 'Este curso ya tiene esta clase asignada',
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
