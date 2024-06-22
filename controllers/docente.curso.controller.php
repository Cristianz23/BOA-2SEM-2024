<?php
include_once "../models/docente.curso.model.php";

$docenteCurso = new DocenteCurso();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modificaDocenteCurso'])) {
        $codigoDocenteCurso = $_POST['modificaDocenteCurso'];
        $docente_id = $_POST['docente_id'];
        $curso_id = $_POST['curso_id'];
        $fecha = $_POST['fecha'];
        if($docenteCurso->isAlreadyExists($docente_id, $curso_id) === true){
            header("Location: ../views/docente.curso.view.php?update=4");
        } else {
            if ($docenteCurso->updateDocenteCurso($docente_id, $curso_id, $fecha, $codigoDocenteCurso)) {
                header("Location: ../views/docente.curso.view.php?update=1");
            } else {
                header("Location: ../views/docente.curso.view.php?update=0");
            }
        }   
    } elseif (isset($_POST['docente_id']) && isset($_POST['curso_id']) && isset($_POST['fecha'])) {
        $IdDocente = $_POST['docente_id'];
        $IdCurso = $_POST['curso_id'];
        $fecha = $_POST['fecha'];

        if($docenteCurso->isExists($IdDocente)===true){
            header("Location: ../views/docente.curso.view.php?crear=4");
        } else {
            if ($docenteCurso->createDocenteCurso($IdDocente, $IdCurso, $fecha)) {
                header("Location: ../views/docente.curso.view.php?crear=1");
            } else {
                header("Location: ../views/docente.curso.view.php?crear=0");
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // Eliminación del cliente
    $id = $_GET['id'];
    if ($docenteCurso->delete($id)) {
        header("Location: ../views/docente.curso.view.php?eliminar=1");
    } else {
        header("Location: ../views/docente.curso.view.php?eliminar=0");
    }
}
