<?php
	include "Classes/conexion.php";
	include "Classes/responserate.php";
    require 'Classes/PHPExcel/IOFactory.php';

    $objConexion = new conexion();
    $conexion = $objConexion->conectar();
    
    $contador=0;
    $pais=$_GET["pais"];
   // echo $pais;
	
?>

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
    <title>Reportes</title>

  </head>
  <body class="text-center"><br>
    <div Class="container">
        <div class="row">
            <div class="col-sm">
                <table class="table table-hover table-sm ">
                    <tr  class="table-primary">
                        <td>#</td>
                        <td>Nombre Cliente</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                    <?php
                        $sql = "Select * from clientesges where pais='$pais'";
                        $respuestas=mysqli_query($conexion,$sql);
                        while($row=mysqli_fetch_array($respuestas)){
                        $contador++;
                    ?>
                    <tr>
                        <td><?php echo $contador ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><a href="editar_cat.php?id=<?php echo $row['id_cliente'];?> "><img src="Imagenes/editar.PNG" width="25" height="25" ></a></td>
                        <td><a href="controlador/eliminar_clientelocal.php?id=<?php echo $row['id_cliente']; ?>"><img src="Imagenes/drop.PNG" width="25" height="25" > </a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div class="col-sm text-left" >
            <br><h3>Registro de Cliente</h3><br>
                <form action="controlador/controlado_registroclientelocal.php" method="post">
                    <input type="text" name="pais" value="<?php echo $pais;?>"  class="form-control" readonly style="visibility:hidden" >
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre del cliente" name="nombre" required>
                    <small id="emailHelp" class="form-text text-muted">El nombre del cliente que va a registrar debe ser exacto al que se carga en el Excel Sin espacios en blanco.</small>
                    <br>
                    <button type="submit" class="btn btn-success btn-sm btn-lg btn-block"  >Registrar</button>	
                 </form><br>
                 <button type="button" class="btn btn-danger btn-sm btn-lg btn-block" onclick ="location='index.html'" >Volver</button>	
            </div>
        </div>
    </div>
        <div Class="container">
        
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Cover Template for Bootstrap_files/jquery-3.3.1.slim.min.js.descarga" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Cover Template for Bootstrap_files/popper.min.js.descarga"></script>
    <script src="./Cover Template for Bootstrap_files/bootstrap.min.js.descarga"></script>
  </body>
</html>