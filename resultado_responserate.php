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
    <title>Resultado responseRate</title>
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
	
	
	//$respuesta=$objresponseRate->NoGES($conexion);
	$respuestas=$objresponseRate->ConsultaGES($conexion);
	
?>
	<table class="table table-hover table-sm ">
		<tr>
			<td colspan =2>
				<button type="submit" class="btn btn-danger btn-sm btn-lg btn-block" onclick ="location='index.html'" >Inicio</button>	
			</td>
			<td colspan =4>
				<button type="button" class="btn btn-success btn-sm btn-lg btn-block"  onclick ="location='imprimir.php'" > <img src="Imagenes/download.png"> Descargar Excel</button> 
			</td>
		</tr>
		<tr  class="table-primary">
			<td>ChoiceText	</td>
			<td>Invited	</td>
			<td>Bounced	</td>
			<td>Received	</td>
			<td>Responses	</td>
			<td>ResponseRatePercent	</td>
		</tr>
			<?php
				$sql = "Select * from NoGes";
				$consulta=mysqli_query($conexion,$sql);
				while($row=mysqli_fetch_array($consulta	)){
			?>
        <tr>
				<td><?php echo $row['ChoiceText'] ?></td>
				<td><?php echo $row['Invited'] ?></td>
				<td><?php echo $row['Bounced'] ?></td>
				<td><?php echo $row['Received'] ?></td>
				<td><?php echo $row['Responses'] ?></td> 
				<td><?php echo $row['ResponseRatePercent'] ?></td>
		</tr>
			<?php 
				}
				$sql2 = "CALL Total_responserate_gsc";
				$consulta2=mysqli_query($conexion,$sql2);
				while($row2=mysqli_fetch_array($consulta2)){  
			?>
		<tr class="table-success">
			<td><?php echo "Total"?></td>			
			<td><?php echo $row2['Suma1'] ?></td>
			<td><?php echo $row2['Suma2'] ?></td>
			<td><?php echo $row2['Suma3'] ?></td>
			<td><?php echo $row2['Suma4'] ?></td>
			<td><?php echo $row2['Total'] ?></td>
		</tr>
			<?php
				}
			?>
	</table>

 <br>
 		