<?php
include "Classes/conexion.php";
include "Classes/q9.php";
require 'Classes/PHPExcel/IOFactory.php';

$objConexion = new conexion();
$conexion = $objConexion->conectar();

$sqlpais = "Select * from buscarpais"; // se puede cambiar la vista a solo buscarpais pero con el remplace de (offline)
$consultapais=mysqli_query($conexion,$sqlpais);	
while($rowpais=mysqli_fetch_array($consultapais)){
$paisq8=$rowpais['pais'];
//echo $pais;
}
$sqlpais = "Select * from buscarpaisq9"; // se puede cambiar la vista a solo buscarpais pero con el remplace de (offline)
$consultapais=mysqli_query($conexion,$sqlpais);	
while($rowpais=mysqli_fetch_array($consultapais)){
$paisq9=$rowpais['pais'];
//echo $pais;
}
$sqlpais = "Select * from buscarpaisq11"; // se puede cambiar la vista a solo buscarpais pero con el remplace de (offline)
$consultapais=mysqli_query($conexion,$sqlpais);	
while($rowpais=mysqli_fetch_array($consultapais)){
$paisq11=$rowpais['pais'];
//echo $pais;
}
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
    <title>Reporte GSC y Local</title>

  </head>
  <body class="text-left"><br>
    <div Class="container">
      <div class="row">
        <div class="col-sm " >
          <form action="procesar.php" method="post" enctype="multipart/form-data">
            <h4>Generar Reporte responseRate</h4>
            <div class="form-group">
              
              <input type="file" class="form-control-file btn-sm" id="exampleFormControlFile1" name="responseRate" required>  
              <input type="submit" value="Subir y Mostrar Archivo responseRate" class="btn btn-success btn-sm btn-lg ">
             </div>
          </form>
          <form action="procesarq8.php" method="post" enctype="multipart/form-data">
            <h4>Generar Reporte Q8</h4>
            <div class="form-group">
              <input type="file" class="form-control-file btn-sm" id="exampleFormControlFile1" name="Q8" required>  
              <input type="submit" value="Subir y Mostrar Archivo Q8" class="btn btn-success btn-sm btn-lg "> 
            </div>
          </form>
          <form action="procesarq9.php" method="post" enctype="multipart/form-data">
            <h4>Generar Reporte Q9</h4>
            <div class="form-group">
              <input type="file" class="form-control-file btn-sm" id="exampleFormControlFile1" name="Q9" required>  
              <input type="submit" value="Subir y Mostrar Archivo Q9" class="btn btn-success btn-sm btn-lg "> 
            </div>
          </form>
          <form action="procesarq11.php" method="post" enctype="multipart/form-data">

            <h4>Generar Reporte Q11</h4>
            <div class="form-group">
              <input type="file" class="form-control-file btn-sm" id="exampleFormControlFile1" name="Q11" required>  
              <input type="submit" value="Subir y Mostrar Archivo Q11" class="btn btn-success btn-sm btn-lg "> 
            </div>
          </form>

        </div>
        <div class="col-sm " >
            <form action="imprimirrresultado.php" method="post" enctype="multipart/form-data">

              <h4>Generar Reporte Nivel de Respuesta</h4>
              <div class="alert alert-danger" role="alert">
              Para generar este reporte primero cargue pero <strong>NO!</strong> procese los reportes <strong>Q8, Q9, Q11  </strong> de cada pais y luego seleccione el pais del que va a generar el reporte
              </div>
              <div class="form-group">
                <select class="custom-select custom-select mb-1" name="pais" required>
                  <option selected>Seleccione un pais</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Peru">Peru</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Chile">Chile</option>
                </select>
                <br>
                <input type="submit" value="Generar Nivel de Respuesta" class="btn btn-success btn-sm btn-lg  btn-block">
              </div>
            </form>
            <br>
            <table class="table table-sm">
              <thead>
                <tr class="table-primary">
                  <th scope="col">Reporte (Actualmente DB)</th>
                  <th scope="col">Pais</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <th scope="row">ResponseRate</th>
                  <td>Sin Habilitar</td>
                </tr>
                <tr>
                  <th scope="row">Q8</th>
                  <td><?php echo $paisq8;?></td>
                </tr>
                <tr>
                  <th scope="row">Q9</th>
                  <td ><?php echo $paisq9;?></td>
                </tr>
                <tr>
                  <th scope="row">Q11</th>
                  <td><?php echo $paisq11;?></td>
                </tr>
              </tbody>
            </table>          
  

        </div>
      </div>
      <br>
      <br>
      <a href="registroclientelocal.php?pais=Argentina"><button type="submit" class="btn btn-danger btn-sm btn-lg "  >Registrar cliente local AR</button></a>
      <a href="registroclientelocal.php?pais=Peru"><button type="submit" class="btn btn-danger btn-sm btn-lg "  >Registrar cliente local PE</button></a>
      <a href="registroclientelocal.php?pais=Costa Rica"><button type="submit" class="btn btn-danger btn-sm btn-lg "  >Registrar cliente local CR</button></a>
      <a href="registroclientelocal.php?pais=Chile"><button type="submit" class="btn btn-danger btn-sm btn-lg "  >Registrar cliente local CH</button></a>
      
      <br>v 2.0
            
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