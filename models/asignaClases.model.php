<?php

include_once "gestion.bd.model.php";    

class AsignaClases{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function AsignarClases($idCurso, $idClases){
        $consulta = "insert into curso_clase (id_curso, id_clase) values ('$idCurso', '$idClases');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function isExists($idCurso, $idClases){
        $consulta = "SELECT * FROM curso_clase WHERE id_curso = '$idCurso' AND id_clase='$idClases';";
        $resultado = $this->objetoConexion->consultar($consulta);
        $this->objetoConexion->consultar($consulta);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function readByIdEncargado($idEncargado){
        $consulta = "select * from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente
        inner join curso_clase on cursos.idCursos = curso_clase.id_curso 
        inner join clases on curso_clase.id_clase = clases.idClases
        where docente_curso.docente_id = '$idEncargado';";
       return $this->objetoConexion->consultar($consulta);
    }
    
    public function readListaEstudiantesXIdGuia($idEncargado){
        $consulta = "select estudiante.idEstudiante, estudiante.nombre, estudiante.curso from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente
        inner join estudiante on cursos.curso = estudiante.curso
        where docente_curso.docente_id = '$idEncargado';";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readListaClasesXIdEstudiante($idEstudiante){
        $consulta = "select DISTINCT estudiante.idEstudiante, estudiante.nombre, estudiante.curso, clases.clase
        from estudiante
        inner join cursos on estudiante.curso = cursos.curso
        inner join curso_clase on cursos.idCursos = curso_clase.id_curso
        inner join clases on curso_clase.id_clase = clases.idClases
        where estudiante.idEstudiante = '$idEstudiante';";
       return $this->objetoConexion->consultar($consulta);
    }
    
}