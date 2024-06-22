<?php
include_once "../models/estudiante.model.php";

$estudiante = new Estudiante();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modificaEstudiante'])) {
        // Actualización del cliente existente
        $codigoCliente = $_POST['modificaEstudiante'];
        $nombreCliente = $_POST['nombre'];
        $telefCliente = $_POST['telef'];
        $curso = $_POST['curso'];

        if ($estudiante->updateEstudiante($codigoCliente, $nombreCliente, $telefCliente, $curso)) {
            header("Location: ../views/estudiante.view.php?update=1");
        } else {
            header("Location: ../views/estudiante.view.php?update=0");
        }
    } elseif (isset($_POST['nombre']) && isset($_POST['telef']) && isset($_POST['curso'])) {
        $nusuario = $_POST['nombre'];
        $tusuario = $_POST['telef'];
        $curso = $_POST['curso'];

        if ($estudiante->createEstudiante($nusuario, $tusuario, $curso)) {
            header("Location: ../views/estudiante.view.php?crear=1");
        } else {
            header("Location: ../views/estudiante.view.php?crear=0");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cliente'])) {
    $idCliente = $_GET['cliente'];
    if ($estudiante->delete($idCliente)) {
        header("Location: ../views/estudiante.view.php?eliminar=1");
    } else {
        header("Location: ../views/estudiante.view.php?eliminar=0");
    }
}
