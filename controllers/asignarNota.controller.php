<?php
include_once "../models/asignarNota.model.php";

$clase = new AsignaNota();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['IdTipoUser'])) {
        $CodigoEstudiante = $_POST['IdTipoUser'];
        $codigoClase = $_POST['idClases'];
        $fecha = $_POST['fecha'];
        $Nota = $_POST['Nota'];
        $Corte = $_POST['tipouser'];
    

        if($clase->isExistsNota($CodigoEstudiante, $codigoClase, $Corte)){
            header("Location: ../views/verCalificaciones.view.php?crear=2");
        } else {
            if ($clase->AsignarNota($CodigoEstudiante, $codigoClase, $fecha, $Nota, $Corte)) {
                header("Location: ../views/verCalificaciones.view.php?crear=1");
            } else {
                header("Location: ../views/verCalificaciones.view.php?crear=0");
            }
        }
    } 
} 