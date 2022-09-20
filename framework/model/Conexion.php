<?php
class Conexion {
    private $servidor="localhost";
    private $usuario="root";
    private $password="";
    private $bd="clase";

    public function conexion(){
        $conexion=mysqli_connect($this->servidor,
                                    $this->usuario,  
                                    $this->password,
                                $this->bd);
        return $conexion;
    }
}

$obj = new Conexion();

?>