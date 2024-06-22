<?php
session_start();
include_once "../template/header.php";
include_once "../models/users.model.php";

// Validación y sanitización de entradas
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$contrasena = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
$tipouser = filter_var($_POST['tipouser'], FILTER_SANITIZE_SPECIAL_CHARS);
$idTipoUser = filter_var($_POST['IdTipoUser'], FILTER_SANITIZE_SPECIAL_CHARS);


try {
    $objetoUsuario = new Users();
    
    // Verificar si el usuario ya existe
    $resultado = $objetoUsuario->login($email);
    $usuarioExisteDocente = $objetoUsuario->ExisteUsuarioDocente($idTipoUser);
    $usuarioExisteEstudiante = $objetoUsuario->ExisteUsuarioEstudiante($idTipoUser);

    if (mysqli_num_rows($resultado) > 0) {
        if ($tipouser==="Docente") {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Error de creación de usuario!',
                text: 'usuario ya existe.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
              }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = '../views/docente.view.php';

                    }
                });
        });
        </script>";

        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Error de creación de usuario!',
                    text: 'usuario ya existe.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                  }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = '../views/estudiante.view.php';
    
                        }
                    });
            });
            </script>";
        }
        
    } else if (mysqli_num_rows($usuarioExisteDocente) > 0 and $tipouser==="Docente"){
     
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Error de creación de usuario!',
                text: 'usuario ya fue asignado.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
              }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = '../views/docente.view.php';

                    }
                });
        });
        </script>";
          
    } else if (mysqli_num_rows($usuarioExisteEstudiante) > 0 and $tipouser==="Estudiante"){
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Error de creación de usuario!',
                text: 'usuario ya fue asignado.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
              }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = '../views/estudiante.view.php';

                    }
                });
        });
        </script>";
    }
    else {
        // Registrar el nuevo usuario
        $registro = $objetoUsuario->register($nombre, $email, $contrasena, $tipouser, $idTipoUser);
        
        if ($registro) {

            if ($tipouser==="Docente") {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Registro creado!',
                        text: 'Registro creado satisfactoriamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../views/docente.view.php';
                        }
                    });
            });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Registro creado!',
                        text: 'Registro creado satisfactoriamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../views/estudiante.view.php';
                        }
                    });
            });
                </script>";
            }

        
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Error!',
                    text: 'error al procesar la informacion.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = '../views/Index_admin.php';
                    }
                });
        });
            </script>";
        }
    }
} catch (Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
