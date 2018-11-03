<?php

include '../clases/conexion.php';
include '../clases/profesor.php';

$objConexion = new conexion();
$objProfesor = new profesor();

$conexion = $objConexion->conectar();
echo $objProfesor->eliminar($conexion, $_GET['id']);