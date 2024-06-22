<?php

class Conexion{

    private $server;
    private $user;
    private $pwd;
    private $bd;
    private $mysqli;

    function __construct(){
        $this->server = 'localhost';
        $this->user = 'root';
        $this->bd = 'Instituto_Rigoberto';
        $this->pwd = '';
    }

    
    public function conectar(){
        try {
            $this->mysqli = new mysqli($this->server, $this->user, $this->pwd, $this->bd);
    
            if ($this->mysqli->connect_errno) {
                throw new Exception("No se pudo conectar con la base de datos: ". $this->mysqli->connect_error);
            } else {
                return $this->mysqli;
            }
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
            return 0; 
        }
    }
    

    public function cerrarConexion(){
        $this->mysqli->close();
    }

    public function consultar($query){
        $result = mysqli_query($this->conectar(),$query);
        $this->cerrarConexion();
        return $result;
    }
}