<?php 
    include_once "../template/zona_priv.php";
    include_once "../template/header.php";
    include_once "../template/menu_estudiante.php";
?>
<!-- Cuerpo html -->
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Bienvenido Estudiante</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">¡Hola
                            <?= $_SESSION['usuarioautenticado']['tipouser'].' @'.
        $_SESSION['usuarioautenticado']['nombre'].'!';
    ?></h5>
                        <p class="card-text"> Bienvenido a la plataforma del sistema escolar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php 
    include_once "../template/footer.php";
?>