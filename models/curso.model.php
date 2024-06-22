<?php

include_once "gestion.bd.model.php";    

class Curso{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function createCurso($curso){
        $consulta = "insert into cursos (curso) values ('$curso');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function read(){
        $consulta = "select * from cursos;";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readByIdEncargado($idEncargado){
        $consulta = "select * from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente
        where docente_curso.docente_id = '$idEncargado';";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readSpecific($curso){
        $consulta = "select * from cursos where nombre = '$curso';";
        $this->objetoConexion->consultar($consulta);
    }

    public function updateCurso($idCurso, $curso){
        $consulta = "update cursos set curso = '$curso' where idCursos = $idCurso;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function delete($idCursos){
        $consulta = "delete from cursos where idCursos = $idCursos";
        return $this->objetoConexion->consultar($consulta);
    }
    
}