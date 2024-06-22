<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    if($_SESSION['usuarioautenticado']['tipouser'] === 'administrador'){
        include_once "../template/menu_admin.php";
    } else {
        include_once "../template/menu_docente.php";
    }
    include_once "../models/estudiante.model.php";    
    include_once "../models/asignaClases.model.php";
    include_once "../models/clases.model.php";
?>

<div class="container">
    <br>
<h1>Asignar Calificaciones a estudiantes guiados</h1>
<table class="table table-striped" id="MisClientes">
        <caption>Listado de estudiantes</caption>
        <thead>
            <tr>
                <th>ID Estudiante</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $objetoEstudiante = new AsignaClases();
                $allestudiantes = $objetoEstudiante->readListaEstudiantesXIdGuia(($_SESSION['usuarioautenticado']['IdTipoUser']));

                while($estudiante = mysqli_fetch_array($allestudiantes)){
            ?>
            <tr>
                <td><?= $estudiante['idEstudiante']; ?></td>
                <td><?= $estudiante['nombre']; ?></td>
                <td><?= $estudiante['curso']; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#AsignarNotaEstudiante<?= $estudiante['idEstudiante'];?>" data-client-id="<?= $estudiante['idEstudiante'];?>">Asignar Calificaciones</button>

                    <?php 
                         if($_SESSION['usuarioautenticado']['tipouser'] === 'administrador'){
                    ?>
                           <a class="btn btn-danger btn-sm" href="/controllers/estudiante.controller.php?cliente=<?= $estudiante['idEstudiante']; ?>">Eliminar</a>
                        <?php
                        }
                        ?>
                    
                    <?php 
                        include "asignarNota.view.php"; 

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

if (isset($_GET['eliminar'])) {
    $crear = intval($_GET['eliminar']); // Convertir a int para evitar errores de conversión

    switch ($crear) {
        case 1:
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Estudiante Eliminado',
                showConfirmButton: false
              });</script>";
            break;
        case 0:
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Estudiante un error',
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
                title: 'Estudiante Actualizado',
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
