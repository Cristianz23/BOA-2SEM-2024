<?php
include_once "gestion.bd.model.php";

class Users{
    private $idUser;
    private $nombre;
    private $email;
    private $idTipoUser;
    private $objetoConexion;
    
    public function __construct(){
        $this->objetoConexion = new Conexion(); // Corrección aquí
    }

    public function login($usuario){
        $consulta = "select * from users where email = '$usuario';";
        $resultado = $this->objetoConexion->consultar($consulta);
        return $resultado;
    }

    public function ExisteUsuarioDocente($idUsuario){
        $consulta = "select * from users where IdTipoUser = '$idUsuario' and tipouser='Docente';";
        $resultado = $this->objetoConexion->consultar($consulta);
        return $resultado;
    }

    public function ExisteUsuarioEstudiante($idUsuario){
        $consulta = "select * from users where IdTipoUser = '$idUsuario' and tipouser='Estudiante';";
        $resultado = $this->objetoConexion->consultar($consulta);
        return $resultado;
    }

    public function register($nombre, $email, $contrasena, $tipouser, $idTipoUser) {
        // Encriptar la contraseña
        $hashContrasena = password_hash($contrasena, PASSWORD_BCRYPT);

        // Preparar la consulta SQL
        $consulta = "INSERT INTO users (nombre, email, contrasena, tipouser, IdTipoUser) VALUES ('$nombre', '$email', '$hashContrasena', '$tipouser', '$idTipoUser');";
        $resultado = $this->objetoConexion->consultar($consulta);
        
        // Devolver el resultado de la consulta
        return $resultado;
    }
}
