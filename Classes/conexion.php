<?php

class conexion{


    public function conectar(){

        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "reportes";
        $conexion = mysqli_connect($host,$user,$password,$db);
    
        if($conexion == false){
            die ("ERROR".mysqli_connect_error);
        }
        return $conexion;
    }

}