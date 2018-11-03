<?php

include "conexion.php";
include "profesor.php";

$objConexion = new conexion();
$objProfesor = new profesor();

$conexion = $objConexion->conectar();
echo $objProfesor->registrar($conexion, $_POST['nombre'], $_POST['apellido'], $_POST['edad'],
$_POST['fechaNaci'], $_POST['documento'], $_POST['titulo']);

echo "<a href='../consultar.php'>Ver Registros</a>";