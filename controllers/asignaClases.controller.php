<?php
include_once "../models/asignaClases.model.php";

$clase = new AsignaClases();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modificaCurso'])) {
        $CodigoCurso = $_POST['modificaCurso'];
        $codigoClase = $_POST['idClases'];

        if($clase->isExists($CodigoCurso, $codigoClase)){
            header("Location: ../views/curso.clase.view.php?crear=2");
        } else {
            if ($clase->AsignarClases($CodigoCurso, $codigoClase)) {
                header("Location: ../views/curso.clase.view.php?crear=1");
            } else {
                header("Location: ../views/curso.clase.view.php?crear=0");
            }
        }
    } 
} 