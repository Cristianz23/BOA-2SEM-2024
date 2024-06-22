<?php
include_once "../models/docente.model.php";

$docente = new Docente();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modificaCliente'])) {
        // Actualización del cliente existente
        $codigoCliente = $_POST['modificaCliente'];
        $nombreCliente = $_POST['nombre'];
        $telefCliente = $_POST['telef'];

        if ($docente->updateClient($codigoCliente, $nombreCliente, $telefCliente)) {
            header("Location: ../views/docente.view.php?update=1");
        } else {
            header("Location: ../views/docente.view.php?update=0");
        }
    } elseif (isset($_POST['nombre']) && isset($_POST['telef'])) {
        $nusuario = $_POST['nombre'];
        $tusuario = $_POST['telef'];
        if ($docente->createClient($nusuario, $tusuario)) {
            header("Location: ../views/docente.view.php?crear=1");
        } else {
            header("Location: ../views/docente.view.php?crear=0");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cliente'])) {
    // Eliminación del cliente
    $idCliente = $_GET['cliente'];
    if ($docente->delete($idCliente)) {
        header("Location: ../views/docente.view.php?eliminar=1");
    } else {
        header("Location: ../views/docente.view.php?eliminar=0");
    }
}
