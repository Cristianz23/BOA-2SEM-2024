<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_admin.php";
    include_once "../models/clases.model.php";
?>

<div class="container">
    <?php include_once "add.clases.view.php"; ?>
    <br>

<table class="table table-striped" id="MisClases">
        <caption>Listado de clases</caption>
        <thead>
            <tr>
                <th>ID Clase</th>
                <th>Clase</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoClase = new Clases();
                $allClases = $objetoClase->read();

                while($clases = mysqli_fetch_array($allClases)){
            ?>
            <tr>
                <td><?= $clases['idClases']; ?></td>
                <td><?= $clases['clase']; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateClase<?= $clases['idClases'];?>" data-client-id="<?= $clases['idClases'];?>">Editar</button>
                    <a class="btn btn-danger btn-sm" href="/controllers/clases.controller.php?idClases=<?= $clases['idClases']; ?>">Eliminar</a>
                    <?php 
                        include "update.clase.view.php"; 
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
                title: 'Clase Creado Satisfactoriamente',
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
                title: 'Esta clase ya fue registrada',
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
                title: 'Clase Eliminado Satisfactoriamente',
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
                title: 'Clase Actualizado Satisfactoriamente',
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
        $('#MisClases').DataTable({
            responsive: true,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
<br>
