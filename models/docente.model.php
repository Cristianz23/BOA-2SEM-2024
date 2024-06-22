<?php

include_once "gestion.bd.model.php";    

class Docente{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function createClient($nombre, $telefono){
        $consulta = "insert into docentes (nombre, telefono) values ('$nombre', '$telefono');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function read(){
        $consulta = "select * from docentes;";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readSpecific($nombre){
        $consulta = "select * from docentes where nombre = '$nombre';";
        $this->objetoConexion->consultar($consulta);
    }

    public function updateClient($idDocente, $nombre, $telefono){
        $consulta = "update docentes set nombre = '$nombre', telefono = '$telefono' where idDocente = $idDocente;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function delete($idDocente){
        $consulta = "delete from docentes where idDocente = $idDocente";
        return $this->objetoConexion->consultar($consulta);
    }
    
}