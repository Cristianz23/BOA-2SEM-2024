<?php
session_start();
include_once "../template/header.php";
include_once "../models/users.model.php";

// Validación y sanitización de entradas
$usuario = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$contrasena = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

try {
    $objetoUsuario = new Users();
    $resultado = $objetoUsuario->login($usuario);

    if (mysqli_num_rows($resultado) > 0) {
        $autenticado = mysqli_fetch_array($resultado);
        // Verificación de contraseña utilizando password_verify
        if (password_verify($contrasena, $autenticado['contrasena'])) {
            $_SESSION['usuarioautenticado'] = $autenticado;
            session_regenerate_id(); // Regeneración de ID de sesión
            if($_SESSION['usuarioautenticado']['tipouser'] === 'administrador') {
                header("Location:../views/index_admin.php");
            } else if ($_SESSION['usuarioautenticado']['tipouser'] === 'Docente') {
                header("Location:../views/index_docente.php");
            } else {
                header("Location:../views/index_estudiante.php");
            }
            exit();
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Error de autenticación!',
                    text: 'usuario y/o contraseña incorrecta.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../views/login.php';
                    }
                });
            });
            </script>";
        }
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Error de autenticación!',
                text: 'usuario y/o contraseña incorrecta.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../views/login.php';
                }
            });
        });
        </script>";
    }
} catch (Exception $e) {
    echo "Error en la conexión: ". $e->getMessage();
}
