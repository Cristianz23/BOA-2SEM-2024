<?php

include_once "gestion.bd.model.php";    

class DocenteCurso{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function createDocenteCurso($docenteId, $cursoId, $fecha){
        $consulta = "insert into docente_curso (docente_id, curso_id, fecha) values ('$docenteId', '$cursoId', '$fecha');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function read(){
        $consulta = "select * from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente;";
       return $this->objetoConexion->consultar($consulta);
    }


    public function getCursosxIdUser($idUser){
        $consulta = "select * from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente;";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readSpecific($id){
        $consulta = "select * from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente where id = '$id';";
        $this->objetoConexion->consultar($consulta);
    }

    public function isExists($idDocente){
        $consulta = "SELECT * FROM docente_curso WHERE docente_id = '$idDocente';";
        $resultado = $this->objetoConexion->consultar($consulta);
        $this->objetoConexion->consultar($consulta);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isAlreadyExists($idDocente, $idCurso) {
        $consulta = "SELECT * FROM docente_curso WHERE curso_id = '$idCurso';";
        $resultado = $this->objetoConexion->consultar($consulta);
        var_dump($resultado);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateDocenteCurso($docenteId, $cursoId, $fecha, $id){
        $consulta = "update docente_curso set docente_id = '$docenteId', curso_id='$cursoId', fecha='$fecha' where id = $id;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function delete($id){
        $consulta = "delete from docente_curso where id = $id";
        return $this->objetoConexion->consultar($consulta);
    }
    
}