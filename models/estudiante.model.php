<?php

include_once "gestion.bd.model.php";    

class Estudiante{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function createEstudiante($nombre, $telefono, $curso){
        $consulta = "insert into estudiante (nombre, telefono, curso) values ('$nombre', '$telefono', '$curso');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function read(){
        $consulta = "select * from estudiante;";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readSpecific($nombre){
        $consulta = "select * from estudiante where nombre = '$nombre';";
        $this->objetoConexion->consultar($consulta);
    }

    public function updateEstudiante($idEstudiante, $nombre, $telefono, $curso){
        $consulta = "update estudiante set nombre = '$nombre', telefono = '$telefono', curso = '$curso' where idEstudiante = $idEstudiante;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function delete($idEstudiante){
        $consulta = "delete from estudiante where idEstudiante = $idEstudiante";
        return $this->objetoConexion->consultar($consulta);
    }
    
}