<?php
include_once "../models/clases.model.php";

$clase = new Clases();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modificaClase'])) {
        $codigoClase = $_POST['modificaClase'];
        $NombreClase = $_POST['clase'];

        if ($clase->updateClase($codigoClase, $NombreClase)) {
            header("Location: ../views/clases.view.php?update=1");
        } else {
            header("Location: ../views/clases.view.php?update=0");
        }
    } elseif (isset($_POST['clase']) && $_POST['clase']!== "") {
        $ncurso = $_POST['clase'];
        if($clase->isExists($ncurso)===true){
            header("Location: ../views/clases.view.php?crear=4");
        } else {
            if ($clase->createClase($ncurso)) {
                header("Location: ../views/clases.view.php?crear=1");
            } else {
                header("Location: ../views/clases.view.php?crear=0");
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['idClases'])) {
    // Eliminación del cliente
    $idCurso = $_GET['idClases'];
    if ($clase->delete($idCurso)) {
        header("Location: ../views/clases.view.php?eliminar=1");
    } else {
        header("Location: ../views/clases.view.php?eliminar=0");
    }
}
