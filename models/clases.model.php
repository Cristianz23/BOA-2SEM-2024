<?php

include_once "gestion.bd.model.php";    

class Clases{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function createClase($clase){
        $consulta = "insert into clases (clase) values ('$clase');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function read(){
        $consulta = "select * from clases;";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readSpecific($clase){
        $consulta = "select * from cursos where clase = '$clase';";
        $this->objetoConexion->consultar($consulta);
    }

    public function updateClase($idClases, $clase){
        $consulta = "update clases set clase = '$clase' where idClases = $idClases;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function delete($idClases){
        $consulta = "delete from clases where idClases = $idClases";
        return $this->objetoConexion->consultar($consulta);
    }

    public function isExists($clase){
        $consulta = "SELECT * FROM clases WHERE clase = '$clase';";
        $resultado = $this->objetoConexion->consultar($consulta);
        $this->objetoConexion->consultar($consulta);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}