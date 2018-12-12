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
    <title>Resultado Q11</title>
</head>
<body >
    <div Class="container">
	<?php
		include "Classes/conexion.php";
		include "Classes/q11.php";
		require 'Classes/PHPExcel/IOFactory.php';
		
		$objConexion = new conexion();
		
		$objConexion2 = new conexion();
		
		$conexion = $objConexion->conectar();
		$conexion2 = $objConexion2->conectar();
		
		$Objq11 = new q11();

		$suma=0;
		$suma1=0;
		$suma3=0;
		$suma4=0;
		$suma5=0;
		
		//$respuesta=$objresponseRate->NoGES($conexion);
		//$respuestas=$Objq8->Q8local($conexion);
		$sqlpais = "Select * from buscarpaisq11"; // se puede cambiar la vista a solo buscarpais pero con el remplace de (offline)
		$consultapais=mysqli_query($conexion,$sqlpais);	
		while($rowpais=mysqli_fetch_array($consultapais)){
			$pais=$rowpais['pais'];
			echo $pais;
		}

		// este bloque de instrucciones trarla suma de las columnas desde sQL
		$sqlresultado = "Call q11locals ('$pais')";
				$consulta=mysqli_query($conexion2,$sqlresultado);
				while($row=mysqli_fetch_array($consulta	)){
					$n1=$row['n1'];
					$n2=$row['n2'];
					$n3=$row['n3'];
					$n4=$row['n4'];
					$n5=$row['n5'];
					$n6=$row['n6'];
					$n7=$row['n7'];
					$n8=$row['n8'];
					$n9=$row['n9'];
					$n10=$row['n10'];
				}
		// este bloque de instrucciones trarla suma de las columnas desde sQL
	?>
	<table class="table table-hover table-sm ">
		<tr>
			<td colspan =12>
				<button type="submit" class="btn btn-danger btn-sm btn-lg btn-block" onclick ="location='index.php'" >Inicio</button>	
			</td>
			<td colspan =8>
				<button type="button" class="btn btn-success btn-sm btn-lg btn-block"  onclick ="location='imprimirq11.php'" >  Descargar Excel</button> 
			</td>
		</tr>
		<tr  class="table-primary">
			<td>Choice	</td>
			<td>1	</td>
			<td>2	</td>
			<td>3	</td>
			<td>4	</td>
			<td>5	</td>
			<td>6	</td>
			<td>7	</td>
			<td>8	</td>
			<td>9	</td>
			<td>10	</td>
			<td>Mean	</td>
			<td>Q 1-6	</td>
			<td>Q 7-8	</td>
			<td>Q 9-10	</td>
			<td>SCORE 7,8,9,10	</td>
			<td>SCORE 1 A 10	</td>
			<td>Porcentaje	</td>
		</tr>
			<?php
				//$sql = "Select * from Q8local";
				$sql = "Call BuscarClientesPaisq11 ('$pais')";
				$consulta=mysqli_query($conexion,$sql);
				while($row=mysqli_fetch_array($consulta	)){
			?>
         <tr>
				<td><?php echo $row['Choice'] ?></td>
				<td><?php echo $row['n1'] ?></td>
				<td><?php echo $row['n2'] ?></td>
				<td><?php echo $row['n3'] ?></td>
				<td><?php echo $row['n4'] ?></td>
				<td><?php echo $row['n5'] ?></td>
				<td><?php echo $row['n6'] ?></td>
				<td><?php echo $row['n7'] ?></td>
				<td><?php echo $row['n8'] ?></td>
				<td><?php echo $row['n9'] ?></td>
				<td><?php echo $row['n10'] ?></td>
				<td><?php echo $row['mean'] ?></td>
				
				<td><?php echo $resultado3=$row['n1']+ $row['n2']+ $row['n3']+$row['n4']+ $row['n5']+ $row['n6']?></td>
				<td><?php echo $resultado4=$row['n7']+ $row['n8']?></td>
				<td><?php echo $resultado5=$row['n9']+ $row['n10']?></td>
				<td><?php echo $resultado2=$row['n7']+$row['n8']+ $row['n9']+ $row['n10']?></td>
				<td><?php echo $resultado=$row['n1']+ $row['n2']+ $row['n3']+ $row['n4']+ $row['n5']+ $row['n6']+ $row['n7']+ $row['n8']+ $row['n9']+ $row['n10']?></td>
				<td><?php echo ($resultado2/$resultado)*100 ?></td>
				<?php
				$suma5 = $suma5+$resultado5;
				$suma4 = $suma4+$resultado4;
				$suma3 = $suma3+$resultado3;
				$suma1 = $suma1+$resultado2;
				$suma = $suma+$resultado;
				?>
		</tr>
		<?php
			}
		?>
		<tr class="table-success">
				<td>Total </td>
				<td><?php echo $n1; ?></td>
				<td><?php echo $n2; ?></td>
				<td><?php echo $n3; ?></td>
				<td><?php echo $n4; ?></td>
				<td><?php echo $n5; ?></td>
				<td><?php echo $n6; ?></td>
				<td><?php echo $n7; ?></td>
				<td><?php echo $n8; ?></td>
				<td><?php echo $n9; ?></td>
				<td><?php echo $n10; ?></td>
				<td></td>
				
				<td><?php echo $suma3?></td>
				<td><?php echo $suma4?></td>
				<td><?php echo $suma5?></td>
				<td><?php echo $suma1?></td>
				<td><?php echo $suma?></td>
				<td><?php echo ($suma1/$suma)*100 ?></td>
		</tr>
		</tr>
	</table>

 <br>
 		