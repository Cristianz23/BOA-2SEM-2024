<?php

include_once "gestion.bd.model.php";    

class AsignaNota{

    private $objetoConexion;

    public function __construct(){
        $this->objetoConexion = new Conexion();
    }

    public function AsignarNota($estudiante_id, $clase_id, $fecha, $Nota, $Corte){
        $consulta = "insert into estudiante_clase (estudiante_id,clase_id,fecha,Nota,Corte) values ('$estudiante_id', '$clase_id', '$fecha','$Nota','$Corte');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function isExistsNota($estudiante_id, $clase_id,$Corte){
        $consulta = "SELECT * FROM estudiante_clase WHERE estudiante_id = '$estudiante_id' AND clase_id='$clase_id' AND Corte='$Corte';";
        $resultado = $this->objetoConexion->consultar($consulta);
        $this->objetoConexion->consultar($consulta);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function readListaNotasXIdGuia($idEncargado){
        $consulta = "select estudiante.idEstudiante, estudiante.nombre, estudiante.curso, estudiante_clase.Corte, clases.clase, estudiante_clase.Nota from docente_curso 
        inner join cursos on docente_curso.curso_id = cursos.idCursos
        inner join docentes on docente_curso.docente_id = docentes.idDocente
        inner join estudiante on cursos.curso = estudiante.curso
        inner join estudiante_clase on estudiante.idEstudiante = estudiante_clase.estudiante_id
        inner join clases on estudiante_clase.clase_id = clases.idClases
        where docente_curso.docente_id = '$idEncargado';";
       return $this->objetoConexion->consultar($consulta);
    }

    public function readListaNotasXIdEstudiante($idEstudiante){
        $consulta = "select DISTINCT estudiante.idEstudiante,
            estudiante.nombre,
            clases.clase,
            COALESCE(n1.nota, 0) AS IC,
            COALESCE(n2.nota, 0) AS IIC,
            COALESCE(n3.nota, 0) AS IIIC,
            COALESCE(n4.nota, 0) AS IVC,
            IF(n1.nota IS NOT NULL AND n2.nota IS NOT NULL AND n3.nota IS NOT NULL AND n4.nota IS NOT NULL, 
            (COALESCE(n1.nota, 0) + COALESCE(n2.nota, 0) + COALESCE(n3.nota, 0) + COALESCE(n4.nota, 0)) / 4, 
            0) AS NotaFinal
        FROM estudiante 
        inner join cursos on estudiante.curso = cursos.curso
        inner join curso_clase on cursos.idCursos = curso_clase.id_curso
        inner join clases on curso_clase.id_clase = clases.idClases
        LEFT JOIN 
            (SELECT estudiante_id, clase_id, nota FROM estudiante_clase WHERE Corte = 'Primer Corte') n1 ON estudiante.idEstudiante = n1.estudiante_id AND clases.idClases = n1.clase_id
        LEFT JOIN 
            (SELECT estudiante_id, clase_id, nota FROM estudiante_clase WHERE Corte = 'Segundo Corte') n2 ON estudiante.idEstudiante = n2.estudiante_id AND clases.idClases = n2.clase_id
        LEFT JOIN 
            (SELECT estudiante_id, clase_id, nota FROM estudiante_clase WHERE Corte = 'Tercer Corte') n3 ON estudiante.idEstudiante = n3.estudiante_id AND clases.idClases = n3.clase_id
        LEFT JOIN 
            (SELECT estudiante_id, clase_id, nota FROM estudiante_clase WHERE Corte = 'Cuarto Corte') n4 ON estudiante.idEstudiante = n4.estudiante_id AND clases.idClases = n4.clase_id
        where estudiante.idEstudiante = '$idEstudiante' 
        AND (n1.nota IS NOT NULL OR n2.nota IS NOT NULL OR n3.nota IS NOT NULL OR n4.nota IS NOT NULL)";
       return $this->objetoConexion->consultar($consulta);
    }


}