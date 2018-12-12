<!DOCTYPE html>
<!-- saved from url=(0050)https://getbootstrap.com/docs/4.1/examples/cover/# -->
<html lang="en">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>ResponseRate</title>
</head>
<body >
    <div Class="container">
<?php
	include "Classes/conexion.php";
	include "Classes/responserate.php";
    require 'Classes/PHPExcel/IOFactory.php';
	
	$objConexion = new conexion();
	$conexion = $objConexion->conectar();
	
	$objresponseRate = new responseRate();
	$respuesta=$objresponseRate->Eliminaranterior($conexion);

	$objresponseRate = new responseRate();

	$carpeta = "files/";
    opendir($carpeta);
    $destino =$carpeta.$_FILES['responseRate']['name'];
    copy($_FILES['responseRate']['tmp_name'],$destino);
	$nombre=$_FILES['responseRate']['name'];
	$ubicacionArchivo= "files/".$nombre;
	$locacion="onclick = "."location='index.html'";
	$locacion2="onclick = "."location='resultado_responserate.php'";
	$pais ='';
/*
    copy($_FILES['responseRate']['tmp_name'],$_FILES['responseRate']['name']);
    $nombre=$_FILES['responseRate']['name'];
*/
	//Variable con el nombre del archivo
	//$nombre=$carpeta.
	$nombreArchivo = $ubicacionArchivo;
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	echo '<table class="table table-hover table-sm ">
			<tr  class="table-primary">
				<td colspan=6> Informacion del archivo <b>'.$nombre.'<b></td>
			</tr>';
	
	for ($i = 1; $i <= $numRows; $i++) {
		
		$ChoiceText = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$Invited = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$Bounced = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$Received = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$Responses = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$ResponseRatePercent = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	
		echo '<tr>';
		echo '<td>'. $ChoiceText.'</td>';
		echo '<td>'. $Invited.'</td>';
		echo '<td>'. $Bounced.'</td>';		
		echo '<td>'. $Received.'</td>';
		echo '<td>'. $Responses.'</td>';
		echo '<td>'. $ResponseRatePercent.'</td>';
		echo '</tr>';
		if($i==5)
		{
			echo '<tr> 
					<td colspan =2>
					<button type="button" class="btn btn-success btn-sm btn-lg btn-block"'.$locacion2.'>Procesar</button> 
					</td>
					<td colspan =4>
					<button type="submit" class="btn btn-danger btn-sm btn-lg btn-block" '.$locacion.'>Volver</button>
					</td>
					</tr>';
		}
		if($i>7){
			$respuesta=$objresponseRate->agregar($conexion,$ChoiceText,$Invited,$Bounced,$Received,$Responses,$ResponseRatePercent);
		}
    }
	$sql2 = "CALL Eliminar_clientes";
	$consulta=mysqli_query($conexion,$sql2);	
	echo '<table>';

?>

 <br>