<?php
    session_start();

    define('BASE_URL', '/PROYECTO-INRLP-CRISTIAN');


    if(!isset($_SESSION['usuarioautenticado'])){
        header("Location: " . BASE_URL . "/index.php");
        exit();
    }