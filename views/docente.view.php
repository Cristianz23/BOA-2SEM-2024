<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_admin.php";
    include_once "../models/docente.model.php";
?>

<div class="container">
    <?php include_once "add.docente.view.php"; ?>
    <br>

<table class="table table-striped" id="MisClientes">
        <caption>Listado de docentes</caption>
        <thead>
            <tr>
                <th>ID Docente</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoDocente = new Docente();
                $alldocentes = $objetoDocente->read();

                while($docente = mysqli_fetch_array($alldocentes)){
            ?>
            <tr>
                <td><?= $docente['idDocente']; ?></td>
                <td><?= $docente['nombre']; ?></td>
                <td><?= $docente['telefono']; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateCliente<?= $docente['idDocente'];?>" data-client-id="<?= $docente['idDocente'];?>">Editar</button>
                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#generarUsuarioDocente<?= $docente['idDocente'];?>" data-client-id="<?= $docente['idDocente'];?>">Generar Usuario</button>
                    <a class="btn btn-danger btn-sm" href="/controllers/docente.controller.php?cliente=<?= $docente['idDocente']; ?>">Eliminar</a>
                    <?php 
                        include "update.docente.view.php"; 
                        include "user.docente.view.php";
                    ?>
                </td>
            </tr>
            <?php } ?>
            <!-- Continúa agregando más registros según sea necesario -->
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
                title: 'Docente Creado',
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
                title: 'Docente Eliminado',
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
                title: 'Docente Actualizado',
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
        $('#MisClientes').DataTable({
            responsive: true,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
<br>
