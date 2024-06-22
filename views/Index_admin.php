<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    if($_SESSION['usuarioautenticado']['tipouser'] === 'administrador'){
        include_once "../template/menu_admin.php";
    }
?>
<!-- Cuerpo html -->
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card mt-5">
                    <div class="card-header">
                    <?php 
                    if ($_SESSION['usuarioautenticado']['tipouser'] === 'administrador') {
                        echo "Bienvenido admin";
                    } elseif ($_SESSION['usuarioautenticado']['tipouser'] === 'Docente') {
                        echo "Bienvenido Docente";
                    } else {
                        echo "Bienvenido Estudiante";
                    }
                    ?>


                    </div>
                    <div class="card-body">
                        <h5 class="card-title">¡Hola
                            <?= $_SESSION['usuarioautenticado']['tipouser'].' @'.
        $_SESSION['usuarioautenticado']['nombre'].'!';
    ?></h5>
                        <p class="card-text">
                            <?php 
                            if ($_SESSION['usuarioautenticado']['tipouser'] === 'administrador') {
                                echo "Accede a una de las opciones de arriba para realizar gestiones a los usuarios del sistema escolar.";
                            } else {
                                echo "Bienvenido a la plataforma del sistema escolar.";
                            }
                            ?>
                        </p>
                        <?php 
                        if ($_SESSION['usuarioautenticado']['tipouser'] === 'administrador') {
                            echo '<a href="#" class="btn btn-primary">Comenzar</a>';
                        } else {
                            echo '<a href="../template/cerrar_sesion.php" class="btn btn-primary">Cerrar Sesión</a>';
                        }
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php 
    include_once "../template/footer.php";
?>