<?php
include_once "../models/curso.model.php";

$curso = new Curso();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modificaCurso'])) {
        $codigoCurso = $_POST['modificaCurso'];
        $NombreCurso = $_POST['curso'];

        if ($curso->updateCurso($codigoCurso, $NombreCurso)) {
            header("Location: ../views/curso.view.php?update=1");
        } else {
            header("Location: ../views/curso.view.php?update=0");
        }
    } elseif (isset($_POST['curso']) && $_POST['curso']!== "") {
        $ncurso = $_POST['curso'];
        if ($curso->createCurso($ncurso)) {
            header("Location: ../views/curso.view.php?crear=1");
        } else {
            header("Location: ../views/curso.view.php?crear=0");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['curso'])) {
    // Eliminación del cliente
    $idCurso = $_GET['curso'];
    if ($curso->delete($idCurso)) {
        header("Location: ../views/curso.view.php?eliminar=1");
    } else {
        header("Location: ../views/curso.view.php?eliminar=0");
    }
}
