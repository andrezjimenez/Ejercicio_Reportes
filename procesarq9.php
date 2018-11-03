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
    <title>Q9</title>
</head>
<body >
    <div class="container" >
<?php
	include "Classes/conexion.php";
	include "Classes/q9.php";
    require 'Classes/PHPExcel/IOFactory.php';
	
	$objConexion = new conexion();
	$conexion = $objConexion->conectar();
	
	$objq9 = new q9();
	$respuesta=$objq9->Eliminaranteriorq9($conexion);

	$objq82 = new q9();

	$carpeta = "files/";
    opendir($carpeta);
    $destino =$carpeta.$_FILES['Q9']['name'];
    copy($_FILES['Q9']['tmp_name'],$destino);
	$nombre=$_FILES['Q9']['name'];
	$ubicacionArchivo= "files/".$nombre;
	$locacion="onclick = "."location='index.html'";
	$locacion2="onclick = "."location='resultado_q9.php'";
	
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
	
	echo '<table class="table table-hover table-sm    ">
			<tr  class="table-primary">
				<td colspan=28> Informacion del archivo <b>'.$nombre.'<b></td>
			</tr>';
	
	for ($i = 1; $i <= $numRows; $i++) {
		
		$Choice = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		
		$Npersona1 = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$Porcentaje1 = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

		$Npersona2 = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$Porcentaje2 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();

		$Npersona3 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$Porcentaje3 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();

		$Npersona4 = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$Porcentaje4 = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		
		$Npersona5 = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$Porcentaje5 = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		
		$Npersona6 = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		$Porcentaje6 = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();

		$Npersona7 = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
		$Porcentaje7 = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
		
		$Npersona8 = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
		$Porcentaje8 = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();

		$Npersona9 = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
		$Porcentaje9 = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();

		$Npersona10 = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
		$Porcentaje10 = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();

		$Nn = $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
		$Nnp = $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
		
		$Mean = $objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
		$Total = $objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
		
		$Totalrated = $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
		$Porcentajerated = $objPHPExcel->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue();
	
		echo '<tr>';
	
		if($i<=4){
			echo '<td colspan=28>'. $Choice.'</td>';
		}
		else{
			echo '<td>'. $Choice.'</td>';
			if($i==7){
				echo '<td colspan=28>'. $Npersona1.'</td>';
			}else if($i==8){
				echo '<td colspan=2>'. $Npersona1.'</td>';
				echo '<td colspan=2>'. $Npersona2.'</td>';
				echo '<td colspan=2>'. $Npersona3.'</td>';
				echo '<td colspan=2>'. $Npersona4.'</td>';
				echo '<td colspan=2>'. $Npersona5.'</td>';
				echo '<td colspan=2>'. $Npersona6.'</td>';
				echo '<td colspan=2>'. $Npersona7.'</td>';
				echo '<td colspan=2>'. $Npersona8.'</td>';
				echo '<td colspan=2>'. $Npersona9.'</td>';
				echo '<td colspan=2>'. $Npersona10.'</td>';
				echo '<td colspan=2>'. $Nn.'</td>';
				echo '<td >'. $Mean.'</td>';
				echo '<td >'. $Total.'</td>';
				echo '<td colspan=2>'. $Totalrated.'</td>';

			}else{
				echo '<td>'. $Npersona1.'</td>';						
				echo '<td>'. $Porcentaje1.'</td>';
				
				echo '<td>'. $Npersona2.'</td>';
				echo '<td>'. $Porcentaje2.'</td>';

				echo '<td>'. $Npersona3.'</td>';
				echo '<td>'. $Porcentaje3.'</td>';
			
				echo '<td>'. $Npersona4.'</td>';
				echo '<td>'. $Porcentaje4.'</td>';

				echo '<td>'. $Npersona5.'</td>';
				echo '<td>'. $Porcentaje5.'</td>';

				echo '<td>'. $Npersona6.'</td>';
				echo '<td>'. $Porcentaje6.'</td>';

				echo '<td>'. $Npersona7.'</td>';
				echo '<td>'. $Porcentaje7.'</td>';

				echo '<td>'. $Npersona8.'</td>';
				echo '<td>'. $Porcentaje8.'</td>';

				echo '<td>'. $Npersona9.'</td>';
				echo '<td>'. $Porcentaje9.'</td>';

				echo '<td>'. $Npersona10.'</td>';
				echo '<td>'. $Porcentaje10.'</td>';

				echo '<td>'. $Nn.'</td>';
				echo '<td>'. $Nnp.'</td>';

				echo '<td>'. $Mean.'</td>';
				echo '<td>'. $Total.'</td>';

				echo '<td>'. $Totalrated.'</td>';
				echo '<td>'. $Porcentajerated.'</td>';
				
				echo '</tr>';
			}
		}
		
		
		if($i==7)
		{
			echo '<tr> 
					<td colspan =12>
					<button type="button" class="btn btn-success btn-sm btn-lg btn-block"'.$locacion2.'>Procesar</button> 
					</td>
					<td colspan =16>
					<button type="submit" class="btn btn-danger btn-sm btn-lg btn-block" '.$locacion.'>Volver</button>
					</td>
					</tr>';
		}
		if($i>9){
			$respuesta=$objq9->agregarq9($conexion,$Choice,$Npersona1,$Npersona2,$Npersona3,$Npersona4,$Npersona5,$Npersona6,$Npersona7,$Npersona8,$Npersona9,$Npersona10,$Mean);
		}
    }
	$sql2 = "delete from q9 where Choice in ('CITI','HEWLETT PACKARD ENTERPRISE PARENT CMC','ACCENTURE CONSOLIDATED','HP INC PARENT CMC','General Electric')";
	$consulta=mysqli_query($conexion,$sql2);	
	echo '<table>';

?>

 <br>